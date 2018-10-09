define("pages/borrow/borrow", ["jquery", "widgets/widgets"], function (a) {
    var b = a("jquery"), d = a("widgets/widgets");
    b(function () {
        b(".jd-u li").click(function () {
            //换当前样式
            b(".jd-u li").removeClass("jd-livisited");
            b(this).addClass("jd-livisited");

            var x = b(".jd-u li").index(this) + 1;
            for (i = 1; i <= 13; i++) {
                if (i != x)
                    b("#jd-list-" + i).hide();
                else
                    b("#jd-list-" + i).show();
            }
        });
        var h = d.Form;
        h.validate({
            target: "#borrowsq",
            inputTheme: !0,
            showSingleError: !0,
            validateData: {
                onkeyup: !1, showErrors: function (a, c) {
                    var d = b("#allError");
                    d.length ? (b("#borrowsq").find("input").each(
                            function () {
                                b(this).removeClass("error")
                            }),
                            d.html(""), c.length && (d.html(c[0].message), b(c[0].element).addClass("error"))) : this.defaultShowErrors()
                },
                submitHandler: function (a) {
                    a.submit()
                }
            }
        });
    })

});