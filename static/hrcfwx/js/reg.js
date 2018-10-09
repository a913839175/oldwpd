$(function(){


	//重置手机号
	$("#reset").click(function(){
		$("#phone").val('');
	})

	//重置验证码
	$("#codereset").click(function(){
		$("#code").val('');
	})

	//注册第一页--获取验证码
	$('#getcode').click(function(){

		if(isclick_ok==1){

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

			settime($("#getcode"));
			isclick_ok=0;
			
			$.ajax({
	            type: "post",
	            url: "/index.php?wxuser&q=sendCodeCheck",
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

	//注册第一页---下一步
	$('#firstnext').click(function(){
		if($("#isread").is(':checked')){
			var phone=$("#phone").val();
			var code=$("#code").val();
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
				$("#code").focus();
				return false;
			}

			$.ajax({
	            type: "post",
	            url: "/index.php?wxuser&q=check_regCodes",
	            data: {
	            	'mobile':phone,
	            	'code':code
	            },
	            dataType: "json",
	            success: function(data){
	            	if(data){
	            		url="/?wxuser&q=regsecond";
	            		window.location.href=url;
	            	}else{
	            		$.Zebra_Dialog('<span style="font-size:18px;">验证失败</span> ', {
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


	//注册第二页--下一步
	$('#secondnext').click(function(){
		var password=$('#password').val();
		var checkpassword=$('#checkpassword').val();
		var invitephone=$('#invitephone').val();
		if(!invitephone){
			invitephone="";
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
		} else {
			if((($.trim(password).length)<6||($.trim(password).length)>15)){
				$.Zebra_Dialog('<span style="font-size:18px;">密码长度为6到15之间</span> ', {
		            'type':     'information',
		            'custom_class': 'info_dialog',
		            'buttons':['确定']
		        });
				$('#password').val('');
				$('#checkpassword').val('');
				$('#password').focus();
				return false;
			}
		}

		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=reg",
            data: {
            	'RegPassword':password,
            	'InviteUserPhone':invitephone
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		url="/?wxuser&q=regthird";
            		window.location.href=url;
            	}else{
            		$.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            	}
            }
         });

	});

	//注册第三页--下一步
	$('#thirdnext').click(function(){
		var realname=$('#realname').val();
		var idno=$('#idno').val();
		if ($.trim(realname) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">真实姓名不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#realname').focus();
			return false;
		}

		if ($.trim(idno) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">身份证不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$('#idno').focus();
			return false;
		}

		$.ajax({
            type: "post",
            url: "/?wxuser&q=code/approve/realname",
            data: {
            	'realName':realname,
            	'idNo':idno
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		url="/wxshouye/index.html";
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