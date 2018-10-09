<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
	<script src="__PUBLIC__/Home/js/jquery.js"></script>
    <script>
		$(function(){
			function brandShowSlide(){
		
				var $oPrev = $(".brandShowSmallImg .prev");
				var $oNext = $(".brandShowSmallImg .next");
				var $bigImg = $(".brandShowBigImg img")
				var $oCon = $("#slideE ul");
				var $oLi = $oCon.find("li")
				var $i = 0;
				var $m = $oLi.length-5;
				
				function init(){
					$oCon.width(($oLi.eq(0).width()+10)*$oLi.length);
				}
				init()	
				
				function imgChange(n){
					if(n<$oLi.length-5){
						$oCon.stop().animate({left:'-'+n*($oLi.eq(0).width()+10)},300)
					}else if(n===$oLi.length-1){
						$oCon.stop().animate({left:'-'+($oLi.length-6)*($oLi.eq(0).width()+8)},300)	
					}
					$oLi.find("a").removeClass("on");
					$oLi.eq(n).find("a").addClass("on");	
					$bigImg.attr("src",$oLi.eq(n).find("a").attr("href"))
				}
				imgChange($i);
				$oLi.find("a").each(function(index){
					$(this).click(function(){
						$i = index;
						imgChange($i)
						$bigImg.attr("src",'__PUBLIC__/Home/images/loading.gif');
						var _src = $(this).attr("href");
						$bigImg.attr("src",_src);
						return false;	
					})
				})
				$oNext.click(function(){
					$i++;
					if($i === $oLi.length) $i=0;
					imgChange($i)	
				})
				$oPrev.click(function(){
					$i--;
					if($i < 0) $i=$oLi.length-1;
					imgChange($i)	
				})
				
				
			}
			brandShowSlide();	
		})
	</script>
</head>
<body>
<div id="brandShowCon">
	<div class="brandShowLeft">
    	<div class="brandShowBigImg">
        	<img src="" width="478" height="372" />
        </div>
        <div class="brandShowSmallImg">
        	<span class="btn prev"></span>
            <span class="btn next"></span>
            <div id="slideE">
            	<ul>
            		<foreach name="other_img" item="vo">
            			<li><a href="__PUBLIC__/Uploads/Product/<{$vo}>"><img src="__PUBLIC__/Uploads/Product/<{$vo}>" width="58" height="48" /></a></li>
            		</foreach>
                	
                </ul>
            </div>
        </div>
    </div>
    <div class="brandShowRight">
    	<h4>
        	<span><{$data.proname}></span>
            <p><span>发表日期：<{$data.addtime|date="Y-m-d H:i:s"}></span><em><{$data.pro_dianjiliang}></em></p>
        </h4>
        <div class="brandShowMemo">
        	<{$data.procontent}>
        </div>
        <div class="brandShowShare">
        	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">人人网</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧">百度贴吧</a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友">QQ好友</a></div>
        </div>
    </div>
</div>	
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>