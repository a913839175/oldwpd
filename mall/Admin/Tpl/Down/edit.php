<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改下载文件</title>

<script language="javascript">
	var GV = {
  
    JS_ROOT: "__PUBLIC__/Js/",
  
};
</script>


<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />
<load href="__PUBLIC__/Css/uploadfile.css" />

<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/wind.js" />


<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/lang/zh-cn/zh-cn.js"></script>

<load href="__PUBLIC__/Js/My97DatePicker/WdatePicker.js"/>


<script type="text/javascript">
	$(function(){
		   
	})


	$(function(){
		//判断
		$(".J_ajax_submit_btn").click(function(){

			var filename = $("#filename");
			var filecontent= $("input[name='filecontent']");
			var ispic = $("input[name='ispic']:checked").val(); 
			
			var pic = $("input[name='pic']");
			var orderby = $("#orderby");
			
			if(filecontent.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "文件内容不能为空",
						cancelVal: '确定',
						cancel: function(){
							$(".addFile").focus();
						}
					});
				});
					return false;
			}
			
			else if(filename.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "文件名称必须要选择",
						cancelVal: '确定',
						cancel: function(){
							filename.focus();
						}
					});
				});
				return false;
			}
			
			else if(ispic==1 && pic.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "缩略图必须要选择",
						cancelVal: '确定',
						cancel: function(){
							$(".addImg").focus();
						}
					});
				});
				return false;
			}
			
			else if($("#valu").html()==0){
				Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "该分类不是终极分类，不可添加！",
						cancelVal: '确定',
						cancel: function(){
							$("#cid").focus();
						}
					});
				});
				return false;
			}
			
			else if(checkNum($("#orderby").val())==false){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "排序不能为空且必须是整数",
						cancelVal: '确定',
						cancel: function(){
							orderby.focus();
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



<script language="javascript">
	//设置值
	function SetEditorContents(EditorName, ContentStr)
	{
    var oEditor = FCKeditorAPI.GetInstance(EditorName) ;
    oEditor.SetHTML(ContentStr) ;
	}
	//获取编辑器中文字内容
	function getEditorTextContents(EditorName)
	{
		var oEditor = FCKeditorAPI.GetInstance(EditorName);
		return(oEditor.EditorDocument.body.innerText);
	}
	//获取编辑器中HTML内容
	function getEditorHTMLContents(EditorName)
	{
		var oEditor = FCKeditorAPI.GetInstance(EditorName);
		return(oEditor.GetXHTML(true));
	}
	
	//判断是否为整数
	function checkNum(ss)
	{
	   var type = "^\\d+$"; 
	   var re   = new RegExp(type); 
	   if(ss.match(re)==null){ 
		 return false;
	   }else{
		 return true;
	   }
	}
	
	//删除上传文件
	function delbtn1(){
		$("#loading").html("");
		$("#loading2").html("");
		$("input[name='filecontent']").val("");
		$("input[name='filecontent']").attr("readonly",false);
		$(".delbtn1").remove();
		$("#filesize").val("");
	}
	
	//删除上传图片
	function delbtn2(){
		$("#loading3").html("");
		$("#loading4").attr("src","__PUBLIC__/Images/default.jpg")//图片
		$("input[name='pic']").val("");
		$(".delbtn2").remove();
	}
	
</script>


<script language="javascript">
	$(function(){
		ajx();
		$("#cid").change(function(){
			ajx();
		})
	})
	
	function ajx(){
	
			var cid = $("#cid").val();//获取分类id
			var id = $("input[name='id']").val();//获取新闻id
			//ajax验证
			$.get('<{:U("Down/ajax")}>',{cid:cid,rand:Math.random()},function(data){
				$("#valu").html(data);  //判断是否为终极分类
			});
			//ajax显示获取自定义字段
			$.get('<{:U("Content/edit_custom_ajax")}>',{module_id:7,id:id,cid:cid,rand:Math.random()},function(data){

				if(data!=0){
 
					var json = JSON.parse(data);
					var json_str="";
					for(var o in json){  //遍历json对象，此操作是为了去除json对象中的逗号
						json_str +=json[o];
					}

				
					var $bf =  $(".custom_before").eq(0);
					var $alltr = $bf.nextAll('tr');
					var $k = 0;

					$alltr.each(function(e){
						if ($(this).hasClass('custom_after')) {
							$k =e ;
						}
					})

					$alltr.each(function(e){						
						if ( e<$k ) {
							$(this).remove();
						}

					})
				
					$bf.after(''+json_str+'');  //此处必须要加引号 注：花费了3个小时- 原来是少个引号
				}
				
			});
	}
</script>


<script type="text/javascript" src="__PUBLIC__/Js/ajaxfileupload.js"></script>

<script type="text/javascript">
//上传文件
function ajaxFileUpload(){
	loading();//动态加载小图标
	$.ajaxFileUpload ({
	 url:'__APP__/Down/fileajax',
	 secureuri:false,
	 fileElementId:'filecontent',
	 dataType: 'json',
	 success: function (data){
	
	 	//alert(data.extension);
		$("#loading2").html(data.name);
		$("#loading21").html("<a href=\"javascript:void(0)\" onclick=\"delbtn1()\" class=\"delbtn1\">删除</a>");
		
		var name = new Array();
		name = data.name.split(".");
		$("#filename").val(name[0]);  //文件名赋值
		$("#filetype").html(data.extension); //文件类型赋值
		//$("input[name='filecontent']").val(data.savename);//隐藏域赋值
		$("input[name='filecontent']").val(data.savename);//文本框赋值
		$("input[name='filecontent']").attr("readonly",true); //设置不可编辑
		$("#filesize").val(data.size); //给隐藏域赋值 （文件大小，单位Bit）
		
	 }
	 
	 }) 
	 return false;
}

//上传图片
function ajaxImgUpload(){

	$.ajaxFileUpload ({
	 url:'__APP__/Down/Imgajax',
	 secureuri:false,
	 fileElementId:'pic',
	 dataType: 'json',
	 success: function (data){
	
	 	//alert(data.extension);
		$("#loading3").html("<font color=\"green\">上传成功</font>");
		$("#loading4").attr("src","__PUBLIC__/Uploads/Down/Img/"+data.savename)//图片
		$("#loading31").html("<a href=\"javascript:void(0)\" onclick=\"delbtn2()\" class=\"delbtn2\">删除</a>");
		
		$("input[name='pic']").val(data.savename);//隐藏域赋值
		
		//var name = new Array();
		//name = data.name.split(".");
	 }
	 
	 }) 
	 return false;
}




function loading(){
	  $("#loading").ajaxStart(function(){
	 	$(this).html("<font color=\"red\">上传中...</font>");
	  }).ajaxComplete(
	   function(){
	   $(this).html("<font color=\"green\">上传成功</font>");
	 });
}





</script>
<script language="javascript">
	//日期控件显示
	function isdate(){
		WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd HH:mm:ss'});
	}
</script>

</head>



<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Down/plist")}>'>下载管理</a></li>
        <li><a href="javascript:void(0)">修改下载文件</a></li>
      </ul>
	</div>
  <div class="h_a">文件相关</div>
  <form name="myform" action="<{:U("Down/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>    
        <tr valign="middle" style=" line-height:42px;">
          <th width="100">文件内容<font color="#FF0000">*</font></th>
          <td>
          	<input type="input" class="input" name="filecontent" value="<{$data.filecontent}>" style="float:left; margin:13px 12px 0 0;">
          	<a style="float:left;" href="javascript:void(0);" class="btn_addPic addFile" title="文件大小不能超过20M"><span><em>+</em>上传文件</span><input type="file" name="filecontent1" onchange="return ajaxFileUpload()"  class="filePrew" id="filecontent" /></a>&nbsp;
          <span id="loading"></span>
          
          <span id="loading2"></span>&nbsp;&nbsp;&nbsp;&nbsp;
          <span id="loading21"></span>&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
        </tr>
        <tr>
          <th width="100">文件名称<font color="#FF0000">*</font></th>
          <td><input type="text" name="filename" value="<{$data.filename}>" class="input input_hd J_title_color" id="filename" size="70">&nbsp;</td>
        </tr>
        <tr>
          <th width="100">文件类型</th>
          <td><span id="filetype"><{$data.type}></span></td>
        </tr>
        
        <if condition="$data.ispic eq 1">
         <tr id="ta2">
        	<th>是否有缩略图</th>
            <td>
            	<input type="radio" name="ispic" value="1" class="issuo"  checked="checked"/>是
                <input type="radio" name="ispic" value="0" class="issuo"  />否
            </td>
         </tr>
        <else />
        	 <tr id="ta2">
        	<th>是否有缩略图</th>
            <td>
            	<input type="radio" name="ispic" value="1" class="issuo"  />是
                <input type="radio" name="ispic" value="0" class="issuo" checked="checked"  />否
            </td>
         </tr>
        </if>
        
        
        <tr id="ta1">
          <th>上传图片<font color="#FF0000">*</font></th>
          <td>
          <a href="javascript:void(0);" class="btn_addPic addImg"><span><em>+</em>上传缩略图</span><input type="file" name="pic1" onchange="return ajaxImgUpload()"  class="filePrew" id="pic" /></a>&nbsp;
          
           <span id="loading3"></span>
          
          <if condition="$data.pic neq ''">
          <img src="__PUBLIC__/Uploads/Down/Img/<{$data.pic}>" width="80" id="loading4" height="55" border="0" />
          <else />
          <img src="__PUBLIC__/Images/default.jpg" width="80" id="loading4" height="55" border="0" />
          </if>
          
          
          
          <span id="loading31"></span>
          
          </td>
        </tr>
        
        <tr>
          <th width="100">所属分类<font color="red">*</font></th>
          <td>
          	<select name="cid" id="cid">
             		
             <foreach name="dataclass" item="vo">
             		
                    <if condition="$data.cid eq $vo[id]">
                    		<option value="<{$vo.id}>" selected>
							<?php
                                for($i=0;$i<$vo['count'];$i++){
                                    echo "&nbsp;&nbsp;&nbsp;";
                                }
                            ?>
                          <{$vo.downclassname}></option>
                    <else />
                            <option value="<{$vo.id}>">
                            <?php
                                for($i=0;$i<$vo['count'];$i++){
                                    echo "&nbsp;&nbsp;&nbsp;";
                                }
                            ?>
                          <{$vo.downclassname}></option>
                    </if>
                
                	
                
            	
             </foreach> 
            </select>
            
            <span id="spa"></span>
          </td>
        </tr>
        <tr>
          <th>文件简介</th>
          <td><textarea name="filedescription"  class="inputtext" style=" width:450px;height:100px;" placeholder="输入文件介绍："><{$data.filedescription}></textarea></td>
        </tr>
        <tr>
        	<th>文件关键字</th>
            <td><input type="text" class="input" name="keywords" size="40" placeholder="输入文件关键字：" value="<{$data.keywords}>"/></td>
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
          <th>是否推荐</th>
          <td>
          	<select name="isrecom">
            
            	<option value="1"
               <if condition="$data.isrecom eq 1">selected</if>  
                >是</option>
                <option value="0"
               <if condition="$data.isrecom eq 0">selected</if>   
                >否</option>
       
            </select>
          </td>
        </tr>
        
        <tr>
        	<th>排序<font color="#FF0000">*</font></th>
            <td><input type="text" name="orderby" id="orderby" placeholder="输入排序：" class="input" size="30" value="<{$data.orderby}>" /></td>
        </tr>
        
        <tr>
        	<th>创建时间</th>
            <td><input type="text" name="createtime" id="createtime" class="input" size="30" value="<{$data.createtime|date="Y-m-d H:i:s",###}>" placeholder="点击选择日期：" onclick="isdate()"/>
            <img src="__PUBLIC__/Images/date.png" style="margin:0px 0 -2px -23px" />
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
         <!--自定义字段-->
        <tr class="custom_before">
        	<td colspan="2" class="h_a">自定义字段</td>
        </tr>
        
         <tr class="custom_after">
        	
        </tr>
        
      </tbody></table>
   </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit1">确定</button>
        
        <input type="hidden" name="pic" value="<{$data.pic}>" />
        <input type="hidden" name="id" value="<{$data.id}>"/>
        <input type="hidden" name="filesize" id="filesize" value="<{$data.filesize}>"/>
        <span id="valu" style="display:none"></span>
      </div>
    </div>
  </form>
</div>
</body>
</html>


<script language="javascript">
	var ipic = "<{$data.ispic}>";
	if(ipic==0){
		x = $("#ta1").detach();
	}
	
	$(function(){
		var ispic = $("input[name='ispic']:checked").val();
		$("input[name='ispic']").click(function(){
			if(this.value==0){
				x = $("#ta1").detach();
			}else{
				
					$("#ta2").after(x);	
				
			}
		})
	})
</script>