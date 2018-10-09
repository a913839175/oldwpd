<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批量移动</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<script language="javascript">
	var GV = {
    
    JS_ROOT: "__PUBLIC__/Js/",
    
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
    <form enctype="multipart/form-data" method="post" name="form1" action='<{:U("Content/list_class")}>'>
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
                    
                    <{$vo.conclassname}></option>
                </volist>
            </select>
   	    </div>
        <div style="clear:both;"></div>
        <div style="width:220px; text-align:left;">
            转换语言为
            <select name="lang">
                <foreach name="lang_data" item="vo">
                      <option value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
                </foreach>
            </select>
            &nbsp;
            
        	<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit1">确定</button>
            <input type="hidden" name="str" value="<{$Think.get.str}>" />
        </div>
    </form>
    <center>
</body>
</html>
