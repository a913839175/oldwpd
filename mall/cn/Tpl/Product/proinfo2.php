<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <title><{$logodata.sname}>-<{$data.proname}></title>
    <meta name="keywords" content="<{$logodata.skeyword}>"/>
    <meta name="description" content="<{$logodata.sjianjie}>"/>
    <link rel="stylesheet" href="__PUBLIC__/Cn/css/detail2.css?v=20170518">
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
                            <input type="hidden" id="proid" value="<{$data.id}>" name="proid">
                        </p>
                        <div class="clearfix jf_sxwb"> <strong class="jf_sznum jf_sxwbz">所需微币：</strong>
                        <span class="jf_firstspan"><{$data.pro_jifen}></span></div>
                        <div class="jf_xzgnum clearfix">
                        <div class="jf_xxleft clearfix ">
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
                        <div class="jf_szys clearfix">
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
                        </div>
                        <div class="jf_xznummoney clearfix">

                        <div class="jf_xznum clearfix">
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
                        <div class="jf_mewb clearfix">
                         <strong class="jf_wodejf">我的微币：</strong>
                        <span class="jf_wodejfnum"><if condition="$_SESSION.k_credit lt 0">0<else /><{$_SESSION.k_credit}></if></span>
                        <empty name="Think.session.k_user"><else/><p class="jf_wodejfnumdk">(已抵扣)</p></empty>
                        </div>
                        </div>
                        <div class="jf_mar10 clearfix">
                            <strong class="jf_sznum jf_kcl">库存量：</strong>
                            <{$data.pro_store}>
                        </div>
                        
                        <div class="jf_dhmode jf_mar10 clearfix">
                            <div class="jf_exchange clearfix">
                                <strong class="jf_sznum jf_dirchange"  >兑换：</strong>
                                <div class="jf_bluebt">
                                    
                                </div>
                                <input type="hidden" id="jf_zhij" name="jf_zhij">
                            </div>
                            <div class="jf_wgchange clearfix">
                                <strong class="jf_sznum jf_wbchange" >微购：</strong>
                                <div class="jf_bluebt2 ">
                                    
                                </div>
                                <input type="hidden" id="jf_weibd" name="jf_weibd">
                            </div>
                        </div>
                        <div class="graykuang">
                            <div class="graytop clearfix">
                                <div class="jf_tremincome clearfix ">
                                    <strong class="jf_sznum jf_trem">选择期限：</strong>
                                    <select name="qixian" class="pro_type" autocomplete="off" id="pro_qx">
                                        <option value="1" selected="selected">1月期</option>
                                        <option value="3">3月期</option>
                                        <option value="6">6月期</option>
                                        <option value="12">12月期</option>
                                        <option value="24">24月期</option>
                                        <option value="36">36月期</option>
                                    </select>
                                </div>
                                <div class="jf_income clearfix">
                                    <strong class="jf_sznum">预期收益：</strong>
                                    <div class="jf_wgmoney2">
                                        <span class="jf_wgmoney">
                                        </span><span>元</span>
                                    </div>
                                </div>
                            </div>
                            <div class="exchangenotes clearfix">
                                <div class="jf_dhxzg clearfix" style="margin-left: 9px;">
                                    <img src="__PUBLIC__/Cn/images/jfindex/jf_wenhao02.png" class="jf_jfxz">
                                    <div  class="jf_dhxzzz"><a href="/?user&q=help/help/help_weishop" style="color: #228fff;" target="_blank">兑换须知</a></div>
                                </div>
                                <div class="jf_benjin">
                                    <p class="jf_benjintop">本金:<span class="jf_original" id="benjin"></span>元即可提前享受该微品！</p>
                                    <p class="jf_benjinbottom">到期返还本金，还享额外预期收益：<span class="jf_original" id="shouyi"></span>元</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <input class="buttonhover2" type="submit" value="立即兑换"/>
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