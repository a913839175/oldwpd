<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改分类</title>

<script language="javascript">
	var GV = {
    
    JS_ROOT: "__PUBLIC__/Js/",
    
};
</script>




<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Css/cloud-zoom.css" />
<load href="__PUBLIC__/Js/cloud-zoom.1.0.2.min.js" />
<style type="text/css">
  /* zoom-section */
  .zoom-section{clear:both;margin-top:20px;}
  *html .zoom-section{display:inline;clear:both;}

  .zoom-small-image{border:4px solid #CCC;float:left;margin-bottom:0px;}
</style>



<script language="javascript">
	$(function(){
		$(".J_ajax_submit_btn").click(function(){
			var classname = $("#classname");
			var classphoto = $("#classphoto");
			var classphotopath = classphoto.val();
			
			
			
			if(classname.val()==""){
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
							classname.focus();
						}
					});
				});
					return false;
			}
			
			
			
			else{
				
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
        <li><a href='<{:U("Down/plist")}>'>下载管理</a></li>
        <li><a href='javascript:void(0)'>修改分类</a></li>
      </ul>
	</div>

  <div class="h_a">修改分类</div>
  <form name="myform" action="<{:U("Downclas/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">分类名称</th>
          <td><input type="text" name="downclassname" value="<{$data.downclassname}>" class="input" id="downclassname" size="30" placeholder="分类名称">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        
	    <tr>
          <th>是否显示</th>
          <td>
          	<select name="isshow">
            
            	<option value="1"
               	<if condition="$data.isshow eq 1">selected</if> 
                >是</option>
                <option value="0"
               	<if condition="$data.isshow eq 0">selected</if>  
                >否</option>
           
            </select>
          </td>
        </tr>
        <tr>
          <th>语言</th>
          <td>
            <select name="lang">
            
              <foreach name="lang_data" item="vo">
                  <if condition="$data.lang eq $vo[lang_val]">
                     <option selected value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
                   <else />
                     <option value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
                   </if>
                                
              </foreach>
           
            </select>
          </td>
        </tr>
        <tr>
          <th>备注</th>
          <td><textarea name="downclasscontent"  class="inputtext" style=" width:450px;height:100px;" placeholder="该分类的其他信息："><{$data.downclasscontent}></textarea></td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">确定</button>
        <input type="hidden" name="id" value="<{$data.id}>" />
      </div>
    </div>
     
  </form>
</div>

</body>
</html>