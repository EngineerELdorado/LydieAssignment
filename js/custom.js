$(function () {
	$(document).on('click','.deleteButton',function(evt){
		evt.preventDefault();
		var clicked = $(this);
		var delId = $(this).attr('data-id');
		var target = $(this).attr('data-target');
		$.ajax({
			type: "POST",
			url: 'form-handle/handle-delete.php',
			data: {
				'id':delId,
				'target':target
			},
			success: function (response) {
				clicked.parent().parent().fadeOut(300);
			}
		});
	})
	$('form').submit(function (evt) {
		evt.preventDefault();
		var before = $(this).find("input[type='submit']").val();
		$(this).find("input[type='submit']").val("Submitting...").prop("disabled", true);
		var formData = new FormData(this);
		var url = $(this).attr("action");
		var type = "POST";

		$.ajax({
			type: "POST",
			url: url,
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			success: function (response) {
				$('form').find("input[type='submit']").val(before).prop("disabled", false);
				
				if (response.indexOf('success') > -1) {
					$('form')[0].reset();
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr['success'](response);
				} else {
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr['error'](response);
				}
			},
			error: function(xhr,status){
				$('form').find("input[type='submit']").val("Add Product").prop("disabled", false);
			}
		})
	});
});