<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>语言设置</title>


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
      if(confirm("确定删除吗？")){
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
        <li><a href='<{:U("Setting/index")}>'>系统设置</a></li>
        <li><a href="<{:U('Setting/setlang')}>">语言设置</a></li>
      </ul>
	</div>
  

  <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
           
            
            <td width="30%" align="left">语言版本名称</td>
            <td width="20%" align="center">值</td>
            <td width="20%" align="center">是否显示</td>
            <td width="30%" align="center">操作</td>
           
          </tr>
        </thead>
        <tbody>
          <foreach name="data" item="vo">
            <tr>
              <td align="left"><{$vo.lang_name}></td>
              <td align="center"><{$vo.lang_val}></td>
              <td align="center" >
                  <if condition="$vo.isshow eq 1">
                      <font color="green">是</font>
                  <else />
                      <font color="red">否</font>
                  </if>
              </td>
              <td align="center" ><a href="<{:U('Setting/setlang',array('id'=>$vo[id],'act'=>'edit'))}>">修改</a> | <a class="delone" href="<{:U('Setting/setlang',array('id'=>$vo[id],'act'=>'del'))}>">删除</a></td>
           </tr>
          </foreach>
        </tbody>
      </table>
    </div>
    
    <!--添加-->
  <if condition="$Think.get.act eq '' OR $Think.get.act eq 'add'">
      <div class="h_a">添加语言版本</div>
      <form name="myform" action="<{:U("Setting/setlang",array('act'=>'addsave'))}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
      <div class="table_full"> 
      <table width="100%" class="table_form contentWrap">
          <tbody>
                    <tr>
                      <th width="100">语言版本名称</th>
                      <td>
                          <input type="text" class="input lang_name" name="lang_name" size="40" value=""  placeholder="请输入版本名称"/>
                      </td>
                    </tr>
                    
                    <tr>
                      <th width="100">值</th>
                      <td>
                          <input type="text" class="input lang_val" name="lang_val" value="" size="40" placeholder="请输入版本的值" />
                      </td>
                    </tr>

                    <tr>
                      <th width="100">是否显示</th>
                      <td>
                          <select name="isshow">
                             <option value="1">是</option>
                             <option value="0">否</option>
                          </select>
                      </td>
                    </tr>

                    <tr>
                      <th width="100">排序</th>
                      <td>
                          <input type="text" class="input orderby" name="orderby" value="<{$orderbydata}>" size="40" placeholder="请输入排序" />
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2" width="100"><font color="red">注：0、1、2为系统保留值，不可作为新版本的值</font></td>
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
      <div class="h_a">修改语言版本</div>
      <form name="myform" action="<{:U("Setting/setlang",array('act'=>'editsave'))}>" method="post" class="J_ajaxForm" enctype="multipart/form-data">
      <div class="table_full"> 
      <table width="100%" class="table_form contentWrap">
          <tbody>
              
                 
              
                    <tr>
                      <th width="100">语言版本名称</th>
                      <td>
                          <input type="text" class="input lang_name" name="lang_name" size="40" value="<{$editdata.lang_name}>"  placeholder="请输入版本名称"/>
                      </td>
                    </tr>
                    
                    <tr>
                      <th width="100">值</th>
                      <td>
                          <input type="text" class="input lang_val" name="lang_val" value="<{$editdata.lang_val}>" size="40" placeholder="请输入版本的值" />
                      </td>
                    </tr>

                    <tr>
                      <th width="100">是否显示</th>
                      <td>
                          <select name="isshow">
                             <option value="1" <if condition="$editdata.isshow eq 1">selected</if> >是</option>
                             <option value="0" <if condition="$editdata.isshow eq 0">selected</if> >否</option>
                          </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="100">排序</th>
                      <td>
                          <input type="text" class="input orderby" name="orderby" value="<{$editdata.orderby}>" size="40" placeholder="请输入排序" />
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" width="100"><font color="red">注：0、1、2为系统保留值，不可作为新版本的值</font></td>
                    </tr>
                    </tr>
             

               


        </tbody></table>
      </div>
       <div class="btn_wrap" style="z-index:999;">
        <div class="btn_wrap_pd">             
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">保存</button>
          <input type="hidden" name="editid" value="<{$editdata.id}>" />
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
