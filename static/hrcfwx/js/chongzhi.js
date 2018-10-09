$(function(){
	//关闭提示
	$(".chongzhifc").click(function(){
		$('.chongzhifc').hide();
	});

	//关闭选择
	$("#xuanze_close").click(function(){
		$("#mainxz").css('display','none');
		$("#screenc-overlay").css('display','none');
	});

	//关闭选择
	$("#screenc-overlay").click(function(){
		$("#mainxz").css('display','none');
		$("#screenc-overlay").css('display','none');
	});

	//选择银行
	$("#xuanze").click(function(){
		$("#mainxz").css('display','block');
		$("#screenc-overlay").css('display','block');
	});

	//确认银行
	$(".thisbank").click(function(){

		var thisid=$(this).attr('data-id');
		var thisimg=$(this).attr('data-img');
		var thisname=$(this).attr('data-name');

		$('#sure_bank').attr('data-id',thisid);
		$('#bankimg').attr('src',thisimg);
		$('#bankname').html(thisname);
		$('#bankid').val(thisid);

		$("#mainxz").css('display','none');
		$("#screenc-overlay").css('display','none');

		$("#xz_bank").css('display','none');
		$("#sure_bank").css('display','block');

	});

	//获取验证码
	$('#getcode').click(function(){

		if(isclick_ok==1){

			var money=$('#money').val();
			var bank=$('#sure_bank').attr('data-id');
			var card=$('#card').val();
			var phone=$('#phone').val();


			if ($.trim(money) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">充值金额不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#money").focus();
				return false;
			}else{
				if(parseInt($.trim(money))<100){
					$.Zebra_Dialog('<span style="font-size:18px;">充值金额不能小于100！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#money").focus();
					return false;

				}else if(parseInt($.trim(money))>50000){
					$.Zebra_Dialog('<span style="font-size:18px;">充值金额不能大于50000！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#money").focus();
					return false;
				}
			}

			if ($.trim(phone) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">预留号码不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#phone").focus();
				return false;
			} else {
				var reg = /^1\d{10}$/;
			  	if(!reg.test($.trim(phone))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">预留号码格式不正确</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			   		return false;
			  	}
			}

			if ($.trim(bank) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请选择银行</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });

				$("#bank").focus();
				return false;
			}

			if ($.trim(card) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">银行卡号不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#card").focus();
				return false;
			}else{
				if($.trim(card).length>19){
					$.Zebra_Dialog('<span style="font-size:18px;">银行卡号不能超过19位！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
					$("#card").focus();
					return false;
				}
			}

			settime($("#getcode"));
			isclick_ok=0;
			
			$.ajax({
	            type: "post",
	            url: "/?wxuser&q=code/account/recharge_new_quick",
	            data: {
	            	'amount':money,
	            	'bankCode':bank,
	            	'bankCardNo':card,
	            	'mp':phone,
	            	'userBankId':''
	            },
	            dataType: "json",
	            success: function(data){
	            	if(data.status==0){
	            		$('#ticket').val(data.data);
	            		$.Zebra_Dialog('<span style="font-size:18px;">短信已发送</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
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


	});


	//下一步
	var iscan=1;
	$('#next').click(function(){
		if($("#isread").is(':checked')){
			var money=$('#money').val();
			var bank=$('#bankid').val();
			var card=$('#card').val();
			var phone=$('#phone').val();
			var code=$('#code').val();
			var ticket=$('#ticket').val();


			if ($.trim(money) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">充值金额不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#money").focus();
				return false;
			}else{
				if(parseInt($.trim(money))<100){
					$.Zebra_Dialog('<span style="font-size:18px;">充值金额不能小于100！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#money").focus();
					return false;

				}else if(parseInt($.trim(money))>50000){
					$.Zebra_Dialog('<span style="font-size:18px;">充值金额不能大于50000！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#money").focus();
					return false;
				}
			}

			if ($.trim(phone) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">预留号码不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#phone").focus();
				return false;
			} else {
				var reg = /^1\d{10}$/;
			  	if(!reg.test($.trim(phone))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">预留号码格式不正确</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			   		return false;
			  	}
			}

			if ($.trim(bank) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请选择银行</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });

				$("#bank").focus();
				return false;
			}

			if ($.trim(card) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">银行卡号不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#card").focus();
				return false;
			}else{
				if($.trim(card).length>19){
					$.Zebra_Dialog('<span style="font-size:18px;">银行卡号不能超过19位！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
					$("#card").focus();
					return false;
				}
			}


			if ($.trim(code) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">验证码不能为空</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });

				$("#code").focus();
				return false;
			}
			if(iscan==1){
				iscan=0;
				$("#accountform").attr('action','/?wxuser&q=code/account/recharge_new_quick_advance');
				$("#accountform").submit();
			}

		}else{
			$.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		}
	});

});

var countdown=60; 
var isclick_ok=1;//是否可点击
function settime(obj){ 
    if (countdown == 0) {
    	obj.removeAttr("disabled");
    	obj.css("background-color","#00a0e9");
        obj.html("获取验证码"); 
        countdown = 60;
        isclick_ok=1;
        return;
    } else { 
        obj.attr("disabled", true);
        obj.html(countdown+"秒后重发");
        obj.css("background-color","#AEB7BB");
        countdown--; 
    } 
setTimeout(function() { 
    settime(obj) }
    ,1000) 
}