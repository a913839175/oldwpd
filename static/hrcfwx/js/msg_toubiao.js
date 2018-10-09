$(function(){
	//关闭分享
	$("#screenc-overlay").click(function(){
		$("#screenc-overlay").css('display','none');
	});

	//点击分享
	$("#share").click(function(){
		$("#screenc-overlay").css('display','block');
	});

	
});

wx.ready(function () {

	var protocol=window.location.protocol
	var host = window.location.host;
    var tenderid=$("#tenderid").val();
    // 判断当前客户端版本是否支持指定JS接口
    // $('#check').click(function(){
    //     wx.checkJsApi({
    //       jsApiList: [
    //         'onMenuShareAppMessage',
    //         'onMenuShareQQ',
    //         'onMenuShareWeibo',
    //         'onMenuShareQZone',
    //         'hideMenuItems'
    //       ],
    //       success: function (res) {
    //         alert(JSON.stringify(res));
    //       }
    //     });
    // });
    
    //回调形式
    wx.onMenuShareTimeline({//分享到朋友圈
        title: '11月，你不再孤单，快和小伙伴一起来抢红包！！！', // 分享标题
        desc: '“微拍贷”低门槛、高收益、随意存取，让理财融入您的生活。', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid, // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/images/youhuirukou.png', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function (res) { 
            // 用户确认分享后执行的回调函数
            window.location.href=protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid;
        },
        cancel: function (res) { 
            // 用户取消分享后执行的回调函数
        },
        complete: function (res) { 
            //接口调用完成时执行的回调函数，无论成功或失败都会执行
        }
    });

    wx.onMenuShareAppMessage({//分享给好友
        title: '11月，你不再孤单，快和小伙伴一起来抢红包！！！', // 分享标题
        desc: '“微拍贷”低门槛、高收益、随意存取，让理财融入您的生活。', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid, // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/images/youhuirukou.png', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function (res) { 
            // 用户确认分享后执行的回调函数
            window.location.href=protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid;
        },
        cancel: function (res) { 
            // 用户取消分享后执行的回调函数
        },
        complete: function (res) { 
            //接口调用完成时执行的回调函数，无论成功或失败都会执行
        }
    });

    wx.onMenuShareQQ({//分享到QQ
        title: '11月，你不再孤单，快和小伙伴一起来抢红包！！！', // 分享标题
        desc: '“微拍贷”低门槛、高收益、随意存取，让理财融入您的生活。', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid, // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/images/youhuirukou.png', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function (res) { 
            // 用户确认分享后执行的回调函数
            window.location.href=protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid;
        },
        cancel: function (res) { 
            // 用户取消分享后执行的回调函数
        },
        complete: function (res) { 
            //接口调用完成时执行的回调函数，无论成功或失败都会执行
        }
    });

    wx.onMenuShareWeibo({//分享到微博
        title: '11月，你不再孤单，快和小伙伴一起来抢红包！！！', // 分享标题
        desc: '“微拍贷”低门槛、高收益、随意存取，让理财融入您的生活。', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid, // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/images/youhuirukou.png', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function (res) { 
            // 用户确认分享后执行的回调函数
            window.location.href=protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid;
        },
        cancel: function (res) { 
            // 用户取消分享后执行的回调函数
        },
        complete: function (res) { 
            //接口调用完成时执行的回调函数，无论成功或失败都会执行
        }
    });

    wx.onMenuShareQZone({//分享到QQ空间
        title: '11月，你不再孤单，快和小伙伴一起来抢红包！！！', // 分享标题
        desc: '“微拍贷”低门槛、高收益、随意存取，让理财融入您的生活。', // 分享描述
        link: protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid, // 分享链接
        imgUrl: protocol+'//'+host+'/static/hrcfwx/images/youhuirukou.png', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function (res) { 
            // 用户确认分享后执行的回调函数
            window.location.href=protocol+'//'+host+'/?wxuser&q=qianghongbao&tenderid='+tenderid;
        },
        cancel: function (res) { 
            // 用户取消分享后执行的回调函数
        },
        complete: function (res) { 
            //接口调用完成时执行的回调函数，无论成功或失败都会执行
        }
    });

    //简化形式
    // var shareData = {
    //     title: '11月，你不再孤单，快和小伙伴一起来抢红包！！！', // 分享标题
    //     desc: '“微拍贷”低门槛、高收益、随意存取，让理财融入您的生活。', // 分享描述
    //     link: protocol+'//'+host+'/?wxuser&q=qianghongbao', // 分享链接
    //     imgUrl: protocol+'//'+host+'/static/hrcfwx/images/youhuirukou.png', // 分享图标
    //     type: 'link', // 分享类型,music、video或link，不填默认为link
    //     dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    // };
    // wx.onMenuShareTimeline(shareData);//分享到朋友圈
    // wx.onMenuShareAppMessage(shareData);//分享好友
    // wx.onMenuShareQQ(shareData);//分享QQ
    // wx.onMenuShareWeibo(shareData);//分享微博
    // wx.onMenuShareQZone(shareData);//分享QQ空间

    //隐藏复制链接
    wx.hideMenuItems({
      menuList: [
        'menuItem:copyUrl' // 复制链接
      ],
      success: function (res) {
      },
      fail: function (res) {
      }
    });

});

wx.error(function (res) {
  alert(res.errMsg);
});
