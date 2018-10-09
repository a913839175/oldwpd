define("pages/tender/tender",["jquery"],function(a){
	
	var d=a("jquery");
	
	d(function(){
		 d(".lc-pgbox").hide();
		 d(".lc-pgbox:eq(0)").show();
		 d(".lcgridbottm").hide();
		 d(".lcgridbottm:eq(1)").show();
		 /*点选项显示响应内容*/
		 d(".lc-tit ul li").click(function(){
			//换当前样式
			d(".lc-tit ul li").each(function(index, element) {
				d(this).children("img").attr("src","/static/img/tender/lqh-2016-"+(index+1)+"1.png");
			});
			d(this).children("img").attr("src","/static/img/tender/lqh-2016-"+(d(".lc-tit ul li").index(this)+1)+"2.png");
			//换内容
			var x = d(".lc-tit li").index(this);
			d(".lc-pgbox").hide();
			d(".lc-pgbox").eq(x).show();
			})
			//////
			d(".lcgridtop ul li").click(function(){
			//换当前样式
			d(".lcgridtop ul li").removeClass("cb");
			d(this).addClass("cb");
			//换内容
			var x = d(".lcgridtop li").index(this);
			d(".lcgridbottm").hide();
			d(".lcgridbottm").eq(x).show();
			})

		    $('.cpzs_li').on('click', function () {
		        cpindex = $(this).index();
		        $(this).addClass('bordercur').siblings().removeClass('bordercur');
		        if (cpindex == 0) {
		            $('.cpzs_dyk').show();
		            $('.tzr_bg').hide();
		        } else if (cpindex == 1) {
		            $('.cpzs_dyk').hide();
		            $('.tzr_bg').show();
		        }
		    });	
	})

});