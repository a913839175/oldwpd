 <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/newheader.css?v=20170830">
 <link rel="stylesheet" href="../static/css/one.css?v=20160823"/>

<script>

  $(function(){
      //头部微信二维码
      $('.hover_weixin').on('mouseover',function(){
          $('.weixinorcode').show();
      })
      $('.hover_weixin').on('mouseout',function(){
          $('.weixinorcode').hide();
      })
      $('.weixinorcode').on('mouseover',function(){
          $('.weixinorcode').show();
      })
      $('.weixinorcode').on('mouseout',function(){
          $('.weixinorcode').hide();
      })
  })

</script>
<div class="newheaderbox">
<div class="ui-header-top ">
    <div class="container_12 fn-clear">
        <div class="grid_12 fn-clear">
            <div class="fn-left">
                <span class="ui-nav-app-phone">
                <i class="icon icon-app"></i>
                <span class="aril">400-8878288</span>
                </span>
                <span class="hover_sina">
                    <a href="http://weibo.com/weipaidai" target="_blank"></a>
                </span>
                <span class="hover_weixin">
                    <span class="tk" ></span>
                </span>                
            </div>
            <div class="fn-right">
                <a class="ui-nav-item" href="../">返回首页</a>
                <empty name="Think.session.k_user">
                <a class="ui-nav-item reg-link" href="/?user&q=reg">快速注册</a>
                <a class="ui-nav-item login-link" href="../?user&amp;q=login">立即登录</a>
                <else/>
                
                <a href="../index.php?user" class="ui-nav-item reg-link">
                       您好，
                <{$Think.session.k_user}></a>
                <a  href="../index.php?user&q=logout&type=index" class="ui-nav-item login-link">[退出]</a>
                </empty>
                <a class="ui-nav-item" href="../newguide/index.html">新手指导</a>
                <a class="ui-nav-item" href="../newhelp/index.html" target="_blank">帮助</a>
            </div>

        </div>
          <div class="weixinorcode clearfix" >
                                        <div class="wxcodeleft">
                                                <img src="/static/img/in_weipaidaicode.png"  class="wxcpdeleftimg1"  />
                                                <p class="wxcodebt1" >微拍贷</p>
                                                <p class="wxcodebt2" >（微信号：<span >weipaidai</span>）</p>
                                        </div>
                                         <div class="wxcoderight" >
                                                <img src="/static/img/in_weyoucaicode.png"  class="wxcpdeleftimg2" />
                                                <p class="wxcodebt1" >微拍贷WE有财</p>
                                                <p class="wxcodebt2">（微信号：<span style="color: #c27420;">wpdwyc</span>）</p>
                                        </div>
                                </div>
    </div>

</div>
<!--   搜索、购物车 -->
<div class="jf_top clearfix">
    <a href="../"><img src="__PUBLIC__/Cn/images/jfindex/weipaidaijfsc.jpg" class="jf_imgtop1"></a>
    <div class="jf_sousuoz clearfix">
   <form id="formid"  name= "myform" method = 'post' action ="<{:U('Product/index')}>" >
       <div class="jf_sousuo clearfix">
            <img src="__PUBLIC__/Cn/images/jfindex/jf_wenhao.png" alt="" class="jf_img2">
            <input type="text" name="proname" class="jf_ssiuput" type="text" placeholder="请输入搜索的文字">
            <button type="submit" class="jf_ssbutton">搜索</button> 

       </div>
     </form>
     <!--搜索验证开始-->
     <script>
     $('.jf_ssbutton').click(function(){
      var sousuo=$('.jf_ssiuput').val();
      if(sousuo==""){
        alert("请输入搜索内容");
        return false;  
      }else{
        return true;
      }
     });
     </script>
     <!--搜索验证结束-->
       <p class="js_rmsousuo">
         <span>热门搜索： </span>
         <span><a href="<{:U('Product/index',array('opage'=>'6'))}>">微购</a></span>
         <span><a href="<{:U('Product/index',array('proname'=>'可兑换'))}>">可兑换</a></span>
         <span><a href="<{:U('Product/index',array('proname'=>'红包'))}>">红包</a></span>
         <span><a href="<{:U('Product/index',array('proname'=>'手机'))}>">手机</a></span>
         <span><a href="<{:U('Product/index',array('proname'=>'电视'))}>">电视</a></span>
         <span><a href="<{:U('Product/index',array('proname'=>'雨伞'))}>">雨伞</a></span>
       </p>
    </div> 
