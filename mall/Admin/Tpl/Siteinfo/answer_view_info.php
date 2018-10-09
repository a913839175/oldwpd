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


<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<load href="__PUBLIC__/Js/ajaxpage.js" />
<load href="__PUBLIC__/Js/My97DatePicker/WdatePicker.js"/>

<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Js/ueditor/lang/zh-cn/zh-cn.js"></script>

<script language="javascript">
  //日期控件显示
  function isdate(){
    WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd HH:mm:ss'});
  }
</script>
</head>


<body class="J_scroll_fixed">
<div class="wrap J_check_wrap" style="height:600px;">
            
        <center>
          <div class="table_list"> 
              <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
                    <td  class="h_a"><b>题目信息——————<{$mess_info}></b></td>
                  </tr>
                  <foreach name="data" item="vo">
                     <tr>
                        <td><b>题目名称：</b><{$vo.topicName}></td>
                     </tr>
                      <tr>
                        <td><b>是否正确：</b>
                          <eq name="vo[isCorrect]" value="0"><font color=red>错误</font></eq>
                          <eq name="vo[isCorrect]" value="1"><font color=green>正确</font></eq>
                        </td>
                     </tr>
                     <tr>
                        <td><b>答案选项：</b><{$vo.topicAnswers}></td>
                     </tr>
                     <tr>
                        <td><b>客户所选答案：</b><{$vo.messAnswer}></td>
                     </tr>
                      <tr>
                        <td><b>正确答案：</b><{$vo.correctAnswer}></td>
                     </tr>
                     <tr>
                      <td><br></td>
                     </tr>
                  </foreach>
                
                
                
                <!--  <tr>
                    <td class="h_a">产品信息</td>
                  </tr>
                 <tr>
                    <td>123</td>
                 </tr>
                 <tr>
                    <td>123</td>
                 </tr>

                 <tr>
                    <td class="h_a">会员信息</td>
                  </tr>
                 <tr>
                    <td>123</td>
                 </tr>
                 <tr>
                    <td>123</td>
                 </tr> -->
              </table>
      </div>
      </center>   
        <div class="p10">
            <div class="btn_wrap" style="z-index:999;">
              <div class="btn_wrap_pd">  
                 <div class="pages"> 
            
           
            <span class="ajaxpage"> <{$page}></span> 
            </div>
                </div>
            </div>
          </div>
          
  
</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
</body>
</html>