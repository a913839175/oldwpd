window.addEventListener('orientationchange', function(event){
    if ( window.orientation == 180 || window.orientation==0 ) {
		location.reload(false);
    }
    if( window.orientation == 90 || window.orientation == -90 ) {
		location.reload(false);
    }
});

var protocol=window.location.protocol
var host = window.location.host;
var zajindan_t = new Date().getTime();
$(function (){
	
	$('#begin_game').click(function(){
		$(".zajindan_main_start").hide();
		$(".zajindan_main_input").show();
	});
	
	//点击开始游戏--用户未登录
	$('#login_botton').click(function(){
	$.Zebra_Dialog('<span style="font-size:18px;">请先登录微拍贷</span>', {
	        'type':     'question',
	        'custom_class': 'question_dialog',
	        'buttons':  [
	                        {caption: '登陆', callback: function() {
	                          var from=encodeURIComponent('/?wxuser&q=springzajindan');
	                          window.location.href='/?wxuser&q=login&from='+from;
	                        }},
	                        {caption: '取消', callback: function() { 

	                        }}
	                    ]
	  });

	});
	
	$(".kingegg_main li").bind("click", function () {
		var eggno = this;
		var mychance=$('#mychance').html();
	    mychance_int=parseInt(mychance);
	    var zajindan_t1 = new Date().getTime();
		if(zajindan_t1-zajindan_t>1*1500){
			zajindan_t = zajindan_t1;
		$.ajax({
	          type: "post",
	          url: "/?wxuser&q=springajax&doaction=get_zan_game_times",

	          dataType: "json",
	          success: function(data){
	            if(data.status==0&&data.data>0){
	            	$.ajax({
	      		      type: "post",
	      		      url: "/?wxuser&q=springajax&doaction=zan_win",
	      		      data:{
	      		        'ispost':1
	      		      },
	      		      dataType: "json",
	      		      success: function(data){
	      		        if(data.status==0&&data.data>0){
	      		        	if($(".zajindan_main_input").is(":hidden")){
	      		        		
	      		    		}else{
	      		    			
	      		    			if(mychance_int>0){
	      		    				mychance_int--;
	      		    			 }
	      		    			 $('#mychance').html(mychance_int);
	      		    			 
	      		    			 
	      		    			$('#jiangjin').html(data.data);
	      		    			$('#jiangjin_two').html(data.data);
	      		    			if($(".zajindan_num").html()>0){
	      		    				$(".hammer").addClass($(eggno).attr("data-class"));//锤子动画
	      		    				setTimeout(function(){
	      		    					$(eggno).children().addClass("eggbroken");//蛋碎
	      		    					$(".hammer").hide();//隐藏锤子 
	      		    				},1200);
	      		    				setTimeout(function(){
	      		    					$("#mymodal3").modal("toggle");//弹出奖品
	      		    					$(".hammer").removeClass($(eggno).attr("data-class"));//移除锤子动画
	      		    					$(".hammer").show();//显示锤子
	      		    					$(eggno).children().removeClass("eggbroken");//蛋碎
	      		    				},1800);
	      		    				
	      		    			}else{
	      		    				$(".hammer").addClass($(eggno).attr("data-class"));//锤子动画
	      		    				setTimeout(function(){
	      		    					$(eggno).children().addClass("eggbroken");//蛋碎
	      		    					$(".hammer").hide();//隐藏锤子 
	      		    				},1200);
	      		    				setTimeout(function(){
	      		    					$("#mymodal3").modal("toggle");//弹出奖品
	      		    					$(".hammer").removeClass($(eggno).attr("data-class"));//移除锤子动画
	      		    					$(".hammer").show();//显示锤子
	      		    					$(eggno).children().removeClass("eggbroken");//蛋碎
	      		    				},1800);
	      		    			}
	      		    		}
	      		        }else{
	      		          if(data.status==300){//未登录
	      		            $.Zebra_Dialog('<span style="font-size:18px;">请先登录微拍贷</span>', {
	      		                'type':     'question',
	      		                'custom_class': 'question_dialog',
	      		                'buttons':  [
	      		                                {caption: '登陆', callback: function() {
	      		                                  var from=encodeURIComponent('/?wxuser&q=springzajindan');
	      		                                  window.location.href='/?wxuser&q=login&from='+from;
	      		                                }},
	      		                                {caption: '取消', callback: function() { 

	      		                                }}
	      		                            ]
	      		            });

	      		          }else{
	      		        	  
	      		        	$.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
	      		                'type':     'information',
	      		                'custom_class': 'info_dialog',
	      		                'buttons':['确定']
	      		            });
	      		          }
	      		        }
	      		      },
	      		      error:function(error){
	      		        alert("传输异常，请检查网络是否正常");
	      		      }


	      		    });	
	            }else{
	              if(data.status==300){//未登录

	                $.Zebra_Dialog('<span style="font-size:18px;">请先登录微拍贷</span>', {
	                    'type':     'question',
	                    'custom_class': 'question_dialog',
	                    'buttons':  [
	                                    {caption: '登陆', callback: function() {
	                                      var from=encodeURIComponent('/?wxuser&q=springrobred');
	                                      window.location.href='/?wxuser&q=login&from='+from;
	                                    }},
	                                    {caption: '取消', callback: function() { 

	                                    }}
	                                ]
	                });

	              }else{
	                $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
	                    'type':     'information',
	                    'custom_class': 'info_dialog',
	                    'buttons':['确定']
	                });
	              }
	            }
	          },
	          error:function(error){
	            alert("传输异常，请检查网络是否正常");
	            console.log(error)
	            layer.closeAll('loading');
	          }
	        });
		}	
	});
});

