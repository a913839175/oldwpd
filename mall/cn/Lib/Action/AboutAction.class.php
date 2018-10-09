<?php

class AboutAction extends CommonAction {
    public function index(){
		//  $id= I("get.id");
		//  if($id==""){
		//  	$id = M('Content')->where(array('lang'=>1,'cid'=>15))->getField("id");
		//  }
		// $about_data = M("Content")->where(array('id'=>$id))->find();
			
		$qid = I("get.qid");
		switch ($qid) {
			case '':
			case 1:
				$about_data = $this->signerpost(1,"公司简介");
				break;
			case 2:
				$about_data = $this->signerpost(1,"核心技术");
				break;
			
			default:
				# code...
				break;
		}
		
		
	
		
		$this->assign("about_data",$about_data);
		$this->display();
    }

    public function jingpin(){
		
		$jingpin_data = $this->signerpost(1,"精品推荐");
		$this->assign("jingpin_data",$jingpin_data);
		$this->display();
    }

    public function culture(){
    	$about_culture_data = $this->signerpost(1,"企业文化");
    	$this->assign("about_culture_data",$about_culture_data);

    	$about_child_data = $this->getNews2("企业文化",1,0,1,0,0);
    	$this->assign("about_child_data",$about_child_data);
		$this->display();

    }
    public function licheng(){
    	$licheng_type_data = $this->getNewsList2('发展历程',1,0,0,0,0);


    	$this->assign("licheng_type_data",$licheng_type_data);
		$this->display();
    }

    public function licheng_ajax(){
    	$rev = I("get.rev");
    	$data = $this->getNews($rev,1,0,0,0,0);
    	foreach($data as $k=>$vo){
    		$data[$k][time]=date("m/d",$vo[showdate]);
    	}
    	die(json_encode($data));
    }
	
   public function join(){
		 $qid = I("get.qid");
		 switch ($qid) {
		 	case '':
		 	case 1:
		 		$join_data = $this->signerpost(1,"加盟政策");
		 		break;
		 	case 2:
		 		$join_data = $this->signerpost(1,"加盟条件");
		 		break;
		 	case 3:
		 		$join_data = $this->signerpost(1,"加盟流程");
		 		break;
		 	
		 	default:
		 		# code...
		 		break;
		 }
		 
	
		
		$this->assign("join_data",$join_data);
		$this->display();
    }   

    public function service(){
		 $id= I("get.id");
		 if($id==""){
		 	$id = M('Content')->where(array('lang'=>1,'cid'=>18))->getField("id");
		 }
		$service_data = M("Content")->where(array('id'=>$id))->find();
			
		
		
		//$about_data = $this->signerpost(1,"品牌故事");
	
		
		$this->assign("service_data",$service_data);
		$this->display();
    }   

   public function honor(){
   	$honor_data = $this->getPro3("企业荣誉",1,0,1,1,9);
   	foreach($honor_data as $k=>$vo){
   		$honor_data[$k][img] = M("Img")->where(array('proid'=>$vo[id]))->getField("img");
   	}
   	
   	$this->assign("honor_data",$honor_data);
   	$this->display();
   }

   

   

   
    
}