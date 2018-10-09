<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改角色</title>

</head>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Member/mlist")}>'>会员管理</a></li>
        <li><a href='javascript:void(0)'>角色修改</a></li>
      </ul>
	</div>
  <div class="h_a">修改角色</div>
  <form name="myform" action="<{:U("Role/edit")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">角色名称</th>
          <td><input type="text" name="rname" value="<{$data.rname}>" class="input" id="username" size="30" placeholder="角色名称">&nbsp;<font color="#FF0000">*</font></td>
        </tr>
        
        
		
         <tr>
          <th>所属菜单</th>
          <td>  
            <foreach name="xml_array" item="vo">
            	<if condition="$vo.values & $data[rshell]">
            	<input type="checkbox" name="check[]" value="<{$vo.values}>" checked="checked" /><{$vo.column}>
                <else />
                <input type="checkbox" name="check[]" value="<{$vo.values}>" /><{$vo.column}>
                </if>
            </foreach>
          </td>
        </tr>
            
         <tr>
          <th>状态</th>
          <td>
          	<select name="isabled">
            	<if condition="$data.isabled eq 1">
                	<option value="1">启用</option>
               	    <option value="0">禁用</option>
                <else />
                	<option value="0">禁用</option>
                    <option value="1">启用</option>
                </if>
            	
                
       
            </select>
          </td>
        </tr>
        <tr>
          <th>备注</th>
          <td><textarea name="rcontent"  class="inputtext" style=" width:450px;height:100px;" placeholder="该角色的其他信息："><{$data.rcontent}></textarea></td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">确定</button>
        <input type="hidden" name="editid" value="<{$data.rid}>" />
      </div>
    </div>
  </form>
</div>
</body>
</html>