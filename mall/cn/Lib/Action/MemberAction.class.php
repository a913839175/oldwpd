<?php
	class MemberAction extends CommonAction{

		//学员中心
		public function index(){
			if($_SESSION['k_user']==""){
				
				$this->redirect('Member/login');

			}
			$username = $_SESSION['k_user'];
			$data = M("User")->where(array('username'=>$username))->find();
			$this->assign("data",$data);
			$this->display();
		}

		//会员注册
		public function reg(){
			if(IS_POST){
				$m = M("User");
				$username=I("post.j_username");
				$password=I("post.password");
				
				
				if($username==""){
					$this->error("手机号/邮箱不能为空");
				}

				if($password==""){
					$this->error("密码不能为空");
				}
				
				$count = $m->where(array('username'=>$username))->count();
				if($count>0){
					$this->error("该用户名已存在");
				}
				if($m->create()){

					// $str.="[会员注册提醒]<br>";
					// $str.="用户名：".$m->username."<br>";
					// $str.="邮箱：".$m->email."<br>";
					// $str.="手机号码：".$m->content."<br>";
					// $str.="注册时间：".date("Y-m-d H:i:s",time());
					// $m->nicname = $username;
					// $m->disable=0;
					// $m->addtime=time();
					// $m->password=md5($password);
					// $m->content = "手机号码：".$content;
					// if($m->add()){
					// 	$send_data = array(
					// 		'smtp_title'=>'会员注册提醒',
					// 		'mailcontent'=>$str, //备注
							
					// 	);
					// 	$message_mail = A("Mail");
					// 	$message_mail->yuyue_sendmail($send_data);

					// 	$this->success("注册成功,请耐心等待管理员审核",U('Index/index'));
					// }else{
					// 	$this->error("注册失败");
					// }
					$m->disable=1;
					$m->addtime=time();
					$m->password=md5($password);
					$m->roleid=0;
					if($m->add()){
						$this->success("注册成功");
					}else{
						$this->error("注册失败");
					}
				}
				

			}
			//会员注册协议
			$data = $this->signerpost(1,"会员注册协议");
			$this->assign("data",$data);
			$this->display();
		}

		//会员登录
		public function login(){
			if(IS_POST){
				$k_user=I("post.j_username");
				$k_pass=I("post.password");
					
				if($k_user==""){
					$this->error("手机号/邮箱不能为空");
				}

				if($k_pass==""){
					$this->error("密码不能为空");
				}
				


				$check_u = M("Users","hrcf_","DB_CONFIG1")->where(array('username'=>$k_user,'password'=>md5($k_pass)))->find();
				
				if(count($check_u)>0){
					$_SESSION['k_user']=$check_u['username'];
					$_SESSION['k_id']=$check_u['user_id'];
					$this->success("登录成功",U('Index/index'));
				}else{
					$this->error("用户名或者密码错误");
					//$this->error("用户名或者密码错误！");
				}
			}else{
				$this->display();
			}
		}
		
		public function shangchengindex(){
			
			$k_user=I("post.j_username");
			$k_pass=I("post.password");

			if($_SESSION['k_user']!=$k_user && $k_user!="" && $k_pass!=""){
	
				$check_u = M("Users","hrcf_","DB_CONFIG1")->where(array('username'=>$k_user,'password'=>$k_pass))->find();
				if(count($check_u)>0){
					$_SESSION['k_user']=$check_u['username'];
					$_SESSION['k_id']=$check_u['user_id'];	
				}
			}
			
			if($_SESSION['k_user']!=$k_user && $k_user=="" && $k_pass==""){
				unset($_SESSION['k_user']);
				unset($_SESSION['k_id']);
			}
			
			
			$this->redirect('Index/index');
	
		}
		
		public function jifenduihuan(){
			
			$k_user=I("post.j_username");
			$k_pass=I("post.password");

			if($_SESSION['k_user']!=$k_user && $k_user!="" && $k_pass!=""){
	
				$check_u = M("Users","hrcf_","DB_CONFIG1")->where(array('username'=>$k_user,'password'=>$k_pass))->find();
				if(count($check_u)>0){
					$_SESSION['k_user']=$check_u['username'];
					$_SESSION['k_id']=$check_u['user_id'];	
				}
			}
			
			if($_SESSION['k_user']!=$k_user && $k_user=="" && $k_pass==""){
				unset($_SESSION['k_user']);
				unset($_SESSION['k_id']);
			}
			
			$this->redirect('Product/index');				
		
		}
		
		
		public function wxjifenduihuan(){
			
			$k_user=I("post.j_username");
			$k_pass=I("post.password");

			if($_SESSION['k_user']!=$k_user && $k_user!="" && $k_pass!=""){
	
				$check_u = M("Users","hrcf_","DB_CONFIG1")->where(array('username'=>$k_user,'password'=>$k_pass))->find();
				if(count($check_u)>0){
					$_SESSION['k_user']=$check_u['username'];
					$_SESSION['k_id']=$check_u['user_id'];	
				}
			}
			
			if($_SESSION['k_user']!=$k_user && $k_user=="" && $k_pass==""){
				unset($_SESSION['k_user']);
				unset($_SESSION['k_id']);
			}
			
			$this->redirect('Wxshop/goodslist');				
		
		}
		

		//会员快速登录
		public function quicklogin(){
			$user_val = I("get.user_val");
			$pass_val = I("get.pass_val");
			$check_u = M("User")->where(array('username'=>$user_val,'password'=>md5($pass_val),'disable'=>1))->find();
				
				if(count($check_u)>0){
					$_SESSION['k_user']=$check_u['username'];
					$_SESSION['k_id']=$check_u['id'];
					echo $check_u['username'];
				}else{
					//$this->error("1.用户名或者密码错误！<br>2.该用户需审核后才可登录，请和管理员联系！");
					echo 0;
				}


		}

		public function logout(){
			unset($_SESSION['k_user']);
			unset($_SESSION['k_id']);
			$this->success("成功注销",U('Index/index'));
		}

		//验证码
		public function verify(){
		    import('ORG.Util.Image');
		    ob_end_clean();
		    Image::buildImageVerify(4,2,'png',65,22,'zycode');
		}
	}
?>

