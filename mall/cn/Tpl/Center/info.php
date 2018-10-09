<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />

<include file="Public:top" />
</head>
<body>
<!--header nav banner -->

<include file="Public:header" sign="6" />
<include file="Public:flash1" />
<!--end header nav banner-->
<!--main-->
<div class="bigdiv">
    <div class="side fl">
        <h2>研发中心</h2>
        <ul class="listTwoul">
            
            <li><a <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="li1a active1"</if> href="<{:U('Center/index',array('qid'=>1))}>" class="li1a">论文</a></li>
    <li><a <if condition="$Think.get.qid eq 2">class="li1a active1"</if>  href="<{:U('Center/index',array('qid'=>2))}>" class="li1a">专利</a></li>
            
        </ul>   
    </div>
    <div class="nymain fr">
        <div class="crumb_box">
            <span class="fl">
            <eq name="Think.get.qid" value="">论文</eq>
            <eq name="Think.get.qid" value="1">论文</eq>
            <eq name="Think.get.qid" value="2">专利</eq>
        </span>
            <div class="fr">
                您的位置：<a href="<{:U('Index/index')}>">网站首页</a> &gt; <a href="<{:U('Center/index')}>">
                <eq name="Think.get.qid" value="">论文</eq>
            <eq name="Think.get.qid" value="1">论文</eq>
            <eq name="Think.get.qid" value="2">专利</eq>
            </a>
            </div>          
        </div>
        <div class="nytxt">
            <{$data.procontent}>
        </div>
         <div style="text-align:center;" >
                    <if condition="$prevdata">
                        <a href="<{:U('Center/info',array('id'=>$prevdata[id],'qid'=>$_GET['qid']))}>">上一页</a>
                    <else />
                        <a href="javascript:void(0)">上一页</a>
                    </if>
                    &nbsp;&nbsp;
                    <if condition="$nextdata">
                        <a href="<{:U('Center/info',array('id'=>$nextdata[id],'qid'=>$_GET['qid']))}>">下一页</a>
                    <else />
                        <a href="javascript:void(0)">下一页</a>
                    </if>
                    
                
            </div>
    </div>
    <br class="clear">
</div>
<!--end main-->
<include file="Public:footer" />
</body>
</html>