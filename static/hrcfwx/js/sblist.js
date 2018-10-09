/*tab部分开始*/
window.onload = function() {
    var oDiv = document.getElementById("tab");
    var oLi = oDiv.getElementsByTagName("div")[0].getElementsByTagName("li");
    var aCon = oDiv.getElementsByTagName("div")[1].getElementsByTagName("article");
    var timer = null;
    for (var i = 0; i < oLi.length; i++) {
        oLi[i].index = i;
        oLi[i].onclick = function() {
            show(this.index);
        }
    }
    function show(a) {
        index = a;
        var alpha = 0;
        for (var j = 0; j < oLi.length; j++) {
            oLi[j].className = "";
            aCon[j].className = "";
            aCon[j].style.opacity = 0;
            aCon[j].style.display = "none";
            aCon[j].style.filter = "alpha(opacity=0)";
        }
        oLi[index].className = "cur";
        clearInterval(timer);
        timer = setInterval(function() {
            alpha += 2;
            alpha > 100 && (alpha = 100);
            aCon[index].style.opacity = alpha / 100;
            aCon[index].style.display = "block";
            aCon[index].style.filter = "alpha(opacity=" + alpha + ")";
            alpha == 100 && clearInterval(timer);
        },
        5)
    }
}

//全部
var all_nowpage=2;
var all_nowno=10;

//投标中
var in_nowpage=2;
var in_nowno=10;

//还款中
var repay_nowpage=2;
var repay_nowno=10;

//已满标
var full_nowpage=2;
var full_nowno=10;

