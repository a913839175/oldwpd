//兑换名单的滚动
var box = document.getElementById("div1"), can = true;
box.innerHTML += box.innerHTML;
box.onmouseover = function () {
    can = false
};
box.onmouseout = function () {
    can = true
};
new function () {
    var stop = box.scrollTop % 23 == 0 && !can;
    if (!stop)box.scrollTop == parseInt(box.scrollHeight / 2) ? box.scrollTop = 0 : box.scrollTop++;
    setTimeout(arguments.callee, box.scrollTop % 23 ? 10 : 1500);
};

// 商品字太大自动改size
$(function () {
    // var title = $("#this_title").html();
    // if (title.length > 6) {
    //     $("#this_title").css('font-size', '20px');
    // } else if (title.length > 9) {
    //     $("#this_title").css('font-size', '16px');
    // } else if (title.length > 11) {
    //     $("#this_title").css('font-size', '12px');
    // }

    // var title = $("#this_t").html();
    // if (title.length > 6) {
    //     $("#this_t").css('font-size', '20px');
    // } else if (title.length > 9) {
    //     $("#this_t").css('font-size', '16px');
    // } else if (title.length > 11) {
    //     $("#this_t").css('font-size', '12px');
    // }
})

//签到
function qiandao() {
    $.post("index.php?m=index&a=qiandao_leijia", function (data) {
        if (data.save == 1) {
//            if (data.touzi_status == 1) {
//                    alert('签到成功');
//                $('#qiandao_btn').html('<p class="jf_sjsmbt">今日已签到</p><p class="jf_sjsmcontent">多多微币奖励等你来拿</p>');
//                if(data.sign_num%5<1){
//                    $('#shanshuo').html('<span id="jia1" style="text-align: center;color:#d90021; font-size: 31px; font-weight: 700;"> +2</span>');
//                    setTimeout(
//                    "$('#shanshuo').addClass('play_none');"
//                    , 2000);
//                }
//            } else {
//                    alert('签到成功');
                $('#qiandao_btn').html('<p class="jf_sjsmbt">今日已签到</p><p class="jf_sjsmcontent">多多微币奖励等你来拿</p>');
//                    $('#xiaozi1').removeClass('play_none');
                if(data.sign_num%5<1){
                     $('#shanshuo').html('<span id="jia1" style="text-align: center;color: red;font-size: 21px;"> +1</span>');
                    setTimeout(
                    "$('#shanshuo').addClass('play_none');"
                    , 2000);
                }
//            }


        }
        else if (data == 2) {
            alert('别闹了，亲！今天已经签过了啦~');
        }
        else {
            alert('请登录以后试试~');
        }
    }, "json");

}


$(document).ready(function () {
    // $(".nav-right li").each(function (index) {
    //     if (index == 0) {
    //         $(this).addClass("choose");
    //     }
    // });

    // jie(
    //     n = 37,//控制文字的长度
    //     i = $('.jifen_select_left li div p'),//控制需要改变的元素
    //     b = 560//控制最小文档的宽度
    // )

    // jie(
    //     n = 66,//控制文字的长度
    //     i = $('.li-item h4'),//控制需要改变的元素
    //     b = 1120//控制最小文档的宽度
    // )

});

function jie(n, i, b) {
    var jiek = i

    // var w_whi = $(document).width();
    var w_whi = i.width();
    var maxwidth = n;

    var w = 1.8 * w_whi;
    console.log(w_whi)

    console.log(b)
    if (w < b) {
        jiek.each(function () {
            console.log($(this).text().length)
            var strCNLen = str.replace(/[^\x00-\xff]/g,'**').length;
            if (strCNLen >= maxwidth) {
                $(this).text($(this).text().substring(0, maxwidth));
                $(this).html($(this).html() + '...');
            }
        });
    }

}
$(function () {
    // 第一个商品对齐的JS
    jQuery.jqshop= function(tabtit,t) {
         var jf_rmtjli=$(tabtit).length;
        for(i=0;i<jf_rmtjli;i++){
         if(i % t == 0){
            $(tabtit).eq(i).css('margin-left','0')
         }
      }
    }
    //热门推荐
    $.jqshop('.jf_rmtjli',4);
    //红包推荐
    $.jqshop('.jf_rmhbli',5);
     
})
// banner 轮播
$(function() {
    var bannerSlider = new Slider($('#banner_tabs'), {
        time: 5000,
        delay: 400,
        event: 'hover',
        auto: true,
        mode: 'fade',
        controller: $('#bannerCtrl'),
        activeControllerCls: 'active'
    });
})