</div>  
<!-- 导航 -->
<div class="navtiao">
  <div class="jf_nav clearfix">
    <a href="__APP__"><p class="jf_navli2">首页</p></a>
    <a href="<{:U('Product/index',array('opage'=>'6'))}>" class="digtran"><li class="jf_navli">微购</li></a>
    <volist name="opage" id="vo">
        <eq name="vo.pid" value="1">
    <p class="jf_yishu"></p>
    <a href="__APP__?m=product&a=index&opage=<{$vo['id']}>" class="digtran"><li class="jf_navli"><{$vo.proclassname}> </li></a>
    </eq>
    </volist>
    <img src="__PUBLIC__/Cn/images/jfindex/shot.png" alt="" class="shot">
    <img src="__PUBLIC__/Cn/images/jfindex/boom.png" alt="" class="boom">
  </div>
</div>
<div class="wbfl1 wbk" >
  <div class="jf_jffl">
        <ul class="jf_flul1 clearfix">
           <li class="jf_flli1 clearfix padl">
               <a href="<{:U('Product/index',array('integral'=>'1','opage'=>'6'))}>" class="jf_fllibt" <if condition="$_GET['integral']==1 && $_GET['opage']==6">style="background-position: 0px -10px;"</if>></a>
                <a  href="<{:U('Product/index',array('integral'=>'1','opage'=>'6'))}>"  class="jf_flul1m">1-999徽币</a>
            </li>
            <li class="jf_flli1 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'2','opage'=>'6'))}>" class="jf_fllibt" <if condition="$_GET['integral']==2 && $_GET['opage']==6">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul1m"  href="<{:U('Product/index',array('integral'=>'2','opage'=>'6'))}>" >1000-9999徽币</a>
            </li>
            <li class="jf_flli1 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'3','opage'=>'6'))}>" class="jf_fllibt" <if condition="$_GET['integral']==3 && $_GET['opage']==6">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul1m"  href="<{:U('Product/index',array('integral'=>'3','opage'=>'6'))}>" >10000-29999徽币</a>
            </li>
            <li class="jf_flli1 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'4','opage'=>'6'))}>" class="jf_fllibt" <if condition="$_GET['integral']==4 && $_GET['opage']==6">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul1m"  href="<{:U('Product/index',array('integral'=>'4','opage'=>'6'))}>" >30000徽币</a>
            </li>
        </ul> 
         <ul class="jf_flul2 clearfix">
            <li class="jf_flli2 clearfix ">
                <p class="jf_cppl">产品综合分类</p>
            </li>
            <li class="jf_flli2 clearfix ">
                <a href="<{:U('Product/index',array('integral'=>'1'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==1 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'1'))}>" >1-999徽币</a>
            </li>
            <li class="jf_flli2 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'2'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==2 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'2'))}>" >1000-9999徽币</a>
            </li>
            <li class="jf_flli2 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'3'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==3 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'3'))}>" >10000-29999徽币</a>
            </li>
            <li class="jf_flli2 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'4'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==4 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'4'))}>" >30000徽币</a>
            </li>
        </ul> 
  </div>
</div>
<volist name="opage" id="vo">
    <eq name="vo.pid" value="1">
