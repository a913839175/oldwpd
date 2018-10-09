<?php
class MarketingAction extends CommonAction {
    public function index(){
		$data = $this->signerpost(0,"营销网络");
		$this->assign("data",$data);
		$this->display();
    }
	
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
}