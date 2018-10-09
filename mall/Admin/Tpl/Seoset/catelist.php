<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目列表</title>

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
        <li><a href="javascript:void(0)">栏目管理</a></li>
        <li><a href='<{:U('Seoset/catelist')}>'>栏目列表</a></li>
      </ul>
	</div>
<div class="mb10">
        <a href='<{:U("Seoset/cateadd")}>' class="btn" title="添加栏目" ><span class="add"></span>添加栏目</a>
  </div>

 
  
  
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            
            
            <td width="119" align="left">栏目名称</td>
            <td width="311" align="center">对应URL</td>
            <td width="187" align="center" >模块名</td>
            <td width="187" align="center">对应规则</td>
         
            
            <td width="264" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
             
             
              <td align="left">

              	
             	
                	
                    <?php
                    for($i=0;$i<$vo['count'];$i++){
						echo "&nbsp;&nbsp;&nbsp;";
					}
					?>
                    
                    <{$vo.catename}>
                    
                   

              </td>
              <td align="center"><{$vo.url}></td>
              <td align="center">
              	 <{$vo.module_name}>
              </td>
              <td align="center">
              	<{$vo.rules}>
              </td>
           
              
               <?php
               	$p = $_GET[p]; //获取分页
               	if($p==""){
               		$p=1;
               	}
               ?>
              <td width="264" align="center"><a href="<{:U('Seoset/cateedit',array('id'=>$vo['id'],'p'=>"$p"))}>">修改</a> | <a class="J_ajax_del1" href="<{:U("Seoset/catedel",array("id"=>$vo['id']))}>">删除</a> 
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
        <button class="btn btn_submit mr10 cache_html" type="button">生成静态配置文件</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn_submit mr10 sitemap" type="button">生成站点地图</button>
       <span class="ajaxpage"> <{$page}></span> 
        </div>
            </div>
        </div>
      </div>
    </div>
   
  
</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
</body>
</html>

<script type="text/javascript">
$(function(){
	$(".J_ajax_del1").click(function(){
		if(confirm("删除后不可恢复,是否确定删除？")){
			return true;
		}else{
			return false;
		}
	})

	//生成静态缓存文件
	$(".cache_html").click(function(){
		$.get("<{:U('Seoset/cache_html')}>",{},function(data){
			if(data==1){
					$(".cache_html").after('&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="green" >生成成功</font></span>');
				}else{
					$(".cache_html").after('&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red" >生成失败</font></span>');
				}
		});
	})

	//生成网站地图
	$(".sitemap").click(function(){
		$.get("<{:U('Seoset/sitemap')}>",{},function(data){
			if(data==1){
					$(".sitemap").after('&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="green" >生成成功</font></span>');
			}else{
					$(".sitemap").after('&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red" >生成失败</font></span>');
			}
		});
	})
})
	
</script>