;$(function () {

	var do_action="/?hradmin&q=code/data/achievement";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=team";

        var realname=$('#realname').val();
        var team_types=$('#team_types').val();
        var team_team=$('#team_team').val();

        choice_action=choice_action+'&team_types='+team_types;
        choice_action=choice_action+'&team_team='+team_team;
        if(!!realname){
            choice_action=choice_action+'&realname='+realname;
        }

        var month=$('#month').val();

        if(!!month){
            choice_action=choice_action+'&month='+month;
        }

        window.location.href=choice_action;



    })



	$("#do_export").click(function(){
		var export_action=do_action+"&action=team_export";

		var realname=$('#realname').val();
        var team_types=$('#team_types').val();
        var team_team=$('#team_team').val();

        export_action=export_action+'&team_types='+team_types;
        export_action=export_action+'&team_team='+team_team;
        if(!!realname){
            export_action=export_action+'&realname='+realname;
        }

        var month=$('#month').val();

        if(!!month){
            export_action=export_action+'&month='+month;
        }

        window.location.href=export_action;

	})

});