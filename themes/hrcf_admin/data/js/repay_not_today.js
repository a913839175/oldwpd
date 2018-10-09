;$(function () {

	laydate({
        elem: '#today_date'
    });

    $("#do_choice").click(function(){
        var choice_action="/?hradmin&q=code/data/repay";


        var action=$('#action').val();
        var dokind=$('#dokind').val();
        var today_date=$('#today_date').val();

        choice_action=choice_action+'&action='+action;

        choice_action=choice_action+'&dokind='+dokind;

        choice_action=choice_action+'&today_date='+today_date;

        window.location.href=choice_action;



    });


});