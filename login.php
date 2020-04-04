<?php
session_start();
ob_start();
require_once 'form-handle/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventory Management System</title>
	<link rel="stylesheet" href="bundles/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="toastr/toastr.min.css">
	<link rel="stylesheet" href="css/style.css?id=12">
</head>
<body>
	<div class="header">
		<div class="left-header">
			<h1>Inventory Management System</h1>
		</div>
		
	</div>
	<div class="main">
		
		<div class="main-body" style="width:50%;display:block;margin-left:auto;margin-right:auto;margin-top:100px;">
			<form action="form-handle/auth.php" method="post" id="data">
				<div class="row">
					
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Email</label>
							<input type="email" name="user-email" id="" class="form-control" placeholder="Supplier Email">
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Password</label>
							<input type="password" name="user-password" id="" class="form-control" placeholder="Supplier Password">
						</div>
					</div>
				</div>
				
					<div class="form-group">
						<input type="submit" value="Login" class="btn btn-xs btn-primary">
					</div>
			</form>
		</div>
	</div>
	<script src="js/jquery-minified.js"></script>
	<script src="bundles/datatablescripts.bundle.js"></script>
	<script src="bundles/jquery-datatable.js"></script>
	<script src="toastr/toastr.js"></script>
	<script>
	
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
				
				if (response.indexOf('Success') > -1) {
					$('form')[0].reset();
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr['success'](response);
					
					setTimeout(function(){
						location.href = "index.php";
					},3000);
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
	</script>
</body>
</html>