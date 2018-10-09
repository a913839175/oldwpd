$(function(){


	//投标w+b
	$('#wbsure').click(function(){
		if($("#wbisread").is(':checked')){
			var account=$("#wbaccount").val();
			var paypassword=$("#wbpaypassword").val();
			var borrow_nid=$("#wbborrow_nid").val();
			if ($.trim(account) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#wbaccount").focus();
				return false;
			} else {
				var reg = /^[0-9]*[1-9][0-9]*$/; 
			  	if(!reg.test($.trim(account))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			   		return false;
			  	}else{
			  		var r=account%100;
					if(r!=0){
						$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
						return false;
					}
			  	}
			}

			if ($.trim(paypassword) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入交易密码！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#wbpaypassword").focus();
				return false;
			}
			$("#borrowform").attr('action','/index.php?wxuser&q=code/borrow/licaitender');
			$("#borrowform").submit();

		}else{
			$.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		}
	});



	$('#wbaccount').keydown(function(event){ 
		onlyNum();
	});

	//投标w+3
	$('#w3sure').click(function(){
		if($("#w3isread").is(':checked')){
			var account=$("#w3account").val();
			var paypassword=$("#w3paypassword").val();
			var borrow_nid=$("#w3borrow_nid").val();
			if ($.trim(account) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#w3account").focus();
				return false;
			} else {
				var reg = /^[0-9]*[1-9][0-9]*$/; 
			  	if(!reg.test($.trim(account))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			   		return false;
			  	}else{
			  		var r=account%100;
					if(r!=0){
						$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
						return false;
					}
			  	}
			}

			if ($.trim(paypassword) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入交易密码！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#w3paypassword").focus();
				return false;
			}
			$("#borrowform").attr('action','/index.php?wxuser&q=code/borrow/licaitender');
			$("#borrowform").submit();

		}else{
			$.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		}
	});



	$('#w3account').keydown(function(event){ 
		onlyNum();
	});

	//投标w+6
	$('#w6sure').click(function(){
		if($("#w6isread").is(':checked')){
			var account=$("#w6account").val();
			var paypassword=$("#w6paypassword").val();
			var borrow_nid=$("#w6borrow_nid").val();
			if ($.trim(account) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#w6account").focus();
				return false;
			} else {
				var reg = /^[0-9]*[1-9][0-9]*$/; 
			  	if(!reg.test($.trim(account))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			   		return false;
			  	}else{
			  		var r=account%100;
					if(r!=0){
						$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
						return false;
					}
			  	}
			}

			if ($.trim(paypassword) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入交易密码！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#w6paypassword").focus();
				return false;
			}
			$("#borrowform").attr('action','/index.php?wxuser&q=code/borrow/licaitender');
			$("#borrowform").submit();

		}else{
			$.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		}
	});



	$('#w6account').keydown(function(event){ 
		onlyNum();
	});

	//投标wn
	$('#wnsure').click(function(){
		if($("#wnisread").is(':checked')){
			var account=$("#wnaccount").val();
			var paypassword=$("#wnpaypassword").val();
			var borrow_nid=$("#wnborrow_nid").val();
			if ($.trim(account) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#wnaccount").focus();
				return false;
			} else {
				var reg = /^[0-9]*[1-9][0-9]*$/; 
			  	if(!reg.test($.trim(account))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			   		return false;
			  	}else{
			  		var r=account%100;
					if(r!=0){
						$.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
						return false;
					}
			  	}
			}

			if ($.trim(paypassword) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请输入交易密码！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#wnpaypassword").focus();
				return false;
			}
			$("#borrowform").attr('action','/index.php?wxuser&q=code/borrow/licaitender');
			$("#borrowform").submit();

		}else{
			$.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		}
	});



	$('#wnaccount').keydown(function(event){ 
		onlyNum();
	});

	
});

function onlyNum() {
    if(!(event.keyCode==46)&&!(event.keyCode==8)&&!(event.keyCode==37)&&!(event.keyCode==39))
    if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))
    event.returnValue=false;
}