$(document).ready(function() {
	init();

	$(".service-box").on('click', function() {
		// console.log($(this).attr('data-id'));
		var cateId = $(this).attr('data-id');
		var offsetTop = $(".page-category[data-id='category-"+cateId+"']")[0].offsetTop;
		// $(document).animate({
		// 	scrollTop: offsetTop - 100
		// })
		window.scroll({
		  top: offsetTop - 100,
		  behavior: 'smooth'  // 👈 
		});
		// $(document).scrollTop(offsetTop - 100);
	});

	$(".common_search").on('keyup', function() {
		var searchWord = $(this).val();
		// console.log(searchWord);
		searchWord = searchWord.trim();
		$('.search-list-section ul').empty();
		if (searchWord == "") {
			return;
		}
		var filtered = services.filter(function (service) { 
			var serviceTitle = service.service_title.toLowerCase();
			return serviceTitle.indexOf(searchWord.toLowerCase()) !== -1; 
		});
		
		for(var i in filtered) {
			var service = filtered[i];
			var html = "<li class=\"Grid-col Grid-col--6 Grid-col--tablet-4 Grid-col--desktopSmall-4\">";
            html += "<a class=\"PageService-category-link\" title=\""+service.service_title+"\" href=\""+base_url+"service-preview/"+service.encoded_title+"?sid="+service.md5_id+"\">";
            html += service.service_title + "&nbsp;" + "("+service.total_views+")";
            html += "</a>";
            html += "</li>";
            $('.search-list-section ul').append(html);
		}
	});
});

function init() {
	// console.log(services);
}