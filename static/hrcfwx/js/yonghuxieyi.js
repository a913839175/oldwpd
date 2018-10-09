$(function(){

	$("#change").change(function(){
		var showid=$("#change").val();
		$('.content').css('display','none');
		$('#'+showid).css('display','block');
	})

});

