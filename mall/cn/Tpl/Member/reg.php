<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<script type="text/javascript" src="__PUBLIC__/Home/cn/js/components.js"></script>


<include file="Public:top" />


</head>
<body>
<div class="pg-container">

<include file="Public:headertop" />

<div class="pg-container-content">
<script>
if (window.top != window) {
   window.top.location.href = location.href;
}
$(function(){
	$("#j_username").click(function(){
		$(this).next().css('display','none');
		$("#j_username").removeClass('error');	
		$("#allError").html('');
			
	})
	$("#J_pass_input").click(function(){
		$(this).next().css('display','none');	
		$("#J_pass_input").removeClass('error');	
		$("#allError").html('');
	})
	
	
})
function logCheck(){
		
		if($("#j_username").val()==''){
			$("#j_username").addClass('error');	
			$("#j_username").next().css('display','block');	
			//$("#J_pass_input").next().css('display','block');
			$("#allError").html('请输入手机号/邮箱');
			return false;
		}else{
			if($.trim($("#j_username").val())!=""){
			var reg = /^1[3|4|5|8][0-9]\d{4,8}$/;
			if(!reg.test($.trim($('#j_username').val()))){
				
				
				if($.trim($("#j_username").val())!=""){
					var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
					var reg2 = /^[^\u4e00-\u9fa5]{0,}$/;
					if(!reg.test($.trim($('#j_username').val()))){
						$("#allError").html('手机号/邮箱格式不对');
						$("#j_username").addClass('error');
						return false;
					}
					if(!reg2.test($.trim($('#j_username').val()))){
						$("#allError").html('手机号/邮箱格式不对');
						$("#j_username").addClass('error');
						
						return false;
					}
					
				}
				
				

			}
			
		}
		
		if($("#J_pass_input").val()==''){
			$("#J_pass_input").addClass('error');	
			//$("#j_username").next().css('display','block');
			$("#J_pass_input").next().css('display','block');	
			$("#allError").html('请输入密码');
			return false;
		}
	}
	}
</script>

	<div id="sc_contain">

    <div id="pg-login">
      <div class="container_12">
        <div class="content clearfix">
          <div class="left-con">
              <div class="logininfo">
                  <img src="__PUBLIC__/Home/images/loginad.png" height="352px">
              </div>
          </div>
          <div class="right-con">
            <div class="loginbox ui-box-white-bg">
              <h3 class="fn-hide">请登录您的微拍贷账户</h3>
              <form novalidate="novalidate" data-name="login" class="ui-form"  onSubmit="return logCheck();" method="post" action="<{:U('Member/login')}>"  id="login">
              <!--	<input name="url" value="/index.php?user" type="hidden">-->
                <fieldset>
                  <legend>登录</legend>
                  <div class="top-msg mb10">
                      <label id="allError" class="error"></label>
                  </div>
                  <div class="ui-form-item">
	                  <label class="ui-label">手机号/邮箱</label>
	                  <input class="ui-input input-icon input-bg-gray " name="j_username" id="j_username" data-is="isMobileOrEmail" autocomplete="off" type="text">
	                  <p style="display: block;" class="placeholder" id="user_error" class="onshow">请输入手机号/邮箱</p>
	                  <span class="icon input-icon-head-gray"></span>
                  </div>
                  <div class="ui-form-item">
	                    <label class="ui-label">密码</label>
	                    <input class="ui-input input-icon input-bg-gray" name="password" id="J_pass_input" data-is="isEmail" type="password">
	                    <p style="display: block;" class="placeholder" class="onshow">请输入密码</p>
	                    <span class="icon input-icon-lock-gray"></span>
                  </div>
                  
                  <!-- <div class="ui-form-item">
                    <label class="ui-label">验证码</label>
                    <input class="ui-input code" type="text" name="randCode" id="randCode">
                    <p class="placeholder" style="display: block;left:10px">验证码</p>
                    <a href="javascript:void(0)" class="code-box"><img id="randImage" border="0" align="absmiddle" src="/?plugins&q=imgcode" name="randImage" alt="验证码" style="cursor:pointer;width:100px;height:40px;"/></a>
                    <a href="javascript:void(0)" class="refresh-box"><img id="refreshCode" border="0" align="absmiddle" src="/static/img/refresh.png" alt="刷新验证码" /></a>
                    <i class="validCode fn-hide"></i>
                  </div> -->
                  
                  <div class="ui-form-item">
						<span style="background-position: 0px -33px;" class="ui-select"><input id="rememberme" checked="checked" name="rememberme" type="checkbox"></span>     
	                    <label for="rememberme">记住用户名</label> <a class="findpsw" href="https://old.weipaidai.com/?user&amp;q=getpwd">忘记密码</a>
                  </div>
                  <div class="ui-form-item text-center">
                    <p class="bottom-msg mb10"></p>
                    <input class="ui-button-rrd-blue ui-button-rrd-blue-large" value="立即登录" type="submit">
                  </div>
                  <div class="ui-form-item text-center">
                        <p class="go-reg">没有账号？ <a href="https://old.weipaidai.com/index.php?user&amp;q=reg">免费注册</a></p>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script id="email-suggest-template" type="text/x-handlebars-template">
      
    </script>
 
</div>
 
</div>


<!--footer-->
<include file="Public:footer" />
</div>
</div>
</body>
</html>