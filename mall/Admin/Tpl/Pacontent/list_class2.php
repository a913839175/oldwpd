<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批量移动</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<script language="javascript">
	var GV = {
    DIMAUB: "/NewsWeb2/",
    JS_ROOT: "__PUBLIC__/Js/",
    TOKEN: "{$__token__}"
};
</script>

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<script language="javascript">
	$("#c1").click(function(){
			art.dialog.close();  
 
        });

		
	})
</script>
</head>

<body>
	<center>
    <form enctype="multipart/form-data" method="post" name="form1" action='<{:U("Pacontent/list_class2")}>'>
		<div>
        <{$str}>
    		<select size="15" style="width:220px;" name="cid">
            	<volist name="alist" id="vo">
                	<option value="<{$vo.id}>">
                    <?php
                    	for($i=0;$i<$vo['count'];$i++){
							echo "&nbsp;&nbsp;&nbsp;";
						}
					
					?>
                    
                    <{$vo.conclname}></option>
                </volist>
            </select>
   	    </div>
        <div>
        	<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit1">确定</button>
            <input type="hidden" name="str" value="<{$Think.get.str}>" />
        </div>
    </form>
    <center>
</body>
</html>
