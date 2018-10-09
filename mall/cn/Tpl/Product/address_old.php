<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8"/>
    <title><{$logodata.sname}></title>
    <meta name="keywords" content="<{$logodata.skeyword}>"/>
    <meta name="description" content="<{$logodata.sjianjie}>"/>
    <link rel="stylesheet" href="__PUBLIC__/Cn/css/order.css">
    <include file="Public:top"/>

</head>
<body>
<include file="Public:newheader"/>
<div class="jifen_orser">
    <div class="jifen_orser_head">
        <div class="jifen_orser_head_top1">
            <li><a href="#">微商城&nbsp;</a></li>
            <li><a href="#">&gt;&nbsp;微币兑换&nbsp;</a></li>
            <li><a href="#">&gt;&nbsp;商品详情&nbsp;</a></li>
            <li><a href="#">&gt;&nbsp;确认订单&nbsp;</a></li>
        </div>
    </div>
    <div class="jifen_orser_body">
        <div class="jifen_orser_shouhuo">
            <div class="jifen_orser_shouhuo_top">收货地址</div>
            <div class="jifen_orser_shouhuo_choose">
                <div>选择地址</div>
                <table class="jifen_orser_shouhuo_table">
                    <tr>
                        <th>选择</th>
                        <th>收货人</th>
                        <th>所在地区</th>
                        <th>详细地址</th>
                        <th>邮政编码</th>
                        <th>手机</th>
                        <th>操作</th>
                    </tr>
                    <volist name="address" id="vo">
                    <tr>
                        <td><input name="check_address"  type="radio" checked="checked"></td>
                        <td><{$vo.consignee}></td>
                        <td class="code_to_string"><{$vo.address_code}></td>
                        <td><{$vo.detailed_address}></td>
                        <td><{$vo.postal_code}></td>
                        <td><{$vo.con_phone}></td>
                        <td><input type="button" value="修改">|<input type="button" value="删除">
                            <input type="button" value="设置未默认地址">
                        </td>
                    </tr>
                    </volist>

                </table>
            </div>
            <div class="jifen_orser_shouhuo_new">
                <div class="jifen_orser_new_top">新增地址</div>
                <div class="jifen_orser_new_body">
                    <form action="javascript:;" method="post" onsubmit="return create_address()">
                        <li>
                            <p><span>*</span>收货人姓名</p>
                            <input id="consignee" type="text" placeholder="长度不超过25个字符"/>
                        </li>
                        <li>
                            <p><span>*</span>所在地区</p>
                            <select id="seachprov" name="seachprov"
                                    onchange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');">
                            </select>
                            <select id="seachcity" name="homecity"
                                    onchange="changeCity(this.value,'seachdistrict','seachdistrict');">
                            </select>
                            <span id="seachdistrict_div">
                            <select id="seachdistrict" name="seachdistrict">
                            </select>
                            </span>
                            <!--                            <input id="address_code" type="hidden" value=""/>-->
                            <!---->
                            <!--                            <input type="button" value="获取地区" onclick="showAreaID()"/>-->


                        </li>
                        <li>
                            <p><span>*</span>详细地址</p>
                            <textarea id="detailed_address" placeholder="路名或街道地址，门牌号等信息。"></textarea>
                        </li>
                        <li>
                            <p><span>&nbsp;</span> 邮政编码</p>
                            <input id="postal_code" type="text" placeholder="6位邮政编码"/>
                        </li>
                        <li>
                            <p><span>*</span>手机号码</p>
                            <input id="con_phone" type="text" placeholder="11位手机号"/>
                        </li>
                        <input id="check" class="checkbox" type="checkbox"/>
                        <nobr>设置为默认收货地址</nobr>
                        <div>
                            <input type="submit" value="保存"/>
                            <input id="show_none" type="button" value="取消"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="jifen_orser_peisong">
            <div class="jifen_orser_peisong_top">配送方式</div>
            <div class="jifen_orser_peisong_body">免费配送</div>
        </div>
        <div class="jifen_orser_list">
            <div class="jifen_orser_list_top">商品清单</div>
            <table class="jifen_orser_list_table">
                <tr>
                    <th>商品图</th>
                    <th>商品名称</th>
                    <th>所需微币</th>
                    <th>操作</th>
                </tr>
                <tr>
                    <td><img src="images/new4.png"/></td>
                    <td>Beats pill 2.0 无线蓝牙药丸胶囊音箱</td>
                    <td>96000</td>
                    <td><input type="button" value="删除"/></td>
                </tr>
            </table>
            <div class="jifen_orser_list_back"><a href="#">兑换更多商品</a></div>
            <div class="jifen_orser_list_xiadan">
                <p>配送费：0元</p>

                <p>所需微币：<span>96000</span></p>
                <input type="button" value="立即下单"/>
            </div>
        </div>
    </div>
    <div class="jifen_orser_hot">
        <div class="jifen_orser_hot_top"><img src="images/hot.png"/>热门兑换</div>
        <div class="jifen_orser_hot_lis">
            <li>
                <a href="#">
                    <div class="jifen_orser_hot_li">
                        <img src="images/hot1.png"/>

                        <div>新秀丽拉杆箱20寸</div>
                        <p>285600微币</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="jifen_orser_hot_li">
                        <img src="images/hot2.png"/>

                        <div>新秀丽拉杆箱20寸</div>
                        <p>69600微币</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="jifen_orser_hot_li">
                        <img src="images/hot3.png"/>

                        <div>新秀丽拉杆箱20寸</div>
                        <p>106800微币</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="jifen_orser_hot_li">
                        <img src="images/hot4.png"/>

                        <div>新秀丽拉杆箱20寸</div>
                        <p>285600微币</p>
                    </div>
                </a>
            </li>
        </div>
    </div>
