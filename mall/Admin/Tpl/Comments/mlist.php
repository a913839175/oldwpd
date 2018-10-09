<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言列表</title>
<script language="javascript">
	function del(){
		if(confirm("确定要删除吗?删除后不可恢复！")){
			return true;
		}else{
			return false;
		}
	}
</script>
<script language="javascript">
	var GV = {
    
    JS_ROOT: "__PUBLIC__/Js/",
    
};
</script>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/ajaxpage.js" />

<script language="javascript">
//全选、全不选
$(function(){
	$("#piliang").attr("disabled",true);
	$("#checkall").click(function(){
		if(this.checked){
			$("input[name='check[]']").each(function(){this.checked=true});
		}else{
			$("input[name='check[]']").each(function(){this.checked=false});
		}
		
		if($("input:checkbox[name='check[]']:checked").length > 0){
			$("#piliang").attr("disabled",false);
		}else{
			$("#piliang").attr("disabled",true);
		}
		
	})
	
	$("input[name='check[]']").click(function(){
		if($("input:checkbox[name='check[]']:checked").length > 0){
			$("#piliang").attr("disabled",false);
		}else{
			$("#piliang").attr("disabled",true);
		}
	})
	
	$("#piliang").change(function(){
		var str = go();
		var piliang = $("#piliang").val();
		if(piliang==1){
			//批量删除
				art.dialog({
					title:"提示",
					content:"确定要审核所选项吗？",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Comments/pladuit")}>',{str:str,ran:Math.random()},function(data){
							if(data==1){
								art.dialog({
								title:"提示",
								icon:"succeed",
								content:"操作成功",
								lock:true,
								time:1,
								fixed:true,
								ok:function(){
									 window.location.reload(); 
								},
								close:function(){
									window.location.reload();
								},
								});
							}else{
								art.dialog({
								title:"提示",
								icon:"error",
								content:"操作失败",
								lock:true,
								time:1,
								fixed:true,
								ok:function(){
									 window.location.reload(); 
								},
								close:function(){
									window.location.reload();
								},
								});
							}
						});
				},
					cancel:true,
					cancelVal:"取消",
					close:function(){
						document.getElementById("piliang").value=0;
					}
				});
		
		}else if(piliang==2){
			//批量删除
				art.dialog({
					title:"提示",
					content:"确定要删除所选项吗？删除后不可恢复！",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Comments/pldelete")}>',{str:str,ran:Math.random()},function(data){
							if(data==1){
								art.dialog({
								title:"提示",
								icon:"succeed",
								content:"操作成功",
								lock:true,
								time:1,
								fixed:true,
								ok:function(){
									 window.location.reload(); 
								},
								close:function(){
									window.location.reload();
								},
								});
							}else{
								art.dialog({
								title:"提示",
								icon:"error",
								content:"操作失败",
								lock:true,
								time:1,
								fixed:true,
								ok:function(){
									 window.location.reload(); 
								},
								close:function(){
									window.location.reload();
								},
								});
							}
						});
				},
					cancel:true,
					cancelVal:"取消",
					close:function(){
						document.getElementById("piliang").value=0;
					}
				});
		
		}else{
		
		}
	})
})

</script>

<script language="javascript">
	//获取被选中的value
	function go() {
            var str="";
            $("input[name='check[]']:checkbox").each(function(){ 
                if($(this).attr("checked")){
                    str += $(this).val()+","
                }
            })
            return str;
        }

</script>


</head>




<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Comments/mlist")}>'>留言管理</a></li>
        <li><a href='<{:U("Comments/mlist")}>'>留言列表</a></li>
      </ul>
	</div>
  <div class="h_a">搜索</div>
  <form name="searchform" action="<{:U("Comments/mlist")}>" method="post" >
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 搜索类型：
        <select name="searchtype">
          <option value="1" <if condition="$_GET['searchtype'] eq '1'">selected</if>>昵称</option>
          <option value="2" <if condition="$_GET['searchtype'] eq '2'">selected</if> >留言内容</option>
        </select>
        关键字：
        <input type="text" class="input length_2" name="keyword" size='10' value="" placeholder="关键字">
        <button class="btn">搜索</button>
        </span> </div>
    </div>
  </form>
  <form name="myform"  class="J_ajaxForm" action="" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
          	<td width="71" align="center"><input type="checkbox" id="checkall" name="checkall"/>全选</td>
			<td width="100">状态</td>
            
            <td width="121" align="center">昵称</td>
            <td width="322" >留言内容</td>
            <td width="247" >产品标题</td>
            <td width="200" >会员名称</td>
            <td width="305" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
             <td align="center"><input type="checkbox" name="check[]" value="<{$vo.id}>" /></td>
              <td>
              <if condition="$vo.audit eq 0">
              <b style="color:red;">[未审核]</b>
              <else />
              <b style="color:#69C">[已审核]</b>
              </if>
              </td>
             
              <td align="center"><{$vo.username}></td>
              <td ><{$vo.content|msubstr=0,35,'utf-8',false}><br/>
                <b>发表时间：<{$vo.addtime|date="Y-m-d H:i:s",###}>，IP：<{$vo.addip}></b>
              </td>
              <!-- <td ><{$vo.reply|msubstr=0,35,'utf-8',false}><br/>
              	<if condition="$vo.reply neq ''">
                	<b>回复时间：<{$vo.replytime|date="Y-m-d H:i:s",###}></b>
              </td>
                <else /></if> -->
               <td><{$vo.pro_name}></td>
               <td><{$vo.user_name}></td>
              <td width="124" align="center"><a class="J_ajax_del" href="<{:U("Comments/delete",array("id"=>$vo['id']))}>">删除</a> |  <a href="<{:U("Comments/replyguest",array("id"=>$vo['id']))}>">回复</a> | 
              <if condition="$vo.audit eq 1">
              <a href="<{:U("Comments/isaduit",array("id"=>$vo['id'],"aduit"=>"0"))}>">取消审核</a>
              <else />
              <a style="color:red;" href="<{:U("Comments/isaduit",array("id"=>$vo['id'],"aduit"=>"1"))}>">点击审核</a>
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
        批量操作<select name="piliang" id="piliang">
        	<option value="0"></option>
        	<option value="1">批量审核</option>
            <option value="2">批量删除</option>
        </select>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span class="ajaxpage"><{$page}></span> 
        </div>
            </div>
        </div>
      </div>
    </div>
    
  </form>
</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
</body>
</html>