;$(function () {
    var do_action="/?hradmin&q=code/data/achievement";

    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=staff_member_tg";

        var realname=$('#realname').val();
        var niname=$('#niname').val();
        var department_types=$('#department_types').val();
        if(!!realname){
            choice_action=choice_action+'&realname='+realname;
        }
        if(!!niname){
            choice_action=choice_action+'&niname='+niname;
        }
        if(!!department_types){
            choice_action=choice_action+'&department_types='+department_types;
        }

        window.location.href=choice_action;



    })



    $("#do_export").click(function(){
        var export_action=do_action+"&action=staff_member_export_tg";
        var realname=$('#realname').val();
        var niname=$('#niname').val();
        var department_types=$('#department_types').val();
        if(!!realname){
            export_action=export_action+'&realname='+realname;
        }
        if(!!niname){
            export_action=export_action+'&niname='+niname;
        }
        if(!!department_types){
            export_action=export_action+'&department_types='+department_types;
        }

        window.location.href=export_action;
    })

});