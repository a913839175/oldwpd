;$(function () {
    var do_action="/?hradmin&q=code/data/achievement";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=staff_achievement";


        var month=$('#month').val();
        var kind=$('#kind').val();

        if(!!month){
            choice_action=choice_action+'&month='+month;
        }
        if(!!kind){
            choice_action=choice_action+'&kind='+kind;
        }

        window.location.href=choice_action;



    })



    $("#do_export").click(function(){
        var export_action=do_action+"&action=staff_achievement_export";

        var month=$('#month').val();
        var kind=$('#kind').val();

        if(!!month){
            export_action=export_action+'&month='+month;
        }
        if(!!kind){
            export_action=export_action+'&kind='+kind;
        }
        

        window.location.href=export_action;

    })

});