wx.ready(function () {
		//回调形式
	    wx.onMenuShareTimeline({//分享到朋友圈
	        title: '金蛋迎新年，新年新惊喜', // 分享标题
	        desc: '你要砸我吗？你真的要砸我吗？那来吧，谁怕谁呀！', // 分享描述
	        link: protocol+'//'+host+'/?wxuser&q=springzajindan', // 分享链接
	        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/zajindan.jpg', // 分享图标
	        type: 'link', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	        success: function (res) { 
	           // 用户确认分享后执行的回调函数

	        },
	        cancel: function (res) { 
	           // 用户取消分享后执行的回调函数
	        },
	        complete: function (res) { 
	           //接口调用完成时执行的回调函数，无论成功或失败都会执行
	        }
	    });

	    wx.onMenuShareAppMessage({//分享给好友
	        title: '金蛋迎新年，新年新惊喜', // 分享标题
	        desc: '你要砸我吗？你真的要砸我吗？那来吧，谁怕谁呀！', // 分享描述
	        link: protocol+'//'+host+'/?wxuser&q=springzajindan', // 分享链接
	        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/zajindan.jpg', // 分享图标
	        type: 'link', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	        success: function (res) { 
	           // 用户确认分享后执行的回调函数

	        },
	        cancel: function (res) { 
	           // 用户取消分享后执行的回调函数
	        },
	        complete: function (res) { 
	           //接口调用完成时执行的回调函数，无论成功或失败都会执行
	        }
	    });

	    wx.onMenuShareQQ({//分享到QQ
	        title: '金蛋迎新年，新年新惊喜', // 分享标题
	        desc: '你要砸我吗？你真的要砸我吗？那来吧，谁怕谁呀！', // 分享描述
	        link: protocol+'//'+host+'/?wxuser&q=springzajindan', // 分享链接
	        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/zajindan.jpg', // 分享图标
	        type: 'link', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	        success: function (res) { 
	           // 用户确认分享后执行的回调函数
	        },
	        cancel: function (res) { 
	           // 用户取消分享后执行的回调函数
	        },
	        complete: function (res) { 
	           //接口调用完成时执行的回调函数，无论成功或失败都会执行
	        }
	    });

	    wx.onMenuShareWeibo({//分享到微博
	        title: '金蛋迎新年，新年新惊喜', // 分享标题
	        desc: '你要砸我吗？你真的要砸我吗？那来吧，谁怕谁呀！', // 分享描述
	        link: protocol+'//'+host+'/?wxuser&q=springzajindan', // 分享链接
	        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/zajindan.jpg', // 分享图标
	        type: 'link', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	        success: function (res) { 
	           // 用户确认分享后执行的回调函数
	        },
	        cancel: function (res) { 
	           // 用户取消分享后执行的回调函数
	        },
	        complete: function (res) { 
	           //接口调用完成时执行的回调函数，无论成功或失败都会执行
	        }
	    });

	    wx.onMenuShareQZone({//分享到QQ空间
	        title: '金蛋迎新年，新年新惊喜', // 分享标题
	        desc: '你要砸我吗？你真的要砸我吗？那来吧，谁怕谁呀！', // 分享描述
	        link: protocol+'//'+host+'/?wxuser&q=springzajindan', // 分享链接
	        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/zajindan.jpg', // 分享图标
	        type: 'link', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	        success: function (res) { 
	           // 用户确认分享后执行的回调函数
	        },
	        cancel: function (res) { 
	           // 用户取消分享后执行的回调函数
	        },
	        complete: function (res) { 
	           //接口调用完成时执行的回调函数，无论成功或失败都会执行
	        }
	    });

	    //隐藏复制链接
	    // wx.hideMenuItems({
	    //     menuList: [
	    //     'menuItem:copyUrl' // 复制链接
	    //     ],
	    //     success: function (res) {
	    //     },
	    //     fail: function (res) {
	    //     }
	    // });

	});

	wx.error(function (res) {
	  alert(res.errMsg);
	});