<?php
	class PacontentAction extends CommonAction{
		//列表
		public function palist(){
			//查询
			if(IS_POST){

				$searchtype = I("post.searchtype");
				$keyword = I("post.keyword");
				$lang = I("post.lang");
				$cid = I("post.cid");
				$isshow = I("post.isshow");	
				$issj = 2;
				
				if($searchtype==1 && $keyword!=""){
					$where['paname']=array("like",array("%$keyword%"));
				}
				if($lang!=2){
					$where['tp_pacontent.lang']=$lang;
				}
				if($cid!=0){
					$where['cid']=$cid;
				}
				if($isshow!=2){
					$where['tp_pacontent.isshow']=$isshow;
				}
				
				if($issj!=2){
					$where['issj']=$issj;
				}

				//绑定分类
				$n = M("Concate");
				$data = $n->select();
				$list = $n->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);
				
				//显示数据
				$m = M("Pacontent");
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page  = new Page($count,20);
				
				foreach($where as $key=>$val) {
			    $page->parameter .="$key=".urlencode($val).'&';
				}
				
				$show = $page->show();
				$data = $m->join("tp_concate on tp_concate.id=tp_pacontent.cid")->field("tp_concate.conclname,tp_pacontent.*")
				->order("orderby asc")
				->limit($page->firstRow.','.$page->listRows)
				->where($where)->select();
				
				
				$this->assign("data",$data);//绑定数据
				$this->assign("page",$show);//绑定分页

				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
			
			}else{
				$searchtype = I("get.searchtype");
				$keyword = I("get.keyword");
				$lang = I("get.tp_pacontent_lang");
				$cid = I("get.cid");
				$isshow = I("get.tp_pacontent_isshow");	
				$issj = I("get.issj");
				
				if($searchtype==1 && $keyword!=""){
					$where['paname']=array("like",array("%$keyword%"));
				}
				if($lang!=2 && $lang!=""){
					$where['tp_pacontent.lang']=$lang;
				}
				if($cid!=0 && $cid!=""){
					$where['cid']=$cid;
				}
				if($isshow!=2 && $isshow!=""){
					$where['tp_pacontent.isshow']=$isshow;
				}
				
				if($issj!=2 && $issj!=""){
					$where['issj']=$issj;
				}
			
				//绑定分类
				$n = M("Concate");
				$data = $n->select();
				$list = $n->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value['bpath']));
				}
				$this->assign("alist",$list);
				

				//显示数据
				$m = M("Pacontent");
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page  = new Page($count,20);
				$show = $page->show();
				$data = $m->where($where)->join("tp_concate on tp_concate.id=tp_pacontent.cid")->field("tp_concate.conclname,tp_pacontent.*")->limit($page->firstRow.','.$page->listRows)
				->order("orderby asc")
				->select();
				
				
				$this->assign("data",$data);//绑定数据
				$this->assign("page",$show);//绑定分页

				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
				
			
			}
			$this->display();
			
		}
		//列表排序
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
							M("Pacontent")->where("id=$id")->save($data);
				}
				$this->success("排序成功");
				
			}

		}

		//添加
		public function add(){
			if(IS_POST){
				$post = I("post.");
				if($post['paname']==""){
					$this->error("内容名称不能为空");
				}else if($post['pacon']==""){
					$this->error("详细内容不能为空");
				}
				
				$cid = I("post.cid","trim");
				$count = M("Concate")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				$m = M("Pacontent");
				if($m->create()){

					$m->addtime=time();
					$m->sjpacon=$_POST['sjpacon'];
					
					
					if($m->add()){
						if(isset($_POST[submit1])){
							$this->success("添加成功",U("Pacontent/palist"));
						}else{
							$this->success("添加成功");
						}
						
					}else{
						$this->error("添加失败");
					}
				
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
				$orderby1 = M("Pacontent")->order("orderby DESC")->limit(1)->find();
				
				if($orderby1){
					$orderbydata=$orderby1[orderby]+1;
				}else{
					$orderbydata=1;
				}
			
				$this->assign("orderbydata",$orderbydata);

				//绑定分类
				$m = M("Concate");
				$data = $m->select();
				$list = $m->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				//调用Content模块的getAllField方法 有参 5代表内容  获得数组 20140529注 已使用ajax调用
				//	$zdydata = R('Content/getAllField',array("5"));
					
				$this->assign("alist",$list);
				//$this->assign("zdydata",$zdydata);
				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
			}
		
			$this->display();
		}
		//修改
		public function edit(){
			if(IS_POST){
				$post = I("post.");
				if($post['paname']==""){
					$this->error("内容名称不能为空");
				}else if($post['pacon']==""){
					$this->error("详细内容不能为空");
				}
				$cid = I("post.cid","trim");
				$count = M("Concate")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				$m = M("Pacontent");
				if($m->create()){
					$m->updatetime=time();
					$m->sjpacon=$_POST['sjpacon'];
					
					
					if($m->save()){
						$this->success("修改成功",U("Pacontent/palist"));
					}else{
						$this->error("修改失败");
					}
				}
				
				
			}else{
				//绑定分类
				$n = M("Concate");
				$data = $n->select();
				$list = $n->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);
			
			
				$id = I("get.id","","trim");
				
					$m = M("Pacontent");
					$data = $m->where("id=$id")->find();
					
					
				
				
				
				//编辑器
				//vendor("Fckeditor.fckeditor");	
				//$editor= new FCKeditor(); //实例化FCKeditor对象 
				//$editor->Width='408';//设置编辑器实际需要的宽度。此项省略的话，会使用默认的宽度。 
				//$editor->Height='262';//设置编辑器实际需要的高度。此项省略的话，会使用默认的高度。
				//$editor->ToolbarSet="Basic";
				
				
				//$editor->Value=$data['sjpacon'];//设置编辑器初始值。也可以是修改数据时的设定值。可以置空。
				//$editor->InstanceName='sjeditor';
				//$html=$editor->Createhtml();//创建在线编辑器html代码字符串,并赋值给字符串变量$html. 
				//$this->assign('html',$html);//将$html的值赋给模板变量$html.在模板里通过{$html}可以直接引用
				
				//调用Content模块的editAllField方法 有参 5代表内容  获得数组
				$zdydata = R('Content/editAllField',array($data,'5'));
				
				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);

				$this->assign("data",$data);
				$this->assign("zdydata",$zdydata);
				$this->display();
			}
			
		}
		
		//删除
		public function delete(){
			$id = I("get.id");
			if($id>0){
				$m = M("pacontent");
				if($m->where("id=$id")->delete()){
					$this->success("删除成功");
				}else
				{
					$this->error("删除失败");
				}
			}
		}
		
		//预览
		public function preview(){
			if(IS_POST){
				
			}else{
				
				
				//绑定分类
				$m = M("Concate");
				$data = $m->select();
				$list = $m->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				//调用Content模块的getAllField方法 有参 5代表内容  获得数组
					$zdydata = R('Content/getAllField',array("5"));
					
				$this->assign("alist",$list);
				$this->assign("zdydata",$zdydata);
			}
		
			$this->display();
		}

		//分类ajax 验证分类
		public function ajax(){
			$cid = I("get.cid");
				$count = M("Concate")->where("pid=$cid")->count();
				if($count>0){
					echo "0";
				}else{
					echo "1";
				}
				
			
		}
		//是否显示
		public function isshow(){
			$id = I("get.id","trim");
			$issh = I("get.issh","trim");
			$where['id']=$id;
			$data['isshow']=$issh;
			$m = M("Pacontent");
			if($m->where($where)->save($data)){
				$this->success("操作成功",U("Pacontent/palist"));
			}
		
		}
		//批量删除
		public function pldelete(){
		
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Pacontent");
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
			$m = M("Pacontent");
			
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
			$m = M("Pacontent");
			
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
			$m = M("Pacontent");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Concate")->where("pid=$cid")->count();
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
				$m = M("Concate");
				$data = $m->select();
				$list = $m->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);
			}
			
			
			$this->display();
			
		}
		
		//批量复制
		public function list_class2(){
			
			if(IS_POST){
			$str = I("post.str");
			$str = $str."0";//补0
			$m = M("Pacontent");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Concate")->where("pid=$cid")->count();
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
				$m = M("Concate");
				$data = $m->select();
				$list = $m->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);
			}
			
			
			$this->display();
			
		}
		
		
	}
?>