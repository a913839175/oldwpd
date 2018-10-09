;$(function () {

    laydate({
        elem: '#start_date_xb'
    });

    laydate({
        elem: '#end_date_xb'
    });


	var xb_ajax_url="/?hradmin&q=code/data/main&action=xb_ajax";


	
    var xb_man=$('#xb_man').val();
    var xb_woman=$('#xb_woman').val();
    var xb_other=$('#xb_other').val();
    var xb_man_temp=parseFloat(xb_man);
    var xb_woman_temp=parseFloat(xb_woman);
    var xb_other_temp=parseFloat(xb_other);
    var xb_mydata=[xb_man_temp,xb_woman_temp,xb_other_temp];

    var xb_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
            renderTo : "container_xb",  // 注意这里一定是 ID 选择器
            type: 'bar'
        },
        title: {
            text: '注册用户性别数据'
        },
        xAxis: {
            categories: ['男', '女', '未知'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '比例',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' %'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: '百分比',
            data: [0, 0, 0, 0, 0],
            dataLabels: {
                format: '{point.y:.2f}%', // one decimal
            }
        }]
    }); 

    xb_charts.series[0].setData(xb_mydata);//数据填充到highcharts上面

    //选择年月
    $("#main_yearmonth_xb").change(function(){
        var xb_yearmonth=$("#main_yearmonth_xb").val();
        if(xb_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_xb .button_xb').removeClass('cur');

        var xb_man_ajax;
        var xb_woman_ajax;
        var xb_other_ajax;
        var xb_man_ajax_temp;
        var xb_woman_ajax_temp;
        var xb_other_ajax_temp;
        var xb_mydata_ajax;
        
        $.ajax({
            type: "post",
            url: xb_ajax_url,
            data: {
                'yearmonth':xb_yearmonth
            },
            dataType: "json",
            success: function(data){
                
                xb_man_ajax=data.data.per_man;
                xb_woman_ajax=data.data.per_woman;
                xb_other_ajax=data.data.per_other;
                xb_man_ajax_temp=parseFloat(xb_man_ajax);
                xb_woman_ajax_temp=parseFloat(xb_woman_ajax);
                xb_other_ajax_temp=parseFloat(xb_other_ajax);

                xb_mydata_ajax=[xb_man_ajax_temp,xb_woman_ajax_temp,xb_other_ajax_temp];

                xb_charts.series[0].setData(xb_mydata_ajax);//数据填充到highcharts上面

            }
         });
    });


    //日历筛选
    $('#do_choice_xb').click(function(){

        $('.choice_button_xb .button_xb').removeClass('cur');
        $("#main_yearmonth_xb").val('none');

        var start_date_xb=$('#start_date_xb').val();
        var end_date_xb=$('#end_date_xb').val();
        
        var xb_man_ajax;
        var xb_woman_ajax;
        var xb_other_ajax;
        var xb_man_ajax_temp;
        var xb_woman_ajax_temp;
        var xb_other_ajax_temp;
        var xb_mydata_ajax;

        $.ajax({
            type: "post",
            url: xb_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_xb,
                'end_date':end_date_xb
            },
            dataType: "json",
            success: function(data){

                xb_man_ajax=data.data.per_man;
                xb_woman_ajax=data.data.per_woman;
                xb_other_ajax=data.data.per_other;
                xb_man_ajax_temp=parseFloat(xb_man_ajax);
                xb_woman_ajax_temp=parseFloat(xb_woman_ajax);
                xb_other_ajax_temp=parseFloat(xb_other_ajax);

                xb_mydata_ajax=[xb_man_ajax_temp,xb_woman_ajax_temp,xb_other_ajax_temp];

                xb_charts.series[0].setData(xb_mydata_ajax);//数据填充到highcharts上面
            }
        });

    });

});