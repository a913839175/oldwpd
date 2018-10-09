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
<include file="Public:header" sign="8" />
<!--flash-->
<div id="subflash">
  <img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>联系我们</span><em>contact us</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
  <div class="subLeft">
      <div class="subTop">
          <ul>
              <li><a <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="on"</if> href="<{:U('Contact/index',array('qid'=>1))}>">联系方式</a></li>
                <li><a <if condition="$Think.get.qid eq 2">class="on"</if>  href="<{:U('Contact/index',array('qid'=>2))}>">电子地图</a></li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
      <h3>
          <span>联系方式</span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em>联系我们<em>&gt;</em>联系方式</p>
        </h3>
        <div class="subCon">
          <{$contact_data.pacon}>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

</body>
</html>