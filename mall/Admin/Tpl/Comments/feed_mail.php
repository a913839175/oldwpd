<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邮件提醒</title>
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

<script type="text/javascript">
  $(function(){
    var $i=1;
    $(".add_to_mail").click(function(){
      $.get("<{:U('Comments/feed_mail_ajax')}>",{i:$i},function(data){
        $("tbody").append(data);
        $i++;
      });
    })
    //删除
    $(".tomaildel").live("click",function(){
        var $dataid = $(this).attr("dataid");
        $("#tr_"+$dataid).remove();
    })
  })

 $(function(){
    $.get("<{:U('Comments/feed_mail_edit_ajax')}>",{},function(data){
        $("tbody").append(data);
    });
 })
</script>
</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Comments/mlist")}>'>留言管理</a></li>
        <li><a href="javascript:void(0)">邮件提醒</a></li>
      </ul>
  </div>
  <div class="h_a">邮件配置</div>
  <form name="myform" action="<{:U("Comments/feed_mail")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
         <tr>
          <th width="100">邮件标题</th>
          <td><input type="text" name="smtp_title" value="<{$data.smtp_title}>" class="input" id="smtp_title" size="30" placeholder="">
            <font color="#333">&nbsp;提示：邮件标题</font>
          </td>
        </tr>
        <tr>
          <th width="100">SMTP服务器</th>
          <td><input type="text" name="smtp_host" value="<{$data.smtp_host}>" class="input" id="smtp_host" size="30" placeholder="如smtp.qq.com">
            <font color="#333">&nbsp;提示：发件人的SMTP服务器</font>
          </td>
        </tr>
        <tr>
          <th width="100">SMTP账号</th>
          <td><input type="text" name="smtp_name" value="<{$data.smtp_name}>" class="input" id="smtp_name" size="30" placeholder="如QQ号码">
            <font color="#333">&nbsp;提示：发件人邮件地址@前部分</font>
          </td>
        </tr>
        <tr>
          <th width="100">SMTP密码</th>
          <td><input type="password" name="smtp_pssword" value="<{$data.smtp_pssword}>" class="input" id="smtp_pssword" size="30" placeholder="如QQ密码">
            <font color="#333">&nbsp;提示：发件人邮件密码</font>
          </td>
        </tr>
        <tr>
          <th width="100">发件人邮箱</th>
          <td><input type="text" name="smtp_from" value="<{$data.smtp_from}>" class="input" id="smtp_from" size="30" placeholder="如1804434@qq.com">
            <font color="#333">&nbsp;提示：发件人邮件</font>
          </td>
        </tr>
        <tr>
          <th width="100">发件人姓名</th>
          <td><input type="text" name="smtp_from_name" value="<{$data.smtp_from_name}>" class="input" id="smtp_from_name" size="30" placeholder="如张三">
            <font color="#333">&nbsp;提示：发件人姓名</font>
          </td>
        </tr>
        <tr id="tomaillast">
          <th width="100">收件人邮箱</th>
          <td><input type="text" name="smtp_to[]" value="<{$data_info[0][smtp_to]}>" class="input" id="" size="30" placeholder="如123456@qq.com">
            <font color="#333">&nbsp;提示：收件人邮件<input class="add_to_mail" type="button" value="添加多个" /></font>
          </td>
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