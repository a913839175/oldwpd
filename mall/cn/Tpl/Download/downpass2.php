<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter the password to download</title>
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
		var downpass = $("input[name=downpass]");
		if(downpass.val()==""){
			$(".spanshow").html("<font color='red'>Can not be empty</font>");
			downpass.focus();
		}else{
			
			$.get("<{:U('Download/downpass_save')}>",{downpass:downpass.val(),rand:Math.random()},function(data){
				if(data==1){
					location.href="<{:U('Download/index')}>";
				}else{
					alert("The password is incorrect");
					//history.go(-1);
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
 
		<table width="506" align="center"  class="table_form contentWrap">
        	
            <tr>
            	<th align="right">Download Password</th>
                <td><input type="text" class="input" size="30" name="downpass" />
                    <input type="button" name="button1" class="btn btn_submit mr10 J_ajax_submit_btn" value="Submit" onclick="checkquick()" />
                </td>
            </tr>
            <tr align="center">
            	<td colspan="2"><span class="spanshow"></span></td>
            </tr>
        </table>
        <hr />
        <a href="javascript:history.go(-1);">Click to return</a>

    </center>
</body>
</html>
<script src="__PUBLIC__/Js/common.js"></script>