<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员添加</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />
<script type="text/javascript">
  $(function(){
    $("#btn10").click(function(){
        var nicname = $("#nicname");
        var logname = $("#logname");
        var logpwd = $("#logpwd");
        var relogpwd = $("#relogpwd");
        var othertext = $("#othertext");
        if(nicname.val()==""){
          alert("昵称不能为空");
          nicname.focus();
        }else if(logname.val()==""){
          alert("账号不能为空");
          logname.focus();
        }else if(logpwd.val()==""){
          alert("密码不能为空");
          logpwd.focus();
        }else if(relogpwd.val()==""){
          alert("确认密码不能为空");
          relogpwd.focus();
        }else if(logpwd.val()!=relogpwd.val()){
          alert("密码不等于确认密码！");
          logpwd.focus();
        }else{
			document.forms[0].submit();	
		}

    })

    $("#logname").blur(function(){
      var logname = $("#logname").val();
      if(logname!=""){
        $.get("<{:U('Member/checkuser')}>",{logname : logname},function(data){
          if(data==0){
            alert("该会员已存在");
            $("#logname").val("");
            $("#logname").focus();
          }
        });
      }
      

    })
  })
</script>

</head>

<body>
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href='<{:U("Member/mlist")}>'>会员管理</a></li>
        <li><a href='javascript:void(0)'>会员添加</a></li>
      </ul>
	</div>

  <form class="J_ajaxForms" name="myform" id="myform" action="<{:U("Member/add")}>" method="post">
    <div class="J_tabs_contents">
      <div>
        <div class="h_a">会员添加</div>
        <div class="table_full">
          <table width="100%" class="table_form ">
            <tr>
              <th width="108">会员姓名：</th>
                <td width="1338"><input type="text" name="nicname" id="nicname" class="input" placeholder="会员昵称" />
                <font color="#999">会员昵称，用于页面显示</font>
                </td>
            </tr>
            <tr>
              <th width="108">会员账号：</th>
              <td><input type="text" name="logname" id="logname" class="input" />
                <font color="#999">会员登录名，用于登录系统</font>
                </td>
            </tr>
             <tr>
              <th width="108">班级：</th>
              <td><input type="text" name="banji" id="banji" class="input" />
                <font color="#999"></font>
                </td>
            </tr>
            <tr>
              <th>密码：</th>
              <td><input type="password" name="logpwd" id="logpwd" class="input" value="">
              <font color="#999">会员密码</font>
              </td>
            </tr>
            <tr id="catdir_tr">
              <th>确认密码：</th>
              <td><input type="password" name="relogpwd" id="relogpwd" class="input" value="">
              	<font color="#999">确认密码</font>
              </td>
            </tr>

            
            <tr>
              <th>备注：</th>
              <td><textarea name="othertext" maxlength="255" style="width:500px;height:80px;" id="othertext"></textarea></td>
            </tr>
            <tr>
              <th>所属角色：</th>
              <td>
              	<select name="role1">
                	<option value="0"></option>
                	<volist name="data" id="vo">	
                    	<option value="<{$vo.rid}>"><{$vo.rname}></option>
                    </volist>
                </select>
              </td>
            </tr>
            <tr>
            	<th>状态</th>
                <td>
                	<select name="disable">
                    	<option value="1">开启</option>
                        <option value="0">禁止</option>
                    </select>
                </td>
            </tr>
          </table>
        </div>
      </div>
 
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 " type="button" id="btn10">提交</button>
        <span></span>
      </div>
    </div>
  </form>
</div>
</body>
</html>
