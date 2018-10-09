
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

        //    var test_url='/index.php?m=index&a=qiandao'
    $(function () {
        var title = $("#this_title").html();
        if (title.length > 6) {
            $("#this_title").css('font-size', '20px');
        } else if (title.length > 9) {
            $("#this_title").css('font-size', '16px');
        } else if (title.length > 11) {
            $("#this_title").css('font-size', '12px');
        }

        var title = $("#this_t").html();
        if (title.length > 6) {
            $("#this_t").css('font-size', '20px');
        } else if (title.length > 9) {
            $("#this_t").css('font-size', '16px');
        } else if (title.length > 11) {
            $("#this_t").css('font-size', '12px');
        }
    })
function qiandao() {
    $.ajax(
        {
            url:'index.php?m=index&a=qiandao',
            data:{},
            type:'post',
            dataType:'json',
            success:function (data) {
                console.log(data);
                alert(1);
                if (data.save == 1) {
                    if (data.touzi_status == 1) {
                        alert('2');
                        $('#qiandao').html('今日已签到');
                        $('#qiandao_btn').addClass('jifen_online_button button_outline');
                        $('#jifen').html(data.credit);
                        $('#shanshuo').html('<span id="jia1" style="text-align: center;color:#d90021; font-size: 14px; font-weight: 700;"> +2</span>')
                        setTimeout(
                            "$('#shanshuo').addClass('play_none');"
                            , 1000);
                    } else {
//                    alert('签到成功');
                        $('#qiandao').html('今日已签到');
                        $('#qiandao_btn').addClass('jifen_online_button button_outline');
                        $('#jifen').html(data.credit);
                        $('#shanshuo').html('<span id="jia1" style="text-align: center;color: red"> +1</span>')
//                    $('#xiaozi1').removeClass('play_none');
                        setTimeout(
                            "$('#shanshuo').addClass('play_none');"
                            , 1000);
                    }


                }
                else if (data == 2) {
                    alert('别闹了，亲！今天已经签过了啦~');
                }
                else {
                    alert('出错了哟！刷新一下试试~');
                }
            }
        });
//            }

//            "index.php?m=index&a=qiandao",

}



    $(document).ready(function () {
        $(".nav-right li").each(function (index) {
            if (index == 0) {
                $(this).addClass("choose");
            }
        });

        jie(
            n = 21,//控制文字的长度
            i = $('.li-item h2'),//控制需要改变的元素
            b = 560//控制最小文档的宽度
        )

        jie(
            n = 66,//控制文字的长度
            i = $('.li-item h4'),//控制需要改变的元素
            b = 1120//控制最小文档的宽度
        )

    });

function jie(n, i, b) {
    var jiek = i

    // var w_whi = $(document).width();
    var w_whi = i.width();
    var maxwidth = n;

    var w = 1.8 * w_whi;

    if (w < b) {
        jiek.each(function () {
            if ($(this).text().length >= maxwidth) {
                $(this).text($(this).text().substring(0, maxwidth));
                $(this).html($(this).html() + '...');
            }
        });
    }

}

