
var countdown_sum=3;//倒计时总时间
var countdown=countdown_sum;//倒计时

//移动相关
var speed=10;//移动速度
var speed_px=2;//每次移动像素

var images_path="/static/hrcfwx/activity/spring/images/";
var down_pic_base="chunjie_hongbao_daojishi";//倒计时图片名-基本字符串
var max_click_num=6;//最多点红包次数
var now_click_num=1;//当前点红包次数

var time_sum=60;//游戏总时间
var time=time_sum;

var content_img_left=0;//.content img的X
var content_img_top=0//.content img的Y

every_time='1s';//游戏读秒时间间隔
every_down='1s';//倒计时时间间隔
every_something='3s';//每次出现红包时间间隔

var position_sum=8;//位置总个数
var all_postion=[0,1,2,3,4,5,6,7];//位置数组

var one_time_most=3;//每次最多出现几个猴子

var monkey_speak_sum=8;//猴子说的话的种类
var monkey_speak_arr=['<br/>&nbsp;快来戳我呀！','<br/>&nbsp;快来戳我呀！','<br/>&nbsp;快来戳我呀！','<br/>&nbsp;快来戳我呀！','<br/>&nbsp;快来戳我呀！','<br/>&nbsp;快来戳我呀！','<br/>&nbsp;快来戳我呀！','<br/>&nbsp;快来戳我呀！'];//猴子的话

var fail_speak_sum=2;//没中奖说的话的种类
var fail_speak_arr=['哎呀，今天出门忘记带钱了...','T.T 把压岁钱还给我'];//没中奖说的话

var monkey_red_pic_sum=4;//红包猴子种类

var monkey_wei_pic_sum=4;//微拍贷猴子的种类

var red_per=30;//出红包的概率 其余就是出猴子的概率

var win_per=20;//中奖的概率

var is_can_click=1;

window.onload=function(){ //加载完成后触发
    $.preloadImages(images_path+'houzi_hongbao1.png', images_path+'houzi_hongbao2.png', images_path+'houzi_hongbao3.png', images_path+'houzi_hongbao4.png', images_path+'houzi_wei1.png', images_path+'houzi_wei2.png', images_path+'houzi_wei3.png', images_path+'houzi_wei4.png', images_path+'qiandai.png', images_path+'qiandai_qian.png', images_path+'getprize.png', images_path+'prizebut.png', images_path+'noprize.png', images_path+'newyear1.png', images_path+'chunjie_hongbao_daojishi1.png', images_path+'chunjie_hongbao_daojishi2.png', images_path+'chunjie_hongbao_daojishi3.png'); //预加载图片
} 

//预加载图片函数
$.preloadImages = function() {
  for (var i = 0; i < arguments.length; i++) {
    $("<img />").attr("src", arguments[i]);
    // $("body").append('<img src="'+arguments[i]+'" style="display:none;" >')
    // $("body").append('<img src="'+arguments[i]+'" >')
  }
}

//用于禁止滚动
function myhandler(event) {
  event.preventDefault();
}

$(function(){

  //点击游戏
  $('#begin_game').click(function(){
    if(is_can_click==1){
      var mychance=$('#mychance').html();
      mychance_int=parseInt(mychance);
      if(mychance_int>0){

        layer.load();
        $.ajax({
          type: "post",
          url: "/?wxuser&q=springajax&doaction=get_rob_game_times",

          dataType: "json",
          success: function(data){
            if(data.status==0&&data.data>0){
              game_begin();
              $('body').everyTime(every_down,'DOWN',do_count_down);//开启倒计时计时器
            }else{
              if(data.status==300){//未登录

                $.Zebra_Dialog('<span style="font-size:18px;">请先登录微拍贷</span>', {
                    'type':     'question',
                    'custom_class': 'question_dialog',
                    'buttons':  [
                                    {caption: '登陆', callback: function() {
                                      var from=encodeURIComponent('/?wxuser&q=springrobred');
                                      window.location.href='/?wxuser&q=login&from='+from;
                                    }},
                                    {caption: '取消', callback: function() { 

                                    }}
                                ]
                });

              }else{
                $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
                    'type':     'information',
                    'custom_class': 'info_dialog',
                    'buttons':['确定']
                });
              }
            }

            layer.closeAll('loading');
          },
          error:function(error){
            alert("传输异常，请检查网络是否正常");
            layer.closeAll('loading');
          }

        });

      }else{
        $.Zebra_Dialog('<span style="font-size:18px;">您的机会已用完，请明天再来</span> ', {
            'type':     'information',
            'custom_class': 'info_dialog',
            'buttons':['确定']
        });
      }
    }

  });

});

