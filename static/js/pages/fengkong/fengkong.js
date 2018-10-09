define("pages/fengkong/fengkong",["jquery"],function(a){
	var d=a("jquery");

	
	d(function(){
		 c=d("#uigoTop")
		 c.on("click",function(){return d("body,html").animate({scrollTop:0},800),!1});
		 
		 e=d("#uigoTop2")
		 e.on("click",function(){return d("body,html").animate({scrollTop:0},800),!1});
		 
		 d(".fk-box").hide();
		 d(".fk-box:eq(0)").show();
		
		 /*点选项显示响应内容*/
		 d(".fk-list ul li").click(function(){
			//换当前样式
			d(".fk-list ul li").removeClass("fk-currentli");
			d(this).addClass("fk-currentli");
			//换内容
			var x = d(".fk-list li").index(this);
			d(".fk-box").hide();
			d(".fk-box").eq(x).show();
		 })
		 
		 
		 var htpage=1;
		 d(".fk-prev").click(function(){
			  if(htpage>1){
				  d(".fk-htimg").css("background-image","url(/static/hrzhang/images/ht"+(htpage-1)+".jpg)");
				  htpage-=1;
			  }
			  else {
				  d(".fk-htimg").css("background-image","url(/static/hrzhang/images/ht8.jpg)");
				  htpage=8;
			  }
		  });
		  d(".fk-next").click(function(){
			  if(htpage<8){
				  d(".fk-htimg").css("background-image","url(/static/hrzhang/images/ht"+(htpage+1)+".jpg)");
				  htpage+=1;
			  }
			  else {
				  d(".fk-htimg").css("background-image","url(/static/hrzhang/images/ht1.jpg)");
				  htpage=1;
			  }
		  });
		  
		  var htpagebaoxian=1;
		  d(".baoxianfk-prev").click(function(){
				  if(htpagebaoxian>1){
					  d(".baoxianfk-htimg").css("background-image","url(/static/hrzhang/images/baoxian"+(htpagebaoxian-1)+".jpg)");
					  htpagebaoxian-=1;
				  }
				  else {
					  d(".baoxianfk-htimg").css("background-image","url(/static/hrzhang/images/baoxian1.jpg)");
					  htpagebaoxian=1;
				  }
		 });
		 
		  d(".baoxianfk-next").click(function(){
				  if(htpagebaoxian<1){
					  d(".baoxianfk-htimg").css("background-image","url(/static/hrzhang/images/baoxian"+(htpagebaoxian+1)+".jpg)");
					  htpagebaoxian+=1;
				  }
				  else {
					  d(".baoxianfk-htimg").css("background-image","url(/static/hrzhang/images/baoxian1.jpg)");
					  htpagebaoxian=1;
				  }
		 });
		  
	  })

});