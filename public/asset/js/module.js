/**
* Module
*/
$(document).ready(function() {
	$('.isparent').change(function() {
		if (this.value == 'Y') {
			$('#parent').prop('disabled', 'disabled');
		}
		else if (this.value == 'N') {
			$('#parent').prop('disabled', false);
		}
	});
});
