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
<include file="Public:header" sign="1" />
<!--flash-->
<div id="subflash">
  <img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>精品推荐</span><em>Fine recommendation</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
  <div class="subLeft">
      <div class="subTop">
          <ul>
              <li><a class="on" href="<{:U('About/jingpin')}>">精品推荐</a></li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
      <h3>
          <span>
            <{$about_data.paname}>
          </span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em><a href="<{:U('About/jingpin')}>">精品推荐</a></p>
        </h3>
        <div class="subCon">
          <{$jingpin_data.pacon}>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

</body>
</html>