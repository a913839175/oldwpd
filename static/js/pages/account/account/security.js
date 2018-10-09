define("pages/account/account/security",["jquery","rsa","widgets/widgets"],function(a){
function b(a,b){a.length&&(b?a.removeAttr("disabled").removeClass("ui-button-disabled"):a.attr("disabled","disabled").addClass("ui-button-disabled"))}
var c=a("jquery"),d=a("rsa"),e=a("widgets/widgets"),f=e.Form,
g=function(){var a=c(".success"),b=c(".backBt");a.length&&(c(".content").delay(1e3).slideUp(),a.delay(1e3).slideDown(),b.on("click",function(){window.parent.location.reload()}),setTimeout(function(){window.parent.location.reload()},2e3))},
h=c(".success").length,
i=c("#modPswForm,#modCashPswForm,#findCashPswFormStepOneForm,#findCashPswFormStepTwoForm,#modMobileByPhoneStepOneForm,#modMobileByPhoneStepTwoForm,#modMobileByIdStepOneForm,#modMobileByIdStepTwoForm,#emailUpdateByOldStepOneForm,#emailUpdateByOldStepTwoForm,#emailUpdateByMobileStepOneForm,#setIdForm,#setEmailForm,#setMobileForm,#setCashPwdForm,#setNickNameForm");
c("#reSendMail").click(function(a){
c.get(c(this).attr("href"),function(){f.msg("#reSendMail","验证码发送成功,请去邮箱查收")}),
a.preventDefault()}),
i.length&&f.validate({
target:"#"+i[0].id,before:function(){
c("#getMobileCode").length&&(f.sendPhoneCode("phone","getVoiceCode","/sendPhoneCode!voiceCode.action?&checkCode=other&phone=",{onStart:function(){b(c("#getMobileCode"),!1)},
onClear:function(){b(c("#getMobileCode"),!0)}}),
f.sendPhoneCode("phone","getMobileCode","/?user&q=login&q=sendCodeCheck&phone=",{onStart:function(){c(".voice").show(),b(c("#getVoiceCode"),!1)},onClear:function(){b(c("#getVoiceCode"),!0)}})),
c("#getMobileCodeWithoutMobile").length&&
(f.sendPhoneCode("phone","getVoiceCode","/?user&q=login&q=sendCode",{onStart:function(){b(c("#getMobileCodeWithoutMobile"),!1)},onClear:function(){b(c("#getMobileCodeWithoutMobile"),!0)}}),
f.sendPhoneCode("","getMobileCodeWithoutMobile","/?user&q=login&q=sendCode",{onStart:function(){c(".voice").show(),b(c("#getVoiceCode"),!1)},onClear:function(){b(c("#getVoiceCode"),!0)}})),
c("#randImage").length&&f.randImage()},
validateData:{submitHandler:function(a){
var b=c("input[type=password]",a);
"undefined"!=typeof d&&b.each(function(){
//c(this).val(d(c(this).val()))}),
c(this).val(c(this).val())}),
h?f.ajaxSubmit(c(a),{
msgafter:"#"+i.find("input[type='submit']")[0].id,
dataType:"JSON",
success:function(a){
b.each(function(){c(this).val("")}),this.msg(a.message,"warn"),0===a.status&&g()}}):a.submit()}}})});