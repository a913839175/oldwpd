(function (){
  define(function(require, exports, module) {
    var $ = require('jquery'),
        Dialog = require('dialog'),
        ZeroClipboard = require('/static/js/dreamplan/ZeroClipboard');
    var clip = null;
    copyUrl = function (){
      ZeroClipboard.setMoviePath( "/static/js/dreamplan/ZeroClipboard.swf" );
      clip = new ZeroClipboard.Client();
      clip.setHandCursor( true );
      clip.setText($('.J_share_url').val());
      clip.addEventListener( "mouseup", function(client) {
    	  showCopyPop();
      });
      clip.glue("J_copy_btn");
    }
    function showCopyPop(){
    	 $("#urlCopySucc").show();
         var dl = new Dialog({
           width:'600px',
           content:$("#urlCopySucc")
         }).show();
         $(".deleteCopyPopClose").on('click',function(){
             $("#urlCopySucc").hide();
         	dl.hide();
         });
    }
    
    ret = {
      init : function (){
        copyUrl();
      }
    };
    return module.exports = ret;
  });
}).call(this)