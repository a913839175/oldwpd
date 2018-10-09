(function (){
  define(function(require, exports, module) {
    
	var $ = require('jquery'),Dialog = require('dialog');
    
	$(function(){
		
		var hongBao={
			jiesuo:'/?user&q=code/account/jiesuo',
			useHongbao:'/?user&q=code/account/useHongbao'
		};		
		
		//未解锁红包
		$("#hb_wjs  .hb a").each(function(){
			$(this).click(function(){	
				var hId=$(this).parent().parent().find(".hb_id").text();
				var selectObject=$(this);

				$.ajax({
		             url: hongBao.jiesuo,
		             type: 'post',
		             dataType:"JSON",
		             data: {"hId":hId},
		             timeout: 10000,
		             success: function(data){
		            	 if(data.status == 0){
		            		var htmlData=selectObject.parent().parent().html();
		 					/*alert(htmlData);*/
		 					var hdate=selectObject.parent().parent().find(".hb_date").text();
		 					/*alert(hdate);*/
		 					var hmoney=selectObject.parent().parent().find(".hb_money span").text();
		 					/*alert(hmoney);*/
		 					var newHtml="<div class='hb'><div class='hb_money'><span>"+hmoney+"</span>元</div>"
		 							+"<div class='hb_date'>"+hdate+"</div> <div class='hb_bt'><a href='javascript:;'>立即使用</a></div></div>";
		 					$("#hb_yjs").append(newHtml);
		 						 
		 					$(" #hb_ys span").each(function(){
		 						/* var ys=selectObject.parent().parent().html();*/
		 						var ysa=$(this).parent().find("span").text();
		 						/*alert(ysa);*/
		 					
		 						var i=1;
		 						/*alert(i);*/
		 						var a=ysa-i;
		 						/*alert(a);*/
		 					   var newHtmla="<span>"+a+"</span>";
		 						 $(" #hb_ys span").replaceWith(newHtmla);
		 			 		});
		 					selectObject.parent().parent().remove();
		 					showJiesuoPop();
		            	 }
		             }
		         });

			});
			
		  });
	  	 
		  //已解锁红包
		  $("#hb_yjs  .hb a").each(function(){
			$(this).click(function(){
				
				var hId=$(this).parent().parent().find(".hb_id").text();
				var selectObject=$(this);

				$.ajax({
		             url: hongBao.useHongbao,
		             timeout : 50000, //超时时间设置，单位毫秒
		             type: 'post',
		             dataType:"JSON",
		             data: {"hId":hId},
		             success: function(data){
		            	 if(data.status == 0){
		 					var htmlData=selectObject.parent().parent().html();
							/*alert(htmlData);*/
							var hdate=selectObject.parent().parent().find(".hb_date").text();
							/*alert(hdate);*/
							var hmoney=selectObject.parent().parent().find(".hb_money span").text();
							/*alert(hmoney);*/
							var newHtml="<div class='yhb'><div class='hb_money'><span>"+hmoney+"</span>元</div>"
							+"<div class='hb_date'>"+hdate+"</div><div class='hb_bt'>已使用</div></div>";
							$("#hb_ysy #hbmore3").append(newHtml);
							selectObject.parent().parent().remove();
							showShiyongPop();
		            	 }
		            	 if(data.status == 1){
                                     if(data.info =="未通过实名"){ 
                                     	$('.kongfc').hide();
                                         alert("未通过实名验证，请去实名验证！");
                                         window.location.href='./index.php?user&q=code/approve/security';
                                     }else{
                                         alert("红包使用失败！");
                                     }	
			            }
		             }
		         });
				
			});
			
		  });

		
		$("#hb_menu ul li").click(function(){
			$("#hb_menu ul li").removeClass("hb_li_esp");
			$(this).addClass("hb_li_esp");
			index=$("#hb_menu ul li").index(this);
			$(".hb_show").hide();
			$(".hb_show").eq(index).show();
		});
		
		//已使用
		$("#hbmore1 .hbmorebt").click(function(){
			$(this).hide();
			$(this).nextAll(".hb").show();
		});
		
		//未解锁
		$("#hbmore2 .hbmorebt").click(function(){
			$(this).hide();
			$(this).nextAll(".hb").show();
		});
		
		//已使用红包
		$("#hbmore3 .hbmorebt").click(function(){
			$(this).hide();
			$(this).nextAll(".yhb").show();
		});
	});
	
    function showJiesuoPop(){
    	 $("#jiesuoSucc").show();
         var dl = new Dialog({
           width:'600px',
           content:$("#jiesuoSucc")
         }).show();
         $(".deleteCopyPopClose").on('click',function(){
             $("#jiesuoSucc").hide();
         	 dl.hide();
         });
    }
    
    function showShiyongPop(){
   	 $("#shiyongSucc").show();
        var dl = new Dialog({
          width:'600px',
          content:$("#shiyongSucc")
        }).show();
        $(".deleteCopyPopClose").on('click',function(){
            $("#shiyongSucc").hide();
        	dl.hide();
        });
   }
   	 	$('.hb_aleardyuse').on('click',function(){
   		 		$('.kongfc').show();
   		})

  });
}).call(this)