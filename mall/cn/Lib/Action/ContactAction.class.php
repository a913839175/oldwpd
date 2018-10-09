<?php
class ContactAction extends CommonAction {
    public function index(){

    	$qid = I("get.qid");
    	if($qid==""){
    		$qid=1;
    	}

    	if($qid==1){
    		$contact_data = $this->signerpost(1,"联系方式");
    	}else if($qid==2){
    		$contact_data = $this->signerpost(1,"电子地图");
    	}
		
		//$contact_data = $this->signerpost(1,"联系我们");
		$this->assign("contact_data",$contact_data);
		$this->display();
    }

    public function feed(){
      $m = M("Guest");
      if($m->create()){
        $m->addip=get_client_ip();
        $m->addtime=time();
        $m->sex=1;
        $m->mark=1; //时间标记

        if($m->add()){
          // $data = array(
          //   //'mailaddress'=>'ningning342@126.com',  //回复地址

          //   'mailname'=>I("post.username"),    //姓名
          //   'mailphone'=>I("post.guest_dianhua"), //联系电话
          //   'mailcontent'=>I("post.content"),  //内容
          //   'mailtime'=>date("Y-m-d H:i:s",time()), //时间
          // );
          // $message_mail = A("Mail");
          // $message_mail->message_sendmail($data);
          $this->success("留言成功,请耐心等待管理员审核!");
        }
      }
      $this->display();
    }
}