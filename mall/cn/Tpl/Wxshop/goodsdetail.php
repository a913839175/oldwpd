<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Wxshop/css/zebra_dialog.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Wxshop/css/goodsdetail.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Wxshop/css/footer.css">
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/jquery.min.1.9.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/goodsdetail.js"></script>
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/zebra_dialog.js"></script>
<meta name="viewport" content=" height = device-height ,width = device-width ,initial-scale = 1.0 ,minimum-scale = 1.0 ,maximum-scale = 1.0 ,user-scalable = no , " charset="utf-8">
<meta name = "format-detection" content="telephone = no" />
<title>商品详情</title>
</head>

<body id="body">

	<div class="top">
        <div class="top1">
            <a href="index.php?m=wxshop&a=goodslist"><img src="__PUBLIC__/Wxshop/images/jiantou.png"/></a>
        </div>
        <div class="top_title">
            <P>商品详情</P>
        </div>
        <div class="top2">
            <span>微币 </span>
            <span class="myscore"><{$myscore}></span>
        </div>
    </div>

    <div class="main">
    	<div class="first">
	    	<div class="product_img">
	    		<img src="__PUBLIC__/Uploads/Product/<{$product.prophoto}>">
	    	</div>
	    	<div class="word">
	    		<span>图片仅供参考</span>
	    	</div>
    	</div>

        <form id="form" action="" method="post">
    	<div class="second">
    		<div class="titleandnum">
    			<div class="title">
    				<span><{$product.proname}></span>
    			</div>
    			<div class="num">
    				<span>礼品编号0<{$product.id}></span>
    			</div>
    		</div>
    		<div class="score">
    			<div class="scorenum">
    				<span><{$product.pro_jifen}></span>
    			</div>
    			<div class="scorename">
    				<span>微币</span>
    			</div>
    		</div>
    		<div class="aboutaddress">
    			<div class="addressname">
    				<span>配送至</span>
    			</div>
    			<div class="address">
    				<input class="getaddress" id="getaddress" name="address">
    			</div>
    			<div class="ishave">
    				<span>
                    <if condition="$product.pro_store gt 0">有货<else />暂时无货</if>
                    </span>
    			</div>
    		</div>
            <div class="info">
                <div class="str">
                    <p>
                    商品简介：<{$product.prointo}>
                    </p>
                </div>
            </div>
            <input type="hidden" value="<{$product.id}>" name="productid" id="productid">
    	</div>
        </form>

    	<div class="third">
    		<div class="tab">
    			<div class="introtab current">
    				<span>礼品介绍</span>
    			</div>
    			<!-- <div class="paramtab">
    				<span>规格参数</span>
    			</div> -->
    		</div>
    		<div class="centent">
    			<div class="intricontent cur">
                    <{$product.procontent}>
    			</div>
    			<!-- <div class="paramcontent">
                    <{$product.pro_guige}>
    			</div> -->
    		</div>
    	</div>
    </div>

    <if condition="$product.pro_store gt 0">
        <div id="sure" class="sure">
        	<span>立即兑换</span>
        </div>
    </if>

	




<!-- 	<div class="footer">
        <div class="footer_bor">
            <li><img src="__PUBLIC__/Wxshop/images/shouye2.png"/><span>首页</span></li>
            <li><a href="/wxlicai/index.html"><img src="__PUBLIC__/Wxshop/images/licai.png"/>理财</a></li>
            <li><a href="#"><img src="__PUBLIC__/Wxshop/images/jiedai.png"/>借贷</a></li>
            <li><a href="/?wxuser"><img src="__PUBLIC__/Wxshop/images/wo.png"/>我</a></li>
        </div>
    </div> -->

</body>