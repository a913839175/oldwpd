<?php
	class FeedAction extends CommonAction{
		public function index(){
			$m = M("Guest");
			if($m->create()){

				$m->addip=get_client_ip();
				$m->mark=1;
				$m->addtime=time();
				
				if($m->add()){
					// $data = array(
					// 	//'mailaddress'=>'ningning342@126.com',  //回复地址

					// 	'mailname'=>I("post.username"),    //姓名
					// 	'mailphone'=>I("post.guest_dianhua"), //联系电话
					// 	'mailcontent'=>I("post.content"),  //内容
					// 	'mailtime'=>date("Y-m-d H:i:s",time()), //时间
					// );
					// $message_mail = A("Mail");
					// $message_mail->message_sendmail($data);
					$location = U('Feed/index');
					echo "<script>alert('留言成功');location.href='".$location."';</script>";
				}
			}
			$this->display();
		}
	}

?>