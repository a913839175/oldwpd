// var box = document.getElementById("div1"), can = true;
// box.innerHTML += box.innerHTML;
// box.onmouseover = function () {
//     can = false
// };
// box.onmouseout = function () {
//     can = true
// };
// new function () {
//     var stop = box.scrollTop % 38 == 0 && !can;
//     if (!stop)box.scrollTop == parseInt(box.scrollHeight / 2) ? box.scrollTop = 0 : box.scrollTop++;
//     setTimeout(arguments.callee, box.scrollTop % 38 ? 10 : 1500);
// };
// add 9-13
$(function () {
     //大图小图的切换
     $('.jf_smallli').on('mouseover',function(){
       jf_index1=$(this).index();
       // console.log(jf_index1)
        smallsrc=$(this).find('.jf_smallimg').attr('src')
        $('.jgbigsmall').attr('src',smallsrc);

    });
    //li的格局调整
    $(function(){
    $('.jf_jxspsecendlione').first().css('margin-top','7px');
    $('.jf_jxspsecendlisix').last().css('margin-bottom','20px');
    })
    //商品的减法运算
    $(function(){
    $("#jianlang").click(function(){
        var num=$(".jf_sanjinum").val();

        if(num<=1){
            alert("已经最小了，不能再减小了");
        }else{
            num=--num;
            $(".jf_sanjinum").val(num);
            var jifen=$("#jifen").val();
            jifen=jifen*num;
            $(".jf_firstspan").html(jifen);
            var lang=1;
            var jf_vb=$('.jf_firstspan').html();
            var jf_cp=$("#pro_qx").val();
            var jf_weibd=$('#jf_weibd').val(),proid=$("#proid").val();
            if(jf_weibd ==1){
                $.ajax({
                    url: './index.php?m=product&a=calculator' ,  
                    type: 'POST',  
                    scriptCharset: 'utf-8',
                    data: {
                        "jf_vb":jf_vb,
                        "jf_cp":jf_cp,
                        "lang":lang,
                        "proid":proid
                    }, 
                    success: function (data) {
                        var datab=eval('('+data+')');
                        $('#benjin').html(datab.total);
                        $('#shouyi').html(datab.reward_temp);
                        $('.jf_wgmoney').html(datab.reward_temp);
                    },
                    error: function() {
                        alert('未提供参数')
                    }
                })
            }  
        }
    });
    })
    //商品的加法运算
    $(function(){
    $("#jialang").click(function(){
        var  num=$(".jf_sanjinum").val();
        if(num <10 ){
            num=++num;
            $(".jf_sanjinum").val(num);
            var jifen=$("#jifen").val();
            jifen=jifen*num;
            $(".jf_firstspan").html(jifen);
            var lang=1;
            var jf_vb=$('.jf_firstspan').html();
            var jf_cp=$("#pro_qx").val();
            var jf_weibd=$('#jf_weibd').val(),proid=$("#proid").val();

            if(jf_weibd ==1){
                $.ajax({
                    url: './index.php?m=product&a=calculator' ,  
                    type: 'POST',  
                    scriptCharset: 'utf-8',
                    data: {
                        "jf_vb":jf_vb,
                        "jf_cp":jf_cp,
                        "lang":lang,
                        "proid":proid
                    }, 
                    success: function (data) {
                        var datab=eval('('+data+')');
                        $('#benjin').html(datab.total);
                        $('#shouyi').html(datab.reward_temp);
                        $('.jf_wgmoney').html(datab.reward_temp);
                    },
                    error: function() {
                        alert('未提供参数')
                    }
                })
            }

            return false;
   
        }else{
            alert('选择的数量不能超过10件呦~');
            num=10;
            return false;

        }
      
    });
    })
    //数量的计算
    $(function(){
    $(".jf_sanjinum").blur(function(){

      var num=$(".jf_sanjinum").val();
      var ex = /^\d+$/;
        if (ex.test(num)) {
           if(num<1){
              alert("最小值不能小于1");
              $(".jf_sanjinum").val(1);
               var jifen=$("#jifen").val();
              jifen=jifen*$(".jf_sanjinum").val();
              $(".jf_firstspan").html(jifen);
            }else{
              var jifen=$("#jifen").val();
              jifen=jifen*num;
            $(".jf_firstspan").html(jifen);
            }
        }else{
          alert("请输入整数");
           $(".jf_sanjinum").val(1);
           var jifen=$("#jifen").val();
              jifen=jifen*$(".jf_sanjinum").val();
          $(".jf_firstspan").html(jifen);
        }
    });
    })
    //超出库存
    $(function(){
    $(".buttonhover2").click(function(){
        var kucun=Number($("#kucun").val());
        var num=Number($(".jf_sanjinum").val());
        $('#pr_num').val(num)
        if(num > kucun){
            alert("超出库存数量，请重新选择");
            return false;
        }
    })
    })
    //微购的JS
    $(function(){
        $('.jf_bluebt').on('click',function(){
          $('.jf_bluebt2').css('background-position','0 0');
          $(this).css('background-position','0 -18px');
          $('.graykuang').hide();
          $('#jf_zhij').val(1);
          $('#jf_weibd').val("");
          $('.jf_wodejfnumdk').hide();
        })
        $('.jf_bluebt2').on('click',function(){
          $('.jf_bluebt').css('background-position','0 0');
          $(this).css('background-position','0 -18px');
          $('.graykuang').show();
          $('#jf_zhij').val("");
          $('#jf_weibd').val(1);
          var jf_vb=parseInt($('.jf_firstspan').html());
          var num=$(".jf_sanjinum").val();
          var jf_cp=$("#pro_qx").val();
          var jf_wodejfnum=parseInt($('.jf_wodejfnum').html()),proid=$("#proid").val();
           if(jf_wodejfnum>0 && jf_wodejfnum < jf_vb){
                $('.jf_wodejfnumdk').show(); 
            }else{
                $('.jf_wodejfnumdk').hide();
            }
            $.ajax({
                url: './index.php?m=product&a=calculator' ,  
                type: 'POST',  
                scriptCharset: 'utf-8',
                data: {
                    "jf_vb":jf_vb,
                    "jf_cp":jf_cp,
                    "lang":1,
                    "proid":proid
                }, 
                success: function (data) {
                  var datab=eval('('+data+')');
                  $('#benjin').html(datab.total);
                  $('#shouyi').html(datab.reward_temp);
                  $('.jf_wgmoney').html(datab.reward_temp);
                  
                 
                },
                 error: function() {
                    alert('未提供参数')
                }
            })
        })
    })

    //微币兑换
    $(function(){
        $('#pro_qx').change(function(){
            var jf_vb=$('.jf_firstspan').html();
            var jf_cp=$("#pro_qx").val();
             var num=$(".jf_sanjinum").val(),proid=$("#proid").val();
            $.ajax({
                url: './index.php?m=product&a=calculator' ,  
                type: 'POST',  
                scriptCharset: 'utf-8',
                data: {
                    "jf_vb":jf_vb,
                    "jf_cp":jf_cp,
                    "lang":1,
                    "proid":proid
                }, 
                success: function (data) {
                  var datab=eval('('+data+')');
                  $('#benjin').html(datab.total);
                  $('#shouyi').html(datab.reward_temp);
                  $('.jf_wgmoney').html(datab.reward_temp);
                },
                 error: function() {
                    alert('未提供参数')
                }
            })
        })
    })
    //默认是直接兑换
    $(function(){
        $(document).ready(function(){
          $('#jf_zhij').val(1);
          $('#jf_weibd').val("");
        })
    })
})