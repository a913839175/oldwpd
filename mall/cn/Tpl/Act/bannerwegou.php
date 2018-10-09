<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html lang="zh">
    <head>
        <meta charset="utf-8">
            <title>微拍贷</title>
            <link rel="stylesheet" type="text/css" href="/mall/Public/Cn/css/index.css?v=20170407">
                <script src="/static/js/seajs/2.1.0/sea.js?v=dee86"></script>
                <script src="/static/js/config.js?v=20160719"></script>
                <script type="text/javascript" src="/static/js/lib/jquery/1.7.2/jquery-1.7.2.min.js"></script>
                <link rel="shortcut icon" href="/logo.png?icoversion=2"/>
                <link rel="stylesheet" href="/static/css/one.css?v=20160823"/>

                </head>
                <script>
                    document.createElement('aside');
                </script>
                <body>
                    <!--重要！div1的样式不能随意改动 和兑换名单的滚动有关-->
                    <style type="text/css">

                        #div1 {
                            height: 161px;
                            overflow: hidden;
                        }
                        #footer{position: relative;}
                        html,body{background: #fff!important;}
                    </style>
                    <style>

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
                                        <!-- <li class="ui-nav-item ui-nav-item-x">
                                          <a class="ui-nav-item-link rrd-dimgray" href="/debt/index.html">
                                            <span>债权转让</span>
                                          </a>
                                        </li> -->
                                        <!-- <li class="ui-nav-item ui-nav-item-x">
                                            <a class="ui-nav-item-link rrd-dimgray" href="/fengkong/index.html">f
                                                <span>风险控制</span>
                                            </a>
                                        </li> -->
                                        <!-- <li class="ui-nav-item ui-nav-item-x">
                                            <a class="ui-nav-item-link rrd-dimgray" href="/bonus/index.html">
                                                <span>红包区</span>
                                            </a>
                                        </li> -->
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
                                                <!--<li class="ui-nav-dropdown-item">
                                                    <a class="rrd-dimgray" href="/index.php?user&q=jifenduihuan">微币兑换</a>
                                                </li>-->
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
                    <div class="jifen_index" style="width: 100%;display: block;overflow: hidden;">

                        <div style="background: url(/mall/Public/Cn/images/bannerxq/banner042601.png) no-repeat;clear: both;margin: 0 auto;padding: 0;left: 50%;margin-left: -960px;position: relative;height: 751px;width: 1920px;"></div>
                        <div style="background: url(/mall/Public/Cn/images/bannerxq/banner042602.png) no-repeat;clear: both;margin: 0 auto;padding: 0;left: 50%;margin-left: -960px;position: relative;height: 751px;width: 1920px;"></div>
                        <div style="background: url(/mall/Public/Cn/images/bannerxq/banner042603.png) no-repeat;clear: both;margin: 0 auto;padding: 0;left: 50%;margin-left: -960px;position: relative;height: 752px;width: 1920px;"></div>
                        <div style="background: url(/mall/Public/Cn/images/bannerxq/banner042604.png) no-repeat;clear: both;margin: 0 auto;padding: 0;left: 50%;margin-left: -960px;position: relative;height: 751px;width: 1920px;"></div>
                        <div style="background: url(/mall/Public/Cn/images/bannerxq/banner042605.png) no-repeat;clear: both;margin: 0 auto;padding: 0;left: 50%;margin-left: -960px;position: relative;height: 751px;width: 1920px;">
                            <div class="wegou" style="width:1000px;margin: 0 auto">
                                    <a href="/mall/index.php" style="width: 414px;height: 85px;display: block;position: relative;top: 501px;left: 291px;"></a>
                            </div>
                        </div> 
                    </div>
                    <script type="text/javascript">
                        $("input").addClass("buttonhover");
                        $("button").addClass("buttonhover");
                    </script>
                    <script src="/mall/Public/Cn/js/jquery.min.1.9.1.js"></script>
                    <script src="/mall/Public/Cn/js/bootstrap.min.js"></script>
                    <script src="/mall/Public/Cn/js/index.js"></script>
                    <include file="Public:footer"/>
                </body>
                </html>