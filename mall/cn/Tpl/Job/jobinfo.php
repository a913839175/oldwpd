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
            <p class="local">当前位置：<a href="<{:U('Index/index')}>">首页</a><em>&gt;</em><a href="<{:U('Job/job')}>">人才招聘</a><em>&gt;</em>招聘信息</p>
        </h3>
        <div class="subCon">
            <div class="jobShow">
                <h4><{$data.jobname}></h4>
                <table>
                    <tr>
                        <td><Span>工作地点：<{$data.job_didian}></Span></td>
                        <td><Span>部门：<{$data.job_bumen}></Span></td>
                        <td><Span>发布日期：<{$data.addtime|date="Y-m-d",###}></Span></td>
                    </tr>
                    <tr>
                        <td><Span>工作年限：<{$data.workhours}></Span></td>
                        <td><Span>学历：<{$data.jobeduc}></Span></td>
                        <td><Span>招聘人数：<{$data.num}></Span></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="memo">
                                <h5 class="memoTitle">职位描述：</h5>
                                <div class="text">
                                    <{$data.other}>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
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