var protocol=window.location.protocol
var host = window.location.host;
$(function(){
	//关闭分享
	$("#screenc-overlay").click(function(){
		$("#screenc-overlay").css('display','none');
	});


	
});

function toshare(){
    $("#screenc-overlay").css('display','block');
}

function game_status(status){
  if(status==1){
    $.Zebra_Dialog('<span style="font-size:18px;">活动未开始</span> ', {
      'type':     'information',
      'custom_class': 'info_dialog',
      'buttons':['确定']
    });
  }else if(status==2){
    $.Zebra_Dialog('<span style="font-size:18px;">活动已结束</span> ', {
      'type':     'information',
      'custom_class': 'info_dialog',
      'buttons':['确定']
    });
  }

}

wx.ready(function () {
//回调形式
    wx.onMenuShareTimeline({//分享到朋友圈
        title: '乐享红包，辞旧迎新', // 分享标题
        desc: '分享有惊喜，“微拍贷”给您拜年啦！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springshare', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/fenxiangxiaotu.jpg', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function (res) { 
           // 用户确认分享后执行的回调函数

            $.Zebra_Dialog('<span style="font-size:18px;">分享成功，请等待页面跳转~</span> ', {
              'type':     'information',
              'custom_class': 'info_dialog',
              'buttons':['确定']
            });


            $.ajax({
              type: "post",
              url: "/index.php?wxuser&q=springajax&doaction=finish_share",
              data: {
                ispost:1
              },
              dataType: "json",
              success: function(data){
                if(data.status==0){
                  var record=data.data;
                  window.location.href=protocol+'//'+host+'/?wxuser&q=springred&record='+record;

                }else{
                  $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                  });
                }
              }
            });
        },
        cancel: function (res) { 
           // 用户取消分享后执行的回调函数
        },
        complete: function (res) { 
           //接口调用完成时执行的回调函数，无论成功或失败都会执行
        }
    });

    wx.onMenuShareAppMessage({//分享给好友
        title: '乐享红包，辞旧迎新', // 分享标题
        desc: '分享有惊喜，“微拍贷”给您拜年啦！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springshare', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/fenxiangxiaotu.jpg', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function (res) { 
           // 用户确认分享后执行的回调函数

           $.Zebra_Dialog('<span style="font-size:18px;">分享成功，请等待页面跳转~</span> ', {
              'type':     'information',
              'custom_class': 'info_dialog',
              'buttons':['确定']
            });


            $.ajax({
              type: "post",
              url: "/index.php?wxuser&q=springajax&doaction=finish_share",
              data: {
                ispost:1
              },
              dataType: "json",
              success: function(data){
                if(data.status==0){
                  var record=data.data;
                  window.location.href=protocol+'//'+host+'/?wxuser&q=springred&record='+record;

                }else{
                  $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                  });
                }
              }
            });
        },
        cancel: function (res) { 
           // 用户取消分享后执行的回调函数
        },
        complete: function (res) { 
           //接口调用完成时执行的回调函数，无论成功或失败都会执行
        }
    });

    wx.onMenuShareQQ({//分享到QQ
        title: '乐享红包，辞旧迎新', // 分享标题
        desc: '分享有惊喜，“微拍贷”给您拜年啦！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springshare', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/fenxiangxiaotu.jpg', // 分享图标
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
        title: '乐享红包，辞旧迎新', // 分享标题
        desc: '分享有惊喜，“微拍贷”给您拜年啦！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springshare', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/fenxiangxiaotu.jpg', // 分享图标
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
        title: '乐享红包，辞旧迎新', // 分享标题
        desc: '分享有惊喜，“微拍贷”给您拜年啦！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springshare', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/fenxiangxiaotu.jpg', // 分享图标
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
