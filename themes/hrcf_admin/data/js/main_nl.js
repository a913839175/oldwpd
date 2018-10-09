;$(function () {

    laydate({
        elem: '#start_date_nl'
    });

    laydate({
        elem: '#end_date_nl'
    });

	var nl_ajax_url="/?hradmin&q=code/data/main&action=nl_ajax";


	
    var nl_one=$('#nl_one').val();
    var nl_two=$('#nl_two').val();
    var nl_three=$('#nl_three').val();
    var nl_four=$('#nl_four').val();
    var nl_five=$('#nl_five').val();
    var nl_six=$('#nl_six').val();
    var nl_seven=$('#nl_seven').val();
    var nl_eight=$('#nl_eight').val();
    var nl_other=$('#nl_other').val();
    var nl_one_temp=parseFloat(nl_one);
    var nl_two_temp=parseFloat(nl_two);
    var nl_three_temp=parseFloat(nl_three);
    var nl_four_temp=parseFloat(nl_four);
    var nl_five_temp=parseFloat(nl_five);
    var nl_six_temp=parseFloat(nl_six);
    var nl_seven_temp=parseFloat(nl_seven);
    var nl_eight_temp=parseFloat(nl_eight);
    var nl_other_temp=parseFloat(nl_other);
    var nl_mydata=[nl_one_temp,nl_two_temp,nl_three_temp,nl_four_temp,nl_five_temp,nl_six_temp,nl_seven_temp,nl_eight_temp,nl_other_temp];

    var nl_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
            renderTo : "container_nl",  // 注意这里一定是 ID 选择器
            type: 'bar'
        },
        title: {
            text: '注册用户年龄数据'
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

    nl_charts.series[0].setData(nl_mydata);//数据填充到highcharts上面



    //选择年月
    $("#main_yearmonth_nl").change(function(){
        var nl_yearmonth=$("#main_yearmonth_nl").val();
        if(nl_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_nl .button_nl').removeClass('cur');
        

        var nl_one_ajax;
        var nl_two_ajax;
        var nl_three_ajax;
        var nl_four_ajax;
        var nl_five_ajax;
        var nl_six_ajax;
        var nl_seven_ajax;
        var nl_eight_ajax;
        var nl_other_ajax;
        var nl_one_ajax_temp;
        var nl_two_ajax_temp;
        var nl_three_ajax_temp;
        var nl_four_ajax_temp;
        var nl_five_ajax_temp;
        var nl_six_ajax_temp;
        var nl_seven_ajax_temp;
        var nl_eight_ajax_temp;
        var nl_other_ajax_temp;
        var nl_mydata_ajax;
        $.ajax({
            type: "post",
            url: nl_ajax_url,
            data: {
                'yearmonth':nl_yearmonth
            },
            dataType: "json",
            success: function(data){

                nl_one_ajax=data.data.per_one;
                nl_two_ajax=data.data.per_two;
                nl_three_ajax=data.data.per_three;
                nl_four_ajax=data.data.per_four;
                nl_five_ajax=data.data.per_five;
                nl_six_ajax=data.data.per_six;
                nl_seven_ajax=data.data.per_seven;
                nl_eight_ajax=data.data.per_eight;
                nl_other_ajax=data.data.per_other;

                nl_one_ajax_temp=parseFloat(nl_one_ajax);
                nl_two_ajax_temp=parseFloat(nl_two_ajax);
                nl_three_ajax_temp=parseFloat(nl_three_ajax);
                nl_four_ajax_temp=parseFloat(nl_four_ajax);
                nl_five_ajax_temp=parseFloat(nl_five_ajax);
                nl_six_ajax_temp=parseFloat(nl_six_ajax);
                nl_seven_ajax_temp=parseFloat(nl_seven_ajax);
                nl_eight_ajax_temp=parseFloat(nl_eight_ajax);
                nl_other_ajax_temp=parseFloat(nl_other_ajax);

                nl_mydata_ajax=[nl_one_ajax_temp,nl_two_ajax_temp,nl_three_ajax_temp,nl_four_ajax_temp,nl_five_ajax_temp,nl_six_ajax_temp,nl_seven_ajax_temp,nl_eight_ajax_temp,nl_other_ajax_temp];
                
                nl_charts.series[0].setData(nl_mydata_ajax);//数据填充到highcharts上面
                

            }
         });
    });


    //日历筛选
    $('#do_choice_nl').click(function(){

        $('.choice_button_nl .button_nl').removeClass('cur');
        $("#main_yearmonth_nl").val('none');

        var start_date_nl=$('#start_date_nl').val();
        var end_date_nl=$('#end_date_nl').val();
        
        var nl_one_ajax;
        var nl_two_ajax;
        var nl_three_ajax;
        var nl_four_ajax;
        var nl_five_ajax;
        var nl_six_ajax;
        var nl_seven_ajax;
        var nl_eight_ajax;
        var nl_other_ajax;
        var nl_one_ajax_temp;
        var nl_two_ajax_temp;
        var nl_three_ajax_temp;
        var nl_four_ajax_temp;
        var nl_five_ajax_temp;
        var nl_six_ajax_temp;
        var nl_seven_ajax_temp;
        var nl_eight_ajax_temp;
        var nl_other_ajax_temp;
        var nl_mydata_ajax;
        $.ajax({
            type: "post",
            url: nl_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_nl,
                'end_date':end_date_nl
            },
            dataType: "json",
            success: function(data){

                nl_one_ajax=data.data.per_one;
                nl_two_ajax=data.data.per_two;
                nl_three_ajax=data.data.per_three;
                nl_four_ajax=data.data.per_four;
                nl_five_ajax=data.data.per_five;
                nl_six_ajax=data.data.per_six;
                nl_seven_ajax=data.data.per_seven;
                nl_eight_ajax=data.data.per_eight;
                nl_other_ajax=data.data.per_other;

                nl_one_ajax_temp=parseFloat(nl_one_ajax);
                nl_two_ajax_temp=parseFloat(nl_two_ajax);
                nl_three_ajax_temp=parseFloat(nl_three_ajax);
                nl_four_ajax_temp=parseFloat(nl_four_ajax);
                nl_five_ajax_temp=parseFloat(nl_five_ajax);
                nl_six_ajax_temp=parseFloat(nl_six_ajax);
                nl_seven_ajax_temp=parseFloat(nl_seven_ajax);
                nl_eight_ajax_temp=parseFloat(nl_eight_ajax);
                nl_other_ajax_temp=parseFloat(nl_other_ajax);

                nl_mydata_ajax=[nl_one_ajax_temp,nl_two_ajax_temp,nl_three_ajax_temp,nl_four_ajax_temp,nl_five_ajax_temp,nl_six_ajax_temp,nl_seven_ajax_temp,nl_eight_ajax_temp,nl_other_ajax_temp];
                
                nl_charts.series[0].setData(nl_mydata_ajax);//数据填充到highcharts上面
            }
        });

    });

});