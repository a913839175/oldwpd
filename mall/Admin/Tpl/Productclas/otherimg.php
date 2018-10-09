<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择相关产品</title>
<script language="javascript">
  var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/ajaxpage.js" />
<load href="__PUBLIC__/Js/jquery.uploadify.min.js" />

<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />
<load href="__PUBLIC__/Css/uploadify.css" />





<script type="text/javascript">
    
    $(function() {
      var i=0;
      $('#file_upload').uploadify({
      'auto'     : true,//关闭自动上传
      'removeTimeout' : 5,//文件队列上传完成5秒后删除
      'swf'      : '__PUBLIC__/Swf/uploadify.swf',
      'uploader' : '__URL__/imgupload/proid/<{$Think.get.proid}>',

      'method'   : 'post',          //方法，服务端可以用$_POST数组获取数据
      'buttonText' : '选择图片',//设置按钮文本
      'multi'    : true,//允许同时上传多张图片
      'uploadLimit' : 30,//一次最多只允许上传30张图片
      'fileTypeDesc' : 'Image Files',//只允许上传图像
      'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
      'fileSizeLimit' : '2000KB',//限制上传的图片大小
       'formData': {'sessionid' : '<{:session_id()}>'}, //此处获取SESSIONID,
      'cancelImg' : '__PUBLIC__/Images/cancel.png',
      'onUploadSuccess' : function(file, data, response) { //每次成功上传后执行的回调函数，从服务端返回数据到前端
        
        var json = eval("("+data+")");
        i++;
        $(".image").append('<span class="i_del_'+json.imgid+'"><img src="__PUBLIC__/Uploads/Proclass/s_'+json.savename+'" /><a class="del_a" href="javascript:;" onclick="Del_id('+json.imgid+')"><img src="__PUBLIC__/Images/cancel.png" width="16" height="16" class="img_ico" style=" width:16px; height:16px;"></a>&nbsp;&nbsp;&nbsp;&nbsp;</span>');
      },
      
      });
    });


//ajax单个删除
function Del_id(id){
  if(confirm("确定要删除吗?删除后不可恢复")){
    $.get("__URL__/img_del",{id:id,rand:Math.random(),},function(data){
      if(data==1){
        $(".i_del_"+id).remove(); //移除
      }
   })
  }
  
}
</script>

<?php
   $p=$_GET['p'];
?>
<script type="text/javascript">
  $(function(){
        $("#queding").click(function(){
       
        Wind.use('ajaxForm','artDialog','iframeTools', function () {
          var win = artDialog.open.origin;
          win.location.href='<{:U("Productclas/pclist")}>';
          art.dialog.close();
        })
      })
  })
</script>
</head>

<body>
	<div>
    
		    <div style="width:25%; float:left;height:500px;">
			     <input id="file_upload" name="file_upload" type="file" multiple="true">
   	    </div>
        <div style="width:0.2%; float:left; background:#999; height:500px;"></div>
        <div style="width:74.8%; float:left;height:500px;" class="image">
          <foreach name="imagedata" item="vo">
            <span class="i_del_<{$vo.id}>"><img src="__PUBLIC__/Uploads/Proclass/<{$vo.thumb_img2}>" /><a class="del_a" href="javascript:;" onclick="Del_id(<{$vo.id}>)"><img src="__PUBLIC__/Images/cancel.png" width="16" height="16" class="img_ico" style=" width:16px; height:16px;"></a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          </foreach>
        </div>
        <div style="clear:both;"></div>
        <div class="btn_wrap" style="z-index:999;">
          <div class="btn_wrap_pd">             
            <div class="pages">
              <button class="btn btn_submit mr10 J_ajax_submit_btn" type="button"  name="submit1" id="queding">确定</button> 
                &nbsp;&nbsp;&nbsp;&nbsp;
            	<span class="ajaxpage"><{$page}></span>
            </div>
          </div>
        </div>
        <input type="hidden" name="p" value="<{$Think.get.p}>">
    </div>
</body>
</html>
