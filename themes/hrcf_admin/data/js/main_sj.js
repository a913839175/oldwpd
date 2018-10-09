;$(function () {

    laydate({
        elem: '#start_date_sj'
    });

    laydate({
        elem: '#end_date_sj'
    });

	var sj_ajax_url="/?hradmin&q=code/data/main&action=sj_ajax";


        var sj_one_account=$('#sj_one_account').val();
        var sj_one_capital=$('#sj_one_capital').val();
        var sj_one_interest=$('#sj_one_interest').val();

        var sj_three_account=$('#sj_three_account').val();
        var sj_three_capital=$('#sj_three_capital').val();
        var sj_three_interest=$('#sj_three_interest').val();

        var sj_six_account=$('#sj_six_account').val();
        var sj_six_capital=$('#sj_six_capital').val();
        var sj_six_interest=$('#sj_six_interest').val();

        var sj_year_account=$('#sj_year_account').val();
        var sj_year_capital=$('#sj_year_capital').val();
        var sj_year_interest=$('#sj_year_interest').val();

        var sj_firstone_account=$('#sj_firstone_account').val();
        var sj_firstone_capital=$('#sj_firstone_capital').val();
        var sj_firstone_interest=$('#sj_firstone_interest').val();

        var sj_yfanyear_account=$('#sj_yfanyear_account').val();
        var sj_yfanyear_capital=$('#sj_yfanyear_capital').val();
        var sj_yfanyear_interest=$('#sj_yfanyear_interest').val();
        
        var sj_twoyear_account=$('#sj_twoyear_account').val();
        var sj_twoyear_capital=$('#sj_twoyear_capital').val();
        var sj_twoyear_interest=$('#sj_twoyear_interest').val();

        var sj_yfantwoyear_account=$('#sj_yfantwoyear_account').val();
        var sj_yfantwoyear_capital=$('#sj_yfantwoyear_capital').val();
        var sj_yfantwoyear_interest=$('#sj_yfantwoyear_interest').val();

        var sj_threeyear_account=$('#sj_threeyear_account').val();
        var sj_threeyear_capital=$('#sj_threeyear_capital').val();
        var sj_threeyear_interest=$('#sj_threeyear_interest').val();

        var sj_yfanthreeyear_account=$('#sj_yfanthreeyear_account').val();
        var sj_yfanthreeyear_capital=$('#sj_yfanthreeyear_capital').val();
        var sj_yfanthreeyear_interest=$('#sj_yfanthreeyear_interest').val();

        var sj_sanbiao_account=$('#sj_sanbiao_account').val();
        var sj_sanbiao_capital=$('#sj_sanbiao_capital').val();
        var sj_sanbiao_interest=$('#sj_sanbiao_interest').val();

        var sj_one_temp_account=parseFloat(sj_one_account);
        var sj_one_temp_capital=parseFloat(sj_one_capital);
        var sj_one_temp_interest=parseFloat(sj_one_interest);

        var sj_three_temp_account=parseFloat(sj_three_account);
        var sj_three_temp_capital=parseFloat(sj_three_capital);
        var sj_three_temp_interest=parseFloat(sj_three_interest);


        var sj_six_temp_account=parseFloat(sj_six_account);
        var sj_six_temp_capital=parseFloat(sj_six_capital);
        var sj_six_temp_interest=parseFloat(sj_six_interest);

        var sj_year_temp_account=parseFloat(sj_year_account);
        var sj_year_temp_capital=parseFloat(sj_year_capital);
        var sj_year_temp_interest=parseFloat(sj_year_interest);

        var sj_firstone_temp_account=parseFloat(sj_firstone_account);
        var sj_firstone_temp_capital=parseFloat(sj_firstone_capital);
        var sj_firstone_temp_interest=parseFloat(sj_firstone_interest);

        var sj_yfanyear_temp_account=parseFloat(sj_yfanyear_account);
        var sj_yfanyear_temp_capital=parseFloat(sj_yfanyear_capital);
        var sj_yfanyear_temp_interest=parseFloat(sj_yfanyear_interest);

        var sj_twoyear_temp_account=parseFloat(sj_twoyear_account);
        var sj_twoyear_temp_capital=parseFloat(sj_twoyear_capital);
        var sj_twoyear_temp_interest=parseFloat(sj_twoyear_interest);

        var sj_yfantwoyear_temp_account=parseFloat(sj_yfantwoyear_account);
        var sj_yfantwoyear_temp_capital=parseFloat(sj_yfantwoyear_capital);
        var sj_yfantwoyear_temp_interest=parseFloat(sj_yfantwoyear_interest);

        var sj_threeyear_temp_account=parseFloat(sj_threeyear_account);
        var sj_threeyear_temp_capital=parseFloat(sj_threeyear_capital);
        var sj_threeyear_temp_interest=parseFloat(sj_threeyear_interest);

        var sj_yfanthreeyear_temp_account=parseFloat(sj_yfanthreeyear_account);
        var sj_yfanthreeyear_temp_capital=parseFloat(sj_yfanthreeyear_capital);
        var sj_yfanthreeyear_temp_interest=parseFloat(sj_yfanthreeyear_interest);

        var sj_sanbiao_temp_account=parseFloat(sj_sanbiao_account);
        var sj_sanbiao_temp_capital=parseFloat(sj_sanbiao_capital);
        var sj_sanbiao_temp_interest=parseFloat(sj_sanbiao_interest);

        var sj_mydata_account=[sj_one_temp_account,sj_firstone_temp_account,sj_three_temp_account,sj_six_temp_account,sj_year_temp_account,sj_yfanyear_temp_account,sj_twoyear_temp_account,sj_yfantwoyear_temp_account,sj_threeyear_temp_account,sj_yfanthreeyear_temp_account,sj_sanbiao_temp_account];

        var sj_mydata_capital=[sj_one_temp_capital,sj_firstone_temp_capital,sj_three_temp_capital,sj_six_temp_capital,sj_year_temp_capital,sj_yfanyear_temp_capital,sj_twoyear_temp_capital,sj_yfantwoyear_temp_capital,sj_threeyear_temp_capital,sj_yfanthreeyear_temp_capital,sj_sanbiao_temp_capital];

        var sj_mydata_interest=[sj_one_temp_interest,sj_firstone_temp_interest,sj_three_temp_interest,sj_six_temp_interest,sj_year_temp_interest,sj_yfanyear_temp_interest,sj_twoyear_temp_interest,sj_yfantwoyear_temp_interest,sj_threeyear_temp_interest,sj_yfanthreeyear_temp_interest,sj_sanbiao_temp_interest];

        var sj_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_sj",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '赎回数据统计'
        },
        // subtitle: {
        //     text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        // },
        yAxis: {
            min: 0,
            title: {
                text: '赎回金额 (元)'
            }
        },
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
        series: [{
            name: '本息',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

        }, {
            name: '本金',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ]

        }, {
            name: '利息',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ]

        }]
    }); 

    sj_charts.series[0].setData(sj_mydata_account);//数据填充到highcharts上面
    sj_charts.series[1].setData(sj_mydata_capital);//数据填充到highcharts上面
    sj_charts.series[2].setData(sj_mydata_interest);//数据填充到highcharts上面


    //全部
    $("#all_sj").click(function(){
        $('.choice_button_sj .button_sj').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sj").val('none');
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;

        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'all':'all'
            },
            dataType: "json",
            success: function(data){
                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面

            }
         });
    });

	//昨天
    $("#yesterday_sj").click(function(){
        $('.choice_button_sj .button_sj').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sj").val('none');
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;

        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面

            }
         });
    });

    //今天
    $("#today_sj").click(function(){
        $('.choice_button_sj .button_sj').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sj").val('none');
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;
        
        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面

            }
         });
    });

	//最近7天
    $("#sevenday_sj").click(function(){
        $('.choice_button_sj .button_sj').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sj").val('none');
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;
        
        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面

            }
         });
    });

	
	//最近15天
    $("#fifteenday_sj").click(function(){
        $('.choice_button_sj .button_sj').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_sj").val('none');
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;
        
        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面

            }
         });
    });

	//最近30天
    $("#thirtyday_sj").click(function(){
        $('.choice_button_sj .button_sj').removeClass('cur');
        $(this).addClass('cur');

        $("#main_yearmonth_sj").val('none');
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;
        
        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面

            }
         });
    });


    //选择年月
    $("#main_yearmonth_sj").change(function(){
        var sj_yearmonth=$("#main_yearmonth_sj").val();
        if(sj_yearmonth=="none"){
            return false;
        }
        $('.choice_button_sj .button_sj').removeClass('cur');
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;
        
        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'yearmonth':sj_yearmonth
            },
            dataType: "json",
            success: function(data){
                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面

            }
         });
    });


    //日历筛选
    $('#do_choice_sj').click(function(){

        $('.choice_button_sj .button_sj').removeClass('cur');
        $("#main_yearmonth_sj").val('none');

        var start_date_sj=$('#start_date_sj').val();
        var end_date_sj=$('#end_date_sj').val();
        
        var sj_one_ajax_account;
        var sj_one_ajax_capital;
        var sj_one_ajax_interest;

        var sj_three_ajax_account;
        var sj_three_ajax_capital;
        var sj_three_ajax_interest;

        var sj_six_ajax_account;
        var sj_six_ajax_capital;
        var sj_six_ajax_interest;

        var sj_year_ajax_account;
        var sj_year_ajax_capital;
        var sj_year_ajax_interest;

        var sj_firstone_ajax_account;
        var sj_firstone_ajax_capital;
        var sj_firstone_ajax_interest;

        var sj_yfanyear_ajax_account;
        var sj_yfanyear_ajax_capital;
        var sj_yfanyear_ajax_interest;

        var sj_twoyear_ajax_account;
        var sj_twoyear_ajax_capital;
        var sj_twoyear_ajax_interest;

        var sj_yfantwoyear_ajax_account;
        var sj_yfantwoyear_ajax_capital;
        var sj_yfantwoyear_ajax_interest;

        var sj_threeyear_ajax_account;
        var sj_threeyear_ajax_capital;
        var sj_threeyear_ajax_interest;
        
        var sj_yfanthreeyear_ajax_account;
        var sj_yfanthreeyear_ajax_capital;
        var sj_yfanthreeyear_ajax_interest;

        var sj_sanbiao_ajax_account;
        var sj_sanbiao_ajax_capital;
        var sj_sanbiao_ajax_interest;

        var sj_one_ajax_temp_account;
        var sj_one_ajax_temp_capital;
        var sj_one_ajax_temp_interest;

        var sj_three_ajax_temp_account;
        var sj_three_ajax_temp_capital;
        var sj_three_ajax_temp_interest;

        var sj_six_ajax_temp_account;
        var sj_six_ajax_temp_capital;
        var sj_six_ajax_temp_interest;

        var sj_year_ajax_temp_account;
        var sj_year_ajax_temp_capital;
        var sj_year_ajax_temp_interest;

        var sj_firstone_ajax_temp_account;
        var sj_firstone_ajax_temp_capital;
        var sj_firstone_ajax_temp_interest;

        var sj_yfanyear_ajax_temp_account;
        var sj_yfanyear_ajax_temp_capital;
        var sj_yfanyear_ajax_temp_interest;

        var sj_twoyear_ajax_temp_account;
        var sj_twoyear_ajax_temp_capital;
        var sj_twoyear_ajax_temp_interest;

        var sj_yfantwoyear_ajax_temp_account;
        var sj_yfantwoyear_ajax_temp_capital;
        var sj_yfantwoyear_ajax_temp_interest;
        
        var sj_threeyear_ajax_temp_account;
        var sj_threeyear_ajax_temp_capital;
        var sj_threeyear_ajax_temp_interest;
        
        var sj_yfanthreeyear_ajax_temp_account;
        var sj_yfanthreeyear_ajax_temp_capital;
        var sj_yfanthreeyear_ajax_temp_interest;

        var sj_sanbiao_ajax_temp_account;
        var sj_sanbiao_ajax_temp_capital;
        var sj_sanbiao_ajax_temp_interest;

        var sj_mydata_ajax_account;
        var sj_mydata_ajax_capital;
        var sj_mydata_ajax_interest;
        
        
        $.ajax({
            type: "post",
            url: sj_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_sj,
                'end_date':end_date_sj
            },
            dataType: "json",
            success: function(data){

                sj_one_ajax_account=data.data.sum_one_account;
                sj_one_ajax_capital=data.data.sum_one_capital;
                sj_one_ajax_interest=data.data.sum_one_interest;

                sj_three_ajax_account=data.data.sum_three_account;
                sj_three_ajax_capital=data.data.sum_three_capital;
                sj_three_ajax_interest=data.data.sum_three_interest;

                sj_six_ajax_account=data.data.sum_six_account;
                sj_six_ajax_capital=data.data.sum_six_capital;
                sj_six_ajax_interest=data.data.sum_six_interest;

                sj_year_ajax_account=data.data.sum_year_account;
                sj_year_ajax_capital=data.data.sum_year_capital;
                sj_year_ajax_interest=data.data.sum_year_interest;

                sj_firstone_ajax_account=data.data.sum_firstone_account;
                sj_firstone_ajax_capital=data.data.sum_firstone_capital;
                sj_firstone_ajax_interest=data.data.sum_firstone_interest;

                sj_yfanyear_ajax_account=data.data.sum_yfanyear_account;
                sj_yfanyear_ajax_capital=data.data.sum_yfanyear_capital;
                sj_yfanyear_ajax_interest=data.data.sum_yfanyear_interest;

                sj_twoyear_ajax_account=data.data.sum_twoyear_account;
                sj_twoyear_ajax_capital=data.data.sum_twoyear_capital;
                sj_twoyear_ajax_interest=data.data.sum_twoyear_interest;

                sj_yfantwoyear_ajax_account=data.data.sum_yfantwoyear_account;
                sj_yfantwoyear_ajax_capital=data.data.sum_yfantwoyear_capital;
                sj_yfantwoyear_ajax_interest=data.data.sum_yfantwoyear_interest;

                sj_threeyear_ajax_account=data.data.sum_threeyear_account;
                sj_threeyear_ajax_capital=data.data.sum_threeyear_capital;
                sj_threeyear_ajax_interest=data.data.sum_threeyear_interest;

                sj_yfanthreeyear_ajax_account=data.data.sum_yfanthreeyear_account;
                sj_yfanthreeyear_ajax_capital=data.data.sum_yfanthreeyear_capital;
                sj_yfanthreeyear_ajax_interest=data.data.sum_yfanthreeyear_interest;

                sj_sanbiao_ajax_account=data.data.sum_sanbiao_account;
                sj_sanbiao_ajax_capital=data.data.sum_sanbiao_capital;
                sj_sanbiao_ajax_interest=data.data.sum_sanbiao_interest;

                sj_one_ajax_temp_account=parseFloat(sj_one_ajax_account);
                sj_one_ajax_temp_capital=parseFloat(sj_one_ajax_capital);
                sj_one_ajax_temp_interest=parseFloat(sj_one_ajax_interest);

                sj_three_ajax_temp_account=parseFloat(sj_three_ajax_account);
                sj_three_ajax_temp_capital=parseFloat(sj_three_ajax_capital);
                sj_three_ajax_temp_interest=parseFloat(sj_three_ajax_interest);

                sj_six_ajax_temp_account=parseFloat(sj_six_ajax_account);
                sj_six_ajax_temp_capital=parseFloat(sj_six_ajax_capital);
                sj_six_ajax_temp_interest=parseFloat(sj_six_ajax_interest);

                sj_year_ajax_temp_account=parseFloat(sj_year_ajax_account);
                sj_year_ajax_temp_capital=parseFloat(sj_year_ajax_capital);
                sj_year_ajax_temp_interest=parseFloat(sj_year_ajax_interest);

                sj_firstone_ajax_temp_account=parseFloat(sj_firstone_ajax_account);
                sj_firstone_ajax_temp_capital=parseFloat(sj_firstone_ajax_capital);
                sj_firstone_ajax_temp_interest=parseFloat(sj_firstone_ajax_interest);

                sj_yfanyear_ajax_temp_account=parseFloat(sj_yfanyear_ajax_account);
                sj_yfanyear_ajax_temp_capital=parseFloat(sj_yfanyear_ajax_capital);
                sj_yfanyear_ajax_temp_interest=parseFloat(sj_yfanyear_ajax_interest);

                sj_twoyear_ajax_temp_account=parseFloat(sj_twoyear_ajax_account);
                sj_twoyear_ajax_temp_capital=parseFloat(sj_twoyear_ajax_capital);
                sj_twoyear_ajax_temp_interest=parseFloat(sj_twoyear_ajax_interest);

                sj_yfantwoyear_ajax_temp_account=parseFloat(sj_yfantwoyear_ajax_account);
                sj_yfantwoyear_ajax_temp_capital=parseFloat(sj_yfantwoyear_ajax_capital);
                sj_yfantwoyear_ajax_temp_interest=parseFloat(sj_yfantwoyear_ajax_interest);

                sj_threeyear_ajax_temp_account=parseFloat(sj_threeyear_ajax_account);
                sj_threeyear_ajax_temp_capital=parseFloat(sj_threeyear_ajax_capital);
                sj_threeyear_ajax_temp_interest=parseFloat(sj_threeyear_ajax_interest);

                sj_yfanthreeyear_ajax_temp_account=parseFloat(sj_yfanthreeyear_ajax_account);
                sj_yfanthreeyear_ajax_temp_capital=parseFloat(sj_yfanthreeyear_ajax_capital);
                sj_yfanthreeyear_ajax_temp_interest=parseFloat(sj_yfanthreeyear_ajax_interest);

                sj_sanbiao_ajax_temp_account=parseFloat(sj_sanbiao_ajax_account);
                sj_sanbiao_ajax_temp_capital=parseFloat(sj_sanbiao_ajax_capital);
                sj_sanbiao_ajax_temp_interest=parseFloat(sj_sanbiao_ajax_interest);


                sj_mydata_ajax_account=[sj_one_ajax_temp_account,sj_firstone_ajax_temp_account,sj_three_ajax_temp_account,sj_six_ajax_temp_account,sj_year_ajax_temp_account,sj_yfanyear_ajax_temp_account,sj_twoyear_ajax_temp_account,sj_yfantwoyear_ajax_temp_account,sj_threeyear_ajax_temp_account,sj_yfanthreeyear_ajax_temp_account,sj_sanbiao_ajax_temp_account];
                sj_mydata_ajax_capital=[sj_one_ajax_temp_capital,sj_firstone_ajax_temp_capital,sj_three_ajax_temp_capital,sj_six_ajax_temp_capital,sj_year_ajax_temp_capital,sj_yfanyear_ajax_temp_capital,sj_twoyear_ajax_temp_capital,sj_yfantwoyear_ajax_temp_capital,sj_threeyear_ajax_temp_capital,sj_yfanthreeyear_ajax_temp_capital,sj_sanbiao_ajax_temp_capital];
                sj_mydata_ajax_interest=[sj_one_ajax_temp_interest,sj_firstone_ajax_temp_interest,sj_three_ajax_temp_interest,sj_six_ajax_temp_interest,sj_year_ajax_temp_interest,sj_yfanyear_ajax_temp_interest,sj_twoyear_ajax_temp_interest,sj_yfantwoyear_ajax_temp_interest,sj_threeyear_ajax_temp_interest,sj_yfanthreeyear_ajax_temp_interest,sj_sanbiao_ajax_temp_interest];

                sj_charts.series[0].setData(sj_mydata_ajax_account);//数据填充到highcharts上面
                sj_charts.series[1].setData(sj_mydata_ajax_capital);//数据填充到highcharts上面
                sj_charts.series[2].setData(sj_mydata_ajax_interest);//数据填充到highcharts上面
            }
        });

    });

});