define("pages/account/index",["jquery","common","protocol","widgets/widgets","mask","tip"],function(a){
	function b(){$guide=g("#novice-guide"),$ad=g(".ad-dimgray"),$guide.length&&($ad.length&&$ad.hide(),$guide.find(".close,.goto").on("click",function(){$guide.hide(),k.hide()}).end().find(".next").on("click",function(){var a=$guide.data("type").toLowerCase(),b=$guide.css("backgroundImage"),c=b.match(/(account-step-)(\d)/),d=parseInt(c[2],10);d++,d>=3&&(g(this).remove(),g(".goto").show(),$ad.show()),"借出者"==a?($guide.css({background:"url(/static/img/guide/"+c[1]+d+"-lender.png)"}),g("#novice-guide .guide").removeClass().addClass("guide "+c[1]+d+"-lender")):($guide.css({background:"url(/static/img/guide/"+c[1]+d+"-borrower.png)"}),g("#novice-guide .guide").removeClass().addClass("guide "+c[1]+d+"-borrower"))}),k.set("backgroundColor","#000").set("zIndex",100001).set("opacity","0.6").show())}
	function c(a,b,c){var d=g(a,".LOAN-WAITING_AUDIT");d.find("img:first").attr("src","/static/img/auth_icon/mid/"+b+c.str+".png"),""!==c.src?d.find("img:last").attr("src",c.src):d.find("em").addClass("fn-hide"),d.removeClass("fn-hide")}
	function d(a){var b={VALID:["light","pass"],INVALID:["dark",""],PENDING:["light","uploaded"],OVERDUE:["dark","expired"],FAILED:["dark","reject"]};if("OVERDUE"==a)n.push("overdue");else if("FAILED"==a)n.push("failed");else if("INVALID"==a)return{str:b[a][0],src:""};var c=["/static/img/auth_icon/mid/",b[a][1],".png"];return{str:b[a][0],src:c.join("")}}
	function e(a,b){var c={RRGXD:"RRGXD",RRSYD:"RRSYD",RRWSD:"RRWSD"};c[a]&&g(".yeltip-button",b).find("a").attr("href","/borrow/borrowPage.action?loanProductType="+c[a])}
	function f(){t&&w[t.type]()}
	var g=a("jquery"),h=a("common"),i=a("protocol"),j=a("widgets/widgets"),k=a("mask"),l=a("tip"),m=0,n=[];
	b(),
	g("#info-box .icons a").each(function(){
		var a=/highligh/.test(this.className);
		a&&(m+=25)
	}),
	g("#safe-progressbar").attr("title",m+"%").find("div").css("width",m+"px");

	for(var o=h.loadJSON(g("#borrowing-rsp"),!0),p=o.data.loans,q=i.translator,r=0;r<p.length;r++)p[r].notPayPrincipal=q._commaFloat(p[r].notPayPrincipal),p[r].notPayInterestAndMgmtFee=q._commaFloat(p[r].notPayInterestAndMgmtFee),p[r].overdueAmount=q._commaFloat(p[r].overdueAmount);

	h.fillTemplate({container:g("#borrowing"),data:o,template:g("#borrowing-template"),isResponse:!0}),
	new j.List({name:"loan-list",api:i.API.getLoans,header:!0}).init(h.loadJSON("#loan-list-rsp",!0)),
	new l({element:"#tipCon_1",trigger:"#tips_1",direction:"right"}),
	new l({element:"#tipCon_2",trigger:"#tips_2",direction:"right"}),
	g(".icon-box","#info-box").each(function(a){
		if(!g(this).hasClass("highligh")){
			var b=g(this).find("a"),
			c=b.data("txt").split("||"),
			d=b.attr("href"),	
			e=140+40*a;
			return g("#tipCon_3").css({position:"absolute",left:e+"px",top:"60px"}).find(".ui-poptip-content").html("<div>"+c[0]+"<a href='"+d+"'>"+c[1]+"</a><i class='iconfont closeTip' style='position: absolute;right:-1px;top:-1px;cursor: pointer;color:#d9c6a4; font-size:16px;padding: 0 2px; height: 16px;line-height: 16px;'>&#xF045;</i></div>").end().show(),!1}}),
	g(".closeTip").on("click",function(){g(this).parents(".ui-poptip").hide()}),
	g(".yelltips-close").click(function(){g(this).parent().addClass("fn-hide"),g.ajax({url:"/notification/updateStatus.action?combiType=LOAN_REJECTED&status=CLOSED"})});
	var s=notification.data,t=s.notification;
	if(t){
		var u=t.productType||"",
		v={NONE:function(){g(".LOAN-NONE").removeClass("fn-hide")},
		INCOMPLETE_INFO:function(){var a=".LOAN-INCOMPLETE_INFO";g(".basic-percent",a).css({width:t.formProgress+"%"}),g(".basic-progress-value",a).find("em").text(t.formProgress+"%"),100==t.formProgress&&g(".yeltip-button",a).find("a").text("提交申请"),e(u,g(a)),g(a).removeClass("fn-hide")},
		WAITING_AUDIT:function(){var a=".LOAN-WAITING_AUDIT",b=d(t.idStatus);if(c(".idStatus","id_",b),"RRGXD"==u||"RRSYD"==u){var f=d(t.userCreditStatus);c(".userCreditStatus","credit_",f);var h=d(t.incomeStatus);c(".incomeStatus","income_",h);var i=d(t.workStatus);c(".workStatus","work_",i)}if("RRWSD"==u){var j=d(t.eshopStatus);c(".eshopStatus","work_",j)}0===n.length?(g(".loan-tips",a).removeClass("fn-hide"),g(".yeltip-button",a).addClass("fn-hide")):-1!=n.join("").indexOf("failed")&&g(".loan-reject-msg",a).removeClass("fn-hide"),e(u,g(a)),g(a).removeClass("fn-hide")},
		AUDITING:function(){var a=".LOAN-AUDITING",b=Math.round(t.passedMaterialCount/t.uploadedMaterialCount*100);g(".basic-percent",a).css({width:b+"%"}),g(".basic-progress-value",a).find("em").text("已通过"+t.passedMaterialCount+"项"),e(u,g(a)),g(a).removeClass("fn-hide")},
		REJECTED:function(){t.closeable||g(".yelltips-close",".LOAN-REJECTED").remove(),g(".LOAN-REJECTED").removeClass("fn-hide")},
		OPEN:function(){var a=".LOAN-OPEN",b=t.useMonthlyComprehensiveFeeRate||!1;g(".amount",a).text(t.amount),g(".interest",a).text(t.interest),g(".months",a).text(t.months),b?g(".fee-rate",a).text(t.finalMonthlyComprehensiveFeeRate):(g(".J_fee-rate",a).text("借款利率"),g(".fee-rate",a).text(t.interest)),g(".creditLevel",a).text(t.creditLevel),g(".basic-percent",a).css({width:t.finishedRatio+"%"}),g(".basic-progress-value",a).find("em").text(t.finishedRatio+"%"),e(u,g(a)),g(a).removeClass("fn-hide")}},
		w={
			FINANCE_PLAN:function(){var a=".FINANCE_PLAN";g(".bookedNum",a).text(t.bookedNum),g(".planName",a).text(t.planName).attr("href","/financeplan/listPlan!detailPlan.action?financePlanId="+t.id),g(".payDueDate",a).text(t.payDueDate),g(".unpaidAmount",a).text(t.unpaidAmount+"元"),g(".FINANCE_PLAN").removeClass("fn-hide")},
			REPAY:function(){var a=".REPAY";g(".loanCount",a).text(t.loanCount),g(".latestRepayDate",a).text(t.latestRepayDate),g(".repayAmount",a).text(t.repayAmount+"元"),"OVER_DUE"==t.status&&(g(".overDuedCount",".REPAY-OVER_DUE").text(t.overDuedCount),g(".overDuedDays",".REPAY-OVER_DUE").text(t.overDuedDays+"天"),g(".REPAY-OVER_DUE").removeClass("fn-hide")),"UNREPAID"==t.status&&(g(".leftMonths",".REPAY-UNREPAID").text(t.leftMonths+"/"+t.totalMonths),g(".REPAY-UNREPAID").removeClass("fn-hide"))},
			LOAN:function(){var a=t.status;v[a]()}
			};
		f()}
	// 元宵节活动页
	// var user_id = $('.user_id').val();
	// var acc_depository_flag = $('.acc_depository_flag').val();
	// if(acc_depository_flag != 1){
	// 	var storage = window.localStorage;
	//     if (!storage.getItem(user_id)) {
	//          $('#J_KTbscg').show();
	//          storage.setItem(user_id,true);
	//     }else{
	//         $('#J_KTbscg').hide();
	//     }
	//     $('.mask-close').click(function(){
	//         $('#J_KTbscg').hide();
	//     });
	// }
});