/* **************原来************* */
// function game_begin(){
//   is_can_click=0;//禁止开始游戏的点击事件
//   var overlay_html='<div class="screenc-overlay" id="screenc-overlay"></div>';
//   var content_html='<div id="content" class="content">';
//   content_html=content_html+'<img class="down-img" src="'+images_path+down_pic_base+'3.png" >';
//   content_html=content_html+'</div>';
//   var game_stage_html='<div id="game_stage" class="game_stage"></div>';
//   $('body').prepend(overlay_html);
//   $('body').append(content_html);
//   $('body').append(game_stage_html);
//   $('body').css('overflow','hidden');
// document.body.addEventListener('touchmove', myhandler, false);
//   var content_width=$('.content').eq(0).width();//.content的宽
//   var content_height=$('.content').eq(0).height();//.content的高
//   var content_img_width=$('.content img').eq(0).width();//.content img的宽
//   var content_img_height=$('.content img').eq(0).height();//.content img的高
//   content_img_left=(content_width-content_img_width)/2;
//   content_img_top=(content_height-content_img_height)*1/5;
//   $('.content img').css('left',content_img_left);
//   $('.content img').css('top',content_img_top);
//   $('.content img').css('opacity',1);
// }

// //倒计时
// function do_count_down(){
//   if(countdown>1){
//     countdown--;
//     var down_pic=down_pic_base+countdown;
//     var down_node_html='<img class="down-img" src="'+images_path+down_pic+'.png" >';
//     $('#content').html('');
//     $('#content').html(down_node_html);
//     $('.content img').css('left',content_img_left);
//     $('.content img').css('top',content_img_top);
//     $('.content img').css('opacity',1);
//   }else{
//     $('body').stopTime ('DOWN');
//     countdown=3;
//     $('#content').remove();
//     game_init();
//     setTimeout(function(){//延时0.5s
//       $('#game_stage').css('display','block');
//       show_something();
//       $('body').everyTime(every_something,'GAME',show_something);
//       $('body').everyTime(every_time,'TIME',show_time);
//     }, 1000);
//   }

// }
/* **************原来************* */

function game_begin(){
  is_can_click=0;//禁止开始游戏的点击事件
  var overlay_html='<div class="screenc-overlay" id="screenc-overlay"></div>';
  var content_html='<div id="content" class="content">';
  content_html=content_html+'<img class="down-img img3" src="'+images_path+down_pic_base+'3.png" >';
  content_html=content_html+'<img class="down-img img2" src="'+images_path+down_pic_base+'2.png" >';
  content_html=content_html+'<img class="down-img img1" src="'+images_path+down_pic_base+'1.png" >';
  content_html=content_html+'</div>';
  var game_stage_html='<div id="game_stage" class="game_stage"></div>';
  $('body').prepend(overlay_html);
  $('body').append(content_html);
  $('body').append(game_stage_html);

  //禁止滚动
  $('body').css('overflow','hidden');
  document.body.addEventListener('touchmove', myhandler, false);

  var content_width=$('.content').eq(0).width();//.content的宽
  var content_height=$('.content').eq(0).height();//.content的高
  var content_img_width=$('.content img').eq(0).width();//.content img的宽
  var content_img_height=$('.content img').eq(0).height();//.content img的高
  content_img_left=(content_width-content_img_width)/2;
  content_img_top=(content_height-content_img_height)*1/5;
  $('.content .img3').css('left',content_img_left);
  $('.content .img3').css('top',content_img_top);
  $('.content .img3').css('opacity',1);
}
//倒计时
function do_count_down(){
  if(countdown>1){
    $('.content .img'+countdown).remove();
    countdown--;
    var down_pic=down_pic_base+countdown;
    var down_node_html='<img class="down-img" src="'+images_path+down_pic+'.png" >';
    $('.content .img'+countdown).css('left',content_img_left);
    $('.content .img'+countdown).css('top',content_img_top);
    $('.content .img'+countdown).css('opacity',1);
  }else{
    $('body').stopTime ('DOWN');
    countdown=3;
    $('#content').remove();
    game_init();
    setTimeout(function(){//延时0.8s
      $('#game_stage').css('display','block');
      show_something();
      $('body').everyTime(every_something,'GAME',show_something);
      $('body').everyTime(every_time,'TIME',show_time);
    }, 800);
  }

}

