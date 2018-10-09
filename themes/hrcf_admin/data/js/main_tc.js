;$(function () {

	laydate({
        elem: '#start_date_tc'
    });

    laydate({
        elem: '#end_date_tc'
    });

	var tc_ajax_url="/?hradmin&q=code/data/main&action=tc_ajax";

	var tc_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_tc",  // 注意这里一定是 ID 选择器
            type: 'line'
        },
        title: {
            text: '投资-充值'
        },
        subtitle: {
            // text: '投资-充值'
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
            name: '充值金额',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }]
    }); 
	

	var my_tc_touzi=[];
	var my_tc_chongzhi=[];
	$.ajax({
        type: "post",
        url: tc_ajax_url,
        data: {
            'today':'today'
        },
        dataType: "json",
        success: function(data){

            for(var j=0;j<data.data.tender.length;j++){
            	my_tc_touzi.push(parseFloat(data.data.tender[j]));
            }

            for(var i=0;i<data.data.charge.length;i++){
            	my_tc_chongzhi.push(parseFloat(data.data.charge[i]));
            }
            tc_charts.series[0].setData(my_tc_touzi);//数据填充到highcharts上面
            tc_charts.series[1].setData(my_tc_chongzhi);//数据填充到highcharts上面
            // tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
        }
    });


	//今天
    $("#today_tc").click(function(){
        $('.choice_button_tc .button_tc').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tc").val('none');
        
		var my_tc_touzi_ajax=[];
		var my_tc_chongzhi_ajax=[];
		$.ajax({
	        type: "post",
	        url: tc_ajax_url,
	        data: {
	            'today':'today'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tc_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.charge.length;i++){
	            	my_tc_chongzhi_ajax.push(parseFloat(data.data.charge[i]));
	            }
	            tc_charts.series[0].setData(my_tc_touzi_ajax);//数据填充到highcharts上面
	            tc_charts.series[1].setData(my_tc_chongzhi_ajax);//数据填充到highcharts上面
	            tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //昨天
    $("#yesterday_tc").click(function(){
        $('.choice_button_tc .button_tc').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tc").val('none');
        
		var my_tc_touzi_ajax=[];
		var my_tc_chongzhi_ajax=[];
		$.ajax({
	        type: "post",
	        url: tc_ajax_url,
	        data: {
	            'yesterday':'yesterday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tc_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.charge.length;i++){
	            	my_tc_chongzhi_ajax.push(parseFloat(data.data.charge[i]));
	            }
	            tc_charts.series[0].setData(my_tc_touzi_ajax);//数据填充到highcharts上面
	            tc_charts.series[1].setData(my_tc_chongzhi_ajax);//数据填充到highcharts上面
	            tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近7天
    $("#sevenday_tc").click(function(){
        $('.choice_button_tc .button_tc').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tc").val('none');
        
		var my_tc_touzi_ajax=[];
		var my_tc_chongzhi_ajax=[];
		$.ajax({
	        type: "post",
	        url: tc_ajax_url,
	        data: {
	            'sevenday':'sevenday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tc_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }
	            for(var i=0;i<data.data.charge.length;i++){
	            	my_tc_chongzhi_ajax.push(parseFloat(data.data.charge[i]));
	            }
	            tc_charts.series[0].setData(my_tc_touzi_ajax);//数据填充到highcharts上面
	            tc_charts.series[1].setData(my_tc_chongzhi_ajax);//数据填充到highcharts上面
	            tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近15天
    $("#fifteenday_tc").click(function(){
        $('.choice_button_tc .button_tc').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tc").val('none');
        
        
		var my_tc_touzi_ajax=[];
		var my_tc_chongzhi_ajax=[];
		$.ajax({
	        type: "post",
	        url: tc_ajax_url,
	        data: {
	            'fifteenday':'fifteenday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tc_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.charge.length;i++){
	            	my_tc_chongzhi_ajax.push(parseFloat(data.data.charge[i]));
	            }
	            tc_charts.series[0].setData(my_tc_touzi_ajax);//数据填充到highcharts上面
	            tc_charts.series[1].setData(my_tc_chongzhi_ajax);//数据填充到highcharts上面
	            tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近30天
    $("#thirtyday_tc").click(function(){
        $('.choice_button_tc .button_tc').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tc").val('none');
        
		var my_tc_touzi_ajax=[];
		var my_tc_chongzhi_ajax=[];
		$.ajax({
	        type: "post",
	        url: tc_ajax_url,
	        data: {
	            'thirtyday':'thirtyday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tc_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.charge.length;i++){
	            	my_tc_chongzhi_ajax.push(parseFloat(data.data.charge[i]));
	            }

	            tc_charts.series[0].setData(my_tc_touzi_ajax);//数据填充到highcharts上面
	            tc_charts.series[1].setData(my_tc_chongzhi_ajax);//数据填充到highcharts上面
	            tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });


    //选择年月
    $("#main_yearmonth_tc").change(function(){
        var tc_yearmonth=$("#main_yearmonth_tc").val();
        if(tc_yearmonth=="none"){
        	return false;
        }
        $('.choice_button_tc .button_tc').removeClass('cur');
        
        var my_tc_touzi_ajax=[];
		var my_tc_chongzhi_ajax=[];
		$.ajax({
	        type: "post",
	        url: tc_ajax_url,
	        data: {
	            'yearmonth':tc_yearmonth
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tc_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.charge.length;i++){
	            	my_tc_chongzhi_ajax.push(parseFloat(data.data.charge[i]));
	            }

	            tc_charts.series[0].setData(my_tc_touzi_ajax);//数据填充到highcharts上面
	            tc_charts.series[1].setData(my_tc_chongzhi_ajax);//数据填充到highcharts上面
	            tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });


    //日历筛选
    $('#do_choice_tc').click(function(){

        $('.choice_button_tc .button_tc').removeClass('cur');
        $("#main_yearmonth_tc").val('none');

        var start_date_tc=$('#start_date_tc').val();
        var end_date_tc=$('#end_date_tc').val();
        
        var my_tc_touzi_ajax=[];
		var my_tc_chongzhi_ajax=[];

		$.ajax({
	        type: "post",
	        url: tc_ajax_url,
	        data: {
	            'date':'date',
	            'start_date':start_date_tc,
	            'end_date':end_date_tc
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_tc_touzi_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            for(var i=0;i<data.data.charge.length;i++){
	            	my_tc_chongzhi_ajax.push(parseFloat(data.data.charge[i]));
	            }

	            tc_charts.series[0].setData(my_tc_touzi_ajax);//数据填充到highcharts上面
	            tc_charts.series[1].setData(my_tc_chongzhi_ajax);//数据填充到highcharts上面
	            tc_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });

    });

});