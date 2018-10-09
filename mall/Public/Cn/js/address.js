$(document).ready(function () {
    new PCAS("province", "city", "area", "浙江省", "宁波市", "江东区");
    new PCAS("province6", "city6", "area6", "江苏省", "苏州市", "沧浪区");

    // 新建地址的显隐
    $('#title').click(function () {
        empty_input();
        $("#content").toggle(500);
        $("#update_div").hide(100);
    });
    $('#show_none').click(function () {
        $("#content").hide(500)
    });
    $('#update_show_none').click(function () {
        $("#update_div").hide(500)
    });
    $("#idtitle").click(function(){
        alert('一个用户最多关联3个地址！');

    });

//        默认地址取值  addressId:当前默认地址id
    var addressId = $("#addressId").val();
    default_addr(addressId);


//        radio的点击效果
    $('label').click(function () {
        var radioId = $(this).attr('id');
        $('label').removeAttr('class') && $(this).attr('class', 'checked');
        // $('input[type="radio"]').removeAttr('checked') && $('#' + radioId).attr('checked', 'checked');
        // $("input[name='check_address']").removeAttr('checked');
        // $("input[name='check_address'][lid=" + radioId + "]").attr("checked", true);
        $('input[name="check_address"][lid="' + radioId + '"]').attr("checked", true);
    });


});


//新增的地址的radio的点击效果
function label_click(obj) {
    var radioId = $(obj).attr('id');
    //alert(radioId);
    $('label').removeAttr('class') && $(obj).attr('class', 'checked');
    // $("input[name='check_address']").removeAttr('checked');
    // $("input[name='check_address'][lid=" + radioId + "]").attr("checked", true);
    $('input[name="check_address"][lid="' + radioId + '"]').attr("checked", true);
}

//初始化表单
function empty_input() {
    new PCAS("province", "city", "area", "浙江省", "宁波市", "江东区");
    new PCAS("province6", "city6", "area6", "浙江省", "宁波市", "江东区");
    $(".input").val('');
}

//    地址改为默认状态
function default_addr(id) {
    $("#del_" + id + "").hide();
    $("#chg_" + id + "").hide();
    $('label').removeAttr('class') && $('#' + id).attr('class', 'checked');
    // $('input[type="radio"]').removeAttr('checked') ;
    // $("input[name='check_address'][lid=" + id + "]").attr("checked", true);
    $('input[name="check_address"][lid="' + id + '"]').attr("checked", true);
    ;
}

//    从默认到非默认
function chg_default_addr(id) {
    $("#del_" + id + "").show();
    $("#chg_" + id + "").show();
}

//    更改radio状态
function check(radio) {
    if (radio.tag == 1) {
        radio.checked = false;
        radio.tag = 0;
    }
    else {
        radio.checked = true;
        radio.tag = 1
    }
}


