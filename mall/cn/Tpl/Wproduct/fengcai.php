<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>

<body>

<div>
<!--这是头部-->
<include file="Public:header" sign="7" />
     
<!--这是banner --> 
<include file="Public:flash1" />

<!--这是内页主体    -->
     <div class="ny_main">
            <div class="ny_main_contant">
                    <div class="main_pro_title">
                           <p>门店风采</p>
                           <img src="__PUBLIC__/Home/images/main_pro_title.png"/>
                     </div>
                     
                     <div class="ny_contant">
                             <include file="Public:left" />
                             
                             
                             <div class="ny_fr">
                                   <div class="ny_pro">
                                            <ul>
                                              <foreach name="pro_fc_data" item="vo">
                                                <li><a href="<{:U('Product/fc_info',array('id'=>$vo[id]))}>">
                                                          <img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" width="280" height="234"/>
                                                          <div class="ny_pro_hover">
                                                                <img src="__PUBLIC__/Home/images/main_pro_img_hover.png"/>
                                                          </div>
                                                          <p class="pro_name"><{$vo.proname}></p>
                                                     </a>
                                                 </li>
                                              </foreach>
                                                 
                                            </ul>
                                            
                                            <div class="clear">
                                            </div>
                                            
                                            <div class="pager">
                                             <{$page}>
                                            </div>
                                    </div>
                             </div>
                     </div>
            </div>
     </div>
<!--
这是底部-->
<include file="Public:footer" />

</div>


</body>
</html>
