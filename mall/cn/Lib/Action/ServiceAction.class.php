<?php
class ServiceAction extends CommonAction {
    public function index(){
  		// $tid = I("get.tid");
  		// $id = I("get.id");
  		// if($tid==""){
    // 		// $tid_arr = $this->getProList2("产品展示",1,1,1,0,0); 
    // 		// $tid=$tid_arr[0][id];
    // 		$service_data = $this->getPro3("服务项目",1,0,1,1,5);
    // 		$type_info = M("Proclass")->where(array('proclassname'=>'服务项目'))->getField("proclasscontent");
    // 	}else{
    // 		$type_info = M("Proclass")->where(array('id'=>$tid))->getField("proclasscontent");
    // 		if($id==""){
    // 			$service_data = $this->getPro($tid,1,0,1,1,5);
    // 		}else{
    // 			$service_data = $this->getPro($id,1,0,1,1,5);
    // 		}
    		
    // 	}
  		// $this->assign("service_data",$service_data);
  		// $this->assign("type_info",$type_info);
		
	$qid = I("get.qid");
	switch ($qid) {
		case '':
			$service_data = $this->signerpost(1,"服务政策");
		case 1:
			$service_data = $this->signerpost(1,"服务政策");
			break;
		case 2:
			$service_data = M("Guest")->where(array('audit'=>1))->order("addtime DESC")->select();
			break;
		case 3:
			$service_data = $this->getNews2("厨电知识",1,0,0,1,10);
			break;
		case 4:
			$service_data = $this->signerpost(1,"销售网络");
			break;
		case 5:
			$service_data = $this->getPro3("专营店风采",1,0,1,1,9);
		   	foreach($service_data as $k=>$vo){
		   		$service_data[$k][img] = M("Img")->where(array('proid'=>$vo[id]))->getField("img");
		   	}
			break;
		case 6:
		case 7:
				$tid = 23;
				import("ORG.Util.Paged");
				$count = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->count();
				$page = new page($count,10);
				$service_data = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->limit($page->firstRow.','.$page->listRows)->order("orderby asc")->select();
				$show = $page->show();
				$this->assign("page",$show);
			break;
		case 8:
				$tid = 24;
				import("ORG.Util.Paged");
				$count = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->count();
				$page = new page($count,10);
				$service_data = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->limit($page->firstRow.','.$page->listRows)->order("orderby asc")->select();
				$show = $page->show();
				$this->assign("page",$show);
			break;
		case 9:
				$tid = 25;
				import("ORG.Util.Paged");
				$count = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->count();
				$page = new page($count,10);
				$service_data = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->limit($page->firstRow.','.$page->listRows)->order("orderby asc")->select();
				$show = $page->show();
				$this->assign("page",$show);
			break;

		
		default:
			# code...
			break;
	}
	$this->assign("service_data",$service_data);
		$this->display();
    }

    public function info(){
		

		//新闻取值
		$id = I("get.id","","trim");
		
		//点击量
		M("Content")->execute("update tp_content set hits=hits+1 where id=$id");
		if($id>0){
			$data = M("Content")->where("id=$id")->find();

			//$new_content = $this->keywords_link($data[concon]);
			

				
		
			//$data[concon]=$new_content;				


			$nextwhere['cid']=$data[cid];
			$nextwhere['id']=array("lt",$id);
			$nextwhere['isshow']=1;
			$nextwhere['lang']=1;
			$nextdata = M("Content")->where($nextwhere)->order("id DESC")->find();
			
			$prevwhere['cid']=$data[cid];
			$prevwhere['isshow']=1;
			$prevwhere['id']=array("gt",$id);
			$prevwhere['lang']=1;
			$prevdata = M("Content")->where($prevwhere)->find();
			
			
		}
		
		$this->assign("prevdata",$prevdata);
		$this->assign("data",$data);
		$this->assign("nextdata",$nextdata);
		$this->display();
	}

	public function jishu(){
		$qid = I("get.qid");
		switch ($qid) {
			case '':
			case 1:
				$data = $this->signerpost(1,"技术优势");
				break;
			case 2:
				$data = $this->signerpost(1,"技术标准");
				break;
			
			default:
				# code...
				break;
		}
		$this->assign("data",$data);
		$this->display();
	}



	
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
}