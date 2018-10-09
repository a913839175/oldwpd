<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据库备份与还原</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<script language="javascript">
	var GV = {
    DIMAUB: "/NewsWeb2/",
    JS_ROOT: "__PUBLIC__/Js/",
    TOKEN: "{$__token__}"
};
</script>

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />


<load href="__PUBLIC__/Js/ueditorMN/themes/default/css/umeditor.min.css" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.config.js" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.min.js" />
<load href="__PUBLIC__/Js/ueditorMN/lang/zh-cn/zh-cn.js" />
</head>

<body class="J_scroll_fixed">
 <div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href="javascript:void(0)">系统设置</a></li>
        <li><a href="javascript:void(0)">数据备份</a></li>
      </ul>
	</div>
 
	<!-- 主页面开始 -->


<!-- 主体内容  -->
<div >

<!--  功能操作区域  -->
<!-- 功能操作区域结束 -->

<!-- 列表显示区域  -->
<div class="table_list" >
<table width="98%" border="0" align="center" cellpadding=0 cellspacing=0 class="list">
  <thead>
  	 <tr class="row" >
    <td height="20" align="center" >文件名</td>
    <td align="center" >备份时间</td>
    <td align="center" >文件大小</td>
    <td align="center" >管理选项</td>
  </tr>
  </thead>
 
  <?php
	function MyScandir($FilePath='./',$Order=0){
	$FilePath = opendir($FilePath);
	while (false !== ($filename = readdir($FilePath))) {
	  $FileAndFolderAyy[] = $filename;
	}
	$Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
	return $FileAndFolderAyy;
	}
	
	$FileArr = MyScandir('../databak/');
	foreach ($FileArr as $i => $n){
			if($n != 'PHPMyAdminInitialData.sql' && $i>1){
					$FileTime = date('Y-m-d H:i:s',filemtime('../databak/'.$n));
					$FileSize = filesize('../databak/' . $n)/1024;
	
					if ($FileSize < 1024){
							$FileSize = number_format($FileSize,2) . ' KB';
					} else {
							$FileSize = '<font color="#FF0000">' . number_format($FileSize/1024,2) . '</font> MB';
					}
					$sAS = "<a href=\"__APP__/Bak/index/Action/dow/file/" . $n . "\">下载</a> | ";
					$sAS .= "<a onClick=\"return confirm('确定将数据库还原到当前备份吗？');\" href=\"__APP__/Bak/index/Action/RL/File/$n\">还原</a> | ";
					$sAS .= "<a onClick=\"return confirm('确定删除该备份文件吗？');\" href=\"__APP__/Bak/index/Action/Del/File/$n\">删除</a>";
					echo "<tr class=\"row\">
					<td height=\"20\" align=\"center\">$n</td>
					<td align=\"center\">$FileTime</td>
					<td align=\"center\">$FileSize</td>
					<td align=\"center\">$sAS</td>
					</tr>";
					unset($FileTime,$FileSize,$sAS);
			}
	}
?>
 
 
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="6">
  <tr class="row">
                <td style="color:#333333;">
                  注：1、本操作只对数据库中当前网站数据(表前缀为 "<{:C(DB_PREFIX)}>" 的表)进行备份。如果您的数据库中有多个网站，其它站点不受影响。<br />
                        　　2、备份后的数据可以进行还原操作或通过 phpMyAdmin 导入。
                </td>
        </tr>
</table> 

</div>

</div>

<div class="p10">
  		<div class="btn_wrap" style="z-index:999;">
      		<div class="btn_wrap_pd">  
       			 <div class="pages"> 
        	<input type="button" value="备份数据库" class="btn btn_submit mr10 J_ajax_submit_btn" onClick="javascript:location.href='__URL__/index/Action/backup'">
       
        </div>
            </div>
        </div>
      </div>

</body>
</html>