//创建地址
function create_address() {

    var consignee = $('#consignee').val();
    var address_code = $('#province').val() + " " + $('#city').val() + " " + $('#area').val();
    var detailed_address = $('#detailed_address').val();
    var postal_code = $('#postal_code').val();
    var con_phone = $('#con_phone').val();
    var check = $("#check").is(':checked');
//        alert(check);

    if (consignee.length < 2 || consignee.length >25) {
        $('#span1').html("收件人姓名应为2-25个字符");
        setTimeout(
            "$('#span1').empty();"
            , 3000);
        return false;
    }
    if (detailed_address == '') {
        $('#span2').html("详细地址不能为空");
        setTimeout(
            "$('#span2').empty();"
            , 3000);
        return false;
    }
    if (postal_code.length > 6) {
        $('#span7').html("请填写正确的邮编，不确定请留空或填写000000");
        setTimeout(
            "$('#span7').empty();"
            , 3000);
        return false;
    }
    var telReg = !!con_phone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
//如果手机号码不能通过验证
    if (telReg == false) {
        $('#span3').html("请填写真实有效的手机号码");
        //$("#span3").empty();
        setTimeout(
            "$('#span3').empty();"
            , 3000);
        return false;
    }

    $.post("index.php?m=product&a=create_address", {
        consignee: consignee,
        address_code: address_code,
        detailed_address: detailed_address,
        postal_code: postal_code,
        con_phone: con_phone,
        check: check
    }, function (data) {//update 0:添加成功，更改不成功  1：添加成功，更改成功  2：添加成功，无需更改  3：添加不成功，无从更改
        if (data.c == 2) {//c=1:用户关联地址少于3个 c=2：多于3个
            alert('一个用户最多关联3个地址！')
            $("#content").hide(100);
        }
        else if (data.c == 1) {
            if (data.update == 0) {
                //alert('0');
                empty_input();
            }
            else if (data.update == 1) {
//                alert('1');
//                alert(data.add);
                $("#table").append("<tr id='num_" + data.add + "'><td><label id='" + data.add + "' onclick='label_click(this)'><input lid='" + data.add + "' class='rememberme' name='check_address' type='radio' value='" + data.add + "'/></label></td><td>" + consignee + "</td><td>所在地区</td><td>" + detailed_address + "</td><td>" + postal_code + "</td><td>" + con_phone + "</td>" +
                    "<td><input class='num_" + data.add + "' onclick='up_click(this)' type='button' value='修改' data_code='' data_id='" + data.add + "'> <input id='del_" + data.add + "' type='button' value='|删除' onclick='del_address(this)' data_id='" + data.add + "'/> " +
                    "<input id='chg_" + data.add + "' type='button' value='设置未默认地址' onclick='change_default_address(this)' data_id='" + data.add + "'/></td></tr>");
//                alert(1);

                //alert(data.add);
                default_addr(data.add);
                var addressId = $("#addressId").val();
//                alert(addressId);
                chg_default_addr(addressId);
                $("#addressId").val(data.add);
                if(data.n ==3){
                    $("#title").unbind( "click" )
                    $(".jifen_orser_new_top").attr('onclick',"alert('一个用户最多关联3个地址！'); return false;");
                }
                empty_input();
            }
            else if (data.update == 2) {
//                alert('2');
//            $("#table").append("<tr id='num_"+data.add+"'><td><input id='"+data.add+"' name='check_address' type='radio' value='"+data.add+"'/></td><td>"+consignee+"</td><td>所在地区</td><td>"+detailed_address+"</td><td>"+postal_code+"</td><td>"+con_phone+"</td>" +
//                "<td><input class='num_"+data.add+"' onclick='up_click(this)' type='button' value='修改' data_code='' data_id='"+data.add+"'>| <input type='button' value='删除' onclick='del_address(this)' data_id='"+data.add+"'/> " +
//                "<input type='button' value='设置未默认地址' onclick='change_default_address(this)' data_id='"+data.add+"'/></td></tr>");
                $("#table").append("<tr id='num_" + data.add + "'><td><label id='" + data.add + "' onclick='label_click(this)'><input lid='" + data.add + "' class='rememberme' name='check_address' type='radio' value='" + data.add + "'/></label></td><td>" + consignee + "</td><td>所在地区</td><td>" + detailed_address + "</td><td>" + postal_code + "</td><td>" + con_phone + "</td>" +
                    "<td><input class='num_" + data.add + "' onclick='up_click(this)' type='button' value='修改' data_code='' data_id='" + data.add + "'> <input id='del_" + data.add + "' type='button' value='|删除' onclick='del_address(this)' data_id='" + data.add + "'/> " +
                    "<input id='chg_" + data.add + "' type='button' value='设置未默认地址' onclick='change_default_address(this)' data_id='" + data.add + "'/></td></tr>");
                if(data.n ==3){
                     $("#title").unbind( "click" )
                    $(".jifen_orser_new_top").attr('onclick',"alert('一个用户最多关联3个地址！'); return false;");
                }
                empty_input();
            }
            else {
                alert('出错了哟1');
            }
            $("#content").hide(100);
        }
        else {
            alert('出错了哟2');
        }

        //empty_input();
    }, "json");
}

