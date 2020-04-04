<?php

include "db.php";

if(isset($_POST['id'])){
	$id = mysqli_real_escape_string($connection,$_POST['id']);

	$sql = "SELECT * FROM product_purchases WHERE id = $id";
	$result_ = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result_) < 1){
		die("Sorry, purchase request not found!");
	}
	$sql = "UPDATE product_purchases SET status = 'Approved' WHERE id = $id";
	$result = mysqli_query($connection,$sql);
	
	while($row = mysqli_fetch_assoc($result_)){
		$product = $row['product'];
		$quantity = $row['quantity'];
		
		$query = "UPDATE products SET quantity = quantity + $quantity WHERE id = $product";
		mysqli_query($connection,$query);
	}
	
	die("Purchase approved successfully!");
	
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