<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>预览留言</title>

</head>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />

<load href="__PUBLIC__/Js/ueditorMN/themes/default/css/umeditor.min.css" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.config.js" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.js" />
<load href="__PUBLIC__/Js/ueditorMN/lang/zh-cn/zh-cn.js" />


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Comments/mlist")}>'>留言管理</a></li>
        <li><a href='javascript:void(0)'>预览留言</a></li>
      </ul>
	</div>
  <div class="h_a">回复留言</div>
  <form name="myform" action="<{:U("Comments/replyguest")}>" method="post" class="J_ajaxForm">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">昵称</th>
          <td><input type="text" name="username" value="<{$data.username}>" class="input" id="username" size="30"></td>
        </tr>
        <tr>
          <th width="100">性别</th>
          <td>
          <if condition="$data.sex eq 1">
          男 <input type="radio" name="sex" value="1" class="input" id="sex1" checked="checked">
          女 <input type="radio" name="sex" value="0" class="input" id="sex2">
          <else />
          男 <input type="radio" name="sex" value="1" class="input" id="sex1">
          女 <input type="radio" name="sex" value="0" class="input" id="sex2"  checked="checked">
          </if>
          </td>
        </tr>
        <tr>
          <th width="100">QQ</th>
          <td><input type="text" name="qq" value="<{$data.qq}>" class="input" id="qq" size="15"></td>
        </tr>
        <tr>
          <th width="100">网址</th>
          <td><input type="text" name="eurl" value="<{$data.eurl}>" class="input" id="eurl" size="30"></td>
        </tr>
        <tr>
          <th>邮箱</th>
          <td><input type="text" name="email" value="<{$data.email}>" class="input" id="email" size="30"></td>
        </tr>
        <tr>
          <th>留言ip</th>
          <td><{$data.addip}></td>
        </tr>
        <tr>
          <th>留言时间</th>
          <td><{$data.addtime|date="Y-m-d H:i:s",###}></td>
        </tr>
       
        
       
        <tr>
          <th>留言正文</th>
          <td><textarea name="content"  class="inputtext" style=" width:450px;height:100px;"><{$data.content}></textarea></td>
        </tr>
         <tr>
          <th>状态</th>
          <td>
          	<select name="audit">
            <if condition="$data.audit eq 1">
            	<option value="1">已审核</option>
                <option value="0">未审核</option>
            <else />
            	<option value="0">未审核</option>
                <option value="1">已审核</option>
            </if>
            </select>
          </td>
        </tr>
        <tr>
            <td colspan="2" class="h_a">自定义字段</td>
        </tr>
        <foreach name="zdydata" item="vo">
        <{$vo}>
        </foreach>

        <tr height="200">
          <th>回复消息</th>
          <td height="200">
      			  <script type="text/plain" id="editor" name="reply"  style="width:65%;height:130px;"><{$data.reply|htmlspecialchars_decode}></script>
           </td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
     
    </div>
  </form>
</div>
</body>
</html>

<script type="text/javascript">
    var ue = UM.getEditor('editor');
</script>