<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8" />
    <title><{$logodata.sname}></title>
    <meta name="keywords" content="<{$logodata.skeyword}>" />
    <meta name="description" content="<{$logodata.sjianjie}>" />
    <include file="Public:top" />
    
</head>
<body>
<!--header-->
<include file="Public:header" sign="5" />
<!--flash-->
<div id="subflash">
    <img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>为您服务</span><em>service</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
    <div class="subLeft">
        <div class="subTop">
            <ul>
                <li><a <if condition="$Think.get.qid eq 1 OR $Think.get.qid eq ''">class="on"</if> href="<{:U('Service/index',array('qid'=>1))}>">服务政策</a></li>
                <li><a <if condition="$Think.get.qid eq 2">class="on"</if> href="<{:U('Service/index',array('qid'=>2))}>">客户留言</a></li>
                <li><a <if condition="$Think.get.qid eq 3">class="on"</if> href="<{:U('Service/index',array('qid'=>3))}>">厨电知识</a></li>
                <li><a <if condition="$Think.get.qid eq 4">class="on"</if> href="<{:U('Service/index',array('qid'=>4))}>">销售网络</a></li>
                <li><a <if condition="$Think.get.qid eq 5">class="on"</if> href="<{:U('Service/index',array('qid'=>5))}>">专营店风采</a></li>
                <li><a <if condition="$Think.get.qid eq 6">class="on"</if> href="<{:U('Service/index',array('qid'=>6))}>">下载中心</a>
                    <div class="erji">
                        <a <if condition="$Think.get.qid eq 7">class="on"</if> href="<{:U('Service/index',array('qid'=>7))}>">活动方案下载</a>
                        <a <if condition="$Think.get.qid eq 8">class="on"</if> href="<{:U('Service/index',array('qid'=>8))}>">宣传资料下载</a>
                        <a <if condition="$Think.get.qid eq 9">class="on"</if> href="<{:U('Service/index',array('qid'=>9))}>">其他资料下载</a>
                    </div>
                </li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
        <h3>
            <span>
                <eq name="Think.get.qid" value="">服务政策</eq>
                <eq name="Think.get.qid" value="1">服务政策</eq>
                <eq name="Think.get.qid" value="2">客户留言</eq>
                <eq name="Think.get.qid" value="3">厨电知识</eq>
                <eq name="Think.get.qid" value="4">销售网络</eq>
                <eq name="Think.get.qid" value="5">专营店风采</eq>
                <eq name="Think.get.qid" value="6">活动方案下载</eq>
                <eq name="Think.get.qid" value="7">活动方案下载</eq>
                <eq name="Think.get.qid" value="8">宣传资料下载</eq>
                <eq name="Think.get.qid" value="9">其他资料下载</eq>
            </span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em>为您服务<em>&gt;</em>
                <eq name="Think.get.qid" value="">服务政策</eq>
                <eq name="Think.get.qid" value="1">服务政策</eq>
                <eq name="Think.get.qid" value="2">客户留言</eq>
                <eq name="Think.get.qid" value="3">厨电知识</eq>
                <eq name="Think.get.qid" value="4">销售网络</eq>
                <eq name="Think.get.qid" value="5">专营店风采</eq>
                <eq name="Think.get.qid" value="6">活动方案下载</eq>
                <eq name="Think.get.qid" value="7">活动方案下载</eq>
                <eq name="Think.get.qid" value="8">宣传资料下载</eq>
                <eq name="Think.get.qid" value="9">其他资料下载</eq>
            </p>
        </h3>
        <div class="subCon">
            <if condition="$Think.get.qid eq '' OR $Think.get.qid eq 1">
                <{$service_data.pacon}>
            <elseif condition="$Think.get.qid eq 2" />
            <div id="feedback">
                <div class="form">
                    <form action="<{:U('Contact/feed')}>" name="form1" method="post" onsubmit="return checkfeed()">
                        <p><label>姓名：</label><input type="text" name="username" /><em>&nbsp;</em><label>联系电话：</label><input type="text" name="gus_dianhua" /></p>
                        <p><label>地址：</label><input type="text" name="gus_xiangxidi" /><em>&nbsp;</em><label>电子邮件：</label><input type="text" name="email" /></p>
                        <p><label>留言内容：</label><textarea name="content"></textarea></p>
                        <p><label>&nbsp;</label><input type="submit" value="提交留言" /></p>
                    </form>
                </div>
                <div class="messageShow">
                    <p class="messageNum">全部评论：<em><{$service_data|count}></em>条</p>
                    <div class="messageList">
                        <ul>
                            <foreach name="service_data" item="vo">
                                <li>
                                    <div class="messageImgae">
                                        <img src="__PUBLIC__/Home/images/img2.jpg" />
                                    </div>
                                    <div class="messageMemo">
                                        <dl>
                                            <dt class="guestTitle"><span id="guestName"><{$vo.username}></span><span class="messageTime"><{$vo.addtime|date="Y-m-d H:i:s",###}></span></dt>
                                            <dd class="guestCon">
                                                <p><{$vo.content}></p>
                                            </dd>
                                            <if condition="$vo.reply neq ''">
                                                <dt class="adminTitle"><span id="adminName">管理员回复</span></dt>
                                                <dd class="adminCon">
                                                    <{$vo.reply}>
                                                </dd>
                                            </if>
                                            
                                        </dl>
                                    </div>
                                </li>
                            </foreach>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
            <elseif condition="$Think.get.qid eq 3" />
                <div id="news">
                <dl>
                    <foreach name="service_data" item="vo">
                        <dd><a href="<{:U('Service/info',array('id'=>$vo[id]))}>"><{$vo.title}></a><span><{$vo.showdate|date="Y-m-d",###}></span></dd>
                    </foreach>
                    
                    
                </dl>
            </div>
            <div class="pager">
               <{$page}>
            </div>
            <elseif condition="$Think.get.qid eq 4" />
                <{$service_data.pacon}>
            <elseif condition="$Think.get.qid eq 5" />
            <link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/colorbox.css">
                <div id="fengcai">
                <ul>
                    <foreach name="service_data" item="vo">
                    <li>
                        <a class="group1" href="__PUBLIC__/Uploads/Product/<{$vo.img}>" title="<{$vo.proname}>">
                            <img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" width="266" height="195" />
                            <p><{$vo.proname}></p>
                        </a>
                    </li>
                    </foreach>
                    
                </ul>
            </div>
            <div class="pager">
               <{$page}>
            </div>

            <else />
                <div id="down">
                    <table width="100%">
                        <tr class="h">
                            <td width="38%"><span>文件名称</span></td>
                            <td width="28%"><span>发布时间</span></td>
                            <td width="26%"><span>下载</span></td>
                        </tr>
                        <foreach name="service_data" item="vo">
                            <tr>
                                <td><span><a target="_blank" href="__PUBLIC__/Uploads/Down/File/<{$vo.filecontent}>"><{$vo.filename}></a></span></td>
                                <td><span><{$vo.addtime|date="Y-m-d",###}></span></td>
                                <td><a target="_blank" href="__PUBLIC__/Uploads/Down/File/<{$vo.filecontent}>"><img src="__PUBLIC__/Home/images/down.jpg" /></a></td>
                            </tr>
                        </foreach>
                        
                        
                    </table>
                </div>
                <div class="pager">
                    <{$page}>
                </div>
            </if>

            
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />

<script>
   
    function checkfeed(){
        var form1=document.form1;
        if(form1.username.value==""){
            alert("姓名不能为空");
            form1.username.focus();
            return false;
        }
        if(form1.gus_dianhua.value==""){
            alert("联系电话不能为空");
            form1.gus_dianhua.focus();
            return false;
        }
        if(form1.gus_xiangxidi.value==""){
            alert("地址不能为空");
            form1.gus_xiangxidi.focus();
            return false;
        }
        if(form1.email.value==""){
            alert("电子邮件不能为空");
            form1.email.focus();
            return false;
        }
        if(form1.content.value==""){
            alert("留言内容不能为空");
            form1.content.focus();
            return false;
        }
        return true;
    }


</script>

<script src="__PUBLIC__/Home/js/jquery.colorbox.js"></script>
<script>
   
    
    $(".group1").colorbox({rel:'group1'});
    
</script>
</body>
</html>