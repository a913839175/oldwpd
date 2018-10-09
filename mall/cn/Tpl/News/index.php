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
<include file="Public:header" sign="4" />
<!--flash-->
<div id="subflash">
    <img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>新闻中心</span><em>news center</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
    <div class="subLeft">
        <div class="subTop">
            <ul>
                <li><a <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="on"</if> href="<{:U('News/index',array('qid'=>1))}>">公司新闻</a></li>
                <li><a <if condition="$Think.get.qid eq 2">class="on"</if> href="<{:U('News/index',array('qid'=>2))}>">行业新闻</a></li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
        <h3>
            <span>
                <eq name="Think.get.qid" value="">公司新闻</eq>
                <eq name="Think.get.qid" value="1">公司新闻</eq>
                <eq name="Think.get.qid" value="2">行业新闻</eq>
            </span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em><a href="<{:U('News/index')}>">新闻中心</a><em>&gt;</em>
             <eq name="Think.get.qid" value="">公司新闻</eq>
             <eq name="Think.get.qid" value="1">公司新闻</eq>
             <eq name="Think.get.qid" value="2">行业新闻</eq>
            </p>
        </h3>
        <div class="subCon">
            <div id="news">
                <dl>
                    <dt>
                        <div class="img">
                            <img src="__PUBLIC__/Uploads/Content/<{$news_tj_data[0].conphoto}>" width="222" height="152" />
                        </div>
                        <div class="text">
                            <p class="title"><{$news_tj_data[0].title}></p>
                            <span><{$news_tj_data[0].showdate|date="Y-m-d",###}></span>
                            <div class="memo">
                                <p><{$news_tj_data[0].coninfo}></p>
                            </div>
                            <a href="<{:U('News/newsinfo',array('qid'=>$_GET[qid],'id'=>$news_tj_data[0][id]))}>"><em>+</em>查看详情</a>
                        </div>
                    </dt>
                    <foreach name="newsdata" item="vo">
                        <dd><a href="<{:U('News/newsinfo',array('qid'=>$_GET[qid],'id'=>$vo[id]))}>"><{$vo.title}></a><span><{$vo.showdate|date="Y-m-d",###}></span></dd>
                    </foreach>
                    
                </dl>
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
</html>