<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>
</head>
<body >
<div id="wrap">
	<!--头部-->
    
    
    <include file="Public:header" sign="4" />
    <!--banner-->
    <div class="inside_bannner bg2">
    	<div class="banner_center w1000">
        	<div class="banner_title">
            	<div class="bl fl">
                	精品课程
                </div>
                <div class="br fl">
                	<p>Create brand integrity, professional achievements accurate.</p>
                    <p>诚信缔造品牌，专业成就精准。</p>
                </div>
            </div>
        </div>
    </div>
    <!--主体内容-->
    <div id="main" class="w1000">
    	<!--左侧-->
    	<div class="main_left fl">
        	<div class="left_title">
            	<h2>精品课程</h2>
                <h3>Courses</h3>
            </div>
            <ul class="left_ul">
                <li><a href="<{:U('Service/index',array('qid'=>1))}>">课程大纲及标准</a></li>
                <li><a href="<{:U('Service/index',array('qid'=>2))}>">专业介绍</a></li>
                <li><a href="<{:U('Service/chengguo')}>">专业建设成果</a></li>
                <li   class="li_hover" ><a href="<{:U('Service/ziyuan')}>">课程资源</a></li>
            </ul>
            <div class="ul_sw"></div>
        </div>
        <!--右侧-->
        <div class="main_right fr">
        	<div class="right_title">
            	<a href="<{:U('Index/index')}>">主页</a>&nbsp;&gt;&nbsp;
                <a href="<{:U('Service/index')}>">精品课程</a>&nbsp;&gt;&nbsp;
                <a href="javascript:void(0)">课程资源</a>
            </div>
            <div class="right_box">
            	<include file="Public:toptype" />

                <foreach name="three_type_data" item="vo">
                    <div class="zy_list">
                        <div class="zy_l fl">
                            <a href="<{$vo.url}>"><img src="__PUBLIC__/Uploads/Proclass/<{$vo.classphoto}>" height="108" width="108" /></a>
                        </div>
                        <div class="zy_r fr">
                            <h2><a href="<{$vo.url}>"><{$vo.proclassname}></a></h2>
                            <p><{$vo.proclasscontent}></p>
                            <h3>
                                posttime:  <{$vo.addtime|date="Y-m-d",###}>
                                <a href="<{$vo.url}>" class="rn_a"></a>
                            </h3>
                        </div>
                    </div>
                </foreach>
                
                
                <div class="clear"></div>
                <div class="pager">
                    <{$page}>
                </div>
                <div class="right_bottom"></div>
            </div> 
        </div>
        <div class="clear"></div>
    </div>
    <!--底部-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
