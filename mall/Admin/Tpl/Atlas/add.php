<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加图册</title>

<script language="javascript">
	var GV = {

    JS_ROOT: "__PUBLIC__/Js/",
  
};
</script>


<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />
<load href="__PUBLIC__/Css/uploadfile.css" />



<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />


<load href="__PUBLIC__/Js/jquery.uploadify.min.js" />

<load href="__PUBLIC__/Css/uploadify.css" />
<load href="__PUBLIC__/Js/My97DatePicker/WdatePicker.js"/>

<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/lang/zh-cn/zh-cn.js"></script>



<script type="text/javascript">

	$(function(){
		//判断
		$(".J_ajax_submit_btn").click(function(){

			var atlname = $("#atlname");
			var c_picname= $(".c_picname");
			
			
			
			var orderby = $("#orderby");
			
			if(atlname.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "图册名称不能为空",
						cancelVal: '确定',
						cancel: function(){
							atlname.focus();
						}
					});
				});
					return false;
			}
			
			else if($("#valu1").html()==0){
				Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "图册名称已存在",
						cancelVal: '确定',
						cancel: function(){
							$("#atlname").focus();
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
			else if(c_picname.length<1){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "上传图片必须要选择",
						cancelVal: '确定',
						cancel: function(){
							$("#tupian").focus();
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
		$(".delbtn1").remove();
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
//ajax判断是否为最终分类
	
	$(function(){
		ajx();
		$("#cid").change(function(){
			
			ajx();
			
		})
		$("#atlname").blur(function(){
			ajxname();
		})
	})
	
	function ajx(){
	
			var cid = $("#cid").val();
			//ajax验证
			$.get('<{:U("Atlas/ajax")}>',{cid:cid,rand:Math.random()},function(data){
				$("#valu").html(data);  //判断是否为终极分类
			});
			//ajax显示获取自定义字段
			$.get('<{:U("Content/add_custom_ajax")}>',{module_id:8,cid:cid,rand:Math.random()},function(data){
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
	
//判断名称是否唯一	
	function ajxname(){
		var atlname = $("#atlname").val();
		//ajax验证
		$.get('<{:U("Atlas/ajaxname")}>',{atlname:atlname,rand:Math.random()},function(data){
			$("#valu1").html(data);
		})
	}

</script>



<script type="text/javascript">
		var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
		var i=0;
		var k=0;//初始化数组下标
		var strname="";//字符串picname
		$(function() {
		$('#file_upload').uploadify({
		'auto'     : true,//关闭自动上传
		'removeTimeout' : 1,//文件队列上传完成1秒后删除
		'swf'      : '__PUBLIC__/Swf/uploadify.swf',
		'uploader' : '__URL__/imgupload',
		'method'   : 'post',          //方法，服务端可以用$_POST数组获取数据
		'buttonText' : '选择图片',//设置按钮文本
		'multi'    : true,//允许同时上传多张图片
		'formData': {'sessionid' : '<{:session_id()}>'}, //此处获取SESSIONID,
		'uploadLimit' : 30,//一次最多只允许上传30张图片
		'fileTypeDesc' : 'Image Files',//只允许上传图像
		'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
		'fileSizeLimit' : '2000KB',//限制上传的图片大小
		'onUploadSuccess' : function(file, data, response) { //每次成功上传后执行的回调函数，从服务端返回数据到前端
			
		
			$(".piclist").show();
			i++;
			var json = eval("("+data+")");
			
			img_id_upload[i-1]=json.name;
			
			$("input[name='pic']").after('<input type="hidden" name="picname[]" class="c_picname" id="i_picname_'+i+'" value="'+json.name+'" />');
			$("input[name='pic']").after('<input type="hidden" name="savename[]" class="c_savename" id="i_savename_'+i+'" value="'+json.savename+'" />');
			$("input[name='pic']").after('<input type="hidden" name="picdes[]" class="c_picdes" id="i_picdes_'+i+'" value="" />');
			$("input[name='pic']").after('<input type="hidden" name="pichref[]" class="c_pichref" id="i_pichref_'+i+'" value="http://" />');
			$("input[name='pic']").after('<input type="hidden" name="picorderby[]" class="c_picorder" id="i_picorderby_'+i+'" value="'+i+'" />');

			if(i%6==0){
				$('#image').after('<span class="quanbu" id="bufen_'+i+'"><br><span id="onoepic_'+i+'" class="ab" ><a href="javascript:void(0)"><img height="100px" width="120px" src="__PUBLIC__/Uploads/Atl/s_'+json.savename+'"  class="onepic" /></a></span><span id="caozuo_'+i+'" ><a href="javascript:void(0)" class="onedel" dataid="'+i+'" title="删除">删除</a>/<a href="javascript:void(0)" title="编辑" class="oneedit" dataid="'+i+'">编辑</a></span>&nbsp;&nbsp;&nbsp;&nbsp;</span>');
				
			}else{
				$('#image').after('<span class="quanbu" id="bufen_'+i+'"><span  id="onoepic_'+i+'" class="ab"><a href="javascript:void(0)"><img height="100px" width="120px" src="__PUBLIC__/Uploads/Atl/s_'+json.savename+'" class="onepic" /></a></span><span id="caozuo_'+i+'" class="caozuo"><a href="javascript:void(0)" class="onedel" dataid="'+i+'" title="删除">删除</a>/<a href="javascript:void(0)"  title="编辑" class="oneedit" dataid="'+i+'">编辑</a></span>&nbsp;&nbsp;&nbsp;&nbsp;</span>');
				
			}
			//alert(data);
			$("input[name='picname1']").val(json.name);//绑定名称
			$("input[name='picorderby1']").val(i);//绑定名称
		},
		'onQueueComplete' : function(queueData) {             //上传队列全部完成后执行的回调函数
		if(img_id_upload.length>0){
			
			//var b = JSON.stringify(img_id_upload);//普通素组转换为json素组
			//$("#picname").val(b);
			
			
		}
			
			
		}
		// Put your options here
		});
});


$(function(){
	//全部删除
	$("#alldel").click(function(){
		var quanbu = $(".quanbu");
		if(quanbu.length>0){
			quanbu.remove();
			$(".piclist").hide();
			$("input[class='c_picname']").remove(); //删除隐藏域值
			$("input[class='c_savename']").remove(); //删除隐藏域值
			$("input[class='c_picdes']").remove(); //删除隐藏域值
			$("input[class='c_pichref']").remove(); //删除隐藏域值
			$("input[class='c_picorder']").remove(); //删除隐藏域值
		}
		
	})
	//单个删除
	$(".onedel").live("click",function(){
		var quanbu = $(".quanbu");
		var id = $(this).attr("dataid");
		//$("#onoepic_"+id).remove();
		//$("#caozuo_"+id).remove();
		
			$("#bufen_"+id).remove();//移除
			$("#i_picname_"+id).remove(); //删除隐藏域值
			$("#i_savename_"+id).remove(); //删除隐藏域值
			$("#i_picdes_"+id).remove(); //删除隐藏域值
			$("#i_pichref_"+id).remove(); //删除隐藏域值
			$("#i_picorderby_"+id).remove(); //删除隐藏域值
		
		
		
		
	})
	//编辑
	$(".oneedit").live("click",function(){
		
		var id = $(this).attr("dataid");
		$("input[name='picname1']").val($("#i_picname_"+id).val()); //将隐藏域的值赋给图片名称
		$("#picdes1").val($("#i_picdes_"+id).val()); //将隐藏域的值赋给图片描述
		$("input[name='pichref1']").val($("#i_pichref_"+id).val()); //将隐藏域的值赋给图片链接
		$("input[name='picorderby1']").val($("#i_picorderby_"+id).val()); //将隐藏域的值赋给图片排序

		$("input[name='picname1']").attr("dataid",id);
		
	})
	
	//焦点离开图片名称
	$("input[name='picname1']").keyup(function(){
		var id = $(this).attr("dataid");
		$("#i_picname_"+id).val(this.value); //将图片的值赋给隐藏域
	})
	
	//焦点离开图片描述
	$("textarea[name='picdes1']").keyup(function(){
		var id = $("input[name='picname1']").attr("dataid");
		//$("#i_picname_"+id).val(this.value); //将图片的值赋给隐藏域
			$("#i_picdes_"+id).val(this.value); //将图片的值赋给隐藏域
			
	})
	
	//焦点离开图片链接
	$("input[name='pichref1']").keyup(function(){
		var id = $("input[name='picname1']").attr("dataid");
		//$("#i_picname_"+id).val(this.value); //将图片的值赋给隐藏域
			$("#i_pichref_"+id).val(this.value); //将图片的值赋给隐藏域
			
	})

	//焦点离开图片排序
	$("input[name='picorderby1']").keyup(function(){
		var id = $("input[name='picname1']").attr("dataid");
		$("#i_picorderby_"+id).val(this.value); //将图片的值赋给隐藏域
	})
	
	
})


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
        <li><a href='<{:U("Atlas/plist")}>'>图册管理</a></li>
        <li><a href='<{:U("Atlas/add")}>'>添加图册</a></li>
      </ul>
	</div>
  <div class="h_a">图册内容</div>
  <form name="myform" action="<{:U("Atlas/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody> 
        <tr>
          <th width="100">图册名称<font color="#FF0000">*</font></th>
          <td><input type="text" name="atlname" value="" class="input input_hd J_title_color" id="atlname" size="70">&nbsp;</td>
        </tr>
        <tr>
          <th width="100">所属分类<font color="red">*</font></th>
          <td>
          	<select name="cid" id="cid">
             		
             <foreach name="dataclass" item="vo">
             	
                	<option value="<{$vo.id}>">
                    <?php
                    	for($i=0;$i<$vo['count'];$i++){
							echo "&nbsp;&nbsp;&nbsp;";
						}
					?>
                  <{$vo.atlclassname}></option>
                
            	
             </foreach> 
            </select>
            
            <span id="spa"></span>
          </td>
        
        <tr>
          <th>图册简介</th>
          <td><textarea name="atldes"  class="inputtext" style=" width:450px;height:100px;" placeholder="输入图册介绍："></textarea></td>
        </tr>
        <tr>
        	<th>上传图片</th>
            <td>
            	
				<div style="float:left;" id="tupian"><input id="file_upload" name="file_upload" type="file" multiple="true"></div>
                
				<div style="float:left; margin:0 10px;"><a href="javascript:void(0)" id="alldel">全部清空</a></div>
                </td>
                
                
        </tr>
       
        <tr style="display:none;" class="piclist">
        	<th></th>
            <td>
            	<div id="image" style="display:none"></div>
            </td>
        </tr>
        <tr>
        	<th>图片名称<font color="red">*</font></th>
            <td><input type="text" class="input" size="60" name="picname1" placeholder="输入该图片名称：" dataid=""/></td>
            
        </tr>
        
        <tr>
        	<th>图片描述</th>
            <td><textarea style="width:400px; height:80px;" placeholder="输入该图片描述：" name="picdes1" id="picdes1"></textarea></td>
          
        </tr>
        
        <tr>
        	<th>图片链接</th>
            <td><input type="text" class="input" size="30" value="http://"  name="pichref1" /></td>
            
        </tr>
        <tr>
        	<th>图片排序</th>
            <td><input type="text" class="input" size="30" value="0"  name="picorderby1" /></td>
            
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
          <th>是否推荐</th>
          <td>
          	<select name="isrecom">
            
            	<option value="1">是</option>
                <option value="0" selected="selected">否</option>
       
            </select>
          </td>
        </tr>
        
        <tr>
        	<th>排序<font color="#FF0000">*</font></th>
            <td><input type="text" name="orderby" id="orderby" placeholder="输入排序：" class="input" size="30" value="<{$orderby}>" /></td>
        </tr>
        
        <tr>
        	<th>创建时间</th>
            <td><input type="text" name="createtime" id="createtime" class="input" size="30" value="<?=date("Y-m-d H:i:s",time())?>" placeholder="点击选择日期：" onclick="isdate()"/>
            <img src="__PUBLIC__/Images/date.png" style="margin:0px 0 -2px -23px" />
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
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit2">保存并继续添加</button>
        <input type="hidden" name="filecontent" />
        <input type="hidden" name="pic" />
        
        
        <span id="valu" style="display:none"></span>
        <span id="valu1" style="display:none"></span>
      </div>
    </div>
  </form>
</div>
</body>
</html>
