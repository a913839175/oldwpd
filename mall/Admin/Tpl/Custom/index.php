<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表</title>

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

</head>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Custom/index")}>'>自定义字段</a></li>
        <li><a href='<{:U("Custom/index")}>'>模块列表</a></li>
      </ul>
	</div>
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
    <thead>
      <tr>
        <td width="121" align="center">ID</td>
        <td width="230" align="left">模块名称</td>
        <td width="303"  align="center">数据表</td>
        <td width="303"  align="center">描述</td>
        <td width="392" align="center">管理操作</td>
      </tr>
    </thead>
    <tbody>
    	<!--新闻管理-->
    	<tr>
        	<td align="center">1</td>
            <td align="left">新闻管理</td>
            <td align="center"><{:C("DB_PREFIX")}>content</td>
            <td align="center">对新闻页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>1))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>1))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Content/preview')}>">预览模块</a>
            </td>
        </tr>
        
        
       <tr>
        	<td align="center">2</td>
            <td align="left">产品管理</td>
            <td align="center"><{:C("DB_PREFIX")}>product</td>
            <td align="center">对产品页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>2))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>2))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Product/preview')}>">预览模块</a>
            
            </td>
        </tr>
        
      
        <tr>
        	<td align="center">3</td>
            <td align="left">留言管理</td>
            <td align="center"><{:C("DB_PREFIX")}>guest</td>
            <td align="center">对留言页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>3))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>3))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Comments/preview')}>">预览模块</a>
            
            </td>
        </tr>
        
      
        <tr>
        	<td align="center">4</td>
            <td align="left">招聘管理</td>
            <td align="center"><{:C("DB_PREFIX")}>job</td>
            <td align="center">对招聘页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>4))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>4))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Job/preview')}>">预览模块</a>
            
            </td>
        </tr>
       
       
        <tr>
        	<td align="center">5</td>
            <td align="left">内容管理</td>
            <td align="center"><{:C("DB_PREFIX")}>pacontent</td>
            <td align="center">对内容页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>5))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>5))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Pacontent/preview')}>">预览模块</a>
            
            </td>
        </tr>
        
        <tr>
            <td align="center">6</td>
            <td align="left">订单管理</td>
            <td align="center"><{:C("DB_PREFIX")}>order</td>
            <td align="center">对订单页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>6))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>6))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Product/order_view')}>">预览模块</a>
            
            </td>
        </tr>
        
        <tr>
            <td align="center">7</td>
            <td align="left">下载管理</td>
            <td align="center"><{:C("DB_PREFIX")}>down</td>
            <td align="center">对下载页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>7))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>7))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Down/preview')}>">预览模块</a>
            
            </td>
        </tr>

        <tr>
            <td align="center">8</td>
            <td align="left">图册管理</td>
            <td align="center"><{:C("DB_PREFIX")}>atl</td>
            <td align="center">对图册页面新增字段</td>
            <td align="center">
            
            <a href="<{:U('Custom/add',array('id'=>8))}>">新增字段</a> | 
            <a href="<{:U('Custom/flist',array('id'=>8))}>">字段列表</a> |
            <a target="_blank" href="<{:U('Atlas/preview')}>">预览模块</a>
            
            </td>
        </tr>
        
    </tbody>
  </table>
  <div class="p10">
        <div class="btn_wrap" style="z-index:999;">
            <div class="btn_wrap_pd"> 
           	 <div class="pages"> <{$page}> </div>
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