//点击红包是否中奖
function click_is_win(t,p){
  var result_is=is_win();
  if(result_is==true){//中奖
    $('body').stopTime ('GAME');
    $('body').stopTime ('TIME');
    //取消红包点击
    $('.money').attr('onclick','javascript:;');

    $(".no_something").remove();
    // alert("中奖");
    time=time_sum;
    layer.load();
    $.ajax({
      type: "post",
      url: "/?wxuser&q=springajax&doaction=rob_win",
      data:{
        'ispost':1
      },
      dataType: "json",
      success: function(data){
        if(data.status==0&&data.data>0){
          game_win(data.data);

        }else{
          if(data.status==300){//未登录
            do_reset();
            $.Zebra_Dialog('<span style="font-size:18px;">请先登录微拍贷</span>', {
                'type':     'question',
                'custom_class': 'question_dialog',
                'buttons':  [
                                {caption: '登陆', callback: function() {
                                  var from=encodeURIComponent('/?wxuser&q=springrobred');
                                  window.location.href='/?wxuser&q=login&from='+from;
                                }},
                                {caption: '取消', callback: function() { 

                                }}
                            ]
            });

          }else{
            $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
                'type':     'information',
                'custom_class': 'info_dialog',
                'buttons':['确定']
            });
            do_reset();
          }
        }

        layer.closeAll('loading');
      },
      error:function(error){
        alert("传输异常，请检查网络是否正常");
        layer.closeAll('loading');
      }
      
    });

  }else{//未中奖

    var remainders=parseInt(p%2);
    remainders++;

    var now_fail_random=Math.random()*fail_speak_sum;
    var now_fail_number=Math.floor(now_fail_random);//没中奖的话
    if(now_fail_number>=fail_speak_sum){
      now_fail_number=fail_speak_sum-1;
    }

    var now_fail_speak=fail_speak_arr[now_fail_number];
    var fail_something='<div class="game_monkey'+remainders+'3 no_something"><p>'+now_fail_speak+'</p></div>';


    //取消红包点击
    $(".position").eq(p).find('.money').attr('onclick','javascript:;');

    $(".position").eq(p).find('.no_something').remove();
    $(".position").eq(p).find('.money_before').after(fail_something);


  }
}

//点击微拍贷标识
function click_wei(t,p){

  var remainders=parseInt(p%2);
  remainders++;

  var happy_something='<div class="game_monkey'+remainders+'3 no_something"><img src="/static/hrcfwx/activity/spring/images/newyear1.png"/></div>';

  //取消红包点击
  $(".position").eq(p).find('.money').attr('onclick','javascript:;');

  $(".position").eq(p).find('.no_something').remove();
  $(".position").eq(p).find('.money_before').after(happy_something)
}

//判断是否中奖
function is_win(){
  if(now_click_num<max_click_num){
    now_click_num++;
    var iswin_num=Math.random()*100;
    if(iswin_num>win_per){//判断是否中奖
      return false;
    }else{
      now_click_num=1;
      return true;
    }
  }else{
    now_click_num=1;
    return true;
  }
}