//修改地址点击弹出表单
function up_click(obj) {
    obj = $(obj);


    $("#update_div").show(500);
    $("#content").hide(100);

    var update_id = $(obj).attr("data_id");
    var update_consignee = $(obj).parent().prev().prev().prev().prev().prev().html();
//        var update_address_code = $(obj).attr("data_code");
    var update_detailed_address = $(obj).parent().prev().prev().prev().html();
    var update_postal_code = $(obj).parent().prev().prev().html();
    var update_con_phone = $(obj).parent().prev().html();

    $('#update_id').val(update_id);
    $('#update_consignee').val(update_consignee);

//        var sheng = update_address_code.length >= 2 ? update_address_code.substr(0, 2) : 0;
//        var shi = update_address_code.length >= 4 ? update_address_code.substr(0, 4) : 0;
//        var qu = update_address_code.length >= 6 ? update_address_code.substr(0, 6) : 0;
//        initComplexArea('update_seachprov', 'update_seachcity', 'update_seachdistrict', area_array, sub_array, sheng, shi, qu);

    var update_area_address = $(obj).parent().prev().prev().prev().prev().html();
//        alert(update_area_address);
    var arr = update_area_address.split(' ');

    new PCAS("province6", "city6", "area6", arr[0], arr[1], arr[2]);
    $('#update_detailed_address').val(update_detailed_address);
    $('#update_postal_code').val(update_postal_code);
    $('#update_con_phone').val(update_con_phone);

}

//修改地址
function update_address() {
    var update_id = $('#update_id').val();
    var update_consignee = $('#update_consignee').val();
    var update_address_code = $('#province6').val() + " " + $('#city6').val() + " " + $('#area6').val();
    var update_detailed_address = $('#update_detailed_address').val();
    var update_postal_code = $('#update_postal_code').val();
    var update_con_phone = $('#update_con_phone').val();
    var update_check = $("#update_check").is(':checked');

    if (update_consignee.length < 2 || update_consignee.length >25) {
        $('#span4').html("收件人姓名应为2-25个字符");
        setTimeout(
            "$('#span4').empty();"
            , 3000);
        return false;
    }
    if (update_detailed_address == '') {
        $('#span5').html("详细地址不能为空");
        setTimeout(
            "$('#span5').empty();"
            , 3000);
        return false;
    }
    if (update_postal_code.length > 6) {
        $('#span8').html("请填写正确的邮编，不确定请留空或填写000000");
        setTimeout(
            "$('#span8').empty();"
            , 3000);
        return false;
    }

    var telReg = !!update_con_phone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
//如果手机号码不能通过验证
    if (telReg == false) {
        $('#span6').html("请填写真实有效的手机号码");
        setTimeout(
            "$('#span6').empty();"
            , 3000);
        return false;
    }
    $.post("index.php?m=product&a=update_address", {
        id: update_id,
        consignee: update_consignee,
        address_code: update_address_code,
        detailed_address: update_detailed_address,
        postal_code: update_postal_code,
        con_phone: update_con_phone,
        check: update_check
    }, function (data) {
//update,chg  00:更新不成功，更改不成功  11：更新成功，更改成功  10：更新成功，无需更改或不成功  01：更新不成功，更改成功
        if (data.update == 1 && data.chg == 1) {

            var tr = $("#num_" + update_id + "");
            tr.children().eq(1).text(update_consignee);
            tr.children().eq(2).text(update_address_code);
            tr.children().eq(3).text(update_detailed_address);
            tr.children().eq(4).text(update_postal_code);
            tr.children().eq(5).text(update_con_phone);

            default_addr(update_id);
            var addressId = $("#addressId").val();
            chg_default_addr(addressId);
            $("#addressId").val(update_id);

            alert('修改成功');
            empty_input();
        }
        else if (data.update == 1 && data.chg == 0) {

            var tr = $("#num_" + update_id + "");
            tr.children().eq(1).text(update_consignee);
            tr.children().eq(2).text(update_address_code);
            tr.children().eq(3).text(update_detailed_address);
            tr.children().eq(4).text(update_postal_code);
            tr.children().eq(5).text(update_con_phone);
            alert('修改成功');
            empty_input();
        }
        else if (data.update == 0 && data.chg == 1) {
            default_addr(update_id);
            var addressId = $("#addressId").val();
            chg_default_addr(addressId);
            $("#addressId").val(update_id);
            alert('修改成功');
            empty_input();
        }
        else {
            //alert('出错咯');
        }

        $("#update_div").hide(100);
    }, "json");
}

