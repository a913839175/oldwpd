
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
                <link rel="stylesheet" href="/mall/Public/Cn/css/bannerxq.css?v=20171027"/>
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
                        <div class="banner0728 banner07120205">
                            <div class="banner07102613">
                                 <!-- 登录前 -->
                                 <a href="../?user&q=login" class="banner07102612">请登录查看</a>
                            </div>
                        </div>
                        <div class="banner0728 banner07120201">
                            <div class="banner07120206">
                                <p class="banner07102707">开奖啦！开奖啦！</p>
                                <p class="banner07102708">本次共计发放开奖码 443 个</p>
                                <p class="banner07102709">2017年12月01日</p>
                                <p class="banner07102710">上证指数：3317.62</p>
                                <p class="banner07102710">上证涨幅：0.43</p>
                                <p class="banner07102710">深圳指数：11013.15</p>
                                <p class="banner07102710">深圳涨幅：69.05</p>
                                <div class="banner07102711">
                                    <p class="banner07102712">中奖号码：AI0401</p>
                                    <p class="banner07102713">李女士  137XXXX5881</p>
                                </div>
                            </div>
                        </div>
                        <div class="banner0728 banner07120202"></div>
                        <div class="banner0728 banner07120203"></div>
                        <div class="banner0728 banner07120204"></div>
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