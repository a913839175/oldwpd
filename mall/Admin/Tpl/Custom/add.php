<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>字段添加</title>


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
			var name = $("#name");
			var relname = $("#relname");
			var orderby = $("#orderby")
			var zheight = $("input[name='zheight']");
			var zwidth = $("input[name='zwidth']");
			
			if($("#valu").html()==0){
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
			else if(name.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "字段名称不能为空",
						cancelVal: '确定',
						cancel: function(){
							name.focus();
						}
					});
				});
					return false;
			}else if(relname.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "字段别名不能为空",
						cancelVal: '确定',
						cancel: function(){
							relname.focus();
						}
					});
				});
					return false;
			}else if(checkNum(zheight.val())==false){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "高度不能为空且必须是整数",
						cancelVal: '确定',
						cancel: function(){
							zheight.focus();
						}
					});
				});
					return false;
			}else if(checkNum(zwidth.val())==false){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "宽度不能为空且必须是整数",
						cancelVal: '确定',
						cancel: function(){
							zwidth.focus();
						}
					});
				});
					return false;
			}else if(checkNum(orderby.val())==false){
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
			}
			else{
				
				return true;
			}
			
			
		})
	})
</script>
<script language="javascript">
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
<script language="javascript">
	$(function(){
		ajx();
		$("#cid").change(function(){
			
			ajx();
		})
	})
	
	function ajx(){
	
			var cid = $("#cid").val();
			var modules_id = "<{$Think.get.id}>";
			if(cid==0 ||$("#cid").length<=0){
				$("#valu").html("1");
			}else{
				//ajax验证
				$.get('<{:U("Custom/ajax")}>',{modules_id:modules_id,cid:cid,rand:Math.random()},function(data){
					$("#valu").html(data);  //判断是否为终极分类
				});
			}
			
	}
</script>

