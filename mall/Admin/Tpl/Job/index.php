<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>招聘列表</title>

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
		
		//下拉菜单改变事件
		$("#piliang").change(function(){
			var piliang = $("#piliang").val();
			var str = go();//获取选中的id
			if(piliang==1){
				//批量显示
				art.dialog({
					title:"提示",
					content:"确定要显示所选项吗？",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Job/plshow")}>',{str:str,ran:Math.random()},function(data){
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
				
				//批量隐藏
				art.dialog({
					title:"提示",
					content:"确定要隐藏所选项吗？",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Job/plhidden")}>',{str:str,ran:Math.random()},function(data){
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
				
			}else if(piliang==3){
				//批量删除
				art.dialog({
					title:"提示",
					content:"确定要删除所选项吗？删除后不可恢复！",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Job/pldelete")}>',{str:str,ran:Math.random()},function(data){
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
        <li><a href='<{:U("Job/index")}>'>招聘管理</a></li>
        <li><a href='<{:U("Job/index")}>'>招聘列表</a></li>
      </ul>
	</div>
<div class="mb10">
        <a href='<{:U("Job/add")}>' class="btn" title="添加招聘" target="_blank"><span class="add"></span>添加招聘</a>
  </div>

  <div class="h_a">搜索</div>
  <form name="form1" action="<{:U("Job/index")}>" method="post" >
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 搜索类型：
        <select name="searchtype">
          <option value="1" <if condition="$_GET['searchtype'] eq '1'">selected</if> >招聘职位</option>
        </select>
        关键字：
        <input type="text" class="input length_2" name="keyword" size='10' value="" placeholder="关键字">
        <button class="btn btn10">搜索</button>
        </span> </div>
    </div>
  </form>
  <form name="myform"  class="J_ajaxForm" action="" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="69" align="center"><input type="checkbox" name="checkall" id="checkall" />全选</td>
            <td width="87" align="center">ID</td>
            <td width="223" align="center">招聘职位</td>
            <td width="150" align="center" >语言</td>
            <td width="111" align="center">是否显示</td>
            <td width="93" align="center" >是否推荐</td>
            <td width="228" align="center" >添加时间</td>
            <td width="227" align="center" >结束时间</td>
            <td width="250" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="center"><input type="checkbox" name="check[]" value="<{$vo.id}>" /></td>
              <td align="center"><{$vo.id}></td>
              <td align="center"><{$vo.jobname}></td>
              <td align="center">
              		<foreach name="lang_data" item="v">
					     <if condition="$vo.lang eq $v[lang_val]"><{$v.lang_name}></if>
					</foreach>
              </td>
             
              <td align="center">
              	 <if condition="$vo.isshow eq 1">
                 	<font color="green">是</font>
                 <else />
                 	<font color="red">否</font>
                 </if>
              </td>
              <td align="center">
              	<if condition="$vo.isrecom eq 1">
               		<font color="green">是</font>
                <else />
                	<font color="red">否</font>
                </if>
              </td>
              
              <td align="center">
              	<{$vo.addtime|date="Y-m-d H:i:s",###}>
              </td>
              
              <td align="center">
              	<{$vo.endtime|date="Y-m-d H:i:s",###}>
              </td>
                
              <td width="250" align="center"><a href="<{:U("Job/edit",array("id"=>$vo['id']))}>">修改</a> | <a class="J_ajax_del" href="<{:U("Job/delete",array("id"=>$vo['id']))}>">删除</a> | 
              <if condition="$vo.isshow eq 1">
              <a href="<{:U("Job/isshow",array("id"=>$vo['id'],"isshow"=>"0"))}>">隐藏</a>
              <else />
              <a style="color:red;" href="<{:U("Job/isshow",array("id"=>$vo['id'],"isshow"=>"1"))}>">显示</a>
              </if> | 
              <if condition="$vo.isrecom eq 1">
              <a href="<{:U("Job/isrecom",array("id"=>$vo['id'],"isrecom"=>"0"))}>">取消推荐</a>
              <else />
              <a style="color:red;" href="<{:U("Job/isrecom",array("id"=>$vo['id'],"isrecom"=>"1"))}>">点击推荐</a>
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
        	<option value="1">批量显示</option>
            <option value="2">批量隐藏</option>
            <option value="3">批量删除</option>
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