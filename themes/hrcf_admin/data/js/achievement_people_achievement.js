;$(function () {
    var do_action="/?hradmin&q=code/data/achievement";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=people_achievement";


        var month=$('#month').val();
        var kind=$('#kind').val();
        var depart=$('#depart').val();

        if(!!month){
            choice_action=choice_action+'&month='+month;
        }
        if(!!kind){
            choice_action=choice_action+'&kind='+kind;
        }
        if(!!depart){
            choice_action=choice_action+'&depart='+depart;
        }

        window.location.href=choice_action;



    })



    $("#do_export").click(function(){
        var export_action=do_action+"&action=people_achievement_export";

        var month=$('#month').val();
        var kind=$('#kind').val();
        var depart=$('#depart').val();

        if(!!month){
            export_action=export_action+'&month='+month;
        }
        if(!!kind){
            export_action=export_action+'&kind='+kind;
        }
        if(!!depart){
            export_action=export_action+'&depart='+depart;
        }

        window.location.href=export_action;

    })

});