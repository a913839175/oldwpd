<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
<script type="text/javascript" src="__PUBLIC__/Home/js/jqueryui.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/jqueryui.css">
</head>
<body >
<div id="wrap">
	<!--头部-->
    <include file="Public:header" sign="5" />
    <!--banner-->
    <div class="inside_bannner bg3">
    	<div class="banner_center w1000">
        	<div class="banner_title">
            	<div class="bl fl">
                	网络课程教学
                </div>
                <div class="br fl">
                	<p>Create brand integrity, professional achievements accurate.</p>
                    <p>诚信缔造品牌，专业成就精准。</p>
                </div>
            </div>
        </div>
    </div>
    <!--主体内容-->
    <div id="main" class="w1000">
    	<!--左侧-->
    	<include file="Public:proleft" />
        <!--右侧-->
        <div class="main_right fr">
        	<div class="right_title">
            	<a href="<{:U('Index/index')}>">主页</a>&nbsp;&gt;&nbsp;
                <a href="<{:U('Product/index')}>">网络课程教学</a>&nbsp;&gt;&nbsp;
                <eq name="Think.get.qid" value="">
                    <a href="<{:U('Product/index',array('qid'=>1))}>">基础会计</a>
                </eq>
                <eq name="Think.get.qid" value="1">
                    <a href="<{:U('Product/index',array('qid'=>1))}>">基础会计</a>
                </eq>
                <eq name="Think.get.qid" value="2">
                    <a href="<{:U('Product/index',array('qid'=>2))}>">企业财务会计</a>
                </eq>
                <eq name="Think.get.qid" value="3">
                    <a href="<{:U('Product/index',array('qid'=>3))}>">企业电算化</a>
                </eq>
                &nbsp;&gt;&nbsp;
                <a href="javascript:void(0)"><{$pro_type_name}></a>
            </div>
            <div class="right_box">
            	<ul class="zhangjie">
                    <foreach name="wl_data" item="vo">
                        <li>
                            <h2><a href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>"><{$vo.proname}></a></h2>
                            <p><{$vo.prointo}></p>
                            <a href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>" class="to_video" onclick="return checksession()"></a>
                        </li>
                    </foreach>
                	
                    
                </ul>    
                <div class="pager">
                    <{$page}>
                </div>
                <div class="right_bottom"></div>
            </div> 
        </div>
        <div class="clear"></div>
    </div>
    <!--底部-->
    <include file="Public:footer" />
</div>
    
<div id="dialog" style="display:none;">

        <ul class="login_list1">
           
            <li>
                <input type="text" name="k_user" class="input_style k_user" placeholder="输入学号" />
            </li>
            <li>
                <input type="password" name="k_pass" class="input_style k_pass" placeholder="输入密码" />
            </li>
            <li class="zidong_li">
                <!-- <input type="checkbox" name="" />下次自动登录 -->
            </li>
            
        </ul>
        <input type="hidden" name="session_user" value="<{$Think.session.k_user}>">
   
</div>
</body>
</html>
<script type="text/javascript">
    function checksession(){
        var session_user = $("input[name='session_user']").val();
        if(session_user!=''){
            return true;
        }else{
            //$("#dialog").html("请先登录");
            $("#dialog").dialog({
                'width':400,
                'height':250,
                'title':"快速登录",
                'modal':true,
                'buttons':{
                  '登录':function(){
                     var user_val = $(".k_user").val();
                     var pass_val = $(".k_pass").val();
                     if(user_val==""){
                        alert('学号不能为空！');
                     }else if(pass_val==""){
                        alert('密码不能为空！');
                     }else{
                         $.get("<{:U('Member/quicklogin')}>",{user_val:user_val,pass_val:pass_val},function(data){
                            if(data!=0){
                                alert('登录成功');
                                $(".top_ul li").slice(2,4).hide();
                                
                                $(".top_ul").append('<li>欢迎您，'+data+'<a href="__APP__/Member/logout">退出</a></li>');
                                //设置session
                                $("input[name='session_user']").val(data);
                                $("#dialog").dialog('close');

                            }else{
                                alert('用户名或密码错误!');
                            }
                         });
                     }
                    
                  },
                  '关闭':function(){
                    $("#dialog").dialog('close');
                  }
                }
              });
            return false;
        }
     
    }
    // $(function(){

    // })
</script>