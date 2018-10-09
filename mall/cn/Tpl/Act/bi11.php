
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">


<html lang="zh">
    <head>
        <meta charset="utf-8">
            <title>微拍贷</title>
            <link rel="stylesheet" type="text/css" href="/mall/Public/Cn/css/index.css">
                <script src="/static/js/seajs/2.1.0/sea.js?v=dee86"></script>
                <script src="/static/js/config.js?v=20160719"></script>
                <script type="text/javascript" src="/static/js/lib/jquery/1.7.2/jquery-1.7.2.min.js"></script>
                <script type="text/javascript" src="/mall/Public/Cn/js/bannerxq.js"></script>
                <link rel="shortcut icon" href="/logo.png?icoversion=2"/>
                <link rel="stylesheet" href="/static/css/one.css?v=20160823"/>
                <link rel="stylesheet" href="/mall/Public/Cn/css/bannerxq.css?v=20171023"/>
                </head>
                <script>
                    document.createElement('aside');
                </script>
                <body>
                    <style type="text/css">

                        #div1 {
                            height: 161px;
                            overflow: hidden;
                        }
                        #footer{position: relative;}
                        html,body{background: #fff!important;}
                    </style>
                    <div class="ui-header-top ">
                        <div class="container_12 fn-clear">
                            <div class="grid_12 fn-clear">
                                <div class="fn-left">
                                    <span class="ui-nav-app-phone">
                                        <i class="icon icon-app"></i>
                                        <span class="aril">400-8878288</span>
                                    </span>
                                    <span class="hover_sina">
                                        <a href="http://weibo.com/weipaidai" target="_blank"></a>
                                    </span>
                                    <span class="hover_weixin">
                                        <span class="tk" style="display: none;"></span>
                                    </span>                
                                </div>
                                <div class="fn-right">
                                    <a class="ui-nav-item" href="../">返回首页</a>
                                    <empty name="Think.session.k_user">
                                        <a class="ui-nav-item reg-link" href="../?user&amp;q=reg">快速注册</a>
                                        <a class="ui-nav-item login-link" href="../?user&amp;q=login">立即登录</a>
                                        <else/>

                                        <a href="../index.php?user" class="ui-nav-item reg-link">
                                            您好，
                                            <{$Think.session.k_user}></a>
                                        <a  href="../index.php?user&q=logout&type=index" class="ui-nav-item login-link">[退出]</a>
                                    </empty>
                                    <a class="ui-nav-item" href="../newguide/index.html">新手指导</a>
                                    <a class="ui-nav-item" href="../newhelp/index.html" target="_blank">帮助</a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="ui-header" id="header">

                        <div class="ui-header-main">
                            <div class="container_12 fn-clear">
                                <div class="ui-header-logo-grid fn-left">
                                    <a class="ui-header-logo" href="/"></a>
                                </div>
                                <div class="ui-header-grid fn-right fn-dingwei">
                                    <div class="fn-hide no-nav-text"></div>
                                    <ul class="ui-nav clearfix" style="position: relative;">
                                        <img src="/static/img/newshop.png" alt="" class="newshop" / style="width: 30px;height: 16px;display: block;position: absolute;left: 478px;margin-top: 8px;">
                                             <li class="ui-nav-item ui-nav-item-x">
                                                <a class="ui-nav-item-link rrd-dimgray" href="/">
                                                    <span>首页</span>
                                                </a>
                                            </li>
                                            <li class="ui-nav-item ui-nav-item-x">
                                                <a class="ui-nav-item-link rrd-dimgray" href="/invest/index.html">
                                                    <span>我要理财</span>
                                                </a>
                                                <ul class="ui-nav-dropdown ui-nav-dropdown-invest" style="display: none;">
                                                    <li class="ui-nav-dropdown-angle"><span></span></li>

                                                    <li class="ui-nav-dropdown-item">
                                                        <a class="rrd-dimgray" href="/tenderlistyear/index.html">微计划</a>
                                                    </li>
                                                    <li class="ui-nav-dropdown-item">
                                                        <a class="rrd-dimgray" href="/investlist/index.html">散标投资</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li class="ui-nav-item ui-nav-item-x">
                                                <a class="ui-nav-item-link rrd-dimgray" href="/borrow/index.html">
                                                    <span>我要借款</span>
                                                </a>
                                            </li>
                                            <li class="ui-nav-item ui-nav-item-x ">
                                                <a class="ui-nav-item-link rrd-dimgray" href="/index.php?user">
                                                    <span>我的账户</span>
                                                </a>
                                            </li>
                                            <li class="ui-nav-item ui-nav-item-x">
                                                <a class="ui-nav-item-link rrd-dimgray" href="/index.php?user&q=shangchengindex">
                                                    <span>微商城</span>
                                                </a>
                                                <ul class="ui-nav-dropdown ui-nav-dropdown-invest" style="display: none;">
                                                    <li class="ui-nav-dropdown-angle"><span></span></li>
                                                    <li class="ui-nav-dropdown-item">
                                                        <a class="rrd-dimgray" href="/index.php?user&q=shangchengindex">商城首页</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="ui-nav-item ui-nav-item-x">
                                                <a class="ui-nav-item-link rrd-dimgray" href="/intro/index.html">
                                                    <span>关于我们</span>
                                                </a>
                                            </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jifen_index" style="">
                        <div class="banner0727 banner101801"></div>
                        <div class="banner0727 banner101802">
                            <div class="content101801">
                                <p class="content101802"><empty name="Think.session.k_user"><else/>您已成功邀请<if condition="$integral.total_integral neq NULL"><{$integral.total_integral}><else />0</if>位好友实名绑卡，您拥得微宝<if condition="$integral.rest_integral neq NULL"><{$integral.rest_integral}><else />0</if>枚</empty></p>
                                <empty name="Think.session.k_user">
                                    <a class="content101803" href="/?user&q=login">请登录兑换</a>
                                    <else/>
                                    <button class="content101803-1" id="J-btn1">兑换</button>
                                </empty>
                            </div>
                        </div>
                        <div class="banner0727 banner101803">
                            <p class="content101804"><empty name="Think.session.k_user"><else/>您的好友已累计投资折标满<if condition="$coin.touzi neq NULL"><{$coin.touzi}><else />0</if>元，您拥得拍币<if condition="$coin.rest_coin neq NULL"><{$coin.rest_coin}><else />0</if> 枚</empty></p>
                            <empty name="Think.session.k_user">
                                <a class="content101805" href="/?user&q=login">请登录兑换</a>
                                <else/>
                                <button class="content101805-1" id="J-btn2">兑换</button>
                            </empty>

                        </div>
                        <div class="banner101804">
                            <div class="content101806">
                                <div class="content101807"></div>
                                <div class="content101809">
                                    <div class="content101810">
                                        <table id='table'>
                                            <thead>
                                                <tr><th>消耗</th><th>兑换</th><th>兑换时间</th></tr> 
                                            </thead>
                                            <tbody>
                                                <volist name="recordg" id="vo">
                                                    <tr><td><{$vo.recordg}><if condition="$vo['recordgtype']==0">微宝<else />拍币</if></td><td><{$vo.remark}></td><td><{$vo.addtime|date="Y-m-d",###}></td></tr>
                                                </volist>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="content101808"></div>
                            </div>
                        </div>
                        <div class="banner0727 banner111111">
                        </div>
                        <div class="banner0727 banner111112">
                        </div>
                    </div>
                    <!-- 弹窗 -->
                    <div class="mask" id="J-alert-wb">
                        <div class="pop-wb">
                            <h3 class="pop-title">产品兑换<span class="pop-close J-close"></span></h3>
                            <div class="pop-main">
                                <p class="pop-desc">您拥有<em id="weibao"><if condition="$integral.rest_integral neq NULL"><{$integral.rest_integral}><else />0</if></em>枚微宝</p>
                                <div class="pop-main-box">
                                    <ul class="pop-items">
                                        <li class="pop-list">
                                            <img class="list-pic" src="/mall/Public/Cn/images/bannerxq/hongbao620171018.png">
                                                <div class="list-mid">
                                                    <button class="jian" id="jianone" onclick="jian(1,6,'jianone');" type="button">-</button>
                                                    <input class="nums" id="nums1" type="text" value="0" readonly="readonly" >
                                                        <button class="jia" id="jiaone" onclick="jia(1,6,'jiaone');" type="button" >+</button>
                                                </div>
                                                <p class="list-right"><em class="wbNum" id="wbNum1" data-num="3">0</em>枚微宝</p>
                                        </li>
                                        <li class="pop-list">
                                            <img class="list-pic" src="/mall/Public/Cn/images/bannerxq/hongbao1220171018.png">
                                                <div class="list-mid">
                                                    <button class="jian" id="jian2" onclick="jian(2,12,'jian2');" type="button">-</button>
                                                    <input class="nums" id="nums2" type="text" value="0" readonly="readonly" >
                                                        <button class="jia" id="jia2" onclick="jia(2,12,'jia2');" type="button" >+</button>
                                                </div>
                                                <p class="list-right"><em class="wbNum" id="wbNum2" data-num="5">0</em>枚微宝</p>
                                        </li>
                                        <li class="pop-list">
                                            <img class="list-pic" src="/mall/Public/Cn/images/bannerxq/hongbao2820171018.png">
                                                <div class="list-mid">
                                                    <button class="jian" id="jian3" onclick="jian(3,28,'jian3');" type="button">-</button>
                                                    <input class="nums" id="nums3" type="text" value="0" readonly="readonly" >
                                                        <button class="jia" id="jia3" onclick="jia(3,28,'jia3');" type="button" >+</button>
                                                </div>
                                                <p class="list-right"><em class="wbNum" id="wbNum3" data-num="10">0</em>枚微宝</p>
                                        </li>
                                    </ul>
                                </div>
                                <p class="pop-total" >预计消耗<em id="weibaotijiao1">0</em>枚微宝<span>总计获得现金红包：<em id="weibaotijiao2">0</em><sub>元</sub></span></p>
                                <button type="button" id="submit1" class="surBtn">确认兑换</button>
                            </div>
                        </div>
                        <div class="pop-wb1">
                            <h3 class="pop-title">产品兑换<span class="pop-close J-close"></span></h3>
                            <div class="pop-main">
                                <p class="pop-desc">您拥有<em id="paibi"><if condition="$coin.rest_coin neq NULL"><{$coin.rest_coin}><else />0</if></em>枚拍币</p>
                                <div class="pop-main-box">
                                    <ul class="pop-items">
                                        <li class="pop-list list1">
                                            <p class="list-left">
                                                <img class="list-pic pic1" src="/mall/Public/Cn/images/bannerxq/pic120171018.png">
                                            </p>
                                            <div class="list-mid">
                                                <button class="jian" id="jian4" onclick="jian3(4,10,'jian4');" type="button">-</button>
                                                <input class="nums" id="nums4" type="text" value="0" readonly="readonly" >
                                                    <button class="jia" id="jia4" onclick="jia3(4,10,'jia4');" type="button" >+</button>
                                            </div>
                                            <p class="list-right"><em class="wbNum" id="wbNum4" data-num="400">0</em>枚拍币</p>
                                        </li>
                                        <li class="pop-list">
                                            <p class="list-left">
                                                <img class="list-pic pic2" src="/mall/Public/Cn/images/bannerxq/pic220171018.png">
                                            </p>
                                            <div class="list-mid">
                                                <button class="jian" id="jian5" onclick="jian2(5,110,'jian5');" type="button">-</button>
                                                <input class="nums" id="nums5" type="text" value="0" readonly="readonly" >
                                                    <button class="jia" id="jia5" onclick="jia2(5,110,'jia5');" type="button" >+</button>
                                            </div>
                                            <p class="list-right"><em class="wbNum" id="wbNum5" data-num="10">0</em>枚拍币</p>
                                        </li>
                                        <li class="pop-list">
                                            <p class="list-left">
                                                <img class="list-pic pic3" src="/mall/Public/Cn/images/bannerxq/pic320171018.png">
                                            </p>
                                            <div class="list-mid">
                                                <button class="jian" id="jian6" onclick="jian2(6,10,'jian6');" type="button">-</button>
                                                <input class="nums" id="nums6" type="text" value="0" readonly="readonly" >
                                                    <button class="jia" id="jia6" onclick="jia2(6,10,'jia6');" type="button" >+</button>
                                            </div>
                                            <p class="list-right"><em class="wbNum" id="wbNum6" data-num="1">0</em>枚拍币</p>
                                        </li>
                                    </ul>
                                </div>
                                <p class="pop-total">预计消耗<em id="weibaotijiao3">0</em>枚拍币<span>总计获得：<sub>iPhone x（64GB）手机<em id="weibaotiji4">0</em>台+<em id="weibaotijiao5">0</em>元现金红包</sub></span></p>
                                <button type="button" id="submit2" class="surBtn">确认兑换</button>
                            </div>
                        </div>
                        <div class="pop-wb2">
                            <div class="pop-close01 J-close"></div>
                            <p class="pop-ms01">恭喜您，成功获得现金红包<span>120</span>元</p>
                            <div class="pop-ms02"></div>
                        </div>
                        <div class="pop-wb3">
                            <div class="pop-close01 J-close"></div>
                            <p class="pop-ms01">恭喜您，成功获得现金红包<span>120</span>元</p >
                            <input type="hidden" id="url" value="">
                            <div class="pop-ms022"></div>
                        </div>
                    </div>
                    <script type="text/javascript">
                      
                      $("#submit1").click(function(){
                          var wbnums=parseInt($("#weibaotijiao1").text());
                          var hbnums=parseInt($("#weibaotijiao2").text());
                          var weibao=parseInt($("#weibao").text());
                          var nums1=$("#nums1").val(),nums2=$("#nums2").val(),nums3=$("#nums3").val();
                          if(wbnums>=1){
                              if((weibao-wbnums)>0){
                                  $.ajax({
                                    url: './mall/index.php?m=act&a=bi11to' ,  
                                    type: 'POST',  
                                    scriptCharset: 'utf-8',
                                    data: {
                                        "hongbao1":nums1,
                                        "hongbao2":nums2,
                                        "hongbao3":nums3
                                    }, 
                                    success: function (data) {
                                        if(data.msg==1){
                                            $('.pop-ms01').text("恭喜您，成功获得现金红包"+data.total+"元");
                                            $('.pop-wb').hide();
                                            $('.pop-wb1').hide();
                                            $('.pop-wb2').show();
                                            $('.pop-wb3').hide();
                                        }else{
                                            if(data.content){
                                                $('.pop-ms01').text(data.content);
                                            }else{
                                                $('.pop-ms01').text("请重新输入");
                                            }
                                            $('.pop-wb').hide();
                                            $('.pop-wb1').hide();
                                            $('.pop-wb2').hide();
                                            $('.pop-wb3').show();
                                        }
                                        
                                    },
                                    error: function() {
                                        alert('未提供参数')
                                    }
                                });
                              }else{
                                    $('.pop-ms01').text("您的微宝不够，请继续努力");
                                    $('.pop-wb').hide();
                                    $('.pop-wb1').hide();
                                    $('.pop-wb2').hide();
                                    $('.pop-wb3').show();
                              }
                          }else{
                              $('.pop-ms01').text("您未填写红包数量");
                              $('.pop-wb').hide();
                              $('.pop-wb1').hide();
                              $('.pop-wb2').hide();
                              $('.pop-wb3').show();
                          }
                      });
                      $("#submit2").click(function(){
                          var wbnums=parseInt($("#weibaotijiao3").text());
                          var hbnums=parseInt($("#weibaotijiao5").text());
                          var paibi=parseInt($("#paibi").text());
                          var iphonex=parseInt($("#weibaotiji4").text());
                          var nums4=$("#nums4").val(),nums5=$("#nums5").val(),nums6=$("#nums6").val();
                          if(nums4>=1 || nums5>=1 || nums6>=1){
                              if((paibi-wbnums)>0){
                                  $.ajax({
                                    url: './mall/index.php?m=act&a=bi11too' ,  
                                    type: 'POST',  
                                    scriptCharset: 'utf-8',
                                    data: {
                                        "hongbao4":nums4,
                                        "hongbao5":nums5,
                                        "hongbao6":nums6
                                    }, 
                                    success: function (data) {
                                        if(data.msg==1){
                                            if(data.iphonex!=0 && data.total!=0){
                                                $('.pop-ms01').text("恭喜您，成功获得iPhonex(64GB)*"+data.iphonex+" + 现金红包"+data.total+"元");
                                                
                                            }else if(data.iphonex!=0 && data.total==0){
                                                $('.pop-ms01').text("恭喜您，成功获得iPhonex(64GB)*"+data.iphonex);
                                            }else{
                                                $('.pop-ms01').text("恭喜您，成功获得现金红包"+data.total+"元");
                                            }                                            
                                            $('.pop-wb').hide();
                                            $('.pop-wb1').hide();
                                            $('.pop-wb2').show();
                                            $('.pop-wb3').hide();
                                        }else{
                                            if(data.content){
                                                $('.pop-ms01').text(data.content);
                                            }else{
                                                $('.pop-ms01').text("请重新输入");
                                            }
                                            $('.pop-wb').hide();
                                            $('.pop-wb1').hide();
                                            $('.pop-wb2').hide();
                                            $('.pop-wb3').show();
                                            if(data.url){
//                                                setTimeout(function(){
//                                                    window.location.href=data.url;
//                                                },3000);
                                                $("#url").val(data.url);
                                            }
                                        }
                                        
                                    },
                                    error: function() {
                                        $('.pop-ms01').text("请重新输入");
                                        $('.pop-wb').hide();
                                        $('.pop-wb1').hide();
                                        $('.pop-wb2').hide();
                                        $('.pop-wb3').show();
                                    }
                                });
                              }else{
                                    $('.pop-ms01').text("您的拍币不够，请继续努力");
                                    $('.pop-wb').hide();
                                    $('.pop-wb1').hide();
                                    $('.pop-wb2').hide();
                                    $('.pop-wb3').show();
                              }
                          }else{
                              $('.pop-ms01').text("您未填写红包数量");
                              $('.pop-wb').hide();
                              $('.pop-wb1').hide();
                              $('.pop-wb2').hide();
                              $('.pop-wb3').show();
                          }
                      });
                      
                      //计算红包
                        function jia(n,q,c){
                            var $nums = $("#"+c+"").siblings("#nums"+n+"");
                            var $wbnum = $("#"+c+"").parents(".pop-list").find("#wbNum"+n+"");
                            var wbnum = parseInt($wbnum.attr("data-num"));
                            var wblanum = $("#weibaotijiao1"),wblanums=parseInt(wblanum.text());
                            var wblanum2 = $("#weibaotijiao2"),wblanums2=parseInt(wblanum2.text());
                            var nums = parseInt($nums.val());
                            if(nums >= 0){
                                var wbnums = (nums+1)*wbnum;
                                $nums.val(nums+1);
                                $wbnum.text(wbnums);
                                wblanum.text(wblanums+wbnum);
                                wblanum2.text(wblanums2+q);
                            }
                        }
                        function jian(n,q,c){
                            var $nums = $("#"+c+"").siblings("#nums"+n+"");
                            var $wbnum = $("#"+c+"").parents(".pop-list").find("#wbNum"+n+"");
                            var wbnum = parseInt($wbnum.attr("data-num"));
                            
                            var wblanum = $("#weibaotijiao1"),wblanums=parseInt(wblanum.text());
                            var wblanum2 = $("#weibaotijiao2"),wblanums2=parseInt(wblanum2.text());
                            var nums = parseInt($nums.val());
                            if(nums >= 1){
                                var wbnums = (nums-1)*wbnum;
                                $nums.val(nums-1);
                                $wbnum.text(wbnums);
                                wblanum.text(wblanums-wbnum);
                                wblanum2.text(wblanums2-q);
                            }
                        }
                        function jia2(n,q,c){
                            var $nums = $("#"+c+"").siblings("#nums"+n+"");
                            var $wbnum = $("#"+c+"").parents(".pop-list").find("#wbNum"+n+"");
                            var wbnum = parseInt($wbnum.attr("data-num"));
                            var wblanum = $("#weibaotijiao3"),wblanums=parseInt(wblanum.text());
                            var wblanum2 = $("#weibaotijiao5"),wblanums2=parseInt(wblanum2.text());
                            var nums = parseInt($nums.val());
                            if(nums >= 0){
                                var wbnums = (nums+1)*wbnum;
                                $nums.val(nums+1);
                                $wbnum.text(wbnums);
                                wblanum.text(wblanums+wbnum);
                                wblanum2.text(wblanums2+q);
                            }
                        }
                        function jian2(n,q,c){
                            var $nums = $("#"+c+"").siblings("#nums"+n+"");
                            var $wbnum = $("#"+c+"").parents(".pop-list").find("#wbNum"+n+"");
                            var wbnum = parseInt($wbnum.attr("data-num"));
                            
                            var wblanum = $("#weibaotijiao3"),wblanums=parseInt(wblanum.text());
                            var wblanum2 = $("#weibaotijiao5"),wblanums2=parseInt(wblanum2.text());
                            var nums = parseInt($nums.val());
                            if(nums >= 1){
                                var wbnums = (nums-1)*wbnum;
                                $nums.val(nums-1);
                                $wbnum.text(wbnums);
                                wblanum.text(wblanums-wbnum);
                                wblanum2.text(wblanums2-q);
                            }
                        }
                        function jia3(n,q,c){
                            var $nums = $("#"+c+"").siblings("#nums"+n+"");
                            var $wbnum = $("#"+c+"").parents(".pop-list").find("#wbNum"+n+"");
                            var wbnum = parseInt($wbnum.attr("data-num"));
                            var wblanum = $("#weibaotijiao3"),wblanums=parseInt(wblanum.text());
                            var wblanum2 = $("#weibaotiji4"),wblanums2=parseInt(wblanum2.text());
                            var nums = parseInt($nums.val());
                            if(nums >= 0){
                                var wbnums = (nums+1)*wbnum;
                                $nums.val(nums+1);
                                $wbnum.text(wbnums);
                                wblanum.text(wblanums+wbnum);
                                wblanum2.text(wblanums2+1);
                            }
                        }
                        function jian3(n,q,c){
                            var $nums = $("#"+c+"").siblings("#nums"+n+"");
                            var $wbnum = $("#"+c+"").parents(".pop-list").find("#wbNum"+n+"");
                            var wbnum = parseInt($wbnum.attr("data-num"));
                            
                            var wblanum = $("#weibaotijiao3"),wblanums=parseInt(wblanum.text());
                            var wblanum2 = $("#weibaotiji4"),wblanums2=parseInt(wblanum2.text());
                            var nums = parseInt($nums.val());
                            if(nums >= 1){
                                var wbnums = (nums-1)*wbnum;
                                $nums.val(nums-1);
                                $wbnum.text(wbnums);
                                wblanum.text(wblanums-wbnum);
                                wblanum2.text(wblanums2-1);
                            }
                        }
                        
                      //计算红包结束  
                        
                        $("input").addClass("buttonhover");
                        $("button").addClass("buttonhover");

                        //召集令兑换1
                        $('#J-btn1').on('click',function(){
                            $("#nums1").val("0");$("#nums2").val("0");$("#nums3").val("0");$("#weibaotijiao1").text("0");$("#weibaotijiao2").text("0");
                            $("#wbNum1").text("0");$("#wbNum2").text("0");$("#wbNum3").text("0");
                            $('#J-alert-wb').show();
                            $('.pop-wb').show();
                            $('.pop-wb1').hide();
                            $('.pop-wb2').hide();
                            $('.pop-wb3').hide();
                        });
                        //召集令兑换2
                        $('#J-btn2').on('click',function(){
                            $("#nums4").val("0");$("#nums5").val("0");$("#nums6").val("0");$("#weibaotijiao3").text("0");$("#weibaotiji4").text("0");$("#weibaotijiao5").text("0");
                            $("#wbNum4").text("0");$("#wbNum5").text("0");$("#wbNum6").text("0");
                            $('#J-alert-wb').show();
                            $('.pop-wb').hide();
                            $('.pop-wb1').show();
                            $('.pop-wb2').hide();
                            $('.pop-wb3').hide();
                        });
                        //关闭弹窗
                        $('.J-close').on('click',function(){
                            $('.mask').hide();
                        });

                       
//                        $('.surBtn').on('click',function(){
//                            $('.pop-wb').hide();
//                            $('.pop-wb1').hide();
//                            $('.pop-wb2').show();
//                        })
                        $('.pop-ms02').on('click',function(){
                            $('.mask').hide();
                            $('.pop-wb').show();
                            $('.pop-wb1').hide();
                            $('.pop-wb2').hide();
                            $('.pop-wb3').hide();
                            location.reload();
                        })
                        $('.pop-ms022').on('click',function(){
                            $('.mask').hide();
                            $('.pop-wb').show();
                            $('.pop-wb1').hide();
                            $('.pop-wb2').hide();
                            $('.pop-wb3').hide();
                            var url=$("#url").val();
                            if(url!=""){
                                window.location.href=url;
                                $("#url").val("");
                            }else{
                                location.reload();
                            }
                        })
                    </script>
                    <script src="/mall/Public/Cn/js/jquery.min.1.9.1.js"></script>
                    <script src="/mall/Public/Cn/js/bootstrap.min.js"></script>
                    <!-- <script src="/mall/Public/Cn/js/index.js"></script> -->
                    <include file="Public:footer"/>
                </body>
                </html>