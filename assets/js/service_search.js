(function($) {
  "use strict";
	var base_url=$('#base_url').val();
  var BASE_URL=$('#base_url').val();
  var csrf_token=$('#csrf_token').val();
  var csrfName=$('#csrfName').val();
  var csrfHash=$('#csrfHash').val();
  var modules=$('#modules_page').val();
  $( document ).ready(function() {
    $('.pagination_no').on('click',function(){
      var id=$(this).attr('data-id');
      get_services(id);
    });
    $('.get_services').on('click',function(){
      get_services(0);
    });
    $('#categories').on('change',function(){
      // console.log($(this).val());
      get_services(0);
    });
    $('#sort_by').on('change',function(){
      get_services(0);
    });
    $('body').on('DOMSubtreeModified', '.price-ranges', function(){
      get_services(0);
    });
  });

  function get_services(page) { 
    var price_range=$('#price_range').val();
    var min_price = $('#min_price').html();
    var max_price = $('#max_price').html();

    var sort_by=$('#sort_by').val();
    var common_search=$('#common_search').val();
    var categories=$('#categories').val();
    var service_latitude=$('#service_latitude').val();
    var service_longitude=$('#service_longitude').val();
    var user_address=$('#service_location').val();
    if(user_address==''){
      var service_latitude='';
      var service_longitude='';
    }

    var status=$('#status').val();
    var pagination_page=$('#pagination_current_page').val();
    if (pagination_page === null || pagination_page === undefined) {
      pagination_page = base_url + "home/ajaxPaginationData/";
    }
    var target=$('#target').val();
    if (target === undefined || target === null) {
      target = "#dataList";
    }
    var csrf_token=$('#csrf_token').val();
    showLoader();
    $.ajax({
      method: "POST",
      url: pagination_page+page,
      data: {min_price:min_price, max_price:max_price, sort_by:sort_by, common_search:common_search, categories:categories, service_latitude:service_latitude, service_longitude:service_longitude, user_address:user_address, page: page, csrf_token_name:csrf_token, status:status },

      success: function(data){
        $(target).html(data);
        $('.pagination ul li').removeClass('active');
        $('.page_nos_'+page).parent('li').addClass('active');
        $('.pagination_no').on('click',function(){
          var id=$(this).attr('data-id');
          get_services(id);
        }); 
        hideLoader();
      }
    });

    // $('#dataList').html('<div class="page-loading">'+
    // '<div class="preloader-inner">'+
    // '<div class="preloader-square-swapping">'+
    // 	'<div class="cssload-square-part cssload-square-green"></div>'+
    // 	'<div class="cssload-square-part cssload-square-pink"></div>'+
    // 	'<div class="cssload-square-blend"></div>'+
    // '</div>'+
    // '</div>'+
    // '</div>');

    // // $('#dataList').empty();
    // // $('#dataList').parent().parent().scrollTop(0);
    // // $('#dataList').parent().parent().height('auto');
    // $.post(base_url+'home/all_services',{min_price:min_price,max_price:max_price,sort_by:sort_by,common_search:common_search,categories:categories,service_latitude:service_latitude,service_longitude:service_longitude,csrf_token_name:csrf_token,user_address:user_address},function(data){
    //     var obj=jQuery.parseJSON(data);
  		//   $('#service_count').html(obj.count);
  		//   $('#dataList').html(obj.service_details);
    // });
  }

  // jquery ui range - price range

  var $priceFrom = $('.price-ranges .from'),
  $priceTo = $('.price-ranges .to');
  var min_price = $('#min_price').html();
  var max_price = $('#max_price').html();

  $(".price-range").slider({
  	range: true,
  	min: 1,
  	max: 100000,
  	values: [min_price, max_price],
  	slide: function (event, ui) {
  		$priceFrom.text(ui.values[0]);
  		$priceTo.text(ui.values[1]);
  	}
  });
})(jQuery);