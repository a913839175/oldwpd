$(function(){
    
    $('.mytotfcwz').click(function(){
            $('.mytotfc').hide();
    })
    $('.mytotmetimg').click(function(){
            $('.mytotfc').show();
    })
	//退出
	$('#loginout').click(function(){

		$.Zebra_Dialog('<span style="font-size:18px;">您确定退出微拍贷？</span>', {
            'type':     'question',
            'custom_class': 'question_dialog',
            'buttons':  [
                            {caption: '确定', callback: function() {
                            	window.location.href='/?wxuser&q=logout&type=index'
                            }},
                            {caption: '取消', callback: function() { 

                            }}
                        ]
        });

	});



});
