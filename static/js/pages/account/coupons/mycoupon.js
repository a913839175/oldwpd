(function(){define("pages/account/coupons/mycoupon",["jquery","common","widgets/widgets","protocol"],function(a,b,c){
	var d,e,f,g;return d=a("jquery"),e=a("common"),f=a("widgets/widgets"),g=a("protocol"),
	initTab=function(){
		var a;
		return a=new f.Tab({
			name:"coupon",switched:function(a,b,c){
				return c?!0:("usedcoupon"==b&&new f.List({}).init()._update(),"expiredcoupon"==b&&new f.List({}).init()._update(),!0)
			}
		}).init()},
		initList=function(a){},
		ret={init:function(a){return initTab(),initList(e.loadJSON(a,!0))}},c.exports=ret})}).call(this);