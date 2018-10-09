

$(function(){

    //********************剩余时间top**********************************//
    var CID = "end_time";
    var ele=$('#'+CID);
    if(!!ele){
        var iTime = document.getElementById(CID).innerHTML;
        RemainTime(iTime,CID);
    }
    //********************剩余时间bottom**********************************//


    //*************************投资付款*******************************//
        //关闭付款
    $("#fukuan_close").click(function(){
        $("#fukuan").css('display','none');
        $("#screenc-overlay").css('display','none');
        $('body').css('overflow','visible');

    });

    //关闭付款和详情
    $("#screenc-overlay").click(function(){
        $("#fukuan").css('display','none');
        $("#xiangqing").css('display','none');
        $("#screenc-overlay").css('display','none');
        $('body').css('overflow','visible');
    });

    //点击投标---显示付款
    $("#dotoubiao").click(function(){
        $("#fukuan").css('display','block');
        $("#screenc-overlay").css('display','block');
        $('body').css('overflow','hidden');
    });

    //关闭详情---退回付款
    $("#xiangqing_close").click(function(){
        $("#fukuan").css('display','block');
        $("#xiangqing").css('display','none');
    });


    //w+3

    //只能是输入数字
    $('#account').keydown(function(event){ 
        onlyNum();
    });

    //当金额输入框发生变化
    $('#account').change(function(event){ 
        var money=$('#account').val();
        if(money<100){
            $.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
                'type':     'information',
                'custom_class': 'info_dialog',
                'buttons':['确定']
            });
            $("#account").focus();
        }else if((money%100)!=0){
            $.Zebra_Dialog('<span style="font-size:18px;">输入金额需为100元的整数倍！</span> ', {
                'type':     'information',
                'custom_class': 'info_dialog',
                'buttons':['确定']
            });
            $("#account").focus();
        }else{
            var shares=money/100;
            $('#showaccount').html(money);
            $('#showaccount2').html(money+"元");
            $('#realaccount').val(money);
            $('#showshares').html('元（'+shares+'）份');
        }
    });

    //点击确定
    $('#fukuab_sure').click(function(){
        if($("#isread").is(':checked')){
            var account=$('#account').val();
            if(account<100){
                $.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                });
                $("#account").focus();
            }else if((account%100)!=0){
                $.Zebra_Dialog('<span style="font-size:18px;">输入金额需为100元的整数倍！</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                });
                $("#account").focus();
            }else{
                var shares=account/100;
                $('#showaccount').html(account);
                $('#showaccount').html(account+"元");
                $('#realaccount').val(account);
                $('#showshares').html('元（'+shares+'）份');
                    $("#fukuan").css('display','none');
                $("#xiangqing").css('display','block');
            }
        }else{
            $.Zebra_Dialog('<span style="font-size:18px;">请先阅读并同意协议</span> ', {
                'type':     'information',
                'custom_class': 'info_dialog',
                'buttons':['确定']
            });
        }

    });

    
    //提交表单
    $('#xiangqing_sure').click(function(){
        var account=$("#realaccount").val();
        var paypassword=$("#paypassword").val();
        var borrow_nid=$("#borrow_nid").val();
        if ($.trim(account) == '') {
            $.Zebra_Dialog('<span style="font-size:18px;">请输入有效金额！</span> ', {
                'type':     'information',
                'custom_class': 'info_dialog',
                'buttons':['确定']
            });
            $("#wnaccount").focus();
            return false;
        } else {
            var reg = /^[0-9]*[1-9][0-9]*$/; 
            if(!reg.test($.trim(account))){
                $.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                });
                return false;
            }else{
                var r=account%100;
                if(r!=0){
                    $.Zebra_Dialog('<span style="font-size:18px;">请输入100的整数倍</span> ', {
                        'type':     'information',
                        'custom_class': 'info_dialog',
                        'buttons':['确定']
                    });
                    return false;
                }
            }
        }

        if ($.trim(paypassword) == '') {
            $.Zebra_Dialog('<span style="font-size:18px;">请输入交易密码！</span> ', {
                'type':     'information',
                'custom_class': 'info_dialog',
                'buttons':['确定']
            });
            $("#wnpaypassword").focus();
            return false;
        }

        $('#xiangqing_sure').attr('disabled','disabled');
        $("#borrowform").attr('action','/index.php?wxuser&q=code/borrow/tender');
        $("#borrowform").submit();

    });

    //*************************投资付款*******************************//
	
});

//********************计算剩余时间函数top**********************************//
function RemainTime(iTime,CID){
    var Account
    var iDay,iHour,iMinute,iSecond;
    var sDay="",sTime="";
    if (iTime >= 0){
        iDay = parseInt(iTime/24/3600);
        iHour = parseInt((iTime/3600)%24);
        iMinute = parseInt((iTime/60)%60);
        iSecond = parseInt(iTime%60);

        if (iDay > 0){ 
            sDay = iDay + "天"; 
        }
        sTime =sDay + iHour + "时" + iMinute + "分" + iSecond + "秒";
    
        if(iTime==0){
            clearTimeout(Account);
            sTime="<span style='color:green'>时间到了！</span>";
        }else{
            Account = setTimeout("RemainTime()",1000);
        }
        iTime=iTime-1;
    }
    else{
        sTime="<span style='color:red'>此标已过期！</span>";
    }
    document.getElementById(CID).innerHTML = sTime;
}

//********************计算剩余时间函数bottom**********************************//


//只能数字
function onlyNum() {
    if(!(event.keyCode==46)&&!(event.keyCode==8)&&!(event.keyCode==37)&&!(event.keyCode==39))
    if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))
    event.returnValue=false;
}