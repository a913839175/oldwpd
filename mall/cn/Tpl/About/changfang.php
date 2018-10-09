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
    <include file="Public:header" sign="2" />
    <!--主体内容-->
    <div id="main" class="w1080">
      <div class="main_title">
          <span>厂房设备</span>
            <div class="weizhi">
              当前位置：<a href="<{:U('Index/index')}>">首页</a>&gt;<a href="javascript:void(0)">厂房设备</a>
            </div>
        </div>
        <!--左侧-->
        <div class="main_left fl">
          <div class="left_title">
              关于我们
            </div>
            <ul class="left_ul">
                <li><a href="<{:U('About/index')}>">公司简介</a></li>
                <li><a href="<{:U('About/honor')}>">资质荣誉</a></li>
                <li  class="li_hover" ><a href="<{:U('About/changfang')}>">厂房设备</a></li>
            </ul>
        </div>
        <!--右侧-->
        <div class="main_right fr">
            <foreach name="cf_data" item="vo">
                <div class="pro">
                  <div class="pro-pic1">
                      <a href="<{:U('About/cf_info',array('id'=>$vo[id]))}>"><img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" height="160" width="231" /></a>
                    </div>
                    <div class="pro-name">
                      <a href="<{:U('About/cf_info',array('id'=>$vo[id]))}>"><{$vo.proname}></a>
                    </div>
                </div>
            </foreach>
          
            <div style="clear:both;"></div>
            <div class="pager">
                <{$page}>
            </div>
        </div>
    </div>
    <!--底部内容-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
