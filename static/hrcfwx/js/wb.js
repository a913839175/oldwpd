$(function(){

	//关闭付款
	$("#fukuan_close").click(function(){
		$("#fukuan").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');

	});

	//关闭付款和详情
	$("#screenc-overlay").click(function(){
		$("#fukuan").css('display','none');
		$("#xiangqing").css('display','none');
		$("#success").css('display','none');
		$("#error").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');
	});

	//点击投标---显示付款
	$("#dotoubiao").click(function(){
		$("#fukuan").css('display','block');
		$("#screenc-overlay").css('display','block');
		$('body').css('overflow','hidden');
	});

	//关闭详情---退回付款
	$("#xiangqing_close").click(function(){
		$("#fukuan").css('display','block');
		$("#xiangqing").css('display','none');
	});

	//点击知道了-成功
	$("#know_success").click(function(){
		$("#fukuan").css('display','none');
		$("#xiangqing").css('display','none');
		$("#success").css('display','none');
		$("#error").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');
	});

	//点击知道了-失败
	$("#know_error").click(function(){
		$("#fukuan").css('display','none');
		$("#xiangqing").css('display','none');
		$("#error").css('display','none');
		$("#success").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');
	});

	//w+3

	//只能是输入数字
	$('#account').keydown(function(event){ 
		onlyNum();
	});

	//当金额输入框发生变化
	$('#account').change(function(event){ 
		var money=$('#account').val();
		if(money<100){
			$.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#account").focus();
		}else if((money%100)!=0){
			$.Zebra_Dialog('<span style="font-size:18px;">输入金额需为100元的整数倍！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#account").focus();
		}else{
			var shares=money/100;
			$('#showaccount').html(money);
			$('#showaccount2').html(money+"元");
			$('#realaccount').val(money);
			$('#showshares').html('元（'+shares+'）份');
		}
	});

	//点击确定
	$('#fukuab_sure').click(function(){
		if($("#isread").is(':checked')){
			var account=$('#account').val();
			if(account<100){
				$.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#account").focus();
			}else if((account%100)!=0){
				$.Zebra_Dialog('<span style="font-size:18px;">输入金额需为100元的整数倍！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#account").focus();
			}else{
				var shares=account/100;
				$('#showaccount').html(account);
				$('#showaccount').html(account+"元");
				$('#realaccount').val(account);
				$('#showshares').html('元（'+shares+'）份');
					$("#fukuan").css('display','none');
				$("#xiangqing").css('display','block');
			}
		}else{
			$.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		}

	});



	/* *************************************************************** *
	$("#success").css('display','block');
	$("#screenc-overlay").css('display','block');
	$("#fukuan").css('display','none');
	$("#xiangqing").css('display','none');
	$('body').css('overflow','hidden');
	/* *************************************************************** */

	//投标
	var iscan=1;
	$('#xiangqing_sure').click(function(){
		var account=$("#realaccount").val();
		var paypassword=$("#paypassword").val();
		var borrow_nid=$("#borrow_nid").val();
		var agree_contract=$("#isread").val();
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
			$("#paypassword").focus();
			return false;
		}

		if(iscan==1){
			iscan=0;
			layer.load();
			$.ajax({
	            type: "post",
	            url: "/index.php?wxuser&q=code/borrow/licaitender",
	            data: {
	            	'bidAmount':account,
	            	'borrow_nid':borrow_nid,
	            	'paypassword':paypassword,
	            	'agree-contract':agree_contract
	            },
	            dataType: "json",
	            success: function(data){
	            	var addhtml="";
	            	if(data.status==0){

	            		$("#screenc-overlay").css('display','block');
						$("#fukuan").css('display','none');
						$("#xiangqing").css('display','none');
						$('body').css('overflow','hidden');
						$("#success").css('display','block');

						$("#paypassword").val('');
	            		
	            	}else{
	            		$('#error_p').html(data.message);

						$("#screenc-overlay").css('display','block');
						$("#fukuan").css('display','none');
						$("#xiangqing").css('display','none');
						$('body').css('overflow','hidden');
						$("#error").css('display','block');

						$("#paypassword").val('');
	            	}
	            	iscan=1;
	            	layer.closeAll('loading');
	            },
	            error:function(e){
	            	alert("网络错误");
	            	iscan=1;
	            	layer.closeAll('loading');
	            }
	        });
		}

	});


	/* **************************投标操作-原-top************************************* *
	//提交表单
	var iscan=1;
	$('#xiangqing_sure').click(function(){
		var account=$("#realaccount").val();
		var paypassword=$("#paypassword").val();
		var borrow_nid=$("#borrow_nid").val();
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

		if(iscan==1){
			iscan=0;
			$('#xiangqing_sure').attr('disabled','disabled');
			$("#borrowform").attr('action','/index.php?wxuser&q=code/borrow/licaitender');
			$("#borrowform").submit();
		}

	});

	/* **************************投标操作-原-bottom************************************* */


});




function onlyNum() {
    if(!(event.keyCode==46)&&!(event.keyCode==8)&&!(event.keyCode==37)&&!(event.keyCode==39))
    if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))
    event.returnValue=false;
}