;$(function () {

    laydate({
        elem: '#start_date_sb'
    });

    laydate({
        elem: '#end_date_sb'
    });

	var sb_ajax_url="/?hradmin&q=code/data/main&action=sb_ajax";


	var sb_one=$('#sb_one').val();
        var sb_three=$('#sb_three').val();
        var sb_six=$('#sb_six').val();
        var sb_year=$('#sb_year').val();
        var sb_firstone=$('#sb_firstone').val();
        var sb_yfanyear=$('#sb_yfanyear').val();
        var sb_twoyear=$('#sb_twoyear').val();
        var sb_yfantwoyear=$('#sb_yfantwoyear').val();
        var sb_threeyear=$('#sb_threeyear').val();
        var sb_yfanthreeyear=$('#sb_yfanthreeyear').val();
        var sb_sanbiao=$('#sb_sanbiao').val();
        var sb_one_temp=parseFloat(sb_one);
        var sb_three_temp=parseFloat(sb_three);
        var sb_six_temp=parseFloat(sb_six);
        var sb_year_temp=parseFloat(sb_year);
        var sb_firstone_temp=parseFloat(sb_firstone);
        var sb_yfanyear_temp=parseFloat(sb_yfanyear);
        var sb_twoyear_temp=parseFloat(sb_twoyear);
        var sb_yfantwoyear_temp=parseFloat(sb_yfantwoyear);
        var sb_threeyear_temp=parseFloat(sb_threeyear);
        var sb_yfanthreeyear_temp=parseFloat(sb_yfanthreeyear);
        var sb_sanbiao_temp=parseFloat(sb_sanbiao);
        var sb_mydata=[['微+宝', sb_one_temp],['微+1', sb_firstone_temp],['微+3', sb_three_temp],['微+6', sb_six_temp],['微年利', sb_year_temp],['微月盈', sb_yfanyear_temp],['微年利II', sb_twoyear_temp],['微月盈II', sb_yfantwoyear_temp],['微年利III', sb_threeyear_temp],['微月盈III', sb_yfanthreeyear_temp],['散标', sb_sanbiao_temp]];

        var sb_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_sb",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '赎回数据统计'
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
                text: '赎回笔数'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: ' <b>{point.y} 笔</b>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.3,
                borderWidth: 0,
            }
        },
        series: [{
            name: '赎回',
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

    sb_charts.series[0].setData(sb_mydata);//数据填充到highcharts上面


    //全部
    $("#all_sb").click(function(){
        $('.choice_button_sb .button_sb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sb").val('none');
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'all':'all'
            },
            dataType: "json",
            success: function(data){
                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//昨天
    $("#yesterday_sb").click(function(){
        $('.choice_button_sb .button_sb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sb").val('none');
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //今天
    $("#today_sb").click(function(){
        $('.choice_button_sb .button_sb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sb").val('none');
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近7天
    $("#sevenday_sb").click(function(){
        $('.choice_button_sb .button_sb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sb").val('none');
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	
	//最近15天
    $("#fifteenday_sb").click(function(){
        $('.choice_button_sb .button_sb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sb").val('none');
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近30天
    $("#thirtyday_sb").click(function(){
        $('.choice_button_sb .button_sb').removeClass('cur');
        $(this).addClass('cur');

        $("#main_yearmonth_sb").val('none');
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //选择年月
    $("#main_yearmonth_sb").change(function(){
        var sb_yearmonth=$("#main_yearmonth_sb").val();
        if(sb_yearmonth=="none"){
            return false;
        }
        $('.choice_button_sb .button_sb').removeClass('cur');
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'yearmonth':sb_yearmonth
            },
            dataType: "json",
            success: function(data){
                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //日历筛选
    $('#do_choice_sb').click(function(){

        $('.choice_button_sb .button_sb').removeClass('cur');
        $("#main_yearmonth_sb").val('none');

        var start_date_sb=$('#start_date_sb').val();
        var end_date_sb=$('#end_date_sb').val();
        
        var sb_one_ajax;
        var sb_three_ajax;
        var sb_six_ajax;
        var sb_year_ajax;
        var sb_firstone_ajax;
        var sb_yfanyear_ajax;
        var sb_twoyear_ajax;
        var sb_yfantwoyear_ajax;
        var sb_threeyear_ajax;
        var sb_yfanthreeyear_ajax;
        var sb_sanbiao_ajax;
        var sb_one_ajax_temp;
        var sb_three_ajax_temp;
        var sb_six_ajax_temp;
        var sb_year_ajax_temp;
        var sb_firstone_ajax_temp;
        var sb_yfanyear_ajax_temp;
        var sb_twoyear_ajax_temp;
        var sb_yfantwoyear_ajax_temp;
        var sb_threeyear_ajax_temp;
        var sb_yfanthreeyear_ajax_temp;
        var sb_sanbiao_ajax_temp;
        var sb_mydata_ajax;
        
        $.ajax({
            type: "post",
            url: sb_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_sb,
                'end_date':end_date_sb
            },
            dataType: "json",
            success: function(data){

                sb_one_ajax=data.data.sum_one;
                sb_three_ajax=data.data.sum_three;
                sb_six_ajax=data.data.sum_six;
                sb_year_ajax=data.data.sum_year;
                sb_firstone_ajax=data.data.sum_firstone;
                sb_yfanyear_ajax=data.data.sum_yfanyear;
                sb_twoyear_ajax=data.data.sum_twoyear;
                sb_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                sb_threeyear_ajax=data.data.sum_threeyear;
                sb_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                sb_sanbiao_ajax=data.data.sum_sanbiao;
                sb_one_ajax_temp=parseFloat(sb_one_ajax);
                sb_three_ajax_temp=parseFloat(sb_three_ajax);
                sb_six_ajax_temp=parseFloat(sb_six_ajax);
                sb_year_ajax_temp=parseFloat(sb_year_ajax);
                sb_firstone_ajax_temp=parseFloat(sb_firstone_ajax);
                sb_yfanyear_ajax_temp=parseFloat(sb_yfanyear_ajax);
                sb_twoyear_ajax_temp=parseFloat(sb_twoyear_ajax);
                sb_yfantwoyear_ajax_temp=parseFloat(sb_yfantwoyear_ajax);
                sb_threeyear_ajax_temp=parseFloat(sb_threeyear_ajax);
                sb_yfanthreeyear_ajax_temp=parseFloat(sb_yfanthreeyear_ajax);
                sb_sanbiao_ajax_temp=parseFloat(sb_sanbiao_ajax);

                sb_mydata_ajax=[['微+宝', sb_one_ajax_temp],['微+1', sb_firstone_ajax_temp],['微+3', sb_three_ajax_temp],['微+6', sb_six_ajax_temp],['微年利', sb_year_ajax_temp],['微月盈', sb_yfanyear_ajax_temp],['微年利II', sb_twoyear_ajax_temp],['微月盈II', sb_yfantwoyear_ajax_temp],['微年利III', sb_threeyear_ajax_temp],['微月盈III', sb_yfanthreeyear_ajax_temp],['散标', sb_sanbiao_ajax_temp]];
                sb_charts.series[0].setData(sb_mydata_ajax);//数据填充到highcharts上面

            }
        });

    });

});