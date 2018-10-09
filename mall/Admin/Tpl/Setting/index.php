<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>参数设置</title>



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
			var is_watermark = $('input[name="is_watermark"]:checked');
			var watertype = $('input[name="watertype"]:checked');
			//alert(watertype.val());
			var pic = $("input[name='pic']");
			var maxwidth = $(".maxwidth");
			var maxheight = $(".maxheight");
			var static_connector = $("input[name='static_connector']");
			
			if(is_watermark.val()==1 && pic.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "水印图片不能为空",
						cancelVal: '确定',
						cancel: function(){
							$(".addImg").focus();
						}
					});
				});
					return false;
			}else if(checkNum(maxwidth.val())==false){
				Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "水印图片宽度不能为空且必须是正整数",
						cancelVal: '确定',
						cancel: function(){
							maxwidth.focus();
						}
					});
				});
					return false;
			
			}else if(checkNum(maxheight.val())==false){
				Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "水印图片高度不能为空且必须是正整数",
						cancelVal: '确定',
						cancel: function(){
							maxheight.focus();
						}
					});
				});
					return false;
				
			}else if(static_connector.val()=="" || static_connector.val().indexOf("&")>=0 || static_connector.val().indexOf(":")>=0){
				Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "伪静态连接符不能为空且不能包含\" &、: \"两个符号",
						cancelVal: '确定',
						cancel: function(){
							static_connector.focus();
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
	var maxwidth = $(".maxwidth").val();
	var maxheight = $(".maxheight").val();
	//alert(maxheight);
	
	$.ajaxFileUpload ({
	 url:'__APP__/Setting/Imgajax',
	 type:'post',
	 secureuri:false,
	 fileElementId:'pic',
	 dataType: 'json',
	 data:{maxwidth:maxwidth,maxheight:maxheight},
	 success: function (data){
		//alert(data.extension);
		$("#loading3").html("<font color=\"green\">上传成功</font>");
		$("#loading4").attr("src","__PUBLIC__/Uploads/Setting/s_"+data.savename)//图片
		$("#loading31").html("<a href=\"javascript:void(0)\" onclick=\"delbtn2()\" class=\"delbtn2\">删除</a>");
		
		$("input[name='pic']").val("s_"+data.savename);//隐藏域赋值
		
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

<script language="javascript">
	//水印、伪静态显隐藏
	$(function(){
	
		var is_watermark = $("input[name='is_watermark']");
		var watertype = $("#watertype");
		var waterpic = $("#waterpic");
		var waterword = $("#waterword");
		
		
		is_watermark.click(function(){
			if(this.value==0){
				watertype.hide();
				waterpic.hide();
				waterword.hide();
				$("#lenwid").hide();
				$("#waterposi").hide();
			}else{
				
				
				watertype.show();
				$(".gaox").attr("checked","checked");
				waterpic.show();
				$("#lenwid").show();
				$("#waterposi").show();
				
			}
		})
		$("input[name='watertype']").click(function(){
			if(this.value==0){
				waterword.hide();
				waterpic.show();
			}else{
				waterword.show();
				waterpic.hide();
			}
		})
		$("input[name='isstatic']").click(function(){
			if(this.value==0){
				$("#connector").hide();
			}else{
				$("#connector").show();
			}
		})
		
		//连接符keyup事件
		$("input[name='static_connector']").keyup(function(){
			if(this.vaule!=""){
				$(".spn1").html("http://www.cn-passion.com/News"+this.value+"newsinfo"+this.value+"id"+this.value+"5.html");
			}
			
		})
	
	})
	
$(function(){
		
	var iswater = "<{$data.is_watermark}>";
	var istype = "<{$data.watertype}>";
	var static = "<{$data.isstatic}>";
	var connec = "<{$data.static_connector}>";
	
	if(iswater==0){
		$("#watertype").hide();
		$("#waterpic").hide();
		$("#waterword").hide();
		$("#lenwid").hide();
		$("#waterposi").hide();
	}
	
	if(istype==0){ 
		$("#waterword").hide();
		
	}else{
		$("#waterpic").hide();
	}
	
	if(static==0){
		$("#connector").hide();
	}
	
	//初始页面url例如显示
	if(static==1 && connec!=""){
		$(".spn1").html("http://www.cn-passion.com/News"+connec+"newsinfo"+connec+"id"+connec+"5.html");
	}
	
})	
</script>

<script language="javascript">
	/********函数*********/
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
</script>

</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Setting/index")}>'>系统管理	</a></li>
        <li><a href='<{:U("Setting/index")}>'>参数设置</a></li>
      </ul>
	</div>
  <div class="h_a">水印设置</div>
  <form name="myform" action="<{:U("Setting/index")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr id="is_show">
          <th width="12%">是否开启图片水印功能</font></th>
          <td width="88%">
          	<input type="radio" name="is_watermark" value="1" 
          		<if condition="$data.is_watermark eq 1">checked</if> 
             />开启
            <input type="radio" name="is_watermark" value="0"
            	<if condition="$data.is_watermark eq 0">checked</if> 
             />关闭
          </td>
        </tr>
       
       	 <tr id="lenwid">
         	<th>水印大小控制：</td>
            <td>
            	宽：<input type="text" name="maxwidth" class="maxwidth " value="<{$data.maxwidth}>" size="1" />px
                &nbsp;&nbsp;&nbsp;&nbsp;
                高：<input type="text" name="maxheight" class="maxheight " value="<{$data.maxheight}>" size="1" />px
                <span><font color="red">注：设置宽高后，需重新上传水印图片，才可生效</font></span>
            </td>
         </tr>
        
         <tr id="waterpic">
          <th>水印图片<font color="red">*</font></th>
          <td>
          	  <a href="javascript:void(0);" class="btn_addPic addImg"><span><em>+</em>上传图片</span><input type="file" name="waterpic" onchange="return ajaxImgUpload()"  class="filePrew" id="pic" /></a>&nbsp;
          
           <span id="loading3"></span>
          
          <img src="__PUBLIC__/Images/default.jpg" width="80" id="loading4" height="55" border="0" />
          <span id="loading31"></span>
          <span><font color="#FF0000">注：水印只可上传jpg、gif、png格式的图片</font></span>
          </td>
        </tr>
    
         <tr id="waterposi">
         	<th>水印位置</th>
            <td>
            	<table width="300" border="1">
                	<tr>
                    	<td><input type="radio" name="position" class="position" value="2"
                       	<if condition="$data.position eq 2">checked</if> 
                         />顶部居左</td>
                        <td><input type="radio" name="position" class="position" value="5"
                        <if condition="$data.position eq 5">checked</if>  
                         />顶部居中</td>
                        <td><input type="radio" name="position" class="position" value="3"
                        <if condition="$data.position eq 3">checked</if>  
                         />顶部居右</td>
                    </tr>
                    <tr>
                    	<td><input type="radio" name="position" class="position" value="7"
                        <if condition="$data.position eq 7">checked</if>  
                         />中间居左</td>
                        <td><input type="radio" name="position" class="position" value="1"
                         <if condition="$data.position eq 1">checked</if> 
                         />图片中心</td>
                        <td><input type="radio" name="position" class="position" value="8" 
                       	 <if condition="$data.position eq 8">checked</if>  
                        />中间居右</td>
                    </tr>
                    <tr>
                    	<td><input type="radio" name="position" class="position" value="4"
                        <if condition="$data.position eq 4">checked</if>  
                         />底部居左</td>
                        <td><input type="radio" name="position" class="position" value="6" 
                        <if condition="$data.position eq 6">checked</if>  
                        />底部居中</td>
                        <td><input type="radio" name="position" class="position" value="0"
                        <if condition="$data.position eq 0">checked</if>  
                         />底部居右</td>
                    </tr>
                </table>
            </td>
         </tr>
        
        <tr class="h_a">
        	<td colspan="2">静态设置</th>
        </tr>
        <tr>
        	<th>是否前台开启伪静态</th>
            <td>
            	<input type="radio"  value="1" name="isstatic" 
               	<if condition="$data.isstatic eq 1">checked</if> 
                />开启
                <input type="radio"  value="0" name="isstatic"
                <if condition="$data.isstatic eq 0">checked</if> 
                />关闭 <font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;注：若开启，则前台config配置文件中"URL_MODEL"参数值必须是2</font>
            </td>
        </tr>
        <!--
        <tr id="connector">
        	<th>伪静态连接符<font color="#FF0000">*</font></th>
            <td><input type="text" style="text-align:center" maxlength="10" class="input" size="10" name="static_connector" placeholder="输入标识符：" value="<{$data.static_connector}>"/>
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <font color="#008000">URL如：<span class="spn1"></span></font>
            </td>
        </tr>
    	-->
    	<tr>
    		<th>下载密码</th>
    		<td><input type="text" class="input"  value="<{$data.downpass}>" name="downpass" placeholder="输入下载密码" /></td>
    	</tr>
        
        <tr>
          <th>上次设置时间</th>
          <td>
          <neq name="data.updatetime" value="">
         	 <{$data.updatetime|date="Y-m-d H:i:s",###}>
          </neq>
          
          
          </td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit1">设置</button>
        <input type="hidden" name="pic" value="<{$data.waterpic}>" />
        <input type="hidden" name="id" value="<{$data.id}>" />
      </div>
    </div>
  </form>
</div>
</body>
</html>
<script language="javascript">
	$(function(){
		var pic = "<{$data.waterpic}>";
		
		if(pic!=""){
			$("#loading4").attr("src","__PUBLIC__/Uploads/Setting/"+pic);
		}
	
	})
</script>