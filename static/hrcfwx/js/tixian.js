$(function(){


	//关闭选择
	$("#xuanze_close").click(function(){
		$("#mainxz").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');
	});

	//关闭选择
	$("#screenc-overlay").click(function(){
		$("#mainxz").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');
	});

	//选择银行
	$("#xuanze").click(function(){
		$("#mainxz").css('display','block');
		$("#screenc-overlay").css('display','block');
		$('body').css('overflow','hidden');
	});

	//确认银行
	$(".thisbank").click(function(){

		var thisid=$(this).attr('data-id');
		var thisimg=$(this).attr('data-img');
		var thisname=$(this).attr('data-name');
		var thisstr=$(this).attr('data-str');

		$('#bank_pic').attr('src',thisimg);
		$('#bankimg').css('display','block');
		$('#bank_nameandstr').html(thisname+'（'+thisstr+'）');
		$('#bank').val(thisid);

		$("#mainxz").css('display','none');
		$("#screenc-overlay").css('display','none');

		$("#xz_bank").css('display','none');
		$("#sure_bank").css('display','block');
		$('body').css('overflow','visible');

	});


	//输入金额改变
	$('#money').bind('input propertychange', function(){
		var thismoney=$('#money').val();
		var nowmoney=0;

		if ($.trim(thismoney) == '') {
			nowmoney=0.00;
		} else {
			var reg = /^\d+(\.\d{1,2})?$/;
		  	if(!reg.test($.trim(thismoney))){
		   		var nowmoney=0.00;

		  	}else{
		  		nowmoney=thismoney;
		  	}
		}

		$('#nowmoney').html(nowmoney);

	});



	//下一步
	$('#next').click(function(){
		if($("#isread").is(':checked')){
			var money=$('#money').val();
			var bank=$('#bank').val();
			var paycode=$('#paycode').val();

			if ($.trim(money) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">金额不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
		        $("#money").focus();
		   		return false;
			} else {
				var reg = /^\d+(\.\d{1,2})?$/;
			  	if(!reg.test($.trim(money))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">请输入正确的金额！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#money").focus();
			   		return false;
			  	}else if(parseInt($.trim(money))<100){
			  		$.Zebra_Dialog('<span style="font-size:18px;">金额不能小于100！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#money").focus();
			   		return false;
			  	}
			}

			if ($.trim(paycode) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">交易密码不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
		        $("#paycode").focus();
		   		return false;
			}

			if ($.trim(bank) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">信息有误！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
		   		return false;
			}
			var time=(new Date()).valueOf();

			$.ajax({
	            type: "post",
	            url: "/?wxuser&q=code/account/getCashFee",
	            data: {
	            	'type':'cashDraw',
	            	'amount':money,
	            	'_':time
	            },
	            dataType: "json",
	            success: function(data){
	            	if(data.balance<0){
	            		$.Zebra_Dialog('<span style="font-size:18px;">您的账户余额不足</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
	            	}else{
	            		$.ajax({
				            type: "post",
				            url: "/?wxuser&q=code/account/cashDraw",
				            data: {
				            	'userBankId':bank,
				            	'amount':money,
				            	'cashPassword':paycode
				            },
				            dataType: "json",
				            success: function(data){
				            	if(data.status==0){
				            		$.Zebra_Dialog('<span style="font-size:18px;">操作成功，1-2个工作日（双休日和法定节假日除外）之内到账</span> ', {
							            'type':     'information',
							            'custom_class': 'info_dialog',
							            'buttons':['确定']
							        });
							        window.location.href='/?wxuser';
				            	}else{
				            		$.Zebra_Dialog('<span style="font-size:18px;">'+data.message+'</span> ', {
							            'type':     'information',
							            'custom_class': 'info_dialog',
							            'buttons':['确定']
							        });
				            	}
				            }
				        });
	            	}
	            }
	        });

		}else{
			$.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		}
	});
});