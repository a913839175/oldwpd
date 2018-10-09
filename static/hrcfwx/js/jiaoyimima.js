$(function(){

	//清空验证码
	$('#codereset').click(function(){
		$('#code').val('');
	});

	//设置交易密码
	$('#setnext').click(function(){
		var password=$('#password').val();
		var checkpassword=$('#checkpassword').val();

		if ($.trim(password) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#password').focus();
			return false;
		}

		if ($.trim(password).length < 6 || $.trim(password).length > 12) {
			$.Zebra_Dialog('<span style="font-size:18px;">交易密码长度为6-12位</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#password').focus();
			return false;
		}

		if ($.trim(checkpassword) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">确认密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#checkpassword').focus();
			return false;
		} else if ($.trim(password) != $.trim(checkpassword)) {
			$.Zebra_Dialog('<span style="font-size:18px;">确认密码必须与新密码相同！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#checkpassword').val('');
			$('#checkpassword').focus();
			return false;
		}

		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=code/users/setpaypwd",
            data: {
            	'cashPwd':password,
            	'cashPwd2':checkpassword
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		$.Zebra_Dialog('<span style="font-size:18px;">设置成功</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            		url="/?wxuser";
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

	//修改交易密码
	$('#updatenext').click(function(){
		var mypassword=$('#mypassword').val();
		var password=$('#password').val();
		var checkpassword=$('#checkpassword').val();

		if ($.trim(mypassword) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">原密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#mypassword').focus();
			return false;
		}

		if ($.trim(password) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#password').focus();
			return false;
		}

		if ($.trim(password).length < 6 || $.trim(password).length >12 ) {
			$.Zebra_Dialog('<span style="font-size:18px;">交易密码长度为6-12位</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#password').focus();
			return false;
		}

		if ($.trim(checkpassword) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">确认密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#checkpassword').focus();
			return false;
		} else if ($.trim(password) != $.trim(checkpassword)) {
			$.Zebra_Dialog('<span style="font-size:18px;">确认密码必须与新密码相同！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#checkpassword').val('');
			$('#checkpassword').focus();
			return false;
		}

		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=code/users/modifypaypwd",
            data: {
            	'cashPassword':mypassword,
            	'newCashPwd':password,
            	'newCashPwd2':checkpassword
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		$.Zebra_Dialog('<span style="font-size:18px;">设置成功</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            		url="/?wxuser&q=anquan";
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

	//发送验证码
	$('#getcode').click(function(){

		if(isclick_ok==1){
			settime($("#getcode"));
			isclick_ok=0;

			$.ajax({
	            type: "post",
	            url: "/index.php?wxuser&q=login&q=sendCode",
	            dataType: "json",
	            success: function(data){
	            	$('.info').html(data.result);
	            }
	        });
		}
	});

	//找回交易密码第一页---下一步
	$('#firstnext').click(function(){
		var code=$("#code").val();

		if ($.trim(code) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">验证码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#code").focus();
			return false;
		}
		$('#findCashPswFormStepOneForm').attr('action','/index.php?wxuser&q=code/users/findpaypwd_byphone_stepone');

		$('#findCashPswFormStepOneForm').submit();
	});



	//找回交易密码第二页---下一步
	$('#secondnext').click(function(){
		var password=$('#password').val();
		var checkpassword=$('#checkpassword').val();

		if ($.trim(password) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#password').focus();
			return false;
		}

		if ($.trim(password).length !=6) {
			$.Zebra_Dialog('<span style="font-size:18px;">交易密码长度为6位</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#password').focus();
			return false;
		}

		if ($.trim(checkpassword) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">确认密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#checkpassword').focus();
			return false;
		} else if ($.trim(password) != $.trim(checkpassword)) {
			$.Zebra_Dialog('<span style="font-size:18px;">确认密码必须与新密码相同！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#checkpassword').val('');
			$('#checkpassword').focus();
			return false;
		}

		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=code/users/findpaypwd_byphone_steptwo",
            data: {
            	'newCashPwd':password,
            	'newCashPwd2':checkpassword
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		$.Zebra_Dialog('<span style="font-size:18px;">设置成功</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            		url="/?wxuser&q=anquan";
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