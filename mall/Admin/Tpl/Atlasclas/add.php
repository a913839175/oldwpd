<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加分类</title>



<script language="javascript">
	var GV = {
    DIMAUB: "/NewsWeb2/",
    JS_ROOT: "__PUBLIC__/Js/",
    TOKEN: "{$__token__}"
};
</script>





<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />
<load href="__PUBLIC__/Css/uploadfile.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<script type="text/javascript" src="__PUBLIC__/Js/ajaxfileupload.js"></script>



<script language="javascript">
	$(function(){
		$(".J_ajax_submit_btn").click(function(){
			var atlclassname = $("#atlclassname");
			var pic = $("input[name='pic']");
			//var classphoto = $("#classphoto");
			//var classphotopath = classphoto.val();
			
			
			
			if(atlclassname.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "分类名称不能为空",
						cancelVal: '确定',
						cancel: function(){
							atlclassname.focus();
						}
					});
				});
					return false;
			}else if(pic.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "分类图片不能为空",
						cancelVal: '确定',
						cancel: function(){
							$(".addImg").focus();
						}
					});
				});
					return false;
			}else{		
				return true;
			}
			
			
		})
	})
	
//上传图片
function ajaxImgUpload(){

	$.ajaxFileUpload ({
	 url:'__APP__/Atlasclas/Imgajax',
	 secureuri:false,
	 fileElementId:'pic',
	 dataType: 'json',
	 success: function (data){
	
	 	//alert(data.extension);
		$("#loading3").html("<font color=\"green\">上传成功</font>");
		$("#loading4").attr("src","__PUBLIC__/Uploads/Atlclass/"+data.savename)//图片
		$("#loading31").html("<a href=\"javascript:void(0)\" onclick=\"delbtn2()\" class=\"delbtn2\">删除</a>");
		
		$("input[name='pic']").val(data.savename);//隐藏域赋值
		
		//var name = new Array();
		//name = data.name.split(".");
	 }
	 
	 }) 
	 return false;
}

//删除上传图片
	function delbtn2(){
		$("#loading3").html("");
		$("#loading4").attr("src","__PUBLIC__/Images/default.jpg")//图片
		$("input[name='pic']").val("");
		$(".delbtn2").remove();
	}

</script>

</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Atlas/plist")}>'>图册管理	</a></li>
        <li><a href='<{:U("Atlasclas/add")}>'>添加分类</a></li>
      </ul>
	</div>
  <div class="h_a">添加分类</div>
  <form name="myform" action="<{:U("Atlasclas/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">分类名称&nbsp;&nbsp;<font color="#FF0000">*</font></th>
          <td><input type="text" name="atlclassname" value="" class="input" id="atlclassname" size="30" placeholder="分类名称">&nbsp;</td>
        </tr>
        
        <tr>
          <th width="100">所属父类</th>
          <td>
          	<select name="pid">
             	<option value="0">/</option>
             <foreach name="alist" item="vo">
             	
                	<option value="<{$vo.id}>">
                    <?php
                    for($i=0;$i<$vo['count'];$i++){
						echo "&nbsp;&nbsp;&nbsp;";
					}
					?>
                    
                    <{$vo.atlclassname}>
                    
                    </option>
               
            	
             </foreach> 
            </select>
            
          </td>
        </tr>
		
         <tr>
          <th>分类图片&nbsp;&nbsp;<font color="red">*</font></th>
          <td>
          	  <a href="javascript:void(0);" class="btn_addPic addImg"><span><em>+</em>上传缩略图</span><input type="file" name="pic1" onchange="return ajaxImgUpload()"  class="filePrew" id="pic" /></a>&nbsp;
          
           <span id="loading3"></span>
          
          <img src="__PUBLIC__/Images/default.jpg" width="80" id="loading4" height="55" border="0" />
          <span id="loading31"></span>
          </td>
        </tr>
            
         <tr>
          <th>是否显示</th>
          <td>
          	<select name="isshow">
            
            	<option value="1">是</option>
                <option value="0">否</option>
       
            </select>
          </td>
        </tr>
        <tr>
          <th>备注</th>
          <td><textarea name="atlclasscontent"  class="inputtext" style=" width:450px;height:100px;" placeholder="该分类的其他信息："></textarea></td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit1">确定</button>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit2">保存并继续添加</button>
        <input type="hidden" name="pic" />
      </div>
    </div>
  </form>
</div>
</body>
</html>