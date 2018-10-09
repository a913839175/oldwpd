<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<title>上虞市宏兴机械仪器制造有限公司</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="__PUBLIC__/Home/css/base.css">
<link rel="stylesheet" href="__PUBLIC__/Home/css/css.css"/>
<link rel="stylesheet" href="__PUBLIC__/Home/css/layout.css">
<script src="__PUBLIC__/Home/js/jquery1.42.min.js" type="text/javascript"></script>
</head>
<body>
<!--header nav banner -->
<include file="Public:header" sign="6" />
<div class="nybnbg">
	<div class="nybnbox"><img src="__PUBLIC__/Home/images/s5.png" alt=""></div>
</div>
<!--end header nav banner-->
<!--main-->
<div class="nytit1">位置：<a href="<{:U('Index/index',array('home'=>1))}>">首页</a>&nbsp;&gt;&nbsp;<span>视频欣赏</span></div>
<div class="bigdiv">
	<div class="nyleft fl">
		<dl class="left_list">
			<dt class="nytit2">
				<span class="nytit2_1">视频欣赏</span>
				<span class="nytit2_2">Video</span>
			</dt>			
			<dd><a href="<{:U('Video/index',array('home'=>6))}>">视频欣赏</a></dd>
		</dl>
		<include file="Public:left" />
	</div>
	<div class="nyright fr">
		<div class="nytxt1">
			<{$data.procontent}>
				<div class="wbny_page">
				<if condition="$prevdata.proname eq ''">
					<span class="wbny_uppage">上一视频：没有了</span>
				<else />
					<span class="wbny_uppage">上一视频：<a class="news_bb" href="<{:U('Video/vinfo',array('id'=>$prevdata[id],'home'=>6))}>"><{$prevdata.proname}></a></span>
				</if>
			    
			   <if condition="$nextdata.proname eq ''">
					<span class="wbny_uppage">下一视频：没有了</span>
				<else />
					<span class="wbny_uppage">下一视频：<a class="news_bb" href="<{:U('Video/vinfo',array('id'=>$nextdata[id],'home'=>6))}>"><{$nextdata.proname}></a></span>
				</if>
			</div>
		</div>


</div>
</div>
<!--end main-->
<!--footer-->
<include file="Public:footer" />
<!--end footer-->
</body>
<script src="__PUBLIC__/Home/js/js.js"></script>
