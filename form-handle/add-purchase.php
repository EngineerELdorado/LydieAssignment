<?php
ob_start();
session_start();
include "db.php";
if(isset($_SESSION['user']) && $_SESSION['user']['type'] == "Manager"){
	$user_id = $_SESSION['user']['id'];
}else{
	die("Only Managers Can Place a Purchase Offer!");
}
if(isset($_POST['addPurchase'])){
	$product = mysqli_real_escape_string($connection,$_POST['product']);
	$supplier = mysqli_real_escape_string($connection,$_POST['supplier']);
	$quantity = mysqli_real_escape_string($connection,$_POST['quantity']);
	
	
	$sql = "INSERT INTO product_purchases(product,supplier,quantity,manager) VALUES($product,$supplier,$quantity,$user_id)";
	if(mysqli_query($connection,$sql)){
		die("Purchase added successfully!");
	}else{
		die("There was an error adding your purchase ".mysqli_error($connection));
	}
	
}else{
	die();
}