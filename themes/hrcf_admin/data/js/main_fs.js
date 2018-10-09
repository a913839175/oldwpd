;$(function () {

    laydate({
        elem: '#start_date_fs'
    });

    laydate({
        elem: '#end_date_fs'
    });

	var fs_ajax_url="/?hradmin&q=code/data/main&action=fs_ajax";


	var fs_pc=$('#fs_pc').val();
    var fs_app=$('#fs_app').val();
    var fs_wx=$('#fs_wx').val();
    var fs_pc_temp=parseInt(fs_pc);
    var fs_app_temp=parseInt(fs_app);
    var fs_wx_temp=parseInt(fs_wx);
    var fs_mydata=[['PC', fs_pc_temp],['微信', fs_wx_temp],['APP', fs_app_temp]];

    var fs_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_fs",  // 注意这里一定是 ID 选择器
            type: 'column'
        },
        title: {
            text: '投资人数对比'
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
                ['PC', 0],
                ['微信', 0],
                ['APP', 0],
            ],
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y}', // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    }); 

    fs_charts.series[0].setData(fs_mydata);//数据填充到highcharts上面



    //全部
    $("#all_fs").click(function(){
        $('.choice_button_fs .button_fs').removeClass('cur');
        $(this).addClass('cur');
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;
        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'all':'all'
            },
            dataType: "json",
            success: function(data){
                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //今天
    $("#today_fs").click(function(){
        $('.choice_button_fs .button_fs').removeClass('cur');
        $(this).addClass('cur');
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;
        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(data){
                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //昨天
    $("#yesterday_fs").click(function(){
        $('.choice_button_fs .button_fs').removeClass('cur');
        $(this).addClass('cur');
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;
        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(data){
                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });

    //最近7天
    $("#sevenday_fs").click(function(){
        $('.choice_button_fs .button_fs').removeClass('cur');
        $(this).addClass('cur');
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;
        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(data){
                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //最近15天
    $("#fifteenday_fs").click(function(){
        $('.choice_button_fs .button_fs').removeClass('cur');
        $(this).addClass('cur');
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;
        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(data){
                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //最近30天
    $("#thirtyday_fs").click(function(){
        $('.choice_button_fs .button_fs').removeClass('cur');
        $(this).addClass('cur');
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;
        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(data){
                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //选择年月
    $("#main_yearmonth_fs").change(function(){
        var fs_yearmonth=$("#main_yearmonth_fs").val();
        if(fs_yearmonth=="none"){
            return false;
        }
        $('.choice_button_fs .button_fs').removeClass('cur');
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;
        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'yearmonth':fs_yearmonth
            },
            dataType: "json",
            success: function(data){
                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //日历筛选
    $('#do_choice_fs').click(function(){

        $('.choice_button_fs .button_fs').removeClass('cur');
        $("#main_yearmonth_fs").val('none');

        var start_date_fs=$('#start_date_fs').val();
        var end_date_fs=$('#end_date_fs').val();
        
        var fs_pc_ajax;
        var fs_app_ajax;
        var fs_wx_ajax;
        var fs_pc_ajax_temp;
        var fs_app_ajax_temp;
        var fs_wx_ajax_temp;
        var fs_mydata_ajax;

        $.ajax({
            type: "post",
            url: fs_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_fs,
                'end_date':end_date_fs
            },
            dataType: "json",
            success: function(data){

                fs_pc_ajax=data.data.count_pc;
                fs_app_ajax=data.data.count_app;
                fs_wx_ajax=data.data.count_wx;
                fs_pc_ajax_temp=parseInt(fs_pc_ajax);
                fs_app_ajax_temp=parseInt(fs_app_ajax);
                fs_wx_ajax_temp=parseInt(fs_wx_ajax);

                fs_mydata_ajax=[['PC', fs_pc_ajax_temp],['微信', fs_wx_ajax_temp],['APP', fs_app_ajax_temp]];
                fs_charts.series[0].setData(fs_mydata_ajax);//数据填充到highcharts上面
            }
        });

    });

});