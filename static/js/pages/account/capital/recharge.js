define("pages/account/capital/recharge",["jquery","dialog","tip","widgets/widgets","handlebars"],function(a){
	
	var h=a("jquery"),i=a("dialog"),j=a("tip"),k=a("widgets/widgets"),l=a("handlebars"),m=k.Form,em=h("#recharge_net_bank");
	h(function(){
		
		 function countdown ($button, fromNum) {
			    var buttonTitle = $button.html()
			    var timer = null
			    var from = fromNum || 180

			    from++

			    var start = function () {
			      if (from > 1) {
			        from--
			        $button.html(from + '秒后再获取')
			      } else {
			        enableButton($button)
			        $button.html(buttonTitle)

			        window.clearInterval(timer)
			      }
			    }

			    disableButton($button)
			    start()
			    timer = window.setInterval(start, 1000)

			    return timer
		}
		 
		function disableButton($button) {
			$button.prop('disabled', true).addClass('disabled')
		}
		
		function enableButton ($button) {
		    $button.prop('disabled', false).removeClass('disabled')
		}
		
		function a(a){
			var b=a.find("li:first"),
			c=b.data("type");
			b.siblings().removeClass("active"),
			b.addClass("active"),
			n.val(c),
			l.val(b.data("value")),
			k=b.data("value"),
			h(".banks-limit-table table").hide(),
			h("."+b.data("value")+"-table").show()
		}
		
		em.find("input[name=agreement]").change(function(){
            if(h(this).prop("checked")) {
                em.find("button[type=submit]").removeClass("disabled");
                em.find("button[type=submit]").attr("disabled",false);
                h("#custom_checkbox").addClass("checked");
            } else {
                em.find("button[type=submit]").addClass("disabled");
                em.find("button[type=submit]").attr("disabled",true); 
                h("#custom_checkbox").removeClass("checked");
            }
        })
       
        fm = h(".J_radio");
		fm.each(function(){
               var _this = h(this);
               if(_this.prop("checked")) {
                   _this.parent().addClass("checked");
                   $("input[name=" + _this.attr("name") + "]").each(function(){
                       if(!h(this).prop("checked")) {
                    	   h(this).parent().removeClass("checked");
                       }
                   })
              } else {
                   _this.parent().removeClass("checked");
              }

              _this.bind("change", function() {
                  if(_this.prop("checked")) {
                         _this.parent().addClass("checked");
                        h("input[name=" + _this.attr("name") + "]").each(function() {
                             if(!h(this).prop("checked")) {
                                h(this).parent().removeClass("checked");
                             }
                         })
                  } else {
                         _this.parent().removeClass("checked");
                  }
                  h(".banks-limit-table table").hide();
      			  h("."+_this.val()+"-table").show();
              });
              
        })
        
        
        
        var $amount = h('input[name=amount]');
		var $userBankId = h('input[name=userBankId]');
        var $bindingRechargeForm = h('#regchargeForm');
		var $bindingBankCardNo = $bindingRechargeForm.find('input[name=bankCardNo]');
		var $bindingBankLeavePhone = $bindingRechargeForm.find('input[name=bankLeavePhone]');
		var $bindingSendSmsButton = $bindingRechargeForm.find('button[name=sendSmsButton]');
		var $bindingBankCode = $bindingRechargeForm.find('input[name=bankCode]');
		var tradeId = null;
		
        $bindingSendSmsButton.on('click', function () {      	
        	if($amount.val()< 5 && !$userBankId.val()){
                h(".J_error").hide();
                h("#J_amount_must_error").show();
            }else if($amount.val()< 100 && $userBankId.val()){
                return false;
            }else if(!$bindingBankCardNo.val() && !$userBankId.val()){
                h(".J_error").hide();
                h("#J_must_setMp").show();
            }else if(!$bindingBankLeavePhone.val() && !$userBankId.val()){
                h(".J_error").hide();
                h("#J_must_setBankCardNo").show();
            }else{
                h(".J_error").hide();             
	        	var self = this;
	            var postData = {
	              amount: $.trim($amount.val()),
	              userBankId: $.trim($userBankId.val()),
	              bankCardNo: $.trim($bindingBankCardNo.val()),
	              mp: $.trim($bindingBankLeavePhone.val()),
	              bankCode: $.trim($bindingBankCode.filter(':checked').val())
	            }
	            h.ajax({
	              url: "/?user&q=code/account/recharge_new_quick",
	              data: postData,
	              dataType:"JSON",
	              beforeSend: function () {
	                tradeId = null
	                disableButton(h(self))
	              },
	              success: function (a) {
	                if(0===a.status){
	                
	                  h("#J_must_setAmount").hide();
	                  h("#J_must_setMp").hide();
	                  h("#J_must_setBankCardNo").hide();
	                    
	                  isBankInfoCorrect = true;
	                  $bindingBankCardNo.prop('readonly', true);
	                  $bindingBankLeavePhone.prop('readonly', true);
	                  sendSmsTimer = countdown($bindingSendSmsButton);
	                  //tradeId = data;
	                  h("#ticket").val(a.data);
                          if(a.html){
                              seajs.use(['jquery','widgets/widgets','dialog','handlebars','tip','common'],function($,Widgets,Dialog,Handlebars,Tip,Common){
                                  new Dialog({
                                    width: '650px',
                                    height: '595px',
                                    content: a.html+'<script language="JavaScript" type="text/JavaScript">sendOrder.target="_blank";sendOrder.submit();</script>'
                                  }).after('show',function(){
                                    this.hide();
                                  }).show();
                              });
                          }
	                } else {
	                  enableButton(h(self));
	                  document.getElementById('J_must_error').innerHTML = a.message;
	                  h("#J_must_error").show();
	                }
	              }
	            });
        	}
        })
 
		var C=m.validate();
		h("#sub-recharge").click(function(a){return h("form").submit(),C.valid()?(new i({width:"500px",hasMask:{hideOnClick:!0},content:h("#afterSub")}).show()):!1}),
		h("#finishRecharge").click(function(){location.reload()}),
		h("#troubleRecharge").click(function(){location.reload()})
	})
});