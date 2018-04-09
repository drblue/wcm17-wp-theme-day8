$(document).ready(function($){

	$('#accordion .card-header').on('click', function(e) {
		/*
		var $target = $(e.target);
		var $card = $target.parents('.card');
		var $content = $card.find('.collapse');
		$content.collapse('toggle');
		*/

		$(e.target).parents('.card').find('.collapse').collapse('toggle');
	});

	/*
	$('#headingOne button').on('click', function(e) {
		alert("Toggling accordion element 1");
		$('#collapseOne').collapse('toggle');
	});

	$('#headingTwo button').on('click', function(e) {
		alert("Toggling accordion element 2");
		$('#collapseTwo').collapse('toggle');
	});

	$('#headingThree button').on('click', function(e) {
		alert("Toggling accordion element 3");
		$('#collapseThree').collapse('toggle');
	});
	*/
});
