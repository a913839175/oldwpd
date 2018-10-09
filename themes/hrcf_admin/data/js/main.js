;$(function () {
	var do_action="/?hradmin&q=code/data/activity";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=activity_data";

        window.location.href=choice_action;



    })



	$("#do_export").click(function(){
		var export_action=do_action+"&action=activity_export";
        window.location.href=export_action;
	})

});