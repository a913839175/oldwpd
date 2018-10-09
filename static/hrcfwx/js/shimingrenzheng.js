$(function(){


	//--下一步
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
            		url="/?wxuser";
            		window.location.href=url;
            	}else{
            		$.Zebra_Dialog('<span style="font-size:18px;">实名认证失败</span> ' +'<br><br><p style="font-size:18px;color:#e33709">身份证信息审核失败，请确认您的身份证号和姓名是否正确</p>', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            	}
            }
         });

	});


});