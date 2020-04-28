<?php

include "db.php";

if(isset($_POST['id'])){
	$id = mysqli_real_escape_string($connection,$_POST['id']);

	$sql = "SELECT * FROM product_purchases WHERE id = $id";
	$result_ = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result_) < 1){
		die("Sorry, purchase request not found!");
	}
	$sql = "UPDATE product_purchases SET status = 'Rejected' WHERE id = $id";
	$result = mysqli_query($connection,$sql);
	
	die("Purchase Rejected successfully!");
	
}elseif(isset($_POST['reject'])){
	$id = mysqli_real_escape_string($connection,$_POST['reject']);

	$sql = "SELECT * FROM product_purchases WHERE id = $id";
	$result = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result) < 1){
		die("Sorry, purchase request not found!");
	}
	$sql = "UPDATE product_purchases SET status = 'Rejected' WHERE id = $id";
	$result = mysqli_query($connection,$sql);
	
	die("Purchase rejected successfully!");
}else{
	die();
}