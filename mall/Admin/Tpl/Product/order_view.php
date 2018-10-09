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
                  <td colspan="4" class="h_a">下单客户信息</td>
                  </tr>
                  <tr>
                  <td width="19%" height="30" bgcolor="#F6FAFD" align="right">真实姓名：</td>
                  <td width="26%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;"><{$data.name}></td>
                  <td width="18%" height="30" bgcolor="#F6FAFD" align="right">昵称：</td>
                  <td width="37%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;"><{$data.niname}></td>
                  </tr>
                  
                  <tr>
                  <td width="19%" height="30" bgcolor="#F6FAFD" align="right">手机：</td>
                  <td width="26%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;"><{$data.phone}></td>
                  <td width="18%" height="30" bgcolor="#F6FAFD" align="right">地址：</td>
                  <td width="37%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;"><{$data.address}></td>
                  </tr>
                  
                  <tr>
                  <td width="19%" height="30" bgcolor="#F6FAFD" align="right">下单时间：</td>
                  <td width="26%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;"><{$data.addtime|date="Y-m-d H:i:s",###}></td>
                  <td width="18%" height="30" bgcolor="#F6FAFD" align="right">语言：</td>
                  <td width="37%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;">
                    <foreach name="lang_data" item="vo">
                        <if condition="$data.lang eq $vo[lang_val]">
                           <option selected value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
                         <else />
                           <option value="<{$vo.lang_val}>"><{$vo.lang_name}></option>
                         </if>
                                      
                    </foreach>
                  </td>
                  </tr>
                  
                  
                 <!-- <tr>
                  <td width="19%" height="30" bgcolor="#F6FAFD" align="right">公司名称：</td>
                  <td width="26%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;"><{$data.company_name}></td>
                  <td width="18%" height="30" bgcolor="#F6FAFD" align="right">公司地址：</td>
                  <td width="37%" height="30" bgcolor="#FFFFFF" style="padding-left:10px;"><{$data.address}></td>
                  </tr>
                  
                  <tr>
                    <td width="19%" height="30" bgcolor="#F6FAFD" align="right" valign="top" style="padding-top:10px;">备注：</td>
                    <td height="30" colspan="3" bgcolor="#FFFFFF" valign="top" style="padding:10px;"><{$data.remank}></td>
                  </tr>
                  <tr>-->

                  </tr>
                 <!-- <tr>
                    <td  colspan="4" class="h_a">自定义字段：</td>
                  </tr>
                  <foreach name="zdydata" item="vo">
                      <{$vo}>
                  </foreach>-->
                  <tr>
                  <td  colspan="5" class="h_a">兑换产品列表：</td>
                  </tr>
                  
                  
                  
<!--                  <tr>-->
<!--                  <td width="19%" align="center" bgcolor="#F6FAFD" height="30">产品名称</td>-->
<!--                  <td width="26%" align="center" bgcolor="#F6FAFD" height="30">数量</td>-->
<!--                  <td width="18%" align="center" bgcolor="#F6FAFD" height="30">产品微币</td>-->
<!--                  <td width="37%" align="center" bgcolor="#F6FAFD" height="30">送货地址</td>-->
<!--                  </tr>-->
<!--                  -->
<!--                  <foreach name="datadetail" item="vo">-->
<!--                    <tr>-->
<!--                    <td width="19%" align="center" height="30" bgcolor="#FFFFFF"><{$vo.proname}></td>-->
<!--                    <td width="26%" align="center" height="30" bgcolor="#FFFFFF">1</td>-->
<!--                    <td width="18%" align="center" height="30" bgcolor="#FFFFFF"><{$vo.pro_jifen}></td>-->
<!--                    <td width="37%" align="center"  height="30" bgcolor="#FFFFFF"><{$data.address}></td>-->
<!--                  </tr>    -->
<!--                  </foreach>-->

                  <tr>
                      <td  align="center" bgcolor="#F6FAFD" height="30">产品名称</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30">数量</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30">规格</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30">样式</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30">产品微币</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30" style="min-width: 160px">送货地址</td>
                  </tr>

                  <foreach name="datadetail" item="vo">
                      <tr>
                          <td  align="center" height="30" bgcolor="#FFFFFF"><{$vo.proname}></td>
                          <td  align="center" height="30" bgcolor="#FFFFFF"><{$data.lang}></td>
                          <td  align="center" height="30" bgcolor="#FFFFFF"><{$data.pro_guige}></td>
                          <td  align="center" height="30" bgcolor="#FFFFFF"><{$data.pro_style}></td>
                          <td  align="center" height="30" bgcolor="#FFFFFF"><{$vo.pro_jifen}></td>
                          <td  align="center"  height="30" bgcolor="#FFFFFF" ><{$data.address}></td>
                      </tr>
                  </foreach>


<!--              </table>-->
<!--              <table width="100%" border="0" cellpadding="0" cellspacing="0" >-->
                  <td  class="h_a">收货人信息：</td>
                  <tr>
                      <td  align="center" bgcolor="#F6FAFD" height="30">收货人</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30">所在地区</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30">详细地址</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30">邮政编码</td>
                      <td  align="center" bgcolor="#F6FAFD" height="30" style="min-width: 160px">手机</td>
                      <if condition="$data['kuaidiname']!=''"><td  align="center" bgcolor="#F6FAFD" height="30">快递单</td></if>
                  </tr>

                  <tr>
                      <td  align="center" height="30" bgcolor="#FFFFFF"><{$con_msg.consignee}></td>
                      <td  align="center" height="30" bgcolor="#FFFFFF"><{$con_msg.address_code}></td>
                      <td  align="center" height="30" bgcolor="#FFFFFF"><{$con_msg.detailed_address}></td>
                      <td  align="center" height="30" bgcolor="#FFFFFF"><{$con_msg.postal_code}></td>
                      <td  align="center" height="30" bgcolor="#FFFFFF"><{$con_msg.con_phone}></td>
                       <if condition="$data['kuaidiname']!=''"><td  align="center" height="30" bgcolor="#FFFFFF"><{$data.kuaidiname}>:<{$data.kuaididan}></td></if>
                  </tr>
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