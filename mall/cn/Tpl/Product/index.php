<!doctype html>
<html>
<head>
<title>微商城</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge" > 
<include file="Public:head2"/>
    <link href="__PUBLIC__/Cn/css/change.css?v=20170327" rel="stylesheet" type="text/css"/>
    <include file="Public:top"/>


</head>
<body>
<include file="Public:newheader"/>
<style type="text/css">
    html,body{background:#fff;height: auto;}
    #footer{position: relative;} 
</style>
<script>

</script>
   <div class="jg_erbigbox">

<?php
//处理数据
    function getUrlorder($url,$key,$value,$proname,$get,$min,$max){
        $arr = parse_url($url);
        $arr_query = convertUrlQuery($arr['query']);
        $arr_query[$key]=$value;
        if($proname!="" && $get==""){
             $arr_query['proname']=$proname;
        }
        if($min!="" && $arr_query['min']==""){
            $arr_query['min']=$min;
        }
        if($max!="" && $arr_query['max']==""){
            $arr_query['max']=$max;
        }
        if($max=="" && $key=="integral"){
            unset($arr_query['max']);
        }
        if($min=="" && $key=="integral"){
            unset($arr_query['min']);
        }
        if($key=="integral" && $value==""){
            unset($arr_query['integral']);
        }
        $arr_query2=getUrlQuery($arr_query);
        $newurl=$arr["scheme"].$arr["host"].$arr["path"]."?".$arr_query2;
        return $newurl;
    }
//链接处理类别
      function convertUrlQuery($query)
{
    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param) {
        $item = explode('=', $param);
        $params[$item[0]] = $item[1];
    }
    return $params;
}
 

