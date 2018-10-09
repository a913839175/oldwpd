var protocol=window.location.protocol
var host = window.location.host;

var timer_count=0;
$(function(){


  var li_height=$('#winner-share-list li').eq(0).height();
  var box = document.getElementById("winner-share-list");
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



function gethongbao(t){
    
  var mobile=$("#mobile").val();
  var record=$("#record").val();
  
  if ($.trim(mobile) == '') {
    $.Zebra_Dialog('<span style="font-size:18px;">请输入手机号码！</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });
    $("#mobile").focus();
    return false;
  }

  layer.load(2);
  $.ajax({
    type: "post",
    url: "/index.php?wxuser&q=springajax&doaction=get_share_red",
    data: {
      'mobile':mobile,
      'record':record
    },
    dataType: "json",
    success: function(data){
      
      if(data.status==0){
        $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });
      }else{
        $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });
      }

      layer.closeAll('loading');

    }
  });

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
