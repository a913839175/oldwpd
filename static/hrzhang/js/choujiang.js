/*
 * 转盘获取红包
 * 版本号1.0
 */
$(function(){
	
	var superJuneData={
		  superjune:'/?user&q=code/account/superjune'
	};
	
	var t1=0,t2=0;
	var t1_e=360/2;
	var t2_e=360/9;
	
	var t1_arr=new Array("现金30元","现金1000元","现金10元","现金500元","现金5元","现金100元","现金3元","现金50元","现金1元");
	var t2_arr=new Array("红包7万元","红包3000元","红包5万元","红包7000元","红包3万元","红包1000元","红包10万元","红包1万元","红包5000元");
    
	//获取随机数字
	function rand(){
		t1=1;//Math.round(Math.random());
		t2=5;//Math.round(8*Math.random()); 
	}
	
	$("#getPrizeSuccessPop").find('.superJune-btn').click(function(){
        $("#getPrizeSuccessPop").dialog('close');
    });
	
	$("#getPrizeFailPop").find('.superJune-btn').click(function(){
        $("#getPrizeFailPop").dialog('close');
    });
	
	itz={};
	itz.superJune = {};
	itz.superJune.rotate = {}
	
	$("#bt").click(main);
	function main(){
		toback();
		//rand();//随机抽奖
		$("#bt").unbind("click");
		rotate();
	}
	function rotate(){
		if(!window.User.user_id){		 
			location.href='/index.php?user&q=login';	 
		}
		if(window.User.lotterynum==0 || window.User.lotterynum<0){
			$("#getPrizeFailPop").dialog({
                title:'抽奖提示',
                dialogClass:"clearPop pop-style-1",
                bgiframe: true,
                modal: true,
                resizable:true,
                width:373,
                height:244,
                show: {
                    effect: 'fadeIn',
                    duration: 450
                },
                open: function(){
                    $(this).find(".noticepop-content p").html('可通过投资增加抽奖机会!~');
                },
                close:function(){
                    location.href='/choujiang/index.html';
                }
            });
            return false;
		}
		
		 $.ajax({
             url: superJuneData.superjune,
             type: 'post',
             dataType: 'json',
             data: '',
             timeout: 20000,
             success: function(data){
                 if(data.status == 110){
                     $("#getPrizeSuccessPop").dialog({
                         title:'抽奖提示',
                         dialogClass:"clearPop pop-style-1",
                         bgiframe: true,
                         modal: true,
                         resizable:true,
                         width:373,
                         height:244,
                         show: {
                             effect: 'fadeIn',
                             duration: 450
                         },
                         open: function(){
                             $(this).find(".noticepop-content p").html('您的登录状态已过期');
                         },
                         close:function(){
                             location.href='/index.php?user&q=login';
                         }
                     });
                     $("#bt").click(main);
                     return false;
                 }
                 if(data.status == 100 || data.status == 107 || data.status == 108){
                     itz.superJune.rotate.static = true;
                     $("#getPrizeFailPop").dialog({
                         title:'抽奖提示',
                         dialogClass:"clearPop pop-style-1",
                         bgiframe: true,
                         modal: true,
                         resizable:true,
                         width:373,
                         height:244,
                         show: {
                             effect: 'fadeIn',
                             duration: 450
                         },
                         open: function(){
                             if(data.status == 100){
                                 $(this).find(".noticepop-content p").html(data.info);
                             }else if(data.status == 107){
                                 $(this).find(".noticepop-content p").html('可通过投资增加抽奖机会!~');
                             }else if(data.status == 108){
                                 $(this).find(".noticepop-content p").html('活动已结束~'); 
                             }
                         },
                         close:function(){
                         }
                     });
                     return false;
                 }
                
                t1=data.data.chose_hongbrxianj;
                t2=data.data.chose_value;
                 
                t1_deg=30*360+t1_e*(t1+0.5);
         		t2_deg=30*360+t2_e*(t2+0.5);
         		$("#xz").animate({rotate:t1_deg},4000,'easeOutQuart',function(){
         			if(t1==0){
         		      $("#bz").children("img").attr("src","/static/img/huodong/01.png"); 
         			}else{ 
         			  $("#bz").children("img").attr("src","/static/img/huodong/02.png");
         		    }
         			$("#bz").animate({rotate:t2_deg},4000,'easeOutQuart',function(){
         				if(t1==0) {
         					itz.superJune.rotate.text=t1_arr[t2];
         				}else {
         					itz.superJune.rotate.text=t2_arr[t2];
         				}
         				$("#getPrizeSuccessPop").dialog({
                             title:'抽奖提示',
                             dialogClass:"clearPop pop-style-1",
                             bgiframe: true,
                             modal: true,
                             resizable:true,
                             width:373,
                             height:244,
                             show: {
                                 effect: 'fadeIn',
                                 duration: 450
                             },
                             open: function(){
                                 if(itz.superJune.rotate.text == "再接再厉！"){
                                     $(this).find(".noticepop-content p").html(itz.superJune.rotate.text);
                                 }else{
                                     $(this).find(".noticepop-content p").html('恭喜您!获得'+itz.superJune.rotate.text+'！');
                                 }
                                 $("#lotterynum").text((parseInt($("#lotterynum").text())-1));
                                 window.User.lotterynum=window.User.lotterynum-1;
                                 $("#hb_money span").text(itz.superJune.rotate.text);
                                 $("#hb_date span").text(data.info);
                             },
                             close:function(){
                             	
                             }
                         });
         				$("#bt").click(main);
         			});
         		});   
             }
         });		
	}
	
	function toback(){
		$("#bz").children("img").attr("src","/static/img/huodong/07.png");
		$("#bz").animate({rotate:0},0);
		$("#xz").animate({rotate:0},0);
	}
});
