<?php
	class AtlasAction extends CommonAction{
		//图册列表
		public function plist(){
			if(IS_POST){
			$searchtype = trim(I("post.searchtype"));
			$keyword = trim(I("post.keyword"));
			$isshow = trim(I("post.isshow"));
			$cid = trim(I("post.cid"));
			$lang = trim(I("post.lang"));
			
			if($searchtype==1 && $keyword!=""){
				$where2['atlname']=array("like","%".$keyword."%");
			}
			if($isshow!=2){
				$where2['tp_Atl.isshow']=$isshow;
			}
			//if($recomd!=2){
			//	$where2['isrecom']=$recomd;
			//}

			if($cid!=0){
				$where2['cid']=$cid;
			}
			if($lang!=2){
				$where2['lang']=$lang;
			}
			


			//分页
			$m = M("Atl");
			import("ORG.Util.Paged");
			$darr2 = $m->where($where2)->field('count(tp_atl.atlname) as num')
			->group("atlname")->select();
			$count = count($darr2);
			
			$page = new Page($count,20);
			foreach($where2 as $key=>$val) {
			    $page->parameter .="$key=".urlencode($val).'&';
			}
			

			$show = $page->show();


			$data = $m->order("id desc")->where($where2)->join('tp_atlclass on tp_atlclass.id=tp_atl.cid')
			->field('tp_atlclass.atlclassname,tp_atl.*,count(tp_atl.atlname) as num ')
			->limit($page->firstRow.','.$page->listRows)
			->group("tp_atl.atlname")
			->select();
			$this->assign("data",$data); //列表数据绑定
			$this->assign("page",$show);
			
			$n = M("Atlclass");
				
				$dataclass = $n->where("isshow=1")->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign('dat',$dataclass); //查询条件绑定
				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
		
		}else{
				$searchtype = trim(I("get.searchtype"));
				$keyword = trim(I("get.keyword"));
				$isshow = trim(I("get.tp_Atl_isshow"));
				$cid = trim(I("get.cid"));
				$lang = trim(I("get.lang"));
				
				if($searchtype==1 && $keyword!=""){
					$where2['atlname']=array("like","%".$keyword."%");
				}
				if($isshow!=2 && $isshow!=""){
					$where2['tp_Atl.isshow']=$isshow;
				}
				//if($recomd!=2){
				//	$where2['isrecom']=$recomd;
				//}

				if($cid!=0 && $cid!=""){
					$where2['cid']=$cid;
				}
				if($lang!=2 && $lang!=""){
					$where2['lang']=$lang;
				}
				$m = M("Atl");
				import("ORG.Util.Paged");//导入分页类
				$darr = $m->where($where2)->field('count(tp_atl.atlname) as num')
				->group("atlname")->select();
				$count = count($darr);
				
				
				
				$page = new Page($count,20);
				$show = $page->show(); //分页显示输出


				$data = $m->order("id desc")->where($where2)
				->join('tp_atlclass on tp_atl.cid = tp_atlclass.id')
				->field('tp_atlclass.atlclassname,tp_atl.*,count(tp_atl.atlname) as num ')
				->limit($page->firstRow.','.$page->listRows)
				->group("tp_atl.atlname")
				->select();
				
				$this->assign("data",$data);  //列表绑定
				$this->assign('page',$show);// 赋值分页输出
				
				
				//分类数据绑定
				$n = M("Atlclass");
				$where['isshow']=1;
				
				$dataclass = $n->where($where)->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign('dat',$dataclass); //查询条件绑定

				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
			}
		
			
				$this->display();
		}
		
		//图册添加
		public function add(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数错误");
				}
				
				if(empty($post[atlname])){
					$this->error("图册名称不能为空");
				}
				
				//检查名字是否唯一
				$wh['atlname']= trim($_POST['atlname']);
				$coun = M("Atl")->where($wh)->count();
				
				if($coun>0){
					$this->error("图册名称已存在");
				}
				
				if(!is_array($_POST[picname])){
					$this->error("必须要上传图片");
				}
				
				
				
				
				$cid = I("post.cid");
				$count = M("Atlclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				
				
				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("排序不能为空且必须是整数");
				}
				
				$m = M("Atl");
				if($m->create()){
					
					//组合新数组
					foreach($_POST['picname'] as $k=>$v){
						$arr[$k][picname]=$v;
					}
					foreach($_POST['savename'] as $k=>$v){
						$arr[$k][savename]=$v;
					}
					foreach($_POST['picdes'] as $k=>$v){
						$arr[$k][picdes]=$v;
					}
					
					foreach($_POST['pichref'] as $k=>$v){
						$arr[$k][pichref]=$v;
					}

					foreach($_POST['picorderby'] as $k=>$v){
						$arr[$k][picorderby]=$v;
					}
					
					$i=0;//添加成功标识符
					foreach($arr as $v){
						
						//加水印
						$settingimg = M("Config_info")->find();
						//判断是否开启
						if($settingimg[is_watermark]==1 && $settingimg[waterpic]!=""){
							import('ORG.Util.Imaged');
							$image = new Imaged();
							
							//添加水印  原图片,水印图片,添加后图片名,水印透明度,定位：
							/*
							*0 右下角
							*1 居中
							*2 左上角
							*3 右上角
							*4 左下角
							*/
							
							$image->water('./Public/Uploads/Atl/'.$v['savename'],'./Public/Uploads/Setting/'.$settingimg[waterpic],'',80,$settingimg[position]);
						}
							
					
					
					
						$m->atlname=$_POST['atlname'];
						$m->cid=$_POST['cid'];
						$m->atldes=$_POST['atldes'];

						$m->isshow=$_POST['isshow'];
						$m->isrecom=$_POST['isrecom'];
						$m->orderby=$_POST['orderby'];
						$m->lang=$_POST['lang'];
						
						$m->addtime = time();
						$m->createtime = strtotime($_POST['createtime']);
						
						
						$m->picname=$v['picname'];
						$m->savename=$v['savename'];
						$m->savenamethumb="s_".$v['savename'];
						$m->picdes=$v['picdes'];
						$m->pichref=$v['pichref'];
						$m->picorderby = $v['picorderby'];
						if($m->add()){
							$i++;
						}
					}
					
					if($i==count($arr)){
						if(isset($_POST['submit1'])){
							$this->success("添加成功",U("Atlas/plist"));
						}else{
							$this->success("添加成功",U("Atlas/add"));
						}
					
					}else{
						$this->error("添加失败");
					}
				}else{
					$this->error($m->getError());
				}
			}else{
				
				
				//编辑器
				//vendor("Fckeditor.fckeditor");	
				//$editor= new FCKeditor(); //实例化FCKeditor对象 
				//$editor->Width='408';//设置编辑器实际需要的宽度。此项省略的话，会使用默认的宽度。 
				//$editor->Height='262';//设置编辑器实际需要的高度。此项省略的话，会使用默认的高度。
				//$editor->ToolbarSet="Basic";
				
				//$this->Value='';//设置编辑器初始值。也可以是修改数据时的设定值。可以置空。
				//$editor->InstanceName='sjeditor';
				//$html=$editor->Createhtml();//创建在线编辑器html代码字符串,并赋值给字符串变量$html. 
				//$this->assign('html',$html);//将$html的值赋给模板变量$html.在模板里通过{$html}可以直接引用
				
				
				//排序自增
				$m = M("Atl");
				$arr = $m->query("select orderby from tp_atl order by orderby DESC limit 1");
				if(empty($arr)){
					$orderby = 1;
				}else{
					$orderby = $arr[0][orderby]+1;
				}
				$this->assign("orderby",$orderby);
				
				//初始绑定数据
				$m = M("Atlclass");
				$where['isshow']=1;
				
				$dataclass = $m->where($where)->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign('dataclass',$dataclass);
				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
				
			}
			$this->display();
			
			
		}
		
		//图册修改
		public function edit(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数错误");
				}
				
				if(empty($post[atlname])){
					$this->error("图册名称不能为空");
				}
				
				
				if(!is_array($_POST[picname])){
					$this->error("必须要上传图片");
				}
				
				
				$cid = I("post.cid");
				$count = M("Atlclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				

				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("排序不能为空且必须是整数");
				}
				
				$m = M("Atl");
				//删除原先数据
				$id = trim($_POST['id']);
				$olddata = $m->where("id=$id")->find();
				$w[atlname] = $olddata[atlname];
				if($m->where($w)->delete()){
					if($m->create()){
					
						//组合新数组
						foreach($_POST['picname'] as $k=>$v){
							$arr[$k][picname]=$v;
						}
						foreach($_POST['savename'] as $k=>$v){
							$arr[$k][savename]=$v;
						}
						foreach($_POST['picdes'] as $k=>$v){
							$arr[$k][picdes]=$v;
						}
						
						foreach($_POST['pichref'] as $k=>$v){
							$arr[$k][pichref]=$v;
						}

						foreach($_POST['picorderby'] as $k=>$v){
							$arr[$k][picorderby]=$v;
						}
						
						$i=0;//添加成功标识符
						foreach($arr as $v){
							//加水印
							$settingimg = M("Config_info")->find();
							//判断是否开启
							if($settingimg[is_watermark]==1 && $settingimg[waterpic]!=""){
								import('ORG.Util.Imaged');
								$image = new Imaged();
								
								//添加水印  原图片,水印图片,添加后图片名,水印透明度,定位：
								/*
								*0 右下角
								*1 居中
								*2 左上角
								*3 右上角
								*4 左下角
								*/
								
								$image->water('./Public/Uploads/Atl/'.$v['savename'],'./Public/Uploads/Setting/'.$settingimg[waterpic],'',80,$settingimg[position]);
							}
							
						
							$m->atlname=$_POST['atlname'];
							$m->cid=$_POST['cid'];
							$m->atldes=$_POST['atldes'];
							$m->isshow=$_POST['isshow'];
							$m->isrecom=$_POST['isrecom'];
							$m->orderby=$_POST['orderby'];
							$m->lang=$_POST['lang'];
							
							$m->addtimetime = time();
							$m->updatetime = time();
							$m->createtime = strtotime($_POST['createtime']);
							
							
							$m->picname=$v['picname'];
							$m->savename=$v['savename'];
							$m->savenamethumb="s_".$v['savename'];
							$m->picdes=$v['picdes'];
							$m->pichref=$v['pichref'];
							$m->picorderby=$v['picorderby'];
							if($m->add()){
								$i++;
							}
						}
						
						if($i==count($arr)){
								$this->success("修改成功",U("Atlas/plist"));
						}else{
								$this->error("修改失败");
						}
					}else{
						$this->error($m->getError());
					}
				}
				
				
				
				
				
			
			}else{
				
			
			
				//初始页面数据绑定
				$id = I("get.id");
				$m = M("Atl");
				$data = $m->where(array('id'=>$id))->find();
				$w['atlname'] = $data['atlname'];
				$datapic = $m->where($w)->order("picorderby DESC")->select();
				
				
				$dataonepic = $m->where($w)->find();
				
				$this->assign("datapic",$datapic);
				$this->assign("dataonepic",$dataonepic);
				
				//dump($datapic);
				
				//编辑器
				//vendor("Fckeditor.fckeditor");	
				//$editor= new FCKeditor(); //实例化FCKeditor对象 
				//$editor->Width='408';//设置编辑器实际需要的宽度。此项省略的话，会使用默认的宽度。 
				//$editor->Height='262';//设置编辑器实际需要的高度。此项省略的话，会使用默认的高度。
				//$editor->ToolbarSet="Basic";
				//if($data['issj']==0){
				//	$editor->Value="";
				//}else{
				//	$editor->Value=$data['sjprocon'];//设置编辑器初始值。也可以是修改数据时的设定值。可以置空。
				//}
					
				//$editor->InstanceName='sjeditor';
				//$html=$editor->Createhtml();//创建在线编辑器html代码字符串,并赋值给字符串变量$html. 
				//$this->assign('html',$html);//将$html的值赋给模板变量$html.在模板里通过{$html}可以直接引用
				
				
				
				
				
				$this->assign('data',$data);
				
				$n = M("Atlclass");
				
				$dataclass = $n->where("isshow=1")->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				$this->assign('dataclass',$dataclass);
				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
				
			}
		
			$this->display();
		}

		//图册预览
		public function preview(){
			
				
				
				//排序自增
				$m = M("Atl");
				$arr = $m->query("select orderby from tp_atl order by orderby DESC limit 1");
				if(empty($arr)){
					$orderby = 1;
				}else{
					$orderby = $arr[0][orderby]+1;
				}
				$this->assign("orderby",$orderby);
				
				//初始绑定数据
				$m = M("Atlclass");
				$where['isshow']=1;
				
				$dataclass = $m->where($where)->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign('dataclass',$dataclass);
				
			
			$this->display();
			
		}
		
		//图册删除
		public function delete(){
			$id = I("get.id");
			if($id>0){
				//$this->delfile($id);//载入删除文件方法
				//$this->delimg($id);//载入删除图片方法
				$m = M("Atl");
				$arr=$m->where("id=$id")->find();
				if($arr){
					$where['atlname']=$arr['atlname'];
					$del = $m->where($where)->delete();

					if($del){
						$this->success("删除成功",U("Atl/plist"));
					}else{

						$this->error("删除失败");
					}
				}
				
			}
		
		}
			//是否显示
		public function isshow(){
			$id = I("get.id");
			$isshow = I("get.isshow");
			
			if(isset($id) && $id>0){
				$m = M("Atl");
				$arr=$m->where("id=$id")->find();
				if($arr){
					$where['atlname']=$arr['atlname'];
					$data['isshow']=$isshow;
					$boo = $m->where($where)->save($data);
					if($boo){
						$this->success("操作成功",U("Atlas/plist"));
					}else{
						$this->error("操作失败");
					}
				}
				
			}
		}
		
		//批量删除
		public function pldelete(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Atl");
			
			//删除图片、删除文件
			//$arrid = explode(",",$str);
			
			//遍历删除
			//foreach($arrid as $v){
			//	$this->delfile($v);//删除文件
			//	$this->delimg($v);//删除图片
				
			//}
			
			//分割字符串转换为数组
			$arrid = explode(",",$str);
			foreach($arrid as $v){
				$da = $m->where("id=$v")->find();
				$where['atlname']=$da['atlname'];
				$m->where($where)->delete();
			}
			echo "1";
			
			
		}
		//批量显示
		public function plshow(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Atl");
			
			//字符串转换为数组
			$arr = explode(",",$str);
			
			$data['isshow']=1;
			$data['updatetime']=time();
			
			foreach($arr as $v){
				$da = $m->where("id=$v")->find();
				$where['atlname']=$da['atlname'];
				$m->where($where)->save($data);
			}
			echo "1";
			
		}
		
		//批量隐藏
		public function plhidden(){
		
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Atl");
			
			//字符串转换为数组
			$arr = explode(",",$str);
			
			$data['isshow']=0;
			$data['updatetime']=time();
			
			foreach($arr as $v){
				$da = $m->where("id=$v")->find();
				$where['atlname']=$da['atlname'];
				$m->where($where)->save($data);
			}
			echo "1";
		}
		
		
		
		//分类ajax
		public function ajax(){
			$cid = I("get.cid");
				$count = M("Atlclass")->where("pid=$cid")->count();
				if($count>0){
					echo "0";
				}else{
					echo "1";
				}
			
		}
		
		//检查名称是否唯一ajax
		public function ajaxname(){
			   $wh['atlname']= I("get.atlname");
				$coun = M("Atl")->where($wh)->count();
				
				if($coun>0){
					echo "0";
				}else{
					echo "1";
				}
		}
		
		
		//图片上传ajax
		public function imgupload(){
			$info = $this->_upload();
			//echo $info[0]['name'];
			echo json_encode($info[0]);
			
		}
		
		//图片上传方法(带缩略图)
		public function _upload(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/Atl/';// 设置附件上传目录
			$upload->thumb = true; //设置需要生成缩略图，仅对图像文件有效
			$upload->imageClassPath = 'ORG.Util.Image';//设置引用图片类库包路径
			$upload->thumbPrefix = 's_';  //生成1张缩略图
			$upload->thumbMaxWidth = '100';//最大宽度
			$upload->thumbMaxHeight = '80';//最大高度
			$upload->saveRule = uniqid;//设置上传文件规则
			
	
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{
			
			
			// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			
			return $info;
			}
		}
		
		//图册查看
		public function view(){
			$id = I("get.id");
		
			$m = M("Atl");
			$data = $m->where("id=$id")->find();
			$where['atlname']=$data['atlname'];
			
			$datapic = $m->where($where)->select();
			$this->assign("datapic",$datapic);
			$this->assign("data",$data);
			$this->display();
		}
	}

?>