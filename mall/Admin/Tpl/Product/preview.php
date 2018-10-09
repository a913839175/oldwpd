<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>预览产品</title>

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

			var proname = $("#proname");
			var procontent= $("#procontent");
			var isphoto = $("input[name='isphoto']:checked").val(); 
			
			var prophoto = $("#prophoto");
			var prophotopath=prophoto.val();
			var orderby = $("#orderby");
			
		
			var ue = UE.getEditor('procontent');
			if(proname.val()==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "产品名称不能为空",
						cancelVal: '确定',
						cancel: function(){
							proname.focus();
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
						content: "该分类不是终极分类，不可添加产品！",
						cancelVal: '确定',
						cancel: function(){
							$("#cid").focus();
						}
					});
				});
				return false;
			}
			
			else if(prophotopath==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "产品图片必须要选择",
						cancelVal: '确定',
						cancel: function(){
							prophoto.focus();
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
						content: "产品排序不能为空且必须是整数",
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



<script type="text/javascript">
   $(function(){
			 //fck编辑器
	 var ue = UE.getEditor('procontent');
	 $("#btn1").click(function(){
			if(ue.hasContents()){
				SetEditorContents("sjeditor",ue.getPlainTxt());
				
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
//是否有缩略图显隐藏
	$(function(){
		var isphoto = $("input[name='isphoto']:checked").val();
		$("input[name='isphoto']").click(function(){
			if(this.value==0){
				x = $("#ta1").detach();
			}else{
				$("#ta2").after(x);
			}
		})
	})
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
			$.get('<{:U("Product/ajax")}>',{cid:cid,rand:Math.random()},function(data){
				$("#valu").html(data);  //判断是否为终极分类
			});
			//ajax显示获取自定义字段
			$.get('<{:U("Content/add_custom_ajax")}>',{module_id:2,cid:cid,rand:Math.random()},function(data){
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

<script language="javascript">
	//日期控件显示
	function isdate(){
		WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd HH:mm:ss'});
	}
</script>

<script language="javascript">	
	$(function(){
		//关联新闻
		$(".btnnews").click(function(){
			Wind.use('ajaxForm','artDialog','iframeTools', function () {
				art.dialog.open('<{:U("Product/other_news")}>', { height: '600px', width: '800px', title: "选择关联新闻", lock: true,fixed:true}, false);//打开子窗体
			})
		})   
		//关联产品
		$(".btnpro").click(function(){
			Wind.use('ajaxForm','artDialog','iframeTools', function () {
				art.dialog.open('<{:U("Product/other_pro")}>', { height: '600px', width: '800px', title: "选择关联产品", lock: true,fixed:true}, false);//打开子窗体
			})
		})
		//关联下载
		$(".btndown").click(function(){
			Wind.use('ajaxForm','artDialog','iframeTools', function () {
				art.dialog.open('<{:U("Product/other_down")}>', { height: '600px', width: '800px', title: "选择关联下载", lock: true,fixed:true}, false);//打开子窗体
			})
		})
	})
</script>

<script language="javascript">
	//相关新闻全部清除
	function newsalldel(){
		$("#xiangguan_news").html("");  //清除新闻名
		$("#othernews").val("");  //清除对应隐藏域
	}
	//相关产品全部清除
	function proalldel(){
		$("#xiangguan_pro").html("");  //清除产品名
		$("#otherpro").val("");  //清除对应隐藏域
	}
	//相关下载全部清除
	function downalldel(){
		$("#xiangguan_down").html("");  //清除下载名
		$("#otherdown").val("");  //清除对应隐藏域
	}
</script>
</head>



<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Product/plist")}>'>产品中心</a></li>
        <li><a href='<{:U("Product/add")}>'>预览产品</a></li>
      </ul>
	</div>
  <div class="h_a">产品相关</div>
  <form name="myform" action="<{:U("Product/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">产品名称</th>
          <td><input type="text" name="proname" value="" class="input input_hd J_title_color" id="proname" size="70" placeholder="输入产品名称">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        
        <tr>
          <th width="100">所属分类</th>
          <td>
         
          	<select name="cid" id="cid">
             		
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
            <span id="spa"></span>
          </td>
        </tr>
        
        <tr id="ta2">
        	<th>是否有缩略图</th>
            <td>
            	<input type="radio" name="isphoto" checked="checked" value="1" class="issuo" />是
                <input type="radio" name="isphoto" value="0" class="issuo"  />否
            </td>
        </tr>
        
        <tr id="ta1">
          <th>产品图片</th>
          <td>
          	<input type="file" name="prophoto" id="prophoto"  />
          </td>
        </tr>
        
        <tr>
          <th>产品简介</th>
          <td><textarea name="prointo"  class="inputtext" style=" width:450px;height:100px;" placeholder="该产品的简介："></textarea></td>
        </tr>
        <tr>
          <th>产品详细说明</th>
          <td>
               <script type="text/plain" id="procontent" name="procontent"  style="width:100%;height:400px;"></script>
              
          </td>
        </tr>
        
        <tr>
          <th>产品语言</th>
          <td>
          	<select name="lang">
            
            	<option value="1">中文</option>
                <option value="0">英文</option>
       
            </select>
          </td>
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
            
            	<option value="0">否</option>
                <option value="1">是</option>
       
            </select>
          </td>
        </tr>
        
        <tr>
        	<th>产品排序</th>
            <td><input type="text" name="orderby" id="orderby" placeholder="输入排序：" class="input" size="30" value="<{$orderbydata}>" /></td>
        </tr>
        
        <!--内容相关-->
        <tr>
        	<td colspan="2" class="h_a">内容相关</td>
        </tr>
        <tr>
        	<th>相关新闻</th>
            <td> <button class="btn btn_submit mr10 btnnews" type="button"  name="submit1">手动关联</button><a href="javascript:void(0)" onclick="newsalldel()">全部清除</a>
            	<br />
                <span id="xiangguan_news"></span>
            </td>
        </tr>
        <tr>
        	<th>相关产品</th>
            <td> 
            	<button class="btn btn_submit mr10 btnpro" type="button"  name="submit1">手动关联</button><a href="javascript:void(0)" onclick="proalldel()">全部清除</a>
                <br />
                <span id="xiangguan_pro"></span>
            </td>
        </tr>
        <tr>
        	<th>相关下载</th>
            <td> <button class="btn btn_submit mr10 btndown" type="button"  name="submit1">手动关联</button><a href="javascript:void(0)" onclick="downalldel()">全部清除</a>
            	<br />
                <span id="xiangguan_down"></span>
            </td>
        </tr>
        
        <!--自定义字段-->
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
            <td><{$html}>
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
<script language="javascript">
	var ue = UE.getEditor('procontent');
</script>