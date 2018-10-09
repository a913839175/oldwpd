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
<include file="Public:header" sign="1" />
<!--flash-->
<div id="subflash">
  <img src="__PUBLIC__/Home/images/slide1.jpg" width="1920" height="240" />
    <h3 class="subTitle"><span>人才招聘</span><em>Job</em></h3>
</div>
<!----main---->
<div id="submain" class="w1200">
    <div class="subLeft">
        <div class="subTop">
            <ul>
              <li><a  href="<{:U('Job/index')}>">人才战略</a></li>
                <li><a class="on" href="<{:U('Job/job')}>">招聘信息</a></li>
            </ul>
        </div>
        <include file="Public:left" />
    </div>
    <div class="subRight">
        <h3>
            <span>招聘信息</span>
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em>人才招聘<em>&gt;</em>招聘信息</p>
        </h3>
        <div class="subCon">
            <div id="down">
                <table width="100%">
                    <tr class="h">
                        <td width="30%"><span>招聘岗位</span></td>
                        <td width="20%"><span>工作地点</span></td>
                        <td width="20%"><span>招聘人数</span></td>
                        <td width="30%"><span>日期</span></td>
                    </tr>
                    <foreach name="data" item="vo">
                        <tr>
                            <td><span><a href="<{:U('Job/jobinfo',array('id'=>$vo[id]))}>"><{$vo.jobname}></a></span></td>
                            <td><span><{$vo.job_didian}></span></td>
                            <td><span><{$vo.num}></span></td>
                            <td><span><{$vo.addtime|date="Y-m-d H:i:s",###}></span></td>
                        </tr>
                    </foreach>
                    
                    
                </table>
            </div>
            <div class="pager">
               <{$page}>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<include file="Public:footer" />
<script src="__PUBLIC__/Home/js/jcarousellite.js"></script>
<script>
    $("#slideC").jCarouselLite({
       btnNext: ".rightPrev",
       btnPrev: ".leftPrev",
       auto:4000,
       speed:800,
       vertical:false
    });
</script>
</body>
</html>