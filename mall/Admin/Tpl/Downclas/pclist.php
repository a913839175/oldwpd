<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>下载分类列表</title>
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
        <li><a href='<{:U("Down/plist")}>'>下载管理</a></li>
        <li><a href='<{:U("Downclas/pclist")}>'>分类列表</a></li>
      </ul>
	</div>
    <div class="mb10">
        <a href='<{:U("Downclas/add")}>' class="btn" title="添加下载分类" target=""><span class="add"></span>添加下载分类</a>
  </div>
  <div class="table_list">
  <table width="100%" cellspacing="0" >
    <thead>
      <tr>
        <td width="121" align="center">ID</td>
        <td width="230" align="left">分类名称</td>
        <td width="242" align="center">路径</td>
        <td width="303"  align="center">添加时间</td>
        <td width="156" align="center">是否显示</td>
        <td width="392" align="center">管理操作</td>
      </tr>
    </thead>
    <tbody>
    <volist name="data" id="vo">
      <tr>
        <td align='center'><{$vo.id}></td>
        <td align='left'>
        <?php
        	for($i=0;$i<$vo['count'];$i++){
				echo "&nbsp;&nbsp;&nbsp;";
			}
		?>
        <{$vo.downclassname}>
        
        </td>
        <td align='center'><{$vo.path}></td>
        <td align='center'><{$vo.addtime|date="Y-m-d H:i:s",###}></td>
        <td align='center'>
        <if condition="$vo.isshow eq 1">
        <font color="green">是</font>
        <else />
        <font color="red">否</font>
        </if>
        </td>
       
        
        <td align='center'><a href="<{:U("Downclas/edit",array("id"=>$vo['id']))}>">修改</a> | 
        
         <if condition="$vo.isshow eq 1">
        <font color="green"><a href='<{:U("Downclas/isshow",array("id"=>$vo[id],"isshow"=>0))}>'>隐藏</a></font> |
        <else />
        <a style="color:red;" href='<{:U("Downclas/isshow",array("id"=>$vo[id],"isshow"=>1))}>'>显示</a> |
        </if>
        
        <a onclick="return ab()" class="" href="<{:U('Downclas/delete',array('id'=>$vo['id']) ) }>">删除</a> </td>
      </tr>
    </volist>
    </tbody>
  </table>
  <div class="p10">
        <div class="btn_wrap" style="z-index:999;">
            <div class="btn_wrap_pd"> 
           	 <div class="pages"><span class="ajaxpage"><{$page}></span></div>
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
