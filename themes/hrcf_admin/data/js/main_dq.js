;$(function () {

    laydate({
        elem: '#start_date_dq'
    });

    laydate({
        elem: '#end_date_dq'
    });

	var dq_ajax_url="/?hradmin&q=code/data/main&action=dq_ajax";

	var dq_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_dq",  // 注意这里一定是 ID 选择器
            type: 'bar'
        },
        title: {
            text: '地区投资数据'
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
                text: '投资金额 (元)',
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
            name: '投资金额',
            data: [400, 0, 200, 30, 0]
        }]
    }); 


	var my_dq_area=[];
	var my_dq_money=[];
	$.ajax({
        type: "post",
        url: dq_ajax_url,
        data: {
        },
        dataType: "json",
        success: function(data){

            for(var j=0;j<data.data.length;j++){
                if(data.data[j]['province_name']==''||!data.data[j]['province_name']){
                    my_dq_area.push('未知地区');
                }else{
                    my_dq_area.push(data.data[j]['province_name']);
                }
            	my_dq_money.push(parseFloat(data.data[j]['sum']));
            }
            dq_charts.xAxis[0].setCategories(my_dq_area);//X轴
            dq_charts.series[0].setData(my_dq_money);//数据填充到highcharts上面
        }
    });



    //选择年月
    $("#main_yearmonth_dq").change(function(){
        var dq_yearmonth=$("#main_yearmonth_dq").val();
        if(dq_yearmonth=="none"){
            return false;
        }
        // $('.choice_button_dq .button_dq').removeClass('cur');
        
        var my_dq_area_ajax=[];
        var my_dq_money_ajax=[];
        $.ajax({
            type: "post",
            url: dq_ajax_url,
            data: {
                'yearmonth':dq_yearmonth
            },
            dataType: "json",
            success: function(data){

                for(var j=0;j<data.data.length;j++){
                    if(data.data[j]['province_name']==''||!data.data[j]['province_name']){
                        my_dq_area_ajax.push('未知地区');
                    }else{
                        my_dq_area_ajax.push(data.data[j]['province_name']);
                    }
                    my_dq_money_ajax.push(parseFloat(data.data[j]['sum']));
                }
                dq_charts.xAxis[0].setCategories(my_dq_area_ajax);//X轴
                dq_charts.series[0].setData(my_dq_money_ajax);//数据填充到highcharts上面
            }
        });
    });


    //日历筛选
    $('#do_choice_dq').click(function(){

        $('.choice_button_dq .button_dq').removeClass('cur');
        $("#main_yearmonth_dq").val('none');

        var start_date_dq=$('#start_date_dq').val();
        var end_date_dq=$('#end_date_dq').val();
        

        var my_dq_area_ajax=[];
        var my_dq_money_ajax=[];
        $.ajax({
            type: "post",
            url: dq_ajax_url,
            data: {
                'date':'date',
                'start_date':start_date_dq,
                'end_date':end_date_dq
            },
            dataType: "json",
            success: function(data){
                
                for(var j=0;j<data.data.length;j++){
                    if(data.data[j]['province_name']==''||!data.data[j]['province_name']){
                        my_dq_area_ajax.push('未知地区');
                    }else{
                        my_dq_area_ajax.push(data.data[j]['province_name']);
                    }
                    my_dq_money_ajax.push(parseFloat(data.data[j]['sum']));
                }
                dq_charts.xAxis[0].setCategories(my_dq_area_ajax);//X轴
                dq_charts.series[0].setData(my_dq_money_ajax);//数据填充到highcharts上面

            }
        });

    });
	
});

