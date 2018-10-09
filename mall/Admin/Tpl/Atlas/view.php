<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看图册</title>


<script language="javascript">
	var GV = {
    DIMAUB: "/NewsWeb2/",
    JS_ROOT: "__PUBLIC__/Js/",
    TOKEN: "{$__token__}"
};
</script>


<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />
<load href="__PUBLIC__/Css/global.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/slides.min.jquery.js" />
<script>
	$(function(){
		$('#slides').slides({
			preload: true,
			preloadImage: '__PUBLIC__/Images/loading.gif',
			play: 5000,
			pause: 2500,
			hoverPause: true
		});
	});
</script>

</head>



<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
      <ul class="cc">
          <li><a href='<{:U("Atlas/plist")}>'>图册管理</a></li>
          <li><a href="javascript:void(0)">图片预览</a></li>
      </ul>
  </div>
  <center>
  	<div id="container">
		<div id="example">
			<img src="__PUBLIC__/Images/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">
			<div id="slides">
				<div class="slides_container">
                <foreach name="datapic" item="vo">
					<a href="javascript:void(0)" title="<{$vo.picname}>" target="_blank"><img src="__PUBLIC__/Uploads/Atl/<{$vo.savename}>" width="570" height="270" alt="Slide 1"></a>
				</foreach>
				</div>
				<a href="javascript:void(0)" class="prev"><img src="__PUBLIC__/Images/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="javascript:void(0)" class="next"><img src="__PUBLIC__/Images/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
			<img src="__PUBLIC__/Images/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
		</div>
        
	</div>
  </center>
  
</div>
</body>
</html>