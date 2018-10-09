<!DOCTYPE html>
<html lang="zh-cn">
<head>    
<meta charset="UTF-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/colorbox.css">
<include file="Public:top" />
</head>
<body>
<!--header-->
<include file="Public:header" sign="2" />
<!--flash-->
<div id="subflash">
  <img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>走进多意</span><em>into duoyi</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
  <div class="subLeft">
      <div class="subTop">
          <ul>
              <li><a href="<{:U('About/index',array('qid'=>1))}>">公司简介</a></li>
              <li><a href="<{:U('About/culture')}>">企业文化</a></li>
              <li><a href="<{:U('About/honor')}>">企业荣誉</a></li>
              <li><a class="on" href="<{:U('About/licheng')}>">发展历程</a></li>
              <li><a href="<{:U('About/index',array('qid'=>2))}>">核心技术</a></li>
          </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
      <h3>
          <span>发展历程</span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em><a href="<{:U('About/index')}>">走进多意</a><em>&gt;</em>发展历程</p>
        </h3>
        <div class="subCon">
          <div id="history">
              <div class="year">
                <foreach name="licheng_type_data" item="vo">
                    <a href="javascript:;" class="licheng" rev="<{$vo.id}>"><{$vo.conclassname}></a>
                </foreach>
                
                </div>
                <div class="thingList">
                  <ul class="ul_html">
                     
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

<script>
 

$(function(){
  $("#history .year a:eq(0)").addClass("on");
  var first_rev = $("#history .year a:eq(0)").attr("rev");
  licheng_ajax(first_rev);

  $(".licheng").click(function(){
    $(this).addClass("on").siblings().removeClass("on");
    var rev = $(this).attr("rev");
    licheng_ajax(rev);
  })
})

function licheng_ajax(rev){
  var str='';
  $.get("<{:U('About/licheng_ajax')}>",{rev:rev},function(data){
      if(data==null){
        $(".ul_html").html("");
        return false;
      }
      $.each(data,function(k,v){
        str +='<li><div class="date">'+v.time+'</div><div class="text">'+v.concon+'</div></li>';
      })
      $(".ul_html").html(str);
  },'JSON');
}

</script>
</body>
</html>