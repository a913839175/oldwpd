<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>

<include file="Public:header" />
<!--end header nav banner-->
<!--main-->
<div class="bigdiv pt15">
	<div class="nyleft fl">

	<include file="Public:left" />

	</div>	
	<div class="nyright fr">
	<div class="nyright_bg1">
	<div class="nyright_bg2">
	<div class="nyright_bg3 min_h">
		<h3 class="nytit2">Download</h3>
		<div class="nytxt2">
       		<ul class="wbny-news">
       			<foreach name="data" item="vo">
       				<li><a href="<{:U('Download/down',array('id'=>$vo[id]))}>">·&nbsp;<{$vo.filename}></a><span><{$vo.addtime|date="Y.m.d",###}></span></li>
       			</foreach>
            	
            </ul>
              <div style="clear:both;"></div>
			<center><span class="ajaxpage"><{$page}></span></center>
		</div>
	</div>
	</div>	
	</div>	
	</div>
</div>
<!--end main-->
<!--footer-->
<include file="Public:footer" />
<!--end footer-->
</div>
</div>
</div>
</body>
<script type="text/javascript" src="__PUBLIC__/Home/En/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:3,interTime:50});
</script>
<script src="__PUBLIC__/Home/En/js/js.js"></script>
</html>