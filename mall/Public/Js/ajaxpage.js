
	//分页
	$(function(){

      $('.ajaxpage > a').click(

        function(){

         $.ajax({

            type: "GET",

            url:$(this).attr('href'),    //取得a标签链接地址

            beforeSend:function(){

                //$('tbody').text("请稍等!");

            },

            success:function(data){

                $('body').html(data);     //将数据重新加载到容器中

            }

        });

            return false;     //使a标签失效

        })

    })


	//分页
	$(function(){

      $(".ajaxpage select[name='sldd']").change(

        function(){

         $.ajax({

            type: "GET",

            url:this.options[this.selectedIndex].value,    //取得a标签链接地址

            beforeSend:function(){

                //$('tbody').text("请稍等!");

            },

            success:function(data){

                $('body').html(data);     //将数据重新加载到容器中

            }

        });

            return false;     //使a标签失效

        })

    })
