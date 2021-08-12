/*
Version      : 1.0
*/

(function($) {
	"use strict";

	$(document).ready(function() {

		$(".service-block .box1").on('click', function(event) {
			var link = $(this).attr('link');
			window.location.href = link;
		});

		$(".our-services .offer_btn").on('click', function(event) {
			var link = $(this).attr('link');
			// window.open(link, '_blank');
			window.location.href = link;
		});

		$(".about-us-button").on('click', function(event) {
			window.location.href = base_url + "about-us";
		});

		$(".blog-block button").on('click', function(event) {
			window.location.href = base_url + "blog";
		});

	})
})(jQuery);
