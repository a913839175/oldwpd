$(function(){
	//隔行变色
	$(".gsxxul tr:even").addClass("tabEven");
	$(".gsxxul tr:odd").addClass("tabodd");
	//工商 分支机构 tab 切换
	$('.tabli').on('click',function(){
		var index = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		var newname = '.gsxxul' + index;
		$(newname).removeClass("hide").siblings().addClass("hide")
	})
})