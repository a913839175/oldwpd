<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言回复</title>

<script language="javascript">
  var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>

<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/My97DatePicker/WdatePicker.js"/>

<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/lang/zh-cn/zh-cn.js"></script>

<script language="javascript">
  //日期控件显示
  function isdate(){
    WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd HH:mm:ss'});
  }
</script>
</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Comments/mlist")}>'>留言管理</a></li>
        <li><a href='javascript:void(0)'>留言回复</a></li>
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
      			  <script type="text/plain" id="editor" name="reply"  style="width:100%;height:300px;"><{$data.reply|htmlspecialchars_decode}></script>
           </td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">确定</button>
        <input type="hidden" name="editid" value="<{$data.id}>" />
      </div>
    </div>
  </form>
</div>
</body>
</html>

<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>