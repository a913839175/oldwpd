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
<include file="Public:header" sign="6" />
<!--flash-->
<div id="subflash">
	<img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>品牌加盟</span><em>Join</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
	<div class="subLeft">
    	<div class="subTop">
        	<ul>
            	<li><a <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="on"</if> href="<{:U('About/join',array('qid'=>1))}>">加盟政策</a></li>
                <li><a <if condition="$Think.get.qid eq 2">class="on"</if> href="<{:U('About/join',array('qid'=>2))}>">加盟条件</a></li>
                <li><a  <if condition="$Think.get.qid eq 3">class="on"</if> href="<{:U('About/join',array('qid'=>3))}>">加盟流程</a></li>
                <li><a href="javascript:;">在线申请</a></li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
    	<h3>
        	<span>
                <eq name="Think.get.qid" value="">加盟政策</eq>
                <eq name="Think.get.qid" value="1">加盟政策</eq>
                <eq name="Think.get.qid" value="2">加盟条件</eq>
                <eq name="Think.get.qid" value="3">加盟流程</eq>
            </span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em>品牌加盟<em>&gt;</em>
                <eq name="Think.get.qid" value="">加盟政策</eq>
                <eq name="Think.get.qid" value="1">加盟政策</eq>
                <eq name="Think.get.qid" value="2">加盟条件</eq>
                <eq name="Think.get.qid" value="3">加盟流程</eq>
            </p>
        </h3>
        <div class="subCon">
        	<{$join_data.pacon}>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

</body>
</html>