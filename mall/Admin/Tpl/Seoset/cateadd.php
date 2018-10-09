<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加栏目</title>

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
			
			var content1 = getEditorHTMLContents("sjeditor");
			
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
					
				})							  
			
			})
		})
		$(".J_ajax_submit_btn").click(function(){
			
			var title = $("#title");
			var conphoto = $("#conphoto");
			var conphotopath=conphoto.val();
			var orderby = $("#orderby");
	
			if(title.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "新闻标题不能为空",
						cancelVal: '确定',
						cancel: function(){
							title.focus();
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
        <li><a href="javascript:void(0)">栏目管理</a></li>
        <li><a href='<{:U("Seoset/catelist")}>'>栏目列表</a></li>
        <li><a href='javascript:void(0)'>栏目添加</a></li>
      </ul>
	</div>
  <div class="h_a">栏目内容</div>
  <form name="myform" action="<{:U('Seoset/cateadd')}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
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
                    
                    <{$vo.catename}>
                    
                    </option>
               
            	
             </foreach> 
            </select>
            
          </td>
        </tr>
        <tr>
          <th width="100">栏目名称</th>
          <td><input type="text" name="catename" value="" class="input input_hd J_title_color" id="catename" size="70" placeholder="输入栏目名称">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
         
        <tr>
          <th width="100">对应URL</th>
          <td><input type="text" name="url"  class="input" id="url" size="70" placeholder="输入URL地址">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
         <tr>
          <th width="100">模块名</th>
          <td><input type="text" name="module_name"  class="input" id="url" size="70" placeholder="输入模块名">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        <tr>
          <th width="100">对应规则</th>
          <td><input type="text" name="rules"  class="input" id="url" size="70" placeholder="输入规则" value="{:module}_{:action}">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        <tr>
        	<th width="100">是否显示</th>
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
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit1">确定</button>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit2">保存并继续添加</button>
        <span id="valu" style="display:none"></span>
         <input type="hidden" name="otherpro" id="otherpro" value="" />
        <input type="hidden" name="othernews" id="othernews" value="" />
        <input type="hidden" name="otherdown" id="otherdown" value="" />
      </div>
    </div>
  </form>
</div>
</body>
</html>