function getUrlQuery($array_query)
{
    $tmp = array();
    foreach($array_query as $k=>$param)
    {
        $tmp[] = $k.'='.$param;
    }
    $params = implode('&',$tmp);
    return $params;
}

 
?>
        <div class="jf_pxshop clearfix">
            <p class="jf_pxfs">排序方式：</p>
            <a href="<?php $url=__SELF__; $key='sort'; $value='pro_jifen';$get=I('get.proname');if(I('get.sort')=="pro_jifen"){$value="pro_jifen2"; echo getUrlorder($url,$key,$value,$proname,$get,$min,$max);}elseif(I('get.sort')=="pro_jifen2"){$value=""; echo getUrlorder($url,$key,$value,$proname,$get,$min,$max);}else{echo getUrlorder($url,$key,$value,$proname,$get,$min,$max);} ?>"><div class="jf_jfb clearfix"><div class="js_jfbbt clearfix"><p class="jf_cgdd <?php if(I('get.sort')=="pro_jifen" || I('get.sort')=="pro_jifen2"){ echo"redborder";}?>">微币</p><if condition="I('get.sort')=='pro_jifen2'"><img src="__PUBLIC__/Cn/images/jfindex/jf_jiantou2.png" class="jf_jiantou"><else /><img src="__PUBLIC__/Cn/images/jfindex/jf_jiantou.png" class="jf_jiantou"></if>
                    </div></div></a>
        </div>
       <if condition="$_GET['opage']==6">
             <!-- 微购推荐 -->
        <div class="jf_wgtj">
            <ul class="jf_wgtjul clearfix">
                <volist name="pro_data" id="vo">
                <li class="jf_wgtjli">
                    
                    <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>" ><img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" class="wgshopimg" /></a>

                    <div class="jf_wgms">
                    <div class="weizhi10">
                           <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>" ><p class="jf_wgmsbt"><{$vo.proname}></p></a>
                          <p class="jf_wgjg"><span class="jf_xianjg">0~<{$vo.pro_jifen}></span><span class="jf_wgwb">微币</span></p> 
                          <div class="jf_wgewsy clearfix">
                              <p class="jf_wejiahao">+</p>
                              <p class="jf_weyqew">预期额外最高收益</p>
                              <p class="jf_wesyjg">¥<{$vo.reward_temp}></p>
                          </div>
                          <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>" class="jf_ljg">GO  ·  购</a>
                    </div>
                    </div>
                    <img src="__PUBLIC__/Cn/images/jfindex/jf_weglogo.png"  class="wegoubt" />
                </li>
                </volist>
            </ul>
        </div>
             <else />
        <div class="ershop">
             <ul class="ershopul clearfix">
                 <if condition="$pro_data==''">您好！未搜索到您需要的产品，请重新搜索！</if>
                 <volist name="pro_data" id="vo">
                <li class="jf_rmtjli">
                    <div class="jf_rmtjtop">
                        <if condition="$vo['income_front'] == '1'">
                            <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>">
                                <else />
                             <a href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>">
                          </if>
                        <img src="__PUBLIC__/Uploads/Product/<{$vo.prophoto}>" class="jf_rmtjimg1" /></a>
                        <if condition="$vo['income_front'] == '1'">
                        <img src="/mall/Public/Cn/images/jfindex/jf_weglogo.png" class="wegoulogo">
                        </if>
                    </div>
                    <div class="jf_rmtjbt">
                        <if condition="$vo['income_front']==1"><a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>"><else/><a href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>"></if>
                        <p class="jf_rmtjseven"><{$vo.proname}></p></a>
                        <div class="jf_newdh clearfix">
                        <p class="jf_rightjf"><span class="jf_qdys"><{$vo.pro_jifen}></span>微币</p>
                        <if condition="$vo['income_front']==1">
                        <a href="<{:U('Product/proinfo2',array('id'=>$vo[id]))}>" ><p class="jf_rmtjdx">兑换</p></a>    
                        <else/>
                        <a href="<{:U('Product/proinfo',array('id'=>$vo[id]))}>" ><p class="jf_rmtjdx">兑换</p></a>
                        </if>
                        
                        
                        </div>
                    </div>
                </li>
                 </volist>

             </ul>
        </div>
       </if>
        <div class="erfenye clearfix">
            <div class="erfenyetwo clearfix">
                <div class="erfenyenum">
                <{$page}>
                </div>
           
            </div> 
            <div class="erfenthree">
             <if condition="$page!=''">
                <p class="erfenyetiaozhuan">跳转至</p>
                <input type="text" name="p" class="erdijiye">
                <p class="erfenye22">页</p>
                <input type="submit" name="button" class="jf_fenyetrue" value="确定"></input>
            </if>
            <script type="text/javascript">
            $(".jf_fenyetrue").click(function(){
              var str = $(".erdijiye").val();
                if(!isNaN(str)){
                    var url="<?php $url=__SELF__; $key='p'; $value='"+str+"';$get=I('get.proname'); echo getUrlorder($url,$key,$value,$proname,$get); ?>";
                    window.location.href=url;
                }else{
                    alert("请输入数字");
                }
            });
            </script>
            </div>
        </div>
        <div class="jf_nav1">
        <div class="jf_navtx">
            <empty name="Think.session.k_user">
             <img src="__PUBLIC__/Cn/images/jfindex/jf_tpixiang2.png" class="jf_navtoux">
            <a href="../?user&amp;q=login"><p class="dlckjf">登录查看微币</p></a>
            <else/>
            <div class="navtxjf" >
            <img src="__PUBLIC__/Cn/images/jfindex/jf_tpixiang.png" class="jf_navtoux">
            <p class="jf_myhb">我的微币</p>
            <p class="jf_mygs"><span class="colorreds"><if condition="$Think.session.k_credit lt 0">0<else /><{$Think.session.k_credit}></if></span>个</p>
            </div>
            </empty>
        </div>
    </div>
    </div>
<script src="__PUBLIC__/Cn/js/jquery.min.1.9.1.js"></script>
<script src="__PUBLIC__/Cn/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/Cn/js/erjiindex.js"></script>
<include file="Public:footer"/>
</body>
</html>





