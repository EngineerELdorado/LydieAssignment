<?php
ob_start();
session_start();
if(isset($_SESSION['user'])){
	$user_object = $_SESSION['user'];
}else{
	header("Location: login.php");
}


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
	<link rel="stylesheet" href="css/style.css?id=1w2">
</head>
<body>
	<div class="header">
		<div class="left-header">
			<h1>Inventory Management System</h1>
		</div>
		<div class="right-header">
			<div class="inner-left">
				Welcome, <?php echo $user_object['name']; ?>
			</div>
			<div class="inner-right">
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</div>