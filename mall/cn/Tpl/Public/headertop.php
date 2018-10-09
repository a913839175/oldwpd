<script>
/*下拉菜单*/
  $(function(){
	   $(".ix-currentli").mouseover(function(){
		    $(this).children("ul").show();
			 $(this).children("img").show();
			
		  
		   })
	    $(".ix-currentli").mouseout(function(){
			  $(this).children("ul").hide();
			 $(this).children("img").hide();
			})
	   
	  
	  })
/////////

</script>
<div class="ui-topbox">
    <div class="ui-top"><!--页眉--->
      <div class="hdr-left ft-left pdl">
       <a><i class="inx-ticonphone mrt"></i></a>
          <span class="ft-left">400-3366-93</span>
           <a href="" class="">加入收藏</a>
             <a href="" class="">关注我们</a>
               <a href=""><i class="inx-ticonweibo mrt"></i></a>
               <a href=""><i class="inx-ticonweixin mrt"></i></a>
            </div>
         <div class="hdr-right ft-right">
        
        <empty name="Think.session.k_user">
        <a href="https://old.weipaidai.com/?user&q=reg" target="_blank"class="c mrl mrr ft-right">免费注册</a>
        <a  target="_blank" href="<{:U('Member/login')}>" class="c cmrr ft-right">立即登录</a>
        <else/>
        <a  target="_blank" href="<{:U('Member/logout')}>" class="c cmrr ft-right">退出</a>
        <a href="##" target="_blank"class="c mrl mrr ft-right">欢迎，<{$Think.session.k_user}></a>
        
        </empty>
      </div>
      </div><!----页眉结尾---->
     <div class="nav-menu" style="border-bottom:solid 3px #00a0e9;">
      <div class="nav-container">
       <div class="clear"></div>
        <div class="nav-logo ft-left"></div>
        <div class="nav-logo1 ft-left"></div>
         <div class="nav-right ft-right">
            <ul class="u-nav-item">
             <li class="ui-nav-item ix-currentli"><a href="https://old.weipaidai.com/bonus/index.html">红包区</a>
                
             <!-- <div class="clear"></div>
              <img src="__PUBLIC__/Home/images/ulbg.png" />
              <ul>
              <li><a>资金管理</a></li>
               <li><a>理财管理</a></li>
                <li><a>借贷管理</a></li>
                 <li><a>账户管理</a></li>
              </ul>-->
             </li>
              <li class="ui-nav-item ix-currentli"><a href="https://old.weipaidai.com/intro/index.html">关于我们</a>
                  <div class="clear"></div>
                  <img src="__PUBLIC__/Home/images/ulbg.png" />
                  <ul>
                  	<li><a target="_blank" href="https://old.weipaidai.com/intro/index.html">公司简介</a></li>
                    <li><a target="_blank" href="https://old.weipaidai.com/report/index.html">媒体报道</a></li>
                    <li><a target="_blank" href="https://old.weipaidai.com/news/index.html">新闻动态</a></li>
                    <li><a target="_blank" href="https://old.weipaidai.com/notices/index.html">网站公告</a></li>
                    <li><a target="_blank" href="https://old.weipaidai.com/invite/index.html">招贤纳士</a></li>
                    <li><a target="_blank" href="https://old.weipaidai.com/contact/index.html">联系我们</a></li>
                  <!-- <li><a>社会责任</a></li>
                    <li><a>媒体报道</a></li>
                     <li><a>管理团队</a></li>
                     <li><a>合作伙伴</a></li>
                      <li><a>最新动态</a></li>
                      <li><a>招贤纳士</a></li>
                      <li><a>联系我们</a></li>-->
                  </ul>
              </li>
             <li class="ui-nav-item"><a target="_blank" href="https://old.weipaidai.com/intro/index.html">债权转让</a></li>
             <li class="ui-nav-item ix-currentli"><a target="_blank" href="https://old.weipaidai.com/fengkong/index.html">风险控制</a>
                  
                <!--<div class="clear"></div>
                <img src="__PUBLIC__/Home/images/ulbg.png" />
                <ul>
                <li><a>系统安全</a></li>
                 <li><a>资金保障</a></li>
                   <li><a>风控体系</a></li>
                </ul>-->
             </li>
             <li class="ui-nav-item ix-currentli"><a  target="_blank" href="https://old.weipaidai.com/borrow/index.html">我要借贷</a>
               <!--<div class="clear"></div>
                <img src="__PUBLIC__/Home/images/ulbg.png" />
                <ul>
                <li><a>助农贷</a></li>
                 <li><a>精英贷</a></li>
                  <li><a>助业贷</a></li>
                   <li><a>薪金贷</a></li>
                   <li><a>按揭贷</a></li>
                   <li><a>车辆活抵</a></li>
                </ul>-->
             </li>
             <li class="ui-nav-item ix-currentli"><a target="_blank" href="https://old.weipaidai.com/invest/index.html">我要理财</a>
               <div class="clear"></div>
                <img src="__PUBLIC__/Home/images/ulbg.png" />
                <ul>
                <li><a  target="_blank" href="https://old.weipaidai.com/tenderlist/index.html">微计划</a></li>
                <li><a  target="_blank" href="https://old.weipaidai.com/investlist/index.html">散标投资</a></li>
                 <!-- <li><a>月月赢</a></li>
                   <li><a>季度丰</a></li>
                   <li><a>财富宝</a></li>
                   <li><a>普惠系列</a></li>-->
                </ul>
             </li>
             <li class="ui-nav-item"><a  target="_blank" href="https://old.weipaidai.com/">首页</a></li>
          </ul>
         </div>
       </div>
     </div>
  </div>