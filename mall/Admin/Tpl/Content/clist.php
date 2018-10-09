<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻列表</title>

<script language="javascript">
	var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
   
};
</script>

<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />


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
					
						$.get('<{:U("Content/plshow")}>',{str:str,ran:Math.random()},function(data){
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
					
						$.get('<{:U("Content/plhidden")}>',{str:str,ran:Math.random()},function(data){
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
				//批量移动
				Wind.use("artDialog", function () {
					
					art.dialog.open("__APP__/Content/list_class/str/"+str, {width: 320, height: 300,title:'移动新闻至',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe',drag:false,resize:false,
									cancel:function(){
										location.href='<{:U("Content/clist")}>';
									},
									cancelVal:"关闭",
									});
				});
				
			}else if(piliang==4){
				//批量复制
				Wind.use("artDialog", function () {
					
					art.dialog.open("__APP__/Content/list_class2/str/"+str, {width: 320, height: 300,title:'复制新闻至',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe',drag:false,resize:false,
									cancel:function(){
										location.href='<{:U("Content/clist")}>';
									},
									cancelVal:"关闭",
									});
				});
				
			}else if(piliang==5){
				//批量删除
				art.dialog({
					title:"提示",
					content:"确定要删除所选项吗？删除后不可恢复！",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Content/pldelete")}>',{str:str,ran:Math.random()},function(data){
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

<load file="__PUBLIC__/Js/ajaxpage.js" />

</head>


<body class="J_scroll_fixed">

<div class="wrap J_check_wrap">
  
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Content/clist")}>'>新闻中心</a></li>
        <li><a href='<{:U("Content/clist")}>'>新闻管理</a></li>
      </ul>
	</div>
<div class="mb10">
        <a href='<{:U("Content/add")}>' class="btn" title="添加新闻" target="_blank"><span class="add"></span>添加新闻</a>
  </div>

  <div class="h_a">搜索</div>
  <form name="form1" action="<{:U("Content/clist")}>" method="post" >
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 搜索类型：
        <select name="searchtype">
          <option value="1" <if condition="$_GET['searchtype'] eq '1'">selected</if> >新闻标题</option>
          <option value="2" <if condition="$_GET['searchtype'] eq '2'">selected</if> >新闻内容</option>
        </select>
        关键字：
        <input type="text" class="input length_2" name="keyword" size='10' value="" placeholder="关键字">
       
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        是否显示：
        <select name="isshow">
        	<option value="2">全部</option>
            <option value="1">是</option>
            <option value="0">否</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        是否推荐
        <select name="isrecom">
        	<option value="2">全部</option>
            <option value="1">是</option>
            <option value="0">否</option>
        </select>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        所属分类
        <select  name="cid" id="cid">
        	<option value="0">全部</option>
            <volist name="dat" id="vo">
            <option value="<{$vo.id}>">
            <?php
            	for($i=0;$i<$vo['count'];$i++){
					echo "&nbsp;&nbsp;&nbsp;";
				}
			?>
            <{$vo.conclassname}>
            
            </option>
            </volist>
        </select>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        语言
        <select name="lang">
        	<option value="2">全部</option>
           	<foreach name="lang_data" item="vo">
			    <option value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
			</foreach>
        </select>
        
        <button class="btn btn10">搜索</button>
        </span> </div>
    </div>
  </form>
  <form name="form2"  action="<{:U('Content/orderby')}>" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="55" align="center"><input type="checkbox" name="checkall" id="checkall" /></td>
            <td width="69" align="left">排序</td>
            <td width="319" align="left">新闻标题</td>
            <td width="211" align="center">所属分类</td>
            <td width="87" align="center" >是否显示</td>
            <td width="87" align="center">是否推荐</td>
            <td width="87" align="center">是否同步</td>
            <td width="90" align="center" >语言</td>
            <td width="256" align="center" >添加时间</td>
            <td width="264" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="center"><input type="checkbox" name="check[]" value="<{$vo.id}>" /></td>
              <td align="left"><input type="text" class="input orderclass" name="orderby[order][]" size="3" value="<{$vo.orderby}>" />
              <input type="hidden" name="orderby[id][]" value="<{$vo.id}>"></td>
              <td align="left"><{$vo.title}></td>
              <td align="center"><{$vo.conclassname}></td>
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
              	<if condition="$vo.sjprocon neq ''">
               		<font color="green">是</font>
                <else />
                	<font color="red">否</font>
                </if>
              </td>
              <td align="center">
            
            	<foreach name="lang_data" item="v">
				      <if condition="$vo.lang eq $v[lang_val]"><{$v.lang_name}></if>
				</foreach>

              </td>
              <td align="center">
              	<{$vo.addtime|date="Y-m-d H:i:s",###}>
              </td>
               <?php
               	$p = $_GET[p]; //获取分页
               	if($p==""){
               		$p=1;
               	}
               ?>
              <td width="264" align="center"><a href="<{:U('Content/edit',array('id'=>$vo['id'],'p'=>"$p"))}>">修改</a> | <a class="J_ajax_del" href="<{:U("Content/delete",array("id"=>$vo['id']))}>">删除</a> | 
              <if condition="$vo.isshow eq 1">
              <a href="<{:U("Content/isshow",array("id"=>$vo['id'],"isshow"=>"0"))}>">隐藏</a>
              <else />
              <a style="color:red;" href="<{:U("Content/isshow",array("id"=>$vo['id'],"isshow"=>"1"))}>">显示</a>
              </if> | 
              <if condition="$vo.isrecom eq 1">
              <a href="<{:U("Content/isrecom",array("id"=>$vo['id'],"isrecom"=>"0"))}>">取消推荐</a>
              <else />
              <a style="color:red;" href="<{:U("Content/isrecom",array("id"=>$vo['id'],"isrecom"=>"1"))}>">点击推荐</a>
              </if>
              </td>
            </tr>
          </volist>
        </tbody>
      </table>
      
      <div class="p10">
        <div class="btn_wrap" style="z-index:999;">
      		<div class="btn_wrap_pd">  
       			 <div class="pages" > 
        
        &nbsp;&nbsp;&nbsp;&nbsp;
       
        	<button class="btn btn_submit mr10 orderbtn" type="submit">排序</button>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        批量操作<select name="piliang" id="piliang">
        	<option value="0"></option>
        	<option value="1">批量显示</option>
            <option value="2">批量隐藏</option>
            <option value="3">批量移动</option>
            <option value="4">批量复制</option>
            <option value="5">批量删除</option>
        </select>
        
        
       <span class="ajaxpage"> <{$page}></span> 
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