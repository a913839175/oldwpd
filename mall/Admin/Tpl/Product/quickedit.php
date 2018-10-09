<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>快速编辑</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<script language="javascript">
	var GV = {
    JS_ROOT: "__PUBLIC__/Js/",

};
</script>
<?php
   $p=$_GET[p]; //获取分页的
?>
<script language="javascript">
	function checkquick(){
		var proname = $("input[name=proname]");
		var proid = $("input[name='proid']");
		if(proname.val()==""){
			$(".spanshow").html("<font color='red'>不能为空</font>");
			proname.focus();
		}else{
			
			$.get("<{:U('Product/quickeditsave')}>",{proname:proname.val(),proid:proid.val(),rand:Math.random()},function(data){
				if(data==1){
					Wind.use('ajaxForm','artDialog','iframeTools', function () {
					 var win = artDialog.open.origin;
         			 win.location.href='<{:U("Product/plist",array("p"=>$p))}>';
         			 art.dialog.close();
         			});
				}else{
					alert("修改失败");
				}
			});
		}
	}
	
	
</script>

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />


</head>

<body>
	<center>
 
		<table width="306" align="center"  class="table_form contentWrap">
        	<tr>
            	<th width="51" height="25" align="right">产品名</th>
                <td width="243" align="left"><b><{$data.proname}></b></td>
            </tr>
            <tr>
            	<th align="right">修改为</th>
                <td><input type="text" class="input" size="25" name="proname" />
                    <input type="button" name="button1" class="btn btn_submit mr10 J_ajax_submit_btn" value="确定" onclick="checkquick()" />
           			<input type="hidden" name="proid" value="<{$data.id}>" />
                </td>
            </tr>
            <tr align="center">
            	<td colspan="2"><span class="spanshow"></span></td>
            </tr>
        </table>

    </center>
</body>
</html>
<script src="__PUBLIC__/Js/common.js"></script>