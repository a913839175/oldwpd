<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
    <!--<script src="__PUBLIC__/Home/js/waterFull.js"></script>-->
</head>
<body>
<!----header---->
<include file="Public:header" sign="1" />
<!--flash-->
<div id="subflash">
	<img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>品牌口碑</span><em>brand proud</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
	<div class="subLeft">
    	<div class="subTop">
        	<ul>
            	<li><a class="on" href="<{:U('Product/brand')}>">品牌口碑</a></li>
                
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
    	<h3>
        	<span>品牌口碑</span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em>品牌口碑</p>
        </h3>
        <div class="subCon">
        	<div id="brand">
            	<div class="vedioShow">
                	<div class="videoPlay">
                    	<ul>
                            <foreach name="brand_video_data" key="k" item="vo">
                                <li>
                                    <{$vo.procontent}>
                                </li>
                            </foreach>
                            
                           
                         </ul>
                    </div>
                    <div class="videoList">
                	<ul>
                        <foreach name="brand_video_data" item="vo">
                            <li>
                                <a href="javascript:;">
                                    <div class="img">
                                        <img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" width="148" height="84" />
                                    </div>
                                    <p><{$vo.proname}></p>
                                    <span><{$vo.addtime|date="Y-m-d",###}></span>
                                </a>    
                            </li>
                        </foreach>
                    	
                        
                    </ul>
                </div>
                </div>
                <div class="brandShare">
                    <h4>口碑分享</h4>
                    <div class="waterFull">
                    	<div id="container">

                            <foreach name="brand_share_data" item="vo">
                                <div class="box">
                                    <div class="content">
                                        <a href="javascript:;" rev="<{:U('Product/brand_info',array('id'=>$vo[id]))}>">
                                            <img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" width="274" height="205" />
                                            <p class="name"><{$vo.proname}></p>
                                            <div class="memo"><{$vo.prointo}></div>
                                            <div class="what">
                                                <span><{$vo.addtime|date="Y-m-d",###}></span>
                                                <em><{$vo.pro_dianjiliang}></em>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </foreach>
                        	
                            
                           
                        </div> 
                    </div>
                   
                    <div class="clear"></div>
                    <div class="pager"><a href="javascript:;" onclick="addMore()">加载更多</a></div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!----footer---->
<include file="Public:footer" />




<script>
	$(function(){
		function brandAddShow(){
			var oBoxA = $("#container a");
			var _src = '';
			oBoxA.live("click",function(){
				$('body').append('<div id="shade"><div id="brandShow"><iframe frameborder="0" scrolling="none" src="load.html" width="1056" height="540"></iframe></div></div><a id="brandClose" href="javascript:;">&times;</a>');
				
				$("#shade").fadeIn();
				$("#brandClose").show();
				_src = $(this).attr("rev");
				if( _src!='' ){
					$("#shade iframe").attr("src",_src);
				}
				$("#brandClose").click(function(){
					$("#shade").remove();
					$("#brandClose").remove();	
				})
			})
		}
        brandAddShow();	
		
	})
</script>
</body>
</html>

<script type="text/javascript">
    $mark=2; //全局变量
    function addMore(){
        $.get("<{:U('Product/brand_share_ajax')}>",{mark:$mark},function(data){
            var html='';
            if(data==""){
                $(".pager").html("<a href='javascript:;'>没有更多数据啦~</a>");
            }
            $.each(data,function(k,v){

                html +='<div class="box"><div class="content"><a href="javascript:;" rev="__APP__/Product/brand_info/id/'+v.id+'"><img src="__PUBLIC__/Uploads/Product/'+v.prophoto+'" width="274" height="205" /><p class="name">'+v.proname+'</p><div class="memo">'+v.prointo+'</div><div class="what"><span>'+v.time+'</span><em>'+v.pro_dianjiliang+'</em></div></a></div></div>';
            })

            $("#container").append(html);
            $mark=$mark+1;
           // waterFlow();
        },'JSON');

        
    }
</script>