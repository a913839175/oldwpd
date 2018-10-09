
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改招聘</title>

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
		$(".J_ajax_submit_btn").click(function(){
			
			var jobname = $("#jobname");
			var orderby = $("#orderby");
	
			if(jobname.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "招聘职位不能为空",
						cancelVal: '确定',
						cancel: function(){
							jobname.focus();
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
        <li><a href='<{:U("Job/index")}>'>招聘管理</a></li>
        <li><a href="javascript:void(0)">修改招聘</a></li>
      </ul>
	</div>
  <div class="h_a">招聘内容</div>
  <form name="myform" action="<{:U("Job/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">招聘职位</th>
          <td><input type="text" name="jobname" value="<{$data.jobname}>" class="input" id="jobname" size="40" placeholder="输入招聘职位">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        

        <tr>
          <th width="100">专业要求</th>
          <td>
          	<input type="text" name="jobspe" id="jobspe" class="input" size="40" value="<{$data.jobspe}>"  placeholder="输入专业要求："/>
          </td>
        </tr>
        
        <tr>
        	<th>年龄要求</th>
        	<td>
        		<input type="text" name="age" id="age" class="input" size="40" value="<{$data.age}>"  placeholder="输入年龄要求："/> 
        	</td>
        </tr>

        <tr>
          <th>性别要求</th>
          <td>
               <select name="sex">
               	<option value="2"
               <if condition="$data.sex eq 2">selected</if> 
                >不限</option>
                <option value="1"
               <if condition="$data.sex eq 1">selected</if>  
                >男</option>
                <option value="0"
               <if condition="$data.sex eq 0">selected</if>  
                >女</option>
               </select>
          </td>
        </tr>
		
        <tr>
        	<th>招聘人数</th>
            <td><input type="text" name="num" id="num" class="input" size="40" value="<{$data.num}>"  placeholder="输入招聘人数："/></td>
        </tr>
        
         <tr>
        	<th>学历要求</th>
            <td><input type="text" name="jobeduc" id="jobeduc" class="input" size="40"  placeholder="输入学历要求：" value="<{$data.jobeduc}>"/></td>
        </tr>
        <tr>
        	<th>工作经验</th>
            <td><input type="text" value="<{$data.workhours}>" name="workhours" id="workhours" class="input" size="40"  placeholder="输入工作经验："/></td>
        </tr>
        
        <tr>
        	<th>薪水要求</th>
            <td><input type="text" name="salary" value="<{$data.salary}>" id="salary" class="input" size="40"  placeholder="输入薪水要求："/></td>
        </tr>
        
        <tr>
        	<th>结束时间</th>
        	<td>
            	<input type="text" name="endtime" id="endtime" class="input" value="<{$data.endtime|date="Y-m-d H:i:s",###}>" size="40" placeholder="点击选择日期：" onclick="isdate()"/>
                <img src="__PUBLIC__/Images/date.png" style="margin:0px 0 -2px -23px" />
            
            </td>
        </tr>

        <tr>
        	<th>排序</th>
        	<td><input type="text" name="orderby" id="orderby" class="input" size="40" value="<{$data.orderby}>"  placeholder="输入排序：" value="<{$orderby}>" /></td>
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
            
            	<option value="0"
               <if condition="$data.isrecom eq 0">selected</if>   
                >否</option>
                <option value="1"
               <if condition="$data.isrecom eq 1">selected</if>   
                >是</option>
       
            </select>
          </td>
        </tr>
        
        <tr>
        	<th>其他要求</th>
            <td><script type="text/plain" id="other" name="other"  style="width:80%;height:200px;"><{$data.other}></script></td>
        </tr>
         <tr>
        	<td colspan="2" class="h_a">自定义字段</td>
        </tr>
        <volist name="zdydata" id="vo">
        	<{$vo}>
        </volist>
        
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit1">确定</button>
        <input type="hidden" name="id" value="<{$data.id}>"/>
        <span id="valu" style="display:none"></span>
      </div>
    </div>
  </form>
</div>
</body>
</html>
<script language="javascript">
	var ue = UE.getEditor('other');
</script>