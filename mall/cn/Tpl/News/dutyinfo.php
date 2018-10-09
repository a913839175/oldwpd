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
    
    <include file="Public:header" sign="9" />
    <!--banner-->
    <div class="inside_banner">
        <img src="__PUBLIC__/Home/cn/images/inside_banner.png" height="200" width="1600" />
        <div class="banner_title">
            <h2>Social responsibility</h2>
            <h3>社会责任</h3>
        </div>
    </div>
    <!--主体内容-->
    <div id="main" class="w1000">
        <!--左侧-->
        <div class="main_left fl">
            <div class="left_title">
                社会责任
            </div>
            <ul class="left_ul">
              <li><a href="<{:U('News/duty',array('qid'=>1))}>">社会责任综述</a></li>
              <li class="li_hover"><a href="<{:U('News/duty',array('qid'=>2))}>">社会责任活动</a></li>
            </ul>
            </ul>
            <include file="Public:left" />
        </div>
        <!--右侧-->
        <div class="main_right fr">
            <div class="right_title">
                社会责任活动
                <div class="weizhi">
                    您当前的位置：<a href="javascript:void(0)">社会责任</a>&nbsp;&gt;&nbsp;
                     <a href="javascript:void(0)">社会责任活动</a>
                      
                </div>
            </div>
            <div class="right_box">
                <div class="news_title">
                    <h2><{$data.title}></h2>
                    <h3>发布日期：<{$data.showdate|date="Y-m-d",###}></h3>
                </div>
                <div class="news_center">
                    <{$data.concon}>
                </div>
            </div>
            <div class="news_page">
                <if condition="$prevdata">
                    <p>上一篇：<a href="<{:U('News/dutyinfo',array('id'=>$prevdata[id]))}>"><{$prevdata.title}></a></p>
                <else />
                    <p>上一篇：<a href="javascript:void(0)">没有了</a></p>
                </if>
                <if condition="$nextdata">
                    <p>下一篇：<a href="<{:U('News/dutyinfo',array('id'=>$nextdata[id]))}>"><{$nextdata.title}></a></p>
                <else />
                    <p>下一篇：<a href="javascript:void(0)">没有了</a></p>
                </if>

                <a href="javascript:history.go(-1);" class="back">返回上一页</a>
            </div>
        </div>
    </div>
    <!--底部内容-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
