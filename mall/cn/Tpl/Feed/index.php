<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>

<body>

<div>
<!--这是头部-->
<include file="Public:header" sign="8" />
     
<!--这是banner --> 
<include file="Public:flash1" />

<!--这是内页主体    -->
     <div class="ny_main">
            <div class="ny_main_contant">
                    <div class="main_pro_title">
                           <p>预约留言</p>
                           <img src="__PUBLIC__/Home/images/main_pro_title.png"/>
                     </div>
                     
                     <div class="ny_contant">
                             <include file="Public:left" />
                             
                             
                             <div class="ny_fr">
                                   <div class="ny_about">
                                        <form action="<{:U('Feed/index')}>" method="post" name="myform" onSubmit="return checkmessage();">
                            <table class="feedback_table" border="0" cellpadding="0" cellspacing="0">         
                                <tr>
                                  <td width="97" align="left" class="tr1_td1">&nbsp;&nbsp;姓名：</td>
                                  <td width="503" align="left" class="tr1_td2">
                                      <label>
                                        <input type="text" name="username" />
                                      </label><span class="STYLE1">*</span>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="tr2_td1" align="left" valign="middle">&nbsp;&nbsp;性别：</td>
                                  <td class="tr2_td2" align="left" valign="middle"><label>
                                    <select name="sex">
                                      <option value="1" selected="selected">男</option>
                                      <option value="0">女</option>
                                    </select>
                                  </label> <span class="STYLE1">*</span></td>
                                </tr>
                                <tr>
                                  <td class="tr2_td1" align="left" valign="middle">&nbsp;&nbsp;城市：</td>
                                  <td class="tr2_td2" align="left" valign="middle"><label>
                                    <input type="text" name="gus_chengshi" />
                                  </label>
                                    <span class="STYLE1">*</span></td>
                                </tr>
                                <tr>
                                  <td class="tr2_td1" align="left" valign="middle">&nbsp;&nbsp;详细地：</td>
                                  <td class="tr2_td2" align="left" valign="middle"><label>
                                    <input type="text" name="gus_xiangxidi" />
                                  </label>
                                    <span class="STYLE1">*</span></td>
                                </tr>
                                <tr>
                                  <td class="tr2_td1" align="left" valign="middle">&nbsp;&nbsp;电话：</td>
                                  <td class="tr2_td2" align="left" valign="middle"><label>
                                    <input type="text" name="gus_dianhua" />
                                  </label>
                                    <span class="STYLE1">*</span></td>
                                </tr>
                                <tr>
                                  <td class="tr2_td1" align="left" valign="middle">&nbsp;&nbsp;传真：</td>
                                  <td class="tr2_td2" align="left" valign="middle"><label>
                                    <input type="text" name="gus_chuanzhen" />
                                  </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td class="tr2_td1" align="left" valign="middle">&nbsp;&nbsp;E -mail：</td>
                                  <td class="tr2_td2" align="left" valign="middle"><label>
                                    <input type="text" name="email" />
                                  </label></td>
                                </tr>
                                <tr>
                                  <td class="tr2_td1" align="left" valign="middle">&nbsp;&nbsp;备注：</td>
                                  <td class="tr2_td2" align="left" valign="middle"><label>
                                    <textarea name="content" cols="50" rows="7"></textarea>
                                  </label></td>
                                </tr>
                                <tr>
                                  <td class="tr3_td1">&nbsp;</td>
                                  <td class="tr3_td2" align="left" valign="middle">
                                  <table width="300" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" valign="middle"><label>
                                        <input type="submit" name="submit" value="提交" />
                                      </label></td>
                                      <td align="center" valign="middle"><label>
                                        <input type="reset" name="reset" value="重置" />
                                      </label></td>
                                    </tr>
                                  </table>
                                  </td>
                                </tr>       
                            </table>
                            </form>
                            <script type="text/javascript">
                        function checkmessage(){
                          var myform = document.myform;
                          if(myform.username.value==""){
                            alert("姓名不能为空");
                            myform.username.focus();
                            return false;
                          }
                          if(myform.gus_chengshi.value==""){
                            alert("城市不能为空");
                            myform.gus_chengshi.focus();
                            return false;
                          }

                          if(myform.gus_xiangxidi.value==""){
                            alert("详细地不能为空");
                            myform.gus_xiangxidi.focus();
                            return false;
                          }
                          if(myform.gus_dianhua.value==""){
                            alert("电话不能为空");
                            myform.gus_dianhua.focus();
                            return false;
                          }
                        }
                      </script>
                                    </div>
                             </div>
                     </div>
            </div>
     </div>
<!--
这是底部-->
<include file="Public:footer" />
</div>


</body>
</html>
