$(function(){

	//修改密码
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
            url: "/?user&q=code/users/user_password_set",
            data: {
            	'oldPassword':mypassword,
            	'newPassword':password,
            	'newPassword2':checkpassword
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