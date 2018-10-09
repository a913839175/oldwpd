<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<load href="__PUBLIC__/Css/admin.css" />
<load href="__PUBLIC__/Js/jquery.js" />
<style>
  table{
    font-size: 14px;
    font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;
  }
  .menutd{
    font-size: 12px;
    padding-left: 60px;

  }
  .menuChild{
    display: block;

  }


  
</style>

<SCRIPT language=javascript>
	function expand(el)
	{
    var jsarr = new Array(2,5,6,7,8,9,10,11,12,13,14,15,16);
		childObj = document.getElementById("child" + el);

		if (childObj.style.display == 'none')
		{
			//childObj.style.display = 'block';
      $(childObj).fadeIn("1000");
      $(".parent_"+el).addClass("ParentHoverJs");
      for(var i=0;i<jsarr.length;i++){

        if(el==jsarr[i]){
          continue;
        }else{
          $("#child"+jsarr[i]).hide();
          $(".parent_"+jsarr[i]).removeClass("ParentHoverJs");
        }
      }
		}
		else
		{
			$(childObj).hide();
      $(".parent_"+el).removeClass("ParentHoverJs");
		}
		return;
	}
</SCRIPT>
<script type="text/javascript">
  $(function(){
    $(".ParentHover").click(function(){
      var dataclss = $(this).attr("dataclss");
      expand(dataclss);
    })

    
  })
</script>
</HEAD>
<BODY>

