<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<load href="__PUBLIC__/Css/admin_style.css" />
<load href="__PUBLIC__/Js/artDialog/skins/default.css" />


<load href="__PUBLIC__/Js/wind.js" />
<load href="__PUBLIC__/Js/jquery.js" />

<script type="text/javascript">
  $(function(){
    $("#updatepwd").toggle(function(){
      $("#updatepwd").html("取消修改");
      $("#tr1").after("<tr id=\"tr2\"><th>密码：</th><td><input type=\"password\" name=\"logpwd\" id=\"logpwd\" class=\"input\" /><font color=\"#999\">会员密码</font></td></tr>");
      $("#tr2").after("<tr id=\"catdir_tr\"><th>确认密码：</th><td><input type=\"password\" name=\"relogpwd\" id=\"relogpwd\" class=\"input\" /><font color=\"#999\">确认密码</font></td></tr>");

    },function(){
      $("#updatepwd").html("修改密码");
      $("#tr2").remove();
      $("#catdir_tr").remove();
    });
  })
</script>

<script type="text/javascript">
  $(function(){
    $("#tn10").click(function(){
      var oldpwd = $("#oldpwd");
      var newpwd = $("#newpwd");
      var renewpwd = $("#renewpwd");
   
      if(oldpwd.val()==""){
        $("#ni10").html("原密码不能为空");
        oldpwd.focus();
      } else if(newpwd.val()==""){
        $("#ni10").html("新密码不能为空");
        newpwd.focus();
      }else if(renewpwd.val()==""){
        $("#ni10").html("确认密码不能为空");
        renewpwd.focus();
      }else if(newpwd.val()!=renewpwd.val()){
       $("#ni10").html("两次密码输入不一致");
        newpwd.focus();
      }else{
        var id = $("#oldpwd").attr("pwd");
		var oldpwd = $("#oldpwd").val();
		$.get("__URL__/checkpass",{id : id,oldpwd : oldpwd},function(data){
			if(data==0){
				$("#ni10").html("原始密码不正确");
				$("#oldpwd").focus();
			}else if(data==1){
				document.forms[0].submit();
			}
		});
      }

    })
  })
</script>
<script type="text/javascript">
	function checkpwd(){
		var id = $("#oldpwd").attr("pwd");
		var oldpwd = $("#oldpwd").val();
		$.get("__URL__/checkpass",{id : id,oldpwd : oldpwd},function(data){
			return data;
		});
	}
</script>
</head>

<body>
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li><a href="javascript:void(0)">修改密码</a></li>
        
      </ul>
	</div>

  <form class="J_ajaxForms" name="myform" id="myform" action="<{:U("Member/editpwd")}>" method="post">
    <div class="J_tabs_contents">
      <div>
        <div class="h_a">修改密码</div>
        <div class="table_full">
          <table width="100%" class="table_form ">
            <tr>
              <th width="108">原密码：</th>
             
                <td width="1338"><input type="password" name="oldpwd" id="oldpwd" class="input" pwd="<{$Think.session.id}>" value="" />
                <font color="#999">登录用户密码</font>
                </td>
            </tr>
            <tr id="tr1">
              <th width="108">新密码：</th>
              <td><input type="password" name="newpwd" id="newpwd" class="input" value="" />
                <font color="#999">新密码</font>
                 
              </td>

            </tr>
            <tr id="tr2">
              <th width="108">确认密码：</th>
              <td><input type="password" name="renewpwd" id="renewpwd" class="input" value="" />
                <font color="#999">确认密码</font>
                 
              </td>

            </tr>

            
            
          </table>
        </div>
      </div>
 
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 " id="tn10" type="button">提交</button>
        <span id="ni10" style="color:red;"></span>
        <input type="hidden" name="editid" value="<{$Think.session.id}>" />
      </div>
    </div>
  </form>
</div>
</body>
</html>
