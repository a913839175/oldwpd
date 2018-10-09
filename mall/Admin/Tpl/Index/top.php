<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="javascript">
	var GV = {

    JS_ROOT: "__PUBLIC__/Js/",
  
};



</script>

<load href="__PUBLIC__/Css/admin.css" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Css/main.css" />
<load href="__PUBLIC__/Js/jquery_ui.js" />
<load href="__PUBLIC__/Css/jquery_ui.css" />
<style>
	.reload{
		cursor:pointer;
		}
</style>

<script type="text/javascript">
  $(function(){
    setInterval(getdata,10000);
  })

  function getdata(){
    $.get("<{:U('Index/timing')}>",{},function(data){
      if(data>0){
        $(".time_html").html('<a style="color:ff0000" target="main" href="<{:U(\'Index/right\')}>">有最新留言('+data+')</a>');
      }else{
        $(".time_html").html("");
      }
    })
  }
</script>
</HEAD>
<div id="main">
    <div id="head">
      <div id="logo">
        <a target="main" href="<{:U('Index/right')}>"><img src="__PUBLIC__/Images/home-1.jpg" border=0></a>
      </div>
      <div id="nav">
        <ul>
          <li><a href="javascript:;" class="onOver"><img src="__PUBLIC__/Images/home-1.png" border=0></a></li>
          <!--<li><a href="<{:C('pssite')}>mobile/admin.php" target="_top"><img src="__PUBLIC__/Images/home-2.png" border=0></a></li>
           <li><a href="<{:C('pssite')}>wx/index.php?g=Home&m=Users&a=validates" target="_top"><img src="__PUBLIC__/Images/home-3.png" border=0></a></li>-->

        </ul>
        <p class="time_html"></p>
      </div>

      <div id="user">
        <a href="javascript:void(0)"><img src="__PUBLIC__/Images/home-4.png" border=0></a>
        <span>
          <h2><{$data_site_name.stitle}></h2>

          <p><a  onclick="if (confirm('确定要退出系统吗？')) return true; else return false;" 
      href="__APP__/Login/logout" target="_top">[退出]</a><a href="<{:C('pssite')}>web/index.php" class="user_a" target="_blank">预览前台</a></p>
        </span>
        
      </div>
      
        
      </div>
      
  </div>
  
<BODY>
</BODY></HTML>
