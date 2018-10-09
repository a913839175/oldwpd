<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>预览新闻</title>

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
			
			else if($("#valu").html()==0){
				Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "该分类不是终极分类，不可添加新闻！",
						cancelVal: '确定',
						cancel: function(){
							$("#cid").focus();
						}
					});
				});
				return false;
			}
			
			else if(conphotopath==""){
					Wind.use("artDialog", function () {
					art.dialog({
						id: "error",
						icon: "error",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "新闻缩略图必须要选择",
						cancelVal: '确定',
						cancel: function(){
							conphoto.focus();
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
						content: "新闻排序不能为空且必须是整数",
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
	$(function(){
		ajx();
		$("#cid").change(function(){
			
			ajx();
		})
	})
	
	function ajx(){
	
			var cid = $("#cid").val();
			//ajax验证
			$.get('<{:U("Content/ajax")}>',{cid:cid,rand:Math.random()},function(data){
				$("#valu").html(data);  //判断是否为终极分类
			});
			//ajax显示获取自定义字段
			$.get('<{:U("Content/add_custom_ajax")}>',{cid:cid,rand:Math.random()},function(data){

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


<script type="text/javascript">
   $(function(){
			 //fck编辑器
	 var ue = UE.getEditor('concon');
	 $("#btn1").click(function(){
			if(ue.hasContents()){
				SetEditorContents("sjeditor",ue.getPlainTxt());
				
			}
	})
	 
	 //摘要获取
	 $("#btn2").click(function(){
		if(ue.hasContents()){
			if($("#add_introduce").attr("checked")=="checked"){
				var introcude_length = $("#introcude_length").val();
				if(introcude_length=="" || introcude_length<=0){
					introcude_length=200;
				}
				
				var con = ue.getContentTxt();
				
				$("#coninfo").val(con.substring(0,introcude_length));
			}else{
				$("#coninfo").val(ue.getContentTxt());
			}
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
	$(function(){
		$("input[name='isphoto']").click(function(){
			if(this.value==0){
				$("#suo2").remove();
			}else if(this.value==1){
				$("#suo1").after("<tr id=\"suo2\"><th>上传图片</th><td><input type=\"file\" name=\"conphoto\" id=\"conphoto\" /></td></tr>");
			}
		})
	})
</script>

<script language="javascript">
	$(function(){
			   $("#iswaibu").hide();
		$("input[name='contype']").click(function(){
			if(this.value==0){
				$("#iswaibu").hide();
				$(".content_attr").show();
				$("#isputong").show();
			}else if(this.value==1){
				$("#iswaibu").show();
				$(".content_attr").hide();
				$("#isputong").hide();
			}
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

</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Content/clist")}>'>新闻中心</a></li>
        <li><a href='<{:U("Content/add")}>'>预览新闻</a></li>
      </ul>
	</div>
  <div class="h_a">新闻内容</div>
  <form name="myform" action="<{:U("Content/add")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">新闻标题</th>
          <td><input type="text" name="title" value="" class="input input_hd J_title_color" id="title" size="70" placeholder="输入新闻标题">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        

        <tr>
          <th width="100">新闻分类</th>
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
            <span id="spa"></span>
          </td>
        </tr>
        
        <tr>
        	<th>新闻形式</th>
        	<td>
        		<input type="radio" name="contype" value="0" checked="checked" />普通新闻
        		<input type="radio" name="contype" value="1" />外部链接 
        	</td>
        </tr>

        <tr id="isputong">
          <th>新闻内容</th>
          <td>
               <script type="text/plain" id="concon" name="concon"  style="width:100%;height:400px;"></script>
               
          </td>
        </tr>
		
        <tr id="iswaibu">
        	<th>链接地址</th>
            <td><input type="text" name="title_href" id="title_href" class="input" size="40" placeholder="http://" value="http://"/></td>
        </tr>
        
        
        <tr>
          <th>新闻摘要</th>
          <td><textarea name="coninfo"  class="inputtext" style="width:80%;height:100px;" placeholder="输入新闻摘要：" id="coninfo"></textarea>
          		<style type="text/css">
				.content_attr {
					border: 1px solid #CCC;
					padding: 5px 8px;
					background: #FFC;
					margin-top: 6px;
					width:79%;
				}
				</style>
				<div class="content_attr">
				<input name="add_introduce" id="add_introduce" type="checkbox"  value="1" checked> 是否截取内容
				<input type="text" name="introcude_length" id="introcude_length" class="input" value="200" size="3"> 字符至新闻摘要
				&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" value="确定" id="btn2" style="height:30px; line-height:60px;"  />
				</div>
          	
          </td>
        </tr>

        <tr>
        	<th>新闻作者</th>
        	<td><input type="text" name="author" id="author" class="input" size="40"  placeholder="输入新闻作者："/></td>
        </tr>

        <tr>
        	<th>新闻来源</th>
        	<td><input type="text" name="source" id="source" class="input" size="40"  placeholder="输入新闻来源：" /></td>
        </tr>
        <tr>
        	<th>新闻关键字</th>
        	<td><input type="text" name="keyword1" id="keyword1" class="input" size="40"  placeholder="输入新闻关键字：" />&nbsp;&nbsp;&nbsp;<font color="#999">提示：此关键字与优化无关</font></td>
        </tr>

        <tr id="suo1">
          <th>是否有缩略图</th>
          <td>
          	<input type="radio" name="isphoto" value="1" class="issuo"/>是
            <input type="radio" name="isphoto" value="0" class="issuo" checked="checked" />否
          </td>
        </tr>
		
        <tr>
        	<th>发布日期</th>
        	<td>
            	<input type="text" name="showdate" id="showdate" class="input" size="30" placeholder="点击选择日期：" onclick="isdate()"/>
            	<img src="__PUBLIC__/Images/date.png" style="margin:0px 0 -2px -23px" />
            </td>
        </tr>

        <tr>
        	<th>新闻排序</th>
        	<td><input type="text" name="orderby" id="orderby" class="input" size="30"  placeholder="输入排序：" value="<{$orderbydata}>" /></td>
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
          <th>语言</th>
          <td>
          	<select name="lang">
            
            	<option value="1">中文</option>
                <option value="0">英文</option>
       
            </select>
          </td>
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
	var ue = UE.getEditor('concon');
	
</script>