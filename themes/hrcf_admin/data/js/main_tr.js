;$(function () {

    laydate({
        elem: '#start_date_tr'
    });

    laydate({
        elem: '#end_date_tr'
    });

	var tr_ajax_url="/?hradmin&q=code/data/main&action=tr_ajax";


	var tr_one=$('#tr_one').val();
        var tr_three=$('#tr_three').val();
        var tr_six=$('#tr_six').val();
        var tr_year=$('#tr_year').val();
        var tr_firstone=$('#tr_firstone').val();
        var tr_yfanyear=$('#tr_yfanyear').val();
        var tr_twoyear=$('#tr_twoyear').val();
        var tr_yfantwoyear=$('#tr_yfantwoyear').val();
        var tr_threeyear=$('#tr_threeyear').val();
        var tr_yfanthreeyear=$('#tr_yfanthreeyear').val();
        var tr_sanbiao=$('#tr_sanbiao').val();
        var tr_one_temp=parseFloat(tr_one);
        var tr_three_temp=parseFloat(tr_three);
        var tr_six_temp=parseFloat(tr_six);
        var tr_year_temp=parseFloat(tr_year);
        var tr_firstone_temp=parseFloat(tr_firstone);
        var tr_yfanyear_temp=parseFloat(tr_yfanyear);
        var tr_twoyear_temp=parseFloat(tr_twoyear);
        var tr_yfantwoyear_temp=parseFloat(tr_yfantwoyear);
        var tr_threeyear_temp=parseFloat(tr_threeyear);
        var tr_yfanthreeyear_temp=parseFloat(tr_yfanthreeyear);
        var tr_sanbiao_temp=parseFloat(tr_sanbiao);
        var tr_mydata=[['微+宝', tr_one_temp],['微+1', tr_firstone_temp],['微+3', tr_three_temp],['微+6', tr_six_temp],['微年利', tr_year_temp],['微月盈', tr_yfanyear_temp],['微年利II', tr_twoyear_temp],['微月盈II', tr_yfantwoyear_temp],['微年利III', tr_threeyear_temp],['微月盈III', tr_yfanthreeyear_temp],['散标', tr_sanbiao_temp]];

        var tr_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_tr",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '投资人数统计'
        },
        // subtitle: {
        //     text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        // },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -0,
                style: {
                    fontSize: '16px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '投资人数'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: ' <b>{point.y} 人</b>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.3,
                borderWidth: 0,
            }
        },
        series: [{
            name: '投资',
            colorByPoint: true,
            data: [
                ['微+宝', 0],
                ['微+1', 0],
                ['微+3', 0],
                ['微+6', 0],
                ['微年利', 0],
                ['微月盈', 0],
                ['微年利II', 0],
                ['微月盈II', 0],
                ['微年利III', 0],
                ['微月盈III', 0],
                ['散标', 0],
            ],
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#FFFFFF',
                //align: 'right',
                format: '{point.y}', // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    }); 

    tr_charts.series[0].setData(tr_mydata);//数据填充到highcharts上面


    //全部
    $("#all_tr").click(function(){
        $('.choice_button_tr .button_tr').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tr").val('none');
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'all':'all'
            },
            dataType: "json",
            success: function(data){
                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//昨天
    $("#yesterday_tr").click(function(){
        $('.choice_button_tr .button_tr').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tr").val('none');
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //今天
    $("#today_tr").click(function(){
        $('.choice_button_tr .button_tr').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tr").val('none');
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近7天
    $("#sevenday_tr").click(function(){
        $('.choice_button_tr .button_tr').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tr").val('none');
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	
	//最近15天
    $("#fifteenday_tr").click(function(){
        $('.choice_button_tr .button_tr').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tr").val('none');
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近30天
    $("#thirtyday_tr").click(function(){
        $('.choice_button_tr .button_tr').removeClass('cur');
        $(this).addClass('cur');

        $("#main_yearmonth_tr").val('none');
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //选择年月
    $("#main_yearmonth_tr").change(function(){
        var tr_yearmonth=$("#main_yearmonth_tr").val();
        if(tr_yearmonth=="none"){
            return false;
        }
        $('.choice_button_tr .button_tr').removeClass('cur');
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'yearmonth':tr_yearmonth
            },
            dataType: "json",
            success: function(data){
                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //日历筛选
    $('#do_choice_tr').click(function(){

        $('.choice_button_tr .button_tr').removeClass('cur');
        $("#main_yearmonth_tr").val('none');

        var start_date_tr=$('#start_date_tr').val();
        var end_date_tr=$('#end_date_tr').val();
        
        var tr_one_ajax;
        var tr_three_ajax;
        var tr_six_ajax;
        var tr_year_ajax;
        var tr_firstone_ajax;
        var tr_yfanyear_ajax;
        var tr_twoyear_ajax;
        var tr_yfantwoyear_ajax;
        var tr_threeyear_ajax;
        var tr_yfanthreeyear_ajax;
        var tr_sanbiao_ajax;
        var tr_one_ajax_temp;
        var tr_three_ajax_temp;
        var tr_six_ajax_temp;
        var tr_year_ajax_temp;
        var tr_firstone_ajax_temp;
        var tr_yfanyear_ajax_temp;
        var tr_twoyear_ajax_temp;
        var tr_yfantwoyear_ajax_temp;
        var tr_threeyear_ajax_temp;
        var tr_yfanthreeyear_ajax_temp;
        var tr_sanbiao_ajax_temp;
        var tr_mydata_ajax;
        
        $.ajax({
            type: "post",
            url: tr_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_tr,
                'end_date':end_date_tr
            },
            dataType: "json",
            success: function(data){

                tr_one_ajax=data.data.sum_one;
                tr_three_ajax=data.data.sum_three;
                tr_six_ajax=data.data.sum_six;
                tr_year_ajax=data.data.sum_year;
                tr_firstone_ajax=data.data.sum_firstone;
                tr_yfanyear_ajax=data.data.sum_yfanyear;
                tr_twoyear_ajax=data.data.sum_twoyear;
                tr_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tr_threeyear_ajax=data.data.sum_threeyear;
                tr_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tr_sanbiao_ajax=data.data.sum_sanbiao;
                tr_one_ajax_temp=parseFloat(tr_one_ajax);
                tr_three_ajax_temp=parseFloat(tr_three_ajax);
                tr_six_ajax_temp=parseFloat(tr_six_ajax);
                tr_year_ajax_temp=parseFloat(tr_year_ajax);
                tr_firstone_ajax_temp=parseFloat(tr_firstone_ajax);
                tr_yfanyear_ajax_temp=parseFloat(tr_yfanyear_ajax);
                tr_twoyear_ajax_temp=parseFloat(tr_twoyear_ajax);
                tr_yfantwoyear_ajax_temp=parseFloat(tr_yfantwoyear_ajax);
                tr_threeyear_ajax_temp=parseFloat(tr_threeyear_ajax);
                tr_yfanthreeyear_ajax_temp=parseFloat(tr_yfanthreeyear_ajax);
                tr_sanbiao_ajax_temp=parseFloat(tr_sanbiao_ajax);

                tr_mydata_ajax=[['微+宝', tr_one_ajax_temp],['微+1', tr_firstone_ajax_temp],['微+3', tr_three_ajax_temp],['微+6', tr_six_ajax_temp],['微年利', tr_year_ajax_temp],['微月盈', tr_yfanyear_ajax_temp],['微年利II', tr_twoyear_ajax_temp],['微月盈II', tr_yfantwoyear_ajax_temp],['微年利III', tr_threeyear_ajax_temp],['微月盈III', tr_yfanthreeyear_ajax_temp],['散标', tr_sanbiao_ajax_temp]];
                tr_charts.series[0].setData(tr_mydata_ajax);//数据填充到highcharts上面

            }
        });

    });

});