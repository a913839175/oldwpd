<?php
	class SiteinfoAction extends CommonAction{
		public function index(){
			if(IS_POST){
				$post = I("post.");
				$m = M("Siteinfo");
				$m->create();
				$m->id=1;
				


				$info = $this->upload();
				
				if(!empty($_FILES[file1])){
					$m->slogo=$info[0][savename];
					$m->slothumb1="s_".$info[0][savename];
					$m->slothumb2="m_".$info[0][savename];
				}

				if(!empty($_FILES[file10])){
					$m->sjianjieimg=$info[0][savename];
					$m->sjianjieimg1="s_".$info[0][savename];
					$m->sjianjieimg2="m_".$info[0][savename];
				}
				
				$m->updatetime = time();

				
				if($m->save()){
					$this->success("设置成功");
				}else{
					$this->error("设置失败");
				}
				
			}else{
				$m = M("Siteinfo");
				$data = $m->find(1);
				$this->assign("data",$data);
			}
			$this->display();
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
			$upload->savePath =  './Public/Uploads/Siteinfo/';// 设置附件上传目录
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

		public function menu(){
			$filepath = "./Public/Xml/menu.xml";
			if(IS_POST){
				$check = I("post.check");
				
				foreach($check as $k=>$v){
					$arr_xml[$k][check]=$v;
					switch($v){
						case 1:
							$arr_xml[$k][values]="新闻中心";
						break;

						case 2:
							$arr_xml[$k][values]="产品中心";
						break;
						case 4:
							$arr_xml[$k][values]="留言管理";
						break;
						case 8:
							$arr_xml[$k][values]="会员管理";
						break;
						case 16:
							$arr_xml[$k][values]="招聘管理";
						break;
						case 32:
							$arr_xml[$k][values]="下载管理";
						break;
						case 64:
							$arr_xml[$k][values]="图册管理";
						break;
						case 128:
							$arr_xml[$k][values]="内容管理";
						break;
						case 256:
							$arr_xml[$k][values]="系统设置";
						break;
						case 512:
							$arr_xml[$k][values]="表单自定义";
						break;
						case 1024:
							$arr_xml[$k][values]="SEO管理";
						break;
						case 2048:
							$arr_xml[$k][values]="栏目管理";
						break;
						case 4096:
							$arr_xml[$k][values]="题库管理";
						break;
						
					}	
					
				}
				
				$str = "";
				$str.='<?xml version="1.0" encoding="utf-8"?>';
				$str.='<body>';
				foreach($arr_xml as $vo){
					$str.="<menu>";
					$str.="<column>".$vo[values]."</column>";
					$str.="<values>".$vo[check]."</values>";
					$str.="</menu>";
				}

				$str.='</body>';

				if(file_put_contents($filepath, $str)>0){
					$this->success("设置成功，请按F5刷新");
				}
			}
			$myxml = simplexml_load_file($filepath);
			$sum = 0;
			foreach($myxml as $v){
				$sum+=$v->values;
					
			}
			$this->assign("sum",$sum);
			
			$this->display();
		}

		public function set_answer(){
			$act = I("get.act");

			import('ORG.Util.Paged');// 导入分页类
			$count = M("Answer")->order("orderBy DESC")->count();
			$page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
			$show = $page->show();

			$data = M("Answer")->order("orderBy DESC")->limit($page->firstRow.','.$page->listRows)->select();
			foreach($data as $k=>$vo){
				$data[$k]['typeName']=M("Answertype")->where(array('id'=>$vo[cid]))->getField("typeName");
			}
			$this->assign("data",$data);
			$this->assign("page",$show);
			if($act==""){
				$act='add';
			}
			switch ($act) {
				case 'add':
					//排序
					$orderby = M("Answer")->order("orderBy DESC")->getField("orderBy");
					if($orderby==""){
						$orderbydata=1;
					}else{
						$orderbydata = (int)$orderby+1;
					}
					$this->assign("orderbydata",$orderbydata);

					//所属分类
					$cid_data = M("Answertype")->where(array('isShow'=>1))->select();
					$this->assign("cid_data",$cid_data);
					break;

				case 'addsave':
					$m = M("Answer");
					if($m->create()){
						$m->addtime=time();
						if($m->add()){
							$this->success("添加成功!",U('Siteinfo/set_answer',array('act'=>'add')));
						}else{
							$this->error("添加失败!");
						}
					}
					break;
				case 'edit':
					$id = I("get.id");
					$edit_data = M("Answer")->where(array('id'=>$id))->find();
					$this->assign("edit_data",$edit_data);

					//所属分类
					$cid_data = M("Answertype")->where(array('isShow'=>1))->select();
					$this->assign("cid_data",$cid_data);

					break;

				case 'editsave':
					$m = M("Answer");
					$editsave_id = I("post.editid");
					if($m->create()){
						$m->id = $editsave_id;
						$m->updatetime=time();
						if($m->save()){
							$this->success("修改成功!",U('Siteinfo/set_answer',array('act'=>'edit','id'=>$editsave_id)));
						}else{
							$this->error("修改失败!");
						}
					}
				break;

				case 'del':
					$id = I("get.id");
					if(M('Answer')->where(array('id'=>$id))->delete()){
						$this->success("删除成功!",U('Siteinfo/set_answer',array('act'=>'add')));
					}else{
						$this->error("删除失败!");
					}
				break;
				
				default:
					# code...
					break;
			}
			$this->display();
		}


		public function set_type(){
			$act = I("get.act");

			import('ORG.Util.Paged');// 导入分页类
			$count = M("Answertype")->order("orderBy DESC")->count();
			$page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
			$show = $page->show();

			$data = M("Answertype")->order("orderBy DESC")->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign("data",$data);
			$this->assign("page",$show);
			if($act==""){
				$act='add';
			}
			switch ($act) {
				case 'add':
					//排序
					$orderby = M("Answertype")->order("orderBy DESC")->getField("orderBy");
					if($orderby==""){
						$orderbydata=1;
					}else{
						$orderbydata = (int)$orderby+1;
					}
					$this->assign("orderbydata",$orderbydata);
					break;

				case 'addsave':
					$m = M("Answertype");
					if($m->create()){
						$m->addtime=time();
						if($m->add()){
							$this->success("添加成功!",U('Siteinfo/set_type',array('act'=>'add')));
						}else{
							$this->error("添加失败!");
						}
					}
					break;
				case 'edit':
					$id = I("get.id");
					$edit_data = M("Answertype")->where(array('id'=>$id))->find();
					$this->assign("edit_data",$edit_data);

					break;

				case 'editsave':
					$m = M("Answertype");
					$editsave_id = I("post.editid");
					if($m->create()){
						$m->id = $editsave_id;
						$m->updatetime=time();
						if($m->save()){
							$this->success("修改成功!",U('Siteinfo/set_type',array('act'=>'edit','id'=>$editsave_id)));
						}else{
							$this->error("修改失败!");
						}
					}
				break;

				case 'del':
					$id = I("get.id");
					M("Answer")->where(array('cid'=>$id))->delete();
					if(M('Answertype')->where(array('id'=>$id))->delete()){
						$this->success("删除成功!",U('Siteinfo/set_type',array('act'=>'add')));
					}else{
						$this->error("删除失败!");
					}
				break;
				
				default:
					# code...
					break;
			}
			$this->display();
		}

		//列表
		public function answer_view(){
			import('ORG.Util.Paged');// 导入分页类
			$count = M("Answer_view")->order("addtime DESC")->count();
			$page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
			$show = $page->show();

			
			$data = M("Answer_view")->order("addtime DESC")->limit($page->firstRow.','.$page->listRows)->select();
			foreach($data as $k=>$vo){
				$data[$k]['proname']=M("Product")->where(array('id'=>$vo[proId]))->getField("proname");
				$data[$k]['username']=M("User")->where(array('id'=>$vo[userId]))->getField("username");
			}
			$this->assign("data",$data);
			$this->assign("page",$show);
			$this->display();
		}



		//详情
		public function answer_view_info(){
			$id = I("get.id");

			//题目信息
			$data = M("Answer_view_info")->where(array('viewId'=>$id))->select();
			foreach($data as $k=>$vo){
				$data[$k][topicAnswers]='<br>'.str_replace(',', '<br>', $vo[topicAnswers]);
				$topicAnswers_arr = explode(',', $vo[topicAnswers]);
				$messAnswer_arr = explode(',', $vo[messAnswer]);
				$correctAnswer_arr = explode(',', $vo[correctAnswer]);


				//客户所选答案
				$topic_all='';
				foreach($messAnswer_arr as $v){
					$topic_all .= "<br>".$topicAnswers_arr[$v-1];
				}

				//正确答案

				$correct_all='';
				foreach ($correctAnswer_arr as $v) {
					$correct_all .="<br>".$topicAnswers_arr[$v-1];
				}

				
				$data[$k]['messAnswer']=$topic_all;
				$data[$k]['correctAnswer']=$correct_all;
			}
			
			$this->assign("data",$data);

			//总条数
			$total_num = count($data);

			//正确的数据
			$correct_num = M("Answer_view_info")->where(array('viewId'=>$id,'isCorrect'=>1))->count();

			//错误的数据
			$error_num = $total_num-$correct_num;

			//正确率
			$percentage = ($correct_num/$total_num)*100;

			$mess_info = "共有<font color=green>".$total_num."</font>道题&nbsp;&nbsp;"."正确<font color=green>".$correct_num."</font>道题&nbsp;&nbsp;"."错误<font color=red>".$error_num."</font>道题&nbsp;&nbsp;"."正确率为<font color=green>".$percentage."%</font>&nbsp;&nbsp;";

			$this->assign("mess_info",$mess_info);
			$this->display();
		}

		//详情汇总
		public function answer_view_ajax(){
			$hz_data = M("answer_view")->query("SELECT typeName,count(id) as count from tp_answer_view group by typeName;");
			echo json_encode($hz_data);
		}


		//删除
		public function answer_view_del(){
			$id = I("get.id");
			$m = M("Answer_view");
			$n = M("Answer_view_info");
			$m->where(array('id'=>$id))->delete();
			$n->where(array('viewId'=>$id))->delete();
		}

		//批量删除
		public function answer_view_pldel(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Answer_view");
			$n = M("Answer_view_info");
			$where['id']=array("in",$str);
			$where1['viewId']=array("in",$str);
			if(($m->where($where)->delete()) && ($n->where($where1)->delete())){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
?>