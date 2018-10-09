;$(function () {
	var do_action="/?hradmin&q=code/data/achievement";
    $("#do_choice").click(function(){
        var choice_action=do_action+"&action=lastmonth";

        window.location.href=choice_action;



    })



	$("#do_export").click(function(){
		var export_action=do_action+"&action=lastmonth_export";
        window.location.href=export_action;
	})

});