// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
	$('.select_luna').select2({//luna
		dropdownAutoWidth : true,
		dropdownPosition: 'below',
		width: '110px'

	});
	$('.select_zi').select2({//zi
		//minimumResultsForSearch: -1,//dezactivare search bar
		dropdownAutoWidth : true,
		dropdownPosition: 'below',
		width: '110px'
	});
	$('.select_an').select2({//an
		dropdownAutoWidth : true,
		dropdownPosition: 'below',
		width: '110px'
	});
	$('.limbaj').select2({//an
		dropdownAutoWidth : true,
		dropdownPosition: 'below',
		width: '180px'
	});
});