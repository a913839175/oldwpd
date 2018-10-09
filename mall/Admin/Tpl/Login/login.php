<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>微商城网络后台管理系统-登录页</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base1.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css">
	<script type="text/javascript" src="__PUBLIC__/Js/login.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery.cookie.js"></script>
    <script type="text/javascript">
    	$(function(){
    		var pwd = $("#pwd");
			var tx = $("#tx");
    		///判断是否存在cookie
    		 if ($.cookie("rmbUser") == "true") {
    		 		tx.hide();
	  				pwd.show();
	  				pwd.val($.cookie("passWord"));
			        $("#rmbUser").attr("checked", true);
			        $("#dl").val($.cookie("userName"));
			    }
    	})


    	function login_submit_check(){
   			var dl = $("#dl");
			var pwd = $("#pwd");
			var tx = $("#tx");
			//var checkimg = $("#checkimg");
			var dlval = dl.val();
			var pwdval = pwd.val();
			if(dl.val()=="" || dl.val()=="请填写用户名"){
				alert("用户名不能为空");
				dl.focus();
				return false;
			}else if(pwd.val()=="" || pwd.val()=="请填写密码"){
				alert("密码不能为空");
				tx.focus();
				return false;
			}else{
				$.post("__URL__/checkpwd",{username : dlval,password : pwdval},function(data){
					if(data==0){
						alert("用户名或密码错误");
						return false;
					}else if(data==1){
						saveUserInfo();
						$("form[name='form1']").submit();
					}else if(data==2){
						alert("该用户已被停用，请与管理员联系");
						return false;
					}
				});
				
				
			}
   }
   //保存用户信息
function saveUserInfo() {
    if ($("#rmbUser").is(':checked') == true) {
        var userName = $("#dl").val();
        var passWord = $("#pwd").val();
        $.cookie("rmbUser", "true", { expires: 7 }); // 存储一个带7天期限的 cookie
        $.cookie("userName", userName, { expires: 7 }); // 存储一个带7天期限的 cookie
        $.cookie("passWord", passWord, { expires: 7 }); // 存储一个带7天期限的 cookie
    }
    else {
        $.cookie("rmbUser", "false", { expires: -1 });
        $.cookie("userName", '', { expires: -1 });
        $.cookie("passWord", '', { expires: -1 });
    }
}
    </script>
</head>

<body>
	<script type="text/javascript">if (self != top) top.location.href = window.location.href;//整个框架跳转功能</script>
	<div id="main">
		<div id="logo"></div>
		<div id="login">
			<div class="login_icon">
				 <a href=""><img src="__PUBLIC__/Images/login1.png"/></a> 
			</div>
			<div class="login_input">
				<form name="form1" action="__URL__/login_check" method="post">
					<input name="username" type="text" value="请填写用户名" class="input_0" id="dl" />
					<input name="" type="text" value="请填写密码" class="input_1" id="tx"  />
					<input name="password" type="password" class="input_1" style="display:none;width:200px;" id="pwd" />
					<input name="button" type="button" onclick="return login_submit_check()" value="登录" class="input_3" id="login_ok"/>
				</form>
			</div>
			<div class="login_checkbox">
				<span><input type="checkbox" value="密码" name="password" class="input_4" id="rmbUser"/>是否保存密码</span> 
				<!--<span id="login_forget"><a href="">忘记密码了？</a></span> -->
			</div>
			
		</div>
		<div id="footer">
			<p>copyright © 微拍贷 all right reserved.</p>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(function(){
		$(document).keyup(function(event){
		  if(event.keyCode ==13){
		    $("#login_ok").trigger("click");
		  }
		});
	})
</script> 