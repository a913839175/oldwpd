<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改新闻</title>

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

<load href="__PUBLIC__/Css/cloud-zoom.css" />
<load href="__PUBLIC__/Js/cloud-zoom.1.0.2.min.js" />
<style type="text/css">
  /* zoom-section */
  .zoom-section{clear:both;margin-top:20px;}
  *html .zoom-section{display:inline;clear:both;}

  .zoom-small-image{border:4px solid #CCC;float:left;margin-bottom:0px;}
</style>


<script type="text/javascript">
	$(function(){
		$(".yulan").on('click',function(e){
			
			var content1 = UE.getEditor('sjprocon').getContent();
			
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
			}
			
			else{
				
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
	
			var cid = $("#cid").val();//获取分类id
			var id = $("input[name='id']").val();//获取新闻id
			//ajax验证
			$.get('<{:U("Content/ajax")}>',{cid:cid,rand:Math.random()},function(data){
				$("#valu").html(data);  //判断是否为终极分类
			});
			//ajax显示获取自定义字段
			$.get('<{:U("Content/edit_custom_ajax")}>',{id:id,cid:cid,rand:Math.random()},function(data){

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
			  
		  
			  
	//pc编辑器
	 var ue = UE.getEditor('concon');

	 //手机编辑器
	 var ue1 = UE.getEditor('sjprocon', {
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
			if($("#tr201").length<=0){
					$("#tr101").after("<tr id=\"tr201\"><th>页面标题</th><td><input type=\"text\" name=\"yetitle\" size=\"30\" placeholder=\"页面标题\" class=\"input\" /></td></tr><tr id=\"tr301\"><th>页面关键字</th><td><textarea style=\"width:408px; height:100px;\" name=\"keywords\" placeholder=\"页面关键字\"></textarea></td></tr><tr id=\"tr401\"><th>页面描述</th><td><textarea style=\"width:408px; height:100px;\" name=\"descri\" placeholder=\"页面描述\"></textarea></td></tr>");
			}
			
		})
		$(".opti2").click(function(){
			
			$("#tr201").remove();
			$("#tr301").remove();
			$("#tr401").remove();
		})
		
	})
	
	
</script>

<script language="javascript">
	$(function(){
		$("input[name='isphoto']").click(function(){
			if(this.value==0){
				$("#suo2").remove();
				$("#tr1").hide();
				$("#tr2").hide();
				$("#ch1").hide();
			}else if(this.value==1){
				if($("#tr1").length>0){
					 $("#tr1").show();
					 $("#ch1").show();
					
					
				 }else{
					$("#suo1").after("<tr id=\"suo2\"><th>上传图片</th><td><input type=\"file\" name=\"conphoto\" id=\"conphoto\" /></td></tr>");
				}
				
				
				
			}
		})
	})
</script>



<script language="javascript">
	$(function(){
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
        <li><a href='<{:U("Content/clist")}>'>新闻中心</a></li>
        <li><a href="javascript:void(0)">修改新闻</a></li>
      </ul>
	</div>
  <div class="h_a">新闻内容</div>
  <form name="myform" action="<{:U("Content/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">新闻标题</th>
          <td><input type="text" name="title" value="<{$data.title}>" class="input input_hd J_title_color" id="title"  size="70" placeholder="输入新闻标题">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        

        <tr>
          <th width="100">新闻分类</th>
          <td>
          	<select name="cid" id="cid">
             		
             <foreach name="dataclass" item="vo">
             	<if condition="$vo.id eq $data[cid]">
                
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
        		<input type="radio" name="contype" value="0" 
                
                <if condition="$data.contype eq 0"> checked</if> />普通新闻
        		<input type="radio" name="contype" value="1" 
                <if condition="$data.contype eq 1"> checked</if>  />外部链接 
        	</td>
        </tr>

        <tr id="isputong">
          <th>新闻内容</th>
          <td>
               
               <textarea name="concon" id="concon"style="width:100%;height:400px;"><{$data.concon}></textarea>
          </td>
        </tr>
		
        <tr id="iswaibu">
        	<th>链接地址</th>
            <td><input type="text" name="title_href" id="title_href" class="input" size="40" placeholder="http://" value="<{$data.title_href}>"/></td>
        </tr>
        
        
        <tr>
          <th>新闻摘要</th>
          <td><textarea name="coninfo"  class="inputtext" style="width:80%;height:100px;" placeholder="输入新闻摘要：" id="coninfo"><{$data.coninfo}></textarea>
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
        	<td><input type="text" name="author" id="author" class="input" size="40" value="<{$data.author}>"  placeholder="输入新闻作者："/></td>
        </tr>

        <tr>
        	<th>新闻来源</th>
        	<td><input type="text" name="source" id="source" class="input" size="40" value="<{$data.source}>"  placeholder="输入新闻来源：" /></td>
        </tr>
         <tr>
        	<th>新闻标签</th>
        	<td><input type="text" name="tag_name"  class="input" size="40"  placeholder="输入新闻标签：" />&nbsp;&nbsp;<input type="button" value="添加" id="tag_btn" style="height:30px;" />
        		<p id="all_tag">
        			<foreach name="news_tag_data" item="vo">
        				<span class="span_<{$vo.id}>"><img src=__PUBLIC__/Images/cancel.png width=12 height=12 data_i="<{$vo.id}>" class='del_img_tag' /><{$vo.tag_name}>&nbsp;&nbsp;</span>
        			</foreach>
        		</p>
        		<p>
        			<a href="javascript:void(0)" id="tag_view">查看标签库</a>
        		</p>
        		<p style="display:none;" id="tag_list">
        			<foreach name="tag_data_new" item="v">
        				<span><a href="javascript:void(0)" dataid="<{$v.id}>" class="tag_give" ><{$v.tag_name}><font color="red">(<{$v.click}>)</font></a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        			</foreach>
        			
        		
        		</p>
        	</td>
        </tr>

        <tr id="suo1">
          <th>是否有缩略图</th>
          <td>
          	<input type="radio" name="isphoto" value="1" class="issuo"
            <if condition="$data.isphoto eq 1">checked</if> />是
            <input type="radio" name="isphoto" value="0" class="issuo" 
            <if condition="$data.isphoto eq 0">checked</if> />否
          </td>
        </tr>
		<if condition="$data.isphoto eq 1">
        <tr id="tr1">
        	<th>新闻缩略图</th>
            <td>
            	<span class="zoom-section">
                  <span class="zoom-small-image">
                    <a href='__PUBLIC__/Uploads/Content/<{$data.conthumb2}>' class='cloud-zoom' rel="tint:'#ff0000',tintOpacity:0.5,smoothMove:5,zoomWidth:400,adjustY:-4,adjustX:10"><img src="__PUBLIC__/Uploads/Content/<{$data.conthumb1}>" title="" alt='' /></a>
                  </span>
                  
                </span>
            
            
            	<span style=""><a href="javascript:void(0)" id="ch1">重新选择</a></span>
            </td>
        </tr>
        </if>
        
        
        <tr>
        	<th>发布日期</th>
        	<td>
            	<input type="text" name="showdate" id="showdate" class="input" size="30" value='<{$data.showdate|date="Y-m-d H:i:s",###}>' placeholder="点击选择日期：" onclick="isdate()"/>
            <img src="__PUBLIC__/Images/date.png" style="margin:0px 0 -2px -23px" />
            </td>
        </tr>

        <tr>
        	<th>新闻排序</th>
        	<td><input type="text" name="orderby" id="orderby" class="input" size="30"  placeholder="输入排序：" value="<{$data.orderby}>" /></td>
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
          <td><input type="radio" name="issj" value="1" class="issj1" 
         <if condition="$data.issj eq 1">checked</if>  
          />是
          	  <input type="radio" name="issj"  value="0" class="issj2" 
            <if condition="$data.issj eq 0">checked</if>    
           />否
          	  <a href="javascript:void(0)" class="yulan" id="yu">预览效果</a>
          </td>
              
        </tr>
        
        
        <tr id="fcksj">
        	<th></th>
            <td><script type="text/plain" id="sjprocon" name="sjprocon"  style="width:320px;height:400px;"><{$data.sjprocon}></script>
                <input type="button" value="从web版获取" id="btn1" />
            </td>
        </tr>
 
        <tr>
        	<td colspan="2" class="h_a">优化相关</td>
        </tr>
        <tr id="tr101">
        	<th>优化设置</th>
            <td><input type="radio"  name="opti" value="1" class="opti1"
           <if condition="$data.opti eq 1">checked</if>   
            />是
            	<input type="radio" name="opti" value="0" class="opti2" 
            <if condition="$data.opti eq 0">checked</if>      
                />否
            </td>
        </tr>
        
        
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit"  name="submit1">确定</button>
        <input type="hidden" name="id" value="<{$data.id}>" />
        <span id="valu" style="display:none"></span>
        <input type="hidden" name="p" value="<{$Think.get.p}>"> 
        <input type="hidden" name="otherpro" id="otherpro" value="<{$data.otherpro}>" />
        <input type="hidden" name="othernews" id="othernews" value="<{$data.othernews}>" />
        <input type="hidden" name="otherdown" id="otherdown" value="<{$data.otherdown}>" />
        <foreach name="news_tag_data" item="vo">
        	<input type="hidden" name="tag_name1[]" value="<{$vo.id}>" class="del_<{$vo.id}>" />
        </foreach>
      </div>
    </div>
  </form>
</div>
</body>
</html>
<script language="javascript">
	var ue = UE.getEditor('concon');
</script>

<script language="javascript">
	$(function(){
		var contype = <{$data.contype}>;
		
		if(contype==0){
		  $("#iswaibu").hide();
		  $(".content_attr").show();
		  $("#isputong").show();
		}else if(contype==1){
		  $("#iswaibu").show();
		  $(".content_attr").hide();
		  $("#isputong").hide();
		}
		
	})
</script>


<script language="javascript">
	$(function(){
		$("#ch1").toggle(function(){
			$("#ch1").html("取消重选");
			$("#tr1").after("<tr id=\"tr2\" name=\"tr2\"><th>重新选择</th><td><input type=\"file\" name=\"conphoto\" id=\"conphoto\"  /></td></tr>");
		},function(){
			$("#ch1").html("重新选择");
			$("#tr2").remove();
		})
	})
</script>

<script type="text/javascript">


		//编辑器绑定值
	var con = "<{$data.sjprocon}>";
	var opti = "<{$data.opti}>";
	var issj = "<{$data.issj}>";
	
	if(opti==1){
		if($("#tr201").length<=0){
					$("#tr101").after("<tr id=\"tr201\"><th>页面标题</th><td><input type=\"text\" name=\"yetitle\" size=\"30\" placeholder=\"页面标题\" class=\"input\" value=\"<{$data.yetitle}>\" /></td></tr><tr id=\"tr301\"><th>页面关键字</th><td><textarea style=\"width:408px; height:100px;\" name=\"keywords\" placeholder=\"页面关键字\"><{$data.keywords}></textarea></td></tr><tr id=\"tr401\"><th>页面描述</th><td><textarea style=\"width:408px; height:100px;\" name=\"descri\" placeholder=\"页面描述\"><{$data.descri}></textarea></td></tr>");
		}
	}
	if(issj==0){
		$("#fcksj").hide();
		$(".yulan").hide();
	}
	

</script>

<script language="javascript">
	//相关新闻绑定值
	var othernewsstr = "<{$othernewsstr}>";
	if(othernewsstr!=""){
		$("#xiangguan_news").html(othernewsstr);
	}
	
	//相关产品绑定值
	var otherprostr = "<{$otherprostr}>";
	if(otherprostr!=""){
		$("#xiangguan_pro").html(otherprostr);
	}
	//相关下载绑定值
	var otherdownstr = "<{$otherdownstr}>";
	if(otherdownstr!=""){
		$("#xiangguan_down").html(otherdownstr);
	}
</script>

<script type="text/javascript">
	$(function(){
		
		$("#tag_btn").click(function(){
			var tag_name=$("input[name='tag_name']");
			if(tag_name.val()!=""){
				
				$.get("<{:U('Content/add_tag')}>",{tagname:tag_name.val()},function(data){
					if(data!=0){
						var obj = eval('(' + data + ')');
						$("#all_tag").append("<span class='span_"+obj.id+"'><img src=__PUBLIC__/Images/cancel.png width=12 height=12 data_i="+obj.id+" class='del_img_tag' />"+obj.tag_name+"&nbsp;&nbsp;</span>");
						//添加隐藏域
						$("#otherdown").after('<input type="hidden" name="tag_name1[]" value="'+obj.id+'" class="del_'+obj.id+'" />');
						tag_name.val("");
						tag_name.focus();
						
					}
					
				})
				
				
			}
		})

		//删除标签
		$(".del_img_tag").live("click",function(){
			var data_i=$(this).attr("data_i");
			$.get("<{:U('Content/del_tag')}>",{data_i:data_i},function(data){
				if(data==1){
					$(".span_"+data_i).remove();
					$(".del_"+data_i).remove();
				}
				
			})
			
		})

		//查看标签库
		$("#tag_view").toggle(function(){
			$("#tag_list").show();
		},function(){
			$("#tag_list").hide();
		})

		//标签库赋值
		$(".tag_give").click(function(){
			var dataid = $(this).attr("dataid");
			if($("#all_tag > .span_"+dataid).length>0){

			}else{
				$.get("<{:U('Content/tag_library')}>",{id:dataid},function(data){
				var obj = eval('(' + data + ')');
				$("#all_tag").append("<span class='span_"+obj.id+"'><img src=__PUBLIC__/Images/cancel.png width=12 height=12 data_i="+obj.id+" class='del_img_tag' />"+obj.tag_name+"&nbsp;&nbsp;</span>");
				$("#otherdown").after('<input type="hidden" name="tag_name1[]" value="'+obj.id+'" class="del_'+obj.id+'" />');
				});
			}
			
			
		})
		
	})

</script>