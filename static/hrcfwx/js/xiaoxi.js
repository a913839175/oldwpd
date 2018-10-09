$(function(){


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
            url: "/index.php?wxuser&q=login",
            data: {
            	'j_username':username,
            	'password':password
            },
            dataType: "json",
            success: function(data){
            	if(data.status==0){
            		window.location.href='/?wx';
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