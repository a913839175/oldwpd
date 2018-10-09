;$(function () {
	var do_action="/?hradmin&q=code/data/trade";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=tixian";
        // $('#searchform').attr('action',choice_action);
        // $('#searchform').submit();

        var realname=$('#realname').val();
        var nid=$('#nid').val();
        var niname=$('#niname').val();
        var department_types_name=$('#department_types_name').val();
        var department_team_name=$('#department_team_name').val();
        var department_position_name=$('#department_position_name').val();
        var starttime=$('#starttime').val();
        var endtime=$('#endtime').val();

        if(!!realname){
        	choice_action=choice_action+'&realname='+realname;
        }

        if(!!nid){
        	choice_action=choice_action+'&nid='+nid;
        }

        if(!!niname){
        	choice_action=choice_action+'&niname='+niname;
        }

        if(!!department_types_name){
        	choice_action=choice_action+'&department_types_name='+department_types_name;
        }

        if(!!department_team_name){
        	choice_action=choice_action+'&department_team_name='+department_team_name;
        }

        if(!!department_position_name){
        	choice_action=choice_action+'&department_position_name='+department_position_name;
        }

        if(!!starttime){
        	choice_action=choice_action+'&starttime='+starttime;
        }


        if(!!endtime){
        	choice_action=choice_action+'&endtime='+endtime;
        }

        window.location.href=choice_action;



    })



	$("#do_export").click(function(){
		var export_action=do_action+"&action=tixian_export";

		var realname=$('#realname').val();
        var nid=$('#nid').val();
        var niname=$('#niname').val();
        var department_types_name=$('#department_types_name').val();
        var department_team_name=$('#department_team_name').val();
        var department_position_name=$('#department_position_name').val();
        var starttime=$('#starttime').val();
        var endtime=$('#endtime').val();

        if(!!realname){
        	export_action=export_action+'&realname='+realname;
        }

        if(!!nid){
        	export_action=export_action+'&nid='+nid;
        }

        if(!!niname){
        	export_action=export_action+'&niname='+niname;
        }

        if(!!department_types_name){
        	export_action=export_action+'&department_types_name='+department_types_name;
        }

        if(!!department_team_name){
        	export_action=export_action+'&department_team_name='+department_team_name;
        }

        if(!!department_position_name){
        	export_action=export_action+'&department_position_name='+department_position_name;
        }

        if(!!starttime){
        	export_action=export_action+'&starttime='+starttime;
        }


        if(!!endtime){
        	export_action=export_action+'&endtime='+endtime;
        }


        window.location.href=export_action;
	})

});