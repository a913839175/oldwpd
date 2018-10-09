define(function(require, exports, module) {
    //微月盈 和 微+系列还有微年利 两套样式的切换
    $(function(){
        jsqhtml="";
        $("#in_tzcp").bind("change",function(){ 
            jsqhtml="";
            $('.bluebj').html(''); 
            if($(this).val()=='微月盈' || $(this).val()=='微月盈Ⅱ' || $(this).val()=='微月盈Ⅲ'){ 
                jsqhtml+='<div class="in_ybjqk7" >';
                jsqhtml+='<span class="in_ybjnr1">预计每期返息金额：</span><input type="text" class="in_ybjnr6" disabled="disabled"><span class="in_ybjnr03">元</span>';
                jsqhtml+='</div>';
                jsqhtml+='<div class="in_ybjqk8">';
                jsqhtml+='<span class="in_ybjnr1">预计首次返息日期：</span><input type="text" class="in_ybjnr7" disabled="disabled">';
                jsqhtml+='</div>';
                jsqhtml+='<div class="in_ybjqk9" >';
                jsqhtml+='<span class="in_ybjnr1" >预计本金到期日期：</span><input type="text" class="in_ybjnr8" disabled="disabled">';
                jsqhtml+='</div>';
                jsqhtml+='<div class="in_ybjqk10">';
                jsqhtml+='<span class="in_ybjnr1">预计本息总额：</span><input type="text" class="in_ybjnr10" disabled="disabled"><span class="in_ybjnr9">元</span>';
                jsqhtml+='</div>';
                $('.bluebj').append(jsqhtml);
            } 
            else{
                jsqhtml+='<div class="in_ybjqk4" >';
                jsqhtml+='<span class="in_ybjnr1">预计收益金额：</span><input type="text" class="in_ybjnr3" disabled="disabled"><span class="in_ybjnr03">元</span>';
                jsqhtml+='</div>';
                jsqhtml+='<div class="in_ybjqk5">';
                jsqhtml+='<span class="in_ybjnr1">预计到期日期：</span><input type="text" class="in_ybjnr4" disabled="disabled">';
                jsqhtml+='</div>';
                jsqhtml+='<div class="in_ybjqk6">';
                jsqhtml+='<span class="in_ybjnr1">预计本息总额：</span><input type="text" class="in_ybjnr5" disabled="disabled"><span class="in_ybjnr03">元</span>';
                $('.bluebj').append(jsqhtml);
            } 
        });
    })

    //计算后的结果传值
    $(function(){
        $('.in_ksjs').on('click',function(){
            var inmoney=$('.in_ybjnr2').val();
            var inyear=$('#selYear').val();
            var inmonth=$('#selMonth').val();
            var inday=$('#selDay').val();
            var intime=inyear+'-'+inmonth+'-'+inday;
            // console.log(intime)
            var inproduct=$('#in_tzcp').val();
            $('.in_jszhezhao').css('display','block');
             var yreg=/^\d+$/;
            if(inmoney % 100 != 0 || yreg.test(inmoney) == false){
                alert('请输入100的整数');
                $('.in_jszhezhao').css('display','none');
                return false;

            }else{
                $.ajax({
                    type:"POST",
                    url:"/?user&q=calculator/obtain",
                    data:{
                        'money':inmoney,
                        'product':inproduct,
                        'addtime':intime
                    },
                    dataType:"json",
                    success:function(b){
                        if(b.first=="0"){
                            $('.in_ybjnr3').val(b.reward_temp);
                            $('.in_ybjnr4').val(b.timeresult);
                            $('.in_ybjnr5').val(b.lastotal);
                        }else{
                            $('.in_ybjnr6').val(b.reward_temp);
                            $('.in_ybjnr7').val(b.first);
                            $('.in_ybjnr8').val(b.timeresult);
                            $('.in_ybjnr10').val(b.lastotal);      
                        } 
                        $('.in_jszhezhao').css('display','none');
                    }
                });
            }
     
        });
        
        $('.ui-input-text').keyup(function () {  
            var inmoney=$('.ui-input-text').val();
            var yreg=/^\d+$/;
            
            if(yreg.test(inmoney) == true && inmoney < 100){
                $('.datedue').html('到期日期：暂无');
                $('.datedue2').html('期望回报：0<span class="blockcolor">元</span>');
                return false;
            }
            
            var inmoney_str = inmoney.toString();
            if(inmoney_str.length>10){
                inmoney_str = inmoney_str.substring(0,10);
                inmoney = parseInt(inmoney_str);
            }
            
            if(inmoney % 100 != 0 || yreg.test(inmoney) == false){
                $('.datedue').html('到期日期：暂无');
                $('.datedue2').html('期望回报：0<span class="blockcolor">元</span>');
                return false;
            }else{
                var myDate = new Date();
                var inyear = myDate.getFullYear();
                var inmonth = myDate.getMonth()+1;
                var inday = myDate.getDate(); 
                var intime = inyear+'-'+inmonth+'-'+inday;
                var inproduct=$('#this_borrow_nid_a').val();
                var borrow_nid = $('#this_borrow_nid').val();
                var borrow_apr = $('#this_borrow_apr').val();
                var year_days = inyear%4==0 ? 366 : 365;
                var reward_temp;
                var editime;
                
                if(borrow_nid == "WADDONEMONTH_2016"){
                    reward_temp = (inmoney*borrow_apr)*(30/year_days)/100;
                    editime = GetDateStr(intime,30);
                }else if(borrow_nid == "WADDTHREEMONTH_2016"){
                    reward_temp = (inmoney*borrow_apr)*(90/year_days)/100;
                    editime = GetDateStr(intime,90);
                }else if(borrow_nid == "WADDSIXMONTH_2016"){
                    reward_temp = (inmoney*borrow_apr)*(180/year_days)/100;
                    editime = GetDateStr(intime,180);
                }else if(borrow_nid == "WADDYEAR_2016"){
                    reward_temp = (inmoney*borrow_apr)/100;
                    myDate.setFullYear(myDate.getFullYear()+1);
                    editime = myDate.getFullYear() + '-' + (myDate.getMonth()+1) + '-' + myDate.getDate();
                }else if(borrow_nid == "WADDTWOYEAR_2016"){
                    reward_temp = (inmoney*borrow_apr)/100*2;
                    myDate.setFullYear(myDate.getFullYear()+2);
                    editime = myDate.getFullYear() + '-' + (myDate.getMonth()+1) + '-' + myDate.getDate();
                }else if(borrow_nid == "WADDTHREEYEAR_2016"){
                    reward_temp = (inmoney*borrow_apr)/100*3;
                    myDate.setFullYear(myDate.getFullYear()+3);
                    editime = myDate.getFullYear() + '-' + (myDate.getMonth()+1) + '-' + myDate.getDate();
                }else if(borrow_nid == "WADDYFANYEAR_2016"){
                    reward_temp = (inmoney*borrow_apr)/100;
                    myDate.setFullYear(myDate.getFullYear()+1);
                    editime = myDate.getFullYear() + '-' + (myDate.getMonth()+1) + '-' + myDate.getDate();
                }else if(borrow_nid == "WADDYFANTWOYEAR_2016"){
                    reward_temp = (inmoney*borrow_apr)/100*2;
                    myDate.setFullYear(myDate.getFullYear()+2);
                    editime = myDate.getFullYear() + '-' + (myDate.getMonth()+1) + '-' + myDate.getDate();
                }else if(borrow_nid == "WADDYFANTHREEYEAR_2016"){
                    reward_temp = (inmoney*borrow_apr)/100*3;
                    myDate.setFullYear(myDate.getFullYear()+3);
                    editime = myDate.getFullYear() + '-' + (myDate.getMonth()+1) + '-' + myDate.getDate();
                }
                
                reward_temp = reward_temp.toFixed(2)
                $('.datedue').html('到期日期：' + editime);
                $('.datedue2').html('期望回报：' + reward_temp + '<span class="blockcolor">元</span>');                
            }
        });
        
    });
    //理财产品鼠标放上去时候的动作
    $(function(){
        $('.in_proliys').mouseenter(function () {
            $('.in_proliys').css('background','#fff');
            $('.in_proliys').css('border','1px solid #e3e3e3');
            $('.in_proliys').find('.in_ptouzi').css('background','#ffab19');
            $(this).css('background','#fafafa');
            $(this).css('border','1px solid #ffa82b');
            $(this).find('.in_ptouzi').css('background','#ff6a19');
            $('.in_texiao').css('background','#fafafa');
            $('.in_ptpuzi2').css('background','#ff6a19');    

        });
        $('.in_proliys').mouseleave(function () {
            $('.in_proliys').css('background','#fff');
            $('.in_proliys').css('border','1px solid #e3e3e3');
            $('.in_proliys').find('.in_ptouzi').css('background','#ffab19');
            $('.in_texiao').css('background','#fafafa');
            $('.in_ptpuzi2').css('background','#ff6a19');    
        });
    });
    
    //输入100整数倍的判断
    $(function(){
        $('.in_suohui').on('click',function(){
            $('.in_licaitop').slideUp();
            $('.in_licaitopimg2_index').slideDown();
        })
        $('.in_licaitopimg2').on('click',function(){
            $('.in_licaitop').slideDown();
            $('.in_licaitopimg2_index').slideUp();
        })
        $(".in_ybjnr2").focus(function(){
            $(this).css('color','#000');
            var xmiaoshu=$(this).val();
            if(xmiaoshu == '输入100的整数倍'){
                $(this).val('');
            }
        });
        $(".in_ybjnr2").blur(function(){

            var ymiaoshu=$(this).val();
            if(ymiaoshu == ''){
                $(this).css('color','#c2c2c2');
                $(this).val('输入100的整数倍');
                return false;
            }
            if(ymiaoshu % 100 != 0){
                alert('请出入100的整数倍');
                $(this).val('输入100的整数倍');
                $(this).css('color','#c2c2c2');
                return false;
            }
            
        });
    });
    //日历的控件
    $(function(){
        function DateSelector(selYear, selMonth, selDay) { 
            this.selYear = selYear; 
            this.selMonth = selMonth; 
            this.selDay = selDay; 
            this.selYear.Group = this; 
            this.selMonth.Group = this; 
            // 给年份、月份下拉菜单添加处理onchange事件的函数 
            if (window.document.all != null) // IE 
            { 
                this.selYear.attachEvent("onchange", DateSelector.Onchange); 
                this.selMonth.attachEvent("onchange", DateSelector.Onchange); 
            } 
            else // Firefox 
            { 
                this.selYear.addEventListener("change", DateSelector.Onchange, false); 
                this.selMonth.addEventListener("change", DateSelector.Onchange, false); 
            } 
            if (arguments.length == 4) // 如果传入参数个数为4，最后一个参数必须为Date对象 
                this.InitSelector(arguments[3].getFullYear(), arguments[3].getMonth() + 1, arguments[3].getDate()); 
            else if (arguments.length == 6) // 如果传入参数个数为6，最后三个参数必须为初始的年月日数值 
                this.InitSelector(arguments[3], arguments[4], arguments[5]); 
            else // 默认使用当前日期 
            { 
                var dt = new Date(); 
                this.InitSelector(dt.getFullYear(), dt.getMonth() + 1, dt.getDate()); 
            } 
        } 
        // 增加一个最大年份的属性 
        DateSelector.prototype.MinYear = 2015; 
        // 增加一个最大年份的属性 
        DateSelector.prototype.MaxYear = (new Date()).getFullYear()+1; 
        // 初始化年份 
        DateSelector.prototype.InitYearSelect = function () { 
            // 循环添加OPION元素到年份select对象中 
            for (var i = this.MaxYear; i >= this.MinYear; i--) { 
                // 新建一个OPTION对象 
                var op = window.document.createElement("OPTION"); 
                // 设置OPTION对象的值 
                op.value = i; 
                // 设置OPTION对象的内容 
                op.innerHTML = i; 
                // 添加到年份select对象 
                this.selYear.appendChild(op); 
            } 
        } 
        // 初始化月份 
        DateSelector.prototype.InitMonthSelect = function () { 
            // 循环添加OPION元素到月份select对象中 
            for (var i = 1; i < 13; i++) { 
                // 新建一个OPTION对象 
                var op = window.document.createElement("OPTION"); 
                // 设置OPTION对象的值 
                op.value = i; 
                // 设置OPTION对象的内容 
                op.innerHTML = i; 
                // 添加到月份select对象 
                this.selMonth.appendChild(op); 
            } 
        } 
        // 根据年份与月份获取当月的天数 
        DateSelector.DaysInMonth = function (year, month) { 
            var date = new Date(year, month, 0); 
            return date.getDate(); 
        } 
        // 初始化天数 
        DateSelector.prototype.InitDaySelect = function () { 
            // 使用parseInt函数获取当前的年份和月份 
            var year = parseInt(this.selYear.value); 
            var month = parseInt(this.selMonth.value); 
            // 获取当月的天数 
            var daysInMonth = DateSelector.DaysInMonth(year, month); 
            // 清空原有的选项 
            this.selDay.options.length = 0; 
            // 循环添加OPION元素到天数select对象中 
            for (var i = 1; i <= daysInMonth; i++) { 
                // 新建一个OPTION对象 
                var op = window.document.createElement("OPTION"); 
                // 设置OPTION对象的值 
                op.value = i; 
                // 设置OPTION对象的内容 
                op.innerHTML = i; 
                // 添加到天数select对象 
                this.selDay.appendChild(op); 
            } 
        } 
        // 处理年份和月份onchange事件的方法，它获取事件来源对象（即selYear或selMonth） 
        // 并调用它的Group对象（即DateSelector实例，请见构造函数）提供的InitDaySelect方法重新初始化天数 
        // 参数e为event对象 
        DateSelector.Onchange = function (e) { 
            var selector = window.document.all != null ? e.srcElement : e.target; 
            selector.Group.InitDaySelect(); 
        } 
        // 根据参数初始化下拉菜单选项 
        DateSelector.prototype.InitSelector = function (year, month, day) { 
            // 由于外部是可以调用这个方法，因此我们在这里也要将selYear和selMonth的选项清空掉 
            // 另外因为InitDaySelect方法已经有清空天数下拉菜单，因此这里就不用重复工作了 
            this.selYear.options.length = 0; 
            this.selMonth.options.length = 0; 
            // 初始化年、月 
            this.InitYearSelect(); 
            this.InitMonthSelect(); 
            // 设置年、月初始值 
            this.selYear.selectedIndex = this.MaxYear - year; 
            this.selMonth.selectedIndex = month - 1; 
            // 初始化天数 
            this.InitDaySelect(); 
            // 设置天数初始值 
            this.selDay.selectedIndex = day - 1; 
        } 
        var selYear = window.document.getElementById("selYear"); 
        var selMonth = window.document.getElementById("selMonth"); 
        var selDay = window.document.getElementById("selDay"); 
        // 获取当前的时间
        var in_mydate= new Date();
        var in_getFullYear=in_mydate.getFullYear();
        var in_getMonth=in_mydate.getMonth()+1; 
        var in_getDate=in_mydate.getDate();  
        // 新建一个DateSelector类的实例，将三个select对象传进去 
        if(selYear ==null){return false;}
        new DateSelector(selYear, selMonth, selDay, in_getFullYear, in_getMonth, in_getDate); 
    // 也可以试试下边的代码 
    // var dt = new Date(2004, 1, 29); 
    // new DateSelector(selYear, selMonth ,selDay, dt); 
    });
    //计算器随意拖动
    $(function(){
        $('#dd1').draggable();
    });
});

function GetDateStr(da,AddDayCount) { 
    var da = (da.replace(/-/g, "/"));     // 把2016-05-24 转换为2016/05/24 
    var dd = new Date(da); 
    dd.setDate(dd.getDate()+AddDayCount);//获取AddDayCount天后的日期 
    
    var y = dd.getFullYear();
    var m = (dd.getMonth()+1)<10?"0"+(dd.getMonth()+1):(dd.getMonth()+1);//获取当前月份的日期，不足10补0
    var d = dd.getDate()<10?"0"+dd.getDate():dd.getDate(); //获取当前几号，不足10补0
    return y+"-"+m+"-"+d; 
}