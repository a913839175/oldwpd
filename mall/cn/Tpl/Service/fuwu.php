<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<link rel="stylesheet" href="__PUBLIC__/Home/css/base.css">
<link rel="stylesheet" href="__PUBLIC__/Home/css/css.css"/>
<link rel="stylesheet" href="__PUBLIC__/Home/css/layout.css">
<script src="__PUBLIC__/Home/js/jquery1.42.min.js" type="text/javascript"></script>
</head>
<body>
<!--header nav banner -->
<include file="Public:header" sign="7" />
<div class="nybnbg">
	<div class="nybnbox"><img src="__PUBLIC__/Home/images/s7.png" alt=""></div>
</div>
<!--end header nav banner-->
<!--main-->
<div class="nytit1">位置：<a href="<{:U('Index/index',array('home'=>1))}>">首页</a>&nbsp;&gt;<a href="<{:U('Service/index')}>" >售后服务</a>&nbsp;&nbsp;&gt;&nbsp;<span>售后服务</span></div>
<div class="bigdiv">
	<div class="nyleft fl">
		<dl class="left_list">
			<dt class="nytit2">
				<span class="nytit2_1">售后服务</span>
				<span class="nytit2_2">service</span>
			</dt>
			<dd class="dd_2"><a href="<{:U('Service/index',array('home'=>7))}>">下载中心</a></dd>
			<foreach name="classdata" item="vo">
				
					<dd class=""><a  
						
					href="<{:U('Service/index',array('id'=>$vo[id],'home'=>7))}>"><{$vo.downclassname}></a></dd>
				
				
			</foreach>
			
            <dd><a href="<{:U('Service/fuwu',array('home'=>7))}>" class="on">售后服务</a></dd>
		</dl>
		<include file="Public:left" />
	</div>
	<div class="nyright fr">
		<div class="nytxt1">
			<{$data.pacon}>
		</div>
	</div>
</div>
<!--end main-->
<!--footer-->
<include file="Public:footer" />
<!--end footer-->
</body>
<script src="__PUBLIC__/Home/js/js.js"></script>