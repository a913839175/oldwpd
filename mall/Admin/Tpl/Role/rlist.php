<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色列表</title>

<script language="javascript">
  var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>

<load href="__PUBLIC__/Css/admin_style.css"/>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/ajaxpage.js" />

<script language="javascript">
	function ab(){
		if(confirm("确定要删除吗？删除后不可恢复！")){
			return　true;
		}else{
			return false;
		}
	}
</script>

</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Member/mlist")}>'>会员管理</a></li>
        <li><a href='javascript:void(0)'>角色列表</a></li>
      </ul>
	</div>
  <div class="table_list">
  <table width="100%" cellspacing="0" >
    <thead>
      <tr>
        <td width="87" align="center">角色ID</td>
        <td width="113" align="center">角色名称</td>
        <td width="212" align="center">角色权限</td>
        <td width="331"  align="center">添加时间</td>
        <td width="131" align="center">状态</td>
        <td width="570" align="center">管理操作</td>
      </tr>
    </thead>
    <tbody>
    <volist name="data" id="vo">
      <tr>
        <td align='center'><{$vo.rid}></td>
        <td align='center'><{$vo.rname}></td>
        <td align='center'><{$vo.dat}></td>
        <td align='center'><{$vo.addtime|date="Y-m-d H:i:s",###}></td>
        <td align='center'><font color="red"><if condition="$vo['isabled'] eq '0' ">╳<else />√</if></font></td>
        
        <td align='center'><a href="<{:U("Role/edit",array("id"=>$vo['rid']))}>">修改</a> | 
        <if condition=" $vo['isabled'] eq 0 ">
        <a href="<{:U("Role/disabled",array("id"=>$vo['rid'],"isabled"=>1)) }>"><font color="#FF0000">启用</font></a> | 
        <else />
        <a href="<{:U("Role/disabled",array("id"=>$vo['rid'],"isabled"=>0)) }>">禁用</a> | 
        </if>
        <a onclick="return ab()" class="J_ajax_del" href="<{:U('Role/delete',array('id'=>$vo['rid']) ) }>">删除</a> </td>
      </tr>
    </volist>
    </tbody>
  </table>
  <div class="p10">
        <div class="btn_wrap" style="z-index:999;">
      		<div class="btn_wrap_pd">  
       			 <div class="pages"> 
        <span class="ajaxpage"><{$page}></span>
        </div>
            </div>
        </div>
      </div>
  </div>
</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
<script type="text/javascript">

</script>
</body>
</html>
