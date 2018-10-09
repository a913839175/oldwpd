<?php
	class DownAction extends CommonAction{
	
		public $info;
	
		//下载列表
		public function plist(){
		if(IS_POST){
			$searchtype = trim(I("post.searchtype"));
			$keyword = trim(I("post.keyword"));
			$isshow = trim(I("post.isshow"));
			$isrecom = trim(I("post.isrecom"));
			$cid = trim(I("post.cid"));
			$lang = trim(I("post.lang"));
			
			if($searchtype==1 && $keyword!=""){
				$where2['filename']=array("like","%".$keyword."%");
			}
			if($isshow!=2){
				$where2['tp_down.isshow']=$isshow;
			}
			if($isrecom!=2){
				$where2['isrecom']=$isrecom;
			}

			if($cid!=0){
				$where2['cid']=$cid;
			}
			if($lang!=2){
				$where2['tp_down.lang']=$lang;
			}
			$m = M("Down");
			import("ORG.Util.Paged");
			$count = $m->where($where2)->count();//总条数
			
			$page = new Page($count,20);
			foreach($where2 as $key=>$val) {
			    $page->parameter .="$key=".urlencode($val).'&';
			}
			$show = $page->show();


			$data = $m->order("id desc")->where($where2)->join('tp_downclass on tp_downclass.id=tp_down.cid')->field('tp_downclass.downclassname,tp_down.*')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign("data",$data); //列表数据绑定
			$this->assign("page",$show);
			
			$n = M("Downclass");
				
				$dataclass = $n->where("isshow=1")->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
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
			$isshow = trim(I("get.tp_down_isshow"));
			$isrecom = trim(I("get.isrecom"));
			$cid = trim(I("get.cid"));
			$lang = trim(I("get.tp_down_lang"));
			
			if($searchtype==1 && $keyword!=""){
				$where2['filename']=array("like","%".$keyword."%");
			}
			if($isshow!=2 && $isshow!=""){
				$where2['tp_down.isshow']=$isshow;
			}
			if($isrecom!=2 && $isrecom!=""){
				$where2['isrecom']=$isrecom;
			}

			if($cid!=0 && $cid!=""){
				$where2['cid']=$cid;
			}
			if($lang!=2 && $lang!=""){
				$where2['lang']=$lang;
			}
			$m = M("Down");
			import("ORG.Util.Paged");//导入分页类
			$count = $m->where($where2)->count();
			$page = new Page($count,20);
			$show = $page->show(); //分页显示输出


			$data = $m->order("id desc")->where($where2)->join('tp_downclass on tp_down.cid = tp_downclass.id')->field('tp_downclass.downclassname,tp_down.* ')
			->limit($page->firstRow.','.$page->listRows)->select();
			
			$this->assign("data",$data);  //列表绑定
			$this->assign('page',$show);// 赋值分页输出
				
				
				//分类数据绑定
				$n = M("Downclass");
				$where['isshow']=1;
				
				$dataclass = $n->where($where)->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
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
		
		//下载添加
		public function add(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数错误");
				}
				
				if(empty($post[filecontent])){
					$this->error("文件不能为空");
				}
				
				if(empty($post[filename])){
					$this->error("文件名称不能为空");
				}
				
				if($post['is_pic']==1){
					if($post['pic']==""){
					$this->error("缩略图必须要上传");
					}
				}
				
				$cid = I("post.cid");
				$count = M("Downclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				
				
				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("排序不能为空且必须是整数");
				}
				
				$m = M("Down");
				if($m->create()){
					$m->addtime = time();
					$m->createtime = strtotime($_POST['createtime']);
					if($post[ispic]==1){
						$m->pic = $post[pic];
						$m->picthumb = "s_".$post[pic];
					}
					else{
						$m->pic="";
						$m->picthumb = "";
					}
					
					if($m->add()){
						if(isset($_POST['submit1'])){
							$this->success("添加成功",U("Down/plist"));
						}else{
							$this->success("添加成功",U("Down/add"));
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
				$m = M("Down");
				$arr = $m->query("select orderby from tp_down order by orderby DESC limit 1");
				if(empty($arr)){
					$orderby = 1;
				}else{
					$orderby = $arr[0][orderby]+1;
				}
				$this->assign("orderby",$orderby);
				
				//初始绑定数据
				$m = M("Downclass");
				$where['isshow']=1;
				
				$dataclass = $m->where($where)->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
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
		
		//下载修改
		public function edit(){

			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数错误");
				}
				
				if(empty($post[filecontent])){
					$this->error("文件不能为空");
				}
				
				if(empty($post[filename])){
					$this->error("文件名称不能为空");
				}
				
				if($post['is_pic']==1){
					if($post['pic']==""){
					$this->error("缩略图必须要上传");
					}
				}
				
				$cid = I("post.cid");
				$count = M("Downclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				
				
				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("排序不能为空且必须是整数");
				}
				
				$m = M("Down");
				if($m->create()){
					$m->updatetime=time();
					$m->createtime = strtotime($_POST['createtime']);
					
					if($post[ispic]==1 && $post[pic]!=""){
						$m->pic = $post[pic];
						$m->picthumb = "s_".$post[pic];
					}
					else{
						$m->pic="";
						$m->picthumb = "";
					}
					
					if($m->save()){
					$this->success("修改成功",U("Down/plist"));
					}else{
						$this->error("修改失败");
					}
					
				}else{
					$this->error($m->getError());
				}
				



				
				

				
			
			}else{
				
			
			
				//初始页面数据绑定
				$id = I("get.id");
				$m = M("Down");
				$data = $m->where(array('id'=>$id))->find();
				$arrstr =explode('.',$data['filecontent']);
				$data['type']=$arrstr[count($arrstr)-1];
				
				
				
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
				
				$n = M("Downclass");
				
				$dataclass = $n->where("isshow=1")->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
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
		
		//删除
		public function delete(){
			$id = I("get.id");
			if($id>0){
				$this->delfile($id);//载入删除文件方法
				$this->delimg($id);//载入删除图片方法
				
				$m = M("Down");
				$del = $m->where(array('id'=>$id))->limit(1)->delete();

				if($del){
					$this->success("删除成功",U("Down/plist"));
				}else{

					$this->error("删除失败");
				}
			}
		
		}
		

		//是否显示
		public function isshow(){
			$id = I("get.id");
			$isshow = I("get.isshow");
			
			if(isset($id) && $id>0){
				$m = M("Down");
				$where['id']=$id;
				$data['isshow']=$isshow;
				$boo = $m->where($where)->save($data);
				if($boo){
					$this->success("操作成功",U("Down/plist"));
				}else{
					$this->error("操作失败");
				}
			}
		}
		
		//是否推荐
		public function isrecom(){
			$id = I("get.id");
			$isrecom = I("get.isrecom");
			if(isset($id) && $id>0){
				$m = M("Product");
				$where['id']=$id;
				$data['isrecom']= $isrecom;
				$boo = $m->where($where)->save($data);
				if($boo){
					$this->success("操作成功",U("Product/plist"));
				}else{
					$this->error("操作失败");
				}
			}
		}
		
		
		//分类ajax
		public function ajax(){
			$cid = I("get.cid");
				$count = M("Downclass")->where("pid=$cid")->count();
				if($count>0){
					echo "0";
				}else{
					echo "1";
				}
			
		}
		
	
		
		//文件上传ajax
		public function fileajax(){
			$info = $this->_upload2();
			echo json_encode($info[0]);
		}
		
		//图片上传ajax
		public function Imgajax(){
			$info = $this->_upload();
			echo json_encode($info[0]);
		}
		
		
		
		
		//文件上传方法
		public function _upload2(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			//$upload->maxSize  = 5000000 ;// 设置附件上传大小
			$upload->allowExts  = array();// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/Down/File/';// 设置附件上传目录
			$upload->thumb = false; //设置需要生成缩略图，仅对图像文件有效
			//$upload->imageClassPath = 'ORG.Util.Image';//设置引用图片类库包路径
			//$upload->thumbPrefix = 'm_,s_';  //生成2张缩略图
			//$upload->thumbMaxWidth = '400,100';//最大宽度
			//$upload->thumbMaxHeight = '400,100';//最大高度
			$upload->saveRule = uniqid;//设置上传文件规则
			
	
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			return $info;
			}
		}
		
		
		//图片上传方法(带缩略图)
		public function _upload(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/Down/Img/';// 设置附件上传目录
			$upload->thumb = true; //设置需要生成缩略图，仅对图像文件有效
			$upload->imageClassPath = 'ORG.Util.Image';//设置引用图片类库包路径
			$upload->thumbPrefix = 's_';  //生成1张缩略图
			$upload->thumbMaxWidth = '100';//最大宽度
			$upload->thumbMaxHeight = '80';//最大高度
			$upload->saveRule = uniqid;//设置上传文件规则
			
	
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			return $info;
			}
		}
			 
		//批量删除
		public function pldelete(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Down");
			
			//删除图片、删除文件
			$arrid = explode(",",$str);
			
			//遍历删除
			foreach($arrid as $v){
				$this->delfile($v);//删除文件
				$this->delimg($v);//删除图片
				
			}
			
			$where['id']=array("in",$str);
			if($m->where($where)->delete()){
				echo "1";
			}else{
				echo "0";
			}
		}
		//批量显示
		public function plshow(){
		
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Down");
			
			$where['id']=array("in",$str);
			$data['isshow']=1;
			$data['updatetime']=time();
			if($m->where($where)->save($data)){
				echo "1";
			}else{
				echo "0";
			}
		}
		
		//批量隐藏
		public function plhidden(){
		
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Down");
			
			$where['id']=array("in",$str);
			$data['isshow']=0;
			$data['updatetime']=time();
			if($m->where($where)->save($data)){
				echo "1";
			}else{
				echo "0";
			}
		}
		
		//批量移动
		public function list_class(){
			
			if(IS_POST){
			$str = I("post.str");
			$str = $str."0";//补0
			$m = M("Down");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Downclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
			}
			
			$where['id']=array("in",$str);
			$data1['cid']=$cid;
			$data1['updatetime']=time();
			if($m->where($where)->save($data1)){
				$this->success("移动成功");
				
			}else{
				$this->error("移动失败");
			}
			
			}else{
				//绑定分类
				$m = M("Downclass");
				$data = $m->select();
				$list = $m->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);

				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
			}
			
			
			$this->display();
			
		}
		
		//批量复制
		public function list_class2(){
			
			if(IS_POST){
			$str = I("post.str");
			$str = $str."0";//补0
			$m = M("Down");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Downclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
			}
			
			
			$arr = explode(",",$str);
			
			$i=0;
			foreach($arr as $v){
					
				if($v!=0){
					$data1 = $m->where("id=$v")->find();
					$data1['cid']=$cid;
					$data1['id']="";
					//$data1['addtime']=time();
					//$data1['updatetime']="";
					if($m->add($data1)){
						$i=$i+1;
					}
					
				}
			}
			if($i>0){
				$this->success("共有".$i."个复制成功");
			}else
			{
				$this->error("复制失败");
			}
			
			
			
			
			exit;
			
			
			
			}else{
				//绑定分类
				$m = M("Downclass");
				$data = $m->select();
				$list = $m->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
			}
			
			
			$this->display();
			
		}
		
		//删除文件
		public function delfile($id){
			$m = M("Down");
			$data = $m->where("id=$id")->find();
			$filepath = "./Public/Uploads/Down/File/".$data['filecontent'];
			
			$where['filecontent'] = $data['filecontent'];
			$num = $m->where($where)->count();
			//dump($num);
			if(file_exists($filepath) && $num==1)
			{
				if(unlink($filepath)){
						return true;
					}else{
						return false;
					}
			}
			
		}
		//删除图片
		public function delimg($id){
			$m = M("Down");
			$data = $m->where("id=$id")->find();
			$filepath1 = "./Public/Uploads/Down/Img/".$data['pic'];
			$filepath2 = "./Public/Uploads/Down/Img/".$data['picthumb'];
				
				$where['pic']=$data['pic'];
				$num = $m->where($where)->count();
				if($num==1){
					if(file_exists($filepath1) || file_exists($filepath2)){
					unlink($filepath1);//删除原图
					unlink($filepath2);//删除缩略图
					}
				}
			
				
			
		}
		//文件下载
		public function download(){
			$id = I("get.id","","trim");
			if($id<1){
				$this->error("参数错误");
			}
			$m = M("Down");
			$arr = $m->where("id=$id")->find();
			
			$filename = $arr['filecontent'];
			$realarr = explode(".",$filename);
			$realname = $arr['filename'].".".$realarr[count($realarr)-1];
			
			
			$filepath = './Public/Uploads/Down/File/'.$filename;
			if(!file_exists($filepath)){
				$this->error("文件不存在");
			}
			
			
			//解决不同浏览器下载中文乱码问题
			$ua = $_SERVER["HTTP_USER_AGENT"]; 
			 $encoded_realname = urlencode($realname);
			 $encoded_realname = str_replace("+", "%20", $encoded_realname);  
			
			header('Content-Type: application/octet-stream');
			if(preg_match("/MSIE/", $ua)){
				header('Content-Disposition: attachment; filename="' . $encoded_realname . '"');  
			} else if (preg_match("/Firefox/", $ua)){
				header('Content-Disposition: attachment; filename*="utf8\'\'' . $realname . '"');  
			} else {  
			header('Content-Disposition: attachment; filename="' . $realname . '"');   
			}  
			readfile($filepath);
			exit;
		}

		public function preview(){
			
				
				
			//排序自增
			$m = M("Down");
			$arr = $m->query("select orderby from tp_down order by orderby DESC limit 1");
			if(empty($arr)){
				$orderby = 1;
			}else{
				$orderby = $arr[0][orderby]+1;
			}
			$this->assign("orderby",$orderby);
				
			//初始绑定数据
			$m = M("Downclass");
			$where['isshow']=1;
				
			$dataclass = $m->where($where)->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
			foreach($dataclass as $key=>$value){
				$dataclass[$key]['count']=count(explode('-',$value['bpath']));
			}
				
				$this->assign('dataclass',$dataclass);
				$this->display();
		}

	}
?>