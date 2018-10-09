$(function(){
	var is=$('#is').val();
	if(is==1||is=='1'){
		$("#overlay-content").css('display','block');
	    $("#screenc-overlay").css('display','block');
	    $('body').css('overflow','hidden');
	}

	$("#screenc-overlay").click(function(){
	    $("#overlay-content").css('display','none');
	    $("#screenc-overlay").css('display','none');
	    $('body').css('overflow','visible');
	});
	
	$("#overlay-content").click(function(){
	    $("#overlay-content").css('display','none');
	    $("#screenc-overlay").css('display','none');
	    $('body').css('overflow','visible');
	});

	$(".overlay-guanbi-img").click(function(){
	    $("#overlay-content").css('display','none');
	    $("#screenc-overlay").css('display','none');
	    $('body').css('overflow','visible');
	});

	$('.overlay-jiesuo-img').click(function(){
		$("#overlay-content").css('display','none');
	    $("#screenc-overlay").css('display','none');
	    $('body').css('overflow','visible');
	    var url='/?wxuser&q=hongbao';
	    window.location.href=url;
	});
});