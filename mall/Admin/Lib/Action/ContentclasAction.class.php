<?php
	class ContentclasAction extends CommonAction{
		//分类列表
		public function cclist(){
			$m = M(Conclass);
			import("ORG.Util.Paged");
			$count = $m->count();
			$page = new Page($count,20);
			$show = $page->show();
			$data = $m->field("id,pid,conclassname,path,addtime,isshow,concat(path,'-',id) as bpath")->order('bpath')->limit($page->firstRow.','.$page->listRows)->select();
			
			foreach($data as $key=>$value){
					$data[$key]['count']=count(explode('-',$value['bpath']));
			}
			
			if($data){
				$this->assign("data",$data);
				$this->assign("page",$show);
			}
			$this->display();
		}
		
		//分类添加
		public function add(){
			if(IS_POST){
				
				$m = D("Conclass");
				
				if($m->create()){
					if($_POST['isphoto']==1){
						$info = $this->upload();
						$m->classphoto = $info[0][savename];
						$m->classthumb1="s_".$info[0][savename];
						$m->classthumb2="m_".$info[0][savename];
					}
					$m->addtime=time();
					if($m->add()){
						if(isset($_POST['submit1'])){
							$this->success("添加成功",U("Contentclas/cclist"));
						}else{
							$this->success("添加成功",U("Contentclas/add"));
						}
						
					}else{
					$this->error("添加失败");
					}
				}else{
					$this->error($m->getError());
				}
				
			}else{
				//绑定数据
				$m = M("Conclass");
				$list = $m->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				//dump($list);
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value['bpath']));
				}
				//排序
				$orderby1 = $m->order("orderby DESC")->limit(1)->find();
				
				if($orderby1){
					$orderbydata=$orderby1[orderby]+1;
				}else{
					$orderbydata=1;
				}
				
				//语言版本取值
				$lang_data = SettingAction::getLang();
	
				$this->assign("lang_data",$lang_data);
				$this->assign("alist",$list);
				$this->assign("orderbydata",$orderbydata);
			}
			$this->display();
		
		}
		
		//分类修改
		public function edit(){
			if(IS_POST){
				$id = trim(I("post.editid"));
				$isphoto = I("post.isphoto","",'trim');
				$select_mark = I("post.select_mark");
				$files = $_FILES;
				

				$pid = I("post.pid");


				if(isset($id) && $id>0){
				
					$m = M("Conclass");
					$conclass_save = array();
						//引用上传方法
						if(!empty($files)){
							
								$info = $this->upload();
								$conclass_save[classphoto]= $info[0][savename];
								$conclass_save[classthumb1]="s_".$info[0][savename];
								$conclass_save[classthumb2]="m_".$info[0][savename];
							
						}else{

							if($isphoto==0){
								$conclass_save[classphoto]="";
								$conclass_save[classthumb1]="";
								$conclass_save[classthumb2]="";
							}
						}
						
						$conclass_save[id]=$id;
						$conclass_save[conclassname]=I("post.conclassname");
						$conclass_save[lang]=I("post.lang");
						$conclass_save[conclasscontent]=I("post.conclasscontent");
						$conclass_save[isphoto]=I("post.isphoto");
						$conclass_save[orderby]=I("post.orderby");
						$conclass_save[isshow]=I("post.isshow");
						$conclass_save[pid]=$pid;
						$conclass_save[updatetime]=time();
						
						//父类栏目
						
						if($pid==0){
							$conclass_save[path]=0;
						}else{
							$pid_all_data = M("Conclass")->where(array('id'=>$pid))->find();
							$conclass_save[path]=$pid_all_data[path]."-".$pid_all_data[id];
						}
						
						if($select_mark==1){
						//递归查询该分类下所有子类ID
							$cate = M("Conclass")->select();
							$child_id = Getcate::getChildsId($cate,$id);
							foreach($child_id as $vo){
								$id_all_data = M("Conclass")->where(array('id'=>$id))->find();
								//原子类path 
								$old_child_path = M("Conclass")->where(array('id'=>$vo))->getField("path");
								//组合后的子类path
								$new_child_path = $conclass_save[path].str_replace($id_all_data[path], '', $old_child_path);

								M("Conclass")->where(array('id'=>$vo))->save(array('path'=>$new_child_path));
								//dump($new_child_path);
							}
						}


						
						if($m->save($conclass_save)){
							$this->success("修改成功",U("Contentclas/cclist"));
						}else
						{
							$this->error("修改失败");
						}
					
					
	
				}
				
			}else{
			//数据绑定
				$m = M("Conclass");
				$id = I("get.id");

				$type_list = $m->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($type_list as $key=>$value){
					$type_list[$key]['count']=count(explode('-',$value['bpath']));
				}

				$this->assign("alist",$type_list);
				
				if(isset($id) && $id>0){
					$where['id']=$id;
					$data = $m->where($where)->find();
					$this->assign("data",$data);
				}

				//语言版本取值
				$lang_data = SettingAction::getLang();
	
				$this->assign("lang_data",$lang_data);

				
			}
		
		
			$this->display();
		}
		
		//分类删除
		public function delete(){
			$id = I("get.id");
			$m = M("Conclass");

			//2014-09-28修改 删除所有子分类以及所属新闻

			/*
			$count = $m->where("pid=$id")->count();
			if($count>0){
				$this->error("删除失败，该分类下存在子分类");
			}
			
			$product = M("Content");
			$wh['cid']=$id;
			if($product->where($wh)->count()>0){
				$this->error("该分类下存在新闻，不可删除");
			}
			*/
			$cate = $m->select();
			//载入Getcate类
			import("@.Class.Getcate");
			$childid = Getcate::getChildsId($cate,$id);
			$childid[]=$id; //加上当前id

			//删除所有分类下的新闻
			M("Content")->where(array('cid'=>array('in',$childid)))->delete();

			//删除所有下级和当前分类
			if ($m->where(array('id'=>array('in',$childid)))->delete()) {
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
			
		}
		
		
		public function upload(){
			if(!empty($_FILES)){
				return $this->_upload();
			}
		
		}
		
		
		//文件上传方法(带缩略图)
		public function _upload(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/Conclass/';// 设置附件上传目录
			$upload->thumb = true; //设置需要生成缩略图，仅对图像文件有效
			$upload->imageClassPath = 'ORG.Util.Image';//设置引用图片类库包路径
			$upload->thumbPrefix = 'm_,s_';  //生成2张缩略图
			$upload->thumbMaxWidth = '400,100';//最大宽度
			$upload->thumbMaxHeight = '400,100';//最大高度
			$upload->saveRule = uniqid;//设置上传文件规则
			
			
			
			
			
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			return $info;
			}
		}
		
		//是否显示
		public function audit(){

			
			$id = I("get.id");
			$isshow = I("get.isshow");
			$where['id']=$id;
			$data['isshow']=$isshow;
			$m = M("Conclass");
			if($m->where($where)->save($data)){
				$this->success("操作成功",U("Contentclas/cclist"));
			}else{

				$this->error("操作失败");
			}
			
		}

	
	}

?>