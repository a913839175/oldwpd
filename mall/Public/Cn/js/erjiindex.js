 $(document).ready(function () { 
    // 第一个商品对齐的JS
    jQuery.jqshop= function(tabtit,t) {
         var jf_rmtjli=$(tabtit).length;
        for(i=0;i<jf_rmtjli;i++){
         if(i % t == 0){
            $(tabtit).eq(i).css('margin-left','0')
         }
      }
    }
    //热门推荐
    $.jqshop('.jf_rmtjli',4);
    //红包推荐
    <!-- 预先加载这段JS 图片的排版 -->
    $(document).ready(function(){
      var wegouli=$('.jf_wgtjli').length;
        for(i=0;i<wegouli;i++){
            if(i % 2 ==0){
                $('.jf_wgtjli').eq(i).css('margin-left','0');
            }
        }
    });

});