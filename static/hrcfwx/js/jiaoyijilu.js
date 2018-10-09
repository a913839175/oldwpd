$(function(){
	//////////////////////////////
	//关闭选择
	$("#xuanze_close").click(function(){
		$("#xuanze").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');
	});

	//关闭选择
	$("#screenc-overlay").click(function(){
		$("#xuanze").css('display','none');
		$("#screenc-overlay").css('display','none');
		$('body').css('overflow','visible');
	});

	//点击选择
	$("#choice").click(function(){
		$("#xuanze").css('display','block');
		$("#screenc-overlay").css('display','block');
		$('body').css('overflow','hidden');
	});

	//重置
	$("#chongzhi").click(function(){
		$("#startdate").val('');
		$("#enddate").val('');
	});

	//查看备注
	$(".jiaoyi_item").click(function(){
		var remark=$(this).children('.remark').val();
		var remarkstr=remark.replace(/<[^>]+>/g,"");

		$.Zebra_Dialog('<span style="font-size:18px;">'+remarkstr+'</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });

	});

	//////////////////////////////////////
	var month='1';
	var kind=$('.active_xuanze').parent('a').attr('data-kind');
	var kindname=$('.active_xuanze').html();
	$("#kind_name").html(kindname);
	$('.getmonth').click(function(){
		month=$(this).attr('data-month');
		$('.month').removeClass('cur_xuanze');
		$(this).children().addClass('cur_xuanze');
	});

	$('.getkind').click(function(){
		kind=$(this).attr('data-kind');
		$('.kind').removeClass('active_xuanze');
		$(this).children().addClass('active_xuanze');
	});

		//筛选
	$("#search_sure").click(function(){
		var url = "/?wxuser&q=jiaoyijiluguanli";

		var _url = "";
		// var keywords = $("#keywords").val();
		// var username = $("#username").val();
		var dotime1 = $("#startdate").val();
		var dotime2 = $("#enddate").val();
		var type=kind;
		// if (username!=null){
		// 	 _url += "&username="+username;
		// }
		// if (keywords!=null){
		// 	 _url += "&keywords="+keywords;
		// }
		if (dotime1!=null&&dotime1!=''){
			 _url += "&dotime1="+dotime1;
		}
		if (dotime2!=null&&dotime2!=''){
			 _url += "&dotime2="+dotime2;
		}

		if(!dotime1&&!dotime2){

		}
		if (type!=null&&type!=''){
			 _url += "&type="+type;
		}
		location.href=url+_url;
	});

	//////////////////////////////
	//日期选择器
	var curr = new Date().getFullYear();
    date = new Date();
    var opt = {
        dateFormat: 'yy-mm-dd',
        endYear: date.getFullYear() + 6,
    }

    opt.date = {preset : 'date'};
    opt.datetime = { preset : 'datetime', minDate: new Date(2012,3,10,9,22), maxDate: new Date(2014,7,30,15,44), stepMinute: 5  };
   opt.time = {preset : 'time'};

	// $('#startdate').val('').scroller('destroy').scroller($.extend(opt['date'], { theme: 'ios', mode: 'scroller', display: 'modal', lang: 'zh' }));
	// $('#enddate').val('').scroller('destroy').scroller($.extend(opt['date'], { theme: 'ios', mode: 'scroller', display: 'modal', lang: 'zh' }));

	$('#startdate').scroller('destroy').scroller($.extend(opt['date'], { theme: 'ios', mode: 'scroller', display: 'modal', lang: 'zh' }));
	$('#enddate').scroller('destroy').scroller($.extend(opt['date'], { theme: 'ios', mode: 'scroller', display: 'modal', lang: 'zh' }));

	/////////////////////////////////////

});

