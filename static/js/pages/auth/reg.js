define("pages/auth/reg",["jquery","rsa","widgets/widgets","tip"],function(a){
	var b=a("jquery"),c=a("rsa");
	window.parent!=window&&(window.top.location.href=location.href),b(
			function(){
				function d(){
					b(".ui-step li").eq(0).removeClass("ui-step-done").addClass("ui-step-active"),
					b(".ui-step li").eq(1).removeClass("ui-step-active"),
					b("#randCode").val(""),
					b("#randImage").trigger("click"),
					b(".validCode").hide(),
					b("#step1").show(),
					b("#step2").hide(),
					b("#reg").find("input[name=confirm_password]").val(""),
					b("#reg").find("input[name=password]").val("")}
				function e(){
					b(".ui-step li").eq(0).removeClass("ui-step-active").addClass("ui-step-done"),
					b(".ui-step li").eq(1).addClass("ui-step-active"),b("#mobileCode").val(""),
					b("#code-label").hide(),
					b("#step1").hide(),
					b("#step2").show();
					var a=b("#reg").find("input").not("input[type='submit']").filter(function(){return"radio"!=this.type||"radio"==this.type&&this.checked}),c="";
					a.each(function(){c+="<input type='hidden' name='"+b(this).attr("name")+"' value='"+b(this).val()+"' />"}),
					b("#hiddeninputs").html(c);var d=b("#getMobileCode");d.data("mobile")!=b("input[name='username']").val()&&(d.removeAttr("disabled"),k.clear()),d.is(":disabled")||d.trigger("click"),d.data("mobile",b("#userMobile").text())}
				function f(a,b){
					a.length&&(b?a.removeAttr("disabled").removeClass("ui-button-disabled"):a.attr("disabled","disabled").addClass("ui-button-disabled"))}
				var g=a("widgets/widgets"),h=g.Form,i=g.pswLevel;Tip=a("tip");
				var j,k,l=b(".psw-range div");
				if(h.ui.init(),
					b("#password").on("keyup",function(){var a=b(this).val(),c=i(a);switch(c.level){case"强":l.removeClass().addClass("high");break;case"中":l.removeClass().addClass("mid");break;case"弱":l.removeClass().addClass("low")}l.show()})
					.on("blur",function(){}),
					//b("#usertype").on("click","li",function(){var a=b(this).index();b(this).addClass("cur").siblings().removeClass("cur"),b("input[name = 'intention']").eq(a).trigger("click"),b("label[for='intention']").addClass("valid").html("")}),
					b("#gostep1").click(function(a){d(),a.preventDefault()}),
					b("#setIdForm").length&&
					h.validate({target:"#setIdForm",validateData:{submitHandler:function(a){h.ajaxSubmit(b(a),{msgafter:"#"+b(a).find("input[type='submit']")[0].id,before:function(){this.msg("正在验证，请稍后...")},dataType:"JSON",success:function(a){if(this.msg(a.message,"warn"),0===a.status){b(".auth").hide(),b(".authSuccess").show();var c=b("#second"),d=5,e=setInterval(function(){c.html(d),0>=d?(document.location="/index.php?user",clearInterval(e)):d--},1e3)}}})}}}),
					h.validate({
						target:"#mobileCodeForRegForm",
						validateData:{submitHandler:function(a){
						var c=b("#mobileCode").val(),d=b("#userMobile").text();
						b.get("/?user&q=login&q=check_randCode&mobileCode="+c+"&code="+c+"&mobile="+d,function(c){"false"==c.result?b("#code-label").show():(b("#code-label").hide(),a.submit())})}}}),
					h.validate({
						target:"#reg",
						showTip:b("#reg").data("showtip")===!0?!0:!1,
						before:function(){
							j=h.sendPhoneCode("phone","getVoiceCode","/sendPhoneCode!voiceCode.action?&checkCode=reg&phone=",{onStart:function(){f(b("#getMobileCode"),!1)},onClear:function(){f(b("#getMobileCode"),!0)}}),
							k=h.sendPhoneCode("phone","getMobileCode","/?user&q=login&q=sendCode&phone=",{onStart:function(){f(b("#getVoiceCode"),!1)},onClear:function(){f(b("#getVoiceCode"),!0)}}),
							h.randImage(),
							b("#refreshCode").click(function(){b("#randImage").trigger("click")})
						},
						inputTheme:!0,
						showSingleError:!0,
						validateData:{
							ignore:".ignore",
							dataType:"JSON",
							success:function(a){
								"nickName"==a.attr("for")
								&&a.html("此昵称将用作展示，一旦注册成功不能修改"),
								"phone"==a.attr("for")
								&&a.html("请保持手机畅通，以便完成手机信息验证"),a.addClass("valid")
							},
						submitHandler:function(a){
							//js加密处理
							//b(a).find("input[name=password]").val(c(b(a).find("input[name=password]").val())),
							//b(a).find("input[name=confirm_password]").val(c(b(a).find("input[name=confirm_password]").val())),
							h.ajaxSubmit(b(a),{
								msgafter:"#"+b(a).find("input[type='submit']")[0].id,
								dataType:"JSON",
								success:function(a){
									0===a.status?
									(b("#userMobile").html(a.data.username),
									 b("#RegUserName").val(a.data.RegUserName),
									 b("#RegNickName").val(a.data.RegNickName),
									 b("#RegPassword").val(a.data.RegPassword),
									 b("#InviteUserPhone").val(a.data.InviteUserPhone),e())
									:this.msg(a.message,"warn")
								}
							})
						}
					  }
					}),
					!document.all
					&&document.querySelector)
					{h.checkCode({ele:b("#randCode"),data:{code:function(){return b("#randCode").val()}},success:function(){b(".validCode").show()},failed:function(){b(".validCode").hide()}}),h.checkCode({ele:b("#mobileCode"),data:{code:function(){return b("#mobileCode").val()},mobile:function(){return b("#phone").val()},t:function(){return(new Date).getTime()}}})}
					b("#randCode").on("blur",function(){b("#code-error").hasClass("valid")?b(".validCode").show():b(".validCode").hide()}),
					b("#reg-tab").length&&new g.Tab({name:"reg",switched:function(a,b){return!0}}).init(),b("body")[0].scrollTop=0})});