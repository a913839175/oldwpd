<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>
<body >
<div id="wrap">
	<!--头部-->
    
   <div id="top">
    	<div class="top_content w1000">
        	<span class="fl">余姚市职教中心网站欢迎您！</span>
            <ul class="top_ul fr">
            	<li><a href="javascript:void(0)" class="top_icon1">活动</a></li>
                <li><a href="javascript:void(0)" class="top_icon2">资讯</a></li>
                <li><a href="<{:U('Member/login')}>" class="top_icon3">登录</a></li>
                <li><a href="<{:U('Member/reg')}>" class="top_icon4">注册</a></li>
            </ul>
        </div>
    </div>
    <div id="header">
    	<div class="header_content w1000">
        	<a href="<{:U('Index/index')}>" class="logo">
            	<img src="__PUBLIC__/Home/images/logo.png" />
            </a>
            <div class="top_phone">
            	<h2>全国免费热线</h2>
                <h3>400-0520-0120</h3>
            </div>
        </div>
    </div>
    <!--答题标题-->
    <div class="answer_title">
    	<div class="title_content w1000">
        	<h2><{$typeName}></h2>
        </div>
    </div>
    <!--答题内容-->
    <form action="<{:U('Answer/info')}>" method="post" name="form1">
    <div class="answer_content">

    	<foreach name="arr" item="vo" key="zk">
    		<div class="question"><{$zk+1}>、<{$vo.topicName}></div>
	        <ul class="answer_ul">
	        	<foreach name="vo[topicAnswers]" item="v" key="k">
	        		<li>
	        		<if condition="$vo[topicType] eq 0">
					<!--单选题 -->
					<input type="radio" class="answer_input" name="answer_<{$zk+1}>" value="<{$k+1}>" /><{$v}>
					<else />
						<!--多选题-->
						<input type="checkbox" class="answer_input" name="answer_<{$zk+1}>[]" value="<{$k+1}>" /><{$v}>
					</if>
					</li>
	        		
	        	</foreach>
	        	
	           
	        </ul>
	        <input type="hidden" name="topic_id[]" value="<{$vo.id}>" />
    	</foreach>
    	


        
        <div class="anniu_box">
        	<input type="submit" class="tj_anniu" value="提交" />
            <input type="reset" class="reset_anniu"  value="重新答题" />
            <input type="hidden" name="proid" value="<{$Think.get.proid}>" />
            <input type="hidden" name="userid" value="<{$Think.session.k_id}>" />
            <input type="hidden" name="tid" value="<{$Think.get.tid}>" />
        </div>
    </div>
	</form>
    <!--底部-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
