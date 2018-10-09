<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>
<body >
<div id="wrap">
	<!--头部-->
    <include file="Public:header" sign="3" />
    <!--banner-->
    <include file="Public:flash1" />
    <!--主体内容-->
    <div class="main_wrap">
    	<div class="main_title">
        	<div class="title_content w1000">
            	<div class="red_title">
                	<h2>新闻中心</h2>
                    <h3>NEWS CENTER</h3>
                </div>
                <ul class="title_ul">
                	<li><a href="<{:U('News/index',array('qid'=>1))}>">品牌活动</a></li>
                    <li class="li_hover"><a href="<{:U('News/index',array('qid'=>2))}>">视频中心</a></li>
                    <li><a href="<{:U('News/index',array('qid'=>3))}>">媒体报道</a></li>
                    <li><a href="<{:U('News/index',array('qid'=>4))}>">行业资讯</a></li>
                </ul>
            </div>
        </div>
    	<div id="main">
        	<div class="news_title">
            	<h2><{$data.title}></h2>
                <h3>发布日期：<{$data.showdate|date="Y-m-d",###}></h3>
                <div class="bdsharebuttonbox"><span class="fl">分享到：</span><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></div>
				<script>
                    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)]; 
                </script>
            </div>
            <div class="news_content">
            	<{$data.concon}>
            </div>
            <div class="video_wrap">
            	<div class="video_title">
                	相关视频
                    <a href="<{:U('News/index',array('qid'=>2))}>" class="video_more">&gt;&gt;更多</a>
                </div>
                <foreach name="other_video" item="vo">
                    <div class="video_box">
                        <div class="video_img">
                            <a href="<{:U('News/videoinfo',array('id'=>$vo[id]))}>"><img src="__PUBLIC__/Uploads/Content/<{$vo.conphoto}>" height="144" width="259" /></a>
                        </div>
                        <div class="video_name">
                            <h2><a href="<{:U('News/videoinfo',array('id'=>$vo[id]))}>"><{$vo.title}></a></h2>
                            <p><{$vo.showdate|date="Y-m-d",###}></p>
                        </div>
                    </div>
                </foreach>
            	
            </div>
        </div>
    </div>
    <!--底部内容-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
