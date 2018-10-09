// JavaScript Document

/*tab部分开始*/
window.onload = function() {
    var oDiv = document.getElementById("tab");
    var oLi = oDiv.getElementsByTagName("div")[0].getElementsByTagName("li");
    var aCon = oDiv.getElementsByTagName("div")[1].getElementsByTagName("article");
    var timer = null;
    for (var i = 0; i < oLi.length; i++) {
        oLi[i].index = i;
        oLi[i].onclick = function() {
            show(this.index);
        }
    }
    function show(a) {
        index = a;
        var alpha = 0;
        for (var j = 0; j < oLi.length; j++) {
            oLi[j].className = "";
            // aCon[j].className = "";
            aCon[j].style.opacity = 0;
            aCon[j].style.display = "none";
            aCon[j].style.filter = "alpha(opacity=0)";
        }
        oLi[index].className = "cur";
        clearInterval(timer);
        timer = setInterval(function() {
            alpha += 2;
            alpha > 100 && (alpha = 100);
            aCon[index].style.opacity = alpha / 100;
            aCon[index].style.display = "block";
            aCon[index].style.filter = "alpha(opacity=" + alpha + ")";
            alpha == 100 && clearInterval(timer);
        },
        5)
    }
}

/*tab部分结束*/


//解锁红包----暂不用
function unlockred(t){
    var hId=$(t).attr("data-id");
    $.ajax({
        url: '/?wxuser&q=code/account/jiesuo',
        type: 'post',
        dataType: 'json',
        data: {
            "hId":hId
        },
        timeout: 10000,
        success: function(data){
            if(data.status == 0){
                //成功后操作
            }else{

            } 
        }
    });
}

//使用红包红包
function usered(t){
    var hId=$(t).attr("data-id");
    var begin=$(t).attr("data-begin");
    var end=$(t).attr("data-end");
    var money=$(t).attr("data-money");
    layer.load();
    $.ajax({
        url: '/?user&q=code/account/useHongbao',
        type: 'post',
        dataType: 'json',
        data: {
            "hId":hId
        },
        timeout: 500000,
        success: function(data){
            if(data.status == 0){
                $.Zebra_Dialog('<span style="font-size:18px;">红包使用成功，到期后您可以在回收中债权赎回获得红包现金收益！</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                });
                afteruser(t,begin,end,money);
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


function afteruser(t,begin,end,money){
    $(t).parent().parent().remove();
    var addhtml='';
    addhtml+=' <li>';
    addhtml+='<div class="main2_hongbao">';
    addhtml+=' <div class="main2_hongbaotop">';
    addhtml+='<div class="main2_hongbao_qian">¥';
    addhtml+='<span>'+money+'</span>';
    addhtml+='</div>';
    addhtml+='<div class="main2_hongbao_time">';
    addhtml+='<span>'+begin+'-<br/>'+end+'</span>';
    addhtml+='</div>';
    addhtml+='</div>';
    addhtml+='<a href="javascript:;">';
    addhtml+='<div class="main_meduse2">已使用</div>';
    addhtml+='</a>';
    addhtml+='</div>';
    addhtml+='</li>';

    $('#main2').append(addhtml);
}