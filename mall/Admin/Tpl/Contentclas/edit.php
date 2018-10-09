<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改分类</title>


<script language="javascript">
  var GV = {
 
    JS_ROOT: "__PUBLIC__/Js/",
   
};
</script>



<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Css/cloud-zoom.css" />
<load href="__PUBLIC__/Js/cloud-zoom.1.0.2.min.js" />
<style type="text/css">
  /* zoom-section */
  .zoom-section{clear:both;margin-top:20px;}
  *html .zoom-section{display:inline;clear:both;}

  .zoom-small-image{border:4px solid #CCC;float:left;margin-bottom:0px;}
</style>

<script language="javascript">
	$(function(){
		$("#ch1").toggle(function(){
			$("#ch1").html("取消重选");
			$("#tr1").after("<tr id=\"tr2\" name=\"tr2\"><th>重新选择</th><td><input type=\"file\" name=\"classphoto\"  /></td></tr>");
		},function(){
			$("#ch1").html("重新选择");
			$("#tr2").remove();
		})
	})
</script>

<script type="text/javascript">
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
		 	 $("#suo1").after("<tr id=\"suo2\"><th>上传图片</th><td><input type=\"file\" name=\"classphoto\" id=\"conphoto\" /></td></tr>");
		 }
       
      }
    })

  })
</script>

<script language="javascript">
  $(function(){
    $(".J_ajax_submit_btn").click(function(){
      var conclassname = $("#conclassname");
      var isphoto = $(".issuo");
      
      
      
      
      if(conclassname.val()==""){
          Wind.use("artDialog", function () {
          art.dialog({
            id: "error",
            icon: "error",
            fixed: true,
            lock: true,
            background: "#CCCCCC",
            opacity: 0,
            content: "分类名称不能为空",
            cancelVal: '确定',
            cancel: function(){
              conclassname.focus();
            }
          });
        });
          return false;
      }
      
      else if(isphoto.val()==1){
          var classphoto = $("input[name='classphoto']");
          if(classphoto.val()==""){
            Wind.use("artDialog", function () {
          art.dialog({
            id: "error",
            icon: "error",
            fixed: true,
            lock: true,
            background: "#CCCCCC",
            opacity: 0,
            content: "分类图片必须要选择",
            cancelVal: '确定',
            cancel: function(){
              classphoto.focus();
            }
          });
        });
            return false;
        }
          
      }
      
      else{
        
        return true;
      }
      
      
    })
  })
</script>

<script type="text/javascript">
  $(function(){

    

    var pid = "<{$data.pid}>";
    var type_id = "<{$data.id}>";
    $("select[name='pid']").change(function(){
      //判断是否选择为自己
      if(this.value==type_id){
        alert("操作错误，自己不能作为自己父类");
        $("#select_err").val("1");
        return false;
      }else{
        $("#select_err").val("0");
      }


    })
  })
</script>

</head>



<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Content/clist")}>'>新闻中心</a></li>
        <li><a href='javascript:void(0)'>修改分类</a></li>
      </ul>
	</div>

  <div class="h_a">修改分类</div>
  <form name="myform" action="<{:U("Contentclas/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">分类名称</th>
          <td><input type="text" name="conclassname" value="<{$data.conclassname}>" class="input" id="conclassname" size="30" placeholder="分类名称">&nbsp;<font color="#FF0000">*</font></td>
        </tr>

        <tr>
          <th width="100">所属父类</th>
          <td>
            <select name="pid">
              <option value="0">/</option>
             <foreach name="alist" item="vo">
                <if condition="$data[pid] eq $vo[id]">
                  <option value="<{$vo.id}>" selected>
                    <?php
                    for($i=0;$i<$vo['count'];$i++){
                      echo "&nbsp;&nbsp;&nbsp;";
                    }
                    ?>
                    
                    <{$vo.conclassname}>
                    
                  </option>
                <else />
                  <option value="<{$vo.id}>">
                    <?php
                    for($i=0;$i<$vo['count'];$i++){
                      echo "&nbsp;&nbsp;&nbsp;";
                    }
                    ?>
                    
                    <{$vo.conclassname}>
                    
                  </option>

                </if>
                  
               
              
             </foreach> 
            </select>
            <span><input type="checkbox" value="1" name="select_mark">移动&nbsp;<font color="red">&lt;&lt;<{$data.conclassname}>&gt;&gt;</font>&nbsp;下所有子类</span>
          </td>
        </tr>


        <tr id="suo1">
          <th>是否有缩略图</th>
          <td>
            <input type="radio" name="isphoto" value="1" class="issuo"
            <if condition="$data.isphoto eq 1">checked</if>
            />是
            <input type="radio" name="isphoto" value="0" class="issuo"
            <if condition="$data.isphoto eq 0">checked</if>
            />否
          </td>
        </tr>



        <if condition="$data.isphoto eq 1">
        <tr id="tr1">
        	<th>分类图片</th>
            <td>
            	<span class="zoom-section">
                  <span class="zoom-small-image">
                    <a href='__PUBLIC__/Uploads/Conclass/<{$data.classthumb2}>' class='cloud-zoom' rel="tint:'#ff0000',tintOpacity:0.5,smoothMove:5,zoomWidth:400,adjustY:-4,adjustX:10"><img src="__PUBLIC__/Uploads/Conclass/<{$data.classthumb1}>" title="" alt='' /></a>
                  </span>
                  
                </span>
            
            
            	<span style=""><a href="javascript:void(0)" id="ch1">重新选择</a></span>
            </td>
        </tr>
        </if>
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
          <th>排序</th>
            <td><input type="text" name="orderby" id="orderby" placeholder="输入排序：" class="input" size="30" value="<{$data.orderby}>" /></td>
        </tr>

        <tr>
          <th>备注</th>
          <td><textarea name="conclasscontent"  class="inputtext" style=" width:450px;height:100px;" placeholder="该分类的其他信息："><{$data.conclasscontent}></textarea></td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">确定</button>
        <input type="hidden" name="editid" value="<{$data.id}>" />
        <input type="hidden" id="select_err" value="0" />
      </div>
    </div>
     
  </form>
</div>

</body>
</html>