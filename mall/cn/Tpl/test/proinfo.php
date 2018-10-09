<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8"/>
    <title><{$logodata.sname}></title>
    <meta name="keywords" content="<{$logodata.skeyword}>"/>
    <meta name="description" content="<{$logodata.sjianjie}>"/>
    <link rel="stylesheet" href="__PUBLIC__/Cn/css/detail.css">
    <include file="Public:top"/>
    <style type="text/css">

        #div1 {
            height: 228px;
            overflow: hidden;
        }
    </style>
</head>
<body>
<include file="Public:newheader"/>
<div class="jifen_detail">
    <div class="jifen_detail_head">
        <div class="jifen_detail_head_top1">
            <li>微商城&nbsp;</li>
            <li>&gt;&nbsp;微币兑换&nbsp;</li>
            <li>&gt;&nbsp;商品详情&nbsp;</li>
        </div>
    </div>
    <div class="jifen_detail_body">
        <div class="jifen_detail_layer1">
            <div class="jifen_detail_layer1_left">
                <img src="__PUBLIC__/Uploads/Product/<{$data.prophoto}>"/>

                <div>礼品编号：0<{$data.id}></div>
                <p>图片仅供参考，实际兑换礼品请以实物或您获取的服务为准。</p>
            </div>

            <div class="jifen_detail_layer1_right">

                <form action="<{:U('Product/address')}>" method="post">
                    <div class="jifen_detail_layer1_right_title">
                        <h1><{$data.proname}></h1>

                        <p>商品简介：<{$data.prointo}></p>

                        <p>
                            <input type="hidden" value="<{$data.id}>" name="pid">
<!--                            <strong>配送至：</strong>&nbsp;<input type="text" placeholder="上海市黄浦区西藏中路268号来福士广场50层"-->
<!--                                                              name="address"/> &nbsp;&nbsp;-->
<!--                            <if condition="$data.pro_store gt 0">-->
<!--                                <else/>-->
<!--                                <strong>暂时无货</strong></if>-->
                        </p>
                        <div>
                            <strong>选择规格：</strong>
<!--                            <p id="select_div">-->
                            <select name="pro_type">
                                <foreach name="types" item="vo">
                                    <option value="<{$vo}>"><{$vo}></option>
                                </foreach>
                            </select>
<!--                        </p>-->
                        </div>

                    </div>
                    <div class="jifen_detail_layer1_right_change">
                        <p>所需微币：</p>
                        <span><{$data.pro_jifen}></span>
                                                <input type="submit" value="立即兑换"/>
<!--                        <if condition="$data.pro_store gt 0"><input type="submit" value="立即兑换"/></if>-->
                    </div>
                </form>

                <div class="jifen_detail_layer1_right_talk">
                    <a href="#">
                        <div class="jifen_detail_layer1_right_talkdiv">
                            <img src="__PUBLIC__/Cn/images/detail_talk.png"/>

                            <div>在线客服</div>
                        </div>
                    </a>

                    <p>服务时间：每周一至周五 9:00-17:00</p>
                </div>
            </div>
        </div>
    </div>
    <div class="jifen_detail_layer2">
        <div class="jifen_detail_layer2_top">
            微计划推荐————
        </div>
        <li>
            <div><img src="__PUBLIC__/Cn/images/detail1.png"/></div>
            <p>预期年化收益率</p>

            <h2>8.8<span>%</span></h2>
            <a href="https://old.weipaidai.com/tenderlist/index.html"><input type="button" value="了解详情"/></a>
        </li>
        <li>
            <div><img src="__PUBLIC__/Cn/images/detail2.png"/></div>
            <p>预期年化收益率</p>

            <h2>9.9<span>%</span></h2>
            <a href="https://old.weipaidai.com/tenderlist/index.html"><input type="button" value="了解详情"/></a>
        </li>
        <li>
            <div><img src="__PUBLIC__/Cn/images/detail3.png"/></div>
            <p>预期年化收益率</p>

            <h2>11.6<span>%</span></h2>
            <a href="https://old.weipaidai.com/tenderlist/index.html"><input type="button" value="了解详情"/></a>
        </li>
        <li>
            <div><img src="__PUBLIC__/Cn/images/detail4.png"/></div>
            <p>预期年化收益率</p>

            <h2>14<span>%</span></h2>
            <a href="https://old.weipaidai.com/tenderlist/index.html"><input type="button" value="了解详情"/></a>
        </li>
    </div>
    <div class="jifen_detail_layer3">
        <div class="jifen_detail_layer3_left">
            <aside>礼品介绍</aside>
            <article>
                <{$data.procontent}>
            </article>
        </div>
        <div class="jifen_detail_layer3_right">
            <div>兑换名单</div>
            <article id="div1">
                <foreach name="orders" item="vo">
                    <li><{$vo.name}>
                        <?php
                       echo (int)((time() - $vo['addtime'])/3600)
                        ?>

                        小时前兑换了<{$vo.proname}>
                    </li>

                </foreach>
            </article>
            <div>推荐产品</div>
            <aside>
                <volist name="rxtj" id="vod">
                    <li>
                        <a target="_blank" href="<{:U('Product/proinfo',array('id'=>$vod[id]))}>">
                            <img src="__PUBLIC__/Uploads/Product/<{$vod.prophoto}>"/>

                            <p><{$vod.proname}></p>
                            <span><{$vod.pro_jifen}>微币</span>
                        </a>
                    </li>
                </volist>
            </aside>
        </div>
    </div>
</div>
<script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
<script src="__PUBLIC__/Cn/js/bootstrap.min.js"></script>
<script language="javascript">
    var box = document.getElementById("div1"), can = true;
    box.innerHTML += box.innerHTML;
    box.onmouseover = function () {
        can = false
    };
    box.onmouseout = function () {
        can = true
    };
    new function () {
        var stop = box.scrollTop % 38 == 0 && !can;
        if (!stop)box.scrollTop == parseInt(box.scrollHeight / 2) ? box.scrollTop = 0 : box.scrollTop++;
        setTimeout(arguments.callee, box.scrollTop % 38 ? 10 : 1500);
    };
</script>
</body>
</html>
