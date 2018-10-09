;$(function () {
	var td_ajax_url="/?hradmin&q=code/data/main&action=td_ajax";


	var my_td_this=$('#contrast_td_this').val();
    var my_td_last=$('#contrast_td_last').val();
    var my_td_this_temp=parseFloat(my_td_this);
    var my_td_last_temp=parseFloat(my_td_last);
    var mydata_td=[{
                name: "本月",
                y: my_td_this_temp
            }, {
                name: "上月",
                y: my_td_last_temp,
                sliced: true,
                selected: true
            }];

    var contrast_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart : {
            renderTo : "container_td",  // 注意这里一定是 ID 选择器
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '本月-上月投资数据对比'
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
            pointFormat: '{series.name}: <b>{point.y:.2f}元</b>'
        },
        series: [{
            name: "总金额",
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

    contrast_charts.series[0].setData(mydata_td);//数据填充到highcharts上面


    //选择年月
    $("#main_yearmonth_td").change(function(){
        var td_yearmonth=$("#main_yearmonth_td").val();
        if(td_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_td .button_td').removeClass('cur');
        
        $.ajax({
            type: "post",
            url: td_ajax_url,
            data: {
                'yearmonth':td_yearmonth
            },
            dataType: "json",
            success: function(data){

                var td_mydata_ajax=[{
                    name: "本月",
                    y: parseFloat(data.data.sum_this)
                }, {
                    name: "上月",
                    y: parseFloat(data.data.sum_last),
                    sliced: true,
                    selected: true
                }];
                contrast_charts.series[0].setData(td_mydata_ajax);//数据填充到highcharts上面
                
            }
        });
    });

});