$(document).ready(function() {
	init();
	
	// var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
	// Array.prototype.slice.call(forms).forEach((form) => {
	// 	form.addEventListener('submit', (event) => {
	// 	  if (!form.checkValidity()) {
	// 		event.preventDefault();
	// 		event.stopPropagation();
	// 	  }
	// 	  form.classList.add('was-validated');
	// 	}, false);
	// });

	$("select[name='sub_category']").on('change', function() {
		// console.log($(this).val())
		var subCate = "subcate_"+$(this).val();
		$serviceObj = $("select[name='service']");
		$serviceObj.empty();
		$serviceObj.append("<option value=''>Select Service</option>");
		var services = serviceList[subCate];
		if(services) {
			for(var i in services) {
				$serviceObj.append("<option value='"+services[i].id+"'>"+services[i].service_title+"</option>");
			}
		}
	});

	$("form#get_service").on("submit", function(event) {
		var form = $(this).get(0);
		if (!form.checkValidity()) {
			event.preventDefault();
			event.stopPropagation();
		}
		form.classList.add('was-validated');
	});

	$(".get-price").on("click", function() {
		$("form#get_service").submit();
	});

});

function init() {
	var subCate = "subcate_"+$("select[name='sub_category']").val();
	$serviceObj = $("select[name='service']");
	$serviceObj.empty();
	$serviceObj.append("<option value=''>Select Service</option>");
	var services = serviceList[subCate];
	if(services) {
		for(var i in services) {
			$serviceObj.append("<option value='"+services[i].id+"'>"+services[i].service_title+"</option>");
		}
	}
}