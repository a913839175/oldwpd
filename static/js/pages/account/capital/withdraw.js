define("pages/account/capital/withdraw",["jquery","rsa","dialog","handlebars","tip","common","widgets/widgets"],function(a){
	var b=a("jquery"),c=a("rsa"),d=a("dialog"),e=a("handlebars"),f=a("tip"),g=(a("common"),a("widgets/widgets")),h=g.Form;
	b(function(){
		function a(a){
			var c=[];
			c.push('<div class="bank-logo"><img src="/static/img/banks/'+a.litpic+'" /></div>'),
			c.push('<span class="card-tail-number">'+a.tailNumber+"</span>"),b(".bank-logo,.card-tail-number",".J_default-bank").remove(),
			b(".J_default-bank").prepend(c.join("")),
			a.isFailLastCashDraw?b(".J_error-tips").removeClass("fn-hide"):b(".J_error-tips").addClass("fn-hide"),
			b("#userBankId").data("index",a.cordIndex).val(a.userBankId)
		}
		function g(){var a="更换"==b(".J_change_card").find("span").text()?"收起":"更换";b(".J_change_card").find("span").text(a),b(".J_change_card").find("i").toggleClass("active")}
		function i(){
			var a=b("#withdrawAmount").val();
			if(0>=a)return b("#withdrawFee").html("0.00"),
			b("#withdrawReal").html("0.00"),
			b(".J_withdrawReal").html("0.00"),
			b(".J_withdrawFee").html("0.00"),void b(".J_withdrawAmout").html("0.00");
			b(".J_withdrawAmout").html("￥"+h.comma(parseFloat(a)));
			var c="cashDraw";
			b.ajax({
				url:"/?user&q=code/account/getCashFee&amount="+a+"&type="+c,cache:!1,dataType:"json",timeout:1e4,
				success:function(a){
					var c=b("#withdrawAmount").val();
					a.cal<c||(b("#totalAmount").val(h.comma(a.balance)),
					b("#withdrawFee").html(h.comma(a.fe)),
					b("#withdrawReal").html(h.comma(a.cal)),
					b(".J_withdrawReal").html("￥"+h.comma(a.cal)),b(".J_withdrawFee").html(h.comma(a.fe)+".00"))}})}
		
		b(".J_change_card").on("click",function(){g(),b(".J_card_list").toggleClass("fn-hide")}),b("#withdrawAmount").val(""),b("#cashPassword").val(""),i();
		var j=b("#withdraw-list-rsp").html();
		j=b.parseJSON(j);var k=[],l={};
		if(0!=j.data.userBanks.length){
			b(".J_no_bank").addClass("fn-hide"),b(".J_default-bank").removeClass("fn-hide");
			for(var m=0;m<j.data.userBanks.length;m++){
				var n=j.data.userBanks[m],o={};
				o.userBankId=n.id,
				o.litpic=n.litpic,
				o.tailNumber=n.cardId.slice(-4),
				o.bankNumber="**** **** **** "+n.cardId.slice(-4),
				o.isFailLastCashDraw=n.isFailLastCashDraw,
				o.cordIndex=m,
				k.push(o)
			}
			l.userBanks=k,
			a(k[0]);
			var p=b("#withdraw-list-template").html(),q=e.compile(p),r=q(l);
			b("#J_banklis").append(r)
		}
		b(document).click(function(a){var c=a.target;b(c).parent("a").hasClass("J_change_card")||b(c).hasClass("J_change_card")||(b(".J_card_list").addClass("fn-hide"),b(".J_change_card").find("span").text("更换"),b(".J_change_card").find("i").removeClass("active"))}),
		b(".J_card_list").on("click","a.bankli",function(){b(".J_card_list").addClass("fn-hide"),g(),a(k[b(this).data("index")])}),
		h.validate({before:function(){jQuery.validator.addMethod("isEnough",function(a,c){return this.optional(c)||parseFloat(b("#totalAmount").val())>=0},h.err.required)},validateData:{submitHandler:function(a){return b(a).find("input[name=cashPassword]").val(b(a).find("input[name=cashPassword]").val()),/^[0-9]*(\.[0-9]{1,2})?$/.test(b("#withdrawAmount").val())?parseFloat(b("#canUseCash").val())-parseFloat(b("#withdrawAmount").val())<0?(h.msg("#subWithdraw","您的账户余额不足","warn"),b("#withdrawAmount").focus(),b("#cashPassword").val(""),!1):(b("#J_sureWithdraw").show(),void new d({width:"650px",content:b("#J_sureWithdraw")}).after("hide",function(){b("#cashPassword").val("")}).after("show",function(){var c=this,e=k[b("#userBankId").data("index")];b(".J_bankNumber").text(e.bankNumber),b(".J_bankLogo").attr("src","/static/img/banks/"+e.litpic),b(".J_close","#J_sureWithdraw").click(function(){c.hide()});
		var f=!1;b(".J_submit_btn").click(function(){f||(f=!0,h.ajaxSubmit(b(a),{msgafter:"#subWithdraw",dataType:"json",success:function(e){c.hide(),b(a).find("input[name=cashPassword]").val(""),0===e.status?(b("#J_apply_success").show(),new d({width:"650px",content:b("#J_apply_success")}).after("show",function(){var a=this;b(".J_close","#J_apply_success").click(function(){a.hide()})}).after("hide",function(){location.reload()}).show()):this.msg(e.message,"warn")}}))})}).show()):(h.msg("#subWithdraw","请输入正确的金额","warn"),b("#withdrawAmount").focus(),b("#cashPassword").val(""),!1)}}}),
		b(".addBank").on("click",function(){return k.length>=10?(b("#J_moreTenCards").show(),new d({width:"650px",content:b("#J_moreTenCards")}).after("show",function(){var a=this;b(".J_close","#J_moreTenCards").click(function(){a.hide()})}).show()):new d({trigger:".addBank",height:"595px",width:"650px"}).before("show",function(){this.set("content",this.activeTrigger.attr("href"))}).after("hide",function(){this.destroy()}).show(),!1}),
		b(".ui-term-placeholder").click(function(){b("#withdrawAmount").focus()}),
		b("#withdrawAmount").focusin(function(){b(".ui-term-placeholder").is(":visible")&&b(".ui-term-placeholder").hide()}).focusout(function(){""===b("#withdrawAmount").val()&&b(".ui-term-placeholder").show()}),
		new f({element:"#tipCon",trigger:"#tips",direction:"right"});
		var s;b("#withdrawAmount").on("keyup blur",function(){if(clearTimeout(s),s=setTimeout(i,250),b(this).val().length>15){var a=b(this).val().substring(0,15);b(this).val(a)}})})});