define("pages/auth/friendinvite",["jquery","rsa","widgets/widgets"],function(a){
	var c=a("jquery"),d=a("rsa"),e=a("widgets/widgets"),f=e.Form,
	g=function(){var a=c(".success"),b=c(".backBt");a.length&&(c(".content").delay(1e3).slideUp(),a.delay(1e3).slideDown(),b.on("click",function(){window.parent.location.reload()}),setTimeout(function(){window.parent.location.reload()},2e3))},
	h=c(".success").length,
	i=c("#setFriendForm");
	i.length&&f.validate({})});