//出现红包或微拍贷标志
function show_something(){

  var now_red_random=Math.random()*one_time_most;
  var now_red_num=Math.ceil(now_red_random);//向上取整，Math.ceil(5.35)->6
  if(now_red_num==0){
    now_red_num++;
  }

  //取消红包点击
  $('.money').attr('onclick','javascript:;');

  $(".no_something").remove();
  var all_postion_temp=[];
  for(var j=0;j<all_postion.length;j++){
    all_postion_temp[j]=all_postion[j];
  }
  for(var i=0;i<now_red_num;i++){
    var now_position_random=Math.random()*position_sum;
    var now_position_i=Math.floor(now_position_random);//向下取整，Math.floor(5.55)->5
    // var now_position_i=Math.ceil(now_position_random);//向上取整，Math.ceil(5.35)->6
    if(now_position_i>=position_sum){
      now_position_i=position_sum-1;
    }

    if(all_postion_temp[now_position_i]<position_sum){

      var now_position=all_postion_temp[now_position_i];
      all_postion_temp[now_position_i]=position_sum;

    }else{
      continue;
    }

    var iswin_num=Math.random()*100;
    if(iswin_num>red_per){//判断是红包还是微拍贷标志
      var now_monkey_random=Math.random()*monkey_red_pic_sum;
      var now_monkey_pic_number=Math.ceil(now_monkey_random);//红包猴子的样式
      if(now_monkey_pic_number==0){
        now_monkey_pic_number=1;
      }

      var now_speak_random=Math.random()*monkey_speak_sum;
      var now_speak_number=Math.floor(now_speak_random);//猴子的话
      if(now_speak_number>=monkey_speak_sum){
        now_speak_number=monkey_speak_sum-1;
      }
      var now_monkey_speak=monkey_speak_arr[now_speak_number];

      //左边的样式是class=game_monkey13 右边的样式是class=game_monkey23
      var remainders=parseInt(now_position%2);
      remainders++;
      var monkey_something='<div onclick="click_is_win(this,'+now_position+')" class="game_monkey'+remainders+'3 no_something no_display"><img src="/static/hrcfwx/activity/spring/images/houzi_hongbao'+now_monkey_pic_number+'.png"/></div>';
      var talk_something='<div class="game_monkey'+remainders+'4 no_something no_display">'+now_monkey_speak+'</div>';

      //添加红包点击
      $(".position").eq(now_position).find('.money').attr('onclick','click_is_win(this,'+now_position+')');
      //移动相关
      // var monkey_something='<div onclick="click_is_win(this,'+now_position+')" class="game_monkey'+remainders+'3 no_something"><img class="monkey_pic" src="/static/hrcfwx/activity/spring/images/houzi_hongbao'+now_monkey_pic_number+'.png"/></div>';
      // var talk_something='<div class="game_monkey'+remainders+'4 no_something speak">'+now_monkey_speak+'</div>';

    }else{
      var now_monkey_random=Math.random()*monkey_wei_pic_sum;
      var now_monkey_pic_number=Math.ceil(now_monkey_random);//红包猴子的样式

      if(now_monkey_pic_number==0){
        now_monkey_pic_number=1;
      }

      var now_speak_random=Math.random()*monkey_speak_sum;
      var now_speak_number=Math.ceil(now_speak_random);//猴子的话
      if(now_speak_number>=monkey_speak_sum){
        now_speak_number=monkey_speak_sum-1;
      }
      var now_monkey_speak=monkey_speak_arr[now_speak_number];

      //左边的样式是class=game_monkey13 右边的样式是class=game_monkey23
      var remainders=parseInt(now_position%2);
      remainders++;
      var monkey_something='<div onclick="click_wei(this,'+now_position+')" class="game_monkey'+remainders+'3 no_something no_display"><img src="/static/hrcfwx/activity/spring/images/houzi_wei'+now_monkey_pic_number+'.png"/></div>';
      var talk_something='<div class="game_monkey'+remainders+'4 no_something no_display">'+now_monkey_speak+'</div>';

      //添加红包点击
      $(".position").eq(now_position).find('.money').attr('onclick','click_wei(this,'+now_position+')');
      //移动相关
      // var monkey_something='<div onclick="click_wei(this,'+now_position+')" class="game_monkey'+remainders+'3 no_something"><img class="monkey_pic" src="/static/hrcfwx/activity/spring/images/houzi_wei'+now_monkey_pic_number+'.png"/></div>';
      // var talk_something='<div class="game_monkey'+remainders+'4 no_something speak">'+now_monkey_speak+'</div>';
    }
    $(".position").eq(now_position).find('.money_before').after(monkey_something);
    $(".position").eq(now_position).find('.money').after(talk_something);//猴子到位后再说话

  }
  setTimeout(function(){
      // $('.no_opacity').css('opacity',1);
      $('.no_display').css('display','block');
    }, 600);

  //移动相关--掉下来
  // var this_monkey_class_height=$('.money').eq(0).height();
  // var now_monkey_top=0-this_monkey_class_height;
  // $('.monkey_pic').css('opacity',1);
  // monkey_move_down(now_monkey_top,now_position,talk_something);

  //移动相关--钻出来
  // var this_money_class_height=$('.money').eq(0).height();
  // var now_money_top=this_money_class_height-15;
  // $('.monkey_pic').css('opacity',1);
  // monkey_move_up(now_money_top,now_position,talk_something);

}

