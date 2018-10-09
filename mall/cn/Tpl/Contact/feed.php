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
    <include file="Public:header" sign="7" />
    <!--banner-->
    <include file="Public:flash1" />
    <!--主体内容-->
    <div class="main_wrap">
    	<div class="main_title">
        	<div class="title_content w1000">
            	<div class="red_title">
                	<h2>预约试驾</h2>
                    <h3>TEST DRIVE</h3>
                </div>
            </div>
        </div>
    	<div id="main">
        	<div class="test_title">
            	<h2>预约试驾</h2>
                <h3><em>*</em>为必填项。您的信息，我们将会完全保密，请您放心填写。</h3>
            </div>
            <form action="<{:U('Contact/feed')}>" method="post" name="myform" onSubmit="return checkmessage();">
	            <ul class="test_ul">
	            	<li>
	                	<span>姓名<em>*</em></span>
	                    <input type="text" name="username" class="input_style" />
	                </li>
	                <li>
	                	<span>性别<em>*</em></span>
	                    <input type="radio" name="sex" value="1" checked />&nbsp;男&nbsp;&nbsp;
	                    <input type="radio" name="sex" value="0" />&nbsp;女
	                </li>
	                <li>
	                	<span>手机<em>*</em></span>
	                    <input type="text" name="content" class="input_style" />
	                </li>
	                <li>
	                	<span>&nbsp;</span>
	                    <input type="submit" class="anniu" value="申请试驾" />
	                </li>
	            </ul>
        	</form>
        </div>
    </div>
    <!--底部内容-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
<script type="text/javascript">
	function checkmessage(){
		var myform = document.myform;
		if(myform.username.value==""){
			alert("姓名不能为空");
			myform.username.focus();
			return false;
		}
		
		if(myform.content.value==""){
			alert("电话不能为空");
			myform.content.focus();
			return false;
		}
	}
</script>