<TABLE height="100%" cellSpacing=0 cellPadding=0 width=234 
background=__PUBLIC__/Images/menu_bg.jpg border=0 style="overflow:hidden">
  <TR>
    <TD vAlign=top align=middle>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        
        <TR>
          <TD height=0></TD></TR></TABLE>

      <!--系统设置-->
      <if condition="(($data[rshell] & 256) eq 256) and (($xmlsum & 256) eq 256)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_12" dataclss="12"><A 
            class=menuParent
            href="javascript:void(0);">系统设置</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child12 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Siteinfo/index")}>' 
            target=main>-&nbsp;基本信息</A></TD></TR>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Bak/index")}>' 
            target=main>-&nbsp;数据备份</A></TD></TR>
         <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Setting/index")}>' 
            target=main>-&nbsp;参数设置</A></TD></TR>

         <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Setting/batch_import")}>' 
            target=main>-&nbsp;批量导入</A></TD></TR>

          <!--<TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Setting/product_import")}>' 
            target=main>-&nbsp;复制产品</A></TD></TR>-->

          <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Setting/setlang")}>' 
            target=main>-&nbsp;语言设置</A></TD></TR>


          
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
      <else />
      </if> 


          
      <!--新闻中心-->
    
      <if condition="(($data[rshell] & 1) eq 1) and (($xmlsum & 1) eq 1)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_2" dataclss="2"><A 
            class=menuParent 
            href="javascript:void(0);">新闻中心</A>
          </TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child2 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        
        <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Content/add")}>' 
            target=main>-&nbsp;添加新闻</A></TD></TR>
            
        <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Content/clist")}>' 
            target=main>-&nbsp;新闻管理</A></TD></TR>
            
        <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Contentclas/add")}>' 
            target=main>-&nbsp;新闻分类</A></TD></TR>
            
         <TR height=30 class="hoverbg">
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Contentclas/cclist")}>' 
            target=main>-&nbsp;分类管理</A></TD></TR>
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
      
  		<else />
        </if>
    
    
      <!--产品中心-->
      <if condition="(($data[rshell] & 2) eq 2) and (($xmlsum & 2) eq 2)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_5" dataclss="5"><A 
            class=menuParent 
            href="javascript:void(0);">产品中心</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child5 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
       
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Product/add")}>' 
            target=main>-&nbsp;添加产品</A></TD></TR>
        <TR height=30 class="hoverbg">
       
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Product/plist")}>' 
            target=main>-&nbsp;产品管理</A></TD></TR>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Productclas/add")}>' 
            target=main>-&nbsp;添加分类</A></TD></TR>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Productclas/pclist")}>' 
            target=main>-&nbsp;分类管理</A></TD></TR>
            <TR height=30 class="hoverbg">
      
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Product/orderlist")}>' 
            target=main>-&nbsp;查看订单</A></TD></TR>

        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
      <else />
       </if>

      <!--留言管理-->
      <if condition="(($data[rshell] & 4) eq 4) and (($xmlsum & 4) eq 4)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_6" dataclss="6"><A 
            class=menuParent 
            href="javascript:void(0);">留言管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child6 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Comments/mlist")}>' 
            target=main>-&nbsp;留言列表</A></TD></TR>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Comments/feed_mail")}>' 
            target=main>-&nbsp;邮件提醒</A></TD></TR>
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
      <else />
       </if>  
          
      <!--会员管理-->
      <if condition="(($data[rshell] & 8) eq 8) and (($xmlsum & 8) eq 8)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_7" dataclss="7"><A 
            class=menuParent 
            href="javascript:void(0);">会员管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child7 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Member/add")}>' 
            target=main>-&nbsp;添加会员</A></TD></TR>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Member/mlist")}>' 
            target=main>-&nbsp;会员列表</A></TD></TR>
        <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Role/add")}>' 
            target=main>-&nbsp;添加角色</A></TD></TR>
        <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Role/rlist")}>' 
            target=main>-&nbsp;角色列表</A></TD></TR>
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
      <else />
       </if>            
       
       <!--招聘管理-->
       <if condition="(($data[rshell] & 16) eq 16) and (($xmlsum & 16) eq 16)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_8" dataclss="8"><A 
            class=menuParent
            href="javascript:void(0);">招聘管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child8 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Job/add")}>' 
            target=main>-&nbsp;添加招聘</A></TD></TR>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Job/index")}>' 
            target=main>-&nbsp;招聘列表</A></TD></TR>
        <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Job/resume")}>' 
            target=main>-&nbsp;查看简历</A></TD></TR>
       
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>  
 		<else />
       </if> 
 
 		 <!--下载管理-->
       <if condition="(($data[rshell] & 32) eq 32) and (($xmlsum & 32) eq 32)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_9" dataclss="9"><A 
            class=menuParent 
            href="javascript:void(0);">下载管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child9 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Down/add")}>' 
            target=main>-&nbsp;添加下载</A></TD></TR>
        <TR height=30 class="hoverbg">
      
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Down/plist")}>' 
            target=main>-&nbsp;下载列表</A></TD></TR>
        <TR height=30 class="hoverbg">
      
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Downclas/add")}>' 
            target=main>-&nbsp;添加分类</A></TD></TR>
           <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Downclas/pclist")}>' 
            target=main>-&nbsp;分类列表</A></TD></TR>
       
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>  
 		<else />
        </if> 
 
       <!--图册管理-->
       <if condition="(($data[rshell] & 64) eq 64) and (($xmlsum & 64) eq 64)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_10" dataclss="10"><A 
            class=menuParent 
            href="javascript:void(0);">图册管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child10 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Atlas/add")}>' 
            target=main>-&nbsp;添加图册</A></TD></TR>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Atlas/plist")}>' 
            target=main>-&nbsp;图册列表</A></TD></TR>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Atlasclas/add")}>' 
            target=main>-&nbsp;添加分类</A></TD></TR>
           <TR height=30 class="hoverbg">
          
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Atlasclas/pclist")}>' 
            target=main>-&nbsp;分类列表</A></TD></TR>
       
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE> 
          <else />
        </if> 
        
      <!--内容管理-->
      <if condition="(($data[rshell] & 128) eq 128) and (($xmlsum & 128) eq 128)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_11" dataclss="11"><A 
            class=menuParent 
            href="javascript:void(0);">内容管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child11 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
    
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Pacontent/add")}>' 
            target=main>-&nbsp;添加内容</A></TD></TR>
        <TR height=30 class="hoverbg">
  
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Pacontent/palist")}>' 
            target=main>-&nbsp;内容列表</A></TD></TR>
        <TR height=30 class="hoverbg">
 
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Paconcla/add")}>' 
            target=main>-&nbsp;添加分类</A></TD></TR>
        <TR height=30 class="hoverbg">

          <TD class="menutd"><A class=menuChild 
            href='<{:U("Paconcla/paconlist")}>' 
            target=main>-&nbsp;分类列表</A></TD></TR>
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
          <else />
        </if> 
          
      

  <if condition="(($data[rshell] & 1024) eq 1024) and (($xmlsum & 1024) eq 1024)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_14" dataclss="14"><A 
            class=menuParent 
            href="javascript:void(0);">SEO管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child14 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Seoset/keywords")}>' 
            target=main>-&nbsp;关键词设置</A></TD></TR>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Seoset/robots")}>' 
            target=main>-&nbsp;生成Robots文件</A></TD></TR>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Seoset/cache")}>' 
            target=main>-&nbsp;更新缓存</A></TD></TR>
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
          <else />
      </if> 
        <!--栏目管理-->
      <if condition="(($data[rshell] & 2048) eq 2048) and (($xmlsum & 2048) eq 2048)">
       <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_15" dataclss="15"><A 
            class=menuParent 
            href="javascript:void(0);">栏目管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child15 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Seoset/catelist")}>' 
            target=main>-&nbsp;栏目列表</A></TD></TR>
        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
        <else />
      </if> 

       <!--表单自定义-->
      <if condition="(($data[rshell] & 512) eq 512) and (($xmlsum & 512) eq 512)">
      <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_13" dataclss="13"><A 
            class=menuParent 
            href="javascript:void(0);">自定义字段</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child13 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
         
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Custom/index")}>' 
            target=main>-&nbsp;模块列表</A></TD></TR>
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
      <else />
   	  </if> 


       <!--题库管理-->
      <if condition="(($data[rshell] & 4096) eq 4096) and (($xmlsum & 4096) eq 4096)">
       <TABLE cellSpacing=0 cellPadding=0 width=233 border=0>
        <TR height=35>
          <TD style="PADDING-LEFT: 60px" background=__PUBLIC__/Images/menu_bt.jpg class="ParentHover parent_16" dataclss="16"><A 
            class=menuParent 
            href="javascript:void(0);">题库管理</A></TD></TR>
        <TR height=1>
          <TD></TD></TR></TABLE>
      <TABLE id=child16 style="DISPLAY: none" cellSpacing=0 cellPadding=0 
      width=233 border=0>
        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Siteinfo/set_answer")}>' 
            target=main>-&nbsp;题库设置</A></TD></TR>

        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Siteinfo/set_type")}>' 
            target=main>-&nbsp;分类设置</A></TD></TR>

        <TR height=30 class="hoverbg">
        
          <TD class="menutd"><A class=menuChild 
            href='<{:U("Siteinfo/answer_view")}>' 
            target=main>-&nbsp;答题汇总</A></TD></TR>

        
        <TR height=1>
          <TD colSpan=2></TD></TR></TABLE>
        <else />
      </if> 
      
      </TD>
    <TD width=1 bgColor=#d1e6f7></TD></TR></TABLE>
   
    </BODY></HTML>
