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
                <a href="<{:U('Service/ziyuan')}>">课程资源</a>&nbsp;&gt;&nbsp;
                <a href="javascript:void(0)"><{$typename}></a>
            </div>
            <div class="right_box">
            	<div class="rnews_title">
                	<{$data.proname}>
                </div>
                <div class="rnews_content">
                	<{$data.procontent}>
                </div>
            	<div class="news_next">
                    <div class="next_l fl">

                       <if condition="!$prevdata">
                         <p>
                            <span>上一篇</span>
                            <a href="javascript:void(0)">没有了</a>
                        </p>
                        <else />
                            <p>
                                <span>上一篇</span>
                                <a href="<{:U('Service/zyinfo',array('id'=>$prevdata[id]))}>"><{$prevdata.proname}></a>
                            </p>
                        </if>   
                       
                        <if condition="!$nextdata">
                             <p>
                                <span>下一篇</span>
                                <a href="javascript:void(0)">没有了</a>
                            </p>
                        <else />
                            <p>
                                <span>下一篇</span>
                                <a href="<{:U('Service/zyinfo',array('id'=>$nextdata[id]))}>"><{$nextdata.proname}></a>
                            </p>
                        </if> 



                    </div>
                    <div class="next_r fr">
                        <a href="javascript:history.go(-1);" class="back_a">返回</a>
                    </div>
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