</div>
<script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
<script src="__PUBLIC__/Cn/js/Area.js" type="text/javascript"></script>
<script src="__PUBLIC__/Cn/js/AreaData_min.js" type="text/javascript"></script>
<script type="text/javascript">

    $(function () {
        initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '44', '0', '0');
        var code_to_string=$('.code_to_string').html();
        var the_code=getAreaNamebyID(code_to_string);
        $('.code_to_string').html(the_code);
        $('#title').click(function () {
            $("#content").toggle(500)
        });
        $('#show_none').click(function () {
            $("#content").hide(500)
        });
    });

    //得到地区码
    function getAreaID() {
        var area = 0;
        if ($("#seachdistrict").val() != "0") {
            area = $("#seachdistrict").val();
        }
        else if ($("#seachcity").val() != "0") {
            area = $("#seachcity").val();
        }
        else {
            area = $("#seachprov").val();
        }

        return area;
    }

    //根据地区码查询地区名
    function getAreaNamebyID(areaID) {
        var areaName = "";
        if (areaID.length == 2) {
            areaName = area_array[areaID];
        }
        else if (areaID.length == 4) {
            var index1 = areaID.substring(0, 2);
            areaName = area_array[index1] + " " + sub_array[index1][areaID];
        }
        else if (areaID.length == 6) {
            var index1 = areaID.substring(0, 2);
            var index2 = areaID.substring(0, 4);
            areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
        }
        return areaName;
    }
    function create_address() {
        var consignee = $('#consignee').val();
        var address_code = getAreaID();
        var detailed_address = $('#detailed_address').val();
        var postal_code = $('#postal_code').val();
        var con_phone = $('#con_phone').val();
        var check = $('#check').val();

//        var password = $('#password').val();
//        var repassword = $('#repassword').val();
//        if (old_password == '') {
//            layer.tips('请输入原始账号', '#old_password');
//            return false;
//        }
//
//        if (password == '') {
//            layer.tips('请输入新密码', '#password');
//            return false;
//        }
//        if (repassword == '') {
//            layer.tips('请再次输入新密码', '#repassword');
//            return false;
//        }
//        if (password != repassword) {
//            layer.msg('两次密码必须一样');
//            return false;
//        }
        $.post("index.php?m=product&a=create_address", {
            consignee: consignee,
            address_code: address_code,
            detailed_address: detailed_address,
            postal_code: postal_code,
            con_phone: con_phone,
            check: check
        }, function (data) {
            if (data == 1) {
                alert('1');

            }
            else if (data == 2) {
                alert('2');
            }
            else {
                alert('3');
            }
        }, "json");
    }

</script>
</body>
</html>
