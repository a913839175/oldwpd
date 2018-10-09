<?php
	//所有需判断session页面的基类
	class CommonAction extends Action{
		public function _initialize(){
			//此处为解决Uploadify在火狐下出现http 302错误 重新设置SESSION
			    if( I("post.sessionid")!='' ){
   					 session('[pause]');
	    			 session_id(I("post.sessionid"));  
   					 session('[start]');
				}

			if(!isset($_SESSION['username']) || $_SESSION['username']==""){
				$this->redirect("Login/login");
				//echo "<script>window.parent.frames.location.href='admin.php/Login/login';</script>";
			}

			//引入分类递归处理类
			import("@.Class.Getcate"); 
		
		}
	
		//公共空操作
		public function _empty(){
			$this->display('Public:404');
		}
	}
?>