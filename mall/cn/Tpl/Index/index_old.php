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

<include file="Public:headertop" />


<div class="pg-container-content">


<div id="sc_contain">

<!--header-->
<include file="Public:header" sign="1" />
<!--flash-->
<include file="Public:banner" />

<div id="sc_slider">
  <div class="igb"></div>
  <div id="slider_gg">
  	<div class="slidergg_espd">官方公告<a  target="_blank" href="https://www.weipaidai.com/notices/index.html">更多</a></div>
   <ul>
   
    <volist name="news_data" id="vo">
    <li><{$vo.name}> </li>
    </volist>
    
   </ul>
  </div>
  <div id="slider_tx">
   <p>微＋系列的预期年化率：</p>
   <div class="scwei"></div>
  </div>
  <a target="_blank" href="https://www.weipaidai.com/tenderlist/index.html">查看详情 >></a>
 </div>
 
 <div class="clear"></div>
 <div id="sc_tj">精品推荐</div>
 <table id="sc_jp">
 <volist name="pro_tj_data" id="vo" key="k">
  <tr <eq name="k" value="1">class="jp_fl"</eq>>
  	<volist name="vo" id="vod">
  	 <td><a  target="_blank" href="<{:U('Product/proinfo',array('id'=>$vod[id]))}>"><img src="__PUBLIC__/Uploads/Product/<{$vod.prophoto}>" /></a></td>
   </volist>
  </tr>
  </volist>
  </table>
  <div id="sc_bm"></div>
</div>


<!--footer-->
<include file="Public:footer" />
</div>
</div>
</body>
</html>