$(function(){

	//加载更多--全部
	$('#getmore_all').click(function(){
		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=wxajax&doaction=sanbiaolist",
            data: {
            	'page':all_nowpage,
            	'epage':all_nowno,
            	'order':'index',
            	'query_type':'tender_success',
            	'group_status':0,
            	'borrow_auto_time':'borrow_auto_time'
            },
            dataType: "json",
            success: function(data){
            	var addhtml="";
            	if(data.status==0){
            		all_nowpage++;
            		if(data.data.length>0){
            			addhtml=sethtml(data.data);
            			$('#all_list').append(addhtml);
            			dopercentage();
            		}else{
            			$.Zebra_Dialog('<span style="font-size:18px;">无更多数据</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
            		}
            	}else{
            		$.Zebra_Dialog('<span style="font-size:18px;">加载失败</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            	}
            }
        });
	});


	//加载更多--投标中
	$('#getmore_in').click(function(){
		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=wxajax&doaction=sanbiaolist",
            data: {
            	'page':in_nowpage,
            	'epage':in_nowno,
            	'order':'index',
            	'query_type':'invest',
            	'group_status':0,
            	'borrow_auto_time':'borrow_auto_time'
            },
            dataType: "json",
            success: function(data){
            	var addhtml="";
            	if(data.status==0){
            		in_nowpage++;
            		if(data.data.length>0){
            			addhtml=sethtml(data.data);
            			$('#in_list').append(addhtml);
            			dopercentage();
            		}else{
            			$.Zebra_Dialog('<span style="font-size:18px;">无更多数据</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
            		}
            	}else{
            		$.Zebra_Dialog('<span style="font-size:18px;">加载失败</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            	}
            }
        });
	});

	//加载更多--还款中
	$('#getmore_repay').click(function(){
		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=wxajax&doaction=sanbiaolist",
            data: {
            	'page':repay_nowpage,
            	'epage':repay_nowno,
            	'order':'index',
            	'query_type':'repay_no',
            	'group_status':0,
            	'borrow_auto_time':'borrow_auto_time'
            },
            dataType: "json",
            success: function(data){
            	var addhtml="";
            	if(data.status==0){
            		repay_nowpage++;
            		if(data.data.length>0){
            			addhtml=sethtml(data.data);
            			$('#repay_list').append(addhtml);
            			dopercentage();
            		}else{
            			$.Zebra_Dialog('<span style="font-size:18px;">无更多数据</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
            		}
            	}else{
            		$.Zebra_Dialog('<span style="font-size:18px;">加载失败</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            	}
            }
        });
	});

	//加载更多--已满标
	$('#getmore_full').click(function(){
		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=wxajax&doaction=sanbiaolist",
            data: {
            	'page':full_nowpage,
            	'epage':full_nowno,
            	'order':'index',
            	'query_type':'full_check',
            	'group_status':0,
            	'borrow_auto_time':'borrow_auto_time'
            },
            dataType: "json",
            success: function(data){
            	var addhtml="";
            	if(data.status==0){
            		full_nowpage++;
            		if(data.data.length>0){
            			addhtml=sethtml(data.data);
            			$('#full_list').append(addhtml);
            			dopercentage();
            		}else{
            			$.Zebra_Dialog('<span style="font-size:18px;">无更多数据</span> ', {
				            'type':     'information',
				            'custom_class': 'info_dialog',
				            'buttons':['确定']
				        });
            		}
            	}else{
            		$.Zebra_Dialog('<span style="font-size:18px;">加载失败</span> ', {
			            'type':     'information',
			            'custom_class': 'info_dialog',
			            'buttons':['确定']
			        });
            	}
            }
        });
	});

    dopercentage();

});

function sethtml(list) {
	var html="";
	$.each(list,function(i,n){
        html=html+'<a class="a-none" href="/wxsbdetail/a'+n['borrow_nid']+'.html">';
        html=html+'<div class="sbmain">';

        html=html+'<div class="s_bt clearfix">';

        html=html+'<div class="main1_body_head_left_img">';
        html=html+formattype(n['borrow_type']);
        html=html+'</div>';
        html=html+'<p>'+n['name']+'</p>';
        html=html+'<div class="main1_body_head_right_img">';
        html=html+formatxingyong(n['borrow_xingyong']);
        html=html+'</div>';
        html=html+'</div>';
        html=html+'<div class="main1_body_body">';
        html=html+'<h1>'+n['borrow_apr_old']+'<span>%</span></h1>';
        html=html+'<p>'+(n['account']/10000)+'万</p>';
        html=html+'<p>'+formatperiod(n['borrow_period'])+'个月</p>';
        html=html+formatstatus(n);
        html=html+'</div>';
        html=html+'<div class="main1_body_foot">';
        html=html+'<div class="main1_body_foot_img">';
        html=html+'<img src="/static/hrcfwx/images/dun.png"/>';
        html=html+'</div>';
        html=html+'<p>新浪支付正式托管微拍贷风险备用金账户</p>';
        html=html+'</div>';
        html=html+'</li>';
        html=html+'</a>';
        html=html+'';
	});
	return html;
}

function sethtml(list) {
    var html="";
    $.each(list,function(i,n){
        html=html+'<a class="a-none" href="/wxsbdetail/a'+n['borrow_nid']+'.html">';
        html=html+'<div class="sbmain">';

        html=html+'<div class="s_bt clearfix">';
        html=html+formatxingyong(n['borrow_xingyong']);
        html=html+'<p class="sb_mc">'+n['name']+'</p>';
        html=html+'<p class="sb_zt">'+formatstatus(n)+'</p>';
        html=html+'</div>';

        html=html+'<div class="s_jieshao clearfix"> ';

        html=html+'<div class="s_nhl">';
        html=html+'<div class="bigy">';
        html=html+'<p class="binum">'+n['borrow_apr_old']+'<span>%</span></p>';
        html=html+'<p class="bisy">预期年化收益</p>';
        html=html+'</div>';
        html=html+'</div>';

        html=html+'<div class="s_nright">';

        html=html+'<div class="s_righttop clearfix">';
        html=html+'<div class="s_rs1">';
        html=html+'<p class="s_rzt1">期限：<span>'+formatperiod(n['borrow_period'])+'个月</span></p>';
        html=html+'<p class="s_rzt1">金额：<span>'+n['account']+'元</span></p>';
        html=html+'<p class="s_rzt1">状态：<span>'+formatstatus(n)+'</span></p>';
        html=html+'</div>';
        html=html+'<div class="s_rs2">'+n['borrow_account_scale_int']+'%</div>';
        html=html+'</div> ';

        html=html+'<div class="s_rightbottom clearfix">';
        html=html+'<img src="/static/hrcfwx/images/sinatb.png">';
        html=html+'<p>新浪支付正式托管微拍贷风险备用金账户</p>';
        html=html+'</div>';

        html=html+'</div>';

        html=html+'</div>';

        html=html+'</div>';

        html=html+'</a>';
    
    });
    return html;
}


function formattype(t){
	var return_html='';

	if(t=='LOANTYPE_ZYD'){
		return_html='<div class="zhuyedai_div">';
		return_html=return_html+'<span>业</span>';
		return_html=return_html+'</div>';

	}else if(t=='LOANTYPE_ZND'){
		return_html='<div class="zhunongdai_div">';
		return_html=return_html+'<span>农</span>';
		return_html=return_html+'</div>';

	}else if(t=='LOANTYPE_JYD'){
		return_html='<div class="jingyingdai_div">';
		return_html=return_html+'<span>精</span>';
		return_html=return_html+'</div>';

	}else if(t=='LOANTYPE_XJD'){
		return_html='<div class="xinjindai_div">';
		return_html=return_html+'<span>薪</span>';
		return_html=return_html+'</div>';

	}else if(t=='LOANTYPE_AJD'){
		return_html='<div class="anjiedai_div">';
		return_html=return_html+'<span>揭</span>';
		return_html=return_html+'</div>';

	}else if(t=='LOANTYPE_DZD'){
		return_html='<div class="dianzhudai_div">';
		return_html=return_html+'<span>店</span>';
		return_html=return_html+'</div>';

	}

	return return_html;
}


function formatxingyong(t){
	var return_html='';
	if(t=="AA"){
		return_html='<img src="/static/hrcfwx/images/AA.png" class="dj_img"/>';
	}else if(t=="A"){
		return_html='<img src="/static/hrcfwx/images/AA_A.png" class="dj_img"/>';
	}else if(t=="B"){
		return_html='<img src="/static/hrcfwx/images/AA_B.png" class="dj_img"/>';
	}else if(t=="C"){
		return_html='<img src="/static/hrcfwx/images/AA_C.png" class="dj_img"/>';
	}else if(t=="D"){
		return_html='<img src="/static/hrcfwx/images/AA_D.png" class="dj_img"/>';
	}else if(t=="E"){
		return_html='<img src="/static/hrcfwx/images/AA_E.png" class="dj_img"/>';
	}else if(t=="HR"){
		return_html='<img src="/static/hrcfwx/images/AA_HR.png" class="dj_img"/>';
	}
	return return_html;
}

function formatperiod(t){
	var return_html='';
	var int_t=parseInt(t);
	if(int_t>=1&&int_t<10){
		return_html=t.substring(0,1);

	}else{
		return_html=t.substring(0,2);
	}
	return return_html;
}

function formatstatus(t){
	var return_html='';
	if(parseInt(t['status'])==1){
		if(parseFloat(t['borrow_account_wait'])==0){
			return_html='审核中';
		}else{
            return_html='投标中'
		}
	}else if(parseInt(t['status'])==3){
		if(parseFloat(t['repay_account_wait'])==0){
			return_html='已成功';
		}else{
			return_html='还款中';
		}
	}else if(parseInt(t['status'])==3){
		if(parseInt(t['status'])==5){
			return_html='已停止';
		}else{
			return_html='已流标';
		}
	}

	return return_html;
}



function dopercentage(){
	var node=$('.main1_body_body_baifenbi');

	for(var i=0;i<node.length;i++){

		var content=node.eq(i).html();
		if(content==""){
			var per=node.eq(i).attr('data-per');

			node.eq(i).radialIndicator({
		        barColor: '#ff7e16',
		        barWidth: window.screen.width*2/320,
		        initValue: per,
		        radius: window.screen.width*23/320,
		        roundCorner: true,
		        fontWeight: 'normal',
		        percentage: true
		    });
		}
	}


}


