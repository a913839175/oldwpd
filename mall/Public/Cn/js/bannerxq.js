//开奖码为0
$(function(){
// endyear页面中---点击了解详情
var flag = true;
$('.banner07111605').on('click',function(){
	console.log(1);
	if(flag == true){
		$(".banner07111606").slideToggle("slow");
		flag = false;
	}else if(flag == false){
		$(".banner07111606").slideToggle("hide");
		flag = true;
	}	
})

})
