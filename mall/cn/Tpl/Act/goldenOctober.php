
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
                <link rel="stylesheet" href="/mall/Public/Cn/css/bannerxq.css?v=20170928"/>
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
                    <div class="jifen_index">
                        <div class="banner0727 banner092601"></div>
                        <div class="banner0727 banner092602"></div>
                        <div class="banner0727 banner092603">
                            <empty name="Think.session.k_user">
                                    <a href="/?user&q=login"><div class="banner09260310"></div></a>
                                    <else />
                            <!-- 16号活动之前 -->
                            <div class="banner09260301">
                                <p class="banner09260301p1">2017年10月1日-10月15日：您本次共有<{$num}>个开奖码</p>
                                <p class="banner09260301p2"><if condition="$num!=0"><{$info}>
                                                <else />
                                                很遗憾，您暂时未有中奖号码
                                            </if></p>
                            </div>
                            
                            <egt  name="nowtimes" value="1508083200">
                             <!-- 16号活动之后 -->
                            <div class="banner09260301 mat20">
                                <p class="banner09260301p1">2017年10月16日-10月31日：您本次共有<{$num1}>个开奖码</p>
                                <p class="banner09260301p2"><if condition="$num1!=0"><{$info1}>
                                    <else />
                                    很遗憾，您暂时未有中奖号码
                                </if></p>
                            </div>
                            </egt>
                        </empty>
                        </div>
                        <div class="banner0727 banner092604"></div>
                        <div class="banner0727 banner092605"></div>
                        <div class="banner0727 banner092606"></div>
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