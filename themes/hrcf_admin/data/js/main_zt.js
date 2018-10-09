;$(function () {

	laydate({
        elem: '#start_date_zt'
    });

    laydate({
        elem: '#end_date_zt'
    });


	var zt_ajax_url="/?hradmin&q=code/data/main&action=zt_ajax";

	var zt_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_zt",  // 注意这里一定是 ID 选择器
            type: 'line'
        },
        title: {
            text: '注册-投资'
        },
        subtitle: {
            // text: '注册-投资'
        },
        xAxis: {
            categories: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00']
        },
        yAxis: {
            title: {
                text: '人数'
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
            name: '注册人数',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }, {
            name: '投资人数',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }]
    }); 
	

	var my_zt_zhuce=[];
	var my_zt_touzi=[];
	$.ajax({
        type: "post",
        url: zt_ajax_url,
        data: {
            'today':'today'
        },
        dataType: "json",
        success: function(data){

            for(var i=0;i<data.data.register.length;i++){
            	my_zt_zhuce.push(parseInt(data.data.register[i]));
            }

            for(var j=0;j<data.data.tender.length;j++){
            	my_zt_touzi.push(parseInt(data.data.tender[j]));
            }
            zt_charts.series[0].setData(my_zt_zhuce);//数据填充到highcharts上面
            zt_charts.series[1].setData(my_zt_touzi);//数据填充到highcharts上面
            // zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
        }
    });



	//今天
    $("#today_zt").click(function(){
        $('.choice_button_zt .button_zt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_zt").val('none');
        
        var my_zt_zhuce_ajax=[];
		var my_zt_touzi_ajax=[];
		$.ajax({
	        type: "post",
	        url: zt_ajax_url,
	        data: {
	            'today':'today'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var i=0;i<data.data.register.length;i++){
	            	my_zt_zhuce_ajax.push(parseInt(data.data.register[i]));
	            }

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_zt_touzi_ajax.push(parseInt(data.data.tender[j]));
	            }
	            zt_charts.series[0].setData(my_zt_zhuce_ajax);//数据填充到highcharts上面
	            zt_charts.series[1].setData(my_zt_touzi_ajax);//数据填充到highcharts上面
	            zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });



    //昨天
    $("#yesterday_zt").click(function(){
        $('.choice_button_zt .button_zt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_zt").val('none');
        
        var my_zt_zhuce_ajax=[];
		var my_zt_touzi_ajax=[];
		$.ajax({
	        type: "post",
	        url: zt_ajax_url,
	        data: {
	            'yesterday':'yesterday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var i=0;i<data.data.register.length;i++){
	            	my_zt_zhuce_ajax.push(parseInt(data.data.register[i]));
	            }

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_zt_touzi_ajax.push(parseInt(data.data.tender[j]));
	            }
	            zt_charts.series[0].setData(my_zt_zhuce_ajax);//数据填充到highcharts上面
	            zt_charts.series[1].setData(my_zt_touzi_ajax);//数据填充到highcharts上面
	            zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近7天
    $("#sevenday_zt").click(function(){
        $('.choice_button_zt .button_zt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_zt").val('none');
        
        var my_zt_zhuce_ajax=[];
		var my_zt_touzi_ajax=[];
		$.ajax({
	        type: "post",
	        url: zt_ajax_url,
	        data: {
	            'sevenday':'sevenday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var i=0;i<data.data.register.length;i++){
	            	my_zt_zhuce_ajax.push(parseInt(data.data.register[i]));
	            }

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_zt_touzi_ajax.push(parseInt(data.data.tender[j]));
	            }
	            zt_charts.series[0].setData(my_zt_zhuce_ajax);//数据填充到highcharts上面
	            zt_charts.series[1].setData(my_zt_touzi_ajax);//数据填充到highcharts上面
	            zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近15天
    $("#fifteenday_zt").click(function(){
        $('.choice_button_zt .button_zt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_zt").val('none');
        
        var my_zt_zhuce_ajax=[];
		var my_zt_touzi_ajax=[];
		$.ajax({
	        type: "post",
	        url: zt_ajax_url,
	        data: {
	            'fifteenday':'fifteenday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var i=0;i<data.data.register.length;i++){
	            	my_zt_zhuce_ajax.push(parseInt(data.data.register[i]));
	            }

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_zt_touzi_ajax.push(parseInt(data.data.tender[j]));
	            }
	            zt_charts.series[0].setData(my_zt_zhuce_ajax);//数据填充到highcharts上面
	            zt_charts.series[1].setData(my_zt_touzi_ajax);//数据填充到highcharts上面
	            zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

    //最近30天
    $("#thirtyday_zt").click(function(){
        $('.choice_button_zt .button_zt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_zt").val('none');
        
        var my_zt_zhuce_ajax=[];
		var my_zt_touzi_ajax=[];
		$.ajax({
	        type: "post",
	        url: zt_ajax_url,
	        data: {
	            'thirtyday':'thirtyday'
	        },
	        dataType: "json",
	        success: function(data){

	            for(var i=0;i<data.data.register.length;i++){
	            	my_zt_zhuce_ajax.push(parseInt(data.data.register[i]));
	            }

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_zt_touzi_ajax.push(parseInt(data.data.tender[j]));
	            }
	            zt_charts.series[0].setData(my_zt_zhuce_ajax);//数据填充到highcharts上面
	            zt_charts.series[1].setData(my_zt_touzi_ajax);//数据填充到highcharts上面
	            zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });


    //选择年月
    $("#main_yearmonth_zt").change(function(){
        var zt_yearmonth=$("#main_yearmonth_zt").val();
        if(zt_yearmonth=="none"){
        	return false;
        }
        $('.choice_button_zt .button_zt').removeClass('cur');
        
        var my_zt_zhuce_ajax=[];
		var my_zt_touzi_ajax=[];
		$.ajax({
	        type: "post",
	        url: zt_ajax_url,
	        data: {
	            'yearmonth':zt_yearmonth
	        },
	        dataType: "json",
	        success: function(data){

	            for(var i=0;i<data.data.register.length;i++){
	            	my_zt_zhuce_ajax.push(parseInt(data.data.register[i]));
	            }

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_zt_touzi_ajax.push(parseInt(data.data.tender[j]));
	            }
	            zt_charts.series[0].setData(my_zt_zhuce_ajax);//数据填充到highcharts上面
	            zt_charts.series[1].setData(my_zt_touzi_ajax);//数据填充到highcharts上面
	            zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });


    //日历筛选
    $('#do_choice_zt').click(function(){

        $('.choice_button_zt .button_zt').removeClass('cur');
        $("#main_yearmonth_zt").val('none');

        var start_date_zt=$('#start_date_zt').val();
        var end_date_zt=$('#end_date_zt').val();
        
        var my_zt_zhuce_ajax=[];
		var my_zt_touzi_ajax=[];
		$.ajax({
	        type: "post",
	        url: zt_ajax_url,
	        data: {
	            'date':'date',
	            'start_date':start_date_zt,
	            'end_date':end_date_zt
	        },
	        dataType: "json",
	        success: function(data){

	            for(var i=0;i<data.data.register.length;i++){
	            	my_zt_zhuce_ajax.push(parseInt(data.data.register[i]));
	            }

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_zt_touzi_ajax.push(parseInt(data.data.tender[j]));
	            }
	            zt_charts.series[0].setData(my_zt_zhuce_ajax);//数据填充到highcharts上面
	            zt_charts.series[1].setData(my_zt_touzi_ajax);//数据填充到highcharts上面
	            zt_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });

    });


});