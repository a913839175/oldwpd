var protocol=window.location.protocol
var host = window.location.host;

var timer_count=0;
$(function(){

  //点击开始游戏--活动未开始
  $('#before_botton').click(function(){
    $.Zebra_Dialog('<span style="font-size:18px;">活动未开始</span> ', {
        'type':     'information',
        'custom_class': 'info_dialog',
        'buttons':['确定']
    });

  });

  //点击开始游戏--活动已结束
  $('#over_botton').click(function(){
    $.Zebra_Dialog('<span style="font-size:18px;">活动已结束</span> ', {
        'type':     'information',
        'custom_class': 'info_dialog',
        'buttons':['确定']
    });

  });


  //点击开始游戏--用户未登录
  $('#login_botton').click(function(){
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

  });

  //点击我的奖品
  $('#myprize').click(function(){
    $.Zebra_Dialog('<span style="font-size:18px;">请先登录微拍贷</span>', {
        'type':     'question',
        'custom_class': 'question_dialog',
        'buttons':  [
                        {caption: '登陆', callback: function() {
                          var from=encodeURIComponent('/?wxuser&q=springrobprize');
                          window.location.href='/?wxuser&q=login&from='+from;
                        }},
                        {caption: '取消', callback: function() { 

                        }}
                    ]
    });

  });


  var li_height=$('#winner-list li').eq(0).height();
  var box = document.getElementById("winner-list");
  // box.innerHTML += box.innerHTML;

	new function () {
      // var stop = box.scrollTop % 50.25 == 0 ;
      // if (!stop)box.scrollTop == parseInt(box.scrollHeight / 2) ? box.scrollTop = 0 : box.scrollTop++;
      if(box.scrollTop >= parseInt((box.scrollHeight-10) / 2)){
          box.scrollTop=0;
          timer_count=0;
      }else{
          box.scrollTop=parseInt(box.scrollTop)+1;
      }
      timer_count++;
      if(timer_count==li_height){
          timer_count=1;
          setTimeout(arguments.callee, 1500);
      }else{
          setTimeout(arguments.callee, 10);
      }
  }

});



wx.ready(function () {
//回调形式
    wx.onMenuShareTimeline({//分享到朋友圈
        title: '金猴闹新春，红包天天拿', // 分享标题
        desc: '还在发愁长大后没有压岁钱红包拿？赶紧来“微拍贷”领取新年红包吧！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springrobred', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/qianghongbaoxiaotu.jpg', // 分享图标
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
        title: '金猴闹新春，红包天天拿', // 分享标题
        desc: '还在发愁长大后没有压岁钱红包拿？赶紧来“微拍贷”领取新年红包吧！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springrobred', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/qianghongbaoxiaotu.jpg', // 分享图标
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
        title: '金猴闹新春，红包天天拿', // 分享标题
        desc: '还在发愁长大后没有压岁钱红包拿？赶紧来“微拍贷”领取新年红包吧！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springrobred', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/qianghongbaoxiaotu.jpg', // 分享图标
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
        title: '金猴闹新春，红包天天拿', // 分享标题
        desc: '还在发愁长大后没有压岁钱红包拿？赶紧来“微拍贷”领取新年红包吧！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springrobred', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/qianghongbaoxiaotu.jpg', // 分享图标
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
        title: '金猴闹新春，红包天天拿', // 分享标题
        desc: '还在发愁长大后没有压岁钱红包拿？赶紧来“微拍贷”领取新年红包吧！', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=springrobred', // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/activity/spring/images/qianghongbaoxiaotu.jpg', // 分享图标
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

