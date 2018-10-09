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
<include file="Public:header" sign="5" />
<div class="nybnbg">
	<div class="nybnbox"><img src="__PUBLIC__/Home/images/s4.png" alt=""></div>
</div>
<!--end header nav banner-->
<!--main-->
<div class="nytit1">位置：<a href="<{:U('Index/index',array('home'=>1))}>">首页</a>&nbsp;&gt;&nbsp;<a href="<{:U('Center/zhuanjia',array('home'=>5))}>">研发中心</a>&nbsp;&gt;专家顾问&nbsp;<span><{$data.paname}></span></div>
<div class="bigdiv">
	<div class="nyleft fl">
		<dl class="left_list">
			<dt class="nytit2">
				<span class="nytit2_1">研发中心</span>
				<span class="nytit2_2">R & D Center</span>
			</dt>			
			<dd><a href="<{:U('Center/zhuanjia',array('home'=>5))}>" class="on">专家顾问</a></dd>
			<dd><a href="<{:U('Center/index',array('qid'=>1,'home'=>5))}>"
				
			>产学研合作</a></dd>
            <dd><a href="<{:U('Center/index',array('qid'=>2,'home'=>5))}>"
            
            >创新成果</a></dd>
            <dd><a href="<{:U('Center/index',array('qid'=>3,'home'=>5))}>"
            	
            >标准制定</a></dd>
		</dl>
	<include file="Public:left" />
	</div>
	<div class="nyright fr">
		<div class="nytxt1">
        <ul class="nynewsul2">
        	<foreach name="zhuanjia_data" item="vo">

        		  <li class="nynewsli1">
					<div class="nynewsimg fl"><img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" alt="<{$vo.proname}>"></div>
					<div class="nynewstxt fr">
						<div class="nynewstit"><a href="javascript:void(0)"><{$vo.proname}></a></div>
						<div class="nynewstro">
						<{$vo.procontent}>
						</div>
					</div>
				</li>
        	</foreach>
          
         
		</ul>
        <div class="wbpager">
			<{$page}>
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
