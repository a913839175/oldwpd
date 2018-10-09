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

<div class="pg-container">
<include file="Public:headertop" sign="3" />

<div class="pg-container-content">
<div id="sc_contain">
<!--header-->
<include file="Public:header" sign="3" />
<!--微币范围-->
<include file="Public:jifen" />

 <!--排序-->
 <include file="Public:sort" />
 
 
 <div id="sc_list">
  <ul>
  
	<foreach name="pro_data" item="vo">
       <li>
        <div class="sclist_img"><a  target="_blank" href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>"><img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" /></a></div>
        <div class="sclist_tx">
   			<a target="_blank" href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>"><{$vo.proname}></a>
         <p>
          微币：<span><{$vo.pro_jifen}></span>
         </p>
        </div>
       </li>
      
   </foreach>
  
  </ul>
   <div class="clear"></div>
        <div class="pager">
          <{$page}>
        </div>
 </div>
 <div class="clear"></div>
</div>
</div>
<!--footer-->
<include file="Public:footer" />
</div>
</div>
</body>
</html>