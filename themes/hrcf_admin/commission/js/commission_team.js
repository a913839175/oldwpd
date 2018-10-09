;$(function () {
    var do_action="/?hradmin&q=code/commission/commission";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=commission";


        var month=$('#month').val();

        if(!!month){
            choice_action=choice_action+'&month='+month;
        }

        window.location.href=choice_action;



    })



    $("#do_export").click(function(){
        var export_action=do_action+"&action=commission_export";

        var month=$('#month').val();

        if(!!month){
            export_action=export_action+'&month='+month;
        }

        window.location.href=export_action;

    })

});