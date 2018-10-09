<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Wxshop/css/goodslist.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Wxshop/css/footer.css">
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/jquery.min.1.9.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/goodslist.js"></script>
<script type="text/javascript" src="__PUBLIC__/Wxshop/js/jquery.infinitescroll.js"></script>
<meta name="viewport" content=" height = device-height ,width = device-width ,initial-scale = 1.0 ,minimum-scale = 1.0 ,maximum-scale = 1.0 ,user-scalable = no , " charset="utf-8">
<meta name = "format-detection" content="telephone = no" />
<title>商品列表</title>
</head>

<body id="body">

	<div class="top">
        <div class="top1" style="visibility:hidden; ">
            <a href="javascript:history.go(-1);"><img src="__PUBLIC__/Wxshop/images/jiantou.png"/></a>
        </div>
        <div class="top_title">
            <P>商品列表</P>
        </div>
        <div class="top2">
        	<span>微币 </span>
        	<span class="myscore"><{$myscore}></span>
        </div>
    </div>

	<div class="content">
		<div class="list">
		<volist name="productlist" id="vo">
			<div class="showgoods">
				<div class="goods">
					<a href="index.php?m=wxshop&a=goodsdetail&productid=<{$vo.id}>">
					<div class="goods_img">
						<img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>">
					</div>
					</a>
					<div class="goods_title">
						<span><{$vo.proname}></span>
					</div>
					<div class="goods_score">
						<div class="score_num">
							<span><{$vo.pro_jifen}></span>
						</div>
						<div class="score_word">
							<span>微币</span>
						</div>
					</div>
				</div>
			</div>
			</volist>
		</div>
		<a class="see-more" href="<{:U('Wxshop/searchgoods', array('page'=>2))}>" style="display:none"></a>
	</div>
	<div class="up">
		<a href="#body"><img src="__PUBLIC__/Wxshop/images/up.png"></a>
	</div>




<!-- 	<div class="footer">
        <div class="footer_bor">
            <li><img src="__PUBLIC__/Wxshop/images/shouye2.png"/><span>首页</span></li>
            <li><a href="/wxlicai/index.html"><img src="__PUBLIC__/Wxshop/images/licai.png"/>理财</a></li>
            <li><a href="#"><img src="__PUBLIC__/Wxshop/images/jiedai.png"/>借贷</a></li>
            <li><a href="/?wxuser"><img src="__PUBLIC__/Wxshop/images/wo.png"/>我</a></li>
        </div>
    </div> -->

</body>