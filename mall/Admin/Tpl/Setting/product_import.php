<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中英文复制</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/content_addtop.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<style>
	select{
		height: 25px;
	}
</style>
</head>
<body>
<div class="wrap">
	
    <div class="nav">
  <ul class="cc">
        <li><a href="javascript:void(0)">中英文复制</a></li>
      </ul>
	</div>
	<div class="h_a">中英文复制</div>
	<div class="table_full">
		<table width="100%">
			
			<tr>
				<th width="13%">产品批量复制</th>
				<td width="19%">
					导出的产品的语言：
					<select id="lan">
						<option value="1">中文</option>
						<option value="0">英文</option>
					</select>
				</td>
				<td width="18%">
					导入产品的语言：
					<select id="lan1">
						<option value="1">中文</option>
						<option value="0">英文</option>
					</select>
				</td>
				<td width="11%">

			
					<a class="btn productbtn" href="javascript:void(0)">提交</a>
					&nbsp;&nbsp;
					<font color="green" class="producthtml"></font>
				</td>
				
			</tr>
			<!--
			<tr>
				<th>产品批量导入手机站</th>
				<td>
					<a class="btn probtn" href="javascript:void(0)">提交</a>
					&nbsp;&nbsp;
					<font color="green" class="prohtml"></font>
					
				</td>
				<td><div class="fun_tips">执行提交后，可进行数据导入</div></td>
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
			-->
			
		</table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="6">
		  <tr class="row">
		                <td style="color:#333333;">
		                  注：1、本操作可进行中文->英文，英文->中文数据导入<br />
		                        　
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
		$(".productbtn").click(function(){
			var left_lan = $("#lan").val();
			var right_lan = $("#lan1").val();

			$.get("<{:U('Setting/productimport_ajax')}>",{left_lan:left_lan,right_lan:right_lan},function(data){
				$(".producthtml").html("导入成功，共导入"+data+"条数据");
			});
			
			
		})
		
	})
</script>