//猴子向下移动动画---掉下来
function monkey_move_down0(top,this_position,this_talk_something){
  if(top<0){
    top=top+speed_px;
    $('.monkey_pic').css('margin-top',top);
    setTimeout(function(){monkey_move_down(top,this_position,this_talk_something);},speed);
  }else{
    $('.monkey_pic').css('margin-top',0);
    $('.speak').css('opacity',1);
  }
}

//猴子向上移动动画---掉下来--有问题 不能和向下移动一起使用
function monkey_move_up0(this_top,top){
  if(this_top>top){
    this_top=this_top-speed_px;
    $('.monkey_pic').css('margin-top',this_top);
    setTimeout(function(){monkey_move_up(this_top,top);},speed);
  }else{
    $('.monkey_pic').css('margin-top',top);
    
    //取消红包点击
    $('.money').attr('onclick','javascript:;');

    $(".no_something").remove();
  }
}

//猴子向上移动动画---钻出来
function monkey_move_up(top,this_position,this_talk_something){
  if(top>0){
    top=top-speed_px;
    $('.monkey_pic').css('margin-top',top);
    setTimeout(function(){monkey_move_up(top,this_position,this_talk_something);},speed);
  }else{
    $('.monkey_pic').css('margin-top',0);
    $('.speak').css('opacity',1);
  }
}


//时间控制
function show_time(){
  time--;
  $('#timer_number').html(time);
  if(time<=0){
    $('body').stopTime ('GAME');
    $('body').stopTime ('TIME');
    $(".position").html('');
    time=time_sum;

    //取消红包点击
    $('.money').attr('onclick','javascript:;');

    layer.load();
    $.ajax({
      type: "post",
      url: "/?wxuser&q=springajax&doaction=rob_time_out",
      data:{
        'ispost':1
      },
      dataType: "json",
      success: function(data){
        if(data.status==0){
          game_over();

        }else{
          if(data.status==300){//未登录
            do_reset();
            $.Zebra_Dialog('<span style="font-size:18px;">请先登录微拍贷</span>', {
                'type':     'question',
                'custom_class': 'question_dialog',
                'buttons':  [
                                {caption: '登陆', callback: function() {
                                  var from=encodeURIComponent('/?wxuser&q=springrobred');
                                  window.location.href='/?wxuser&q=login&from='+from;
                                }},
                                {caption: '取消', callback: function() { 

                                }}
                            ]
            });

          }else{
            $.Zebra_Dialog('<span style="font-size:18px;">'+data.info+'</span> ', {
                'type':     'information',
                'custom_class': 'info_dialog',
                'buttons':['确定']
            });
            do_reset();
          }
        }

        layer.closeAll('loading');
      },
      error:function(error){
        alert("传输异常，请检查网络是否正常");
        layer.closeAll('loading');
      }
    });

  }
}


