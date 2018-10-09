<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看汇总</title>

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
			if(piliang==5){
				//批量删除
				art.dialog({
					title:"提示",
					content:"确定要删除所选项吗？删除后不可恢复！",
					icon:"question",
					lock:true,
					ok:function(){
					
						$.get('<{:U("Siteinfo/answer_view_pldel")}>',{str:str,ran:Math.random()},function(data){
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
					
					art.dialog.open("__APP__/Siteinfo/answer_view_info/id/"+id, {width: 800, height: 600,title:'查看详情',background:"#CCCCCC",opacity:0.8,lock:true,id:'abe',drag:false,resize:false,
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
        <li><a href='<{:U("Siteinfo/index")}>'>题库管理</a></li>
        <li><a href='<{:U("Siteinfo/answer_view")}>'>答题汇总</a></li>
      </ul>
	</div>
  
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="57" align="center"><input type="checkbox" name="checkall" id="checkall" />全选</td>
            <td width="50" align="left">编号</td>
            <td width="169" align="left">题目名称</td>
       
            <td width="134" align="center">所属产品</td>
            
            <td width="120" align="center" >所属会员</td>
            
            <td width="120" align="center" >提交时间</td>
            <td width="191" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <foreach name="data" item="vo">
            <tr>
              <td align="center"><input type="checkbox" name="check[]" value="<{$vo.id}>" /></td>
              <td align="left"><{$vo.id}></td>
              <td align="left"><{$vo.typeName}></td>
            
              <td align="center"><{$vo.proname}></td>
             
              <td align="center">
              	<{$vo.username}>
              </td>
               
            

              <td align="center">              
              	<{$vo.addtime|date="Y-m-d H:i:s",###}>
              </td>

              <td width="291" align="center"><a class="J_ajax_del" href="<{:U('Siteinfo/answer_view_del',array("id"=>$vo['id']))}>">删除</a> | 
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
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="btn btn_submit mr10 "  value="汇总统计" onclick="hz_tongji()" />
        </div>
            </div>
        </div>
      </div>
    </div>
    
    <!-- <div class="fixed_box" id="dialog" style="display:none">
    	<ul class="wenjuan_ul">
    		<li>
    			<span class="fl">调查问卷一</span>
    			<span class="fr">共有<b>10</b>人答题</span>
    		</li>
    		<li>
    			<span class="fl">调查问卷一</span>
    			<span class="fr">共有<b>10</b>人答题</span>
    		</li>
    		<li>
    			<span class="fl">调查问卷一</span>
    			<span class="fr">共有<b>10</b>人答题</span>
    		</li>
    	</ul>
    </div> -->
    <style>
    .fixed_box{
		position:absolute;
		left:50%;
		top:50%;
		height:398px; 
		width:598px;
		margin-left:-299px;
		margin-top:-199px;
		z-index: 99999;
		background:#fff;
		overflow: auto;
		
    }
    .aui_content{padding:0px !important;}
    .wenjuan_ul{
    	padding:10px;

    }
    .wenjuan_ul li{
    	height:35px;
    	line-height: 35px;
    	border-bottom:1px dashed #ddd;
    }
    .fl{
    	float: left;

    }
    .fr{
    	float: right;

    }
    .wenjuan_ul li span b{
    	font-weight: normal;
    	color:green;

    }
    </style>
  	

</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
</body> 
</html>
<script type="text/javascript">
	function hz_tongji(){

	
		$.get("<{:U('Siteinfo/answer_view_ajax')}>",{},function(data){
			var huozong_str = "";
			huozong_str +='<div class="fixed_box" id="dialog"><ul class="wenjuan_ul">';
			$.each(data,function(k,v){
				huozong_str +='<li><span class="fl">'+v.typeName+'</span><span class="fr">共有<b>'+v.count+'</b>人答题</span></li>';
				
			});
			huozong_str += '</ul></div>';
			art.dialog({
			title: '汇总统计',
		    content: huozong_str,
		    width:"600px",
		    height:"400px",
		    cancelValue: '关闭',
		    cancel: function () {}
		    });

		},'JSON');
		
		
		
	}
</script>