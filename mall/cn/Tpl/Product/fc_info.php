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
                                      <div class="productd">
                                      <{$data.procontent}>
                                      </div>       
                                      <div class="pages">
                                          <if condition="$prevdata">
                                             <span class="pre"><a href="<{:U('Product/fc_info',array('id'=>$prevdata[id]))}>">上一页</a></span>
                                          <else />
                                             <span class="pre"><a href="javascript:;">上一页</a></span>
                                          </if>
                                          
                                           <if condition="$nextdata">
                                             <span class="next"><a href="<{:U('Product/fc_info',array('id'=>$nextdata[id]))}>">下一页</a></span>
                                          <else />
                                             <span class="next"><a href="javascript:;">下一页</a></span>
                                          </if>
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

