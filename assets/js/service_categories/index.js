$(document).ready(function() {
	init();
	$(".service-box").on('click', function() {
		// console.log($(this).attr('link'));
		var link = $(this).attr('link');
		// window.open(link);
		window.location.href = link;
	});
});

function init() {

}