</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Custom/index")}>'>自定义字段</a></li>
        <li><a href='<{:U("Custom/add")}>'>添加字段</a></li>
      </ul>
	</div>
  
  <div class="h_a">添加字段</div>
  <form name="myform" action="<{:U("Custom/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
        	<th width="164"><strong>所属模块</strong></th>
            <td width="1282">
            <eq name="Think.get.id" value="1">新闻管理</eq>
			<eq name="Think.get.id" value="2">产品管理</eq>
            <eq name="Think.get.id" value="3">留言管理</eq>
            <eq name="Think.get.id" value="4">招聘管理</eq>
            <eq name="Think.get.id" value="5">内容管理</eq>
            <eq name="Think.get.id" value="6">订单管理</eq>
            <eq name="Think.get.id" value="7">下载管理</eq>
            <eq name="Think.get.id" value="8">图册管理</eq>
            </td>
        </tr>
        <eq name="Think.get.id" value="1">
        	<tr>
	          <th width="100"><strong>所属分类</strong>&nbsp;<br /><font color="#999">若选择为空，则表示对整个模块有效</font></th>
	          <td>
	         
	          	<select name="cid" id="cid">
	             <option value="0"></option>
	             <foreach name="dataclass" item="vo">
	             	<if condition="$Think.get.ccid eq $vo[id]">
	                	 <option value="<{$vo.id}>" selected>
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.conclassname}></option>
	                <else />
	                	<option value="<{$vo.id}>">
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.conclassname}></option>
	                </if>
	             </foreach> 
	            </select>
	          </td>
	        </tr>
        </eq>
        <eq name="Think.get.id" value="2">
        	<tr>
	          <th width="100"><strong>所属分类</strong>&nbsp;<br /><font color="#999">若选择为空，则表示对整个模块有效</font></th>
	          <td>
	         
	          	<select name="cid" id="cid">
	             <option value="0"></option>
	             <foreach name="dataclass" item="vo">
	             	<if condition="$Think.get.ccid eq $vo[id]">
	                	 <option value="<{$vo.id}>" selected>
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.proclassname}></option>
	                <else />
	                	<option value="<{$vo.id}>">
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.proclassname}></option>
	                </if>
	             </foreach> 
	            </select>
	          </td>
	        </tr>
        </eq>
        <eq name="Think.get.id" value="5">
        	<tr>
	          <th width="100"><strong>所属分类</strong>&nbsp;<br /><font color="#999">若选择为空，则表示对整个模块有效</font></th>
	          <td>
	         
	          	<select name="cid" id="cid">
	             <option value="0"></option>
	             <foreach name="dataclass" item="vo">
	             	<if condition="$Think.get.ccid eq $vo[id]">
	                	 <option value="<{$vo.id}>" selected>
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.conclname}></option>
	                <else />
	                	<option value="<{$vo.id}>">
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.conclname}></option>
	                </if>
	             </foreach> 
	            </select>
	          </td>
	        </tr>
        </eq>
        <eq name="Think.get.id" value="7">
        	<tr>
	          <th width="100"><strong>所属分类</strong>&nbsp;<br /><font color="#999">若选择为空，则表示对整个模块有效</font></th>
	          <td>
	         
	          	<select name="cid" id="cid">
	             <option value="0"></option>
	             <foreach name="dataclass" item="vo">
	             	<if condition="$Think.get.ccid eq $vo[id]">
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
	          </td>
	        </tr>
        </eq>
        <eq name="Think.get.id" value="8">
        	<tr>
	          <th width="100"><strong>所属分类</strong>&nbsp;<br /><font color="#999">若选择为空，则表示对整个模块有效</font></th>
	          <td>
	         
	          	<select name="cid" id="cid">
	             <option value="0"></option>
	             <foreach name="dataclass" item="vo">
	             	<if condition="$Think.get.ccid eq $vo[id]">
	                	 <option value="<{$vo.id}>" selected>
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.atlclassname}></option>
	                <else />
	                	<option value="<{$vo.id}>">
	                    <?php
	                    	for($i=0;$i<$vo['count'];$i++){
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?>
	                    <{$vo.atlclassname}></option>
	                </if>
	             </foreach> 
	            </select>
	          </td>
	        </tr>
        </eq>
        <tr>
          <th width="164"><strong>字段名称</strong>&nbsp;<font color="#FF0000">*</font><br /><font color="#999">只能用英文字母或数字，数据表的真实字段名</font></th>
          <td><input type="text" name="name" value="" class="input" id="name" size="30" placeholder="字段名称" onKeyUp="value=value.replace(/[\W]/g,'')">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff0000">注：为防止字段名与原表中字段重复，请加前缀，如：××_××××。</font></td>
        </tr>
        
         <tr>
          <th width="164"><strong>字段别名</strong>&nbsp;<font color="red">*</font><br /><font color="#999">发布内容时显示的提示文字</font></th>
          <td><input type="text" name="relname" value="" class="input" id="relname" size="30" placeholder="字段别名"></td>
        </tr>
        
        <tr>
        	<th width="164"><strong>字段类型</strong>&nbsp;<font color="red">*</font></th>
            <td>
            	<select name="type">
                	<option value="0">Input文本框</option>
                    <option value="1">Option下拉框</option>
                    <option value="2">radio单选按钮</option>
                  <!--  <option value="3">checkbox复选框</option>-->
                    <option value="4">多行文本框</option>
                    <option value="5">日期和时间</option>
                    <option value="6">编辑器</option>
                    
                </select>
            </td>
            
        </tr>
        
         <tr>
        	<th width="164"><strong>高度、宽度</strong>&nbsp;<font color="red">*</font><br /><font color="#999">只对input、textarea、编辑器有效<br />(若宽高设置为0，则表示使用默认宽高)</font></th>
            <td valign="middle">
            	高度：
            	  <input type="text" name="zheight" class="input" size="3" value="0" />（px）
                	&nbsp;&nbsp;
                宽度：<input type="text" name="zwidth" class="input" size="3" value="0" />（px）
                
            </td>
            
            
        </tr>
        
        <tr>
          <th><strong>默认值</strong><br /><font color="#999">如果定义数据类型为select、radio时，此处填写需用英文逗号隔开（如：男,女）</font></th>
          <td valign="middle"><textarea name="values"  class="inputtext" style=" width:450px;height:100px;" placeholder="字段的初始化值，若是多个，请用英文逗号隔开："></textarea></td>
        </tr>
        
         <tr>
          <th width="164">排序&nbsp;<font color="#FF0000">*</font></th>
          <td><input type="text" name="orderby" value="<{$orderbydata}>" class="input" id="orderby" size="30" placeholder="字段排序" >&nbsp;</td>
        </tr>
        
        <tr>
          <th width="164">是否显示</th>
          <td>
          	<select name="isshow">
            	<option value="1">是</option>
                <option value="0">否</option>
            </select>
          </td>
        </tr>
        
        
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" name="submit1">确定</button>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit2">保存并继续添加</button>
        <input type="hidden" name="modules" value="<{$Think.get.id}>" />
        <if condition="($Think.get.id eq 1) or ($Think.get.id eq 2) or ($Think.get.id eq 5) or ($Think.get.id eq 7) or ($Think.get.id eq 8)">
        	<span id="valu" style="display:none"></span>
        </if>
      </div>
    </div>
  </form>
</div>
</body>
</html>