//删除地址
function del_address(obj) {
    var del_id = $(obj).attr("data_id");
    if (!confirm("确认要删除？")) {
        window.event.returnValue = false;
    } else {
        $.post("index.php?m=product&a=del_address", {
            id: del_id,
        }, function (data) {
            if (data.d == 1) {
//                alert(del_id);
                alert('删除成功');
                $("#num_" + del_id + "").remove();
                $(".jifen_orser_new_top").attr('id',"title");
                $("#title").bind( "click" );
                $(".jifen_orser_new_top").attr('onclick'," empty_input();$('#content').toggle(500);$('#update_div').hide(100);");
            }
            else {
                alert('出错了哟3');
            }
        }, "json");
    }

}

//更改默认地址
function change_default_address(obj) {
    var cg_df_id = $(obj).attr("data_id");
//        alert(cg_df_id);
    $.post("index.php?m=product&a=change_default_address", {
        id: cg_df_id,
    }, function (data) {
        if (data.update == 1) {

            alert('修改成功')
            default_addr(cg_df_id);
            var addressId = $("#addressId").val();
            chg_default_addr(addressId);
            $("#addressId").val(cg_df_id);
        } else {
//                alert('3');
        }
    }, "json");
}

//确认订单
function post_order() {

    var check_address = $("input[name='check_address']:checked").val();
    //alert(check_address);
    $('#pro_address').val(check_address);
    var pro_address = $('#pro_address').val();
    var proid = $('#proid').val();
    if (pro_address == '') {
        alert('请选择或创建地址');
        return false;
    }
    if (proid == '') {
        alert('请选择要提交的商品');
        return false;
    }
    return true;

}
// add 2016-12-7

/*
 *yangyang修改
 *2016-12-08
 */
// edit 2017-03-17
$(function (){
    $('.jf_ljxd').on('click',function(){
        if(post_order()){
            $('.zhezljxd').show();
            var proid=$("#proid").val(),
            consignee_msg=$("#pro_address").val(),
            pro_guige=$("#pro_guigetwo").val(),
            pro_style=$("#pro_styletwo").val(),
            qixian=$("#qixian").val(),
            total=$("#total").val(),
            jifen=$("#jifen").val(),
            lang=$("#pro_langtwo").val();
            if(qixian==""){
               qixian=0;
               total=0;
               jifen=0;
            }
            $.ajax({
                type:"post",
                url:"./index.php?m=product&a=exchange",
                data:{"proid":proid,"consignee_msg":consignee_msg,"pro_guige":pro_guige,"pro_style":pro_style,"lang":lang,"qixian":qixian,"total":total},
                dataType:"json",
                success:function(data){
                    if(data['msg']==1){
                        $("#myresult").html(data['content']);
                        $('.jf_sfc').show();
                        $('.jf_sfc2').hide();
                    }else{
                        $(".jf_sfreast").attr("href","");
                        if(data['content']=="期限选择错误"){
                            $(".jf_sfreast").attr("href","./mall/index.php");
                        }else{
                            $(".jf_sfreast").attr("href","./?user&q=code/account/recharge_new");
                        }
                        $("#myresult2").html(data['content']);
                        $('.jf_sfc2').show();
                        $('.jf_sfc').hide();
                    }
                    $('.jf_dfc').show();
                    $('.zhezljxd').hide();
                },
                error:function(data){
                        alert("提交失败");
                        window.location.go(-1);
                }
                });
        }else{
            return false;
        }
       // 
        
    }) 
    $('.jf_wzxx').on('click',function(){
        $('.jf_dfc').hide();
         window.location.href="./index.php";
    })
    $('.jf_sfreast').on('click',function(){
        $('.jf_dfc').hide();
         window.location.href="./index.php";
    })
}) 