<div class="wbfl<{$key+($key+1)}> wbk" >
  <div class="jf_jffl">
        <ul class="jf_flul1 clearfix">
           <li class="jf_flli1 clearfix padl">
                <a href="<{:U('Product/index',array('integral'=>'1','opage'=>$vo['id']))}>" class="jf_fllibt" <if condition="$_GET['integral']==1 && $_GET['opage']==$vo['id']">style="background-position: 0px -10px;"</if>></a>
                <a href="<{:U('Product/index',array('integral'=>'1','opage'=>$vo['id']))}>"  class="jf_flul1m">1-999徽币</a>
            </li>
            <li class="jf_flli1 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'2','opage'=>$vo['id']))}>" class="jf_fllibt"  <if condition="$_GET['integral']==2 && $_GET['opage']==$vo['id']">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul1m" href="<{:U('Product/index',array('integral'=>'2','opage'=>$vo['id']))}>" >1000-9999徽币</a>
            </li>
            <if condition="$key+($key+1)!=3">
            <li class="jf_flli1 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'3','opage'=>$vo['id']))}>" class="jf_fllibt"  <if condition="$_GET['integral']==3 && $_GET['opage']==$vo['id']">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul1m" href="<{:U('Product/index',array('integral'=>'3','opage'=>$vo['id']))}>" >10000-29999徽币</a>
            </li>
            <li class="jf_flli1 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'4','opage'=>$vo['id']))}>" class="jf_fllibt"  <if condition="$_GET['integral']==4 && $_GET['opage']==$vo['id']">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul1m" href="<{:U('Product/index',array('integral'=>'4','opage'=>$vo['id']))}>" >30000徽币</a>
            </li>
            </if>
        </ul> 
         <ul class="jf_flul2 clearfix">
            <li class="jf_flli2 clearfix ">
                <p class="jf_cppl">产品综合分类</p>
            </li>
            <li class="jf_flli2 clearfix ">
                <a href="<{:U('Product/index',array('integral'=>'1'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==1 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'1'))}>" >1-999徽币</a>
            </li>
            <li class="jf_flli2 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'2'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==2 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'2'))}>" >1000-9999徽币</a>
            </li>
            <li class="jf_flli2 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'3'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==3 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'3'))}>" >10000-29999徽币</a>
            </li>
            <li class="jf_flli2 clearfix">
                <a href="<{:U('Product/index',array('integral'=>'4'))}>" class="jf_fllibt2" <if condition="$_GET['integral']==4 && empty($_GET['opage'])">style="background-position: 0px -10px;"</if>></a>
                <a class="jf_flul2m" href="<{:U('Product/index',array('integral'=>'4'))}>" >30000徽币</a>
            </li>
        </ul> 
  </div>
</div>
    </eq>
</volist>
<script>

$(function() {
    $(".digtran").mouseover(function(){
        $(".digtran").css('background','#00aaf5');
        $(this).css('background','#0065cd');
        thisindex=$(this).index();
        $('.wbk').hide();
        var aa=".wbfl"+thisindex
         $(aa).show();
    })
    $('.jf_jffl').mouseleave(function(){
        $('.wbk').hide();
    })
})
$(function() {
    $('.jf_flli1').on('click',function(){
          $('.jf_flli1').find('.jf_fllibt').css('background-position','0 0');
          $('.jf_flli1').find('.jf_flul1m').css('color','#4c4c4c');
          $(this).find('.jf_fllibt').css('background-position','0 -10px');
          $(this).find('.jf_flul1m').css('color','#2ea7e0');
          $('.wbk').hide();
    })
    $('.jf_flli2').on('click',function(){
          $('.jf_flli2').find('.jf_fllibt2').css('background-position','0 0');
          $('.jf_flli2').find('.jf_flul2m').css('color','#4c4c4c');
          $(this).find('.jf_fllibt2').css('background-position','0 -10px');
          $(this).find('.jf_flul2m').css('color','#2ea7e0');
          $('.wbk').hide();
    })
})
</script>
