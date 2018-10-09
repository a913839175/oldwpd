;$(function () {

    laydate({
        elem: '#start_date_tz'
    });

    laydate({
        elem: '#end_date_tz'
    });

	var tz_ajax_url="/?hradmin&q=code/data/main&action=tz_ajax";


	var tz_one=$('#tz_one').val();
        var tz_three=$('#tz_three').val();
        var tz_six=$('#tz_six').val();
        var tz_year=$('#tz_year').val();
        var tz_firstone=$('#tz_firstone').val();
        var tz_yfanyear=$('#tz_yfanyear').val();
        var tz_twoyear=$('#tz_twoyear').val();
        var tz_yfantwoyear=$('#tz_yfantwoyear').val();
        var tz_threeyear=$('#tz_threeyear').val();
        var tz_yfanthreeyear=$('#tz_yfanthreeyear').val();
        var tz_sanbiao=$('#tz_sanbiao').val();
        var tz_one_temp=parseFloat(tz_one);
        var tz_three_temp=parseFloat(tz_three);
        var tz_six_temp=parseFloat(tz_six);
        var tz_year_temp=parseFloat(tz_year);
        var tz_firstone_temp=parseFloat(tz_firstone);
        var tz_yfanyear_temp=parseFloat(tz_yfanyear);
        var tz_twoyear_temp=parseFloat(tz_twoyear);
        var tz_yfantwoyear_temp=parseFloat(tz_yfantwoyear);
        var tz_threeyear_temp=parseFloat(tz_threeyear);
        var tz_yfanthreeyear_temp=parseFloat(tz_yfanthreeyear);
        var tz_sanbiao_temp=parseFloat(tz_sanbiao);
        var tz_mydata=[['微+宝', tz_one_temp],['微+1', tz_firstone_temp],['微+3', tz_three_temp],['微+6', tz_six_temp],['微年利', tz_year_temp],['微月盈', tz_yfanyear_temp],['微年利II', tz_twoyear_temp],['微月盈II', tz_yfantwoyear_temp],['微年利III', tz_threeyear_temp],['微月盈III', tz_yfanthreeyear_temp],['散标', tz_sanbiao_temp]];

        var tz_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_tz",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '投资数据统计'
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
                text: '投资金额 (元)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: ' <b>{point.y:.2f} 元</b>'
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
                format: '{point.y:.2f}', // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    }); 

    tz_charts.series[0].setData(tz_mydata);//数据填充到highcharts上面


    //全部
    $("#all_tz").click(function(){
        $('.choice_button_tz .button_tz').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tz").val('none');
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'all':'all'
            },
            dataType: "json",
            success: function(data){
                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//昨天
    $("#yesterday_tz").click(function(){
        $('.choice_button_tz .button_tz').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tz").val('none');
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //今天
    $("#today_tz").click(function(){
        $('.choice_button_tz .button_tz').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tz").val('none');
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近7天
    $("#sevenday_tz").click(function(){
        $('.choice_button_tz .button_tz').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tz").val('none');
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	
	//最近15天
    $("#fifteenday_tz").click(function(){
        $('.choice_button_tz .button_tz').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tz").val('none');
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近30天
    $("#thirtyday_tz").click(function(){
        $('.choice_button_tz .button_tz').removeClass('cur');
        $(this).addClass('cur');

        $("#main_yearmonth_tz").val('none');
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //选择年月
    $("#main_yearmonth_tz").change(function(){
        var tz_yearmonth=$("#main_yearmonth_tz").val();
        if(tz_yearmonth=="none"){
            return false;
        }
        $('.choice_button_tz .button_tz').removeClass('cur');
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'yearmonth':tz_yearmonth
            },
            dataType: "json",
            success: function(data){
                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //日历筛选
    $('#do_choice_tz').click(function(){

        $('.choice_button_tz .button_tz').removeClass('cur');
        $("#main_yearmonth_tz").val('none');

        var start_date_tz=$('#start_date_tz').val();
        var end_date_tz=$('#end_date_tz').val();
        
        var tz_one_ajax;
        var tz_three_ajax;
        var tz_six_ajax;
        var tz_year_ajax;
        var tz_firstone_ajax;
        var tz_yfanyear_ajax;
        var tz_twoyear_ajax;
        var tz_yfantwoyear_ajax;
        var tz_threeyear_ajax;
        var tz_yfanthreeyear_ajax;
        var tz_sanbiao_ajax;
        var tz_one_ajax_temp;
        var tz_three_ajax_temp;
        var tz_six_ajax_temp;
        var tz_year_ajax_temp;
        var tz_firstone_ajax_temp;
        var tz_yfanyear_ajax_temp;
        var tz_twoyear_ajax_temp;
        var tz_yfantwoyear_ajax_temp;
        var tz_threeyear_ajax_temp;
        var tz_yfanthreeyear_ajax_temp;
        var tz_sanbiao_ajax_temp;
        var tz_mydata_ajax;
        
        $.ajax({
            type: "post",
            url: tz_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_tz,
                'end_date':end_date_tz
            },
            dataType: "json",
            success: function(data){

                tz_one_ajax=data.data.sum_one;
                tz_three_ajax=data.data.sum_three;
                tz_six_ajax=data.data.sum_six;
                tz_year_ajax=data.data.sum_year;
                tz_firstone_ajax=data.data.sum_firstone;
                tz_yfanyear_ajax=data.data.sum_yfanyear;
                tz_twoyear_ajax=data.data.sum_twoyear;
                tz_yfantwoyear_ajax=data.data.sum_yfantwoyear;
                tz_threeyear_ajax=data.data.sum_threeyear;
                tz_yfanthreeyear_ajax=data.data.sum_yfanthreeyear;
                tz_sanbiao_ajax=data.data.sum_sanbiao;
                tz_one_ajax_temp=parseFloat(tz_one_ajax);
                tz_three_ajax_temp=parseFloat(tz_three_ajax);
                tz_six_ajax_temp=parseFloat(tz_six_ajax);
                tz_year_ajax_temp=parseFloat(tz_year_ajax);
                tz_firstone_ajax_temp=parseFloat(tz_firstone_ajax);
                tz_yfanyear_ajax_temp=parseFloat(tz_yfanyear_ajax);
                tz_twoyear_ajax_temp=parseFloat(tz_twoyear_ajax);
                tz_yfantwoyear_ajax_temp=parseFloat(tz_yfantwoyear_ajax);
                tz_threeyear_ajax_temp=parseFloat(tz_threeyear_ajax);
                tz_yfanthreeyear_ajax_temp=parseFloat(tz_yfanthreeyear_ajax);
                tz_sanbiao_ajax_temp=parseFloat(tz_sanbiao_ajax);

                tz_mydata_ajax=[['微+宝', tz_one_ajax_temp],['微+1', tz_firstone_ajax_temp],['微+3', tz_three_ajax_temp],['微+6', tz_six_ajax_temp],['微年利', tz_year_ajax_temp],['微月盈', tz_yfanyear_ajax_temp],['微年利II', tz_twoyear_ajax_temp],['微月盈II', tz_yfantwoyear_ajax_temp],['微年利III', tz_threeyear_ajax_temp],['微月盈III', tz_yfanthreeyear_ajax_temp],['散标', tz_sanbiao_ajax_temp]];
                tz_charts.series[0].setData(tz_mydata_ajax);//数据填充到highcharts上面
            }
        });

    });

});