<?php
	//图册分类管理
	class AtlasclasAction extends CommonAction{
		//分类列表
		public function pclist(){
			$m = M("Atlclass");
			import("ORG.Util.Paged");
			$count = $m->count();
			$page = new Page($count,20);
			$show = $page->show();


			$data = $m->field("id,pid,atlclassname,path,addtime,isshow,concat(path,'-',id) as bpath")->order('bpath')->limit($page->firstRow.','.$page->listRows)->select();
			
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
				$m = D("Atlclass");
				
				//检查是否唯一
				//$where['atlclassname'] =$_POST['atlclassname'];
				//$count = $m->where($where)->count();
				//if($count>0){
				//	$this->error("该分类名称已存在，请检查!");
				//}
				
				if($m->create()){
						$m->picthumb1="s_".$_POST['pic'];
						$m->picthumb2="m_".$_POST['pic'];
						$m->addtime=time();
					if($m->add()){
						if(isset($_POST['submit1'])){
							$this->success("添加成功",U("Atlasclas/pclist"));
						}else{
							$this->success("添加成功",U("Atlasclas/add"));
						}
						
					}else{
					$this->error("添加失败");
					}
				}else{
					$this->error($m->getError());
				}
				
			}else{
				//绑定数据
				$m = M("Atlclass");
				$list = $m->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				//dump($list);
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				
				$this->assign("alist",$list);
			}
			$this->display();
		
		}
		
		//分类修改
		public function edit(){
			if(IS_POST){
					$m = M("Atlclass");
					
					if($_POST['atlclassname']==""){
						$this->error("分类名称不能为空");
					}
					
					if($_POST['pic']==""){
						$this->error("分类图片不能为空");
					}
					
					if($m->create()){
						$m->updatetime=time();
						if($m->save()){
							$this->success("修改成功",U("Atlasclas/pclist"));
						}else{
							$this->error("修改失败");
						}
					}else{
						$this->error($m->getError());
					}
				
			}else{
			//数据绑定
				$m = M("Atlclass");
				$id = I("get.id");
				
				if(isset($id) && $id>0){
					$where['id']=$id;
					$data = $m->where($where)->find();
					$this->assign("data",$data);
				}
				
			}
		
		
			$this->display();
		}
		
		//分类删除
		public function delete(){
			$id = I("get.id");
			$m = M("Atlclass");
			$count = $m->where("pid=$id")->count();
			if($count>0){
				$this->error("删除失败，该分类下存在子分类");
			}
			
			$Atl = M("Atl");
			$wh['cid']=$id;
			if($Atl->where($wh)->count()>0){
				$this->error("该分类下存在下载数据，不可删除");
			}
			if($m->where(array('id'=>$id))->delete()){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
			
			
		}
		
		
		//图片上传ajax
		public function Imgajax(){
			$info = $this->_upload();
			echo json_encode($info[0]);
		}
		
		
		//文件上传方法(带缩略图)
		public function _upload(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/Atlclass/';// 设置附件上传目录
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
		public function isshow(){
			$id = I("get.id");
			$isshow = I("get.isshow");
			$where['id']=$id;
			$data['isshow']=$isshow;
			$m = M("Atlclass");
			if($m->where($where)->save($data)){
				$this->success("操作成功",U("Atlasclas/pclist"));
			}
			
		}
	} 
?>