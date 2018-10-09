<?php
	class JobAction extends CommonAction{

		public function index(){

			$job_data = $this->signerpost(1,"人才战略");
			$this->assign("job_data",$job_data);

			

			$this->display();
		}

		public function job(){
			 import("ORG.Util.Paged");

			 $count = M("Job")->where(array('isshow'=>1,'lang'=>1))->count();
			 $page = new Page($count,10);
			 $show = $page->show();
			 $data= M("Job")->where(array('isshow'=>1,'lang'=>1))->limit($page->firstRow.','.$page->listRows)->order("orderby desc")->select();
			 $this->assign("page",$show);
			 $this->assign("data",$data);
			 $this->display();
		}
		public function jobinfo(){
			
			$id = I("get.id");
			$data = M("Job")->where(array('id'=>$id))->find();

			$this->assign("data",$data);
			$this->display();
		}

		public function resume(){
			 if(IS_POST){
	            $m = M("Resume");
	            if($m->create()){
	               $m->addtime = time();
	              	
	                if($m->add()){
	                    $this->success("提交成功");
	                }
	            }
	        }else{
	             
	             $data = M("Job")->where(array('lang'=>1))->select();
	             $this->assign("data",$data);
	             $this->display();
	        }
		}
	}
?>