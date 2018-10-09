<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站点基本信息</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Css/cloud-zoom.css" />
<load href="__PUBLIC__/Js/cloud-zoom.1.0.2.min.js" />

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

<script language="javascript">
	$(function(){
		$("#ch1").toggle(function(){
			$("#ch1").html("取消重选");
			$("#tr1").after("<tr id=\"tr2\" name=\"tr2\"><th>选择Logo</th><td><input type=\"file\" name=\"file1\" /></td></tr>");
		},function(){
			$("#ch1").html("重新选择");
			$("#tr2").remove();
		})

    $("#ch10").toggle(function(){
      $("#ch10").html("取消重选");
      $("#tr10").after("<tr id=\"tr20\" name=\"tr10\"><th>选择缩略图</th><td><input type=\"file\" name=\"file10\" /></td></tr>");
    },function(){
      $("#ch10").html("重新选择");
      $("#tr20").remove();
    })
	})
</script>




</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Siteinfo/index")}>'>系统设置</a></li>
        <li><a href="<{:U('Siteinfo/index')}>">基本信息</a></li>
        <li><a href="<{:U('Siteinfo/menu')}>">菜单设置</a></li>
      </ul>
	</div>
  <div class="h_a">基本信息</div>
  <form name="myform" action="<{:U("Siteinfo/index")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">公司名称</th>
          <td><input type="text" name="sname" value="<{$data.sname}>" class="input" id="sname" size="30" placeholder="如××有限公司">
            <font color="#333">&nbsp;提示：如××有限公司</font>
          </td>
        </tr>
        <tr>
          <th width="100">公司简称</th>
          <td><input type="text" name="stitle" value="<{$data.stitle}>" class="input" id="stitle" size="30" maxlength="4" placeholder="2到4个汉字">
            <font color="#333">&nbsp;提示：2到4个汉字</font>
          </td>
        </tr>
        
        <tr id="tr1">
        	<th width="100">公司Logo</th>
            <td>
            <if condition="$data.slogo neq ''">
            	
                  
                    <img src="__PUBLIC__/Uploads/Siteinfo/<{$data.slothumb1}>" title="" alt='' />
                  
                  
                
            	<else />
            </if>
            	<span style=""><a href="javascript:void(0)" id="ch1">重新选择</a></span>
            </td>
        </tr>
      
        <tr>
          <th width="100">关键字</th>
          <td><textarea style="width:600px;height:100px;" name="skeyword" placeholder="多个关键字以逗号隔开"><{$data.skeyword}></textarea>
            <font color="#333">提示：多个关键字以逗号隔开</font>
          </td>
        </tr>

        <tr>
          <th width="100">公司简介</th>
          <td><textarea style="width:600px;height:100px;" name="sjianjie" placeholder="用于首页显示,字符控制在230个以内"><{$data.sjianjie}></textarea>
            <font color="#333">提示：用于首页显示,字符控制在230个以内</font>
          </td>
        </tr>
        <tr id="tr10">
          <th>简介缩略图：</th>
          <td>
            <if condition="$data.sjianjieimg neq ''">
              
                    <img src="__PUBLIC__/Uploads/Siteinfo/<{$data.sjianjieimg1}>" title="" alt='' />
               
              <else />
            </if>
            <span><a href="javascript:void(0)" id="ch10">重新选择</a></span>
          </td>
        </tr>

        <tr>
          <th>公司描述</th>
          <td>
          	<script type="text/plain" id="editor" name="sdescription"  style="width:80%;height:300px;"><{$data.sdescription}></script>
          </td>
        </tr>
        <tr>
          <th>上次设置时间</th>
          <td><{$data.updatetime|date="Y-m-d H:i:s",###}></td>
        </tr>
       
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">设置</button>
        
      </div>
    </div>
  </form>
</div>
</body>
</html>

<script type="text/javascript">
    var ue = UE.getEditor('editor', {
      toolbars: [
          ['fullscreen', 'source','fontfamily','fontsize', 'underline' ,'bold', 'italic','simpleupload','insertvideo','map']
      ],
      autoHeightEnabled: false,

    });
</script>