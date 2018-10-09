<?php
class CenterAction extends CommonAction {
    public function index(){
  		 $qid = I("get.qid");
  		 if($qid==""){
  		 	$qid=1;
  		 }
		switch($qid){
			case 1:
				$center_new_data = $this->getPro3("论文",1,0,1,1,9);
			break;
			case 2:
				$center_new_data = $this->getPro3("专利",1,0,1,1,9);
			break;
			
		
		}
		
		//$center_new_data = $this->signerpost(1,"研究成果");
		
		//$center_new_data = $this->getPro3("研究成果",1,0,1,1,9);

		$this->assign("center_new_data",$center_new_data);
		$this->display();
    }

    public function zhuanjia(){
    	$zhuanjianame = M("Proclass")->where(array('proclassname'=>'专家顾问'))->find();
        $zhuanjia_data = $this->getPro($zhuanjianame[id],1,0,1,1,9);
        $this->assign("zhuanjia_data",$zhuanjia_data);
    	$this->display();
    }

	public function info(){
		
		//研究成果取值
		$id = I("get.id","","trim");
		
		//点击量
		M("Product")->execute("update tp_product set hits=hits+1 where id=$id");
		if($id>0){
			$data = M("Product")->where("id=$id")->find();

			//$new_content = $this->keywords_link($data[concon]);
			

				
		
			//$data[concon]=$new_content;				


			$prevwhere['cid']=$data[cid];
			$prevwhere['id']=array("lt",$id);
			$prevwhere['lang']=1;
			$prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();
			
			$nextwhere['cid']=$data[cid];
			$nextwhere['lang']=1;
			$nextwhere['id']=array("gt",$id);
			$nextdata = M("Product")->where($nextwhere)->find();
			
			
		}
		$this->assign("prevdata",$prevdata);
		$this->assign("data",$data);
		$this->assign("nextdata",$nextdata);
		$this->display();
	}
}