;$(function () {


	var hongbao_rs_ajax_url="/?user&q=code/frontdata/hongbaopeople_ajax";

	var hongbao_rs_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_hongbao_rs",  // 注意这里一定是 ID 选择器
            type: 'line'
        },
        title: {
            text: '红包注册人数'
        },
        subtitle: {
            // text: '投资-充值'
        },
        xAxis: {
            categories: ['2015-01-01', '2015-01-02', '2015-01-03', '2015-01-04', '2015-01-05', '2015-01-06', '2015-01-07', '2015-01-08', '2015-01-09', '2015-01-10', '2015-01-11', '2015-01-12', '2015-01-13', '2015-01-14', '2015-01-15', '2015-01-16', '2015-01-17', '2015-01-18', '2015-01-19', '2015-01-20','2015-01-21', '2015-01-22', '2015-01-23', '2015-01-24', '2015-01-25', '2015-01-26', '2015-01-27', '2015-01-28', '2015-01-29', '2015-01-30', '2015-01-31']
        },
        yAxis: {
            title: {
                text: '人数'
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
            name: '注册人数',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }]
    }); 
	

	var my_hongbao_renshu=[];
	var now_month=$('#month_hongbao_rs').val()
	$.ajax({
        type: "post",
        url: hongbao_rs_ajax_url,
        data: {
            "month":now_month
        },
        dataType: "json",
        success: function(data){

            for(var j=0;j<data.data.register.length;j++){
            	my_hongbao_renshu.push(parseFloat(data.data.register[j]));
            }

            hongbao_rs_charts.series[0].setData(my_hongbao_renshu);//数据填充到highcharts上面
           	hongbao_rs_charts.xAxis[0].setCategories(data.data.categories);//X轴
        }
    });



    //选择年月
    $("#do_choice_hongbao_rs").click(function(){
        var my_hongbao_renshu_ajax=[];
		var now_month_ajax=$('#month_hongbao_rs').val()
		$.ajax({
	        type: "get",
	        url: hongbao_rs_ajax_url,
	        data: {
	            "month":now_month_ajax
	        },
	        dataType: "json",
	        success: function(data){

	            for(var j=0;j<data.data.register.length;j++){
	            	my_hongbao_renshu_ajax.push(parseFloat(data.data.register[j]));
	            }

	            hongbao_rs_charts.series[0].setData(my_hongbao_renshu_ajax);//数据填充到highcharts上面
	           	hongbao_rs_charts.xAxis[0].setCategories(data.data.categories);//X轴
	        }
	    });
    });

});