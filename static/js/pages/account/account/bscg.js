// define("pages/account/account/bscg",["Validform"],function(a){
define(function(require, exports, module){
	var kitingnum = $('#kitingnum').html();
	//提现金额验证
	$(".bscg").Validform({
		btnSubmit:"#cash_button",	
		tiptype: 3,
		datatype:{
			isNumberthan100:function(gets,obj,curform,regxp){
	 			if(gets >= 100){
	 				if(gets < kitingnum){
	 					return true;
	 				}else{
	 					return "可用余额不足！！";
	 				}
				  	
				}else{
				  	return false;
				}
			},
			agree:function(gets,obj,curform,regxp){
				if(!curform.find("input[name='"+obj.attr("name")+"']:checked").length){
					return false;
				}						
			}
		},
		beforeSubmit:function(curform){
                    var total=$(".bscg_input").val();
                    $.ajax({
                            url: '/?user&q=code/bscg/cash',
                            type: 'POST',
                            data: {"total":total},
                            cache: false,
                            success: function (obj) {
                                var json=JSON.parse(obj);
                                if (json.length !== 0) {
                                    if(json.returnCode==1){
                                        window.location.href=json.requestUrl;
                                    }else{
                                        alert(json.returnMsg);
                                    }
                                }else{
                                    alert("参数错误");
                                }
                            }
                        });
			// var kitingnum=$('#kitingnum').html() * 1;
			// var bscg_input=$('.bscg_input').val() * 1;
			// if(bscg_input > kitingnum)
		}
	});
	//绑卡弹出窗口
	$(document).on('click','#J_Bnakcard',function(){
		var J_Bnakcard = $('#J_Bnakcard').html();
		if(J_Bnakcard == "绑卡"){
			$('.mask1').show();
		}
	});
	$(document).on('click','#pop_box_closema',function(){
		$('.mask1').hide();
	});
	var regForm = $('.pop_changepp1').Validform({
		btnSubmit: ".surebang",
		tiptype: 3,
		beforeSubmit: function(curform) {
			var mobile=$("#iphone").val(),backcard=$("#backcard").val();
                        $.ajax({
                                url: '/?user&q=code/bscg/bind',
                                type: 'POST',
                                data: {"mobile": mobile,'backcard':backcard},
                                cache: false,
                                success: function (obj) {
                                    var json=JSON.parse(obj);
                                    if (json.length !== 0) {
                                        if(json.returnCode==1){
                                            window.location.href=json.requestUrl;
                                        }else{
                                            $("#backcard").val("");
                                            alert(json.returnMsg);
                                        }
                                    }else{
                                        alert("参数错误");
                                    }
                                }
                            });
                        
		}
	});
	$(document).on('click','.kybalance04_02',function(){
		var acc_bank_flag = $('.acc_bank_flag').val();
		console.log(acc_bank_flag)
		if(acc_bank_flag == 1){
			$(this).attr('href','/?user&q=code/bscg/cash_bscg');
		}else{
			alert('请先绑定您的银行卡！');
			return false;
		}
	});
});