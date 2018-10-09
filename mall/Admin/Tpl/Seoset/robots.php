<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>生成robots文件</title>


<script language="javascript">
  var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>

<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/ajaxpage.js" />
<load href="__PUBLIC__/Css/cloud-zoom.css" />
<load href="__PUBLIC__/Js/cloud-zoom.1.0.2.min.js" />

<load href="__PUBLIC__/Js/ueditorMN/themes/default/css/umeditor.min.css" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.config.js" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.js" />
<load href="__PUBLIC__/Js/ueditorMN/lang/zh-cn/zh-cn.js" />




<style type="text/css">
  /* zoom-section */
  .zoom-section{clear:both;margin-top:20px;}
  *html .zoom-section{display:inline;clear:both;}

  .zoom-small-image{border:4px solid #CCC;float:left;margin-bottom:0px;}

  .robots_content{
    width: 600px;
    height: 320px;
  }
  .csspage{
    font-size: 12px;
  }
</style>





</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href="javascript:void(0)">SEO管理</a></li>
        <li><a href="<{:U('Seoset/keywords')}>">生成Robots</a></li>
      </ul>
	</div>
  

    <div class="h_a">生成robots.txt</div>

  <form name="myform" action="<{:U("Seoset/robots")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
            
               
            
                

                  <tr>
                    <th width="100">内容</th>
                    <td>
                        <textarea class="robots_content" name="robots_content" placeholder="输入内容"><{$robots_content}></textarea>
                    </td>
                  </tr>
               
           

             


      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">保存</button>
        
      </div>
    </div>
  </form>
</div>
</body>
</html>

<script type="text/javascript">
    $(function(){
      $(".J_ajax_submit_btn").click(function(){
        if($(".key_name").val()==""){
          alert("关键词不能为空");
          $(".key_name").focus();
          return false;
        }
        if($(".key_url").val()==""){
          alert("URL不能为空");
          $(".key_url").focus();
          return false;
        }
        if($(".match_num").val()==""){
          alert("匹配次数不能为空");
          $(".match_num").focus();
          return false;
        }
      })
    })
</script>
