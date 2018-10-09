;$(function () {


	var wei_je_ajax_url="/?user&q=code/frontdata/weiaccount_ajax";

	var wei_je_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_wei_je",  // 注意这里一定是 ID 选择器
            type: 'line'
        },
        title: {
            text: '投资金额'
        },
        subtitle: {
            // text: '投资-充值'
        },
        xAxis: {
            categories: ['2015-01-01', '2015-01-02', '2015-01-03', '2015-01-04', '2015-01-05', '2015-01-06', '2015-01-07', '2015-01-08', '2015-01-09', '2015-01-10', '2015-01-11', '2015-01-12', '2015-01-13', '2015-01-14', '2015-01-15', '2015-01-16', '2015-01-17', '2015-01-18', '2015-01-19', '2015-01-20','2015-01-21', '2015-01-22', '2015-01-23', '2015-01-24', '2015-01-25', '2015-01-26', '2015-01-27', '2015-01-28', '2015-01-29', '2015-01-30', '2015-01-31']
        },
        yAxis: {
            title: {
                text: '金额(元)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                // enableMouseTracking: false
            }
        },
        series: [{
            name: '投资金额',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }]
    }); 
	

	var my_wei_jine=[];
	var now_month=$('#month_wei_je').val()
	$.ajax({
        type: "post",
        url: wei_je_ajax_url,
        data: {
            "month":now_month
        },
        dataType: "json",
        success: function(data){

            for(var j=0;j<data.data.tender.length;j++){
            	my_wei_jine.push(parseFloat(data.data.tender[j]));
            }

            wei_je_charts.series[0].setData(my_wei_jine);//数据填充到highcharts上面
           	wei_je_charts.xAxis[0].setCategories(data.data.categories);//X轴
        }
    });



    //选择年月
    $("#do_choice_wei_je").click(function(){
        var my_wei_jine_ajax=[];
		var now_month_ajax=$('#month_wei_je').val()
		$.ajax({
	        type: "get",
	        url: wei_je_ajax_url,
	        data: {
	            "month":now_month_ajax
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.tender.length;j++){
	            	my_wei_jine_ajax.push(parseFloat(data.data.tender[j]));
	            }

	            wei_je_charts.series[0].setData(my_wei_jine_ajax);//数据填充到highcharts上面
	           	wei_je_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

});