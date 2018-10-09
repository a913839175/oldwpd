;$(function () {

    laydate({
        elem: '#start_date_cb'
    });

    laydate({
        elem: '#end_date_cb'
    });

	var cb_ajax_url="/?hradmin&q=code/data/main&action=cb_ajax";


	var cb_one=$('#cb_one').val();
    var cb_three=$('#cb_three').val();
    var cb_six=$('#cb_six').val();
    var cb_year=$('#cb_year').val();
    var cb_firstone=$('#cb_firstone').val();
    var cb_yfanyear=$('#cb_yfanyear').val();
    var cb_twoyear=$('#cb_twoyear').val();
    var cb_yfantwoyear=$('#cb_yfantwoyear').val();
    var cb_threeyear=$('#cb_threeyear').val();
    var cb_yfanthreeyear=$('#cb_yfanthreeyear').val();
    var cb_sanbiao=$('#cb_sanbiao').val();
    var cb_one_temp=parseFloat(cb_one);
    var cb_three_temp=parseFloat(cb_three);
    var cb_six_temp=parseFloat(cb_six);
    var cb_year_temp=parseFloat(cb_year);
    var cb_firstone_temp=parseFloat(cb_firstone);
    var cb_yfanyear_temp=parseFloat(cb_yfanyear);
    var cb_twoyear_temp=parseFloat(cb_twoyear);
    var cb_yfantwoyear_temp=parseFloat(cb_yfantwoyear);
    var cb_threeyear_temp=parseFloat(cb_threeyear);
    var cb_yfanthreeyear_temp=parseFloat(cb_yfanthreeyear);
    var cb_sanbiao_temp=parseFloat(cb_sanbiao);
    // var cb_mydata=[['微+宝', cb_one_temp],['微+1', cb_firstone_temp],['微+3', cb_three_temp],['微+6', cb_six_temp],['微年利', cb_year_temp],['微月盈', cb_yfanyear_temp],['散标', cb_sanbiao_temp]];
     var cb_mydata=[['微+宝', cb_one_temp],['微+1', cb_firstone_temp],['微+3', cb_three_temp],['微+6', cb_six_temp],['微年利', cb_year_temp],['微月盈', cb_yfanyear_temp],['微年利II', cb_twoyear_temp],['微月盈II', cb_yfantwoyear_temp],['微年利III', cb_threeyear_temp],['微月盈III', cb_yfanthreeyear_temp]];

    var cb_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_cb",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '投资成本数据统计'
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
                text: '金额 (元)'
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
                // ['散标', 0],
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

    cb_charts.series[0].setData(cb_mydata);//数据填充到highcharts上面


	//昨天
    $("#yesterday_cb").click(function(){
        $('.choice_button_cb .button_cb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_cb").val('none');
        
        var cb_one_ajax;
        var cb_three_ajax;
        var cb_six_ajax;
        var cb_year_ajax;
        var cb_firstone_ajax;
        var cb_yfanyear_ajax;
        var cb_twoyear_ajax;
        var cb_yfantwoyear_ajax;
        var cb_threeyear_ajax;
        var cb_yfanthreeyear_ajax;
        var cb_sanbiao_ajax;
        var cb_one_ajax_temp;
        var cb_three_ajax_temp;
        var cb_six_ajax_temp;
        var cb_year_ajax_temp;
        var cb_firstone_ajax_temp;
        var cb_yfanyear_ajax_temp;
        var cb_twoyear_ajax_temp;
        var cb_yfantwoyear_ajax_temp;
        var cb_threeyear_ajax_temp;
        var cb_yfanthreeyear_ajax_temp;
        var cb_sanbiao_ajax_temp;
        var cb_mydata_ajax;

        layer.load();
        $.ajax({
            type: "post",
            url: cb_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                if(data.status==0){
                    cb_one_ajax=data.data.cost_sum_one;
                    cb_three_ajax=data.data.cost_sum_three;
                    cb_six_ajax=data.data.cost_sum_six;
                    cb_year_ajax=data.data.cost_sum_year;
                    cb_firstone_ajax=data.data.cost_sum_firstone;
                    cb_yfanyear_ajax=data.data.cost_sum_yfanyear;
                    cb_twoyear_ajax=data.data.cost_sum_twoyear;
                    cb_yfantwoyear_ajax=data.data.cost_sum_yfantwoyear;
                    cb_threeyear_ajax=data.data.cost_sum_threeyear;
                    cb_yfanthreeyear_ajax=data.data.cost_sum_yfanthreeyear;
                    cb_sanbiao_ajax=data.data.cost_sum_sanbiao;
                    cb_one_ajax_temp=parseFloat(cb_one_ajax);
                    cb_three_ajax_temp=parseFloat(cb_three_ajax);
                    cb_six_ajax_temp=parseFloat(cb_six_ajax);
                    cb_year_ajax_temp=parseFloat(cb_year_ajax);
                    cb_firstone_ajax_temp=parseFloat(cb_firstone_ajax);
                    cb_yfanyear_ajax_temp=parseFloat(cb_yfanyear_ajax);
                    cb_twoyear_ajax_temp=parseFloat(cb_twoyear_ajax);
                    cb_yfantwoyear_ajax_temp=parseFloat(cb_yfantwoyear_ajax);
                    cb_threeyear_ajax_temp=parseFloat(cb_threeyear_ajax);
                    cb_yfanthreeyear_ajax_temp=parseFloat(cb_yfanthreeyear_ajax);
                    cb_sanbiao_ajax_temp=parseFloat(cb_sanbiao_ajax);

                    // cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['散标', cb_sanbiao_ajax_temp]];
                    cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['微年利II', cb_twoyear_ajax_temp],['微月盈II', cb_yfantwoyear_ajax_temp],['微年利III', cb_threeyear_ajax_temp],['微月盈III', cb_yfanthreeyear_ajax_temp]];
                    cb_charts.series[0].setData(cb_mydata_ajax);//数据填充到highcharts上面
                }else{
                    alert(data.info);
                }
                layer.closeAll('loading');

            }
         });
    });

    //今天
    $("#today_cb").click(function(){
        $('.choice_button_cb .button_cb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_cb").val('none');
        
        var cb_one_ajax;
        var cb_three_ajax;
        var cb_six_ajax;
        var cb_year_ajax;
        var cb_firstone_ajax;
        var cb_yfanyear_ajax;
        var cb_twoyear_ajax;
        var cb_yfantwoyear_ajax;
        var cb_threeyear_ajax;
        var cb_yfanthreeyear_ajax;
        var cb_sanbiao_ajax;
        var cb_one_ajax_temp;
        var cb_three_ajax_temp;
        var cb_six_ajax_temp;
        var cb_year_ajax_temp;
        var cb_firstone_ajax_temp;
        var cb_yfanyear_ajax_temp;
        var cb_twoyear_ajax_temp;
        var cb_yfantwoyear_ajax_temp;
        var cb_threeyear_ajax_temp;
        var cb_yfanthreeyear_ajax_temp;
        var cb_sanbiao_ajax_temp;
        var cb_mydata_ajax;

        layer.load();
        $.ajax({
            type: "post",
            url: cb_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                if(data.status==0){
                    cb_one_ajax=data.data.cost_sum_one;
                    cb_three_ajax=data.data.cost_sum_three;
                    cb_six_ajax=data.data.cost_sum_six;
                    cb_year_ajax=data.data.cost_sum_year;
                    cb_firstone_ajax=data.data.cost_sum_firstone;
                    cb_yfanyear_ajax=data.data.cost_sum_yfanyear;
                    cb_twoyear_ajax=data.data.cost_sum_twoyear;
                    cb_yfantwoyear_ajax=data.data.cost_sum_yfantwoyear;
                    cb_threeyear_ajax=data.data.cost_sum_threeyear;
                    cb_yfanthreeyear_ajax=data.data.cost_sum_yfanthreeyear;
                    cb_sanbiao_ajax=data.data.cost_sum_sanbiao;
                    cb_one_ajax_temp=parseFloat(cb_one_ajax);
                    cb_three_ajax_temp=parseFloat(cb_three_ajax);
                    cb_six_ajax_temp=parseFloat(cb_six_ajax);
                    cb_year_ajax_temp=parseFloat(cb_year_ajax);
                    cb_firstone_ajax_temp=parseFloat(cb_firstone_ajax);
                    cb_yfanyear_ajax_temp=parseFloat(cb_yfanyear_ajax);
                    cb_twoyear_ajax_temp=parseFloat(cb_twoyear_ajax);
                    cb_yfantwoyear_ajax_temp=parseFloat(cb_yfantwoyear_ajax);
                    cb_threeyear_ajax_temp=parseFloat(cb_threeyear_ajax);
                    cb_yfanthreeyear_ajax_temp=parseFloat(cb_yfanthreeyear_ajax);
                    cb_sanbiao_ajax_temp=parseFloat(cb_sanbiao_ajax);

                    // cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['散标', cb_sanbiao_ajax_temp]];
                    cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['微年利II', cb_twoyear_ajax_temp],['微月盈II', cb_yfantwoyear_ajax_temp],['微年利III', cb_threeyear_ajax_temp],['微月盈III', cb_yfanthreeyear_ajax_temp]];
                    cb_charts.series[0].setData(cb_mydata_ajax);//数据填充到highcharts上面
                }else{
                    alert(data.info);
                }
                layer.closeAll('loading');

            }
         });
    });

	//最近7天
    $("#sevenday_cb").click(function(){
        $('.choice_button_cb .button_cb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_cb").val('none');
        
        var cb_one_ajax;
        var cb_three_ajax;
        var cb_six_ajax;
        var cb_year_ajax;
        var cb_firstone_ajax;
        var cb_yfanyear_ajax;
        var cb_twoyear_ajax;
        var cb_yfantwoyear_ajax;
        var cb_threeyear_ajax;
        var cb_yfanthreeyear_ajax;
        var cb_sanbiao_ajax;
        var cb_one_ajax_temp;
        var cb_three_ajax_temp;
        var cb_six_ajax_temp;
        var cb_year_ajax_temp;
        var cb_firstone_ajax_temp;
        var cb_yfanyear_ajax_temp;
        var cb_twoyear_ajax_temp;
        var cb_yfantwoyear_ajax_temp;
        var cb_threeyear_ajax_temp;
        var cb_yfanthreeyear_ajax_temp;
        var cb_sanbiao_ajax_temp;
        var cb_mydata_ajax;

        layer.load();
        $.ajax({
            type: "post",
            url: cb_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                if(data.status==0){
                    cb_one_ajax=data.data.cost_sum_one;
                    cb_three_ajax=data.data.cost_sum_three;
                    cb_six_ajax=data.data.cost_sum_six;
                    cb_year_ajax=data.data.cost_sum_year;
                    cb_firstone_ajax=data.data.cost_sum_firstone;
                    cb_yfanyear_ajax=data.data.cost_sum_yfanyear;
                    cb_twoyear_ajax=data.data.cost_sum_twoyear;
                    cb_yfantwoyear_ajax=data.data.cost_sum_yfantwoyear;
                    cb_threeyear_ajax=data.data.cost_sum_threeyear;
                    cb_yfanthreeyear_ajax=data.data.cost_sum_yfanthreeyear;
                    cb_sanbiao_ajax=data.data.cost_sum_sanbiao;
                    cb_one_ajax_temp=parseFloat(cb_one_ajax);
                    cb_three_ajax_temp=parseFloat(cb_three_ajax);
                    cb_six_ajax_temp=parseFloat(cb_six_ajax);
                    cb_year_ajax_temp=parseFloat(cb_year_ajax);
                    cb_firstone_ajax_temp=parseFloat(cb_firstone_ajax);
                    cb_yfanyear_ajax_temp=parseFloat(cb_yfanyear_ajax);
                    cb_twoyear_ajax_temp=parseFloat(cb_twoyear_ajax);
                    cb_yfantwoyear_ajax_temp=parseFloat(cb_yfantwoyear_ajax);
                    cb_threeyear_ajax_temp=parseFloat(cb_threeyear_ajax);
                    cb_yfanthreeyear_ajax_temp=parseFloat(cb_yfanthreeyear_ajax);
                    cb_sanbiao_ajax_temp=parseFloat(cb_sanbiao_ajax);

                    // cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['散标', cb_sanbiao_ajax_temp]];
                    cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['微年利II', cb_twoyear_ajax_temp],['微月盈II', cb_yfantwoyear_ajax_temp],['微年利III', cb_threeyear_ajax_temp],['微月盈III', cb_yfanthreeyear_ajax_temp]];
                    cb_charts.series[0].setData(cb_mydata_ajax);//数据填充到highcharts上面
                }else{
                    alert(data.info);
                }
                layer.closeAll('loading');

            }
         });
    });

	
	//最近15天
    $("#fifteenday_cb").click(function(){
        $('.choice_button_cb .button_cb').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_cb").val('none');
        
        var cb_one_ajax;
        var cb_three_ajax;
        var cb_six_ajax;
        var cb_year_ajax;
        var cb_firstone_ajax;
        var cb_yfanyear_ajax;
        var cb_twoyear_ajax;
        var cb_yfantwoyear_ajax;
        var cb_threeyear_ajax;
        var cb_yfanthreeyear_ajax;
        var cb_sanbiao_ajax;
        var cb_one_ajax_temp;
        var cb_three_ajax_temp;
        var cb_six_ajax_temp;
        var cb_year_ajax_temp;
        var cb_firstone_ajax_temp;
        var cb_yfanyear_ajax_temp;
        var cb_twoyear_ajax_temp;
        var cb_yfantwoyear_ajax_temp;
        var cb_threeyear_ajax_temp;
        var cb_yfanthreeyear_ajax_temp;
        var cb_sanbiao_ajax_temp;
        var cb_mydata_ajax;

        layer.load();
        $.ajax({
            type: "post",
            url: cb_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                if(data.status==0){
                    cb_one_ajax=data.data.cost_sum_one;
                    cb_three_ajax=data.data.cost_sum_three;
                    cb_six_ajax=data.data.cost_sum_six;
                    cb_year_ajax=data.data.cost_sum_year;
                    cb_firstone_ajax=data.data.cost_sum_firstone;
                    cb_yfanyear_ajax=data.data.cost_sum_yfanyear;
                    cb_twoyear_ajax=data.data.cost_sum_twoyear;
                    cb_yfantwoyear_ajax=data.data.cost_sum_yfantwoyear;
                    cb_threeyear_ajax=data.data.cost_sum_threeyear;
                    cb_yfanthreeyear_ajax=data.data.cost_sum_yfanthreeyear;
                    cb_sanbiao_ajax=data.data.cost_sum_sanbiao;
                    cb_one_ajax_temp=parseFloat(cb_one_ajax);
                    cb_three_ajax_temp=parseFloat(cb_three_ajax);
                    cb_six_ajax_temp=parseFloat(cb_six_ajax);
                    cb_year_ajax_temp=parseFloat(cb_year_ajax);
                    cb_firstone_ajax_temp=parseFloat(cb_firstone_ajax);
                    cb_yfanyear_ajax_temp=parseFloat(cb_yfanyear_ajax);
                    cb_twoyear_ajax_temp=parseFloat(cb_twoyear_ajax);
                    cb_yfantwoyear_ajax_temp=parseFloat(cb_yfantwoyear_ajax);
                    cb_threeyear_ajax_temp=parseFloat(cb_threeyear_ajax);
                    cb_yfanthreeyear_ajax_temp=parseFloat(cb_yfanthreeyear_ajax);
                    cb_sanbiao_ajax_temp=parseFloat(cb_sanbiao_ajax);

                    // cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['散标', cb_sanbiao_ajax_temp]];
                    cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['微年利II', cb_twoyear_ajax_temp],['微月盈II', cb_yfantwoyear_ajax_temp],['微年利III', cb_threeyear_ajax_temp],['微月盈III', cb_yfanthreeyear_ajax_temp]];
                    cb_charts.series[0].setData(cb_mydata_ajax);//数据填充到highcharts上面
                }else{
                    alert(data.info);
                }
                layer.closeAll('loading');

            }
         });
    });

	//最近30天
    $("#thirtyday_cb").click(function(){
        $('.choice_button_cb .button_cb').removeClass('cur');
        $(this).addClass('cur');

        $("#main_yearmonth_cb").val('none');
        
        var cb_one_ajax;
        var cb_three_ajax;
        var cb_six_ajax;
        var cb_year_ajax;
        var cb_firstone_ajax;
        var cb_yfanyear_ajax;
        var cb_twoyear_ajax;
        var cb_yfantwoyear_ajax;
        var cb_threeyear_ajax;
        var cb_yfanthreeyear_ajax;
        var cb_sanbiao_ajax;
        var cb_one_ajax_temp;
        var cb_three_ajax_temp;
        var cb_six_ajax_temp;
        var cb_year_ajax_temp;
        var cb_firstone_ajax_temp;
        var cb_yfanyear_ajax_temp;
        var cb_twoyear_ajax_temp;
        var cb_yfantwoyear_ajax_temp;
        var cb_threeyear_ajax_temp;
        var cb_yfanthreeyear_ajax_temp;
        var cb_sanbiao_ajax_temp;
        var cb_mydata_ajax;

        layer.load();
        $.ajax({
            type: "post",
            url: cb_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                if(data.status==0){
                    cb_one_ajax=data.data.cost_sum_one;
                    cb_three_ajax=data.data.cost_sum_three;
                    cb_six_ajax=data.data.cost_sum_six;
                    cb_year_ajax=data.data.cost_sum_year;
                    cb_firstone_ajax=data.data.cost_sum_firstone;
                    cb_yfanyear_ajax=data.data.cost_sum_yfanyear;
                    cb_twoyear_ajax=data.data.cost_sum_twoyear;
                    cb_yfantwoyear_ajax=data.data.cost_sum_yfantwoyear;
                    cb_threeyear_ajax=data.data.cost_sum_threeyear;
                    cb_yfanthreeyear_ajax=data.data.cost_sum_yfanthreeyear;
                    cb_sanbiao_ajax=data.data.cost_sum_sanbiao;
                    cb_one_ajax_temp=parseFloat(cb_one_ajax);
                    cb_three_ajax_temp=parseFloat(cb_three_ajax);
                    cb_six_ajax_temp=parseFloat(cb_six_ajax);
                    cb_year_ajax_temp=parseFloat(cb_year_ajax);
                    cb_firstone_ajax_temp=parseFloat(cb_firstone_ajax);
                    cb_yfanyear_ajax_temp=parseFloat(cb_yfanyear_ajax);
                    cb_twoyear_ajax_temp=parseFloat(cb_twoyear_ajax);
                    cb_yfantwoyear_ajax_temp=parseFloat(cb_yfantwoyear_ajax);
                    cb_threeyear_ajax_temp=parseFloat(cb_threeyear_ajax);
                    cb_yfanthreeyear_ajax_temp=parseFloat(cb_yfanthreeyear_ajax);
                    cb_sanbiao_ajax_temp=parseFloat(cb_sanbiao_ajax);

                    // cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['散标', cb_sanbiao_ajax_temp]];
                    cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['微年利II', cb_twoyear_ajax_temp],['微月盈II', cb_yfantwoyear_ajax_temp],['微年利III', cb_threeyear_ajax_temp],['微月盈III', cb_yfanthreeyear_ajax_temp]];
                    cb_charts.series[0].setData(cb_mydata_ajax);//数据填充到highcharts上面
                }else{
                    alert(data.info);
                }
                layer.closeAll('loading');

            }
         });
    });


    //选择年月
    $("#main_yearmonth_cb").change(function(){
        var cb_yearmonth=$("#main_yearmonth_cb").val();
        if(cb_yearmonth=="none"){
            return false;
        }
        $('.choice_button_cb .button_cb').removeClass('cur');
        
        var cb_one_ajax;
        var cb_three_ajax;
        var cb_six_ajax;
        var cb_year_ajax;
        var cb_firstone_ajax;
        var cb_yfanyear_ajax;
        var cb_twoyear_ajax;
        var cb_yfantwoyear_ajax;
        var cb_threeyear_ajax;
        var cb_yfanthreeyear_ajax;
        var cb_sanbiao_ajax;
        var cb_one_ajax_temp;
        var cb_three_ajax_temp;
        var cb_six_ajax_temp;
        var cb_year_ajax_temp;
        var cb_firstone_ajax_temp;
        var cb_yfanyear_ajax_temp;
        var cb_twoyear_ajax_temp;
        var cb_yfantwoyear_ajax_temp;
        var cb_threeyear_ajax_temp;
        var cb_yfanthreeyear_ajax_temp;
        var cb_sanbiao_ajax_temp;
        var cb_mydata_ajax;

        layer.load();
        $.ajax({
            type: "post",
            url: cb_ajax_url,
            data: {
                'yearmonth':cb_yearmonth
            },
            dataType: "json",
            success: function(data){
                if(data.status==0){
                    cb_one_ajax=data.data.cost_sum_one;
                    cb_three_ajax=data.data.cost_sum_three;
                    cb_six_ajax=data.data.cost_sum_six;
                    cb_year_ajax=data.data.cost_sum_year;
                    cb_firstone_ajax=data.data.cost_sum_firstone;
                    cb_yfanyear_ajax=data.data.cost_sum_yfanyear;
                    cb_twoyear_ajax=data.data.cost_sum_twoyear;
                    cb_yfantwoyear_ajax=data.data.cost_sum_yfantwoyear;
                    cb_threeyear_ajax=data.data.cost_sum_threeyear;
                    cb_yfanthreeyear_ajax=data.data.cost_sum_yfanthreeyear;
                    cb_sanbiao_ajax=data.data.cost_sum_sanbiao;
                    cb_one_ajax_temp=parseFloat(cb_one_ajax);
                    cb_three_ajax_temp=parseFloat(cb_three_ajax);
                    cb_six_ajax_temp=parseFloat(cb_six_ajax);
                    cb_year_ajax_temp=parseFloat(cb_year_ajax);
                    cb_firstone_ajax_temp=parseFloat(cb_firstone_ajax);
                    cb_yfanyear_ajax_temp=parseFloat(cb_yfanyear_ajax);
                    cb_twoyear_ajax_temp=parseFloat(cb_twoyear_ajax);
                    cb_yfantwoyear_ajax_temp=parseFloat(cb_yfantwoyear_ajax);
                    cb_threeyear_ajax_temp=parseFloat(cb_threeyear_ajax);
                    cb_yfanthreeyear_ajax_temp=parseFloat(cb_yfanthreeyear_ajax);
                    cb_sanbiao_ajax_temp=parseFloat(cb_sanbiao_ajax);

                    // cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['散标', cb_sanbiao_ajax_temp]];
                    cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['微年利II', cb_twoyear_ajax_temp],['微月盈II', cb_yfantwoyear_ajax_temp],['微年利III', cb_threeyear_ajax_temp],['微月盈III', cb_yfanthreeyear_ajax_temp]];
                    cb_charts.series[0].setData(cb_mydata_ajax);//数据填充到highcharts上面
                }else{
                    alert(data.info);
                }
                layer.closeAll('loading');

            }
         });
    });


    //日历筛选
    $('#do_choice_cb').click(function(){

        $('.choice_button_cb .button_cb').removeClass('cur');
        $("#main_yearmonth_cb").val('none');

        var start_date_cb=$('#start_date_cb').val();
        var end_date_cb=$('#end_date_cb').val();
        
        var cb_one_ajax;
        var cb_three_ajax;
        var cb_six_ajax;
        var cb_year_ajax;
        var cb_firstone_ajax;
        var cb_yfanyear_ajax;
        var cb_twoyear_ajax;
        var cb_yfantwoyear_ajax;
        var cb_threeyear_ajax;
        var cb_yfanthreeyear_ajax;
        var cb_sanbiao_ajax;
        var cb_one_ajax_temp;
        var cb_three_ajax_temp;
        var cb_six_ajax_temp;
        var cb_year_ajax_temp;
        var cb_firstone_ajax_temp;
        var cb_yfanyear_ajax_temp;
        var cb_twoyear_ajax_temp;
        var cb_yfantwoyear_ajax_temp;
        var cb_threeyear_ajax_temp;
        var cb_yfanthreeyear_ajax_temp;
        var cb_sanbiao_ajax_temp;
        var cb_mydata_ajax;
        
        layer.load();
        $.ajax({
            type: "post",
            url: cb_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_cb,
                'end_date':end_date_cb
            },
            dataType: "json",
            success: function(data){
                if(data.status==0){
                    cb_one_ajax=data.data.cost_sum_one;
                    cb_three_ajax=data.data.cost_sum_three;
                    cb_six_ajax=data.data.cost_sum_six;
                    cb_year_ajax=data.data.cost_sum_year;
                    cb_firstone_ajax=data.data.cost_sum_firstone;
                    cb_yfanyear_ajax=data.data.cost_sum_yfanyear;
                    cb_twoyear_ajax=data.data.cost_sum_twoyear;
                    cb_yfantwoyear_ajax=data.data.cost_sum_yfantwoyear;
                    cb_threeyear_ajax=data.data.cost_sum_threeyear;
                    cb_yfanthreeyear_ajax=data.data.cost_sum_yfanthreeyear;
                    cb_sanbiao_ajax=data.data.cost_sum_sanbiao;
                    cb_one_ajax_temp=parseFloat(cb_one_ajax);
                    cb_three_ajax_temp=parseFloat(cb_three_ajax);
                    cb_six_ajax_temp=parseFloat(cb_six_ajax);
                    cb_year_ajax_temp=parseFloat(cb_year_ajax);
                    cb_firstone_ajax_temp=parseFloat(cb_firstone_ajax);
                    cb_yfanyear_ajax_temp=parseFloat(cb_yfanyear_ajax);
                    cb_twoyear_ajax_temp=parseFloat(cb_twoyear_ajax);
                    cb_yfantwoyear_ajax_temp=parseFloat(cb_yfantwoyear_ajax);
                    cb_threeyear_ajax_temp=parseFloat(cb_threeyear_ajax);
                    cb_yfanthreeyear_ajax_temp=parseFloat(cb_yfanthreeyear_ajax);
                    cb_sanbiao_ajax_temp=parseFloat(cb_sanbiao_ajax);

                    // cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['散标', cb_sanbiao_ajax_temp]];
                    cb_mydata_ajax=[['微+宝', cb_one_ajax_temp],['微+1', cb_firstone_ajax_temp],['微+3', cb_three_ajax_temp],['微+6', cb_six_ajax_temp],['微年利', cb_year_ajax_temp],['微月盈', cb_yfanyear_ajax_temp],['微年利II', cb_twoyear_ajax_temp],['微月盈II', cb_yfantwoyear_ajax_temp],['微年利III', cb_threeyear_ajax_temp],['微月盈III', cb_yfanthreeyear_ajax_temp]];
                    cb_charts.series[0].setData(cb_mydata_ajax);//数据填充到highcharts上面

                }else{
                    alert(data.info);
                }
                layer.closeAll('loading');

            }
        });

    });

});