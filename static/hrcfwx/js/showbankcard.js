$(function(){

	//解绑
	$('#del_card').click(function(){


		var bank=$("#bank").attr('data-id');

		$.Zebra_Dialog('<span style="font-size:18px;">您确定删除该张银行卡吗？</span>', {
            'type':     'question',
            'custom_class': 'question_dialog',
            'buttons':  [
                            {caption: '确定', callback: function() {
                            	$.ajax({
						            type: "post",
						            url: "/?wxuser&q=code/approve/deletebank",
						            data: {
						            	'userBankId':bank,
						            },
						            dataType: "json",
						            success: function(data){
						            	if(data.status==0){
						            		$('#ticket').val(data.data);
						            		$.Zebra_Dialog('<span style="font-size:18px;">'+data.message+'</span> ', {
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
                            }},
                            {caption: '取消', callback: function() { 

                            }}
                        ]
        });



	});

});