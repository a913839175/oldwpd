;$(function () {

    laydate({
        elem: '#start_date_ud'
    });

    laydate({
        elem: '#end_date_ud'
    });

	var ud_ajax_url="/?hradmin&q=code/data/main&action=ud_ajax";


        var ud_one_down=$('#ud_one_down').val();
        var ud_one_up=$('#ud_one_up').val();

        var ud_three_down=$('#ud_three_down').val();
        var ud_three_up=$('#ud_three_up').val();

        var ud_six_down=$('#ud_six_down').val();
        var ud_six_up=$('#ud_six_up').val();

        var ud_year_down=$('#ud_year_down').val();
        var ud_year_up=$('#ud_year_up').val();

        var ud_firstone_down=$('#ud_firstone_down').val();
        var ud_firstone_up=$('#ud_firstone_up').val();

        var ud_yfanyear_down=$('#ud_yfanyear_down').val();
        var ud_yfanyear_up=$('#ud_yfanyear_up').val();

        var ud_twoyear_down=$('#ud_twoyear_down').val();
        var ud_twoyear_up=$('#ud_twoyear_up').val();
        
        var ud_yfantwoyear_down=$('#ud_yfantwoyear_down').val();
        var ud_yfantwoyear_up=$('#ud_yfantwoyear_up').val();
        
        var ud_threeyear_down=$('#ud_threeyear_down').val();
        var ud_threeyear_up=$('#ud_threeyear_up').val();
        
        var ud_yfanthreeyear_down=$('#ud_yfanthreeyear_down').val();
        var ud_yfanthreeyear_up=$('#ud_yfanthreeyear_up').val();

        var ud_sanbiao_down=$('#ud_sanbiao_down').val();
        var ud_sanbiao_up=$('#ud_sanbiao_up').val();

        var ud_one_temp_down=parseFloat(ud_one_down);
        var ud_one_temp_up=parseFloat(ud_one_up);

        var ud_three_temp_down=parseFloat(ud_three_down);
        var ud_three_temp_up=parseFloat(ud_three_up);


        var ud_six_temp_down=parseFloat(ud_six_down);
        var ud_six_temp_up=parseFloat(ud_six_up);

        var ud_year_temp_down=parseFloat(ud_year_down);
        var ud_year_temp_up=parseFloat(ud_year_up);

        var ud_firstone_temp_down=parseFloat(ud_firstone_down);
        var ud_firstone_temp_up=parseFloat(ud_firstone_up);

        var ud_yfanyear_temp_down=parseFloat(ud_yfanyear_down);
        var ud_yfanyear_temp_up=parseFloat(ud_yfanyear_up);

        var ud_twoyear_temp_down=parseFloat(ud_twoyear_down);
        var ud_twoyear_temp_up=parseFloat(ud_twoyear_up);
        
        var ud_yfantwoyear_temp_down=parseFloat(ud_yfantwoyear_down);
        var ud_yfantwoyear_temp_up=parseFloat(ud_yfantwoyear_up);
        
        var ud_threeyear_temp_down=parseFloat(ud_threeyear_down);
        var ud_threeyear_temp_up=parseFloat(ud_threeyear_up);
        
        var ud_yfanthreeyear_temp_down=parseFloat(ud_yfanthreeyear_down);
        var ud_yfanthreeyear_temp_up=parseFloat(ud_yfanthreeyear_up);

        var ud_sanbiao_temp_down=parseFloat(ud_sanbiao_down);
        var ud_sanbiao_temp_up=parseFloat(ud_sanbiao_up);

        var ud_mydata_down=[ud_one_temp_down,ud_firstone_temp_down,ud_three_temp_down,ud_six_temp_down,ud_year_temp_down,ud_yfanyear_temp_down,ud_twoyear_temp_down,ud_yfantwoyear_temp_down,ud_threeyear_temp_down,ud_yfanthreeyear_temp_down,ud_sanbiao_temp_down];

        var ud_mydata_up=[ud_one_temp_up,ud_firstone_temp_up,ud_three_temp_up,ud_six_temp_up,ud_year_temp_up,ud_yfanyear_temp_up,ud_twoyear_temp_up,ud_yfantwoyear_temp_up,ud_threeyear_temp_up,ud_yfanthreeyear_temp_up,ud_sanbiao_temp_up];

        var ud_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_ud",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '投资关联投顾统计'
        },
        // subtitle: {
        //     text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        // },
        legend: {
            enabled: false
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.2f} 元</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.3,
                borderWidth: 0,
            }
        },
        xAxis: {
            categories: [
                '微+宝',
                '微+1',
                '微+3',
                '微+6',
                '微年利',
                '微月盈',
                '微年利II',
                '微月盈II',
                '微年利III',
                '微月盈III',
                '散标'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '投资金额 (元)'
            }
        },
        series: [{
            name: '关联投顾',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ]

        }, {
            name: '非关联投顾',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ]

        }]
    }); 

    ud_charts.series[0].setData(ud_mydata_down);//数据填充到highcharts上面
    ud_charts.series[1].setData(ud_mydata_up);//数据填充到highcharts上面


    //全部
    $("#all_ud").click(function(){
        $('.choice_button_ud .button_ud').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_ud").val('none');
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;

        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;

        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'all':'all'
            },
            dataType: "json",
            success: function(data){
                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
                
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面

            }
         });
    });

	//昨天
    $("#yesterday_ud").click(function(){
        $('.choice_button_ud .button_ud').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_ud").val('none');
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;
        
        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;
        
        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
                
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面

            }
         });
    });

    //今天
    $("#today_ud").click(function(){
        $('.choice_button_ud .button_ud').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_ud").val('none');
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;
        
        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;
        
        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
     
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面

            }
         });
    });

	//最近7天
    $("#sevenday_ud").click(function(){
        $('.choice_button_ud .button_ud').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_ud").val('none');
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;
        
        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;
        
        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
  
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面

            }
         });
    });

	
	//最近15天
    $("#fifteenday_ud").click(function(){
        $('.choice_button_ud .button_ud').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_ud").val('none');
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;
        
        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;
        
        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
   
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面

            }
         });
    });

	//最近30天
    $("#thirtyday_ud").click(function(){
        $('.choice_button_ud .button_ud').removeClass('cur');
        $(this).addClass('cur');

        $("#main_yearmonth_ud").val('none');
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;
        
        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;
        
        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
         
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面

            }
         });
    });


    //选择年月
    $("#main_yearmonth_ud").change(function(){
        var ud_yearmonth=$("#main_yearmonth_ud").val();
        if(ud_yearmonth=="none"){
            return false;
        }
        $('.choice_button_ud .button_ud').removeClass('cur');
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;
        
        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;
        
        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'yearmonth':ud_yearmonth
            },
            dataType: "json",
            success: function(data){
                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
         
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面

            }
         });
    });


    //日历筛选
    $('#do_choice_ud').click(function(){

        $('.choice_button_ud .button_ud').removeClass('cur');
        $("#main_yearmonth_ud").val('none');

        var start_date_ud=$('#start_date_ud').val();
        var end_date_ud=$('#end_date_ud').val();
        
        var ud_one_ajax_down;
        var ud_one_ajax_up;

        var ud_three_ajax_down;
        var ud_three_ajax_up;

        var ud_six_ajax_down;
        var ud_six_ajax_up;

        var ud_year_ajax_down;
        var ud_year_ajax_up;

        var ud_firstone_ajax_down;
        var ud_firstone_ajax_up;

        var ud_yfanyear_ajax_down;
        var ud_yfanyear_ajax_up;
        
        var ud_twoyear_ajax_down;
        var ud_twoyear_ajax_up;
        
        var ud_yfantwoyear_ajax_down;
        var ud_yfantwoyear_ajax_up;
        
        var ud_threeyear_ajax_down;
        var ud_threeyear_ajax_up;
        
        var ud_yfanthreeyear_ajax_down;
        var ud_yfanthreeyear_ajax_up;

        var ud_sanbiao_ajax_down;
        var ud_sanbiao_ajax_up;

        var ud_one_ajax_temp_down;
        var ud_one_ajax_temp_up;

        var ud_three_ajax_temp_down;
        var ud_three_ajax_temp_up;

        var ud_six_ajax_temp_down;
        var ud_six_ajax_temp_up;

        var ud_year_ajax_temp_down;
        var ud_year_ajax_temp_up;

        var ud_firstone_ajax_temp_down;
        var ud_firstone_ajax_temp_up;

        var ud_yfanyear_ajax_temp_down;
        var ud_yfanyear_ajax_temp_up;
        
        var ud_twoyear_ajax_temp_down;
        var ud_twoyear_ajax_temp_up;
        
        var ud_yfantwoyear_ajax_temp_down;
        var ud_yfantwoyear_ajax_temp_up;
        
        var ud_threeyear_ajax_temp_down;
        var ud_threeyear_ajax_temp_up;
        
        var ud_yfanthreeyear_ajax_temp_down;
        var ud_yfanthreeyear_ajax_temp_up;

        var ud_sanbiao_ajax_temp_down;
        var ud_sanbiao_ajax_temp_up;

        var ud_mydata_ajax_down;
        var ud_mydata_ajax_up;
        
        
        $.ajax({
            type: "post",
            url: ud_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_ud,
                'end_date':end_date_ud
            },
            dataType: "json",
            success: function(data){

                ud_one_ajax_down=data.data.sum_one_down;
                ud_one_ajax_up=data.data.sum_one_up;

                ud_three_ajax_down=data.data.sum_three_down;
                ud_three_ajax_up=data.data.sum_three_up;

                ud_six_ajax_down=data.data.sum_six_down;
                ud_six_ajax_up=data.data.sum_six_up;

                ud_year_ajax_down=data.data.sum_year_down;
                ud_year_ajax_up=data.data.sum_year_up;

                ud_firstone_ajax_down=data.data.sum_firstone_down;
                ud_firstone_ajax_up=data.data.sum_firstone_up;

                ud_yfanyear_ajax_down=data.data.sum_yfanyear_down;
                ud_yfanyear_ajax_up=data.data.sum_yfanyear_up;
                
                ud_twoyear_ajax_down=data.data.sum_twoyear_down;
                ud_twoyear_ajax_up=data.data.sum_twoyear_up;
                
                ud_yfantwoyear_ajax_down=data.data.sum_yfantwoyear_down;
                ud_yfantwoyear_ajax_up=data.data.sum_yfantwoyear_up;
                
                ud_threeyear_ajax_down=data.data.sum_threeyear_down;
                ud_threeyear_ajax_up=data.data.sum_threeyear_up;
                
                ud_yfanthreeyear_ajax_down=data.data.sum_yfanthreeyear_down;
                ud_yfanthreeyear_ajax_up=data.data.sum_yfanthreeyear_up;

                ud_sanbiao_ajax_down=data.data.sum_sanbiao_down;
                ud_sanbiao_ajax_up=data.data.sum_sanbiao_up;

                ud_one_ajax_temp_down=parseFloat(ud_one_ajax_down);
                ud_one_ajax_temp_up=parseFloat(ud_one_ajax_up);

                ud_three_ajax_temp_down=parseFloat(ud_three_ajax_down);
                ud_three_ajax_temp_up=parseFloat(ud_three_ajax_up);

                ud_six_ajax_temp_down=parseFloat(ud_six_ajax_down);
                ud_six_ajax_temp_up=parseFloat(ud_six_ajax_up);

                ud_year_ajax_temp_down=parseFloat(ud_year_ajax_down);
                ud_year_ajax_temp_up=parseFloat(ud_year_ajax_up);

                ud_firstone_ajax_temp_down=parseFloat(ud_firstone_ajax_down);
                ud_firstone_ajax_temp_up=parseFloat(ud_firstone_ajax_up);

                ud_yfanyear_ajax_temp_down=parseFloat(ud_yfanyear_ajax_down);
                ud_yfanyear_ajax_temp_up=parseFloat(ud_yfanyear_ajax_up);
                
                ud_twoyear_ajax_temp_down=parseFloat(ud_twoyear_ajax_down);
                ud_twoyear_ajax_temp_up=parseFloat(ud_twoyear_ajax_up);
                
                ud_yfantwoyear_ajax_temp_down=parseFloat(ud_yfantwoyear_ajax_down);
                ud_yfantwoyear_ajax_temp_up=parseFloat(ud_yfantwoyear_ajax_up);
                
                ud_threeyear_ajax_temp_down=parseFloat(ud_threeyear_ajax_down);
                ud_threeyear_ajax_temp_up=parseFloat(ud_threeyear_ajax_up);
                
                ud_yfanthreeyear_ajax_temp_down=parseFloat(ud_yfanthreeyear_ajax_down);
                ud_yfanthreeyear_ajax_temp_up=parseFloat(ud_yfanthreeyear_ajax_up);

                ud_sanbiao_ajax_temp_down=parseFloat(ud_sanbiao_ajax_down);
                ud_sanbiao_ajax_temp_up=parseFloat(ud_sanbiao_ajax_up);


                ud_mydata_ajax_down=[ud_one_ajax_temp_down,ud_firstone_ajax_temp_down,ud_three_ajax_temp_down,ud_six_ajax_temp_down,ud_year_ajax_temp_down,ud_yfanyear_ajax_temp_down,ud_twoyear_ajax_temp_down,ud_yfantwoyear_ajax_temp_down,ud_threeyear_ajax_temp_down,ud_yfanthreeyear_ajax_temp_down,ud_sanbiao_ajax_temp_down];
                ud_mydata_ajax_up=[ud_one_ajax_temp_up,ud_firstone_ajax_temp_up,ud_three_ajax_temp_up,ud_six_ajax_temp_up,ud_year_ajax_temp_up,ud_yfanyear_ajax_temp_up,ud_twoyear_ajax_temp_up,ud_yfantwoyear_ajax_temp_up,ud_threeyear_ajax_temp_up,ud_yfanthreeyear_ajax_temp_up,ud_sanbiao_ajax_temp_up];
       
                ud_charts.series[0].setData(ud_mydata_ajax_down);//数据填充到highcharts上面
                ud_charts.series[1].setData(ud_mydata_ajax_up);//数据填充到highcharts上面
            }
        });

    });

});