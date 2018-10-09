;$(function () {
	var xd_ajax_url="/?hradmin&q=code/data/main&action=xd_ajax";


	var my_xd_this=$('#contrast_xd_this').val();
    var my_xd_last=$('#contrast_xd_last').val();
    var my_xd_this_temp=parseFloat(my_xd_this);
    var my_xd_last_temp=parseFloat(my_xd_last);
    var mydata_xd=[{
                name: "本月",
                y: my_xd_this_temp
            }, {
                name: "上月",
                y: my_xd_last_temp,
                sliced: true,
                selected: true
            }];

    var contrast_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_xd",  // 注意这里一定是 ID 选择器
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '本月-上月提现数据对比'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.2f}人</b>'
        },
        series: [{
            name: "提现金额",
            colorByPoint: true,
            data: [{
                name: "本月",
                y: 0
            }, {
                name: "上月",
                y: 0,
                sliced: true,
                selected: true
            }]
        }]
    }); 

    contrast_charts.series[0].setData(mydata_xd);//数据填充到highcharts上面


    //选择年月
    $("#main_yearmonth_xd").change(function(){
        var xd_yearmonth=$("#main_yearmonth_xd").val();
        if(xd_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_xd .button_xd').removeClass('cur');
        
        $.ajax({
            type: "post",
            url: xd_ajax_url,
            data: {
                'yearmonth':xd_yearmonth
            },
            dataType: "json",
            success: function(data){

                var xd_mydata_ajax=[{
                    name: "本月",
                    y: parseFloat(data.data.sum_this)
                }, {
                    name: "上月",
                    y: parseFloat(data.data.sum_last),
                    sliced: true,
                    selected: true
                }];
                contrast_charts.series[0].setData(xd_mydata_ajax);//数据填充到highcharts上面
                
            }
        });
    });

});