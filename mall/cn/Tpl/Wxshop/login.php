<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Wxshop/css/zebra_dialog.css">
<!--<link rel="stylesheet" type="text/css" href="__PUBLIC__/Wxshop/css/login.css">-->
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/jquery.min.1.9.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/login.js"></script>
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/zebra_dialog.js"></script>
<meta name="viewport" content=" height = device-height ,width = device-width ,initial-scale = 1.0 ,minimum-scale = 1.0 ,maximum-scale = 1.0 ,user-scalable = no , "charset="utf-8" />
<meta name = "format-detection" content="telephone = no" />
<title>微拍贷</title>
</head>

<body>
<div class="head">
    <div class="head_img"><a href="javascript:history.go(-1);"><img src="__PUBLIC__/Wxshop/images/jiantou.png"/></a></div>
    <p>登录</p>
</div>
<div class="logo">
    <div class="logo_img"><img src="__PUBLIC__/Wxshop/images/logo.png"/></div>
</div>
<div class="shouji">
    <input id="username" type="text" placeholder="输入手机号"/>
    <div class="shouji_img"><img src="__PUBLIC__/Wxshop/images/xiala.png"/></div>
    <div class="shouji_img"><img id="userreset" class="xx" src="__PUBLIC__/Wxshop/images/xx.png"/></div>
</div>
<div class="mima">
    <input id="password" type="password" placeholder="登录密码"/>
    <div class="mima_img"><img id="isshow" src="__PUBLIC__/Wxshop/images/eye.png"/></div>
    <div class="mima_img"><img id="passwordreset" class="xx" src="__PUBLIC__/Wxshop/images/xx.png"/></div>
</div>
<input id="tourl" type="hidden" value="/">
<div class="none"></div>
<div class="button">
    <button id="dologin">登录</button>
    <div class="wangji">
        <p><a href="/?wxuser&q=reg">注册</a></p>
        <span><a href="/?wxuser&q=getpwd">忘记密码？</a></span>
    </div>
</div>
<input type="hidden" value="<{$fromurl}>" id="fromurl">
<div class="none2"></div>
<div class="footer">
    <p>www.weipaidai.com</p>
</div>
</body>
</html>
