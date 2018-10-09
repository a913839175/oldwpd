<?php
	class LoginAction extends Action{
		public function login(){
			$this->display();	
		}
		
		public function login_check(){
			if(IS_POST){
				$username= I('post.username','','trim');
				$password= md5(I('post.password','','trim'));
				//$code = md5(I('post.code','','trim'));
				//if(isset($code) && $code==$_SESSION['code']){
					$where['username']=$username;
					$where['password']=$password;
					$where['disable']=1;
					$rs = M("User")->where($where)->find();
					if($rs){
						if($rs['roleid']==0){
							$this->error("你没有权限登录后台！请和管理员联系");
						}
						
						//修改上次登录ip、时间
						$data1['lastlogip']=$rs['nowlogip'];
						$data1['lastlogtime']=$rs['nowlogtime'];
						M("User")->where("id=$rs[id]")->save($data1);
						
						//修改本次登录ip、时间
						$data2['nowlogip']=get_client_ip();
						$data2['nowlogtime']=time();
						M("User")->where("id=$rs[id]")->save($data2);
						
						$_SESSION['username']=$username;
						$_SESSION['id']=$rs['id'];
						$_SESSION['gh_id']=$rs['gh_id'];//阿标
					
						M("User")->execute("update `tp_user` set `loginnum`=`loginnum`+1 where id='".$rs[id]."'"); //登录次数加1
						//$this->success("登录成功",U("Index/index"));
						$this->redirect("Index/index");
					}else{
						$this->error("登录失败<br>1.用户名或密码错误！<br>2.该用户已被禁用！");
					}
					
				//}else{
				//	$this->error('验证码错误');
				//}
				
			}
		}
		public function logout(){
			$_SESSION=array();
			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');	
			}
			session_destroy();//删除服务器端session文件
			$this->redirect('Login/login');
		}
		
		//ajax检查验证码是否正确
		public function checkcode(){
			$checkimg = md5(I("get.checkimg","trim"));
			if(!empty($checkimg)){
				if($_SESSION['code']==$checkimg){
				echo "1";
				}else{
				echo "0";
				}
			}else{
				echo "0";
			}
		}
		//ajax检查用户名密码是否错误
		public function checkpwd(){
			 
			$username = I("post.username","","trim");
			$password = md5(I("post.password","","trim"));
			$where[username]=$username;
			$where[password]=$password;
			$m = M("User");
			$count = $m->where($where)->count();
			
			if($count>0){
				$where[disable]=1;
				$count1 = $m->where($where)->count();
				if($count1>0){
					echo "1";
				}else{
					echo "2";
				}
				
			}else{
				echo "0";
			}
		
		}
	}
?>