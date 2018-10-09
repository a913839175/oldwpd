<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
<style type="text/css">
.title1{
    font-weight: bold;
}
.jobList li{
    margin-bottom: 10px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

</style>
    <style type="text/css">
      .input_jobs {
width: 150px;
height: 20px;
border: solid 1px #CCCCCC;
vertical-align: middle;
}
.STYLE1 {
color: #000000;
font-weight: bold;
font-size: 13px;
}

.submit{
  display:inline-block;
  background:url(__PUBLIC__/Home/cn/images/submit_bg.png) no-repeat;
  height:25px;
  width:83px;
  border:none;
  cursor:pointer;
  margin-right:10px;
}
.reset{
  height:25px;
  width:83px;
  border:none;
  cursor:pointer;
  background:none;  
  color:#575440;
  border:1px solid #bbb;
  vertical-align: top;
}

.tijiao_box{

  margin-top: 10px;
text-align: center;
}
    </style>
</head>
<body >
<div id="wrap">
    <!--头部-->
    <include file="Public:header" sign="5" />
    <!--banner-->
    <include file="Public:flash1" />
    <!--主体内容-->
    <div id="main" class="w1050">
        <!--左侧-->
        <div class="main_left fl">
            <div class="left_title">
                <h2>Talent<em>人才中心</em></h2>
                <h3>center</h3>
            </div>
            <ul class="left_ul">
                <li><a href="<{:U('Job/index')}>">用人理念</a></li>
                <li><a href="<{:U('Job/jobinfo')}>">招聘职位</a></li>
                <li class="li_hover"><a href="<{:U('Job/resume')}>">在线应聘</a></li>
            </ul>
        </div>
        <!--右侧-->
        <div class="main_right fr">
            <div class="right_title">
                <h2>在线应聘</h2>
                <h3>Apply Online</h3>
            </div>
            <div class="right_box">
                <form action="<{:U('Job/resume')}>" method="post" onsubmit="return checkResume()" >
                <div class="main_right fr" style="width:697px; margin-right:0px; padding-top:5px;">
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="1">
                          <tbody><tr>
                            <td height="30" colspan="2"><span class="STYLE1">应聘职位：</span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2"><span class="STYLE3">您要应聘的职位：
                              <select name="jid">
                                <foreach name="data" item="vo">
                                    <option value="<{$vo.id}>"><{$vo.jobname}></option>
                                </foreach>
                              </select>
                              </span>

                          </td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2" ><span class="STYLE1">个人情况：</span></td>
                          </tr>
                          <tr>
                            <td width="49%" height="30" ><span class="STYLE3">姓　　名：
                              <input name="name" class="input_jobs"  value="">
                              </span></td>
                            <td width="51%" height="30" ><span class="STYLE3">性　　别：
                                <input type="radio" value="1" name="sex" checked />男&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="0" name="sex" />女
                                </span></td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">出生年月：
                              <input name="birthdate"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">身份证号：
                              <input name="idcard"  class="input_jobs" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">民　　族：
                              <input name="nation"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">政治面貌：
                              <input name="polface"  class="input_jobs" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">健康状况：
                              <input name="healthy"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">籍　　贯：
                              
                                <input name="hometown"  class="input_jobs" value="" />
                            </span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2" ><span class="STYLE3">家庭住址：
                              <input name="address"  class="input_jobs" style="width:493px;" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2"  class="STYLE1">专业情况：</td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">学　　历：
                              <input name="educa"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">毕业学校：
                              <input name="school"  class="input_jobs" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">专　　业：
                              <input name="discipline"  class="input_jobs" size="45" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">毕业时间：
                              <input name="gradtime"  class="input_jobs" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">外语水平：
                              <input name="englishlevel"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">专业认证：
                              <input name="certification"  class="input_jobs" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2" ><span class="STYLE3">计算机水平：
                              <input name="pclevel"  class="input_jobs" style="width:480px;" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2"  class="STYLE1">求职情况：</td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">期望月薪：
                                <input name="hopesalary"  class="input_jobs" value="" />
                            </span></td>
                            <td height="30" ><span class="STYLE3">合同期望：
                              <input name="contractexp"  class="input_jobs" value=""/>
                            </span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2"  style="padding-top:5px; padding-bottom:5px;"><span class="STYLE3">求职意向：
                              <textarea name="jobtarget" cols="40" rows="5"  style="width:493px; vertical-align:middle; border:solid 1px #CCCCCC;"></textarea>
                            </span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2"  style="padding-top:5px; padding-bottom:5px;"><span class="STYLE3">个人特长：
                              <textarea name="perstrengths" cols="40" rows="5"  style="width:493px; border:solid 1px #CCCCCC; vertical-align:middle;"></textarea>
                            </span></td>
                          </tr>
                          <tr>
                            <td height="30" colspan="2"  class="STYLE1">联系方式：</td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">电　　话：
                              <input name="phone"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">手　　机：
                              <input name="mobilephone"  class="input_jobs" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">邮　　箱：
                              <input name="email"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3">通讯地址：
                              <input name="mailaddress"  class="input_jobs" value="">
                              </span></td>
                          </tr>
                          <tr>
                            <td height="30" ><span class="STYLE3">邮政编码：
                              <input name="zipcode"  class="input_jobs" value="">
                              </span></td>
                            <td height="30" ><span class="STYLE3"></span></td>
                          </tr>
                          
                        </tbody></table>
                    
                    <div class="tijiao_box">
                        <input type="submit" class="submit" value="" />
                        <input type="reset" value="重 置" class="reset" />
                        <!-- <input type="hidden" name="jid" value="<{$data.id}>"  /> -->
                       
                    </div>

                </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
        <!--标语-->
        <div class="biaoyu">
            <img src="__PUBLIC__/Home/cn/images/ad_img.png" height="85" width="1050" />
        </div>
    </div>
    <!--底部内容-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
<script type="text/javascript">

  function checkResume(){
          var name=$("input[name='name']");
          var mobilephone=$("input[name='mobilephone']");
          if(name.val()==""){
            alert("姓名不能为空");
            name.focus();
            return false;
          }
          if(mobilephone.val()==""){
            alert("手机号码不能为空");
            mobilephone.focus();
            return false;
          }
          return true;
  }
</script>