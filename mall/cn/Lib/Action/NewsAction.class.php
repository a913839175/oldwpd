<?php
class NewsAction extends CommonAction {
    public function index(){
    	$qid = I("get.qid");
    	switch ($qid) {
    		case '':
    		case 1:
    			$newsdata = $this->getNews2("公司新闻",1,0,0,1,10);
    			$news_tj_data = $this->getNews2("公司新闻",1,1,0,0,0,1);
    		break;
    		case 2:
    			$newsdata = $this->getNews2("行业新闻",1,0,0,1,10);
    			$news_tj_data = $this->getNews2("行业新闻",1,1,0,0,0,1);
    		break;
    		
    		
    		default:
    			# code...
    			break;
    	}
    	//$newsdata = $this->getNews2("最新动态",1,0,0,1,15);
		$this->assign("newsdata",$newsdata);
		$this->assign("news_tj_data",$news_tj_data);


		$this->display();
    }

    public function duty(){
    	
    	$qid = I("get.qid");
    	switch ($qid) {
    		case '':
    		case 1:
	    		$duty_id = M('Conclass')->where(array('conclassname'=>'社会责任综述'))->getField("id");
	    		$duty_data = M("Content")->where(array('lang'=>1,'cid'=>$duty_id))->find();
    		break;
    		case 2:
	    		
	    		$duty_data = $this->getNews2("社会责任活动",1,0,0,1,10);
    		break;
    		
    		default:
    			# code...
    			break;
    	}
    	$this->assign("duty_data",$duty_data);
		$this->display();
    }


    public function dutyinfo(){
		
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
	public function newsinfo(){
		

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

	public function videoinfo(){
		

		//视频取值
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

			//相关视频
			$other_video = M("Content")->where(array('id'=>array('in',$data[othernews])))->select();
			
			
		}
		
		$this->assign("prevdata",$prevdata);
		$this->assign("data",$data);
		$this->assign("nextdata",$nextdata);
		$this->assign("other_video",$other_video);
		$this->display();
	}
}