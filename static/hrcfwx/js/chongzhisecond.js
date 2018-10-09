$(function(){
		//关闭提示
	$(".chongzhifc").click(function(){
		$('.chongzhifc').hide();
	});
	//获取验证码
	$('#getcode').click(function(){

		if(isclick_ok==1){

			var money=$('#money').val();
			var userBankId=$('#userBankId').val();

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

			settime($("#getcode"));
			isclick_ok=0;
			$.ajax({
	            type: "post",
	            url: "/?wxuser&q=code/account/recharge_new_quick",
	            data: {
	            	'amount':money,
	            	'userBankId':userBankId
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

			$("#accountform").attr('action','/?wxuser&q=code/account/recharge_new_quick_advance');
			$("#accountform").submit();

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