//游戏初始化
function game_init(){
  var game_html='';

  game_html+='<div class="game_in">';

  game_html+='<div class="game_clock">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/shizhong.png" />';
  game_html+='</div>';
  game_html+='<span class="timer_number" id="timer_number"></span>';

  game_html+='<div class="game_monkey1 position">';
  game_html+='<div class="game_monkey11 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey12 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='<div class="game_monkey2 position">';
  game_html+='<div class="game_monkey21 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey22 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='<div class="game_monkey3 position">';
  game_html+='<div class="game_monkey11 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey12 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='<div class="game_monkey4 position">';
  game_html+='<div class="game_monkey21 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey22 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='<div class="game_monkey5 position">';
  game_html+='<div class="game_monkey11 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey12 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='<div class="game_monkey6 position">';
  game_html+='<div class="game_monkey21 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey22 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='<div class="game_monkey7 position">';
  game_html+='<div class="game_monkey11 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey12 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='<div class="game_monkey8 position">';
  game_html+='<div class="game_monkey21 money_before">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai_qian.png"/>';
  game_html+='</div>';
  game_html+='<div class="game_monkey22 money">';
  game_html+='<img src="/static/hrcfwx/activity/spring/images/qiandai.png"/>';
  game_html+='</div>';
  game_html+='</div>';

  game_html+='</div>';

  $('#game_stage').html(game_html);
}


//时间到 没奖品
function game_over(){
  var game_over_html='';

  // game_over_html+='<div class="game_position">';
  game_over_html+='<div class="game_noprize">';

  game_over_html+='<div class="game_lost">';
  game_over_html+='<p>红包只差一点点...</p>';
  game_over_html+='<p>很遗憾</p>';
  game_over_html+='<p>很遗憾，您没有抢到红包...</p>';
  game_over_html+='</div>';

  game_over_html+='<div class="game_but">';
  game_over_html+='<a href="javascript:;"  onclick="do_again()">';
  game_over_html+='<div>再抢一次</div>';
  game_over_html+='</a>';
  game_over_html+='<a href="/?wxuser&q=springrobprize">';
  game_over_html+='<div>我的红包</div>';
  game_over_html+='</a>';
  game_over_html+='</div>';

  game_over_html+='</div>';
  // game_over_html+='</div>';

  $('#game_stage').html(game_over_html);

}


//赢得奖品
function game_win(money){
  var game_win_html='';

  // game_win_html+='<div class="game_position">';
  game_win_html+='<div class="game_getprize">';

  game_win_html+='<div class="game_get">';
  game_win_html+='<p>'+money+'</p>';
  game_win_html+='<p>理财红包</p>';
  game_win_html+='<p>恭喜您获得了'+money+'元理财红包 <span>1</span> 个！ </p>';
  game_win_html+='</div>';

  game_win_html+='<div class="game_but">';
  game_win_html+='<a href="javascript:;" onclick="do_again()"><div>再抢一次</div></a>';
  game_win_html+='<a href="/?wxuser&q=hongbao"><div>立即使用</div></a>';
  game_win_html+='</div>';

  game_win_html+='</div>';
  // game_win_html+='</div>';

  $('#game_stage').html(game_win_html);

}

//游戏结束 回到初始
function do_again(){

  var mychance_after_game=$('#mychance').html();
  if(mychance_after_game>0){
    mychance_after_game--;
  }

  $('#mychance').html(mychance_after_game);

  //解除禁止滚动
  $('body').css('overflow','visible');
  document.body.removeEventListener('touchmove',myhandler, false);


  $('#game_stage').remove();
  $('#content').remove();
  $('#screenc-overlay').remove();

  is_can_click=1;//开启开始游戏的点击事件
}

//返回错误信息后重置
function do_reset(){

  //解除禁止滚动
  $('body').css('overflow','visible');
  document.body.removeEventListener('touchmove',myhandler, false);

  $('#game_stage').remove();
  $('#content').remove();
  $('#screenc-overlay').remove();

  is_can_click=1;//开启开始游戏的点击事件
}
