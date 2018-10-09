<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品列表</title>

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
					
						$.get('<{:U("Product/plshow")}>',{str:str,ran:Math.random()},function(data){
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
					
						$.get('<{:U("Product/plhidden")}>',{str:str,ran:Math.random()},function(data){
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
					
					art.dialog.open("__APP__/Product/list_class/str/"+str, {width: 320, height: 300,title:'移动产品至',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe',drag:false,resize:false,
									cancel:function(){
										location.href='<{:U("Product/plist")}>';
									},
									cancelVal:"关闭",
									});
				});
				
			}else if(piliang==4){
				//批量复制
				Wind.use("artDialog", function () {
					
					art.dialog.open("__APP__/Product/list_class2/str/"+str, {width: 320, height: 300,title:'复制产品至',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe',drag:false,resize:false,
									cancel:function(){
										location.href='<{:U("Product/plist")}>';
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
					
						$.get('<{:U("Product/pldelete")}>',{str:str,ran:Math.random()},function(data){
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
				
			}else if(piliang==6){
				//批量翻译
				art.dialog({
					title:"提示",
					content:"翻译只能将中文翻译为英文<br />自动翻译的项为：标题、简介、内容，确定要翻译所选项吗？",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Product/plTrans")}>',{str:str,ran:Math.random()},function(data){
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
				
			}else if(piliang==4){
				//批量复制
				Wind.use("artDialog", function () {
					
					art.dialog.open("__APP__/Product/list_class2/str/"+str, {width: 320, height: 300,title:'复制产品至',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe',drag:false,resize:false,
									cancel:function(){
										location.href='<{:U("Product/plist")}>';
									},
									cancelVal:"关闭",
									});
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

<style>
	.into4{
		font-size:12px;
		color:#999;
	}
</style>
<script language="javascript">
	//快速编辑
	$(function(){
		$("a[class2='kuaisu']").hide();
		$(".pronamespan").hover(function(){						  
			var dataid = $(this).attr("dataid");
			$(".pronamehidden_"+dataid).addClass("into4");
			$(".pronamehidden_"+dataid).stop().show();	  
		},function(){

			var dataid = $(this).attr("dataid");
			$(".pronamehidden_"+dataid).removeClass("into4");
			$(".pronamehidden_"+dataid).stop().hide();
		})
		
		$("a[class2='kuaisu']").click(function(){
			var id = $(this).attr("dataid");
			var p = $(this).attr("pageid");  //分页id
			Wind.use('artDialog','iframeTools', function () {
					
					art.dialog.open("__APP__/Product/quickedit/id/"+id+"/p/"+p, {width: 320, height: 80,title:'快速编辑产品名称',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe2',drag:false,resize:false,
									cancel:function(){
										location.href='<{:U("Product/plist")}>';
									},
									cancelVal:"关闭",
									});
			});
		})
		
		
	})
</script>
<script language="javascript">
	//相关图片
	$(function(){
		$(".otherimg").click(function(){
		var id = $(this).attr("dataid"); //产品id
		var p = $(this).attr("pageid");  //分页id
			Wind.use('artDialog','iframeTools', function () {
				art.dialog.open('__APP__/Product/otherimg/proid/'+id+'/p/'+p+'', { height: '500px', width: '900px', title: "产品相关图片", lock: true,fixed:true}, false);//打开子窗体
			})
		})
	})
	
</script>
</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Product/plist")}>'>产品中心</a></li>
        <li><a href='<{:U("Product/plist")}>'>产品管理</a></li>
      </ul>
	</div>
<div class="mb10">
        <a href='<{:U("Product/add")}>' class="btn" title="添加产品" target="_blank"><span class="add"></span>添加产品</a>
  </div>

  <div class="h_a">搜索</div>
  <form name="form1" action="<{:U("Product/plist")}>" method="post" >
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 搜索类型：
        <select name="searchtype">
          <option value="1" <if condition="$_GET['searchtype'] eq '1'">selected</if> >产品名称</option>
          <option value="2" <if condition="$_GET['searchtype'] eq '2'">selected</if> >产品内容</option>
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
            <{$vo.proclassname}>
            
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        是否微购
        <select name="income_front">
        	<option value="2">全部</option>
            <option value="1">是</option>
            <option value="0">否</option>
        </select>
        <button class="btn btn10">搜索</button>
        </span> </div>
    </div>
  </form>
  <form name="form2"  action="<{:U('Product/orderby')}>" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="55" align="center"><input type="checkbox" name="checkall" id="checkall" />全选</td>
            <td width="69" align="left">排序</td>
            <td width="319" align="left">产品名称</td>
            <td width="211" align="center">所属分类</td>
            <td width="211" align="center">是否微购</td>
            <td width="87" align="center" >是否显示</td>
            <td width="87" align="center">是否推荐</td>
            <td width="87" align="center">是否同步</td>
            <td width="90" align="center" >语言</td>
            <td width="256" align="center" >添加时间</td>
            <td width="100" align="center" >相关图片</td>
            <td width="264" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="center"><input type="checkbox" name="check[]" value="<{$vo.id}>" /></td>
                <td align="left"><input type="text" class="input orderclass" name="orderby[order][]" size="3" value="<{$vo.orderby}>" />
              <input type="hidden" name="orderby[id][]" value="<{$vo.id}>"></td>
              <td align="left">
              	<?php
                	$p = $_GET['p'];
                	if($p=="")$p=1;
                ?>
             <span class="pronamespan" dataid="<{$vo.id}>"> 
              <a href="javascript:void(0)" class="pronamehover"><{$vo.proname}></a>
              <a href="javascript:void(0)" class="pronamehidden_<{$vo.id}>" class2="kuaisu" dataid="<{$vo.id}>" pageid="<{$p}>">快速编辑</a>
             </span>
              </td>
              <td align="center"><{$vo.proclassname}></td>
              <td align="center">
                  <if condition="$vo.income_front eq 1">
                 	<font color="green">是</font>
                 <else />
                 	<font color="red">否</font>
                 </if></td>
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
              
              <td align="center">
              	<a href="javascript:void(0)" class="otherimg" dataid="<{$vo.id}>" pageid="<{$p}>">
              		<if condition="$vo.is_other_img eq 0">
              			<font color="">未关联</font>
              		<else />
              			<font color="green">已关联</font>
              		</if>
              	</a>
              </td>

               
              <td width="263" align="center"><a href="<{:U("Product/edit",array("id"=>$vo['id'],"p"=>$p))}>">修改</a> | <a class="J_ajax_del" href="<{:U("Product/delete",array("id"=>$vo['id']))}>">删除</a> | 
              <if condition="$vo.isshow eq 1">
              <a href="<{:U("Product/isshow",array("id"=>$vo['id'],"isshow"=>"0"))}>">隐藏</a>
              <else />
              <a style="color:red;" href="<{:U("Product/isshow",array("id"=>$vo['id'],"isshow"=>"1"))}>">显示</a>
              </if> | 
              <if condition="$vo.isrecom eq 1">
              <a href="<{:U("Product/isrecom",array("id"=>$vo['id'],"isrecom"=>"0"))}>">取推</a>
              <else />
              <a style="color:red;" href="<{:U("Product/isrecom",array("id"=>$vo['id'],"isrecom"=>"1"))}>">推荐</a>
              </if>
              <if condition="$vo.pro_jingxuan eq 1">
              <a href="<{:U("Product/jingxuan",array("id"=>$vo['id'],"pro_jingxuan"=>"0"))}>">取消</a>
              <else />
              <a style="color:red;" href="<{:U("Product/jingxuan",array("id"=>$vo['id'],"pro_jingxuan"=>"1"))}>">微购</a>
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
            <!-- <option value="6">批量翻译</option> -->

        </select>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
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