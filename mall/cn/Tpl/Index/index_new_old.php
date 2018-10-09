<!doctype html>
<html>
<head>
<link href="__PUBLIC__/Cn/css/1.css" rel="stylesheet" type="text/css" />
<include file="Public:top" />
<meta charset="utf-8">
<title>微拍贷</title>
</head>

<body>
<include file="Public:newheader" />
<div class="container">
	<div class="image">
    	<div class="duihuan">
        	<!-- <div class="duihuan-left">
            	<h2>800</h2>
            	<p>微币</p>
            </div>
            <div class="duihuan-right">
            	<p>热销<span>116,1498</span>件</p>
                <a href="?m=Product&a=proinfo&id=16"><button>立即兑换</button></a>
            </div> -->
        </div>
        <div class="jifeng">
            <!-- <a href="">查看微币明细&gt;&gt;</a> -->
        	<p>可用微币：<span>0</span></p>
        </div>
    </div>
</div>
<div class="main1">
	<div class="main1-head"></div>
    <div class="content">
    	<li>
        	<p>微+宝</p>
            <div class="content-1">1</div>
            <img src="__PUBLIC__/Cn/photo/weibao.png"/>
            <p>预期年化率&nbsp;<span>8.8%</span></p>
        </li>
        <li>
        	<p>微+3</p>
            <div class="content-2">2</div>
            <img src="__PUBLIC__/Cn/photo/wei3.png"/>
            <p>预期年化率&nbsp;<span>9.9%</span></p>
        </li>
        <li>
        	<p>微+6</p>
            <div class="content-3">3</div>
            <img src="__PUBLIC__/Cn/photo/wei6.png"/>
            <p>预期年化率&nbsp;<span>11.6%</span></p>
        </li>
        <li>
        	<p>微年利</p>
            <div class="content-4">4</div>
            <img src="__PUBLIC__/Cn/photo/weinian.png"/>
            <p>预期年化率&nbsp;<span>14%</span></p>
        </li>
    </div>
    <div><a href="https://www.weipaidai.com/tenderlist/index.html">了解详情&gt;&gt;</a></div>
</div>
<div class="main2">
	<div class="main2-head">
    	<h1>微拍贷推荐</h1>
        <!-- <span>热销上万件，进来80%以上客户会选择他们！</span> -->
    </div>
    <div class="main2-body">
<!--    	<ul>
        	<li class="main2-body-left">
                <a href=""><button>500微币</button></a>
            	<img src="__PUBLIC__/Cn/photo/aa.png"/>
            </li>
            <li>
                <a href=""><button>500微币</button></a>
            	<img src="__PUBLIC__/Cn/photo/bb.png"/>
            </li>
        </ul>
        <ul>
        	<li class="main2-body-left">
                <a href=""><button>500微币</button></a>
            	<img src="__PUBLIC__/Cn/photo/cc.png"/>
            </li>
            <li>
                <a href=""><button>500微币</button></a>
            	<img src="__PUBLIC__/Cn/photo/dd.png"/>
            </li>
        </ul>-->
<table id="sc_jp">
 <volist name="pro_tj_data" id="vo" key="k">
  <ul <eq name="k" value="1">class="jp_fl"</eq>>
  	<volist name="vo" id="vod">
<!--  	    <li class="main2-body-left">
            	<h2>万众瞩目 王者归来</h2>
                <h4>柔肤多效BB霜（经典款）</h4>
                <a href=""><button>500微币</button></a>
            	<img src="__PUBLIC__/Cn/photo/aa.png"/>
            </li>-->
            <li class="li-item"><a  target="_blank" href="<{:U('Product/proinfo',array('id'=>$vod[id]))}>">
                <h2><{$vod.proname}></h2>
                <h4><{$vod.prointo}></h4>
                <button><{$vod.pro_jifen}>微币</button>
                <img src="__PUBLIC__/Uploads/Product/<{$vod.prophoto}>" />
                </a>
            </li>
   </volist>
  </ul>
  </volist>
  </table>
    </div>
</div>
    <script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
    <script src="__PUBLIC__/Cn/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){ 
    $(".nav-right li").each(function (index) {
        if (index == 0) {
             $(this).addClass("choose");
        }
    });

    jie(
        n = 21,//控制文字的长度
        i = $('.li-item h2'),//控制需要改变的元素
        b = 560//控制最小文档的宽度
    )

    jie(
        n = 66,//控制文字的长度
        i = $('.li-item h4'),//控制需要改变的元素
        b = 1120//控制最小文档的宽度
    )

});

function jie(n,i,b){     
    var  jiek = i

    // var w_whi = $(document).width();
    var w_whi = i.width();
    var maxwidth=n;

    var w=1.8*w_whi;
        
    if(w<b){
        jiek.each(function(){    
            if($(this).text().length>=maxwidth){  
                $(this).text($(this).text().substring(0,maxwidth));   
                $(this).html($(this).html()+'...');   
            }   
        });
    }

}
</script>
</body>
</html>
