var usermarkers = [];
var userMarker;
(function($) {
	"use strict";
	var placeSearch, autocomplete;
	var validServiceLocations;
	var base_url=$('#base_url').val();
	var BASE_URL=$('#base_url').val();
	var csrf_token=$('#csrf_token').val();
	var csrfName=$('#csrfName').val();
	var csrfHash=$('#csrfHash').val();
	$( document ).ready(function() {
		$.post(base_url+'home/valid_service_locations',{csrf_token_name: csrf_token}, function(response) {
			validServiceLocations = JSON.parse(response);
			// console.log(validServiceLocations);
			initialize();
			// current_location(0);
		});
		$('.current_location').on('click',function(){
			var id=$(this).attr('data-id');
			current_location(id);
		}); 
	});
function initialize() {
    // Create the autocomplete object, restricting the search
    // to geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
    	/** @type {HTMLInputElement} */
    	(document.getElementById('user_address')), {
    		types: ['geocode']
    	});
    // console.log(autocomplete.getBounds());
    // google.maps.event.addDomListener(document.getElementById('user_address'), 'focus', geolocate);
    autocomplete.addListener('place_changed', get_latitude_longitude);
}

function get_latitude_longitude() {
	// Get the place details from the autocomplete object.
	var place = autocomplete.getPlace();
	var formattedAddress = place.formatted_address;
	var isValidAddress = false;
	for(var i in validServiceLocations) {
		if (formattedAddress.includes(validServiceLocations[i])) {
			isValidAddress = true;
			break;
		}
	}
	if(!isValidAddress) {
		// alert("There is no service in " + formattedAddress);
		swal({
            title: "alert!",
            text: "Sorry. There is no service in " + formattedAddress,
            icon: "info",
            button: "okay",
            closeOnEsc: true,
            closeOnClickOutside: true
        }).then(function(){
           $("#user_address").val("");
        });

		return;
	}
	var key = $("#map_key").val();//alert(map_key);
	//var key = "AIzaSyDYHKDyN1YX7hWTGtYdLb1F0UAOVwK1MKc";
	$.get('https://maps.googleapis.com/maps/api/geocode/json',{address:formattedAddress,key:key},function(data, status){
		var addressInfo = data.results[0].address_components;
		// console.log(addressInfo);
		$(data.results).each(function(key,value){
			 $('#user_address').val(place.formatted_address);
             $('#user_latitude').val(value.geometry.location.lat);
             $('#user_longitude').val(value.geometry.location.lng);
			$.post(base_url+'home/set_location',{address:place.formatted_address,latitude:value.geometry.location.lat,longitude:value.geometry.location.lng,csrf_token_name:csrf_token});
		});
	});
}

function geolocate() {
	
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function (position) {
			// var userLat = position.coords.latitude;
   //       var userLng = position.coords.longitude;
   //       var currentloc = { lat: userLat, lng: userLng };
			// var userSerial = "987654321";
   //       for (var i = 0; i < usermarkers.length; i++) {
   //           if (usermarkers[i].serialNumber === userSerial) {
   //               usermarkers[i].setMap(null);
   //               usermarkers = [];
   //           }
   //       }

   //       userMarker = new google.maps.Marker({
   //           position: currentloc,
   //           map: map,
   //           serialNumber: userSerial
   //       });
   //       userMarker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')
   //       usermarkers.push(userMarker);

			var geolocation = new google.maps.LatLng(
				position.coords.latitude, position.coords.longitude);
			var circle = new google.maps.Circle({
				center: geolocation,
				radius: position.coords.accuracy
			});
			autocomplete.setBounds(circle.getBounds());
		});
	}
}

function current_location(session) {
	// console.log("current_location");
	if (navigator.geolocation) {
		var options = {
		  enableHighAccuracy: true,
		  timeout: 5000,
		  maximumAge: 0
		};

		function success(pos) {
		  var crd = pos.coords;
		  console.log('Your current position is:');
		  console.log(`Latitude : ${crd.latitude}`);
		  console.log(`Longitude: ${crd.longitude}`);
		  console.log(`More or less ${crd.accuracy} meters.`);
		}

		function error(err) {
		  console.warn(`ERROR(${err.code}): ${err.message}`);
		}

		navigator.geolocation.getCurrentPosition(showPosition, error, options);
	}
	else {
		alert("Geolocation is not supported by this browser.");
	}

	function showPosition(position) {
		// var userLat = position.coords.latitude;
  //     var userLng = position.coords.longitude;
  //     var currentloc = { lat: userLat, lng: userLng };
		// var userSerial = "987654321";
  //     for (var i = 0; i < usermarkers.length; i++) {
  //         if (usermarkers[i].serialNumber === userSerial) {
  //             usermarkers[i].setMap(null);
  //             usermarkers = [];
  //         }
  //     }
  //     userMarker = new google.maps.Marker({
  //         position: currentloc,
  //         map: map,
  //         serialNumber: userSerial
  //     });
  //     userMarker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')
  //     usermarkers.push(userMarker);

		var user_address=$('#user_address_values').val();
		var user_latitude=$('#user_latitude_values').val();
		var user_longitude=$('#user_longitude_values').val();
		var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		var geocoder = geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'latLng': latlng }, function (results, status) {

			if (status == google.maps.GeocoderStatus.OK) {
				if (results[3]) { 
					if(session==1) {
						$('#user_address').val(results[3].formatted_address);
						$('#user_latitude').val(position.coords.latitude);
						$('#user_longitude').val(position.coords.longitude);

						$.post(base_url+'home/set_location',{address:results[3].formatted_address,latitude:position.coords.latitude,longitude:position.coords.longitude,csrf_token_name:csrf_token})
					}
					else {
						if(user_address=='' && user_latitude=='' && user_longitude=='') {
							$('#user_address').val(results[3].formatted_address);
							$('#user_latitude').val(position.coords.latitude);
							$('#user_longitude').val(position.coords.longitude);
							$.post(base_url+'home/set_location',{address:results[3].formatted_address,latitude:position.coords.latitude,longitude:position.coords.longitude,csrf_token_name:csrf_token})
						}
					}
				}
			}
		});
	}
}

})(jQuery);