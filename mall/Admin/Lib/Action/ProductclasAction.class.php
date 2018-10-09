<?php
	class ProductclasAction extends CommonAction{
		//分类列表
		public function pclist(){
			$m = M(Proclass);
			import("ORG.Util.Paged");
			$count = $m->count();
			$page = new Page($count,20);
			$show = $page->show();


			$data = $m->field("id,pid,proclassname,path,addtime,audit,concat(path,'-',id) as bpath")->order('bpath')->limit($page->firstRow.','.$page->listRows)->select();

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
				$m = D("Proclass");
				$files=$_FILES;
				//检查是否唯一
				//$where['proclassname'] =$_POST['proclassname'];
				//$count = $m->where($where)->count();
				//if($count>0){
				//	$this->error("该分类名称已存在，请检查!");
				//}
				
				
				if($m->create()){
					//引用上传方法
				    if(!empty($files)){
						$info = $this->upload();
						$m->classphoto = $info[0][savename];
						$m->classthumb1="s_".$info[0][savename];
						$m->classthumb2="m_".$info[0][savename];
				    }else{

							if($isphoto==0){
								$m->classphoto="";
								$m->classthumb1="";
								$m->classthumb2="";
							}
					}

					$proclasscontent = $_POST['proclasscontent'];

					$add_insert= $m->add();
					if($add_insert){
						if(isset($_POST['submit1'])){

							$this->success("添加成功",U("Productclas/pclist"));
						}else{
							$pro_insert_id = M("Proclass")->where("id=$add_insert")->getField("pid");
							$this->success("添加成功",U("Productclas/add",array('mark'=>$pro_insert_id)));
						}
						
					}else{
					$this->error("添加失败");
					}
				}else{
					$this->error($m->getError());
				}
				
			}else{
				//绑定数据
				$m = M("Proclass");
				$list = $m->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
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
				
				$this->assign("alist",$list);
				$this->assign("orderbydata",$orderbydata);

				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
			}
			$this->display();
		
		}
		
		//分类修改
		public function edit(){
			if(IS_POST){
				$id = trim(I("post.editid"));
				$classname = trim(I("post.classname"));
				$audit = trim(I("post.audit"));
			
				$isphoto = trim(I("post.isphoto"));
				$lang = trim(I("post.lang"));
				$orderby = trim(I("post.orderby"));
				$files = $_FILES;
				$updatetime = time();
				$englishname = I("post.englishname");
				$pid = I("post.pid");
				$select_mark = I("post.select_mark");

				if(isset($id) && $id>0){
					if(empty($classname)){
						$this->error("分类名称不能为空");
					}
					$m = M("Proclass");
					$data['proclassname']=$classname;
					$data['audit'] = $audit;
					$data['isphoto']=$isphoto;
					$data['proclasscontent'] = $_POST['proclasscontent'];
					$data['lang'] = $lang;
					$data['orderby'] = $orderby;
					$data['englishname']=$englishname;
					$data['pid']=$pid;

					//父类栏目
						
					if($pid==0){
						$data[path]=0;
					}else{
						$pid_all_data = M("Proclass")->where(array('id'=>$pid))->find();
						$data[path]=$pid_all_data[path]."-".$pid_all_data[id];
					}
					if($select_mark==1){
						//递归查询该分类下所有子类ID
						$cate = M("Proclass")->select();
						$child_id = Getcate::getChildsId($cate,$id);
						foreach($child_id as $vo){
							$id_all_data = M("Proclass")->where(array('id'=>$id))->find();
							//原子类path 
							$old_child_path = M("Proclass")->where(array('id'=>$vo))->getField("path");
							//组合后的子类path
							$new_child_path = $data[path].str_replace($id_all_data[path], '', $old_child_path);

							M("Proclass")->where(array('id'=>$vo))->save(array('path'=>$new_child_path));
						}
					}
					
					//引用上传方法
					if(!empty($files)){
						$info = $this->upload();
						$data['classphoto'] = $info[0][savename];
						$data['classthumb1']="s_".$info[0][savename];
						$data['classthumb2']="m_".$info[0][savename];
					}
										
					$data['updatetime'] = $updatetime;

					$where['id']=$id;
					if($m->where($where)->limit(1)->save($data)){
						$this->success("修改成功",U("Productclas/pclist"));
					}else{
						$this->error("修改失败");
					}
				}
				
			}else{
			//数据绑定
				$m = M("Proclass");
				$id = I("get.id");
				
				$list = $m->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				//dump($list);
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value['bpath']));
				}

				$this->assign("alist",$list);

				if(isset($id) && $id>0){
					$where['id']=$id;
					$data = $m->where($where)->find();
					$this->assign("data",$data);
					//语言版本取值
					$lang_data = SettingAction::getLang();
					$this->assign("lang_data",$lang_data);

				}
				
			}
		
		
			$this->display();
		}
		
		//分类删除
		public function delete(){
			$id = I("get.id");
			$m = M("Proclass");
			
			
			//2014-09-28修改 删除所有子分类以及所属产品
			/*
			$count = $m->where("pid=$id")->count();
			if($count>0){
				$this->error("删除失败，该分类下存在子分类");
			}
			
			$product = M("Product");
			$wh['cid']=$id;
			if($product->where($wh)->count()>0){
				$this->error("该分类下存在产品，不可删除");
			}
			*/
			$cate = $m->select();
			//载入Getcate类
			import("@.Class.Getcate");
			$childid = Getcate::getChildsId($cate,$id);
			$childid[]=$id; //加上当前id

			//删除所有分类下的产品
			M("Product")->where(array('cid'=>array('in',$childid)))->delete();

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
			$upload->savePath =  './Public/Uploads/Proclass/';// 设置附件上传目录
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
			$audit = I("get.audit");
			$where['id']=$id;
			$data['audit']=$audit;
			$m = M("Proclass");
			if($m->where($where)->save($data)){
				$this->success("操作成功",U("Productclas/pclist"));
			}
			
		}

		//产品图片（多张）
		public function imgupload(){
			$info = $this->_upload();
			$proid = I("get.proid"); //产品id
				$m = M("proclassimg");
				$data[protypeid]=$proid;
				$data[img]=$info[0][savename];
				$data[addtime]=time();
				$data[thumb_img2]="s_".$info[0][savename];
				//M("Product")->where("id=$proid")->save($pro_data_save);
				$imgid = $m->add($data);//插入数据库

				$info[0][imgid]=$imgid;
				echo json_encode($info[0]);
				
				
			
		}
		//产品分类图片列表
		public function otherimg(){
			$proid = I("get.proid");
			
			
				import("ORG.Util.Paged");
				$count = M("Proclassimg")->where("protypeid=$proid")->count();//总条数
				
				$page = new Page($count,25);
				$show = $page->show();
				$imagedata = M("Proclassimg")->where("protypeid=$proid")->limit($page->firstRow.','.$page->listRows)
				->select();

			$this->assign("imagedata",$imagedata);
			$this->assign("page",$show);
			$this->display();
		}

		//产品图片ajax删除
		public function img_del(){
			$id = I("get.id");
			$proid = M("Proclassimg")->where("id=$id")->find();
			$count = M("Proclassimg")->where("protypeid=$proid[proid]")->count();

			//if($count==1){
				//$pro_data_save[is_other_img]=0;//修改产品
				//M("Product")->where("id=$proid[proid]")->save($pro_data_save);
			//}

			if(M("Proclassimg")->where("id=$id")->delete()){
				echo "1";
			}else{
				echo "0";
			}
			
		}

	
	}

?>