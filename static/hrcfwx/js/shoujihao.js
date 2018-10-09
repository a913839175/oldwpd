$(function(){


	//重置验证码-第一步
	$("#coderesetfirst").click(function(){
		$("#codefirst").val('');
	})

	//重置手机号-第二步
	$("#reset").click(function(){
		$("#phone").val('');
	})

	//重置验证码-第二步
	$("#coderesetsecond").click(function(){
		$("#codesecond").val('');
	})

	//修改手机号第一步--获取验证码
	$('#getcodefirst').click(function(){

		if(isclick_ok1==1){
			settime1($("#getcodefirst"));
			isclick_ok1=0;

			$.ajax({
	            type: "post",
	            url: "/index.php?wxuser&q=login&q=sendCode",
	            data: {
	            },
	            dataType: "json",
	            success: function(data){
	            	$('.info').html(data.result);
	            }
	        });
		}
	});

	$('#firstnext').click(function(){
		var codefirst=$("#codefirst").val();

		if ($.trim(codefirst) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">验证码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#codefirst").focus();
			return false;
		}

		$('#modMobileByPhoneStepOneForm').attr('action','/?wxuser&q=code/users/modifyphone_byphone_stepone');
		$('#modMobileByPhoneStepOneForm').submit();
	})
	


	//修改手机号第二步--获取验证码
	$('#getcodesecond').click(function(){

		if(isclick_ok2==1){

			var phone=$("#phone").val();
			if ($.trim(phone) == '') {
				$.Zebra_Dialog('<span style="font-size:18px;">手机号码不能为空！</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$("#phone").focus();
				return false;
			} else {
				var reg = /^1\d{10}$/;
			  	if(!reg.test($.trim(phone))){
			   		$.Zebra_Dialog('<span style="font-size:18px;">手机号码格式不正确</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
			   		return false;
			  	}
			}
			settime2($("#getcodesecond"));
			isclick_ok2=0;
			$.ajax({
	            type: "post",
	            url: "/?wxuser&q=login&q=sendCodeCheck",
	            data: {
	            	'phone':phone
	            },
	            dataType: "json",
	            success: function(data){
	            	$('.info').html(data.result);
	            }
	        });


		}
	});



	//修改手机号第二步--下一步
	$('#secondnext').click(function(){
		var phone=$("#phone").val();
		var code=$("#codesecond").val();
		if ($.trim(phone) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">手机号码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#phone").focus();
			return false;
		} else {
			var reg = /^1\d{10}$/;
		  	if(!reg.test($.trim(phone))){
		   		$.Zebra_Dialog('<span style="font-size:18px;">手机号码格式不正确</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
		   		return false;
		  	}
		}
		if ($.trim(code) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">验证码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#codesecond").focus();
			return false;
		}
		// $('#modMobileByPhoneStepTwoForm').attr('action','/?wxuser&q=code/users/modifyphone_byphone_steptwo');
		// $('#modMobileByPhoneStepTwoForm').submit();
		$.ajax({
            type: "post",
            url: "/?wxuser&q=code/users/modifyphone_byphone_steptwo",
            data: {
            	'phone':phone,
            	'validateCode':code
            },
            dataType: "json",
            success: function(data){
            	if(data.status==1){
            		$.Zebra_Dialog('<span style="font-size:18px;">'+data.message+'</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            		var url='/?wxuser&q=anquan'
            		window.location.href=url;
            	}else{
            		$.Zebra_Dialog('<span style="font-size:18px;">'+data.message+'</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            	}
            }
         });
	});


});

var countdown1=60; 
var isclick_ok1=1;//是否可点击
function settime1(obj){ 
    if (countdown1 == 0) {
    	obj.removeAttr("disabled");
    	obj.css("background-color","#00a0e9");
        obj.html("获取验证码"); 
        countdown1 = 60;
        isclick_ok1=1;
        return;
    } else { 
        obj.attr("disabled", true);
        obj.html(countdown1+"秒后重发");
        obj.css("background-color","#AEB7BB");
        countdown1--; 
    } 
setTimeout(function() { 
    settime1(obj) }
    ,1000) 
}


var countdown2=60; 
var isclick_ok2=1;//是否可点击
function settime2(obj){ 
    if (countdown2 == 0) {
    	obj.removeAttr("disabled");
    	obj.css("background-color","#00a0e9");
        obj.html("获取验证码"); 
        countdown2 = 60;
        isclick_ok2=1;
        return;
    } else { 
        obj.attr("disabled", true);
        obj.html(countdown2+"秒后重发");
        obj.css("background-color","#AEB7BB");
        countdown2--; 
    } 
setTimeout(function() { 
    settime2(obj) }
    ,1000) 
}