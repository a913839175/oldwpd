<?php
header("Content-Type:text/html;charset=utf-8");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>管理中心登录 V1.0</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<load href="__PUBLIC__/Css/admin.css" />
<load href="__PUBLIC__/Js/jquery.js" />
<style>
	.fk{
		position:relative;
		top:5px;
		left:7px;
		cursor:pointer;
		}


</style>

<script type="text/javascript">if (self != top) top.location.href = window.location.href;//整个框架跳转功能</script>

<script language="javascript">
	$(function(){
		$("#breset").click(function(){
			$("#username").val("");
			$("#password").val("");
			$("#username").focus();
		})
	})
</script>
	<script language="javascript">
    $(function(){
		$("#login").click(function(){
			var username = $("#username");
			var password = $("#password");
			var checkimg = $("#checkimg");
			var usernameval = username.val();
			var passwordval = password.val();
			if(username.val()==""){
				alert("用户名不能为空");
				username.focus();
			}else if(password.val()==""){
				alert("密码不能为空");
				password.focus();
			}else if(checkimg.val()==""){
				alert("验证码不能为空");
				checkimg.focus();
			}else{
				$.get("__URL__/checkpwd",{username : usernameval,password : passwordval},function(data){
					if(data==0){
						alert("用户名或密码错误");
					}else if(data==1){
						document.forms[0].submit();
					}else if(data==2){
						alert("该用户已被停用，请与管理员联系");
					}
				});
				
				
			}
		})
		
		$("#checkimg").blur(function(){
			var checkimg = $("#checkimg").val();
			if(checkimg!=""){
				$.get("__URL__/checkcode",{checkimg : checkimg},function(data){
					if(data==0){
						alert("验证码不正确，请重新输入");
						$("#checkimg").val("");
						$("#checkimg").focus();
						document.getElementById('fk').src=document.getElementById('fk').src+"?rand="+Math.random();
					}
				});
			}
		})
	})
    
    </script>
</HEAD>
<BODY onload=document.form1.name.focus();>
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" bgColor=#002779 
border=0>
  <TR>
    <TD align=middle>
      <TABLE cellSpacing=0 cellPadding=0 width=468 border=0>
        <TR>
          <TD><IMG height=23 src="__PUBLIC__/Images/login_1.jpg" 
          width=468></TD></TR>
        <TR>
          <TD><IMG height=147 src="__PUBLIC__/Images/login_2.jpg" 
            width=468></TD></TR></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width=468 bgColor=#ffffff border=0>
        <TR>
          <TD width=16><IMG height=122 src="__PUBLIC__/Images/login_3.jpg" 
            width=16></TD>
          <TD align=middle>
            <TABLE cellSpacing=0 cellPadding=0 width=230 border=0>
              <FORM name="form1" action="__URL__/login_check" method="post">
              <TR height=5>
                <TD width=5></TD>
                <TD width=80></TD>
                <TD></TD></TR>
              <TR height=36>
                <TD width="5"></TD>
                <TD width="">用户名：</TD>
                <TD><INPUT 
                  style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid; height:22px;" 
                  maxLength=30 size=24  name='username' id='username'></TD></TR>
              <TR height=36>
                <TD>&nbsp; </TD>
                <TD>口　令：</TD>
                <TD><INPUT 
                  style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid; height:22px;" 
                  type=password maxLength=30 size=24 
                name=password id="password"></TD></TR>
              <TR height=5>
                <TD colSpan=2>&nbsp;验证码：</TD>
                <td><input 
               style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid; width:80px;height:22px;"  
               maxlength="4"  type="text" name="code" id="checkimg" /><img src="__APP__/Public/verify/" id="fk" class="fk" onClick='this.src=this.src+"?rand="+Math.random()'/></td>
              </TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>&nbsp;</TD>
                <TD valign="" id="td1">
                  <a href="javascript:void(0)" id="login" class="login"><img src="__PUBLIC__/Images/bt_login.gif" border="0" /></a>
                  
                  <a href="javascript:void(0)" id="breset" class="breset"><img src="__PUBLIC__/Images/bt_reset.gif" border="0" /></a>
          </TD></TR>
          	  </FORM></TABLE></TD>
          <TD width=16><IMG height=122 src="__PUBLIC__/Images/login_4.jpg" 
            width=16></TD></TR></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width=468 border=0>
        <TR>
          <TD><IMG height=16 src="__PUBLIC__/Images/login_5.jpg" 
          width=468></TD></TR></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width=468 border=0>
       </TABLE></TD></TR></TABLE></BODY></HTML>
