$(function(){

	var userAgent = navigator.userAgent.toLowerCase();
	var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
	var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
	var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);

	//关闭分享
	$("#fenxiang_close").click(function(){
		$("#fenxiang").css('display','none');
		$("#screenc-overlay").css('display','none');
	});

	//关闭分享
	$("#screenc-overlay").click(function(){
		$("#fenxiang").css('display','none');
		$("#screenc-overlay").css('display','none');
	});

	//点击分享
	$("#share").click(function(){
		$("#fenxiang").css('display','block');
		$("#screenc-overlay").css('display','block');
	});

	//展示链接地址
	var now_protocol=window.location.protocol
	var now_shareurl=$('#shareurl').attr('data-url');
	var now_copy_url=now_protocol+'//'+now_shareurl;
	$("#url_p").html(now_copy_url);

	//点击复制链接
	$("#copy").click(function(){
		var protocol=window.location.protocol
		var shareurl=$('#shareurl').attr('data-url');
		var copy_url=protocol+'//'+shareurl;
		setcopy(copy_url,'复制链接到剪切板',is_ie);
	});
	
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

//复制链接-函数
function setcopy(text, alertmsg,is_ie){
	if(is_ie) {
		clipboardData.setData('Text', text);
		// alert(alertmsg);
		$.Zebra_Dialog('<span style="font-size:18px;">'+alertmsg+'</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });
	} else if(prompt('全选链接并复制', text)) {
		// alert(alertmsg);
		$.Zebra_Dialog('<span style="font-size:18px;">'+alertmsg+'</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });
	}
}