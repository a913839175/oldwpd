<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8" />
    <title><{$logodata.sname}></title>
    <meta name="keywords" content="<{$logodata.skeyword}>" />
    <meta name="description" content="<{$logodata.sjianjie}>" />
    <link rel="stylesheet" href="__PUBLIC__/Home/css/sc.css">
    <include file="Public:top" />
    
</head>
<body>
<include file="Public:newheader" />
<div id="sc_contain">
 <div id="sc_show">
  <ul>
   <li id="scshow_lt">
    <div id="scshow_img"><img src="__PUBLIC__/Uploads/Product/<{$data.prophoto}>" /></div>
    <div id="scshow_id">
     礼品编号：<span>0<{$data.id}></span>
     <div>
<!-- JiaThis Button BEGIN -->
<div class="jiathis_style"><span class="jiathis_txt">分享到：</span>
<a class="jiathis_button_qzone"></a>
<a class="jiathis_button_tsina"></a>
<a class="jiathis_button_tqq"></a>
<a class="jiathis_button_weixin"></a>
<a class="jiathis_button_renren"></a>
<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
</div>
<script type="text/javascript" >
var jiathis_config={
	summary:"",
	shortUrl:false,
	hideMore:false
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->
     </div>
     <br/>
     图片仅供参考，实际兑换礼品请以实物或您获取的服务为准
    </div>
   </li>
   <li id="scshow_rt">
    <div id="scshow_tt"><{$data.proname}></div>
    <div id="scshow_ts">商品简介：<{$data.prointo}></div>
   
   <form action="<{:U('Product/exchange')}>" method="post">
    <div id="scshow_jp">
  	  积&nbsp;&nbsp;&nbsp;&nbsp;分：&nbsp;<span><{$data.pro_jifen}></span>
   
    <p>
    	 
        <input type="hidden" value="<{$data.id}>" name="pid">
     配送至：&nbsp;<input type="text" placeholder="" name="address"/> &nbsp;&nbsp;<if condition="$data.pro_store gt 0">有货<else />暂时无货</if>
    </p>
   <if condition="$data.pro_store gt 0"> <input type="submit" value="立即兑换" /></if>
    
    </div>
    </form>
   </li>
  </ul>
 </div>
 <div class="clear"></div>
 <div id="scshow_qh">
  <ul>
   <li class="scqh_st">礼品介绍</li>
   <!-- <li>规格参数</li> -->
  </ul>
  <div class="clear"></div>
 </div>
 <div class="scshow_more scmore_st">
  <{$data.procontent}>
 </div>
<!--  <div class="scshow_more">
  <{$data.pro_guige}>
 </div> -->
</div>


<!--footer  Public:footer-->


 </div>
</div>
</body>
</html>