;$(function () {

	laydate({
        elem: '#start_date_tt'
    });

    laydate({
        elem: '#end_date_tt'
    });

	var tt_ajax_url="/?hradmin&q=code/data/main&action=tt_ajax";

	var tt_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_tt",  // 注意这里一定是 ID 选择器
            type: 'line'
        },
        title: {
            text: '投资-提现'
        },
        subtitle: {
            // text: '投资-提现'
        },
        xAxis: {
            categories: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00']
        },
        yAxis: {
            title: {
                text: '金额(元)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                // enableMouseTracking: false
            }
        },
        series: [{
            name: '投资金额',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }, {
            name: '提现金额',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }]
    }); 
	

	var my_tt_touzi=[];
	var my_tt_tixian=[];
	$.ajax({
        type: "post",
        url: tt_ajax_url,
        data: {
            'today':'today'
        },
        dataType: "json",
        success: function(data){

            for(var j=0;j<data.data.tender.length;j++){
            	my_tt_touzi.push(parseFloat(data.data.tender[j]));
            }

            for(var i=0;i<data.data.cash.length;i++){
            	my_tt_tixian.push(parseFloat(data.data.cash[i]));
            }
            tt_charts.series[0].setData(my_tt_touzi);//数据填充到highcharts上面
            tt_charts.series[1].setData(my_tt_tixian);//数据填充到highcharts上面
            // tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
        }
    });


	//今天
    $("#today_tt").click(function(){
        $('.choice_button_tt .button_tt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tt").val('none');
        
		var my_tt_touzi_ajax=[];
		var my_tt_tixian_ajax=[];
		$.ajax({
	        type: "post",
	        url: tt_ajax_url,
	        data: {
	            'today':'today'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tt_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.cash.length;i++){
	            	my_tt_tixian_ajax.push(parseFloat(data.data.cash[i]));
	            }
	            tt_charts.series[0].setData(my_tt_touzi_ajax);//数据填充到highcharts上面
	            tt_charts.series[1].setData(my_tt_tixian_ajax);//数据填充到highcharts上面
	            tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //昨天
    $("#yesterday_tt").click(function(){
        $('.choice_button_tt .button_tt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tt").val('none');
        
		var my_tt_touzi_ajax=[];
		var my_tt_tixian_ajax=[];
		$.ajax({
	        type: "post",
	        url: tt_ajax_url,
	        data: {
	            'yesterday':'yesterday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tt_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.cash.length;i++){
	            	my_tt_tixian_ajax.push(parseFloat(data.data.cash[i]));
	            }
	            tt_charts.series[0].setData(my_tt_touzi_ajax);//数据填充到highcharts上面
	            tt_charts.series[1].setData(my_tt_tixian_ajax);//数据填充到highcharts上面
	            tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近7天
    $("#sevenday_tt").click(function(){
        $('.choice_button_tt .button_tt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tt").val('none');
        
		var my_tt_touzi_ajax=[];
		var my_tt_tixian_ajax=[];
		$.ajax({
	        type: "post",
	        url: tt_ajax_url,
	        data: {
	            'sevenday':'sevenday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tt_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }
	            for(var i=0;i<data.data.cash.length;i++){
	            	my_tt_tixian_ajax.push(parseFloat(data.data.cash[i]));
	            }
	            tt_charts.series[0].setData(my_tt_touzi_ajax);//数据填充到highcharts上面
	            tt_charts.series[1].setData(my_tt_tixian_ajax);//数据填充到highcharts上面
	            tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近15天
    $("#fifteenday_tt").click(function(){
        $('.choice_button_tt .button_tt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tt").val('none');
        
        
		var my_tt_touzi_ajax=[];
		var my_tt_tixian_ajax=[];
		$.ajax({
	        type: "post",
	        url: tt_ajax_url,
	        data: {
	            'fifteenday':'fifteenday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tt_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.cash.length;i++){
	            	my_tt_tixian_ajax.push(parseFloat(data.data.cash[i]));
	            }
	            tt_charts.series[0].setData(my_tt_touzi_ajax);//数据填充到highcharts上面
	            tt_charts.series[1].setData(my_tt_tixian_ajax);//数据填充到highcharts上面
	            tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近30天
    $("#thirtyday_tt").click(function(){
        $('.choice_button_tt .button_tt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tt").val('none');
        
		var my_tt_touzi_ajax=[];
		var my_tt_tixian_ajax=[];
		$.ajax({
	        type: "post",
	        url: tt_ajax_url,
	        data: {
	            'thirtyday':'thirtyday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tt_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.cash.length;i++){
	            	my_tt_tixian_ajax.push(parseFloat(data.data.cash[i]));
	            }

	            tt_charts.series[0].setData(my_tt_touzi_ajax);//数据填充到highcharts上面
	            tt_charts.series[1].setData(my_tt_tixian_ajax);//数据填充到highcharts上面
	            tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });


    //选择年月
    $("#main_yearmonth_tt").change(function(){
        var tt_yearmonth=$("#main_yearmonth_tt").val();
        if(tt_yearmonth=="none"){
        	return false;
        }
        $('.choice_button_tt .button_tt').removeClass('cur');
        
        var my_tt_touzi_ajax=[];
		var my_tt_tixian_ajax=[];
		$.ajax({
	        type: "post",
	        url: tt_ajax_url,
	        data: {
	            'yearmonth':tt_yearmonth
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tt_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.cash.length;i++){
	            	my_tt_tixian_ajax.push(parseFloat(data.data.cash[i]));
	            }

	            tt_charts.series[0].setData(my_tt_touzi_ajax);//数据填充到highcharts上面
	            tt_charts.series[1].setData(my_tt_tixian_ajax);//数据填充到highcharts上面
	            tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //日历筛选
    $('#do_choice_tt').click(function(){

        $('.choice_button_tt .button_tt').removeClass('cur');
        $("#main_yearmonth_tt").val('none');

        var start_date_tt=$('#start_date_tt').val();
        var end_date_tt=$('#end_date_tt').val();
        
        var my_tt_touzi_ajax=[];
		var my_tt_tixian_ajax=[];
        $.ajax({
            type: "post",
            url: tt_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_tt,
                'end_date':end_date_tt
            },
            dataType: "json",
            success: function(data){

                for(var j=0;j<data.data.tender.length;j++){
	            	my_tt_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.cash.length;i++){
	            	my_tt_tixian_ajax.push(parseFloat(data.data.cash[i]));
	            }

	            tt_charts.series[0].setData(my_tt_touzi_ajax);//数据填充到highcharts上面
	            tt_charts.series[1].setData(my_tt_tixian_ajax);//数据填充到highcharts上面
	            tt_charts.xAxis[0].setCategories(data.data.categories);//X轴
            }
        });

    });

});