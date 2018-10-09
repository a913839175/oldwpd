$(function(){
	 $('.sshezt').on('click',function(){
	 	 index=$(this).index();
         $('.sshezt').removeClass('cur');
         $(this).addClass('cur');
         if(index==0){
         	$('.heing').show();
         	$('.heend').hide();
         }else if(index==1){
         	$('.heing').hide();
         	$('.heend').show();
         }
    });
});
