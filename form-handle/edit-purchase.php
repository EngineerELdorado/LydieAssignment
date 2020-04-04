<?php

include "db.php";

if(isset($_POST['productId'])){
	$productId = mysqli_real_escape_string($connection,$_POST['productId']);
	$supplierId = mysqli_real_escape_string($connection,$_POST['supplierId']);
	$quantity = mysqli_real_escape_string($connection,$_POST['quantity']);
	$id = $_POST['purchaseId'];
	$sql = "UPDATE product_purchases SET supplier = '$supplierId',product = '$productId',quantity = $quantity WHERE id = $id";
	if(mysqli_query($connection,$sql)){
		die("Purchase Updated successfully!");
	}else{
		die("There was an error editing your product ".mysqli_error($connection));
	}
	
}else{
	die();
}