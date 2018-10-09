;$(function () {

    laydate({
        elem: '#start_date_tx'
    });

    laydate({
        elem: '#end_date_tx'
    });

	var tx_ajax_url="/?hradmin&q=code/data/main&action=tx_ajax";


	var tx_one=$('#tx_one').val();
    var tx_one_temp=parseFloat(tx_one);
    var tx_mydata=[['提现金额', tx_one_temp]];

    var tx_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_tx",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '提现数据统计'
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
                text: '提现金额 (元)'
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
            name: '提现',
            colorByPoint: true,
            data: [
                ['微+宝', 0],
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

    tx_charts.series[0].setData(tx_mydata);//数据填充到highcharts上面


    //全部
    $("#all_tx").click(function(){
        $('.choice_button_tx .button_tx').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tx").val('none');
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'all':'all'
            },
            dataType: "json",
            success: function(data){
                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//昨天
    $("#yesterday_tx").click(function(){
        $('.choice_button_tx .button_tx').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tx").val('none');
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //今天
    $("#today_tx").click(function(){
        $('.choice_button_tx .button_tx').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tx").val('none');
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近7天
    $("#sevenday_tx").click(function(){
        $('.choice_button_tx .button_tx').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tx").val('none');
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	
	//最近15天
    $("#fifteenday_tx").click(function(){
        $('.choice_button_tx .button_tx').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tx").val('none');
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

	//最近30天
    $("#thirtyday_tx").click(function(){
        $('.choice_button_tx .button_tx').removeClass('cur');
        $(this).addClass('cur');

        $("#main_yearmonth_tx").val('none');
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //选择年月
    $("#main_yearmonth_tx").change(function(){
        var tx_yearmonth=$("#main_yearmonth_tx").val();
        if(tx_yearmonth=="none"){
            return false;
        }
        $('.choice_button_tx .button_tx').removeClass('cur');
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'yearmonth':tx_yearmonth
            },
            dataType: "json",
            success: function(data){
                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //日历筛选
    $('#do_choice_tx').click(function(){

        $('.choice_button_tx .button_tx').removeClass('cur');
        $("#main_yearmonth_tx").val('none');

        var start_date_tx=$('#start_date_tx').val();
        var end_date_tx=$('#end_date_tx').val();
        
        var tx_one_ajax;
        var tx_one_ajax_temp;
        var tx_mydata_ajax;
        $.ajax({
            type: "post",
            url: tx_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_tx,
                'end_date':end_date_tx
            },
            dataType: "json",
            success: function(data){

                tx_one_ajax=data.data.sum_one;
                tx_one_ajax_temp=parseFloat(tx_one_ajax);

                tx_mydata_ajax=[['提现金额', tx_one_ajax_temp]];
                tx_charts.series[0].setData(tx_mydata_ajax);//数据填充到highcharts上面
            }
        });

    });

});