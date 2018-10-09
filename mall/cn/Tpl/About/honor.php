<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/colorbox.css">
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
              <li><a href="<{:U('About/index',array('qid'=>1))}>">公司简介</a></li>
              <li><a href="<{:U('About/culture')}>">企业文化</a></li>
              <li><a class="on" href="<{:U('About/honor')}>">企业荣誉</a></li>
              <li><a href="<{:U('About/licheng')}>">发展历程</a></li>
              <li><a href="<{:U('About/index',array('qid'=>2))}>">核心技术</a></li>
          </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
      <h3>
          <span>企业荣誉</span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em><a href="<{:U('About/index')}>">走进多意</a><em>&gt;</em>企业荣誉</p>
        </h3>
        <div class="subCon">
          <div id="honor">
              <ul>
                <foreach name="honor_data" item="vo">
                  <li>
                      <a class="group1" href="__PUBLIC__/Uploads/Product/<{$vo.img}>" title="<{$vo.proname}>">
                          <img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" width="267" height="180" />
                        </a>
                  </li>
                </foreach>
                  
                   
                </ul>
            </div>
            <div class="pager">
              <{$page}>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

<script src="__PUBLIC__/Home/js/jquery.colorbox.js"></script>
<script>
  
  
  $(".group1").colorbox({rel:'group1'});
  
</script>
</body>
</html>