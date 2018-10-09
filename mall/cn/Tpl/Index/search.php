<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$logodata.sname}></title>
<meta name="keywords" content="<{$logodata.skeyword}>" />
<meta name="description" content="<{$logodata.sjianjie}>" />
<include file="Public:top" />
</head>
<body >
<div id="wrap">
  <!--头部-->
    <include file="Public:header" sign="1" />
    <!--banner-->
    <div class="inside_banner">
      <img src="__PUBLIC__/Home/cn/images/inside_banner.png" height="200" width="1600" />
        <div class="banner_title">
          <h2>Search</h2>
            <h3>关键字搜索</h3>
        </div>
    </div>
    <!--主体内容-->
    <div id="main" class="w1000">
      <!--左侧-->
        <div class="main_left fl">
          <div class="left_title">
              关键字搜索
            </div>
            <ul class="left_ul">
              <li class="li_hover"><a href="javascript:void(0)">关键字搜索</a></li>
            </ul>
            <include file="Public:left" />
        </div>
        <!--右侧-->
        <div class="main_right fr">
          <div class="right_title">
              关键字搜索
                <div class="weizhi">
                  您当前的位置：<a href="<{:U('Index/index')}>">首页</a>&nbsp;&gt;&nbsp;
                    <a href="javascript:void(0)">关键字搜索</a>
                </div>
            </div>
            <div class="right_box">
              <if condition="$Think.post.mark neq 4">
                <ul class="news_list1">
                    <foreach name="search_data" item="vo">
                        <li>
                            <a href="<{$vo.url}>">
                                <div class="news_date fl">
                                    <h2><{$vo.showdate|date="d",###}></h2>
                                    <h3><{$vo.showdate|date="Y-m",###}></h3>
                                </div>
                                <div class="news_nr fl">
                                    <h2><{$vo.title}>&nbsp;&nbsp;[所属分类：<{$vo.typename}>]</h2>
                                    <p><{$vo.coninfo}></p>
                                </div>
                            </a>
                        </li>
                    </foreach>
                    
                    
                </ul>
              <else />
                <div class="pro_wrap">
                  <foreach name="search_data" item="vo">
                      <div class="case_box1">
                          <a href="<{$vo.url}>" class="case_a">
                              <img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" height="160" width="212" />
                              <p><{$vo.proname}></p>
                          </a>
                      </div>
                  </foreach>
                 
                </div>
              </if>
              <center>
                  共检索到<font color="red"><{$search_data|count}></font>条数据
              </center>
            </div>
        </div>
    </div>
    <!--底部内容-->
    <include file="Public:footer" />
</div>
    

</body>
</html>
