<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类设置</title>


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
<load href="__PUBLIC__/Css/cloud-zoom.css" />
<load href="__PUBLIC__/Js/cloud-zoom.1.0.2.min.js" />

<load href="__PUBLIC__/Js/ueditorMN/themes/default/css/umeditor.min.css" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.config.js" />
<load href="__PUBLIC__/Js/ueditorMN/umeditor.js" />
<load href="__PUBLIC__/Js/ueditorMN/lang/zh-cn/zh-cn.js" />




<style type="text/css">
  /* zoom-section */
  .zoom-section{clear:both;margin-top:20px;}
  *html .zoom-section{display:inline;clear:both;}

  .zoom-small-image{border:4px solid #CCC;float:left;margin-bottom:0px;}

  .keyword_style{
    width: 300px;
    height: 120px;
  }
  .csspage{
    font-size: 12px;
  }
</style>

<script type="text/javascript">
  $(function(){
    $(".delone").click(function(){
      if(confirm("确定删除吗？该操作将删除分类下的所有题目！")){
        return true;
      }else{
        return false;
      }
    })
  })
</script>




</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Siteinfo/index")}>'>系统设置</a></li>
        <li><a href="<{:U('Setting/setlang')}>">分类设置</a></li>
      </ul>
	</div>
  

  <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
           
            
            <td width="30%" align="left">分类名称</td>
            <td width="20%" align="center">排序</td>
            <td width="20%" align="center">是否显示</td>
            <td width="30%" align="center">操作</td>
           
          </tr>
        </thead>
        <tbody>
          <foreach name="data" item="vo">
            <tr>
              <td align="left"><{$vo.typeName}></td>
              <td align="center"><{$vo.orderBy}></td>
              <td align="center" >
                  <if condition="$vo.isShow eq 1">
                      <font color="green">是</font>
                  <else />
                      <font color="red">否</font>
                  </if>
              </td>
              <td align="center" ><a href="<{:U('Siteinfo/set_type',array('id'=>$vo[id],'act'=>'edit'))}>">修改</a> | <a class="delone" href="<{:U('Siteinfo/set_type',array('id'=>$vo[id],'act'=>'del'))}>">删除</a></td>
           </tr>
          </foreach>
        </tbody>
      </table>
      
        <div class="pages"> 
          <span class="ajaxpage"> <{$page}></span> 
        </div>
      </div>
   
    
    <!--添加-->
  <if condition="$Think.get.act eq '' OR $Think.get.act eq 'add'">
      <div class="h_a">添加分类</div>
      <form name="myform" action="<{:U("Siteinfo/set_type",array('act'=>'addsave'))}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
      <div class="table_full"> 
      <table width="100%" class="table_form contentWrap">
          <tbody>
                    <tr>
                      <th width="100">分类名称</th>
                      <td>
                          <input type="text" class="input topicName" name="typeName" size="40" value=""  placeholder="请输入分类名称"/>
                          <font color="red">*</font>
                      </td>

                    </tr>

                   

                 

                    <tr>
                      <th width="100">是否显示</th>
                      <td>
                          <select name="isShow">
                             <option value="1">是</option>
                             <option value="0">否</option>
                          </select>
                      </td>
                    </tr>

                    <tr>
                      <th width="100">排序</th>
                      <td>
                          <input type="text" class="input" name="orderBy" value="<{$orderbydata}>" size="40" placeholder="请输入排序" />
                          <font color="red">*</font>
                      </td>
                    </tr>

                   
                    </tr>
             

               


        </tbody></table>
      </div>
       <div class="btn_wrap" style="z-index:999;">
        <div class="btn_wrap_pd">             
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">保存</button>
          
        </div>
      </div>
    </form>
  </if>

  <!--修改-->
   <if condition="$Think.get.act eq 'edit'">
      <div class="h_a">修改分类</div>
      <form name="myform" action="<{:U("Siteinfo/set_type",array('act'=>'editsave'))}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
      <div class="table_full"> 
      <table width="100%" class="table_form contentWrap">
          <tbody>
                    <tr>
                      <th width="100">分类名称</th>
                      <td>
                          <input type="text" class="input topicName" name="typeName" size="40" value="<{$edit_data.typeName}>"  placeholder="请输入分类名称"/>
                          <font color="red">*</font>
                      </td>

                    </tr>

                   

                 

                    <tr>
                      <th width="100">是否显示</th>
                      <td>
                          <select name="isShow">
                             <option value="1" <eq name="edit_data.isShow" value="1">selected</eq> >是</option>
                             <option value="0" <eq name="edit_data.isShow" value="0">selected</eq> >否</option>
                          </select>
                      </td>
                    </tr>

                    <tr>
                      <th width="100">排序</th>
                      <td>
                          <input type="text" class="input" name="orderBy" value="<{$edit_data.orderBy}>" size="40" placeholder="请输入排序" />
                          <font color="red">*</font>
                      </td>
                    </tr>

                   
                    </tr>
             

               


        </tbody></table>
      </div>
       <div class="btn_wrap" style="z-index:999;">
        <div class="btn_wrap_pd">             
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">保存</button>
          <input type="hidden" name="editid" value="<{$edit_data.id}>" />
        </div>
      </div>
    </form>
  </if>
</div>
</body>
</html>

<script type="text/javascript">
    $(function(){
      $(".J_ajax_submit_btn").click(function(){
        if($(".lang_name").val()==""){
          alert("名称不能为空");
          $(".lang_name").focus();
          return false;
        }
        if($(".lang_val").val()==""){
          alert("值不能为空");
          $(".lang_val").focus();
          return false;
        }
        if($(".orderby").val()==""){
          alert("排序不能为空");
          $(".orderby").focus();
          return false;
        }
        
      })
    })
</script>
