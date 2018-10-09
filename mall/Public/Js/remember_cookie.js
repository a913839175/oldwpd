//保存用户信息
function saveUserInfo() {
    if ($("#rmbUser").attr("checked") == true) {
        var userName = $("#dl").val();
        var passWord = $("#pwd").val();
        $.cookie("rmbUser", "true", { expires: 7 }); // 存储一个带7天期限的 cookie
        $.cookie("userName", userName, { expires: 7 }); // 存储一个带7天期限的 cookie
        $.cookie("passWord", passWord, { expires: 7 }); // 存储一个带7天期限的 cookie
    }
    else {
        $.cookie("rmbUser", "false", { expires: -1 });
        $.cookie("userName", '', { expires: -1 });
        $.cookie("passWord", '', { expires: -1 });
    }
}