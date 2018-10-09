// JavaScript Document
// code by ying
$(function(){
	var sid=1;
	var scs=window.setInterval(scsf,4000);
	function scsf(){
		if(sid<3){
			$("#sc_slidel>ul").animate({"margin-left":"-=760px"},"slow");
			$("#slide-circle ul li").eq(sid).addClass("slide-circle-esp");
			$("#slide-circle ul li").eq(sid-1).removeClass("slide-circle-esp");
			sid++;
		}
		else {
			$("#sc_slidel>ul").animate({"margin-left":"0px"});
			$("#slide-circle ul li").eq(0).addClass("slide-circle-esp");
			$("#slide-circle ul li").eq(sid-1).removeClass("slide-circle-esp");
			sid=1;
		}
	}
	$("#slide-circle ul li").each(function(index, element) {
		$(this).click(function(){
			window.clearInterval(scs);
			$("#sc_slidel>ul").animate({"margin-left":"-"+index*760});
			$("#slide-circle ul li").eq(index).addClass("slide-circle-esp");
			$("#slide-circle ul li").eq(sid-1).removeClass("slide-circle-esp");
			sid=index+1;
			scs=window.setInterval(scsf,4000);
		});
    });
	$("#sc_list ul li").mouseover(function(){
		$(this).addClass("sclist_esp");
	}).mouseout(function(){
		$(this).removeClass("sclist_esp");
	});
	$("#scshow_qh ul li").mouseover(function(){
		$("#scshow_qh ul li").removeClass("scqh_st");
		$(this).addClass("scqh_st");
		index=$("#scshow_qh ul li").index(this);
		$(".scshow_more").hide().eq(index).show();
	});
});