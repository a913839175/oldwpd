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


<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/lang/zh-cn/zh-cn.js"></script>



<script language="javascript">
	$(function(){
		$("input[name='isphoto']").click(function(){
			if(this.value==0){
				$("#suo2").remove();
			}else if(this.value==1){
				$("#suo1").after("<tr id=\"suo2\"><th>上传图片</th><td><input type=\"file\" name=\"classphoto\" id=\"prophoto\" /></td></tr>");
			}
		})
	})
</script>



<script language="javascript">
	$(function(){
		$(".J_ajax_submit_btn").click(function(){
			var proclassname = $("#proclassname");
			
			var isphoto = $(".issuo");
			
			
			if(proclassname.val()==""){
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
							proclassname.focus();
						}
					});
				});
					return false;
			}
			
			else if(isphoto.val()==1){
					var classphoto = $("input[name='classphoto']");
					if(classphoto.val()==""){
						Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "分类图片必须要选择",
						cancelVal: '确定',
						cancel: function(){
							classphoto.focus();
						}
					});
				});
						return false;
				}
					
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
        <li><a href='<{:U("Product/plist")}>'>产品中心</a></li>
        <li><a href='<{:U("Productclas/add")}>'>添加分类</a></li>
      </ul>
	</div>
  <div class="h_a">添加分类</div>
  <form name="myform" action="<{:U("Productclas/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">分类名称</th>
          <td><input type="text" name="proclassname" value="" class="input" id="proclassname" size="30" placeholder="分类名称">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        
        <tr>
          <th width="100">所属父类</th>
          <td>
          	<select name="pid">
             	<option value="0">/</option>
              

              

             <foreach name="alist" item="vo">
             	
              <if condition="$Think.get.mark eq $vo[id]">
                  <option selected value="<{$vo.id}>">
                    <?php
                    for($i=0;$i<$vo['count'];$i++){
            echo "&nbsp;&nbsp;&nbsp;";
          }
          ?>
                    
                    <{$vo.proclassname}>
                    
                    </option>
              <else />
                <option value="<{$vo.id}>">
                    <?php
                    for($i=0;$i<$vo['count'];$i++){
            echo "&nbsp;&nbsp;&nbsp;";
          }
          ?>
                    
                    <{$vo.proclassname}>
                    
                    </option>

              </if>
                	
               
            	
             </foreach> 
            </select>
            
          </td>
        </tr>
		
         <tr id="suo1">
          <th>是否有缩略图</th>
          <td>
          	<input type="radio" name="isphoto" value="1" class="issuo"/>是
            <input type="radio" name="isphoto" value="0" class="issuo" checked="checked" />否
          </td>
        </tr>
            
         <tr>
          <th>是否显示</th>
          <td>
          	<select name="audit">
            
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
        	<th>排序</th>
            <td><input type="text" name="orderby" id="orderby" placeholder="输入排序：" class="input" size="30" value="<{$orderbydata}>" /></td>
        </tr>
        <tr>
          <th>英文名称</th>
            <td><input type="text" name="englishname" id="englishname" placeholder="" class="input" size="30" value="" /></td>
        </tr>
        <tr>
          <th>备注</th>
          <td>

            
            <script type="text/plain" id="proclasscontent" name="proclasscontent"  style="width:100%;height:400px;"></script>
          </td>
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

<script language="javascript">
  var ue = UE.getEditor('proclasscontent');
</script>
