<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改产品</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<script language="javascript">
	var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Css/cloud-zoom.css" />
<load href="__PUBLIC__/Js/cloud-zoom.1.0.2.min.js" />
<load href="__PUBLIC__/Js/My97DatePicker/WdatePicker.js"/>

<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/lang/zh-cn/zh-cn.js"></script>


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
			var proname = $("#proname");
			var procontent= $("#procontent");

			var orderby = $("#orderby");

			var prophoto = $("#prophoto");
			var prophotopath=prophoto.val();

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
			}else if($("#valu").html()==0){
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
			}else if(prophotopath==""){
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
	//pc编辑器
	 var ue = UE.getEditor('procontent');

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
					$("#tr1").after("<tr id=\"tr2\"><th>页面标题</th><td><input type=\"text\" name=\"yetitle\" size=\"30\" placeholder=\"页面标题\" class=\"input\" value=\"<{$data.yetitle}>\" /></td></tr><tr id=\"tr3\"><th>页面关键字</th><td><textarea style=\"width:408px; height:100px;\" name=\"keywords\" placeholder=\"页面关键字\"><{$data.keywords}></textarea></td></tr><tr id=\"tr4\"><th>页面描述</th><td><textarea style=\"width:408px; height:100px;\" name=\"descri\" placeholder=\"页面描述\"><{$data.descri}></textarea></td></tr>");
			}

		})
		$(".opti2").click(function(){

			$("#tr2").remove();
			$("#tr3").remove();
			$("#tr4").remove();
		})

	})


</script>

<!--是否重选图片，若是重选的话，就回做必填项验证-->
<script language="javascript">
  $(function(){
    $("#sn1").toggle(function(){
        $("#sn1").html("取消重选");
        $("#tr100").after("<tr id='tr200'><th>重选图片</th><td><input type=\"file\" name=\"prophoto\" id=\"prophoto\" /></td></tr>");
    },function(){
        $("#sn1").html("重新选择");
        $("#tr200").remove();
    })
  })
</script></head>


