var nowpage=1;
var nowno=15;
$(function(){

	var borrow_nid=$('#this_borrow_nid').val();
	
	$('#getmorefirst').click(function(){
		if(nowpage==1){
			$.ajax({
		        type: "post",
		        url: "/index.php?user&q=doajax&doaction=tenderlist",
		        data: {
		            'page':nowpage,
		            'borrow_nid':borrow_nid,
		            'epage':nowno
		        },
		        dataType: "json",
		        success: function(data){
		            var addhtml="";
		            if(data.status==0){
		            	nowpage++;
		            	if(data.data.length>0){
		            		addhtml=sethtml(data.data);
		            		$('#Investorform').append(addhtml);
		            	}else{
		            	}
		            }else{
		            }
		         },
		         error:function(err){
		         }
		     });
	     }	
	});
	
	//加载更多
	$('#getmore').click(function(){
		$.ajax({
            type: "post",
            url: "/index.php?user&q=doajax&doaction=tenderlist",
            data: {
            	'page':nowpage,
            	'borrow_nid':borrow_nid,
                'epage':nowno
            },
            dataType: "json",
            success: function(data){
            	var addhtml="";
            	if(data.status==0){
            		nowpage++;
            		if(data.data.length>0){
            			addhtml=sethtml(data.data);
            			$('#Investorform').append(addhtml);
            		}else{
                        $('.more_div').addClass('active');
            			$('.more_div').html('无更多数据~');
            		}
            	}else{
			        alert('加载失败');
            	}
            },
            error:function(err){
            	alert('网络错误');
            }
        });
	});
        
        //红包选择
        $('#invest-submit').click(function(){
            var account=$('.ui-input-text').val();
            if(account>0){
                $.ajax({
                    type: "post",
                    url: "/index.php?user&q=doajax&doaction=hongbaolist",
                    data: {
                        'borrow_nid':borrow_nid,
                        'account':account
                    },
                    dataType: "json",
                    success: function(data){
                        var addhtml="暂无可用红包";
                        if(data.status==0){
                            if(data.data.length>0){
                                var addhtml='<select name="hongbaoid" style="float:left;display:block;margin-top:5px"><option value="">请选择红包</option>';
                                $.each(data.data,function(i,n){
                                    addhtml=addhtml+'<option value="'+n['id']+'">'+n['title']+'</option>';
                                });
                                addhtml=addhtml+'</select>';
                            }
                        }
                        $('#hongbao_span').html(addhtml);
                    },
                    error:function(err){
                        $('#hongbao_span').html("暂无可用红包");
                        alert('红包数据加载失败');
                    }
                });
            }
        });
});


function sethtml(list) {
	var html="";
	$.each(list,function(i,n){
		var this_key=(parseInt(nowpage)-2)*parseInt(nowno)+parseInt(i)+1;
        html=html+'<tr class="dark ">';

        html=html+'<td>';
        html=html+'<div class="ui-td-bg pl60">'+this_key+'</div>';
        html=html+'</td>';

        html=html+'<td>';
        html=html+'<div class="ui-td-bg pl25">';
        html=html+n['username'];
        html=html+'</div>';
        html=html+'</td>';

        html=html+'<td class="text-right">';
        html=html+'<div class="ui-td-bg pr70">';
        html=html+'<em>'+n['account']+'</em>元</div>';
        html=html+'</td>';
		
		html=html+'<td class="text-right">';
        html=html+'<div class="ui-td-bg pr70">';
        html=html+'<em>'+n['addtime']+'</em></div>';
        html=html+'</td>';
		
        html=html+'</tr>';

	});
	return html;
}

