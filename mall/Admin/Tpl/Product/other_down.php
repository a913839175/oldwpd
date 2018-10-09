<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择相关下载</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />

<script language="javascript">
	var GV = {
    JS_ROOT: "__PUBLIC__/Js/",
};
</script>

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/ajaxpage.js" />

<script language="javascript">
	$(function(){
		 $("#queding").attr("disabled",true);
		$("#checkall").click(function(){
			if(this.checked){
				$("input[name='check[]']").each(function(){this.checked=true});
			}else{
				$("input[name='check[]']").each(function(){this.checked=false});
			}
			if($("input:checkbox[name='check[]']:checked").length > 0){
				$("#queding").attr("disabled",false);
			}else{
				$("#queding").attr("disabled",true);
			}
			
		})
		$("input[name='check[]']").click(function(){
			if($("input:checkbox[name='check[]']:checked").length > 0){
				$("#queding").attr("disabled",false);
			}else{
				$("#queding").attr("disabled",true);
			}
		})
		$("#queding").click(function(){
			var str = go1(); //获取选中的id
			var str2 = go2(); //获取选中的新闻名
			
			Wind.use('ajaxForm','artDialog','iframeTools', function () {
				

        
        var win = artDialog.open.origin;
        win.$("#xiangguan_down").append("<span>"+str2+"</span>");
        var parent_val = win.$("#otherdown").val();
        if(parent_val!=""){
          win.$("#otherdown").val(str+','+parent_val);
        }else{
          win.$("#otherdown").val(str+parent_val);
        }


				// win.document.getElementById('xiangguan_down').innerHTML=str2;
				// win.document.getElementById('otherdown').value=str;
				art.dialog.close();
			})
		})
	})
</script>

<script language="javascript">
	//获取被选中的value、dataid
	function go1() {
            var str="";
            $("input[name='check[]']:checkbox").each(function(){ 
                if($(this).attr("checked")){
                    str += $(this).attr("dataid")+","
                }
            })
            return str+"0";
        }
	function go2() {
            var str2="";
            $("input[name='check[]']:checkbox").each(function(){ 
                if($(this).attr("checked")){
                    str2 += $(this).val()+"<br>"
                }
            })
            return str2;
        }
</script>

<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />

</head>

<body>
	<div>
    
		<div style="width:20%; float:left;  height:750px;">
			<foreach name="dataclass" item="vo">
            	
                <?php
                	for($i=0;$i<$vo['count'];$i++){
							echo "&nbsp;&nbsp;&nbsp;";
						}
					
				?>
                <if condition="$vo.bool eq 0">
                	<a href="<{:U('Product/other_down',array('cid'=>$vo[id]))}>"><{$vo.downclassname}></a>
                <else />
                	<{$vo.downclassname}>
                </if>
             	 <br />
            </foreach>
   	    </div>
        <div style="width:0.2%; float:left; background:#999; height:750px;"></div>
        <div style="width:79.8%; float:left;  height:750px;">
        	<div align="left">
            	<form name="form1" action="<{:U('Product/other_down')}>" method="post">
                	<div class="search_type cc mb10">
                      <div class="mb10"> <span class="mr20"> 搜索类型：
                        <select name="searchtype">
                          <option value="1" <if condition="$_GET['searchtype'] eq '1'">selected</if> >文件名称</option>
                        </select>
                        关键字：
                        <input type="text" class="input length_2" name="keyword" size='10' value="" placeholder="关键字">
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn10">搜索</button>
                        </span> </div>
                    </div>
                </form>
                <div class="table_list">
                  <table width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <td width="107" align="center"><input type="checkbox" name="checkall" id="checkall" />全选</td>
                       
                        <td width="333" align="left">文件名称</td>
                        <td width="294" align="center">所属分类</td>
                        <td width="142" align="center" >是否显示</td>
                        <td width="250" align="center" >添加时间</td>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <volist name="datadown" id="vo">
                        <tr>
                          <td align="center"><input type="checkbox" name="check[]" value="<{$vo.filename}>" dataid="<{$vo.id}>" /></td>
                          <td align="left"><{$vo.filename}></td>
                          <td align="center"><{$vo.downclassname}></td>
                          <td align="center">
                             <if condition="$vo.isshow eq 1">
                                <font color="green">是</font>
                             <else />
                                <font color="red">否</font>
                             </if>
                          </td>
                          
                          
                          <td align="center">
                            <{$vo.addtime|date="Y-m-d H:i:s",###}>
                          </td>
                        </tr>
                      </volist>
                    </tbody>
                  </table>
      
   			    </div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div class="btn_wrap" style="z-index:999;">
          <div class="btn_wrap_pd">             
            
            <div class="pages">
            	<button class="btn btn_submit mr10 J_ajax_submit_btn" type="button"  name="submit1" id="queding">确定</button> 
           			&nbsp;&nbsp;&nbsp;&nbsp;
            	<span class="ajaxpage"><{$page}></span>
            </div>
          </div>
        </div>
   
    </div>
</body>
</html>
