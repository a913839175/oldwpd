<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>
<body >
<div id="wrap">
	<!--头部-->
    <include file="Public:header" sign="4" />
    <!--banner-->
    <include file="Public:flash1" />
    <!--主体内容-->
    <div id="main" class="w1180">
    	<div class="title">
        	<h2>technical support</h2>
            <h3>技术支持</h3>
        </div>
        <div class="weizhi">
        	<a href="<{:U('Index/index')}>">首页</a>&gt;<a href="javascript:void(0)">技术支持</a>
        </div>
        <!--左侧-->
        <div class="main_left fl">
        	<ul class="left_ul">
            	<li <if condition="$Think.get.qid eq 1 or $Think.get.qid eq ''">class="producttype1sel"</if> ><a href="<{:U('Service/jishu',array('qid'=>1))}>">技术优势</a></li>
                <li <if condition="$Think.get.qid eq 2">class="producttype1sel"</if> ><a href="<{:U('Service/jishu',array('qid'=>2))}>">技术标准</a></li>
            </ul>
        </div>
        <!--右侧-->
        <div class="main_right fr">
        	<div class="right_box">
            	　　<{$data.pacon}>
            </div>
            
        </div>
    </div>
    <!--底部版权-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
