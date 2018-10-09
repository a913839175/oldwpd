;$(function () {

	laydate({
        elem: '#start_date_dt'
    });

    laydate({
        elem: '#end_date_dt'
    });

	var dt_ajax_url="/?hradmin&q=code/data/main&action=dt_ajax";


	$.ajax({
        type: "post",
        url: dt_ajax_url,
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
			
			$('#RegionMap').SVGMap({
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

        }
    });


    //全部
    $("#all_dt").click(function(){
        $('.choice_button_dt .button_dt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_dt").val('none');

        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
        $.ajax({
            type: "post",
            url: dt_ajax_url,
            
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
				
				$('#RegionMap').SVGMap({
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

            }
         });
    });


    //今天
    $("#today_dt").click(function(){
        $('.choice_button_dt .button_dt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_dt").val('none');

        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
        $.ajax({
            type: "post",
            url: dt_ajax_url,
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
				
				$('#RegionMap').SVGMap({
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

            }
         });
    });


    //昨天
    $("#yesterday_dt").click(function(){
        $('.choice_button_dt .button_dt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_dt").val('none');

        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
        $.ajax({
            type: "post",
            url: dt_ajax_url,
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
				
				$('#RegionMap').SVGMap({
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

            }
         });
    });

    //最近7天
    $("#sevenday_dt").click(function(){
        $('.choice_button_dt .button_dt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_dt").val('none');

        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
        $.ajax({
            type: "post",
            url: dt_ajax_url,
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
				
				$('#RegionMap').SVGMap({
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

            }
         });
    });

    //最近15天
    $("#fifteenday_dt").click(function(){
        $('.choice_button_dt .button_dt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_dt").val('none');

        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
        $.ajax({
            type: "post",
            url: dt_ajax_url,
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
				
				$('#RegionMap').SVGMap({
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

            }
         });
    });

    //最近30天
    $("#thirtyday_dt").click(function(){
        $('.choice_button_dt .button_dt').removeClass('cur');
        $(this).addClass('cur');
        $("#main_yearmonth_dt").val('none');

        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
        $.ajax({
            type: "post",
            url: dt_ajax_url,
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
				
				$('#RegionMap').SVGMap({
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

            }
         });
    });


    //选择年月
    $("#main_yearmonth_dt").change(function(){
        var dt_yearmonth=$("#main_yearmonth_dt").val();
        if(dt_yearmonth=="none"){
            return false;
        }
        $('.choice_button_dt .button_dt').removeClass('cur');
        
        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
        $.ajax({
            type: "post",
            url: dt_ajax_url,
            data: {
                'yearmonth':dt_yearmonth
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
				
				$('#RegionMap').SVGMap({
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

            }
         });
    });



    //日历筛选
    $('#do_choice_dt').click(function(){

        $('.choice_button_dt .button_dt').removeClass('cur');
        $("#main_yearmonth_dt").val('none');

        var start_date_dt=$('#start_date_dt').val();
        var end_date_dt=$('#end_date_dt').val();
        
        reset_html='<div id="Region" style="position:relative; height:360px;"><div class="regionList" id="MapControl"><ul class="list1"></ul><ul class="list2"></ul><ul class="list3"></ul></div><div class="regionMap" id="RegionMap"></div><div id="MapColor" style=" display:none; float:left; width:30px; height:180px; margin:80px 0 0 10px; display:inline; background:url(/themes/hrcf_admin/data/js/chinamap/images/map_color.png) center 0;"></div></div>';
        $('#Region').html(reset_html);
		$.ajax({
	        type: "post",
	        url: dt_ajax_url,
	        data: {
	            'date':'date',
	            'start_date':start_date_dt,
	            'end_date':end_date_dt
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
				
				$('#RegionMap').SVGMap({
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
	        }
	    });

    });

});