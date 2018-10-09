;$(function () {
	var zd_ajax_url="/?hradmin&q=code/data/main&action=zd_ajax";


	var my_zd_this=$('#contrast_zd_this').val();
    var my_zd_last=$('#contrast_zd_last').val();
    var my_zd_this_temp=parseFloat(my_zd_this);
    var my_zd_last_temp=parseFloat(my_zd_last);
    var mydata_zd=[{
                name: "本月",
                y: my_zd_this_temp
            }, {
                name: "上月",
                y: my_zd_last_temp,
                sliced: true,
                selected: true
            }];

    var contrast_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_zd",  // 注意这里一定是 ID 选择器
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '本月-上月注册数据对比'
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
            pointFormat: '{series.name}: <b>{point.y}人</b>'
        },
        series: [{
            name: "总人数",
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

    contrast_charts.series[0].setData(mydata_zd);//数据填充到highcharts上面


    //选择年月
    $("#main_yearmonth_zd").change(function(){
        var zd_yearmonth=$("#main_yearmonth_zd").val();
        if(zd_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_zd .button_zd').removeClass('cur');
        
        $.ajax({
            type: "post",
            url: zd_ajax_url,
            data: {
                'yearmonth':zd_yearmonth
            },
            dataType: "json",
            success: function(data){

                var zd_mydata_ajax=[{
                    name: "本月",
                    y: parseFloat(data.data.sum_this)
                }, {
                    name: "上月",
                    y: parseFloat(data.data.sum_last),
                    sliced: true,
                    selected: true
                }];
                contrast_charts.series[0].setData(zd_mydata_ajax);//数据填充到highcharts上面
                
            }
        });
    });

});