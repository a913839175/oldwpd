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
              <li <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="li_hover"</if> ><a href="<{:U('News/duty',array('qid'=>1))}>">社会责任综述</a></li>
              <li <if condition="$Think.get.qid eq 2">class="li_hover"</if> ><a href="<{:U('News/duty',array('qid'=>2))}>">社会责任活动</a></li>
            </ul>
            <include file="Public:left" />
        </div>
        <!--右侧-->
        <div class="main_right fr">
          <div class="right_title">
              <eq name="Think.get.qid" value="">社会责任综述</eq>
              <eq name="Think.get.qid" value="1">社会责任综述</eq>
              <eq name="Think.get.qid" value="2">社会责任活动</eq>
                <div class="weizhi">
                  您当前的位置：<a href="javascript:void(0)">社会责任</a>&nbsp;&gt;&nbsp;
                    <a href="javascript:void(0)">
                        <eq name="Think.get.qid" value="">社会责任综述</eq>
                        <eq name="Think.get.qid" value="1">社会责任综述</eq>
                        <eq name="Think.get.qid" value="2">社会责任活动</eq>
                    </a>
                </div>
            </div>
            <div class="right_box">
                <if condition="$Think.get.qid neq 2">
                    <{$duty_data.concon}>
                <else />
                    <ul class="news_list1">
                    <foreach name="duty_data" item="vo">
                        <li>
                            <a href="<{:U('News/dutyinfo',array('id'=>$vo[id]))}>">
                                <div class="news_date fl">
                                    <h2><{$vo.showdate|date="d",###}></h2>
                                    <h3><{$vo.showdate|date="Y-m",###}></h3>
                                </div>
                                <div class="news_nr fl">
                                    <h2><{$vo.title}></h2>
                                    <p><{$vo.coninfo}></p>
                                </div>
                            </a>
                        </li>
                    </foreach>
                    
                    
                </ul>
                <div class="clear"></div>
                <div class="pager"><{$page}></div>
                </if>
            </div>
        </div>
    </div>
    <!--底部内容-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
