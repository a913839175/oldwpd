<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批量导入</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/content_addtop.js" />
<load href="__PUBLIC__/Js/jquery.js" />

</head>
<body>
<div class="wrap">
	
    <div class="nav">
  <ul class="cc">
        <li><a href="javascript:void(0)">批量导入</a></li>
      </ul>
	</div>
	<div class="h_a">批量导入</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>新闻批量导入手机站</th>
				<td>
					<a class="btn newbtn" href="javascript:void(0)">提交</a>
					&nbsp;&nbsp;
					<font color="green" class="newhtml"></font>
				</td>
				<td><div class="fun_tips">执行提交后，可将所有pc站的新闻导入手机站</div></td>
			</tr>
			<tr>
				<th>产品批量导入手机站</th>
				<td>
					<a class="btn probtn" href="javascript:void(0)">提交</a>
					&nbsp;&nbsp;
					<font color="green" class="prohtml"></font>
					
				</td>
				<td><div class="fun_tips">执行提交后，可将所有pc站的产品导入手机站</div></td>
			</tr>
			<tr>
				<th>单页面批量导入手机站</th>
				<td>
					<a class="btn danbtn" href="javascript:void(0)">提交</a>
					&nbsp;&nbsp;
					<font color="green" class="danhtml"></font>
					
				</td>
				<td><div class="fun_tips">执行提交后，可将所有pc站的单页面导入手机站</div></td>
			</tr>

			
		</table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="6">
		  <tr class="row">
		                <td style="color:#333333;">
		                  注：1、本操作只对手机网站新闻、产品、单页面为空的数据进行同步<br />
		                        　
		                </td>
		        </tr>
		</table> 
	</div>

</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
</body>
</html>
<script type="text/javascript">
	$(function(){
		$(".newbtn").click(function(){
			$.get("<{:U('Setting/batchnews_ajax')}>",{},function(data){
				$(".newhtml").html("导入成功，共导入"+data+"条数据");
			});
		})
		$(".probtn").click(function(){
			$.get("<{:U('Setting/batchpro_ajax')}>",{},function(data){
				$(".prohtml").html("导入成功，共导入"+data+"条数据");
			});
		})
		$(".danbtn").click(function(){
			$.get("<{:U('Setting/batchdan_ajax')}>",{},function(data){
				$(".danhtml").html("导入成功，共导入"+data+"条数据");
			});
		})
	})
</script>