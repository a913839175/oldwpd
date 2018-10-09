var nowpage=2;
var nowno=10;
$(function(){

	//加载更多
	$('#getmore').click(function(){
		$.ajax({
            type: "post",
            url: "/index.php?wxuser&q=wxajax&doaction=tenderlist",
            data: {
            	'page':nowpage,
            	'borrow_nid_like':'WADDYFANTWOYEAR'
            },
            dataType: "json",
            success: function(data){
            	var addhtml="";
            	if(data.status==0){
            		nowpage++;
            		if(data.data.length>0){
            			addhtml=sethtml(data.data);
            			$('#tenderlist').append(addhtml);
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
});

function sethtml(list) {
	var html="";
	$.each(list,function(i,n){
        html=html+'<li>';
        html=html+'<div class="list_left">'+n['username'];
        html=html+'</div>';
        html=html+'<div class="list_right">';
        html=html+'<p>'+n['account']+'元</p><br/>';
        html=html+'<span>'+formatDate(n['addtime'])+'</span>';
        html=html+'</div>';
        html=html+'</li>';
	});
	return html;
}

function   formatDate(tm)   {  
	var now=new Date(parseInt(tm * 1000));  
	var year=now.getFullYear();     
	var month=now.getMonth()+1;  
	if(month.toString().length<2){
		month='0'+month.toString();
	}  
	var date=now.getDate();
	if(date.toString().length<2){
		date='0'+date.toString();
	}      
	var hour=now.getHours();     
	var minute=now.getMinutes();     
	var second=now.getSeconds();     
	return year+"-"+month+"-"+date;     
} 