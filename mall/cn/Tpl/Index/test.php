
/**
 * Created by PhpStorm.
 * User: shiyingyi
 * Date: 2015/12/13
 * Time: 9:35
 */

<style type="text/css">
    a{
    display:block;/*这个属性是必须的*/
    font-size:12px;
 line-height:18px;
 text-decoration:none;
 color:#333;
 font-family:Arial;
}
.shell{
    border:1px solid #aaa;
 width:400px;
 padding:3px 2px 2px 20px;
}
#div1{
 height:58px;
 overflow:hidden;
}
</style>

<div class="shell">
  <ul id="div1">
    <li href="javascript:">请教高手帮我看下这段代码：FLASH显示不了</li>
    <li href="javascript:">请教在UTF-8编辑下的符号显示问题</li>
    <li href="javascript:">jquery做的一个滑动效果，不知如何增加延迟，现在太灵敏了</li>
    <li href="javascript:">技术研究：QQ2009版按钮渐显渐隐的由来</li>
    <li href="javascript:">Javascript读取Json数据并分页显示，支持键盘和滚轮翻页</li>
    <li href="javascript:">腾讯网奇怪的PNG文件，拜师以求解惑</li>
    <li href="javascript:">更新lhgdialog-ver2.0.1弹出窗口组件</li>
  </ul>
</div>
<script language="javascript">
var box=document.getElementById("div1"),can=true;
box.innerHTML+=box.innerHTML;
box.onmouseover=function(){can=false};
box.onmouseout=function(){can=true};
new function (){
    var stop=box.scrollTop%18==0&&!can;
    if(!stop)box.scrollTop==parseInt(box.scrollHeight/2)?box.scrollTop=0:box.scrollTop++;
    setTimeout(arguments.callee,box.scrollTop%18?10:1500);
};
</script>





<div class="jifen_login">
    <div class="jifen_login_left">
        <div class="jifen_onlogin ">
            <div class="jifen_login_left_top1">
                <p>我的微币</p>
                <a href="#">了解微币规则</a>
                <img src="__PUBLIC__/Cn/images/jifen_ban1.png"/>
            </div>
            <div class="jifen_login_left_top2">
                <p>亲爱的会员朋友，您还没登录</p>
                <input type="button" class="jifen_login_left_btn1" value="登录查看微币"/>
                <input type="button" class="jifen_login_left_btn2" value="推广赚微币"/>

                <p>每注册一人将获<span>得20微币</span></p>
            </div>
        </div>
        <div class="jifen_online jifen_action">
            <div class="jifen_login_left_top4">
                <p>您好&nbsp;亲爱的<span>XXX</span>用户 </p>

                <p>手机号<a href="#">18612345678</a></p>
                <img src="__PUBLIC__/Cn/images/jifen_ban1.png"/>
            </div>
            <div class="jifen_login_left_top5">
                <p>您的微币：<span>502109</span></p>
                <button class="jifen_online_button"><span>签到挣微币</span></button>
                <aside>明日签到可领取20微币哦</aside>
                <div>
                    <li>微币规则:</li>
                    <li><a href="#">More&gt;</a></li>
                </div>
            </div>
            <div class="jifen_login_left_top6">
                <li><a href="#">如何才能获得微币？</a></li>
                <li><a href="###">微币的使用规则?</a></li>
            </div>
        </div>
        <div class="jifen_login_left_top3">
            <div>兑换名单</div>
            <ul id="div1">

                <li>会员辣椒面1小时前兑换了拍会员辣椒面1小时前兑换了拍...</li>
                <li>会员zero1小时前兑换了7日理会员辣椒面1小时前兑换了拍...</li>
                <li>会员小黄1小时前兑换了7日理会员辣椒面1小时前兑换了拍...</li>
                <li>会员土和尚2小时前兑换了拍会员辣椒面1小时前兑换了拍...</li>
                <li>会员王小蒙2小时前兑换了智会员辣椒面1小时前兑换了拍...</li>
                <li>会员CG吉小仙2小时前兑换了会员辣椒面1小时前兑换了拍7...</li>

            </ul>
        </div>
    </div>
    <div class="jifen_login_right">
        <a href="index.php?m=product&a=proinfo&id=11">
            <button>点击兑换</button>
        </a>
    </div>
