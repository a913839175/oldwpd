<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/Home/css/base.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Home/css/layout.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Home/css/typography.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/Js/jquery.js"></script>
<script src="__PUBLIC__/Js/ajaxpage.js"></script>
</head>

<body>

<div id="main">

<include file="Public:header" />
<div id="center">

  <include file="Public:left" />
<div class="ny_side">
<div class="ny_side_1"><span class="ny_bt">网站地图</span></div>

<div class="ny_side_2">

<foreach name="data" item="v">

    <br />

  <?php
    for($i=0;$i<$v[count];$i++){
      echo "&nbsp;&nbsp;&nbsp;";
    }
  ?>
  <a href="<{$v.url}>"><{$v.catename}></a>
</foreach>
               
<br class="clear_cs"  style="clear:both" />

  
 

</div>
</div><!--side-->

</div><!--center-->
<include file="Public:footer" />
</div><!--main-->

</body>
</html>
