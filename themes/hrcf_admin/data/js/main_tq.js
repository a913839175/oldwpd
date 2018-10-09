;$(function () {

    laydate({
        elem: '#start_date_tq'
    });

    laydate({
        elem: '#end_date_tq'
    });

	var tq_ajax_url="/?hradmin&q=code/data/main&action=tq_ajax";

	var tq_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_tq",  // 注意这里一定是 ID 选择器
            type: 'bar'
        },
        title: {
            text: '地区提现数据'
        },
        xAxis: {
            categories: ['浙江', '上海', '成都', '北京', '海南'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '提现金额 (元)',
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
            name: '提现金额',
            data: [0, 0, 0, 0, 0]
        }]
    }); 


	var my_tq_area=[];
	var my_tq_money=[];
	$.ajax({
        type: "post",
        url: tq_ajax_url,
        data: {
        },
        dataType: "json",
        success: function(data){

            for(var j=0;j<data.data.length;j++){
                if(data.data[j]['province_name']==''||!data.data[j]['province_name']){
                    my_tq_area.push('未知地区');
                }else{
                    my_tq_area.push(data.data[j]['province_name']);
                }
            	my_tq_money.push(parseFloat(data.data[j]['sum']));
            }
            tq_charts.xAxis[0].setCategories(my_tq_area);//X轴
            tq_charts.series[0].setData(my_tq_money);//数据填充到highcharts上面
        }
    });



    //选择年月
    $("#main_yearmonth_tq").change(function(){
        var tq_yearmonth=$("#main_yearmonth_tq").val();
        if(tq_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_tq .button_tq').removeClass('cur');
        
        var my_tq_area_ajax=[];
        var my_tq_money_ajax=[];
        $.ajax({
            type: "post",
            url: tq_ajax_url,
            data: {
                'yearmonth':tq_yearmonth
            },
            dataType: "json",
            success: function(data){

                for(var j=0;j<data.data.length;j++){
                    if(data.data[j]['province_name']==''||!data.data[j]['province_name']){
                        my_tq_area_ajax.push('未知地区');
                    }else{
                        my_tq_area_ajax.push(data.data[j]['province_name']);
                    }
                    my_tq_money_ajax.push(parseFloat(data.data[j]['sum']));
                }
                tq_charts.xAxis[0].setCategories(my_tq_area_ajax);//X轴
                tq_charts.series[0].setData(my_tq_money_ajax);//数据填充到highcharts上面
            }
        });
    });


    //日历筛选
    $('#do_choice_tq').click(function(){

        $('.choice_button_tq .button_tq').removeClass('cur');
        $("#main_yearmonth_tq").val('none');

        var start_date_tq=$('#start_date_tq').val();
        var end_date_tq=$('#end_date_tq').val();
        
        var my_tq_area_ajax=[];
        var my_tq_money_ajax=[];

        $.ajax({
            type: "post",
            url: tq_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_tq,
                'end_date':end_date_tq
            },
            dataType: "json",
            success: function(data){

                for(var j=0;j<data.data.length;j++){
                    if(data.data[j]['province_name']==''||!data.data[j]['province_name']){
                        my_tq_area_ajax.push('未知地区');
                    }else{
                        my_tq_area_ajax.push(data.data[j]['province_name']);
                    }
                    my_tq_money_ajax.push(parseFloat(data.data[j]['sum']));
                }
                tq_charts.xAxis[0].setCategories(my_tq_area_ajax);//X轴
                tq_charts.series[0].setData(my_tq_money_ajax);//数据填充到highcharts上面
            }
        });

    });
	
});

