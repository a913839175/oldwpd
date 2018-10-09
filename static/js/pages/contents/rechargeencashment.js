define("pages/contents/rechargeencashment",["jquery"],function(a){
	var h=a("jquery");
	h(function(){
	    if(h(".announcement_help").length){
	        h(".help_line").each(function() {
	            var _this = h(this);
	            h(this).find(".help_line_title").click(function() {
	                //_this.siblings(".help_line").find(".help_line_title").removeClass("help_line_title_on").siblings(".help_line_text").hide();
	                if(h(this).hasClass("help_line_title_on")) {
	                    h(this).removeClass("help_line_title_on").siblings(".help_line_text").hide();
	                } else {
	                    h(this).addClass("help_line_title_on").siblings(".help_line_text").show();
	                }
	            })
	        })
	   }
	    
	   h("#menu_recharge_encashment").find("a").addClass("menu_announcement_on");
	   var url = window.location;
	   if (/#bank_limit$/.test(url)) {
	       h("#bank_limit").addClass("help_line_title_on").siblings(".help_line_text").show();
	   }else if(/#saving_pot$/.test(url)){
	       h("#saving_pot").addClass("help_line_title_on").siblings(".help_line_text").show();
	   }else if(/#withdrawal$/.test(url)){
	       h("#withdrawal").addClass("help_line_title_on").siblings(".help_line_text").show();
	   } else if(/#bind_bank_limit/.test(url)){
	       h("#bind_bank_limit").addClass("help_line_title_on").siblings(".help_line_text").show();
	   }else if(/#choujaing_pot/.test(url)){
	       h("#choujaing_pot").addClass("help_line_title_on").siblings(".help_line_text").show();
	   }else if(/#yaoshi_pot/.test(url)){
	       h("#yaoshi_pot").addClass("help_line_title_on").siblings(".help_line_text").show();
	   }else if(/#yaoshipotguozhe/.test(url)){
	       h("#yaoshipotguozhe").addClass("help_line_title_on").siblings(".help_line_text").show();
	   }
	   
	   h(".J_select_contract").change(function() {
           h(".dialog_con").find("iframe").attr("src", h(this).val());
           var _download_url = h(".J_select_contract option:selected").attr("name");
           h(".btn_download").attr("href", _download_url);
       });
	   
	})
});