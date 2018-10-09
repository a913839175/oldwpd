<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目列表</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/content_addtop.js" />
<load href="__PUBLIC__/Js/jquery.js" />

</head>
<body>
<div class="wrap">
	
    <div class="nav">
  <ul class="cc">
        <li><a href="javascript:void(0)">更新缓存</a></li>
      </ul>
	</div>
	<div class="h_a">缓存更新</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>更新站点数据缓存</th>
				<td>
					<a class="btn" href="javascript:void(0)">提交</a>
					
				</td>
				<td><div class="fun_tips">录入、修改、删除数据时，可以进行缓存更新</div></td>
			</tr>
			
		</table>
	</div>

</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
</body>
</html>
<script type="text/javascript">
	$(function(){
		$(".btn").click(function(){
			$.get("<{:U('Seoset/ajax_cache')}>",{},function(data){
				if(data==1){
					$(".btn").after('&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="green" class="success">更新成功！</font></span>');
				}else{
					$(".btn").after('&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red" class="success">更新失败！</font></span>');
				}
			});
		})
	})
</script>