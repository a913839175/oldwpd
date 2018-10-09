;$(function () {

	laydate({
        elem: '#start_date_tdt'
    });

    laydate({
        elem: '#end_date_tdt'
    });

	var tdt_ajax_url="/?hradmin&q=code/data/main&action=tdt_ajax";


	$.ajax({
        type: "post",
        url: tdt_ajax_url,
        dataType: "json",
        success: function(d){
            var data;
            data=d.data;

            var i = 1;
			for(k in data){
				if(i <= 12){
					var _cls = i < 4 ? 'active' : ''; 
					$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
				}else if(i <= 24){
					$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
				}else{
					$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
				}
			}

			var mapObj_1 = {};
			// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
			var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
			
			$('#tenderMap').SVGMap({
				external: mapObj_1,
				mapName: 'china',
				mapWidth: 370,
				mapHeight: 370,
				stateData: data,
				// stateTipWidth: 118,
				// stateTipHeight: 47,
				// stateTipX: 2,
				// stateTipY: 0,
				stateTipHtml: function (mapData, obj) {
					var _value = mapData[obj.id].value;
					var _idx = mapData[obj.id].index;
					var active = '';
					_idx < 4 ? active = 'active' : active = '';
					var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
					return tipStr;
				}
			});
			$('#MapControl li').hover(function () {
				var thisName = $(this).attr('name');
				
				var thisHtml = $(this).html();
				$('#MapControl li').removeClass('select');
				$(this).addClass('select');
				$(document.body).append('<div id="StateTip"></div');
				$('#StateTip').css({
					left: $(mapObj_1[thisName].node).offset().left - 50,
					top: $(mapObj_1[thisName].node).offset().top - 40
				}).html(thisHtml).show();
				mapObj_1[thisName].attr({
					fill: '#E99A4D'
				});
			}, function () {
				var thisName = $(this).attr('name');

				$('#StateTip').remove();
				$('#MapControl li').removeClass('select');
				mapObj_1[$(this).attr('name')].attr({
					fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
				});

			});
			
			$('#MapColor').show();

			$('#rank_first_name').html('');
			$('#rank_first_value').html('');
			$('#rank_second_name').html('');
			$('#rank_second_value').html('');
			$('#rank_third_name').html('');
			$('#rank_third_value').html('');
			rank=d.rank;
			if(!!rank){
				if(!!rank[0]){
					$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
					$('#rank_first_value').html(rank[0].sum);
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
				}
				if(!!rank[1]){
					$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
					$('#rank_second_value').html(rank[1].sum);
				}else{
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
				}

				if(!!rank[2]){
					$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
					$('#rank_third_value').html(rank[2].sum);
				}else{
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}
			}else{
				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
			}

        }
    });


    //全部
    $("#all_tdt").click(function(){
        $('.choice_button_tdt .button_tdt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tdt").val('none');

        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
        $.ajax({
            type: "post",
            url: tdt_ajax_url,
            
            dataType: "json",
            success: function(d){
                var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();

				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}

            }
         });
    });


    //今天
    $("#today_tdt").click(function(){
        $('.choice_button_tdt .button_tdt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tdt").val('none');

        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
        $.ajax({
            type: "post",
            url: tdt_ajax_url,
            data: {
                'today':'today'
            },
            dataType: "json",
            success: function(d){
                var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();

				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}


            }
         });
    });


    //昨天
    $("#yesterday_tdt").click(function(){
        $('.choice_button_tdt .button_tdt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tdt").val('none');

        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
        $.ajax({
            type: "post",
            url: tdt_ajax_url,
            data: {
                'yesterday':'yesterday'
            },
            dataType: "json",
            success: function(d){
                var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();

				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}


            }
         });
    });

    //最近7天
    $("#sevenday_tdt").click(function(){
        $('.choice_button_tdt .button_tdt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tdt").val('none');

        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
        $.ajax({
            type: "post",
            url: tdt_ajax_url,
            data: {
                'sevenday':'sevenday'
            },
            dataType: "json",
            success: function(d){
                var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();

				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}


            }
         });
    });

    //最近15天
    $("#fifteenday_tdt").click(function(){
        $('.choice_button_tdt .button_tdt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tdt").val('none');

        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
        $.ajax({
            type: "post",
            url: tdt_ajax_url,
            data: {
                'fifteenday':'fifteenday'
            },
            dataType: "json",
            success: function(d){
                var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();

				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}


            }
         });
    });

    //最近30天
    $("#thirtyday_tdt").click(function(){
        $('.choice_button_tdt .button_tdt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_tdt").val('none');

        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
        $.ajax({
            type: "post",
            url: tdt_ajax_url,
            data: {
                'thirtyday':'thirtyday'
            },
            dataType: "json",
            success: function(d){
                var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();

				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}


            }
         });
    });


    //选择年月
    $("#main_yearmonth_tdt").change(function(){
        var tdt_yearmonth=$("#main_yearmonth_tdt").val();
        if(tdt_yearmonth=="none"){
            return false;
        }
        $('.choice_button_tdt .button_tdt').removeClass('cur');
        
        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
        $.ajax({
            type: "post",
            url: tdt_ajax_url,
            data: {
                'yearmonth':tdt_yearmonth
            },
            dataType: "json",
            success: function(d){
                var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();


				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}


            }
         });
    });



    //日历筛选
    $('#do_choice_tdt').click(function(){

        $('.choice_button_tdt .button_tdt').removeClass('cur');
        $("#main_yearmonth_tdt").val('none');

        var start_date_tdt=$('#start_date_tdt').val();
        var end_date_tdt=$('#end_date_tdt').val();
        
        reset_html='<div id="tender" style="position:relative; height:360px;"><div class="tenderList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="tenderMap" id="tenderMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#tender').html(reset_html);
		$.ajax({
	        type: "post",
	        url: tdt_ajax_url,
	        data: {
	            'date':'date',
	            'start_date':start_date_tdt,
	            'end_date':end_date_tdt
	        },
	        dataType: "json",
	        success: function(d){

	            var data;
	            data=d.data;

	            var i = 1;
				for(k in data){
					if(i <= 12){
						var _cls = i < 4 ? 'active' : ''; 
						$('#MapControl .list1').append('<li name="'+k+'"><div class="mapInfo"><i class="'+_cls+'">'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else if(i <= 24){
						$('#MapControl .list2').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}else{
						$('#MapControl .list3').append('<li name="'+k+'"><div class="mapInfo"><i>'+(i++)+'</i><span>'+chinaMapConfig.names[k]+'</span><b>'+data[k].value+'</b></div></li>')
					}
				}

				var mapObj_1 = {};
				// var stateColorList = ['003399', '0058B0', '0071E1', '1C8DFF', '51A8FF', '82C0FF', 'AAD5ee', 'AAD5FF'];
				var stateColorList = ['013199', '0058b3', '0072e0', '1c8efe', '50a9ff', '83c1ff', 'abd5ff', 'C6E1F4'];
				
				$('#tenderMap').SVGMap({
					external: mapObj_1,
					mapName: 'china',
					mapWidth: 370,
					mapHeight: 370,
					stateData: data,
					// stateTipWidth: 118,
					// stateTipHeight: 47,
					// stateTipX: 2,
					// stateTipY: 0,
					stateTipHtml: function (mapData, obj) {
						var _value = mapData[obj.id].value;
						var _idx = mapData[obj.id].index;
						var active = '';
						_idx < 4 ? active = 'active' : active = '';
						var tipStr = '<div class="mapInfo"><i class="' + active + '">' + _idx + '</i><span>' + obj.name + '</span><b>' + _value + '</b></div>';
						return tipStr;
					}
				});
				$('#MapControl li').hover(function () {
					var thisName = $(this).attr('name');
					
					var thisHtml = $(this).html();
					$('#MapControl li').removeClass('select');
					$(this).addClass('select');
					$(document.body).append('<div id="StateTip"></div');
					$('#StateTip').css({
						left: $(mapObj_1[thisName].node).offset().left - 50,
						top: $(mapObj_1[thisName].node).offset().top - 40
					}).html(thisHtml).show();
					mapObj_1[thisName].attr({
						fill: '#E99A4D'
					});
				}, function () {
					var thisName = $(this).attr('name');

					$('#StateTip').remove();
					$('#MapControl li').removeClass('select');
					mapObj_1[$(this).attr('name')].attr({
						fill: "#" + stateColorList[data[$(this).attr('name')].stateInitColor]
					});

				});
				
				$('#MapColor').show();

				$('#rank_first_name').html('');
				$('#rank_first_value').html('');
				$('#rank_second_name').html('');
				$('#rank_second_value').html('');
				$('#rank_third_name').html('');
				$('#rank_third_value').html('');
				rank=d.rank;
				if(!!rank){
					if(!!rank[0]){
						$('#rank_first_name').html('1.'+rank[0].province_name+'--'+rank[0].city_name+':');
						$('#rank_first_value').html(rank[0].sum);
					}else{
						$('#rank_first_name').html('');
						$('#rank_first_value').html('');
					}
					if(!!rank[1]){
						$('#rank_second_name').html('2.'+rank[1].province_name+'--'+rank[1].city_name+':');
						$('#rank_second_value').html(rank[1].sum);
					}else{
						$('#rank_second_name').html('');
						$('#rank_second_value').html('');
					}

					if(!!rank[2]){
						$('#rank_third_name').html('3.'+rank[2].province_name+'--'+rank[2].city_name+':');
						$('#rank_third_value').html(rank[2].sum);
					}else{
						$('#rank_third_name').html('');
						$('#rank_third_value').html('');
					}
				}else{
					$('#rank_first_name').html('');
					$('#rank_first_value').html('');
					$('#rank_second_name').html('');
					$('#rank_second_value').html('');
					$('#rank_third_name').html('');
					$('#rank_third_value').html('');
				}

	        }
	    });

    });

});