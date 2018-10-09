<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看订单</title>

<script language="javascript">
	var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>
  <style>
  .J_check_wrap{position: relative;}
  .admin-houtai{position: absolute;background:rgba(0,0,0,0.7);z-index:10001;;top:0;left: 0;width: 100%;height: 100%;display:none;}
  .admin-fc{width: 500px;height: 164px;position: absolute;top: 50%;left: 50%;margin-top: -250px;margin-left: -250px;background: #fff}
  .admin_content{margin:0 auto;width: 250px;margin-top: 20px}
  .admin_content span{padding-right: 8px}
  .admin-true{margin-top: 20px;margin-left: 70px;background: #fff;border: none;border: 1px solid #666;}
  .admin-flase{margin-left: 38px; background: #fff;border: none;border: 1px solid #666;}

  </style>

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
			if(piliang==5){
				//批量删除
				art.dialog({
					title:"提示",
					content:"确定要删除所选项吗？删除后不可恢复！",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Product/order_pldelete")}>',{str:str,ran:Math.random()},function(data){
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

<script language="javascript">
	$(function(){
		$(".view").click(function(){
			var id=$(this).attr("dataid");
			Wind.use("artDialog", function () {
					
					art.dialog.open("__APP__/Product/order_view/id/"+id, {width: 800, height: 600,title:'订单查看',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe',drag:false,resize:false,
									cancelVal:"关闭",
									});
				});
		})	   
	})
</script>
</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Product/plist")}>'>产品中心</a></li>
        <li><a href="javascript:void(0)">查看订单</a></li>
        <li><a href='<{:U("Product/order_export")}>'>导出全部</a></li>
      </ul>
	</div>
  <form name="form2"  action="<{:U('Product/orderby')}>" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="57" align="center"><input type="checkbox" name="checkall" id="checkall" />全选</td>
            <td width="125" align="left">订单编号</td>
            <td width="94" align="center">姓名</td>
       		<td width="134" align="center">兑换物品</td>
       		<td width="134" align="center">兑换数量</td>
            <td width="134" align="center">联系电话</td>
            
            <!--<td width="120" align="center" >下单时间</td>-->
            <!--<td width="100" align="center" >支付状态</td>-->
            <td width="120" align="center" >兑换时间</td>
            <td width="120" align="center" >发货状态</td>
            <td width="120" align="center" >是否微购</td>
            <td width="191" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <foreach name="data" item="vo">
            <tr>
              <td align="center"><input type="checkbox" name="check[]" value="<{$vo.id}>" /></td>
              <td align="left"><{$vo.tradeid}></td>
              <td align="center"><{$vo.name}></td>
              <td align="center"><{$vo.proname}></td>
              <td align="center"><{$vo.lang}></td>
              <td align="center"><{$vo.phone}></td>
             
              <td align="center">
              	<{$vo.addtime|date="Y-m-d H:i:s",###}>
              </td>

              <td align="center">
              	<if condition="$vo.fahuo_status eq 1">
              		<font color="green">已发货</font>
              	<else />
					<a class="J_ajax_fahuo_button" href="__APP__/Product/order_fahuo/id/<{$vo['id']}>"><button>未发货</button></a>

              	</if>
              </td>

             <!-- <td align="center">
              	<if condition="$vo.paytime neq ''">
              		<{$vo.paytime|date="Y-m-d H:i:s",###}>
              	</if>
              	
              </td>-->
              <td align="center">
                  <if condition="$vo.tender_id neq ''">
                 	<font color="green">是</font>
                 <else />
                 	<font color="red">否</font>
                 </if></td>
              <td width="291" align="center"><a class="J_ajax_del" href="<{:U("Product/order_del",array("id"=>$vo['id']))}>">删除</a> | 
              <a href="javascript:void(0)" class="view" dataid="<{$vo.id}>">查看</a> 
              </td>
            </tr>
         </foreach>
        </tbody>
      </table>
      <div class="p10">
        <div class="btn_wrap" style="z-index:999;">
      		<div class="btn_wrap_pd">  
       			 <div class="pages"> 
        
     	 &nbsp;&nbsp;&nbsp;&nbsp;
       
        批量操作<select name="piliang" id="piliang">
        	<option value="0"></option>
            <option value="5">批量删除</option>
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

   <div class="admin-houtai">
        <div class="admin-fc">
             <div class="admin_content">
             	<span>快递名称</span><input id="kuaidiname" name="kuaidiname" type="text" />
             </div>
              <div class="admin_content">
         		<span>快递编号</span><input id="kuaididan" name="kuaididan" type="text" />
                        <input id="dizhi" name="dizhi" type="hidden" />
         	    <input type="button" id="submit" value="确定" class="admin-true"  />
         		<input type="button" id="quxiao"  value="取消" class="admin-flase" />
             </div>

        </div>
    </div>
<script src="__PUBLIC__/Js/common.js?v"></script>
<script>
	//fahuo_button
        $('#quxiao').on('click',function(){
    		$(".admin-houtai").hide();
    	})
	if ($('a.J_ajax_fahuo_button').length) {
		Wind.use('artDialog','iframeTools', function () {
			$('.J_ajax_fahuo_button').click(function (e) {
			e.preventDefault(); 
                               
				var $_this = this,$this = $($_this),href = $this.prop('href'),msg = $this.data('msg');
                        $(".admin-houtai").show();
                        $("#dizhi").val($_this);
//				art.dialog({
//					title: false,
//					icon: 'question',
//                                        content: '确定填好发货单了吗？',
//					follow: $_this,
//					close: function () {
//						$_this.focus();; //关闭时让触发弹窗的元素获取焦点
//						return true;
//					},
//					ok: function () {
//						$.getJSON(href).done(function (data) {
//							art.dialog({
//								title:"提示",
//								icon:"succeed",
//								content:"更改成功",
//								lock:true,
//								time:1,
//								fixed:true,
//								ok:function(){
//									window.location.reload();
//								},
//								close:function(){
//									window.location.reload();
//								},
//							});
//
//
//
//						});
//					},
//					cancelVal: '关闭',
//					cancel: true
//				});
			});
                   $("#submit").click(function(e){
                       e.preventDefault(); 
                       var $_this=$("#dizhi").val(),kuaidiname=$("#kuaidiname").val(),kuaididan=$("#kuaididan").val();
                       if( kuaidiname !=""){
                           if(kuaidiname.match(/[^\u4e00-\u9fa5]/)){
                        alert('输入有误,快递名称请输入中文');
                        return false;
                        } 
                       }else{
                        alert("快递名称不能为空");
                        return false;
                       }
                     if(kuaididan !=""){
                         if(isNaN(kuaididan)){
                             alert("快递单请输入纯数字");
                             return false;
                         }
                     }else{
                         alert("快递单不能为空");
                         return false;
                     }
                      $_this=$_this+"/kuaidiname/"+kuaidiname+"/kuaididan/"+kuaididan;
                      console.log($_this);
     
                      
                      $.ajax({
                            type:"get",
                            url:$_this,
                            data:{"kuaidiname":kuaidiname,"kuaididan":kuaididan},
                            dataType:"json",
                            success:function(data){
                                    alert("提交成功");
                                    window.location.reload();
                            },
                            error:function(data){
                                    alert("提交失败");
                                    window.location.reload();
                            }
                            });
                      
                      
                      
                      
                      
                   });
		});
	}
</script>
</body>
</html>