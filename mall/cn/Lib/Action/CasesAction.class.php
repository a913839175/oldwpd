<?php

class CasesAction extends CommonAction {
    public function index(){
    	
        $cases_data = $this->getPro3("成功案例",1,0,1,1,9);
        $this->assign("cases_data",$cases_data);
    	$this->display();
    }

    public function casesinfo(){
        
        $id = I("get.id");
        
        $data = M("Product")->where(array('id'=>$id))->find();
        

        

        //获取分类名称
        //$pro_type_name = M("Proclass")->where(array('id'=>$data[cid]))->getField("proclassname");

        //M("Product")->execute("update tp_product set hits=hits+1 where id=$id");

        //关联图片取值
        //$other_img = M("Img")->where(array('proid'=>$id))->getField("img");
        //M("Product")->execute("update tp_product set hits=hits+1 where id=$id");

        //相关产品
        //$other_pro = M("Product")->where(array('id'=>array('in',$data[otherpro]),'isshow'=>1))->select();
    
        $prevwhere['cid']=$data[cid];
        $prevwhere['isshow']=1;
        $prevwhere['lang']=1;
        $prevwhere['id']=array("lt",$id);
        $prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();
            
        $nextwhere['cid']=$data[cid];
        $nextwhere['isshow']=1;
        $nextwhere['lang']=1;
        $nextwhere['id']=array("gt",$data[id]);
        $nextdata = M("Product")->where($nextwhere)->find();

        
        $this->assign("data",$data);


        $this->assign("prevdata",$prevdata);
        $this->assign("nextdata",$nextdata);
        //$this->assign("other_img",$other_img);
        //$this->assign("other_pro",$other_pro);
        //$this->assign("pro_type_name",$pro_type_name);

        $this->display();
    }
		
	
}