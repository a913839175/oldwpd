<?php
	class ContentAction extends CommonAction{
		//新闻列表
		public function clist(){
		if(IS_POST){
			$searchtype = $_REQUEST[searchtype];
			$keyword = $_REQUEST[keyword];
			$isshow = $_REQUEST[isshow];
			$isrecom = $_REQUEST[isrecom];
			$cid = $_REQUEST[cid];
			$lang = $_REQUEST[lang];

			
			if($searchtype==1 && $keyword!=""){
				$where2['title']=array("like","%".$keyword."%");
			}else if($searchtype==2 && $keyword!=""){
				$where2['concon']=array("like","%".$keyword."%");
			}
			if($isshow!=2){
				$where2['tp_content.isshow']=$isshow;
			}
			if($isrecom!=2){
				$where2['isrecom']=$isrecom;
			}

			if($cid!=0){
				$where2['cid']=$cid;
			}
			if($lang!=2){
				$where2['tp_content.lang']=$lang;
			}
			$m = M("Content");
			import("ORG.Util.Paged");
			$count = $m->where($where2)->count();//总条数
			
			$page = new Page($count,20);
			foreach($where2 as $key=>$val) {
			    $page->parameter .="$key=".urlencode($val).'&';
			}
			$show = $page->show();


			//$data = $m->where($where2)->select();
			$data = $m->order("orderby asc")->where($where2)->join('tp_conclass on tp_conclass.id=tp_content.cid')->field('tp_conclass.conclassname,tp_content.*')->limit($page->firstRow.','.$page->listRows)->select();
			
			//dump($data);
			$this->assign("data",$data); //列表数据绑定
			$this->assign("page",$show);
			
			$n = M("Conclass");
				
				$dataclass = $n->where("isshow=1")->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign('dat',$dataclass); //查询条件绑定

				//语言版本取值
				$lang_data = SettingAction::getLang();
				
				$this->assign("lang_data",$lang_data);
		
		}else{

			$searchtype = $_REQUEST[searchtype];
			$keyword = $_REQUEST[keyword];
			$isshow = $_REQUEST[tp_content_isshow];
			$isrecom = $_REQUEST[isrecom];
			$cid = $_REQUEST[cid];
			$lang = $_REQUEST[tp_content_lang];
			if($searchtype==1 && $keyword!=""){
				$where2['title']=array("like","%".$keyword."%");
			}else if($searchtype==2 && $keyword!=""){
				$where2['concon']=array("like","%".$keyword."%");
			}
			if($isshow!=2 && $isshow!=""){
				$where2['tp_content.isshow']=$isshow;
			}
			if($isrecom!=2 && $isrecom!=""){
				$where2['isrecom']=$isrecom;
			}

			if($cid!=0 && $cid!=""){
				$where2['cid']=$cid;
			}
			if($lang!=2 && $lang!=""){
				$where2['tp_content.lang']=$lang;
			}

			$m = M("Content");
			import("ORG.Util.Paged");//导入分页类
			$count = $m->where($where2)->count();
			$page = new Page($count,20);
			$show = $page->show(); //分页显示输出


			$data = $m->where($where2)->order("orderby asc")->join('tp_conclass on tp_content.cid = tp_conclass.id')->field('tp_conclass.conclassname,tp_content.* ')
			->limit($page->firstRow.','.$page->listRows)->select();
			
			$this->assign("data",$data);  //列表绑定
			$this->assign('page',$show);// 赋值分页输出

				$n = M("Conclass");
				$where['isshow']=1;
				
				$dataclass = $n->where($where)->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
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
		
		//新闻添加
		public function add(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数错误");
				}
				if(empty($post[title])){
					$this->error("新闻标题不能为空");
				}
				
				$cid = I("post.cid");
				$count = M("Conclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("新闻排序不能为空且必须是整数");
				}
				
				
				$m = M("Content");
				$m->create();
			
				if($_FILES){
					$info = $this->upload();  //加载upload方法
					$m->conphoto=$info[0][savename];
					$m->conthumb1="s_".$info[0][savename];
					$m->conthumb2="m_".$info[0][savename];
				}
				if($_POST['contype']==0){
					$m->title_href="";
				}else if($_POST['contype']==1){
					$m->concon="";
				}
				
				//转换日期为时间戳
				if($_POST['showdate']!=""){
					$m->showdate=strtotime($_POST['showdate']);
				}

				$m->addtime = time();
				$m->sjprocon=$_POST['sjprocon'];

				//标签添加
				$tag_all_arr = $_POST[tag_name1];
				$m->tag_id=implode(",", $tag_all_arr);
				

			
				
				$add_con_id = $m->add();
				
				if($add_con_id ){
					if(isset($_POST['submit1'])){
						$this->success("添加成功",U("Content/clist"));
					}else{
						$contypedata = M("Content")->where("id=$add_con_id")->find();
						$this->success("添加成功",U("Content/add",array('ccid'=>$contypedata[cid])));
					}
					
				}else{
					$this->error("添加失败");
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
				
				
				//初始绑定数据
				$m = M("Conclass");
				$where['isshow']=1;
				
				$dataclass = $m->where($where)->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				$orderby1 = M("Content")->order("orderby DESC")->limit(1)->find();
				
				if($orderby1){
					$orderbydata=$orderby1[orderby]+1;
				}else{
					$orderbydata=1;
				}
				
				
				
				//dump($zdydata);
				//$this->assign("zdydata",$zdydata);
				$this->assign("orderbydata",$orderbydata);
				$this->assign('dataclass',$dataclass);

				//标签赋值
				$tag_data_new = M("Tag")->where(array('type'=>1))->select();
				$this->assign("tag_data_new",$tag_data_new);

				//语言版本取值
				$lang_data = SettingAction::getLang();
	
				$this->assign("lang_data",$lang_data);
				
			}
			$this->display();
			
			
		}



		
		//自定义字段ajax_添加
		public function add_custom_ajax(){
			$module_id = I("get.module_id",1);//获取模块id  1表示新闻  2表示产品 5表示内容 7表示下载 8表示图册
			switch($module_id){
				case 1:
					$cid = I("get.cid");
					$bool = M("Conclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$num_i=time();//加入时间戳，保证id每次都不重复
						$zdydata = $this->getAllField(1,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 2:
					$cid = I("get.cid");
					$bool = M("Proclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$num_i=time();//加入时间戳，保证id每次都不重复
						$zdydata = $this->getAllField(2,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 5:
					$cid = I("get.cid");
					$bool = M("Concate")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$num_i=time();//加入时间戳，保证id每次都不重复
						$zdydata = $this->getAllField(5,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 7:
					$cid = I("get.cid");
					$bool = M("Downclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$num_i=time();//加入时间戳，保证id每次都不重复
						$zdydata = $this->getAllField(7,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 8:
					$cid = I("get.cid");
					$bool = M("Atlclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$num_i=time();//加入时间戳，保证id每次都不重复
						$zdydata = $this->getAllField(8,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
			}

			
			
			
		}
		//新闻修改
		public function edit(){

			if(IS_POST){
				$post = I("post.");
				$isphoto = I("post.isphoto","",'trim');
				$files = $_FILES;
				
				if(empty($post)){
					$this->error("参数错误");
				}
				if(empty($post[title])){
					$this->error("新闻标题不能为空");
				}
				
				$cid = I("post.cid");
				$count = M("Conclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("新闻排序不能为空且必须是整数");
				}
		
				$m = M("Content");
				if($m->create()){

					if(!empty($files[conphoto])){
						$info = $this->upload();
						$m->conphoto=$info[0]['savename'];
						$m->conthumb1="s_".$info[0]['savename'];
						$m->conthumb2="m_".$info[0]['savename'];
					}else{

						if($isphoto==0){
							$m->conphoto="";
							$m->conthumb1="";
							$m->conthumb2="";
						}
					}

					if($_POST['contype']==0){
						$m->title_href="";
					}else if($_POST['contype']==1){
						$m->concon="";
					}
					
					//转换日期为时间戳
					if($_POST['showdate']!=""){
						$m->showdate=strtotime($_POST['showdate']);
					}

					//标签修改
					$tag_all_arr = $_POST[tag_name1];
					$m->tag_id=implode(",", $tag_all_arr);

					$m->updatetime=time();
					$m->sjprocon=$_POST['sjprocon'];

				

					//获取分页p
					$p = $_POST['p'];
					
					if($m->save()){
						$this->success("修改成功",U("Content/clist",array("p"=>"$p")));
					}else{
						$this->error("修改失败");
					}
				}else{
						$this->error($m->getError());
				}
				

			
			}else{
				
				//初始页面数据绑定
				$id = I("get.id");
				$m = M("Content");
				$data = $m->where(array('id'=>$id))->find();

				//编辑器
				//vendor("Fckeditor.fckeditor");	
				//$editor= new FCKeditor(); //实例化FCKeditor对象 
				//$editor->Width='408';//设置编辑器实际需要的宽度。此项省略的话，会使用默认的宽度。 
				//$editor->Height='262';//设置编辑器实际需要的高度。此项省略的话，会使用默认的高度。
				//$editor->ToolbarSet="Basic";
				
				//if($data['issj']==0){
				//	$editor->Value='';//设置编辑器初始值。也可以是修改数据时的设定值。可以置空。
				//}else{
				//	$editor->Value=$data['sjprocon'];//设置编辑器初始值。也可以是修改数据时的设定值。可以置空。
				//}
				
				
				
				
				//$editor->InstanceName='sjeditor';
				//$html=$editor->Createhtml();//创建在线编辑器html代码字符串,并赋值给字符串变量$html. 
				//$this->assign('html',$html);//将$html的值赋给模板变量$html.在模板里通过{$html}可以直接引用
				
				//相关新闻绑定值
				$othernewswhere['id']=array("in",$data[othernews]);
				$othernewsdata = M("Content")->where($othernewswhere)->select();
				foreach($othernewsdata as $key=>$v){
					$othernewsdata[$key]=$v[title];
				}
				$othernewsstr = implode("<br>",$othernewsdata);
				$this->assign("othernewsstr",$othernewsstr);
				
				
				//相关产品绑定值
				$otherprowhere['id']=array("in",$data[otherpro]);
				$otherprodata = M("Product")->where($otherprowhere)->select();
				foreach($otherprodata as $key=>$v){
					$otherprodata[$key]=$v[proname];
				}
				$otherprostr = implode("<br>",$otherprodata);
				$this->assign("otherprostr",$otherprostr);
				
				//相关下载绑定值
				$otherdownwhere['id']=array("in",$data[otherdown]);
				$otherdowndata = M("Down")->where($otherdownwhere)->select();
				foreach($otherdowndata as $key=>$v){
					$otherdowndata[$key]=$v[filename];
				}
				$otherdownstr = implode("<br>",$otherdowndata);
				$this->assign("otherdownstr",$otherdownstr);
			
				

	
				$n = M("Conclass");
				
				$dataclass = $n->where("isshow=1")->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				
				//当前新闻的标签
				$news_tag_data = M("Tag")->where(array('id'=>array('in',$data[tag_id])))->select();
				$this->assign("news_tag_data",$news_tag_data);
			

				//自定义字段
				//$zdydata = $this->editAllField($data,1);
				
				//dump($zdydata);
				$this->assign('data',$data); //数据
				$this->assign('dataclass',$dataclass);//分类数据
				//$this->assign("zdydata",$zdydata);//自定义数据

				//标签赋值
				$tag_data_new = M("Tag")->where(array('type'=>1))->select();
				$this->assign("tag_data_new",$tag_data_new);

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);

				
			}
		
		
			$this->display();
		
		}
		//自定义字段ajax_修改
		public function edit_custom_ajax(){
			$module_id = I("get.module_id",1);//获取模块id 1表示新闻模块 2表示产品模块 5表示内容模块
			switch($module_id){

				case 1:
					$cid = I("get.cid");//取得新闻分类id
					$bool = M("Conclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$id = I("get.id"); //取得新闻id
						$num_i=time();//取得时间戳，保证id不重复
						$data = M("Content")->where(array('id'=>$id))->find();
						$zdydata = $this->editAllField($data,1,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 2:
					$cid = I("get.cid");//取得产品分类id
					$bool = M("Proclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$id = I("get.id"); //取得产品id
						$num_i=time();//取得时间戳，保证id不重复
						$data = M("Product")->where(array('id'=>$id))->find();
						$zdydata = $this->editAllField($data,2,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 5:
					$cid = I("get.cid");//取得内容分类id
					$bool = M("Concate")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$id = I("get.id"); //取得内容id
						$num_i=time();//取得时间戳，保证id不重复
						$data = M("Pacontent")->where(array('id'=>$id))->find();
						$zdydata = $this->editAllField($data,5,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 7:
					$cid = I("get.cid");//取得内容分类id
					$bool = M("Downclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$id = I("get.id"); //取得内容id
						$num_i=time();//取得时间戳，保证id不重复
						$data = M("Down")->where(array('id'=>$id))->find();
						$zdydata = $this->editAllField($data,7,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;
				case 8:
					$cid = I("get.cid");//取得内容分类id
					$bool = M("Atlclass")->where("pid=$cid")->find();
					if($bool){
						echo "0";
					}else{
						$id = I("get.id"); //取得内容id
						$num_i=time();//取得时间戳，保证id不重复
						$data = M("Atl")->where(array('id'=>$id))->find();
						$zdydata = $this->editAllField($data,8,$cid,$num_i);
						echo json_encode($zdydata);
					}
				break;

			}

			
			
			
		}
		
		//新闻删除
		public function delete(){
			$id = I("get.id");
			if($id>0){
				$m = M("Content");
				$del = $m->where(array('id'=>$id))->limit(1)->delete();
				if($del){
					$this->success("删除成功",U("Content/clist"));
				}else{
					$this->error("删除失败");
				}
			}
		
		}
		
		//新闻排序
		public function orderby(){
			if(IS_POST){
				$post=$_POST;
				if(empty($post) || $post==""){
					$this->error("没有数据，不能排序");
				}
				//dump($_POST);
				
				
				$orderarr = $post[orderby][order];
				$idarr = $post[orderby][id];
				for($i=0;$i<count($orderarr);$i++){
							$id = $idarr[$i];
							$data['orderby']=$orderarr[$i];
							M("Content")->where("id=$id")->save($data);
				}
				$this->success("排序成功");
				
			}
		}
		
		
		//是否显示
		public function isshow(){
			$id = I("get.id");
			$isshow = I("get.isshow");
			
			if(isset($id) && $id>0){
				$m = M("Content");
				$where['id']=$id;
				$data['isshow']=$isshow;
				$boo = $m->where($where)->save($data);
				if($boo){
					$this->success("操作成功",U("Content/clist"));
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
				$m = M("Content");
				$where['id']=$id;
				$data['isrecom']= $isrecom;
				$boo = $m->where($where)->save($data);
				if($boo){
					$this->success("操作成功",U("Content/clist"));
				}else{
					$this->error("操作失败");
				}
			}
		}
		
		
		//分类ajax 验证分类
		public function ajax(){
			$cid = I("get.cid");
				$count = M("Conclass")->where("pid=$cid")->count();
				if($count>0){
					echo "0";
				}else{
					echo "1";
				}
				
			
		}
		
		//分类ajax1
		public function ajax1(){
			$id = I("get.id");
			$proid = I("get.proid");
			if($id==0){
			exit;
			}
			
			if($id>0){
				$m = M("Proclass");
				$where['audit']=1;
				$where['pid']=$id;
				$arr = $m->where($where)->select();
				if(empty($arr)){
				exit;
				}
				
				$da = M("Product")->where("id=$proid")->limit(1)->find();//获取产品信息
				
				$str = "<select id=\"sele2\" name=\"sele2\">";
				foreach($arr as $v){
				if($v['id']==$da['cid']){
					$str.="<option value=\"$v[id]\" selected=\"selected\">".$v['proclassname']."</option>";
				}else{
					$str.="<option value=\"$v[id]\">".$v['proclassname']."</option>";
				}
					
				
				}
				$str.="</select>";
				echo $str;
			}
			
		}
		
		//文件上传
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
			$upload->savePath =  './Public/Uploads/Content/';// 设置附件上传目录
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
			 
		//批量删除
		public function pldelete(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Content");
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
			$m = M("Content");
			
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
			$m = M("Content");
			
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
			$lang = I("post.lang");
			$str = $str."0";//补0
			$m = M("Content");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Conclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
			}
			
			$where['id']=array("in",$str);
			$data1['cid']=$cid;
			$data1['lang']=$lang;
			$data1['updatetime']=time();
			if($m->where($where)->save($data1)){
				$this->success("移动成功");
				
			}else{
				$this->error("移动失败");
			}
			
			}else{
				//绑定分类
				$m = M("Conclass");
				$data = $m->select();
				$list = $m->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
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
			$lang = I("post.lang");
			$str = $str."0";//补0
			$m = M("Content");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Conclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
			}
			
			
			$arr = explode(",",$str);
			
			$i=0;
			foreach($arr as $v){
					
				if($v!=0){
					$data1 = $m->where("id=$v")->find();
					$data1['cid']=$cid;
					$data1['lang'] = $lang;
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
				$m = M("Conclass");
				$data = $m->select();
				$list = $m->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
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
		
		//自定义表单显示
		public function getAllField($modules,$cid=0,$num_i=0){
			$m = M("Ziding");
			
			if($cid!=0){
				//$mowhere['cid']=$cid;
				$mowhere['cid']= array(array('eq',0),array('eq',$cid), 'or'); //cid=0 or cid=$cid
			}
			$mowhere['isshow']=1;
			$mowhere['modules']=$modules;
			$data = $m->order("orderby")->where($mowhere)->select();
			if(!$data){
				return 0;
			}
			$zhu="";
			
			foreach($data as $key=>$val){
				switch($val[type]){
					case 0:  //input文本框
						$zhu.="<tr><th>$val[relname]</th>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
                                                    if($val[relname]=="微币"){
                                                        $zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"$val[values]\"  />微币<strong style='color:red;'>&nbsp;*请输入微币数量</strong></td>";
                                                    }elseif ($val[relname]=="库存") {
                                                        $zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"$val[values]\"  />个<strong style='color:red;'>&nbsp;*请输入库存</strong></td>";
                                                    }elseif ($val[relname]=="金额"||$val[relname]=="红包比例") {
                                                        $zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"$val[values]\"  /><strong style='color:red;'>&nbsp;*金额和红包比例只能填写一项，并且红包比例只有在红包是加息红包的情况下才可填写</strong></td>";
                                                    }elseif ($val[relname]=="使用条件") {
                                                        $zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"$val[values]\"  />元<strong style='color:red;'>&nbsp;*此项为红包使用限制，如最低1000元，直接填写1000即可，此项不在前台显示</strong></td>";
                                                    }elseif ($val[relname]=="有效期") {
                                                        $zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"$val[values]\"  />天<strong style='color:red;'>&nbsp;*此项为红包兑换后可用期限，请直接填写天数</strong></td>";
                                                    }else{
                                                        $zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"$val[values]\"  /></td>";
                                                    }
						
						}else{
						$zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"$val[values]\" style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\" /></td>";
						}
						$zhu.="</tr>,";
					break;
					case 1:  //Option下拉框
						$exarr = explode(",",$val[values]);
						$zhu.="<tr><th>$val[relname]</th>";
						$zhu.="<td><select name=\"$val[name]\">";
						foreach($exarr as $ex){
							$zhu.="<option value=\"$ex\">$ex</option>";
						}
						$zhu.="</select></td></tr>,";
						
					break;
					case 2: //radio单选按钮
						$exarr = explode(",",$val[values]);
						$zhu.="<tr><th>$val[relname]</th>";
						$zhu.="<td>";
						$i=0;//value的值，从0开始
						foreach($exarr as $ex){
							if($i==0){
								$zhu.="<input type=\"radio\" name=\"$val[name]\" value=".$i." checked />$ex";
							}else{
								$zhu.="<input type=\"radio\" name=\"$val[name]\" value=".$i." />$ex";
							}
							
							$i++;
						}
						$zhu.="</td></tr>,";
					
					break;
					
					case 3: //checkbox复选框
						
					break;
					
					case 4: //textarea多行文本框
						$zhu.="<tr><th>$val[relname]</th>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
							$zhu.="<td><textarea name=\"$val[name]\" style=\"width:300px;height:80px\">".$val[values]."</textarea></td>";
						}else{
							$zhu.="<td><textarea name=\"$val[name]\" style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\">".$val[values]."</textarea></td>";
						}
						
						$zhu.="</tr>,";
					break; 
					
					case 5: //日期和时间
						$zhu.="<tr><th>$val[relname]</th>";
						$zhu.="<td><input type=\"text\" name=\"".$val[name]."\"  class=\"input\" size=\"30\" placeholder=\"点击选择日期：\" onclick=\"isdate()\"/>
						<img src=\"./Public/Images/date.png\" style=\"margin:0px 0 -2px -23px\" /></td>";
						$zhu.="</tr>,";
					break;
					
					case 6: //编辑器

						$zhu.="<tr><th>$val[relname]</th>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
							$zhu.="<td><script type=\"text/plain\" id=\"".$val[name].'_'.$num_i."\" name=\"".$val[name]."\"  style=\"width:100%;height:400px;\">".$val[values]."</script></td>";
						}else{
							$zhu.="<td><script type=\"text/plain\" id=\"".$val[name].'_'.$num_i."\" name=\"".$val[name]."\"  style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\">".$val[values]."</script></td>";
						}
						$zhu.="<script>UE.getEditor('".$val[name].'_'.$num_i."');</script>";
						$zhu.="</tr>,";
						
					break;
				}
			}
			$zhu = $zhu."0";
			$zhuarr = explode(",",$zhu);
			unset($zhuarr[count($zhuarr)-1]); //删除数组最后一个元素
			return $zhuarr;
			
			
		}
		
		//编辑自定义表单
		public function editAllField($datarr,$modules,$cid=0,$num_i=0){
			$m = M("Ziding");
			if($cid!=0){
				//$mowhere['cid']=$cid;
				$mowhere['cid']= array(array('eq',0),array('eq',$cid), 'or'); //cid=0 or cid=$cid
			}
			$mowhere['isshow']=1;
			$mowhere['modules']=$modules;
			$data = $m->order("orderby")->where($mowhere)->select();
			if(!$data){
				return 0;
			}
			$zhu="";
			foreach($data as $key=>$val){
				switch($val[type]){
					case 0: //Input文本框
						$zhu.="<tr><th>$val[relname]</th>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
						$zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"".$datarr[$val[name]]."\"  /></td>";
						}else{
						$zhu.="<td><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"".$datarr[$val[name]]."\" style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\" /></td>";
						}
						$zhu.="</tr>,";
					break;
					case 1: //Option下拉框
						$exarr = explode(",",$val[values]);
						$zhu.="<tr><th>$val[relname]</th>";
						$zhu.="<td><select name=\"$val[name]\">";
						foreach($exarr as $ex){
							if($datarr[$val[name]]==$ex){
								$zhu.="<option value=\"$ex\" selected>$ex</option>";
							}else{
								$zhu.="<option value=\"$ex\">$ex</option>";
							}
							//$zhu.="<option value=\"$ex\">$ex</option>";
						}
						$zhu.="</select></td></tr>,";
						
					break;
					case 2: //radio单选按钮
						$exarr = explode(",",$val[values]);
						$zhu.="<tr><th>$val[relname]</th>";
						$zhu.="<td>";
						$i=0;//value的值，从0开始
						foreach($exarr as $ex){
							if($i==$datarr[$val[name]]){
								$zhu.="<input type=\"radio\" name=\"$val[name]\" value=".$i." checked />$ex";
							}else{
								$zhu.="<input type=\"radio\" name=\"$val[name]\" value=".$i." />$ex";
							}
							
							$i++;
						}
						$zhu.="</td></tr>,";
					
					break;
					
					case 3: //checkbox复选框
					
					break;
					
					case 4: //textarea多行文本框
						$zhu.="<tr><th>$val[relname]</th>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
							$zhu.="<td><textarea name=\"$val[name]\" style=\"width:300px;height:80px\">".$datarr[$val[name]]."</textarea></td>";
						}else{
							$zhu.="<td><textarea name=\"$val[name]\" style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\">".$datarr[$val[name]]."</textarea></td>";
						}
						$zhu.="</tr>,";
					break; 
					
					case 5: //日期和时间
						$zhu.="<tr><th>$val[relname]</th>";
						$zhu.="<td><input type=\"text\" name=\"".$val[name]."\"  class=\"input\" size=\"30\" placeholder=\"点击选择日期：\" value=\"".$datarr[$val[name]]."\" onclick=\"isdate()\"/>
						<img src=\"./Public/Images/date.png\" style=\"margin:0px 0 -2px -23px\" /></td>";
						$zhu.="</tr>,";
					break;
					case 6: //编辑器
						
						$zhu.="<tr><th>$val[relname]</th>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
							$zhu.="<td><script type=\"text/plain\" id=\"".$val[name].'_'.$num_i."\" name=\"".$val[name]."\"  style=\"width:100%;height:400px;\">".$datarr[$val[name]]."</script></td>";
						}else{
							$zhu.="<td><script type=\"text/plain\" id=\"".$val[name].'_'.$num_i."\" name=\"".$val[name]."\"  style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\">".$datarr[$val[name]]."</script></td>";
						}
						$zhu.="<script>UE.getEditor('".$val[name].'_'.$num_i."');</script>";
						$zhu.="</tr>,";
					break;
				}
			}
			$zhu = $zhu."0";
			$zhuarr = explode(",",$zhu);
			unset($zhuarr[count($zhuarr)-1]); //删除数组最后一个元素
			return $zhuarr;
			
		}
		//编辑自定义表单2(订单专用)
		public function edit_order_AllField($datarr,$modules,$cid=0,$num_i=0){
			$m = M("Ziding");
			if($cid!=0){
				//$mowhere['cid']=$cid;
				$mowhere['cid']= array(array('eq',0),array('eq',$cid), 'or'); //cid=0 or cid=$cid
			}
			$mowhere['isshow']=1;
			$mowhere['modules']=$modules;
			$data = $m->order("orderby")->where($mowhere)->select();
			if(!$data){
				return 0;
			}
			$zhu="";
			foreach($data as $key=>$val){
				switch($val[type]){
					case 0: //Input文本框
						$zhu.="<tr><td width=\"19%\" height=\"30\" bgcolor=\"#F6FAFD\" align=\"right\">$val[relname]</td>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
						$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"".$datarr[$val[name]]."\"  /></td>";
						}else{
						$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><input class=\"input\" type=\"text\" name=\"$val[name]\" value=\"".$datarr[$val[name]]."\" style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\" /></td>";
						}
						$zhu.="</tr>,";
					break;
					case 1: //Option下拉框
						$exarr = explode(",",$val[values]);
						$zhu.="<tr><td width=\"19%\" height=\"30\" bgcolor=\"#F6FAFD\" align=\"right\">$val[relname]</td>";
						$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><select name=\"$val[name]\">";
						foreach($exarr as $ex){
							if($datarr[$val[name]]==$ex){
								$zhu.="<option value=\"$ex\" selected>$ex</option>";
							}else{
								$zhu.="<option value=\"$ex\">$ex</option>";
							}
							//$zhu.="<option value=\"$ex\">$ex</option>";
						}
						$zhu.="</select></td></tr>,";
						
					break;
					case 2: //radio单选按钮
						$exarr = explode(",",$val[values]);
						$zhu.="<tr><td width=\"19%\" height=\"30\" bgcolor=\"#F6FAFD\" align=\"right\">$val[relname]</td>";
						$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\">";
						$i=0;//value的值，从0开始
						foreach($exarr as $ex){
							if($i==$datarr[$val[name]]){
								$zhu.="<input type=\"radio\" name=\"$val[name]\" value=".$i." checked />$ex";
							}else{
								$zhu.="<input type=\"radio\" name=\"$val[name]\" value=".$i." />$ex";
							}
							
							$i++;
						}
						$zhu.="</td></tr>,";
					
					break;
					
					case 3: //checkbox复选框
					
					break;
					
					case 4: //textarea多行文本框
						$zhu.="<tr><td width=\"19%\" height=\"30\" bgcolor=\"#F6FAFD\" align=\"right\">$val[relname]</td>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
							$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><textarea name=\"$val[name]\" style=\"width:300px;height:80px\">".$datarr[$val[name]]."</textarea></td>";
						}else{
							$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><textarea name=\"$val[name]\" style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\">".$datarr[$val[name]]."</textarea></td>";
						}
						$zhu.="</tr>,";
					break; 
					
					case 5: //日期和时间
						$zhu.="<tr><td width=\"19%\" height=\"30\" bgcolor=\"#F6FAFD\" align=\"right\">$val[relname]</td>";
						$zhu.="<td colspan=\"3\" width=\"30%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><input type=\"text\" name=\"".$val[name]."\"  class=\"input\" size=\"30\" placeholder=\"点击选择日期：\" value=\"".$datarr[$val[name]]."\" onclick=\"isdate()\"/>
						<img src=\"./Public/Images/date.png\" style=\"margin:0px 0 -2px -23px\" /></td>";
						$zhu.="</tr>,";
					break;
					case 6: //编辑器
						
						$zhu.="<tr><td width=\"19%\" height=\"30\" bgcolor=\"#F6FAFD\" align=\"right\">$val[relname]</td>";
						if($val["zwidth"]==0 || $val["zheight"]==0){
							$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><script type=\"text/plain\" id=\"".$val[name].'_'.$num_i."\" name=\"".$val[name]."\"  style=\"width:100%;height:400px;\">".$datarr[$val[name]]."</script></td>";
						}else{
							$zhu.="<td colspan=\"3\" width=\"26%\" height=\"30\" bgcolor=\"#FFFFFF\" style=\"padding-left:10px;\"><script type=\"text/plain\" id=\"".$val[name].'_'.$num_i."\" name=\"".$val[name]."\"  style=\"width:".$val[zwidth]."px;height:".$val[zheight]."px\">".$datarr[$val[name]]."</script></td>";
						}
						$zhu.="<script>UE.getEditor('".$val[name].'_'.$num_i."');</script>";
						$zhu.="</tr>,";
					break;
				}
			}
			$zhu = $zhu."0";
			$zhuarr = explode(",",$zhu);
			unset($zhuarr[count($zhuarr)-1]); //删除数组最后一个元素
			return $zhuarr;
			
		}
		//新闻预览
		public function preview(){
			if(IS_POST){
				
			}else{
				
				
				
				
				//初始绑定数据
				$m = M("Conclass");
				$where['isshow']=1;
				
				$dataclass = $m->where($where)->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				//自定义字段
				$zdydata = $this->getAllField(1);
				
				//dump($zdydata);
				$this->assign("zdydata",$zdydata);
				
				$this->assign('dataclass',$dataclass);
				
			}
			$this->display();
			
			
		}
		
		
		//添加标签ajax
		public function add_tag(){
			$tagname = I("get.tagname");
			$tag_data = M("Tag")->select();
			$mark=0;
			foreach($tag_data as $v){
				if($tagname==$v[tag_name]){
					$mark=1;
				}
				
			}
			if($mark==1){
				echo 0;
			}else{
				$add_arr = array('type'=>1,'tag_name'=>$tagname,'click'=>1,'addtime'=>time());
				$add_id = M("Tag")->add($add_arr);
				$add_data = M("Tag")->where(array('id'=>$add_id))->find();
				echo json_encode($add_data);
			}
		
		}

		//删除标签
		public function del_tag(){
			$id = I("get.data_i");
			M("Tag")->query("update tp_tag set click=click-1 where id=$id");//将使用数减1
			echo 1;
			
		}

		//标签库赋值
		public function tag_library(){
			$id = I("get.id");
			M("Tag")->query("update tp_tag set click=click+1 where id=$id");//将使用数减1
			$data = M("Tag")->where(array('id'=>$id))->find();
			echo json_encode($data);
		}

	}
?>