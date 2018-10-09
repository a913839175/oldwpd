<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关键词设置</title>


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

  .keyword_style{
    width: 300px;
    height: 120px;
  }
  .csspage{
    font-size: 12px;
  }
</style>

<script type="text/javascript">
  $(function(){
    $(".delone").click(function(){
      if(confirm("确定删除吗？")){
        return true;
      }else{
        return false;
      }
    })
  })
</script>




</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href="javascript:void(0)">SEO管理</a></li>
        <li><a href="<{:U('Seoset/keywords')}>">关键词设置</a></li>
      </ul>
	</div>
  

  <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
           
            
            <td width="180" align="left">关键词</td>
            <td width="366" align="center">链接</td>
            <td width="279" align="center">样式</td>
            <td width="200" align="center">属性</td>
            <td width="264" align="center" >操作</td>
           
          </tr>
        </thead>
        <tbody>
           <foreach name="keywords_data" item="v">
            <tr>
              <td width="180" align="left"><{$v.key_name}></td>
              <td width="366" align="center"><{$v.key_url}></td>
              <td width="279" align="center" ><{$v.key_style}></td>
              <td width="200" align="center">
                  <if condition="$v.no_follow eq 1">No Follow </if>
                  <if condition="$v.new_window eq 1">新窗口打开 </if>
              </td>
              <td width="264" align="center" ><a href="<{:U('Seoset/edit',array('id'=>$v[id]))}>">修改</a> | <a class="delone" href="<{:U('Seoset/del',array('id'=>$v[id]))}>">删除</a></td>
           </tr>
          </foreach>
        </tbody>
      </table>
        
      <div class="p10">

            <span class="ajaxpage csspage"> <{$page}></span> 

       
      </div>
    </div>
    <div class="h_a">修改关键词</div>

  <form name="myform" action="<{:U("Seoset/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
            
               
            
                  <tr>
                    <th width="100">关键词</th>
                    <td>
                        <input type="text" class="input key_name" name="key_name" size="40" value="<{$edit_keywords.key_name}>"  placeholder="请输入关键字"/>
                    </td>
                  </tr>
                  
                  <tr>
                    <th width="100">URL</th>
                    <td>
                        <input type="text" class="input key_url" name="key_url" value="<{$edit_keywords.key_url}>" size="40" placeholder="请输入URL地址" />
                    </td>
                  </tr>

                  <tr>
                    <th width="100">样式</th>
                    <td>
                        <textarea class="keyword_style" name="key_style" placeholder="输入CSS样式"><{$edit_keywords.key_style}></textarea>
                    </td>
                  </tr>
                   <tr>
                    <th width="100">匹配次数</th>
                    <td>
                        <input type="text" class="input match_num" name="match_num" value="<{$edit_keywords.match_num}>" />
                    </td>
                  </tr>
                  <tr>
                    <th width="100"></th>
                    <td>
                        <input type="checkbox" name="no_follow" value="1"
                        <if condition="$edit_keywords.no_follow eq 1">
                          checked
                        </if>
                         />No Follow&nbsp;&nbsp;&nbsp;
                       
                        <input type="checkbox" name="new_window" value="1" 
                        <if condition="$edit_keywords.new_window eq 1">
                          checked
                        </if>
                         />新窗口打开 &nbsp;&nbsp;&nbsp;
                    </td>
                  </tr>
           
           

             


      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">保存</button>
        <input type="hidden" name="id" value="<{$Think.get.id}>" />
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
