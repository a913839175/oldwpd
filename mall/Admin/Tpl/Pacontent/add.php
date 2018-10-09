<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加内容</title>

<script language="javascript">
	var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>


<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />
<load href="__PUBLIC__/Js/My97DatePicker/WdatePicker.js"/>

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />

<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
	$(function(){
		$(".yulan").on('click',function(e){
			
			var content1 = UE.getEditor('sjpacon').getContent();
			
			e.preventDefault();
			Wind.use("artDialog",function(){
				art.dialog({
					id: "question",
					title:"预览",
					width:"290px",
					height:"370px",
					fixed:true,
					lock:true,
					background: "#CCCCCC",
					opacity: 0,
					content:content1,
					follow:document.getElementById("yu"),
				})							  
			
			})
		})
		$(".J_ajax_submit_btn").click(function(){
			var paname = $("#paname");
			var editor= $("#editor");
			var ue = UE.getEditor('editor');
			if(paname.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "内容名称不能为空",
						cancelVal: '确定',
						cancel: function(){
							paname.focus();
						}
					});
				});
					return false;
			}else if($("#valu").html()==0){
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
			
			else if(ue.hasContents()==false){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "内容详情不能为空",
						cancelVal: '确定',
						cancel: function(){
							editor.focus();
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

<script type="text/javascript">
   $(function(){
	//pc编辑器
	 var ue = UE.getEditor('editor');

	//手机编辑器
	var ue1 = UE.getEditor('sjpacon', {
      toolbars: [
          ['fullscreen', 'source','fontfamily','fontsize', 'underline' ,'bold', 'italic','simpleupload','insertvideo','map']
      ],
      autoHeightEnabled: false,

    });


	 $("#btn1").click(function(){
			if(ue.hasContents()){
				ue1.setContent(ue.getContent());
				
			}
	})
	 $(".issj2").click(function(){
		$("#fcksj").hide();
		$(".yulan").hide();
	})
	 $(".issj1").click(function(){
		$("#fcksj").show();
		$(".yulan").show();
	})
	 
	})
</script>



<script language="javascript">
	$(function(){
		$(".opti1").click(function(){
			if($("#tr2").length<=0){
					$("#tr1").after("<tr id=\"tr2\"><th>页面标题</th><td><input type=\"text\" name=\"yetitle\" size=\"30\" placeholder=\"页面标题\" class=\"input\" /></td></tr><tr id=\"tr3\"><th>页面关键字</th><td><textarea style=\"width:408px; height:100px;\" name=\"keywords\" placeholder=\"页面关键字\"></textarea></td></tr><tr id=\"tr4\"><th>页面描述</th><td><textarea style=\"width:408px; height:100px;\" name=\"descri\" placeholder=\"页面描述\"></textarea></td></tr>");
			}
			
		})
		$(".opti2").click(function(){
			
			$("#tr2").remove();
			$("#tr3").remove();
			$("#tr4").remove();
		})
		
	})
	
	
</script>

<script language="javascript">
	//日期控件显示
	function isdate(){
		WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd HH:mm:ss'});
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
	
			var cid = $("#cid").val();
			//ajax验证
			$.get('<{:U("Pacontent/ajax")}>',{cid:cid,rand:Math.random()},function(data){
				$("#valu").html(data);  //判断是否为终极分类
			});
			//ajax显示获取自定义字段
			$.get('<{:U("Content/add_custom_ajax")}>',{module_id:5,cid:cid,rand:Math.random()},function(data){

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



</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Pacontent/palist")}>'>内容管理</a></li>
        <li><a href='<{:U("Pacontent/add")}>'>内容添加</a></li>
      </ul>
	</div>
  <div class="h_a">内容相关</div>
  <form name="myform" action="<{:U("Pacontent/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">内容名称</th>
          <td><input type="text" name="paname" value="" class="input" id="paname" size="70" placeholder="内容名称"><font color="red">*</font></td>
        </tr>
        <tr>
          <th width="100">内容分类</th>
          <td>
          <select name="cid" id="cid">
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
          <font color="red">*</font></td>
        </tr>
        <tr>
          <th width="100">语言</th>
          <td>
              <select name="lang">
              	<foreach name="lang_data" item="vo">
				      <option value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
				</foreach>
              </select>
          
          <font color="red">*</font></td>
        </tr>
        
        <tr>
          <th width="100">是否显示</th>
          <td>
              <select name="isshow">
              	<option value="1">是</option>
                <option value="0">否</option>
              </select>
          
          <font color="red">*</font></td>
        </tr>
        
        <tr>
          <th>内容详细</th>
          <td>
          	<script type="text/plain" id="editor" name="pacon"  style="width:100%;height:400px;"></script>
          </td>
        </tr>
        <tr>
        	<th>排序</th>
        	<td><input type="text" name="orderby" id="orderby" class="input" size="30"  placeholder="输入排序：" value="<{$orderbydata}>" /></td>
        </tr>
         <tr class="custom_before">
        	<td colspan="2" class="h_a">自定义字段</td>
        </tr>
        
        <tr class="custom_after">
        	<td colspan="2" class="h_a">手机相关</td>
        </tr>
  		<tr  id="tr10">
          <th width="100">发布到手机版</th>
          <td><input type="radio" name="issj" value="1" class="issj1" checked="checked" />是
          	  <input type="radio" name="issj"  value="0" class="issj2" />否
          	  <a href="javascript:void(0)" class="yulan" id="yu">预览效果</a>
          </td>
              
        </tr>
        <tr id="fcksj">
        	<th></th>
            <td><script type="text/plain" id="sjpacon" name="sjpacon"  style="width:320px;height:400px;"></script>
                <input type="button" value="从web版获取" id="btn1" />
            </td>
        </tr>
        
        <tr>
        	<td colspan="2" class="h_a">优化相关</td>
        </tr>
        <tr id="tr1">
        	<th>优化设置</th>
            <td><input type="radio"  name="opti" value="1" class="opti1"/>是
            	<input type="radio" name="opti" value="0" class="opti2" checked="checked" />否
            </td>
        </tr>
      
        
      </tbody></table>
    </div>
  
    
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit1">确定</button>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit2">保存并继续添加</button>
        <span id="valu" style="display:none;"></span>
      </div>
    </div>
  </form>

</div>
</body>
</html>

