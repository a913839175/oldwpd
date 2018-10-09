<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>字段列表</title>

<script language="javascript">
  var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
    TOKEN: "{$__token__}"
};
</script>

<load href="__PUBLIC__/Css/admin_style.css"/>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<script language="javascript">
	function ab(){
		if(confirm("确定要删除吗？删除后不可恢复！")){
			return　true;
		}else{
			return false;
		}
    art.dialog({content:"确定要删除吗？删除后不可恢复"});
    return false;
	}
</script>

</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Custom/index")}>'>自定义字段</a></li>
        <li><a href="<{:U('Custom/index')}>">模块列表</a></li>
        <li><a href="javascript:void(0)">字段列表</a></li>
      </ul>
	</div>
  
  <div class="table_list">
  		<form action="<{:U('Custom/order_by_field')}>" method="post" name="form1">
	 	 <table width="100%" cellspacing="0" >
    <thead>
      <tr>
        <td width="121" align="center">排序</td>
        <td width="230" align="left">字段名</td>
        <td width="230" align="left">别名</td>
        <td width="230" align="left">所属模块/分类</td>
        <td width="230" align="left">字段类型</td>
        <td width="230" align="center">是否显示</td>
        <td width="303"  align="center">添加时间</td>
        <td width="392" align="center">管理操作</td>
      </tr>
    </thead>
    <tbody>
    	<volist name="data" id="vo">
    	<tr>
        	 <td width="121" align="center">
             
             	<input type="text" class="input orderclass" name="orderby[order][]" size="3" value="<{$vo.orderby}>" />
             	<input type="hidden" name="orderby[id][]" value="<{$vo.id}>">
             </td>
            <td width="230" align="left"><{$vo.name}></td>
            <td width="230" align="left"><{$vo.relname}></td>
            <td width="230" align="left"><{$vo.cname}></td>
            <td width="230" align="left">
            	<eq name="vo.type" value="0">Input文本框</eq>
                <eq name="vo.type" value="1">Option下拉框</eq>
                <eq name="vo.type" value="2">radio单选按钮</eq>
                <!--<eq name="vo.type" value="3">checkbox复选框</eq>-->
                <eq name="vo.type" value="4">多行文本框</eq>
                <eq name="vo.type" value="5">日期和时间</eq>
                <eq name="vo.type" value="6">编辑器</eq>
            </td>
            <td width="230" align="center">
            	<if condition="$vo.isshow eq 1">
                	<font color="green">是</font>
                <else />
                	<font color="red">否</font>
                </if>
            </td>
            <td width="303"  align="center"><{$vo.addtime|date="Y-m-d H:i:s",###}></td>
            <td width="392" align="center">
            	<a href="<{:U('Custom/edit',array('id'=>$vo[id],'modules'=>$vo[modules]))}>">修改</a> |
                <a onclick="return ab()" href="<{:U('Custom/delete',array('id'=>$vo[id],'modules'=>$vo[modules]))}>">删除</a> |
                
                <if condition="$vo.isshow eq 1">
                	<a href="<{:U('Custom/isshow',array('id'=>$vo[id],'modules'=>$vo[modules],'isshow'=>0))}>">隐藏</a>
                <else />
                	<a href="<{:U('Custom/isshow',array('id'=>$vo[id],'modules'=>$vo[modules],'isshow'=>1))}>"><font color="red">显示</font></a>
                </if>
            </td>
        </tr>
        </volist>
    </tbody>
  </table>
  	 	 <div class="p10">
        <div class="btn_wrap" style="z-index:999;">
      		<div class="btn_wrap_pd">  
       			 <div class="pages"> 
        
        &nbsp;&nbsp;&nbsp;&nbsp;
       
        	<button class="btn btn_submit mr10 J_ajax_submit_btn orderbtn" type="submit">排序</button>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        <{$page}> 
        </div>
            </div>
        </div>
      </div>
       </form>
  </div>
</div>
<script src="__PUBLIC__/Js/common.js?v"></script>

</body>
</html>

