;$(function () {
	var do_action="/?hradmin&q=code/data/achievement";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=index";

        var department_types_name=$('#department_types_name').val();



        if(!!department_types_name){
        	choice_action=choice_action+'&department_types_name='+department_types_name;
        }

        var month=$('#month').val();

        if(!!month){
            choice_action=choice_action+'&month='+month;
        }

        window.location.href=choice_action;



    })



	$("#do_export").click(function(){
		var export_action=do_action+"&action=index_export";

        var department_types_name=$('#department_types_name').val();


        if(!!department_types_name){
        	export_action=export_action+'&department_types_name='+department_types_name;
        }

        var month=$('#month').val();

        if(!!month){
            export_action=export_action+'&month='+month;
        }


        window.location.href=export_action;

	})

});