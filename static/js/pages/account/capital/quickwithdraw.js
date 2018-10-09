define("pages/account/capital/quickwithdraw",["jquery","rsa","dialog","handlebars","tip","common","widgets/widgets"],function(a){
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
		b(".J_card_list").on("click","a.bankli",function(){b(".J_card_list").addClass("fn-hide"),g(),a(k[b(this).data("index")])})
		})});