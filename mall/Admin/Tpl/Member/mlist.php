<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员列表</title>

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


</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Member/mlist")}>'>会员管理</a></li>
        <li><a href='<{:U("Member/mlist")}>'>会员列表</a></li>
      </ul>
	</div>
  <div class="table_list">
  <table width="100%" cellspacing="0" >
    <thead>
      <tr>
        <td width="88" align="center">会员ID</td>
        <td width="114" align="center">会员姓名</td>
        <td width="162" align="center">登录名</td>
        <td width="162" align="center">所属角色</td>
        <td width="209"  align="center">登录次数</td>
        <td width="354"  align="center">添加时间</td>
        <td width="58" align="center">状态</td>
        <td width="457" align="center">管理操作</td>
      </tr>
    </thead>
    <tbody>
    <volist name="data" id="vo">
      <tr>
        <td align='center'><{$vo.id}></td>
        <td align='center'><{$vo.nicname}></td>
        <td align='center'><{$vo.username}></td>
        <td align='center'><{$vo.rname}></td>
        <td align='center'><{$vo.loginnum}></td>
        <td align='center'><{$vo.addtime|date="Y-m-d H:i:s",###}></td>
        <td align='center'><font color="red"><if condition="$vo['disable'] eq '0' ">╳<else />√</if></font></td>
        
        <td align='center'><a href="<{:U("Member/edit",array("id"=>$vo['id']))}>">修改</a> | 
        <if condition=" $vo['disable'] eq 0 ">
        <a href="<{:U("Member/disabled",array("id"=>$vo['id'],"disabled"=>1)) }>"><font color="#FF0000">启用</font></a> | 
        <else />
        <a href="<{:U("Member/disabled",array("id"=>$vo['id'],"disabled"=>0)) }>">禁用</a> | 
        </if>
        <a onclick="return ab()" class="J_ajax_del" href="<{:U('Member/delete',array('id'=>$vo['id']) ) }>">删除</a> </td>
      </tr>
    </volist>
    </tbody>
  </table>
  <div class="p10">
        <div class="btn_wrap" style="z-index:999; overflow:hidden; line-height:30px;">
      		<div class="btn_wrap_pd">  
       			 <div class="pages" style="float:left;"> 
        <span class="ajaxpage"><{$page}></span>
         &nbsp;&nbsp;&nbsp;&nbsp;
         
            <!-- <button class="btn btn_submit mr10 " type="button" id="btnexcel">导入Excel</button> -->
             </div>
             <form method="post" action="<{:U('Member/import_excel')}>" enctype="multipart/form-data"  style="float:left;">
                <input  type="file" name="file_stu" />
                <input type="submit" class="btn btn_submit mr10 "  value="导入" />
                <input type="button" id="dowm_temp" class="btn btn_submit mr10 "  value="下载模板" />
            </form>

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

<script type="text/javascript">
  $(function(){
    $("#dowm_temp").click(function(){
      window.location.href="<{:U('Member/down_temp')}>";
    })
  })
</script>
