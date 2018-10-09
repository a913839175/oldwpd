$(function(){
	//首页 轮播
	if($('#index-bxslider').length>0){
		$('#index-bxslider').bxSlider({
			auto: true,
			pagerCustom: '#bx-pager',
			nextText: ' ',
			prevText: ' ',
			speed: 500,
			pause: 5000,
			autoHover: true,
		});
	};
});
