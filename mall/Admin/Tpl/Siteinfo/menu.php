<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站点菜单配置</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />


</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Siteinfo/index")}>'>系统设置</a></li>
        <li><a href="<{:U('Siteinfo/index')}>">基本信息</a></li>
        <li><a href="<{:U('Siteinfo/menu')}>">菜单设置</a></li>
      </ul>
	</div>
  <div class="h_a">菜单设置</div>
  <form name="myform" action="<{:U("Siteinfo/menu")}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">选择菜单</th>
          <td>
              <input type="checkbox" name="check[]" value="256" <if condition="256 & $sum">checked</if>  />系统设置
              <input type="checkbox" name="check[]" value="1" <if condition="1 & $sum">checked</if> />新闻中心
              <input type="checkbox" name="check[]" value="2" <if condition="2 & $sum">checked</if> />产品中心
              <input type="checkbox" name="check[]" value="4" <if condition="4 & $sum">checked</if> />留言管理
              <input type="checkbox" name="check[]" value="8" <if condition="8 & $sum">checked</if> />会员管理
              <input type="checkbox" name="check[]" value="16" <if condition="16 & $sum">checked</if> />招聘管理
              <input type="checkbox" name="check[]" value="32" <if condition="32 & $sum">checked</if> />下载管理
              <input type="checkbox" name="check[]" value="64" <if condition="64 & $sum">checked</if> />图册管理
              <input type="checkbox" name="check[]" value="128" <if condition="128 & $sum">checked</if> />内容管理
              <input type="checkbox" name="check[]" value="1024" <if condition="1024 & $sum">checked</if> />SEO管理
              <input type="checkbox" name="check[]" value="2048" <if condition="2048 & $sum">checked</if> />栏目管理
              <input type="checkbox" name="check[]" value="512" <if condition="512 & $sum">checked</if> />自定义字段
              <input type="checkbox" name="check[]" value="4096" <if condition="4096 & $sum">checked</if> />题库管理
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

