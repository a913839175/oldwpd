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
            aCon[j].className = "";
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

function getback(t){
    var borrow_nid=$(t).attr('data-nid');
    var id=$(t).attr('data-id');
    $.Zebra_Dialog('<span style="font-size:18px;">确定要赎回?</span>', {
        'type':     'question',
        'custom_class': 'question_dialog',
        'buttons':  [
                        {caption: '确定', callback: function() {
                            location.href='/index.php?wxuser&q=code/borrow/repay&borrow_nid='+borrow_nid+'&id='+id+'';
                        }},
                        {caption: '取消', callback: function() { 

                        }}
                    ]
    });
}
/*tab部分结束*/