<script type="text/javascript">
	$(function(){

		var ispic = "<{$data.isphoto}>";
		if(ispic==0){
			x1 = $("#ta1").detach();
		}
		$("input[name=isphoto]").click(function(){
			if(this.value==0){
				x1 = $("#ta1").detach();
				x2 = $("#tr100").detach();
			}else{
				$("#ta2").after(x1);
				$("#ta2").after(x2);
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
			$.get('<{:U("Product/ajax")}>',{cid:cid,rand:Math.random()},function(data){
				$("#valu").html(data);  //判断是否为终极分类
			});
			//ajax显示获取自定义字段
			$.get('<{:U("Content/edit_custom_ajax")}>',{module_id:2,id:id,cid:cid,rand:Math.random()},function(data){

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
		//关联答题
		$(".btnanswer").click(function(){
			Wind.use('ajaxForm','artDialog','iframeTools', function () {
				art.dialog.open('<{:U("Product/other_answer")}>', { height: '600px', width: '800px', title: "选择关联题目", lock: true,fixed:true}, false);//打开子窗体
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
	//相关题库全部清除
	function answeralldel(){
		$("#xiangguan_answer").html("");  //清除下载名
		$("#otheranswer").val("");  //清除对应隐藏域
	}
</script>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Product/plist")}>'>产品中心</a></li>
        <li><a href='javascript:void(0)'>修改产品</a></li>
      </ul>
	</div>
  <div class="h_a">修改产品</div>
  <form name="myform" action="<{:U("Product/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full">
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">产品名称</th>
          <td><input type="text" name="proname" value="<{$data.proname}>" class="input input_hd J_title_color" id="proname" size="70" placeholder="输入产品名称">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        <tr>
          <th width="100">所属分类</th>
          <td>
          	<select name="cid"  id="cid">
           	  <foreach name="dataclass" item="vo">
             		<if condition="$data.cid eq $vo['id']">
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
            <input type="radio" name="isphoto" value="1"
           <if condition="$data.isphoto eq 1">checked</if>
            />是
            <input type="radio" name="isphoto" value="0"
            <if condition="$data.isphoto eq 0">checked</if>
             />否
            </td>
        </tr>

        <if condition="$data.isphoto eq 1">
        <tr id="tr100">
          <th>产品图片</th>
          <td>
            <span class="zoom-section">
              <span class="zoom-small-image">
                <a href='__PUBLIC__/Uploads/Product/<{$data.prothumb2}>' class='cloud-zoom' rel="tint:'#ff0000',tintOpacity:0.5,smoothMove:5,zoomWidth:400,adjustY:-4,adjustX:10"><img src="__PUBLIC__/Uploads/Product/<{$data.prothumb1}>" title="" alt='' /></a>
              </span>
            </span>
            <span style=""><a id="sn1" href="javascript:void(0)">重新选择</a></span>
          </td>
        </tr>
       <else />
       	<tr id="ta1">
          <th>产品图片</th>
          <td>
          	<input type="file" name="prophoto" id="prophoto"  />
          </td>
        </tr>
       </if>



        <tr>
          <th>产品简介</th>
          <td><textarea name="prointo"  class="inputtext" style=" width:450px;height:100px;" placeholder="该产品的简介："><{$data.prointo}></textarea></td>
        </tr>
        <tr>
          <th>产品详细说明</th>
          <td>

               <textarea name="procontent" id="procontent"style="width:100%;height:400px;"><{$data.procontent}></textarea>
          </td>
        </tr>


         <tr>
        	<th>产品标签</th>
        	<td><input type="text" name="tag_name"  class="input" size="40"  placeholder="输入产品标签：" />&nbsp;&nbsp;<input type="button" value="添加" id="tag_btn" style="height:30px;" />
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

        <tr>
          <th>产品语言</th>
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
            	<if condition="$data.isshow eq 1">
            	<option value="1">是</option>
                <option value="0">否</option>
       			<else />
                <option value="0">否</option>
                <option value="1">是</option>
                </if>
            </select>
          </td>
        </tr>

        <tr>
          <th>是否推荐</th>
          <td>

          	<select name="isrecom">
          	<if condition="$data.isrecom eq 0">
            	<option value="0">否</option>
                <option value="1">是</option>
       		<else />
            	<option value="1">是</option>
                <option value="0">否</option>
            </if>
            </select>
          </td>
        </tr>


        <tr>
          <th>是否精选</th>
          <td>
              <select name="pro_jingxuan">
            	<option value="0" <if condition="$data.pro_jingxuan eq 0">selected</if>>否</option>
                <option value="1" <if condition="$data.pro_jingxuan eq 1">selected</if>>是</option>
            </select>
          </td>
        </tr>

        <tr>
        	<th>产品排序</th>
            <td><input type="text" name="orderby" id="orderby" placeholder="输入排序：" class="input" size="30" value="<{$data.orderby}>" /></td>
        </tr>

        <tr>
        	<th>产品规格</th>
            <td><input type="text" name="pro_guige" id="pro_guige" placeholder="输入规格用“,”排开：" class="input" size="30" value="<{$data.pro_guige}>" />输入规格用“,”排开</td>
        </tr>
         <tr>
        	<th>产品样式</th>
            <td><input type="text" name="pro_style" id="pro_style" placeholder="输入样式用“,”排开：" class="input" size="30" value="<{$data.pro_style}>" />输入样式用“,”排开</td>
        </tr>
        <tr>
        	<th>适用产品</th>
            <td>
                <input type="checkbox" id="product">全选</input>
                <?php $pro_product=$data['pro_product'];?>
                <input type="checkbox" name="pro_product[]" id="pro_product"value="微+1" <foreach name="pro_product" item="vo"><eq name="vo" value="微+1"> checked="checked" </eq></foreach> >微+1
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微+3" <foreach name="pro_product" item="vo"><eq name="vo" value="微+3"> checked="checked" </eq></foreach>>微+3
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微+6" <foreach name="pro_product" item="vo"><eq name="vo" value="微+6"> checked="checked" </eq></foreach>>微+6
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微月盈Ⅰ" <foreach name="pro_product" item="vo"><eq name="vo" value="微月盈Ⅰ"> checked="checked" </eq></foreach>>微月盈Ⅰ
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微月盈Ⅱ" <foreach name="pro_product" item="vo"><eq name="vo" value="微月盈Ⅱ"> checked="checked" </eq></foreach>>微月盈Ⅱ
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微月盈Ⅲ" <foreach name="pro_product" item="vo"><eq name="vo" value="微月盈Ⅲ"> checked="checked" </eq></foreach>>微月盈Ⅲ
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微年利Ⅰ" <foreach name="pro_product" item="vo"><eq name="vo" value="微年利Ⅰ"> checked="checked" </eq></foreach>>微年利Ⅰ
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微年利Ⅱ" <foreach name="pro_product" item="vo"><eq name="vo" value="微年利Ⅱ"> checked="checked" </eq></foreach>>微年利Ⅱ
                <input type="checkbox" name="pro_product[]" id="pro_product" value="微年利Ⅲ" <foreach name="pro_product" item="vo"><eq name="vo" value="微年利Ⅲ"> checked="checked" </eq></foreach>>微年利Ⅲ
                    <strong style="color:red;">此项在填写红包选项时填写</strong>
            </td>
        </tr>
				<tr>
        	<th>适用产品期限（散标）</th>
            <td><input type="text" name="period" id="period" placeholder="输入期限：" class="input" size="30" value="<{$data.period}>" />月起（包含）</td>
        </tr>
        <tr>
        	<th>是否可以收益前置</th>
            <td>是:<input type="radio" <eq name="data.income_front" value="1"> checked="checked" </eq> name="income_front" value="1" />否:<input type="radio" <eq name="data.income_front" value="0"> checked="checked" </eq>  name="income_front" value="0" /></td>
        </tr>
        <tr>
        	<th>微购比例</th>
            <td><input type="input" name="wgbl" value="<{$data.wgbl}>" />%</td>
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
         <tr>
        	<th>相关答题</th>
            <td> <button class="btn btn_submit mr10 btnanswer" type="button"  name="submit1">手动关联</button><a href="javascript:void(0)" onclick="answeralldel()">全部清除</a>
            	<br />
                <span id="xiangguan_answer"></span>
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
          <td>
          	  <if condition="$data.issj eq 1">
              <input type="radio" name="issj" value="1" class="issj1" checked="checked" />是
          	  <input type="radio" name="issj"  value="0" class="issj2" />否
              <else />
              <input type="radio" name="issj" value="1" class="issj1" />是
          	  <input type="radio" name="issj"  value="0" class="issj2" checked="checked" />否
              </if>
          	  <a href="javascript:void(0)" class="yulan">预览效果</a>
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
        <tr id="tr1">
        	<th>优化设置</th>
            <td>
            	<if condition="$data.opti eq 1">
                <input type="radio"  name="opti" value="1" class="opti1" checked="checked"/>是
            	<input type="radio" name="opti" value="0" class="opti2" />否
                <else />
                <input type="radio"  name="opti" value="1" class="opti1" />是
            	<input type="radio" name="opti" value="0" class="opti2" checked="checked" />否
                </if>
            </td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" id="prosub">确定</button>
        <input type="hidden" name="id" id="proid" value="<{$data.id}>" />
        <input type="hidden" name="p" id="p" value="<{$Think.get.p}>" />
        <span id="valu" style="display:none"></span>
        <input type="hidden" name="otherpro" id="otherpro" value="<{$data.otherpro}>" />
        <input type="hidden" name="othernews" id="othernews" value="<{$data.othernews}>" />
        <input type="hidden" name="otherdown" id="otherdown" value="<{$data.otherdown}>" />
        <input type="hidden" name="otheranswer" id="otheranswer" value="<{$data.otheranswer}>" />
        <foreach name="news_tag_data" item="vo">
        	<input type="hidden" name="tag_name1[]" value="<{$vo.id}>" class="del_<{$vo.id}>" />
        </foreach>
      </div>
    </div>
  </form>
</div>
</body>
</html>
<script type="text/javascript">
	//编辑器绑定值
	var con = "<{$data.sjprocon}>";
	var opti = "<{$data.opti}>";
	var issj = "<{$data.issj}>";


	if(opti==1){
		if($("#tr2").length<=0){
					$("#tr1").after("<tr id=\"tr2\"><th>页面标题</th><td><input type=\"text\" name=\"yetitle\" size=\"30\" placeholder=\"页面标题\" class=\"input\" value=\"<{$data.yetitle}>\" /></td></tr><tr id=\"tr3\"><th>页面关键字</th><td><textarea style=\"width:408px; height:100px;\" name=\"keywords\" placeholder=\"页面关键字\"><{$data.keywords}></textarea></td></tr><tr id=\"tr4\"><th>页面描述</th><td><textarea style=\"width:408px; height:100px;\" name=\"descri\" placeholder=\"页面描述\"><{$data.descri}></textarea></td></tr>");
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

	//相关题库绑定值
	var otheranswerstr = "<{$otheranswerstr}>";
	if(otheranswerstr!=""){
		$("#xiangguan_answer").html(otheranswerstr);
	}
</script>

<script type="text/javascript">
    $(function(){
		$("#product").click(function(){
                if(this.checked){
                     $("input[name='pro_product[]']").each(function(){this.checked=true;});
                }else{
                     $("input[name='pro_product[]']").each(function(){this.checked=false;});
                }
            });
	$(function(){

		$("#tag_btn").click(function(){
			var tag_name=$("input[name='tag_name']");
			if(tag_name.val()!=""){

				$.get("<{:U('Product/add_tag')}>",{tagname:tag_name.val()},function(data){
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
			$.get("<{:U('Product/del_tag')}>",{data_i:data_i},function(data){
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
				$.get("<{:U('Product/tag_library')}>",{id:dataid},function(data){
				var obj = eval('(' + data + ')');
				$("#all_tag").append("<span class='span_"+obj.id+"'><img src=__PUBLIC__/Images/cancel.png width=12 height=12 data_i="+obj.id+" class='del_img_tag' />"+obj.tag_name+"&nbsp;&nbsp;</span>");
				$("#otherdown").after('<input type="hidden" name="tag_name1[]" value="'+obj.id+'" class="del_'+obj.id+'" />');
				});
			}


		})

	})

</script>
