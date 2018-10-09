define("pages/account/account/addcard", ["jquery"], function(a, b, c) {
	var d = a("jquery"),
		e = function() {
			//function a(){d.ajax({url:"/citydb/citydb!listCitys.action",async:!1,dataType:"JSON",success:function(a){i=a}})}
			function b() {
				var b = ["华北", "东北", "华东", "中南", "西南", "西北"],
					c = [];
				"undefined" == typeof i && a();
				var h = i;
				d.each(h.datas, function(a, b) {
					c.push(b.province + "|" + b.region)
				}), c = g(c, function(a, b) {
					return a.split("|")[0] === b.split("|")[0]
				}), c = f(c), m.empty().hide(), d.each(b, function(a, b) {
					var c = d("<div class='areadiv' data=" + b + "></div>");
					c.html(b), m.append(c)
				}), d.each(c, function(a, b) {
					var c = b.split("|"),
						e = d("<span data-province=" + c[0] + ">" + c[0] + "</span>");
					d(".areadiv[data='" + c[1] + "']").append(e)
				}), m.undelegate("click").delegate("span", "click", function() {
					var a = d(this).attr("data-province");
					e(d(this), a)
				}).show(), l.show()
			}

			function c() {
				d.each(j, function(a, b) {
					var c = d("<a href='javascript:' class='citydiv' data-city='" + b.city + "' data-value='" + b.id + "'>" + b.city + "</a>");
					r.append(c)
				}), r.undelegate("click").delegate("a", "click", function() {
					var a = d(this).attr("data-city");
					k.val(a).trigger("blur"), p.val(d(this).attr("data-value")), l.hide()
				})
			}

			function e(a, b) {
				{
					var c = i,
						e = [];
					a[0].offsetLeft, a[0].offsetTop
				}
				o.empty(), d.each(c.datas, function(a, c) {
					c.province == b && e.push({
						city: c.city,
						value: c.id
					})
				}); {
					var f = d("<div class='city-province fn-clear'><em>省份</em></div>");
					d("<a class='J_close' href='javascript:'>" + b + " <i>X</i></a>").click(function() {
						n.hide()
					}).appendTo(f)
				}
				o.prepend(f);
				var g = d("<div class='city-province'><em>城市</em></div>");
				d.each(e, function(a, b) {
					var c = d("<a class='citydiv' data-city='" + b.city + "' data-value='" + b.value + "'>" + b.city + "</a>");
					g.append(c)
				}), o.append(g), n.show(), o.undelegate("click").delegate("a.citydiv", "click", function() {
					var a = d(this).attr("data-city");
					k.val(a).trigger("blur"), p.val(d(this).attr("data-value")), l.hide()
				})
			}

			function f(a) {
				for (var b = [], c = [], e = [], f = [], g = [], h = 0, i = a.length; i > h; h++) /北京市/.test(a[h]) ? b.push(a[h]) : /市/.test(a[h]) ? c.push(a[h]) : /区/.test(a[h]) ? f.push(a[h]) : e.push(a[h]);
				return g = d.merge(b, c), g = d.merge(g, e), g = d.merge(g, f)
			}

			function g(a, b) {
				var c, d, e = a.length,
					f = a.slice(0);
				for ("function" != typeof b && (b = function(a, b) {
						return a === b
					}); --e > 0;)
					for (d = f[e], c = e; c--;)
						if (b(d, f[c])) {
							f.splice(e, 1);
							break
						}
				return f
			}

			function h() {
				p = d("#cityid"), k = d("#city"), l = d("<div class='probox'></div>").css({
					top: k[0].offsetHeight + 6
				}).insertAfter(k), r = d("<div class='hotCitiesBox fn-clear' style='display:block;'></div>"), $allCitiesBox = d("<div class='allCitiesBox'></div>"), m = d("<div id='provincebox'></div>"), n = d("<div id='citybox'></div>"), q = d("<ul class='city-tab J_city_tab fn-clear'><li class='active' data-name='hot'>热门城市</li><li data-name='all'>省份城市</li></ul>").appendTo(l), o = d("<div id='cityboxcon'></div>"), n.append(o);
				d("<span class='close'>X</span>").click(function() {
					l.hide(), n.hide()
				}).appendTo(l);
				$allCitiesBox.append(m).append(n).parent().css("position", "relative"), l.append(r).append($allCitiesBox), c(), k.bind("focus", function() {
					b(), d("#J_must_chooseBankArea").hide()
				}).bind("keyup", function() {
					this.value = ""
				}), d(".J_city_tab").on("click", "li", function() {
					d(this).addClass("active").siblings().removeClass("active"), r.hide(), $allCitiesBox.hide(), d("." + d(this).data("name") + "CitiesBox").show()
				}), d(document.body).click(function(a) {
					"bank_area" == a.target.id || d(a.target).closest("div.probox").length || l.hide()
				})
			}
			var i, j, k, l, m, n, o, p, q, r;
			return j = [{
				city: "北京市",
				id: "906"
			}, {
				city: "上海市",
				id: "994"
			}, {
				city: "广州市",
				id: "812"
			}, {
				city: "深圳市",
				id: "815"
			}, {
				city: "成都市",
				id: "1024"
			}, {
				city: "杭州市",
				id: "886"
			}, {
				city: "苏州市",
				id: "870"
			}, {
				city: "南京市",
				id: "866"
			}, {
				city: "武汉市",
				id: "949"
			}, {
				city: "重庆市",
				id: "842"
			}, {
				city: "天津市",
				id: "1012"
			}, {
				city: "东莞市",
				id: "803"
			}, {
				city: "郑州市",
				id: "973"
			}, {
				city: "西安市",
				id: "961"
			}, {
				city: "福州市",
				id: "877"
			}, {
				city: "温州市",
				id: "889"
			}, {
				city: "长沙市",
				id: "1053"
			}, {
				city: "厦门市",
				id: "879"
			}], {
				init: function() {}
			}
		}(),
		f = function() {
			function a() {
				var a = d.trim(f.val()),
					b = d.trim(d("#city").val());
				var e = $('input:radio[name="bankCode"]:checked').val();
				return e && "other" != e ? b ? void d.ajax({
					url: "/?user&q=code/approve/listBankDetails",
					type: "POST",
					data: {
						province: d("#province").val(),
						city: d("#city").val(),
						bank: e
					},
					dataType: "JSON",
					error: function() {
						alert("银行数据加载失败，请刷新后重试")
					},
					beforeSend: function() {
						c.html("<img src='/static/img/loading.gif' />").show()
					},
					success: function(a) {
						var b = a,
							e = "";
						b.datas && b.datas.length ? d.each(b.datas, function(a, b) {
								e += "<li data-id="+b.id+">" + b.name + "</li>"
							}) : e += "<p>没有匹配支行信息</p>",
							c.html(e),
							d(document.body).click(function(a) {
								"bankKeySearchId" !== a.target.id && "bankSearch" != a.target.id && c.hide()
							}),
							c.delegate("li", "click", function() {
								var a = d(this).html();
								var b = d(this).attr('data-id');							
								f.val(a).trigger("blur");
								d('#cardDeposit_id').val(b);
							})
							.delegate("li", "mouseover", function() {
								d(this).addClass("selected")
							})
							.delegate("li", "mouseout", function() {
								d(this).removeClass("selected")
							})
					}
				}) : (d("#J_must_chooseBankArea").show(), void d("#J_must_chooseBankArea").next("label").remove()) : void d("#J_must_chooseBank").show()
			}

			function b() {
				g = d("#selBankType"), e = d("#bankKeySearchId"), f = d("#cardDeposit"), c = d("<ul class='popBox bankSearch'></ul>").css({
					top: f[0].offsetHeight
				}).insertAfter(f), h = d("#cityid"), e.click(function(b) {
					return a(), b.stopPropagation(), !1
				}), g.change(function() {
					f.val("")
				})
			}
			var c, e, f, g, h;
			return {
				init: function() {
					b()
				}
			}
		}(),
		g = {
			pop: e,
			search: f
		};
	c.exports = g
});