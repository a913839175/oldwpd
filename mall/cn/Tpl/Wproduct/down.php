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
<include file="Public:header" sign="7" />
<!--flash-->
<div id="subflash">
	<img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>下载中心</span><em>down center</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
	<div class="subLeft">
    	<div class="subTop">
        	<ul>
            	<li><a <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="on"</if>  href="<{:U('Product/down',array('qid'=>1))}>">活动方案下载</a></li>
                <li><a <if condition="$Think.get.qid eq 2">class="on"</if> href="<{:U('Product/down',array('qid'=>2))}>">宣传资料下载</a></li>
                <li><a <if condition="$Think.get.qid eq 3">class="on"</if> href="<{:U('Product/down',array('qid'=>3))}>">其他资料下载</a></li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
    	<h3>
        	<span>活动方案下载</span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em>下载中心<em>&gt;</em>活动方案下载</p>
        </h3>
        <div class="subCon">
        	<div id="down">
            	<table width="100%">
                	<tr class="h">
                        <td width="38%"><span>文件名称</span></td>
                        <td width="28%"><span>发布时间</span></td>
                        <td width="26%"><span>下载</span></td>
                    </tr>
                    <foreach name="data" item="vo">
                        <tr>
                            <td><span><a target="_blank" href="__PUBLIC__/Uploads/Down/File/<{$vo.filecontent}>"><{$vo.filename}></a></span></td>
                            <td><span><{$vo.addtime|date="Y-m-d",###}></span></td>
                            <td><a target="_blank" href="__PUBLIC__/Uploads/Down/File/<{$vo.filecontent}>"><img src="__PUBLIC__/Home/images/down.jpg" /></a></td>
                        </tr>
                    </foreach>
                    
                    
                </table>
            </div>
            <div class="pager">
            	<{$page}>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

</body>
</html>ss