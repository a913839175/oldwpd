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

		$('#sure_bank').attr('data-id',thisid);
		$('#bankimg').attr('src',thisimg);
		$('#bankimg').css('display','block');
		$('#bankname').html(thisname);
		$('#selBankType').val(thisid);

		$("#mainxz").css('display','none');
		$("#screenc-overlay").css('display','none');

		$("#xz_bank").css('display','none');
		$("#sure_bank").css('display','block');
		$('body').css('overflow','visible');

	});

	//获取验证码
	$("#getcode").click(function(){
		if(isclick_ok==1){
			settime($("#getcode"));
			isclick_ok=0;
			$.ajax({
	            type: "post",
	            url: "/?wxuser&q=login&q=sendCode",
	            dataType: "json",
	            success: function(data){
	            	$.Zebra_Dialog('<span style="font-size:18px;">短信已发送</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
	            }
	        });
		}
	});


	//提交
	$('#next').click(function(){
		if($("#isread").is(':checked')){
			var cardId=$('#cardId').val();
			var bankDataId=$('#selBankType').val();
			var province=$('#province').val();
			var city=$('#city').val();
			var deposit=$('#cardDeposit').val();
			var validateCode=$('#code').val();
			var realname_secur=$('#realname_secur').val();


			if ($.trim(cardId) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">银行卡号不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#cardId").focus();
				return false;
			}else{
				if($.trim(cardId).length<12){
					$.Zebra_Dialog('<span style="font-size:18px;">银行卡号应在12至19位之间！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#cardId").focus();
					return false;

				}else if($.trim(cardId).length>19){
					$.Zebra_Dialog('<span style="font-size:18px;">银行卡号应在12至19位之间！</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
			        $("#cardId").focus();
					return false;
				}
			}


			if ($.trim(bankDataId) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请选择银行</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				return false;
			}

			if ($.trim(province) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请选择省份</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });

				return false;
			}

			if ($.trim(city) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">请选择城市</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				return false;
			}

			if ($.trim(deposit) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">开户行不能为空</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });

				$("#cardDeposit").focus();
				return false;
			}


			if ($.trim(validateCode) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">验证码不能为空</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });

				$("#code").focus();
				return false;
			}

			if ($.trim(realname_secur) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">开户人姓名不能为空</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });

				return false;
			}

			$.ajax({
            type: "post",
            url: "/?wxuser&q=code/account/bank",
            data: {
            	'cardId':cardId,
            	'bankDataId':bankDataId,
            	'province':province,
            	'city':city,
            	'deposit':deposit,
            	'validateCode':validateCode,
            	'realname_secur':realname_secur
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		$.Zebra_Dialog('<span style="font-size:18px;">'+data.message+'</span> ', {
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