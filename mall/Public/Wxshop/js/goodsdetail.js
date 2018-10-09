$(function(){

	$('.introtab').click(function(){
		$('.paramtab').removeClass('current');
		$('.paramcontent').removeClass('cur');

		$(this).addClass('current');
		$('.intricontent').addClass('cur');
	})

	$('.paramtab').click(function(){
		$('.introtab').removeClass('current');
		$('.intricontent').removeClass('cur');

		$(this).addClass('current');
		$('.paramcontent').addClass('cur');
	})




	$('#sure').click(function(){
		var address=$('#getaddress').val();
		var id=$('#productid').val();

		if(!id||$.trim(id)==''){
			$.Zebra_Dialog('<span style="font-size:18px;">数据错误！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			return false;
		}

		// if(!address||$.trim(address)==''){
		// 	$.Zebra_Dialog('<span style="font-size:18px;">地址不能为空！</span> ', {
	 //            'type':     'information',
	 //            'custom_class': 'info_dialog',
	 //            'buttons':['确定']
	 //        });
		// 	return false;
		// }

		$("#form").attr('action','index.php?m=wxshop&a=exchange_jifen');
		$("#form").submit();

	})

});