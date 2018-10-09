<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>微商城</title>
         <link rel="stylesheet" type="text/css" href="__PUBLIC__/Cn/css/index.css?v=20170504">
    <include file="Public:top"/>
</head>
<body>
<include file="Public:newheader"/>
<!--重要！div1的样式不能随意改动 和兑换名单的滚动有关-->
<style type="text/css">
    #div1 {
        height: 161px;
        overflow: hidden;
    }
</style>
<!-- 预先加载这段JS 图片的排版 -->
<script>
$(document).ready(function(){
  var wegouli=$('.jf_wgtjli').length;
    for(i=0;i<wegouli;i++){
        if(i % 2 ==0){
            $('.jf_wgtjli').eq(i).css('margin-left','0');
        }
    }
});
</script> 

<div class="jf_indexbox">
        <!-- banner区块 -->
    <div class="jf_bannerback">
        <div class="jf_bnner clearfix">            
        <div id="banner_tabs" class="flexslider">
            <ul class="slides clearfix">
        <volist name="atl" id="vo">
            <li>
                <a target="_blank" href="<{$vo.pichref}>">
                    <p  style="background: url(__PUBLIC__/Uploads/Atl/<{$vo.savename}>) no-repeat center;  height: 364px;" ></p>
                </a>
            </li>
        </volist>
            
            </ul>
            <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
        <volist name="atl" id="vo">
                <li><a><{$i}></a></li>
            </volist>
            </ol>
        </div>
        <!-- 签到部分 -->
        <div class="jf_jd">
            <div class="jf_qdz">
                <empty name="Think.session.k_user">
                 <p class="jf_idltx2"></p>
                <p class="jf_ckjf"><a href="../?user&q=login">立即登录</a></p>
                 <else />
                <div class="jf_dlck">
                    <p class="jf_idltx"></p>
                    <p class="jf_xfc">hi，<span class="jf_colorblue"><{$user_info['realname']}></span></p>
                    <p class="jf_wb clearfix">目前您拥有<span class="jf_wbsl"><if condition="$credit['credit'] lt 0">0<else /><{$credit['credit']}></if></span>微币
                    <a href="/?user&q=help/help/help_integral" target="_blank"><img src="__PUBLIC__/Cn/images/jfindex/jf_wenhao01.png" class="jf_imgwenhao" /></a>
                    </p>
                </div>
                 </empty>
            </div>
            <div class="jf_qdms">
                <div class="jf_msf clearfix">
                <p class="jf_yuandian"></p>
                <p class="jf_mswz">新注册用户得5微币</p>
                </div>
                <div class="jf_msf clearfix">
                <p class="jf_yuandian"></p>
                <p class="jf_mswz">首次充值成功得15微币</p>
                </div>
                 <div class="jf_msf clearfix">
                <p class="jf_yuandian"></p>
                <p class="jf_mswz">连续5天签到得1微币</p>
                </div>
                 <div class="jf_msf clearfix">
                <p class="jf_yuandian"></p>
                <p class="jf_mswz">理财投资得微币</p>
                </div>
                 <div class="jf_msf clearfix">
                <p class="jf_yuandian"></p>
                <p class="jf_mswz">参加活动得微币</p>
                </div>
            </div>
            <div class="qiandaonew">
            <if condition="$sign_status eq 1">
                <a href="javascript:;" id="qiandao">
                    <nobr id="shanshuo"></nobr>
            <div class="jf_sjsm1" id="qiandao_btn">
                 <p class="jf_sjsmbt">今日已签到</p>
                 <p class="jf_sjsmcontent">多多微币奖励等你来拿</p>
             </div></a>
            <else />
             <a href="javascript:;" onclick="qiandao()" id="qiandao">
                <nobr id="shanshuo"></nobr>
            <div class="jf_sjsm1" id="qiandao_btn">
                 <p class="jf_sjsmbt">签到赚微币</p>
                 <p class="jf_sjsmcontent">更多微币奖励等你来拿</p>
             </div></a>
            </if>
            </div>
        </div>
        </div>
    </div>    
        <style>
        #jia1{
                animation: in_qiandao 2s infinite ;
                opacity: 0;
                animation-fill-mode:forwards;
                -webkit-animation-fill-mode:forwards; 
                -moz-animation-fill-mode:forwards; 
                -o-animation-fill-mode:forwards;
                display: block;
        }
        @keyframes in_qiandao{
            0% {opacity: 0;-webkit-opacity: 0;-moz-opacity: 0;width: 0%}
            25%{opacity: 1;-webkit-opacity:1;-moz-opacity: 1;width: 25%}
            75%{opacity: 1;-webkit-opacity:1;-moz-opacity: 1;width: 75%}
            100%{opacity: 1;-webkit-opacity:1;-moz-opacity: 1;width: 100%}
        }       
         </style>
     <!-- 微购推荐 -->
    <div class="jf_wgtjback">
        <div class="jf_wgtj">
            <div class="jf_inwgbt clearfix">
                <p class="jf_infh"></p>
                <p class="jf_inbt2">微购推荐</p>
                <p class="jf_inms">超值微品提前享</p>
                <a href="<{:U('Product/index',array('opage'=>'6'))}>"><p class="jf_ingd">更多</p></a>
                <img src="__PUBLIC__/Cn/images/jfindex/snew.png" class="snew" />
            </div>
            <ul class="jf_wgtjul clearfix">
              
                <volist name="front" id="vo">
                <li class="jf_wgtjli">
                    
                    <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>"><img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" class="wgshopimg" /></a>

                    <div class="jf_wgms">
                    <div class="weizhi10">
                           <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>"><p class="jf_wgmsbt"><{$vo.proname}></p></a>
                          <p class="jf_wgjg"><span class="jf_xianjg">0~<{$vo.pro_jifen}></span><span class="jf_wgwb">微币</span></p> 
                          <div class="jf_wgewsy clearfix">
                              <p class="jf_wejiahao">+</p>
                              <p class="jf_weyqew">历史额外最高收益</p>
                              <p class="jf_wesyjg">¥<{$vo.reward_temp}></p>
                          </div>
                          <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>" class="jf_ljg">GO  ·  购</a>
                    </div>
                    </div>
                    <img src="__PUBLIC__/Cn/images/jfindex/jf_weglogo.png"  class="wegoubt" />
                </li>
                </volist>
            </ul>
        </div>
    </div>
    <!-- 热门推荐 -->
    <div class="jf_rmtjback">
        <div class="jf_rmtj">
            <div class="jf_intybt clearfix">
                <p class="jf_infh"></p>
                <p class="jf_inbt2">热门推荐</p>
                <p class="jf_inms">各类热门微品</p>
                <a href="<{:U('Product/index')}>"><p class="jf_ingd">更多</p></a>
            </div>
            <ul class="jf_rmthul clearfix">
                <volist name="rxtj" id="vod">
                    <li class="jf_rmtjli">
                    <div class="jf_rmtjtop">
                        <a href="<{:U('Product/proinfo',array('id'=>$vod[id]))}>"><img src="__PUBLIC__/Uploads/Product/<{$vod.prophoto}>" class="jf_rmtjimg1" /></a>
                    </div>
                    <div class="jf_rmtjbt">
                        <a href="<{:U('Product/proinfo',array('id'=>$vod[id]))}>"><p class="jf_rmtjseven"><{$vod.proname}></p></a>
                        <div class="jf_newdh clearfix">
                        <p class="jf_rightjf"><span class="jf_qdys"><{$vod.pro_jifen}></span>微币</p>
                        <a href="<{:U('Product/proinfo',array('id'=>$vod[id]))}>" ><p class="jf_rmtjdx">兑换</p></a>
                        </div>
                    </div>
                </li>
                </volist>
            </ul>
        </div>
    </div>
    <!-- 理财投资 -->
    <div class="jf_lctzback">
        <div class="jf_lctz">
             <div class="jf_intybt clearfix">
                <p class="jf_infh"></p>
                <p class="jf_inbt2">理财投资</p>
                <p class="jf_inms">安全的投资理财产品</p>
                <a href="https://old.weipaidai.com/tenderlist/index.html"><p class="jf_ingd">更多</p></a>
            </div>
            <ul class="jf_lctzul clearfix">
                <div class="jf_lctzleft marr0">
                         <a href="https://old.weipaidai.com/tenderlistyear/index.html">
                            <li class="jf_jxspsecendlione clearfix">
                            <div class="jf_lcfleft">
                                <p class="jf_dd1">微年利Ⅰ</p>
                                <p class="jf_dd2">到期一次性付息返本</p>
                                <p class="jf_dd3">预期利率</p>
                                <p class="jf_dd4">10.5%</p>
                            </div>
                             <div class="jf_lcfright">
                                <p class="jf_lcfbt4">微年利Ⅰ</p>
                                <p class="jf_lcfbt5">锁定期1年</p>
                            </div>
                         </li></a>
                          
                    </div>
                     <div class="jf_lctzleft">
                         <a href="https://old.weipaidai.com/tenderlisttwoyear/index.html">
                            <li class="jf_jxspsecendlione clearfix">
                            <div class="jf_lcfleft">
                                <p class="jf_dd1">微年利Ⅱ</p>
                                <p class="jf_dd2">到期一次性付息返本</p>
                                <p class="jf_dd3">预期利率</p>
                                <p class="jf_dd4">11.5%</p>
                            </div>
                             <div class="jf_lcfright">
                                <p class="jf_lcfbt4">微年利Ⅱ</p>
                                <p class="jf_lcfbt5">锁定期2年</p>
                            </div>
                         </li></a>      
                          
                    </div>
                    <div class="jf_lctzleft">
                         <a href="https://old.weipaidai.com/tenderlistthreeyear/index.html">
                            <li class="jf_jxspsecendlione clearfix">
                            <div class="jf_lcfleft">
                                <p class="jf_dd1">微年利Ⅲ</p>
                                <p class="jf_dd2">到期一次性付息返本</p>
                                <p class="jf_dd3">预期利率</p>
                                <p class="jf_dd4">12.5%</p>
                            </div>
                             <div class="jf_lcfright">
                                 <p class="jf_lcfbt4">微年利Ⅲ</p>
                                <p class="jf_lcfbt5">锁定期3年</p>
                            </div>
                         </li></a>
                          
                    </div>
            </ul>
        </div>
    </div>
</div>
            <div class="jifen_login_left_top3" style="display: none">
            <ul id="div1">
                <foreach name="orders" item="vo">
                    <li>会员&nbsp;

                        <?php
                        echo mb_substr($vo['name'], 0, 1, 'utf-8');
                        ?>
                        **
                      兑换了<{$vo.proname}>
                    </li>

                </foreach>
            </ul>
        </div>  
<script type="text/javascript">
</script>
<script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
<script src="__PUBLIC__/Cn/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/Cn/js/index.js?v=20160918"></script>
<script src="__PUBLIC__/Cn/js/slider.js"></script>
<include file="Public:footer"/>
</body>
</html>
