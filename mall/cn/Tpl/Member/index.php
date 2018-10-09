<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>
<body>
    
    <div id="hd_nav_bn">
        <include file="Public:header"  />
        

        <include file="Public:flash" />

    </div>
<!-- content -->

    <div class="bigdiv nymain">
        <div class="nyleft fl">
            
          <include file="Public:left" />
            
          <include file="Public:left_bottom" />

        </div>
        <div class="nyright fr">
            <div class="nyright_tit1">
                <em></em>
                <span class="span_1">学员中心</span>
                <span class="span_2">
                    <a href="<{:U('Index/index')}>">首页</a>
                    &gt;
                    学员中心
                </span>
            </div>
            <div class="nyright_txt">

                　　<p>用户名：<{$data.username}></p>
                    <p>昵　称：<{$data.nicname}></p>
                    <p>邮　箱：<{$data.email}></p>
                    
            </div>
        </div>
        <div class="clear"></div>
    </div>
<!-- footer -->
<include file="Public:footer" />

</body>
</html>