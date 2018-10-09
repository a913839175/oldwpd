<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加分类</title>



<script language="javascript">
	var GV = {
   
    JS_ROOT: "__PUBLIC__/Js/",
    
};
</script>





<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />




<script language="javascript">
	$(function(){
		$(".J_ajax_submit_btn").click(function(){
			var downclassname = $("#downclassname");
			//var classphoto = $("#classphoto");
			//var classphotopath = classphoto.val();
			
			
			
			if(downclassname.val()==""){
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
							downclassname.focus();
						}
					});
				});
					return false;
			}else{
				
				return true;
			}
			
			
		})
	})
</script>

</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Down/plist")}>'>下载管理	</a></li>
        <li><a href='<{:U("Downclas/add")}>'>添加分类</a></li>
      </ul>
	</div>
  <div class="h_a">添加分类</div>
  <form name="myform" action="<{:U("Downclas/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">分类名称</th>
          <td><input type="text" name="downclassname" value="" class="input" id="downclassname" size="30" placeholder="分类名称">&nbsp;<font color="#FF0000">*</font></td>
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
                    
                    <{$vo.downclassname}>
                    
                    </option>
               
            	
             </foreach> 
            </select>
            
          </td>
        </tr>
		
        <!-- <tr>
          <th>分类图片</th>
          <td>
          	<input type="file" name="classphoto" id="classphoto" />
          </td>
        </tr>-->
            
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
          <th>语言</th>
          <td>
            <select name="lang">
            
              <foreach name="lang_data" item="vo">
                    <option value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
              </foreach>
       
            </select>
          </td>
        </tr>
        <tr>
          <th>备注</th>
          <td><textarea name="downclasscontent"  class="inputtext" style=" width:450px;height:100px;" placeholder="该分类的其他信息："></textarea></td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit1">确定</button>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit2">保存并继续添加</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>