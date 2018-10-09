
define("Public/Home/js/login",["jquery","rsa","widgets/widgets","handlebars","mailSuggest"],function(a){
	var b=a("jquery"),c=a("rsa"),d=a("widgets/widgets"),e=a("handlebars"),f=a("mailSuggest");
	b(function(){
		function a(a){
			var c=b("#j_username"),d={};
			d.left=c.offset().left,
			d.top=c.offset().top+c.innerHeight(),
			a.css({left:d.left,top:d.top,absolute:"position"})
		}
		function g(a,b){
			var c=l.find(".cur"),d=c.index(),e=l.find("li").length;
			"down"==b?(d++,d>e-1&&(d=0),
			l.find("li").removeClass("cur").eq(d).addClass("cur")):"up"==b?(d--,0>d&&(d=e-1),
			l.find("li").removeClass("cur").eq(d).addClass("cur")):"enter"==b&&(a.val(c.text()).blur(),l.hide(),k.trigger("focus"))
		}
		var h=d.Form,i=new f,j=b("#j_username"),k=b("#J_pass_input"),l=b('<div class="suggest" id="suggest"></div>').appendTo(b("body"));
		b("#rememberme").length&&h.ui.init(),a(l);
		var m=b("#email-suggest-template").html(),n=e.compile(m);
		h.validate({target:"#login",before:function(){h.randImage(),b("#refreshCode").click(function(){b("#randImage").trigger("click")})},inputTheme:!0,showSingleError:!0,validateData:{onkeyup:!1,showErrors:function(a,c){var d=b("#allError");
		d.length?(b("#login").find("input").each(function(){b(this).removeClass("error")}),d.html(""),c.length&&(d.html(c[0].message),b(c[0].element).addClass("error"))):this.defaultShowErrors()},
		submitHandler:function(a){
			//k.val(c(k.val())),
			//rsa鍔犲瘑绋嬪簭娉ㄦ剰
			k.val(k.val()),
			a.submit()
		}
		}}),j.on("keyup",function(c){a(l);
		var d=b(this).val();
		switch(c.keyCode){
		case 38:g(b(this),"up");break;
		case 40:g(b(this),"down");break;
		case 13:g(b(this),"enter");break;
		default:if(!d.length)return void l.hide();
		var e=i.run(d);/^\d{1,}$/g.test(d)&&(e.remove=!0);var f=n(e);l.html(f).show().find("li").eq(0).addClass("cur")}})
		.on("keydown",function(a){13==a.keyCode&&a.preventDefault()})
		.on("focusout",function(){setTimeout(function(){l.hide()},500)}),
		b(window).on("resize",function(){a(l)}),
		l.on("mouseenter","li",function(){b(this).addClass("cur")})
		.on("mouseleave","li",function(){b(this).removeClass("cur").siblings().removeClass("cur")})
		.on("click","li",function(){g(j,"enter"),k.trigger("focus")}),
		//b("#randCode").keyup(function(){var a=b(this).val();a.length&&b.get("/?user&q=login&q=check_randCodes&j_code="+a+"&code="+a,function(a){"true"==a?(b(".validCode").show(),b("#allError").hide()):(b(".validCode").hide(),b("#allError").show())})}),
		b(".partner").length&&b(".partner").hover(function(){b(this).addClass("hover")},function(){b(this).removeClass("hover")}),b("body")[0].scrollTop=0}
	)
  }
);