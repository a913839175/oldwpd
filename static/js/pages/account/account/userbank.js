define("pages/account/account/userbank",["jquery","pages/account/account/addcard","widgets/widgets","dialog","handlebars"],
	function(a){
	        function b(a,b){
	        	a.length&&(b?a.removeAttr("disabled").removeClass("ui-button-disabled"):a.attr("disabled","disabled").addClass("ui-button-disabled"))
	        }
	        var c,d,e=a("jquery"),f=a("pages/account/account/addcard"),g=a("widgets/widgets"),h=a("dialog"),i=a("handlebars"),
	        j=(e("#getMobileCode"),g.Form);
	        e(function(){
	        	function a(a){
	        		var c={cardNum:b(a),realname_secur:e("#realname_secur").val()},
	        		f=i.compile(e("#dialog-confirmBankNum").html()),
	        		g=f(c);d=new h({content:g,width:500,closeTpl:"",hasMask:{hideOnClick:!1}}).show()
	        	}
	        	function b(a){
	        		return a.replace(/\d{4}/g,function(a){return a+" "})
	        	}
	        	var c,d,g=!0;f.pop.init(),f.search.init(),e("#close").click(function(){e(".ui-dialog-close",parent.document).trigger("click")}),
	        	e("body").on("click","#card-confirm",function(){d.hide(),g=!1,c=e("#cardId").val(),e("form").submit()}),
	        	e("body").on("click","#card-cancel",function(){d.hide(),e("#cardId").focus(),g=!0,c=e("#cardId").val()}),
	        	j.validate({validateData:{
	        		submitHandler:function(b){
	        			e("#addcard").attr("disabled",true),
	        			e("#J_must_chooseBankArea").hide(),
	        			j.ajaxSubmit(e(b),{
	        				beforeSend:function(){var b=e("#cardId").val(),d=j.is.isLuhn(b);return c&&c!=b&&(g=!0),g&&!d?(a(b),!1):void 0},
	        				dataType:"JSON",
	        				success:function(a){
	        					0===a.status?(e("#J_addCardSuccess").show(),
	        					new h({width:"500px",content:e("#J_addCardSuccess")})
	        					.after("show",function(){var a=this;e(".J_close","#J_addCardSuccess").click(function(){a.hide()})})
	        					.after("hide",function(){parent.location.reload()}).show()):e("#serverMsg").html(a.message);
	        				}})}}}),
	        	e("#cardId").on("keydown",function(a){return(a.keyCode<48||a.keyCode>57)&&8!=a.keyCode&&(a.keyCode<96||a.keyCode>105)?!1:void e(".J_friendTip").show()}),
	        	e("#cardId").on("keyup",function(){e(".J_friendTip").html(b(e(this).val()))}),
	        	e("#cardId").on("focus",function(){""!==e("#cardId").val()&&e(".J_friendTip").show()}),
	        	e("#cardId").on("blur",function(){e(".J_friendTip").hide()})}),
	        d=j.sendPhoneCode("","getMobileCode","/?user&q=login&q=sendCode",{onStart:function(){b(e("#getVoiceCode"),!1),e("#voiceCodeBox").show()},onClear:function(){b(e("#getVoiceCode"),!0)},unDisabled:!0}),
	        c=j.sendPhoneCode("","getVoiceCode","/?user&q=login&q=sendCode",{onStart:function(){b(e("#getMobileCode"),!1)},onClear:function(){b(e("#getMobileCode"),!0)},unDisabled:!0}),
	        e(document).click(function(a){var b=a.target;e(b).parent("span").hasClass("arrow")||e(b).parent("div").hasClass("J_select_btn")||e(b).closest("div.J_popBankBox").length||e(".J_popBankBox").css("display","none")}),
	        e(".J_select_btn").click(function(a){e(".J_popBox").css("display","none");var b=e(a.currentTarget).parent().find(".J_popBankBox");"block"==b.css("display")?b.css("display","none"):b.css("display","block")}),
	        e(".J_chooseOtherBank").click(function(){var a="选择其他银行"==e(this).text()?"收起":"选择其他银行";e(this).text(a),e(".J_otherBankList").toggle()}),
	        e(".J_popBankBox li").click(function(a){var b=e(a.currentTarget).attr("datavalue"),c=e(a.currentTarget).html(),d=e(a.currentTarget).parent().parent().parent();e("#selBankType").attr("value",b),e(".J_popBankBox").hide(),d.find(".J_txt").html(c),e("#J_must_chooseBank").hide(),e("#selBankType").blur()})});