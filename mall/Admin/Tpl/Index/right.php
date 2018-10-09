<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<load href="__PUBLIC__/Css/admin.css" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/jquery_ui.js" />
<load href="__PUBLIC__/Css/jquery_ui.css" />
<style>
table{
    
  }
  .wordcolor{
    color:#6D6D6D;
  }
  .wordback{
    background: #ccc;
  }
</style>

</script>
<style type="text/css">
  ul,li{list-style: none; padding:0px; margin:0px;}
  #dialog ul li{
    height:30px;
    line-height: 30px;
    border-bottom:1px solid #ddd;
    overflow: hidden;
  }
  #dialog ul li span{
    display: block;
    float: left;
    width:33%;
    height:30px;
    text-indent: 20px;
    overflow:hidden;
  }
</style>

<style type="text/css">
  ul,li{list-style: none; padding:0px; margin:0px;}
  #dialog ul li{
    height:30px;
    line-height: 30px;
    border-bottom:1px solid #ddd;
    overflow: hidden;
  }
  #dialog ul li span{
    display: block;
    float: left;
    width:33%;
    height:30px;
    text-indent: 20px;
    overflow:hidden;
  }
</style>
</HEAD>
<BODY>
    
    <script language="javascript">
		 function getDateTime(){
 		 var date = new Date();//取得当期日期
 		 var dateStr=date.toLocaleString() +" ";//把当前日志转化为本地日期
  			dateStr += "星期"+'日一二三四五六'.charAt(date.getDay());//取得星期并格式化
 			 document.getElementById('datezi').innerHTML=dateStr;//把时间显示到activeDateTime上
 			}
 		setInterval("getDateTime()",1000);//间隔时间更新时间
          	
 	</script>   
    


<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  <TR height=52>
    <TD background="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当前位置: <span class="wordcolor">派桑网络后台管理系统--网站信息管理</span></TD>
  </TR>
  <TR>
    <TD class="wordback" height=1></TD></TR>
  </TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="94%" align=center border=0>
  <TR height=150>
    <TD align=middle width=100><IMG height=100 src="__PUBLIC__/Images/admin_p.gif" 
      width=90></TD>
    <TD width=60>&nbsp;</TD>
    <TD>
      <TABLE height=100 cellSpacing=0 cellPadding=0 width="100%" border=0>
        
        <TR>
          <TD class="wordcolor">当前时间：<span id="datezi"></span>
       
          </TD></TR>
        <TR>
          <TD><{$Think.session.username}></TD></TR>
        <TR>
          <TD class="wordcolor">欢迎进入网站管理中心！</TD></TR></TABLE></TD></TR>
  <TR>
    <TD colSpan=3 height=10></TD></TR></TABLE>
    <TR>
    <table  cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
      <TR>
    <TD class="wordback" height=1></TD></TR>
    </table>
<TABLE cellSpacing=0 cellPadding=0 width="95%" align=center border=0>
  
  <TR height=20>
    <TD></TD></TR>

  <TR height=22>
    <TD align=left style="font-size:14px; font-weight:bold; font">&nbsp;&nbsp;&nbsp;您的相关信息</font></TD></TR>
 
  <TR height=20>
    <TD></TD></TR></TABLE>

<table  cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
      <TR>
    <TD class="wordback" height=1></TD></TR>
    </table>
<TABLE cellSpacing=0 cellPadding=2 width="95%" align=center border=0>
  <TR>
    <TD width=100 height="33" align=right class="wordcolor">登录帐号：</TD>
  <TD style="COLOR: #D75555"><{$data.username}></TD></TR>
  <TR>
    <TD height="30" align=right class="wordcolor">真实姓名：</TD>
  <TD style="COLOR: #D75555"><{$data.nicname}></TD></TR>
  <TR>
    <TD height="30" align=right class="wordcolor">注册时间：</TD>
    
    <TD style="COLOR: #D75555"><{$data.addtime|date="Y-m-d H:i:s",###}></TD></TR>
  <TR>
    <TD height="30" align=right class="wordcolor">登录次数：</TD>
    <TD style="COLOR: #D75555"><{$data.loginnum}></TD></TR>
  <TR>
    <TD height="30" align=right class="wordcolor">上次登录时间：</TD>
    <TD style="COLOR: #D75555"><{$data.lastlogtime|date="Y-m-d H:i:s",###}></TD></TR>
   <TR>
    <TD height="30" align=right class="wordcolor">上次登录地址：</TD>
    <TD style="COLOR: #D75555"><{$data.lastcountry}></TD></TR>
  <TR>
  

</TABLE>
<!--<div id="dialog" >
  <ul>
  <li><span>标题</span><span>留言内容</span><span>留言时间</span></li>
    <foreach name="guest_data" item="vo">
      <li><a href="<{:U('Comments/replyguest',array('id'=>$vo[id]))}>"><span><{$vo.username}></span><span><{$vo.content}></span><span><{$vo.addtime|date="Y-m-d H:i:s",###}></span></a></li>
    </foreach>
    
  </ul>
</div>-->
</BODY></HTML>


<script type="text/javascript">
  $(function(){
    $("#dialog").dialog({
      title:'最新留言',
      position: ['right', 'bottom'],
      width:600,
      height:300,
      show:'slide',
      hide:'slide',
    });
    setInterval(get_timing_data,10000);
  })
  function get_timing_data(){

    $.get("<{:U('Index/timing_right')}>",{},function(data){
      var html = '';
      html +='<li><span>标题</span><span>留言内容</span><span>留言时间</span></li>';
      $.each(data,function(k,v){
        html +='<li><a href="__APP__/Comments/replyguest/id/'+v.id+'"><span>'+v.username+'</span><span>'+v.content+'</span><span>'+v.addtime+'</span></a></li>';
      })
      $("#dialog ul").html(html);
    },'JSON')
  }
</script>
