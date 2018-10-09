
var all_page_curr=2;

$(function(){
	infinitescroll();
});

function infinitescroll(){
	$(".list").infinitescroll({
		loading:{
			msgText:"加载中...",
			finishedMsg:"没有新数据了...",
			// selector:".loading",
			// msg:"加载中111",
			img:'/mall/Public/Wxshop/images/loading.gif'
		},
		navSelector:"a.see-more:first",
		nextSelector:"a.see-more:first",
		itemSelector:".list div",
		dataType:"json",
		debug:false,
		// maxPage:1,
		pixelsFromNavToBottom:15,
    	all_page:all_page_curr,
		appendCallback:false
	},function(response){
		var jsondate=response.data;
		for(var i=0;i<jsondate.length;i++){
			var item=_renderItem(jsondate[i]);

			$(".list").append(item);
		}
	});
}



var _renderItem = function(n) {

	var kind="";
	var money="";

	// if(n['cid']==7){
	// 	kind="微币";
	// 	money=n['pro_weibi'];
	// }else if(n['cid']==1{
	// 	kind="微币";
	// 	money=n['pro_jifen'];
	// }

	kind="微币";
	money=n['pro_jifen'];

	var newElement='<div class="showgoods">';
	newElement=newElement+'<div class="goods">';
	newElement=newElement+'<a href="index.php?m=wxshop&a=goodsdetail&productid='+n["id"]+'">';
	newElement=newElement+'<div class="goods_img">';
	newElement=newElement+'<img src="/mall/Public/Uploads/Product/'+n['prophoto']+'">';
	newElement=newElement+'</div>';
	newElement=newElement+'</a>';
	newElement=newElement+'<div class="goods_title">';
	newElement=newElement+'<span>';
	newElement=newElement+n["proname"];
	newElement=newElement+'</span>';
	newElement=newElement+'</div>';
	newElement=newElement+'<div class="goods_score">';
	newElement=newElement+'<div class="score_num">';
	newElement=newElement+'<span>';
	newElement=newElement+money;
	newElement=newElement+'</span>';
	newElement=newElement+'</div>';
	newElement=newElement+'<div class="score_word">';
	newElement=newElement+'<span>';
	newElement=newElement+kind;
	newElement=newElement+'</span>';
	newElement=newElement+'</div>';
	newElement=newElement+'</div>';
	newElement=newElement+'</div>';
	newElement=newElement+'</div>';


	return newElement;
}