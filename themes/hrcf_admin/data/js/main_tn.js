;$(function () {

    laydate({
        elem: '#start_date_tn'
    });

    laydate({
        elem: '#end_date_tn'
    });

	var tn_ajax_url="/?hradmin&q=code/data/main&action=tn_ajax";


	
    var tn_one=$('#tn_one').val();
    var tn_two=$('#tn_two').val();
    var tn_three=$('#tn_three').val();
    var tn_four=$('#tn_four').val();
    var tn_five=$('#tn_five').val();
    var tn_six=$('#tn_six').val();
    var tn_seven=$('#tn_seven').val();
    var tn_eight=$('#tn_eight').val();
    var tn_other=$('#tn_other').val();
    var tn_one_temp=parseFloat(tn_one);
    var tn_two_temp=parseFloat(tn_two);
    var tn_three_temp=parseFloat(tn_three);
    var tn_four_temp=parseFloat(tn_four);
    var tn_five_temp=parseFloat(tn_five);
    var tn_six_temp=parseFloat(tn_six);
    var tn_seven_temp=parseFloat(tn_seven);
    var tn_eight_temp=parseFloat(tn_eight);
    var tn_other_temp=parseFloat(tn_other);
    var tn_mydata=[tn_one_temp,tn_two_temp,tn_three_temp,tn_four_temp,tn_five_temp,tn_six_temp,tn_seven_temp,tn_eight_temp,tn_other_temp];

    var tn_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
            renderTo : "container_tn",  // 注意这里一定是 ID 选择器
            type: 'bar'
        },
        title: {
            text: '投资年龄数据'
        },
        xAxis: {
            categories: ['10-19岁', '20-29岁', '30-39岁', '40-49岁', '50-59岁', '60-69岁', '70-79岁', '80-89岁', '其他'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '金额',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' 元'
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
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0],
            dataLabels: {
                format: '{point.y:.2f}', // one decimal
            }
        }]
    }); 

    tn_charts.series[0].setData(tn_mydata);//数据填充到highcharts上面



    //选择年月
    $("#main_yearmonth_tn").change(function(){
        var tn_yearmonth=$("#main_yearmonth_tn").val();
        if(tn_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_tn .button_tn').removeClass('cur');
        

        var tn_one_ajax;
        var tn_two_ajax;
        var tn_three_ajax;
        var tn_four_ajax;
        var tn_five_ajax;
        var tn_six_ajax;
        var tn_seven_ajax;
        var tn_eight_ajax;
        var tn_other_ajax;
        var tn_one_ajax_temp;
        var tn_two_ajax_temp;
        var tn_three_ajax_temp;
        var tn_four_ajax_temp;
        var tn_five_ajax_temp;
        var tn_six_ajax_temp;
        var tn_seven_ajax_temp;
        var tn_eight_ajax_temp;
        var tn_other_ajax_temp;
        var tn_mydata_ajax;
        $.ajax({
            type: "post",
            url: tn_ajax_url,
            data: {
                'yearmonth':tn_yearmonth
            },
            dataType: "json",
            success: function(data){

                tn_one_ajax=data.data.sum_one;
                tn_two_ajax=data.data.sum_two;
                tn_three_ajax=data.data.sum_three;
                tn_four_ajax=data.data.sum_four;
                tn_five_ajax=data.data.sum_five;
                tn_six_ajax=data.data.sum_six;
                tn_seven_ajax=data.data.sum_seven;
                tn_eight_ajax=data.data.sum_eight;
                tn_other_ajax=data.data.sum_other;

                tn_one_ajax_temp=parseFloat(tn_one_ajax);
                tn_two_ajax_temp=parseFloat(tn_two_ajax);
                tn_three_ajax_temp=parseFloat(tn_three_ajax);
                tn_four_ajax_temp=parseFloat(tn_four_ajax);
                tn_five_ajax_temp=parseFloat(tn_five_ajax);
                tn_six_ajax_temp=parseFloat(tn_six_ajax);
                tn_seven_ajax_temp=parseFloat(tn_seven_ajax);
                tn_eight_ajax_temp=parseFloat(tn_eight_ajax);
                tn_other_ajax_temp=parseFloat(tn_other_ajax);

                tn_mydata_ajax=[tn_one_ajax_temp,tn_two_ajax_temp,tn_three_ajax_temp,tn_four_ajax_temp,tn_five_ajax_temp,tn_six_ajax_temp,tn_seven_ajax_temp,tn_eight_ajax_temp,tn_other_ajax_temp];
                
                tn_charts.series[0].setData(tn_mydata_ajax);//数据填充到highcharts上面
                

            }
         });
    });


    //日历筛选
    $('#do_choice_tn').click(function(){

        $('.choice_button_tn .button_tn').removeClass('cur');
        $("#main_yearmonth_tn").val('none');

        var start_date_tn=$('#start_date_tn').val();
        var end_date_tn=$('#end_date_tn').val();
        
        var tn_one_ajax;
        var tn_two_ajax;
        var tn_three_ajax;
        var tn_four_ajax;
        var tn_five_ajax;
        var tn_six_ajax;
        var tn_seven_ajax;
        var tn_eight_ajax;
        var tn_other_ajax;
        var tn_one_ajax_temp;
        var tn_two_ajax_temp;
        var tn_three_ajax_temp;
        var tn_four_ajax_temp;
        var tn_five_ajax_temp;
        var tn_six_ajax_temp;
        var tn_seven_ajax_temp;
        var tn_eight_ajax_temp;
        var tn_other_ajax_temp;
        var tn_mydata_ajax;
        $.ajax({
            type: "post",
            url: tn_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_tn,
                'end_date':end_date_tn
            },
            dataType: "json",
            success: function(data){

                tn_one_ajax=data.data.sum_one;
                tn_two_ajax=data.data.sum_two;
                tn_three_ajax=data.data.sum_three;
                tn_four_ajax=data.data.sum_four;
                tn_five_ajax=data.data.sum_five;
                tn_six_ajax=data.data.sum_six;
                tn_seven_ajax=data.data.sum_seven;
                tn_eight_ajax=data.data.sum_eight;
                tn_other_ajax=data.data.sum_other;

                tn_one_ajax_temp=parseFloat(tn_one_ajax);
                tn_two_ajax_temp=parseFloat(tn_two_ajax);
                tn_three_ajax_temp=parseFloat(tn_three_ajax);
                tn_four_ajax_temp=parseFloat(tn_four_ajax);
                tn_five_ajax_temp=parseFloat(tn_five_ajax);
                tn_six_ajax_temp=parseFloat(tn_six_ajax);
                tn_seven_ajax_temp=parseFloat(tn_seven_ajax);
                tn_eight_ajax_temp=parseFloat(tn_eight_ajax);
                tn_other_ajax_temp=parseFloat(tn_other_ajax);

                tn_mydata_ajax=[tn_one_ajax_temp,tn_two_ajax_temp,tn_three_ajax_temp,tn_four_ajax_temp,tn_five_ajax_temp,tn_six_ajax_temp,tn_seven_ajax_temp,tn_eight_ajax_temp,tn_other_ajax_temp];
                
                tn_charts.series[0].setData(tn_mydata_ajax);//数据填充到highcharts上面
            }
        });

    });

});