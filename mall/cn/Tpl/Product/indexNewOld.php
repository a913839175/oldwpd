<!doctype html>
<html>
<head>
<include file="Public:head" />
<link href="__PUBLIC__/Cn/css/2.css" rel="stylesheet" type="text/css" />
<include file="Public:top" />

</head>

<body>
<include file="Public:newheader" />
<div class="nav-tab">
	<div class="container">
    	<ul>
        	<li><a href="<{:U('Product/index')}>">全部分类</a>|</li>
        	<li <if condition="$Think.get.sort eq 'hits'">class="scpx_esp"</if>><a href="<{:U('Product/index',array('sort'=>'hits'))}>">兑换排行</a>|</li>
             <li class="dropdown">
             	<button class=" xiala" type="button" id="dropdownMenu1" data-toggle="dropdown">
                	全部分值
                	<span class="caret"></span>
                </button>|
              	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<{:U('Product/search')}>">全部分值</a></li>
                    <li><a href="<{:U('Product/search',array('min'=>0,'max'=>1000))}>">0-1000</a></li>
                    <li><a href="<{:U('Product/search',array('min'=>1000,'max'=>2000))}>">1000-2000</a></li>
                    <li><a href="<{:U('Product/search',array('min'=>2000,'max'=>3000))}>">2000-3000</a></li>
                    <li><a href="<{:U('Product/search',array('min'=>3000,'max'=>5000))}>">3000-5000</a></li>
                    <li><a href="<{:U('Product/search',array('min'=>5000,'max'=>10000))}>">5000-10000</a></li>
                    <li><a href="<{:U('Product/search',array('min'=>10000,'max'=>20000))}>">10000-20000</a></li>
                    <li><a href="<{:U('Product/search',array('min'=>20000))}>">20000及以上</a></li>
              	</ul>
            </li> 
        	<!--<li><a href="">最新</a>|</li>-->
                <li <if condition="$Think.get.sort eq 'addtime'">class="scpx_esp"</if> ><a href="<{:U('Product/index',array('sort'=>'addtime'))}>">最新</a>|</li>
        	<li <if condition="$Think.get.sort eq 'pro_jifen'">class="scpx_esp"</if>><a href="<{:U('Product/index',array('sort'=>'pro_jifen'))}>">微币值</a>|</li>
        	<li><a href="<{:U('Wproduct/index',array('sort'=>'pro_weibi'))}>">微币值</a>|</li>
        	<li><a href="">用户评分</a>|</li>
        	<li><a href=""><span><input type="checkbox" /></span>奖品优惠</a></li>
        </ul>
    </div>
</div>
<div class="main">
	<div class="container jiangpin">
    	<ul>
            <foreach name="pro_data" item="vo">
                <li>
                    <a  target="_blank" href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>"><img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>"/></a>
                    <h5><a target="_blank" href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>"><{$vo.proname}></a></h5>
                
                    
                    <p>微币：<span><{$vo.pro_jifen}></span></p>
                </li>
<!--            <li><img src="__PUBLIC__/Cn/photo/dq2.png"/>
            	<h5>DQ 水晶美果冻</h5>
                <p>微币：<span>2500</span></p>
            </li>
            <li><img src="__PUBLIC__/Cn/photo/dq3.png"/>
            	<h5>DQ 华夫控</h5>
                <p>微币：<span>2500</span></p>
            </li>
            <li><img src="__PUBLIC__/Cn/photo/dq4.png"/>
            	<h5>DQ 标准杯暴风雪</h5>
                <p>微币：<span>2500</span></p>
            </li>-->
            </foreach>
        </ul>
<!--        <ul>
        	<li><img src="__PUBLIC__/Cn/photo/dq3.png"/>
            	<h5>DQ 华夫控</h5>
                <p>微币：<span>2500</span></p>
            </li>
            <li><img src="__PUBLIC__/Cn/photo/dq4.png"/>
            	<h5>DQ 标准杯暴风雪</h5>
                <p>微币：<span>2500</span></p>
            </li>
        </ul>-->
    </div>
</div>
    <script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
    <script src="__PUBLIC__/Cn/js/bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript"> 
$(document).ready(function(){ 
$(".nav-right li").each(function (index) {
                if (index == 2) {
                     $(this).addClass("choose");
                }
            });
            });
</script>
</body>
</html>
