$(function(){

	//重置用户名
	$("#userreset").click(function(){
		$("#username").val('');
	})

	//重置验证码
	$("#passwordreset").click(function(){
		$("#password").val('');
	})


	//密码是否可见
	var ispswshow=0;
	$('#isshow').click(function(){
		if(ispswshow==0){
			$('#password').attr('type','text');
			ispswshow=1;
		}else{
			$('#password').attr('type','password');
			ispswshow=0;
		}
	});




	//登录
	$('#dologin').click(function(){
		var username=$("#username").val();
		var password=$("#password").val();
		var tourl=$("#fromurl").val();

		if ($.trim(username) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">用户名不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#username").focus();
			return false;
		}

		if ($.trim(password) == '') {
			$.Zebra_Dialog('<span style="font-size:18px;">密码不能为空！</span> ', {
	            'type':     'information',
	            'custom_class': 'info_dialog',
	            'buttons':['确定']
	        });
			$("#password").focus();
			return false;
		}

		$.ajax({
            type: "post",
            url: "index.php?m=Wxshop&a=dologin",
            data: {
            	'j_username':username,
            	'password':password
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		// window.location.href='/?wxuser'
            		// window.location.href=tourl;
            		var time=1500;
					$.Zebra_Dialog('<span style="font-size:18px;">登录成功，正在跳转</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'auto_close':time,
			            'buttons':['确定']
			        });
					setTimeout(function(){
						window.location.href=tourl;
					},2000);
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

});