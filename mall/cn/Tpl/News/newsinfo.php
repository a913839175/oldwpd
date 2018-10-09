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
            <div class="newShow">
                <h2><{$data.title}></h2>
                <p class="date">
                    <span>发布时间：<{$data.showdate|date="Y-m-d H:i:s",###}></span>&nbsp;
                </p>
                <div class="content">
                    <{$data.concon}>
                </div>
                <div class="newSx">
                    <if condition="$prevdata">
                        <a class="s" href="<{:U('News/newsinfo',array('qid'=>$_GET[qid],'id'=>$prevdata[id]))}>">上一篇：<{$prevdata.title}></a>
                    <else />
                        <a class="s" href="javascript:void(0)">上一篇：没有了</a>
                    </if>
                    
                    <if condition="$nextdata">
                        <a class="s" href="<{:U('News/newsinfo',array('qid'=>$_GET[qid],'id'=>$nextdata[id]))}>">下一篇：<{$nextdata.title}></a>
                    <else />
                        <a class="s" href="javascript:void(0)">下一篇：没有了</a>
                    </if>

                    <a class="b" href="javascript:history.go(-1);">返回上一页</a>
                </div>
                <div class="newShare">
                    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">人人网</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧">百度贴吧</a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友">QQ好友</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>