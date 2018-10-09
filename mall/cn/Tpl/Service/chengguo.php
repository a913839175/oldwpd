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
                <li  class="li_hover"><a href="<{:U('Service/chengguo')}>">专业建设成果</a></li>
                <li><a href="<{:U('Service/ziyuan')}>">课程资源</a></li>
            </ul>
            <div class="ul_sw"></div>
        </div>
        <!--右侧-->
        <div class="main_right fr">
        	<div class="right_title">
            	<a href="<{:U('Index/index')}>">主页</a>&nbsp;&gt;&nbsp;
                <a href="<{:U('Service/index')}>">精品课程</a>&nbsp;&gt;&nbsp;
                <a href="<{:U('Service/chengguo')}>">专业建设成果</a>
            </div>
            <div class="right_box">
                <foreach name="chengguo_type_data" item="vo">
                    <div class="pro_box">
                        <div class="pro_pic">
                            <a href="<{:U('Service/cglist',array('tid'=>$vo[id]))}>" ><img src="__PUBLIC__/Uploads/Proclass/<{$vo.classphoto}>" height="154" width="216" /></a>
                        </div>
                        <div class="pro_name">
                            <a href="<{:U('Service/cglist',array('tid'=>$vo[id]))}>"><{$vo.proclassname}></a>
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
    <!--专业建设成果出框-->
    <!-- <div class="black_box">
        <div class="white_box">
            <div class="show_box">
                <iframe scrolling="no" src="" height="514" width="832" frameborder="0"></iframe>
            </div>
            <div class="show_bottom">
                <div class="back">返回</div>
            </div>
            <div class="cha"></div>
        </div>
    </div>   -->
    <script>
    //专业建设成果弹出框效果
    // $(function(){
    //     $('.pro_pic a,.pro_name a').click(function(){
    //         $('.black_box').fadeIn(600);
    //         var _href =$(this).attr('href');
    //         $('.show_box').find('iframe').attr('src',_href);	
    //     });
    //     $('.show_bottom .back,.white_box .cha').click(function(){
    //         $('.black_box').fadeOut(300);	
    //     });
    // });
    </script>  
</div>
    

</body>
</html>
