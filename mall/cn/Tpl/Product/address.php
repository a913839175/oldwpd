<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="UTF-8"/>
        <title><{$logodata.sname}></title>
        <meta name="keywords" content="<{$logodata.skeyword}>"/>
        <meta name="description" content="<{$logodata.sjianjie}>"/>
        <link rel="stylesheet" href="__PUBLIC__/Cn/css/order.css?v=20170327">
    <include file="Public:top"/>

</head>
<body>
<include file="Public:newheader"/>
<script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
<script language="javascript" src="__PUBLIC__/Cn/js/pcasunzip.js"></script>
<script language="javascript" src="__PUBLIC__/Cn/js/address.js"></script>

<div class="jifen_orser">
    <div class="jfbj">
        <div class="jifen_orser_head">
            <div class="jifen_orser_head_top1">
                <li><a href="<{:U('index/index')}>">首页&nbsp;</a></li>
                <li><a href="<{:U('Product/index')}>">&gt;&nbsp;微币兑换&nbsp;</a></li>
                <li><a href="<{:U('Product/proinfo',array('id'=>$Product['id']))}>">&gt;&nbsp;商品详情&nbsp;</a></li>
                <li><a href="#">&gt;&nbsp;确认订单&nbsp;</a></li>
            </div>
        </div>
        <div class="jifen_orser_body">
            <if condition="$borrow_list['total']!=0">
                <div class="wegxiangq">
                <div class="jifen_orser_shouhuo_top">产品详情</div>
                <div class="wegxiangq_choose">
                    <div class="wegxiangq_sure">确认产品信息</div>
                <table class="wegxiangq_choose_table">
                    <tr>
                        <th>产品</th>
                        <th>金额(元)</th>
                        <th>到期时间</th>
                        <th>收益(元)</th>
                        <th>兑换产品</th>
                        <th>还款方式</th>
                        <th>确认信息</th>
                    </tr>
                    <tr>
                        <td>微购<{$borrow_list.qixian}>月期</td>
                        <td><{$borrow_list.total}></td>
                        <td><{$borrow_list.endtime|date="Y.m.d",###}></td>
                        <td><{$borrow_list.reward_temp}></td>
                        <td><{$borrow_list.product}></td>
                        <td>还本付息</td>
                        <td>
                        <div class="jf_surez" data-id="0"></div></td>
                    </tr>
                </table>
                <input type="hidden" name="qixian" id="qixian" value="<{$borrow_list.qixian}>">
                <input type="hidden" name="total" id="total" value="<{$borrow_list.total}>">
                <input type="hidden" name="jifen" id="jifen" value="<{$borrow_list.jifen}>">
            </div>
            </div>
            </if>
            <div class="jifen_orser_shouhuo">
                <div class="jifen_orser_shouhuo_top">收货地址</div>
                <div class="jifen_orser_shouhuo_choose">
                    <div>选择地址</div>
                    <input type="hidden" value="<{$default_address}>" id="addressId"/>
                    <table id="table" class="jifen_orser_shouhuo_table">
                        <tr>
                            <th>选择</th>
                            <th>收货人</th>
                            <th>所在地区</th>
                            <th>详细地址</th>
                            <th>邮政编码</th>
                            <th>手机</th>
                            <th>操作</th>
                        </tr>
                        <volist name="address" id="vo"><?php $dznum = $i; ?>
                            <tr id="num_<{$vo.id}>">
                                <td><label id="<{$vo.id}>"><input class="rememberme" lid="<{$vo.id}>" name="check_address" type="radio" value="<{$vo.id}>"/></label></td>
                                <td><{$vo.consignee}></td>
                                <td class="code_to_string"><{$vo.address_code}></td>
                                <td><{$vo.detailed_address}></td>
                                <td><{$vo.postal_code}></td>
                                <td><{$vo.con_phone}></td>
                                <td><input class="num_<{$vo.id}>" onclick="up_click(this)"
                                           type="button" value="修改" data_code="<{$vo.address_code}>" data_id="<{$vo.id}>"><input id="del_<{$vo.id}>" type="button" value="|删除" onclick="del_address(this)" data_id="<{$vo.id}>"/><input id="chg_<{$vo.id}>" type="button" value="设置为默认地址" onclick="change_default_address(this)" data_id="<{$vo.id}>"/>
                                </td>
                            </tr>
                        </volist>

                    </table>
                </div>
                <div class="jifen_orser_shouhuo_new">
                    <div  <lt name="dznum" value="3">id="title"</lt> <egt name="dznum" value="3">onclick="alert('一个用户最多关联3个地址！'); return false;"</egt> class="jifen_orser_new_top">新增地址</div>
                    <div id="content" class="jifen_orser_new_body" style="display: none;">
                        <form action="javascript:;" method="post" onsubmit="return create_address()">
                            <li>
                                <p><span>*</span>收货人姓名</p>
                                <input id="consignee" type="text"  class="input" placeholder="长度不超过25个字符"/><span id="span1" class="span_n"></span>
                            </li>
                            <li>
                                <p><span>*</span>所在地区</p>
    <!--                            <select id="seachprov" name="seachprov"-->
                                <!--                                    onchange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');">-->
                                <!--                            </select>-->
                                <!--                            <select id="seachcity" name="homecity"-->
                                <!--                                    onchange="changeCity(this.value,'seachdistrict','seachdistrict');">-->
                                <!--                            </select>-->
                                <!--                            <span id="seachdistrict_div">-->
                                <!--                            <select id="seachdistrict" name="seachdistrict">-->
                                <!--                            </select>-->
                                <!--                            </span>-->
                                <select id="province" name="province"></select><select id="city" name="city"></select><select id="area" name="area"></select>
                            </li>
                            <li>
                                <p><span>*</span>详细地址</p>
                                <textarea id="detailed_address"  class="input" placeholder="路名或街道地址，门牌号等信息。"></textarea><span id="span2" class="span_n"></span>
                            </li>
                            <li>
                                <p><span>&nbsp;</span> 邮政编码</p>
                                <input id="postal_code" type="text" class="input"  placeholder="6位邮政编码"/><span id="span7" class="span_n"></span>
                            </li>
                            <li>
                                <p><span>*</span>手机号码</p>
                                <input id="con_phone" type="text" class="input"  placeholder="11位手机号"/><span id="span3" class="span_n"></span>
                            </li>
                            <input id="check" class="checkbox" class="input"  type="checkbox"/>
                            <nobr>设置为默认收货地址</nobr>
                            <div>
                                <input class="buttonhover" type="submit" value="保存"/>
                                <input class="buttonhover" id="show_none" type="button" value="取消"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="update_div" class="jifen_orser_shouhuo_new" style="display: none;">
                    <div class="jifen_orser_new_top">修改地址</div>
                    <div class="jifen_orser_new_body">
                        <form action="javascript:;" method="post" onsubmit="return update_address()">
                            <li>
                                <input id="update_id" type="hidden"/>
                                <p><span>*</span>收货人姓名</p>
                                <input id="update_consignee" class="input" type="text" placeholder="长度不超过25个字符"/><span id="span4" class="span_n"></span>
                            </li>
                            <li>
                                <p><span>*</span>所在地区</p>
    <!--                            <select id="update_seachprov" name="seachprov"-->
                                <!--                                    onchange="changeComplexProvince(this.value, sub_array, 'update_seachcity', 'update_seachdistrict');">-->
                                <!--                            </select>-->
                                <!--                            <select id="update_seachcity" name="homecity"-->
                                <!--                                    onchange="changeCity(this.value,'update_seachdistrict','update_seachdistrict');">-->
                                <!--                            </select>-->
                                <!--                            <span id="update_seachdistrict_div">-->
                                <!--                            <select id="update_seachdistrict" name="seachdistrict">-->
                                <!--                            </select>-->
                                <!--                            </span>-->
                                <!--                            <br/>-->
                                <select id="province6" name="province6"></select><select id="city6" name="city6"></select><select id="area6" name="area6"></select>
                            </li>
                            <li>
                                <p><span>*</span>详细地址</p>
                                <textarea id="update_detailed_address" class="input" placeholder="路名或街道地址，门牌号等信息。"></textarea><span id="span5" class="span_n"></span>
                            </li>
                            <li>
                                <p><span>&nbsp;</span> 邮政编码</p>
                                <input id="update_postal_code" type="text" class="input"  placeholder="6位邮政编码"/><span id="span8" class="span_n"></span>
                            </li>
                            <li>
                                <p><span>*</span>手机号码</p>
                                <input id="update_con_phone" type="text" class="input"  placeholder="11位手机号"/><span id="span6" class="span_n"></span>
                            </li>
                            <input id="update_check" class="checkbox"  class="input" type="checkbox"/>
                            <nobr>设置为默认收货地址</nobr>
                            <div>
                                <input class="buttonhover" type="submit" value="保存"/>
                                <input class="buttonhover" id="update_show_none" type="button" value="取消"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="jifen_orser_peisong">
                <div class="jifen_orser_shouhuo_top">配送方式</div>
                <div class="jifen_orser_peisong_body">免费配送</div>
            </div>
            <div class="jifen_orser_list">
                <form action="index.php?m=product&a=exchange" method="post" onsubmit="return post_order()">
                    <div class="jifen_orser_list_top">商品清单</div>
                    <table class="jifen_orser_list_table">
                        <tr>
                            <th width="20%">商品图</th>
                            <th width="20%">商品名称</th>
                            <th width="10%">规格</th>
                            <th width="10%">样式</th>
                            <th width="10%">数量</th>
                            <th width="10%">所需微币</th>

                        </tr>
                        <tr>
                            <td><img src="__PUBLIC__/Uploads/Product/<{$Product.prophoto}>"/></td>
                            <td style="font-size:14px;"><{$Product.proname}></td>
                            <td id="pro_type"><input name="pro_guige" type="hidden" id="pro_guigetwo" value="<{$data.pro_guige}>"><{$data.pro_guige}></td>
                            <td><input name="pro_style" type="hidden" id="pro_styletwo" value="<{$data.pro_style}>"><{$data.pro_style}></td>
                            <td><input name="lang" type="hidden" id="pro_langtwo" value="<{$data.lang}>"><{$data.lang}></td>
                            <if condition="$borrow_list['total']!=0">
                                <td><?php echo $Product['pro_jifen'] ?></td>
                                <else/>
                            <td><?php echo $Product['pro_jifen'] * $data['lang']; ?></td>
                            </if>

                        </tr>
                    </table>
                    <!--            <div class="jifen_orser_list_back"><a href="#">兑换更多商品</a></div>-->
                    <input type="hidden" id="proid" name="proid" value="<{$data.proid}>"/>
                    <input type="hidden" id="pro_address" name="consignee_msg"/>

                    <div class="jifen_orser_list_xiadan clearfix">
                        <div class="sxweizhi">
                            <p class="jf_sxpp">配送费：0元</p>
                            <if condition="$borrow_list['total']!=0">
                                <p class="jf_sxjj">扣除微币：<span><?php echo ($Product['pro_jifen']); ?></span></p>
                                <else/>
                            <p class="jf_sxjj">扣除微币：<span><?php echo ($Product['pro_jifen'] * $data['lang']); ?></span></p>
                            </if>
                            <if condition="$borrow_list['total']!=0">
                            <div class="jf_tzjew">投资金额：<span><{$borrow_list.total}></span>元</div>
                            </if>
                        </div>
                         <div class="jf_ljxd" style="position: relative;z-index: 9;cursor: pointer;">立即下单</div>
                    </div>
                   
                    <div class="zhezljxd" style="width: 210px;height: 50px;position: relative;z-index: 10;left: 779px;top: -165px;display: none;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<include file="Public:footer"/>
<!-- 操作成功的界面 -->
<div class="jf_dfc" style="display: none;">
    <div class="jf_sfc" style="display: none;">
        <div class="jf_fccontent">
            <div class="jf_fccontentz">
                <div class="fc_cgms" id="myresult">您已成功投资<span class="fc_colorblue">100000</span>元，产品到期时间为<span class="fc_colorblue">2019</span>年<span class="fc_colorblue">06</span>月<span class="fc_colorblue">08</span>日，预期本金收益共<span class="fc_colorblue">106688.66</span>元，扣除微币<span class="fc_colorblue">46666</span>，成功兑换<span class="fc_colorblue">微品小米 Max 全网通(4GB内存 128GB ROM）</span>，预计将在15个工作日内为您寄出哟！</div>
            </div>
            <a class="jf_wzxx">好的，我知道了</a>
        </div>
    </div>
    <div class="jf_sfc2" style="display: none;">
        <div class="jf_fccontent">
            <div class="jf_fccontentz">
                <div class="fc_cgmsz" >非常抱歉  WE GO失败!</div>
                <p class="fc_yebzz" id="myresult2">余额不足</p>
            </div>
            <a hrcf="" class="jf_sfreast">好的，我知道了</a>
        </div>
    </div>
</div>
</body>
</html>
