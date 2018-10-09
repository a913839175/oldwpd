var nowpage=2;
var nowno=15;
$(function(){

	var borrow_nid=$('#this_borrow_nid').val();
	//加载更多
	$('#getmore').click(function(){
		$.ajax({
            type: "post",
            url: "/index.php?user&q=doajax&doaction=tenderlistbind",
            data: {
            	'page':nowpage,
            	'borrow_nid':borrow_nid,
                'epage':nowno
            },
            dataType: "json",
            success: function(data){
            	var addhtml="";
            	if(data.status==0){
            		nowpage++;
            		if(data.data.length>0){
            			addhtml=sethtml(data.data);
            			$('#tenderlist').append(addhtml);
            		}else{
            			alert('无更多数据');
            		}
            	}else{
			        alert('加载失败');
            	}
            },
            error:function(err){
            	alert('网络错误');
            }
        });
	});
        
        //红包选择
        $('#invest-submit').click(function(){
            var account=$('.ui-input2x').val();
            var period=$('#period').val();
            console.log('account:'+account);
            console.log('period:'+period);
            if(account>0){
                $.ajax({
                    type: "post",
                    url: "/index.php?user&q=doajax&doaction=hongbaolist",
                    data: {
                        'period':period,
                        'account':account
                    },
                    dataType: "json",
                    success: function(data){
                        var addhtml="暂无可用红包";
                        if(data.status==0){
                            if(data.data.length>0){
                                var addhtml='<select name="hongbaoid" style="float:left;display:block;margin-top:5px"><option value="">请选择红包</option>';
                                $.each(data.data,function(i,n){
                                    addhtml=addhtml+'<option value="'+n['id']+'">'+n['title']+'</option>';
                                });
                                addhtml=addhtml+'</select>';
                            }
                        }
                        $('#hongbao_span').html(addhtml);
                    },
                    error:function(err){
                        $('#hongbao_span').html("暂无可用红包");
                        alert('红包数据加载失败');
                    }
                });
            }
        });
});


function sethtml(list) {
	var html="";
	$.each(list,function(i,n){
		var this_key=(parseInt(nowpage)-2)*parseInt(nowno)+parseInt(i)+1;
        html=html+'<tr class="dark ">';

        html=html+'<td>';
        html=html+'<div class="ui-td-bg pl60">'+this_key+'</div>';
        html=html+'</td>';

        html=html+'<td>';
        html=html+'<div class="ui-td-bg pl25">';
        html=html+n['username'];
        html=html+'</div>';
        html=html+'</td>';

        html=html+'<td class="text-right">';
        html=html+'<div class="ui-td-bg pr70">';
        html=html+'<em>'+n['bind_account']+'</em>元</div>';
        html=html+'</td>';

        html=html+'</tr>';

	});
	return html;
}
function shengyu(){
    var maxamount = parseInt($('#max-amount').html());
    if(maxamount == 0){
        $('#invest-submit').addClass('disabled');
        $("#invest-submit").attr('disabled',true);
    }
}
shengyu();

$('.ui-term-placeholder').on('click',function(){
    $(this).html('');
    $('.ui-input2x').focus();
})

$(".ui-input2x").blur(function(){
    var uiinput2x = $('.ui-input2x').val();  //输入的投资金额
    if(uiinput2x == ''){
        $('.ui-term-placeholder').html('请输入投资金额！');
    }
});

$(".ui-input2x").focus(function(){
    var uiinput2x = $('.ui-input2x').val();  //输入的投资金额
    if(uiinput2x == ''){
        $('.ui-term-placeholder').html('');
    }
});
//输入金额的判断
$('.ui-input2x').bind('input propertychange', function() {  
    var uiinput2x = parseFloat($('.ui-input2x').val());  //输入的投资金额
    var maxamount = parseFloat($('#max-amount').html()); //剩余可投金额
    var maxaccount = parseFloat($('#max-account').html()); //账户余额
    // var uisunit = uiinput2x - (Math.floor(uiinput2x / 100) * 100) //输入的投资金额的个位和十位
    // var maxamunit = maxamount - (Math.floor(maxamount / 100) * 100) //剩余可投金额的个位和十位
    var uisunit = uiinput2x % 100 //输入的投资金额的个位和十位
    var maxamunit = maxamount % 100 //剩余可投金额的个位和十位
    var USERID = $('.USERID').val();
    console.log(uiinput2x);
    if(USERID){
        if(maxamount >= 100){
            if(maxaccount < uiinput2x){
                $('.ui-term-error').show();
                $('.ui-term-error').html('账号余额不足！')
                $('#invest-submit').addClass('disabled');
                $("#invest-submit").attr('disabled',true);
                return false;
            }else if(uiinput2x > maxamount){
                $('.ui-input2x').val(maxamount)
                $('.ui-term-error').show();
                $('.ui-term-error').html('超过剩余可投金额，数值已变为剩余可投金额');
                $('#invest-submit').removeClass('disabled');
                $("#invest-submit").attr('disabled',false);
                return false
            }else if(uiinput2x < 100 && uiinput2x > 0){
                $('.ui-term-error').show();
                $('.ui-term-error').html('投资金额必须是整百的或者大于100的金额且个位和十位与剩余可投一致');
                $('#invest-submit').addClass('disabled');
                $("#invest-submit").attr('disabled',true);
                return false
            }else if(uiinput2x % 100 != 0 && uisunit != maxamunit){
                $('.ui-term-error').show();
                $('.ui-term-error').html('投资金额必须是整百的或者大于100的金额且个位和十位与剩余可投一致');
                $('#invest-submit').addClass('disabled');
                $("#invest-submit").attr('disabled',true);
                return false
            }else{

                $('.ui-term-error').hide();
                $('.ui-term-error').html('')
                $('#invest-submit').removeClass('disabled');
                $("#invest-submit").attr('disabled',false);
            }
        }else if(maxamount < 100){
            if(maxaccount < uiinput2x){
                $('.ui-term-error').show();
                $('.ui-term-error').html('账号余额不足！')
                $('#invest-submit').addClass('disabled');
                $("#invest-submit").attr('disabled',true);
                return false;
            }else if(uiinput2x > maxamount){
                 $('.ui-input2x').val(maxamount);
                $('.ui-term-error').show();
                $('.ui-term-error').html('超过剩余可投金额，数值已变为剩余可投金额');
                $('#invest-submit').removeClass('disabled');
                $("#invest-submit").attr('disabled',false);
                return false
            }if(uisunit != maxamunit){
                $('.ui-term-error').show();
                $('.ui-term-error').html('投资金额需与剩余可投金额一致');
                $('#invest-submit').addClass('disabled');
                $("#invest-submit").attr('disabled',true);
                return false
            }else{
                $('.ui-term-error').hide();
                $('.ui-term-error').html('');
                $('#invest-submit').removeClass('disabled');
                $("#invest-submit").attr('disabled',false);
            }
        }
    }else{
       window.location.href='/?user&q=login';  
       return false
    }
});

//弹出框显示
$('#invest-submit').on('click',function(){
    var investmoney = parseInt($('.ui-input2x').val());
    if(investmoney > 0){
        console.log(investmoney)
        $('#invest_money').html(investmoney);
        $('.J_payable').html(investmoney);
        $('.J_payable').attr('data-payable',investmoney);
        $('#bidAmount').val(investmoney);
        $('.ul-pop').show();  
    }else{
        return false;
    }    
})
//弹出框关闭
$('#popclose').on('click',function(){
    $('.ul-pop').hide();
})


