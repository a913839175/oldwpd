<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <title><{$logodata.sname}>-<{$data.proname}></title>
    <meta name="keywords" content="<{$logodata.skeyword}>"/>
    <meta name="description" content="<{$logodata.sjianjie}>"/>
    <link rel="stylesheet" href="__PUBLIC__/Cn/css/detail.css?v=20170316">
    <include file="Public:top"/>

</head>
<script>
    document.createElement('aside');
    document.createElement('article');
</script>
<style>#div1{  height: 228px;  overflow: hidden;}</style>
<body>
<include file="Public:newheader"/>
<style type="text/css">
    html,body{background:#fff;height: auto;}
    #footer{position: relative;} 
</style>
<div class="jf_threebox clearfix">
<div class="jifen_detail ">
    <div class="jifen_detail_head">
        <div class="jifen_detail_head_top1">
                <li><a>首页</a></li>
                <li><a href="<{:U('Product/index',array('opage'=>$tpage['id']))}>">&gt;&nbsp;<{$tpage['proclassname']}>&nbsp;</a></li>
                <li><a href="#">&gt;&nbsp;商品详情&nbsp;</a></li>

            
        </div>
    </div>
    <div class="jifen_detail_body">
        <div class="jifen_detail_layer1">
            <div class="jifen_detail_layer1_left">
                <img src="__PUBLIC__/Uploads/Product/<{$data.prophoto}>"/ class="jgbigsmall">

              <!--   <div>礼品编号：0<{$data.id}></div>
                <p>图片仅供参考，实际兑换礼品请以实物或您获取的服务为准。</p> -->
                <li class="jf_smallli"><img src="__PUBLIC__/Uploads/Product/<{$data.prophoto}>" class="jf_smallimg"></li>
<!--                 <li class="jf_smallli"><img src="__PUBLIC__/Uploads/Product/<{$data.prothumb1}>" class="jf_smallimg"></li>
<li class="jf_smallli"><img src="__PUBLIC__/Uploads/Product/<{$data.prothumb2}>" class="jf_smallimg"></li> -->
            </div>

            <div class="jifen_detail_layer1_right">

                <form action="<{:U('Product/address')}>" method="post">
                    <div class="jifen_detail_layer1_right_title">
                        <div class="jifen_shopname"><{$data.proname}></div>
                        <p>
                            <input type="hidden" value="<{$data.id}>" name="proid">
                        </p>
                        <div class="jf_mar58">
                            <strong>选择规格：</strong>
                            <select name="pro_guige" class="pro_type" autocomplete="off" >
                                <option value="默认" selected="selected">默认</option>
                                 <foreach name="types" item="vo">
                                    <notempty name="vo">

                                    <option value="<{$vo}>"><{$vo}></option>
                                    </notempty>
                                </foreach>
                            </select>
                        </div>
                         <div class="jf_mar20 clearfix">
                            <strong class="jf_sznum">选择数量：</strong>
                            <div class="jf_xuanze2 clearfix">
                                <div class="jf_sanjijianhao" id="jianlang">-
                                </div>
                                <input type="text"  autocomplete="off" class="jf_sanjinum" value="1"  disabled="disabled">
                                <input type="hidden" value="" id="pr_num" name="lang">
                                <div class="jf_sanjijiahao" id="jialang">+
                                </div>
                            </div>
                        </div>
                         <div class="jf_mar20 clearfix">
                            <strong class="jf_sznum">选择样式：</strong>
                            <select name="pro_style" class="pro_type" autocomplete="off" >
                                <option value="默认" selected="selected">默认</option>
                                <foreach name="typestyle" item="vo">
                                    <notempty name="vo">
    
                                    <option value="<{$vo}>"><{$vo}></option>
                                    </notempty>
                                </foreach>
                            </select>
                        </div>
                        <div class="jf_mar20 clearfix">
                            <strong class="jf_sznum">库存：</strong>
                            <{$data.pro_store}>
                        </div>
                        <div class="jf_mar20 clearfix">
                            <img src="__PUBLIC__/Cn/images/jfindex/jf_wenhao02.png" class="jf_jfxz">
                            <div  class="jf_dhxzzz"><a href="/?user&q=help/help/help_weishop" style="color: #228fff;" target="_blank">兑换须知</a></div>
                        </div>
                    </div>
                    <div class="jifen_detail_layer1_right_change">
                        <div class="jf_sanjibt clearfix">
                        <p class="jf_firstp">所需微币：</p>
                        <span class="jf_firstspan"><{$data.pro_jifen}></span>
                         <if condition="$_SESSION['k_user']!=''">
                        <p class="jf_wodejf">我的微币：</p>
                        <span class="jf_wodejfnum"><if condition="$_SESSION.k_credit lt 0">0<else /><{$_SESSION.k_credit}></if></span>
                         </if>
                        </div>
                         <input class="buttonhover2" type="submit" value="立即兑换"/>
                    </div>
                </form>
                <input type="hidden" id="jifen" value="<{$data.pro_jifen}>">
                <input type="hidden" id="kucun" value="<{$data.pro_store}>">
            </div>
        </div>
    </div>
    <div class="jifen_detail_layer3 clearfix">
        <div class="jifen_detail_layer3_left">
            <aside>礼品介绍</aside>
            <article>
                <{$data.procontent}>
            </article>
        </div>
    </div>
</div>
</div>
<include file="Public:footer"/>
<script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
<script src="__PUBLIC__/Cn/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/Cn/js/proinfo.js?v=20160913"></script>
</body>
</html>