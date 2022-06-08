$(document).ready(function() {
	$('.btn-open').click(function(event) {
		$('.hop-thoai').addClass('hien-ra');
		$('.nen-mo').addClass('hien-ra');
	});
	$('.btn-close').click(function(event) {
		$('.hop-thoai').removeClass('hien-ra');
		$('.nen-mo').removeClass('hien-ra');
	});
	$('.nen-mo').click(function(event) {
		$('.hop-thoai').removeClass('hien-ra');
		$('.nen-mo').removeClass('hien-ra');
	});
});