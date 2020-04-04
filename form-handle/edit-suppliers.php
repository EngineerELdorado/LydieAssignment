<?php

include "db.php";

if(isset($_POST['editSupplier'])){
	$name = mysqli_real_escape_string($connection,$_POST['supplier-name']);
	$email = mysqli_real_escape_string($connection,$_POST['supplier-email']);
	$phone = mysqli_real_escape_string($connection,$_POST['supplier-phone']);
	$id = $_POST['id'];
	$sql = "UPDATE suppliers SET supplier_name = '$name',supplier_email = '$email',supplier_phone = $phone WHERE id = $id";
	if(mysqli_query($connection,$sql)){
		die("Account Updated successfully!");
	}else{
		die("There was an error editing your product ".mysqli_error($connection));
	}
	
}else{
	die();
}