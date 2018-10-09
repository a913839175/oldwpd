

function gethongbao(){
    
	var regphone=$("#regphone").val();
	var tenderid=$("#tenderid").val();
	
	if ($.trim(regphone) == '') {
		$.Zebra_Dialog('<span style="font-size:18px;">请输入手机号码！</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });
		$("#regphone").focus();
		return false;
	}

	$.ajax({
        type: "post",
        url: "/index.php?wxuser&q=linghongbao",
        data: {
        	'regphone':regphone,
        	'tenderid':tenderid
        },
        dataType: "json",
        success: function(data){
        	
        	if(data.status==0){
        		window.location.href='/?wxuser&q=qianghongbaoshouquan&hongbaoid='+data.hongbaoid;
        	}else if(data.status==100){
        		$.Zebra_Dialog('<span style="font-size:18px;">请先注册为微拍贷用户,再来领取红包!</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                });
        		window.location.href='/?wxuser&q=reg';
        	}else if(data.status==1){
        		$.Zebra_Dialog('<span style="font-size:18px;">红包已领完!</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                });
        		window.location.href='/?wxuser&q=qianghongbao&tenderid='+tenderid;
        	}
        }
     });

	
}

