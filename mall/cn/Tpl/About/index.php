<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
    
</head>
<body>
<!--header-->
<include file="Public:header" sign="2" />
<!--flash-->
<div id="subflash">
  <img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>走进多意</span><em>into duoyi</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
  <div class="subLeft">
      <div class="subTop">
          <ul>
              <li><a <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="on"</if> href="<{:U('About/index',array('qid'=>1))}>">公司简介</a></li>
              <li><a href="<{:U('About/culture')}>">企业文化</a></li>
              <li><a href="<{:U('About/honor')}>">企业荣誉</a></li>
              <li><a href="<{:U('About/licheng')}>">发展历程</a></li>
              <li><a <if condition="$Think.get.qid eq 2">class="on"</if> href="<{:U('About/index',array('qid'=>2))}>">核心技术</a></li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
      <h3>
          <span>
            <{$about_data.paname}>
          </span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em><a href="<{:U('About/index')}>">走进多意</a><em>&gt;</em><{$about_data.paname}></p>
        </h3>
        <div class="subCon">
          <{$about_data.pacon}>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

</body>
</html>