<?php
	class JobAction extends Action{
		//列表
		public function index(){
			if(IS_POST){
				$searchtype = $_POST['searchtype'];
				$keyword = $_POST['keyword'];
				if($searchtype==1 && $keyword!=""){
					$where['jobname']=array("like","%".$keyword."%");
				}
				$m = M("Job");
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page = new Page($count,"20");
				$show = $page->show();
				
				$data = $m->where($where)->order("addtime desc")->limit($page->firstRow.','.$page->listRows)->select();
				$this->assign('data',$data);//绑定数据
				$this->assign('page',$show);//绑定分页
				
			
			}else{
				$m = M("Job");
				import("ORG.Util.Paged");
				$count = $m->count();
				$page = new Page($count,"20");
				$show = $page->show();
				
				$data = $m->order("addtime desc")->limit($page->firstRow.','.$page->listRows)->select();
				$this->assign('data',$data);//绑定数据
				$this->assign('page',$show);//绑定分页
				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
			}
			$this->display();
		}
		
		//添加
		public function add(){
			if(IS_POST){
				$post = I("post.");
				$m = D("Job");
				if(empty($post)){
					$this->error("参数错误");
				}
				if($m->create()){
					$m->addtime=time();
					if($_POST['endtime']!=""){
						$m->endtime = strtotime($_POST['endtime']);
					}
					
					if($m->add()){
						if(isset($_POST['submit1'])){
							$this->success("添加成功",U("Job/index"));
						}else{
							$this->success("添加成功",U("Job/add"));
						}
					}else{
					$this->error("添加失败");
					}
				}else{
					$this->error($m->getError());
				}
			}else{
				//排序取值
				$orderby=0;
				$m = M("Job");
				$arr = $m->query("select `orderby` from __TABLE__ order by id desc limit 1");
				if(empty($arr)){
					$orderby = 1;
				}else{
					$orderby = $arr[0]['orderby']+1;
				}
				
				//调用Content模块的getAllField方法 有参 4代表招聘  获得数组
				$zdydata = R('Content/getAllField',array("4"));

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
				$this->assign('orderby',$orderby);
				$this->assign('zdydata',$zdydata);
			}
			$this->display();
		}
		
		//修改
		public function edit(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数错误");
				}
				$m = D("Job");
				if($m->create()){
					$m->updatetime = time();
					if($_POST['endtime']!=""){
						$m->endtime = strtotime($_POST['endtime']);
					}
					if($m->save()){
						$this->success("修改成功",U("Job/index"));
					}else{
						$this->error("修改失败");
					}
				}else{
					$m->error($m->getError());
				}
			}else{
				$m = M("Job");
				$id = I("get.id","","trim");
				$data = $m->where("id=$id")->find();
				//调用Content模块的editAllField方法 有参 4代表招聘  获得数组
				
				$zdydata = R('Content/editAllField',array($data,'4'));
				
				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
				$this->assign("data",$data);
				$this->assign("zdydata",$zdydata);
			}
			$this->display();
		}
		//删除
		public function delete(){
			$id = I("get.id","0","trim");
			if($id<=0){
				$this->error("参数错误",U("Job/index"));
			}
			$bool = M("Job")->where("id=$id")->delete();
			if($bool){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
		}
		
		//预览
		public function preview(){
			if(IS_POST){
				
			}else{
				//排序取值
				$orderby=0;
				$m = M("Job");
				$arr = $m->query("select `orderby` from __TABLE__ order by id desc limit 1");
				if(empty($arr)){
					$orderby = 1;
				}else{
					$orderby = $arr[0]['orderby']+1;
				}
				
				//调用Content模块的getAllField方法 有参 4代表招聘  获得数组
				$zdydata = R('Content/getAllField',array("4"));
				$this->assign('orderby',$orderby);
				$this->assign('zdydata',$zdydata);
			}
			$this->display();
		}
		
		//是否显示
		public function isshow(){
			$id = I("get.id","0","trim");
			if($id<=0){
				$this->error("参数错误",U("Job/index"));
			}
			$data['isshow'] = I("get.isshow");
			$where['id']=$id;
			$bool = M("Job")->where($where)->save($data);
			if($bool){
				$this->success("操作成功");
			}else{
				$this->error("操作失败");
			}
			
		}
		
		//是否推荐
		public function isrecom(){
			$id = I("get.id","0","trim");
			if($id<=0){
				$this->error("参数错误",U("Job/index"));
			}
			$data['isrecom'] = I("get.isrecom");
			$where['id']=$id;
			$bool = M("Job")->where($where)->save($data);
			if($bool){
				$this->success("操作成功");
			}else{
				$this->error("操作失败");
			}
			
		}
		
		//批量删除
		public function pldelete(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Job");
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
			$m = M("Job");
			
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
			$m = M("Job");
			
			$where['id']=array("in",$str);
			$data['isshow']=0;
			$data['updatetime']=time();
			if($m->where($where)->save($data)){
				echo "1";
			}else{
				echo "0";
			}
		}
		
		//简历
		public function resume(){
			if(IS_POST){
				$searchtype = I("post.searchtype");
				$keyword = I("post.keyword");
				if($searchtype==1 && $keyword!=""){
					$where['tp_job.jobname']=array("like","%".$keyword."%");
				}
				
				
				$m = M("Resume");
				import("ORG.Util.Paged");
				$count = $m->where($where)->join("tp_job on tp_resume.jid=tp_job.id")->field("tp_job.jobname,tp_resume.id,tp_resume.addtime")->count();
				$page = new Page($count,20);
				$show = $page->show();
				
				$data = $m->join("tp_job on tp_resume.jid=tp_job.id")->field("tp_job.jobname,tp_resume.id,tp_resume.addtime")
				->limit($page->firstRow.','.$page->listRows)
				->where($where)
				->order("addtime DESC")
				->select();
				$this->assign("data",$data);
				$this->assign("page",$show);
				
				
			}else{
				$m = M("Resume");
				import("ORG.Util.Paged");
				$count = $m->join("tp_job on tp_resume.jid=tp_job.id")->field("tp_job.jobname,tp_resume.id,tp_resume.addtime")->count();
				$page = new Page($count,20);
				$show = $page->show();
				
				$data = $m->join("tp_job on tp_resume.jid=tp_job.id")->field("tp_job.jobname,tp_resume.id,tp_resume.addtime")
				->limit($page->firstRow.','.$page->listRows)
				->order("addtime DESC")
				->select();
				$this->assign("data",$data);
				$this->assign("page",$show);
			}
			$this->display();
		}
		
		//简历删除
		public function resumedelete(){
			$id = I("get.id","","trim");
			if($id==""){
				$this->error("参数错误");
			}
			$m = M("Resume");
			$where['id']=$id;
			if($m->where($where)->delete()){
				$this->success("删除成功");
			}else
			{
				$this->error("删除失败");
			}
		}
		
		//简历查看
		public function resumeview(){
			$id = I("get.id","","trim");
			$m = M("Resume");
			
			if($id>0){
				$where['tp_resume.id']=$id;
				$data = $m->join("tp_job on tp_resume.jid=tp_job.id")->field("tp_job.jobname,tp_resume.*")->where($where)->find();
				$this->assign("data",$data);
			}
			$this->display();
			
		}
		
		//简历批量删除
		public function repldelete(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Resume");
			$where['id']=array("in",$str);
			if($m->where($where)->delete()){
				echo "1";
			}else{
				echo "0";
			}
		}
	}


?>