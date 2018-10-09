<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看简历</title>

<script language="javascript">
	var GV = {

    JS_ROOT: "__PUBLIC__/Js/",

};
</script>


<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />







</head>


<body class="J_scroll_fixed">

<div class="wrap J_check_wrap">
  
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Job/index")}>'>招聘管理</a></li>
        <li><a href="javascript:void(0)">查看简历</a></li>
      </ul>
	</div>
<style>


.input_jobs{ width:150px; height:20px; border:solid 1px #CCCCCC; vertical-align:middle;}

td{ padding-left:10px;}

.STYLE1 {
	color: #000000;
	font-weight: bold;
}
.STYLE3 {color: #666666}

</style>


              <center>
                <table width="80%" border="0" cellpadding="0" cellspacing="1">
                  <tbody><tr>
                    <td height="30" colspan="2"><span class="STYLE1">应聘职位：</span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2"><span class="STYLE3">您要应聘的职位：
                      <input type="text" name="应聘岗位" disabled="disabled" value="<{$data.jobname}>" class="input_jobs">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2" ><span class="STYLE1">个人情况：</span></td>
                  </tr>
                  <tr>
                    <td width="49%" height="30" ><span class="STYLE3">姓　　名：
                      <input name="姓名" class="input_jobs" disabled="disabled" value="<{$data.name}>">
                      </span></td>
                    <td width="51%" height="30" ><span class="STYLE3">性　　别：
                    	<if condition="$data.sex eq 1">
                        男
                        </if>
                        <if condition="$data.sex eq 0">
                        女
                        </if>
                     </span></td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">出生年月：
                      <input name="出生年月" disabled="disabled" class="input_jobs" value="<{$data.birthdate}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">身份证号：
                      <input name="身份证号" disabled="disabled" class="input_jobs" value="<{$data.idcard}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">民　　族：
                      <input name="民族" disabled="disabled" class="input_jobs" value="<{$data.nation}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">政治面貌：
                      <input name="政治面貌" disabled="disabled" class="input_jobs" value="<{$data.polface}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">健康状况：
                      <input name="健康状况" disabled="disabled" class="input_jobs" value="<{$data.healthy}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">籍　　贯：
                      
                        <input name="健康状况2" disabled="disabled" class="input_jobs" value="<{$data.hometown}>" />
                    </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2" ><span class="STYLE3">家庭住址：
                      <input name="家庭住址" disabled="disabled" class="input_jobs" style="width:450px;" value="<{$data.address}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2"  class="STYLE1">专业情况：</td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">学　　历：
                      <input name="学历" disabled="disabled" class="input_jobs" value="<{$data.educa}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">毕业学校：
                      <input name="毕业学校" disabled="disabled" class="input_jobs" value="<{$data.school}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">专　　业：
                      <input name="毕业学校" disabled="disabled" class="input_jobs" size="45" value="<{$data.discipline}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">毕业时间：
                      <input name="毕业时间" disabled="disabled" class="input_jobs" value="<{$data.gradtime}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">外语水平：
                      <input name="外语水平" disabled="disabled" class="input_jobs" value="<{$data.englishlevel}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">专业认证：
                      <input name="专业认证" disabled="disabled" class="input_jobs" value="<{$data.certification}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2" ><span class="STYLE3">计算机水平：
                      <input name="计算机水平" disabled="disabled" class="input_jobs" style="width:450px;" value="<{$data.pclevel}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2"  class="STYLE1">求职情况：</td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">期望月薪：
                        <input name="外语水平2" disabled="disabled" class="input_jobs" value="<{$data.hopesalary}>" />
                    </span></td>
                    <td height="30" ><span class="STYLE3">合同期望：
                      <input name="外语水平3" disabled="disabled" class="input_jobs" value="<{$data.contractexp}>"/>
                    </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2"  style="padding-top:5px; padding-bottom:5px;"><span class="STYLE3">求职意向：
                      <textarea name="求职意向" cols="40" rows="5" disabled="disabled" style="width:400px; vertical-align:middle; border:solid 1px #CCCCCC;"><{$data.jobtarget}></textarea>
                    </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2"  style="padding-top:5px; padding-bottom:5px;"><span class="STYLE3">个人特长：
                      <textarea name="个人特长" cols="40" rows="5" disabled="disabled" style="width:400px; border:solid 1px #CCCCCC; vertical-align:middle;"><{$data.perstrengths}></textarea>
                    </span></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2"  class="STYLE1">联系方式：</td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">电　　话：
                      <input name="电话" disabled="disabled" class="input_jobs" value="<{$data.phone}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">手　　机：
                      <input name="手机" disabled="disabled" class="input_jobs" value="<{$data.mobilephone}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">邮　　箱：
                      <input name="邮箱" disabled="disabled" class="input_jobs" value="<{$data.email}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3">通讯地址：
                      <input name="通讯地址" disabled="disabled" class="input_jobs" value="<{$data.mailaddress}>">
                      </span></td>
                  </tr>
                  <tr>
                    <td height="30" ><span class="STYLE3">邮政编码：
                      <input name="邮政编码" disabled="disabled" class="input_jobs" value="<{$data.zipcode}>">
                      </span></td>
                    <td height="30" ><span class="STYLE3"></span></td>
                  </tr>
                  
                </tbody></table>
              </center>
           
  
  
</div>
<script src="__PUBLIC__/Js/common.js?v"></script>
</body>
</html>