;$(function () {


	var spring_2016_ajax_url="/?user&q=code/frontdata/spring_2016_ajax";

	var spring_2016_charts = new Highcharts.Chart({
        // Highcharts 配置
        chart: {
        	renderTo : "container_spring_2016",  // 注意这里一定是 ID 选择器
            type: 'line'
        },
        title: {
            text: '2016春节活动'
        },
        subtitle: {

        },
        xAxis: {
            categories: ['02-01', '02-02', '02-03', '02-04', '02-05', '02-06', '02-07', '02-08', '02-09', '02-10', '02-11', '02-12', '02-13', '02-14', '02-15', '02-16', '02-17', '02-18', '02-19', '02-20', '02-21', '02-22', '02-23', '02-24', '02-25']
        },
        yAxis: {
            title: {
                text: '红包个数/投资人数'
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
            name: '所有红包',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }, {
            name: '投资红包',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }, {
            name: '投资次数',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }, {
            name: '投资金额(万)',
            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
        }]
    }); 
	

	var spring_2016_all_red=[];
	var spring_2016_tender_red=[];
	var spring_2016_tender_times=[];
	var spring_2016_tender_money=[];
	$.ajax({
        type: "post",
        url: spring_2016_ajax_url,
        data: {
            'today':'today'
        },
        dataType: "json",
        success: function(data){

            for(var j=0;j<data.data.allred.length;j++){
            	spring_2016_all_red.push(parseFloat(data.data.allred[j]));
            }

            for(var i=0;i<data.data.tenderred.length;i++){
            	spring_2016_tender_red.push(parseFloat(data.data.tenderred[i]));
            }

            for(var k=0;k<data.data.tendertimes.length;k++){
            	spring_2016_tender_times.push(parseFloat(data.data.tendertimes[k]));
            }

            for(var m=0;m<data.data.tendertimes.length;m++){
            	spring_2016_tender_money.push(parseFloat(data.data.tendermoney[m]));
            }

            spring_2016_charts.series[0].setData(spring_2016_all_red);//数据填充到highcharts上面
            spring_2016_charts.series[1].setData(spring_2016_tender_red);//数据填充到highcharts上面
            spring_2016_charts.series[2].setData(spring_2016_tender_times);//数据填充到highcharts上面
            spring_2016_charts.series[3].setData(spring_2016_tender_money);//数据填充到highcharts上面
            // spring_2016_charts.xAxis[0].setCategories(data.data.categories);//X轴
        }
    });

});