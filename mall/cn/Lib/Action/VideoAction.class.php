<?php
class VideoAction extends CommonAction {
    public function index(){
    	
		$videoname = M("Proclass")->where(array('proclassname'=>'视频欣赏'))->find();
        $video_data = $this->getPro($videoname[id],1,0,1,1,9);
        $this->assign("video_data",$video_data);
    	$this->display();
		
    }

    

	public function vinfo(){
		
		

		//产品取值
		$id = I("get.id","","trim");
		
		//点击量
		//M("Content")->execute("update tp_content set news_liulannum=news_liulannum+1 where id=$id");
		if($id>0){
			$data = M("Product")->where("id=$id")->find();

			//$new_content = $this->keywords_link($data[concon]);
			

				
		
			//$data[concon]=$new_content;				


			$prevwhere['cid']=$data[cid];
			$prevwhere['isshow']=1;
			$prevwhere['id']=array("lt",$id);
			$prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();
			
			$nextwhere['cid']=$data[cid];
			$nextwhere['isshow']=1;
			$nextwhere['id']=array("gt",$id);
			$nextdata = M("Product")->where($nextwhere)->find();
			
			
		}
		$this->assign("prevdata",$prevdata);
		$this->assign("data",$data);
		$this->assign("nextdata",$nextdata);
		$this->display();
	}
}