</div>

<p>
    配送至：<input type="text" placeholder="上海市黄浦区西藏中路268号来福士广场50层" /><span>暂时无货</span>
</p>
<div>
    <strong>选择规格：</strong>
    <select>
        <option>红色</option>
    </select>
</div>





<style>
    .jifen_detail_layer1_right_title p:nth-child(3){ padding-top:20px;}
    .jifen_detail_layer1_right_title p input{ width:270px; height:30px; border:1px solid #00a5f7; font-family:"微软雅黑"; font-size:16px;}
    .jifen_detail_layer1_right_title p span{ padding-left:10px;}
</style>





<div class="jifen_new_right">
    <li>
        <a target="_blank" href="<{:U('Product/proinfo',array('id'=>$swxp[1][id]))}>">
            <img src="__PUBLIC__/Uploads/Product/<{$swxp[1][prophoto]}>"
                 style="width: 200px;height: 190px;"/>

            <div>
                <h3><{$swxp[1][proname]}></h3>

                <p><{$swxp[1][prointo]}></p><br/>
                <span><{$swxp[1][pro_jifen]}>微币</span>
            </div>
        </a>
    </li>
    <li>

        <div class="jifen_new_div jifen_new_divleft">
            <a target="_blank" href="<{:U('Product/proinfo',array('id'=>$swxp[2][id]))}>">
                <img src="__PUBLIC__/Uploads/Product/<{$swxp[2][prophoto]}>"
                     style="width: 190px;height: 135px;"/>

                <p><{$swxp[2][proname]}></p>
                <nobr><{$swxp[2][pro_jifen]}>微币</nobr>
            </a>
        </div>


        <div class="jifen_new_div">
            <a target="_blank" href="<{:U('Product/proinfo',array('id'=>$swxp[3][id]))}>">
                <img src="__PUBLIC__/Uploads/Product/<{$swxp[3][prophoto]}>"
                     style="width: 190px;height: 135px;"/>

                <p><{$swxp[3][proname]}></p>
                <nobr><{$swxp[3][pro_jifen]}>微币</nobr>
            </a>
        </div>

    </li>
    <li>
        <div class="jifen_new_div jifen_new_divleft">
            <a target="_blank" href="<{:U('Product/proinfo',array('id'=>$swxp[4][id]))}>">
                <img src="__PUBLIC__/Uploads/Product/<{$swxp[4][prophoto]}>"
                     style="width: 190px;height: 135px;"/>

                <p><{$swxp[4][proname]}></p>
                <nobr><{$swxp[4][pro_jifen]}>微币</nobr>
            </a>
        </div>
        <div class="jifen_new_div">
            <a target="_blank" href="<{:U('Product/proinfo',array('id'=>$swxp[5][id]))}>">
                <img src="__PUBLIC__/Uploads/Product/<{$swxp[5][prophoto]}>"
                     style="width: 190px;height: 135px;"/>

                <p><{$swxp[5][proname]}></p>
                <nobr><{$swxp[5][pro_jifen]}>微币</nobr>
            </a>
        </div>
    </li>
    <li>
        <a target="_blank" href="<{:U('Product/proinfo',array('id'=>$swxp[6][id]))}>">
            <img src="__PUBLIC__/Uploads/Product/<{$swxp[6][prophoto]}>"
                 style="width: 200px;height: 190px;"/>

            <div>
                <h3 id="this_t"><{$swxp[6][proname]}></h3>

                <p><{$swxp[6][prointo]}></p><br/>
                <span><{$swxp[6][pro_jifen]}>微币</span>
            </div>
        </a>
    </li>
</div>

