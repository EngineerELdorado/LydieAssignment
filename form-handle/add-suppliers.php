<?php

include "db.php";

if(isset($_POST['addSupplier'])){
	$name = mysqli_real_escape_string($connection,$_POST['supplier-name']);
	$email = mysqli_real_escape_string($connection,$_POST['supplier-email']);
	$phone = mysqli_real_escape_string($connection,$_POST['supplier-phone']);
	$pass = mysqli_real_escape_string($connection,$_POST['supplier-password']);
	$pass = password_hash($pass,PASSWORD_BCRYPT,array("cost" => 12));
	$sql = "SELECT * FROM suppliers WHERE supplier_email = '$email' OR supplier_phone = $phone";
	$result = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result) > 0){
		die("Supplier already registered!");
	}
	
	$sql = "SELECT * FROM managers WHERE manager_email = '$email' OR manager_phone = $phone";
	$result = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result) > 0){
		die("Email already registered!");
	}
	
	$sql = "INSERT INTO suppliers(supplier_name,supplier_email,supplier_phone,supplier_password) VALUES('{$name}','{$email}',$phone,'{$pass}')";
	if(mysqli_query($connection,$sql)){
		die("Account Created successfully!");
	}else{
		die("There was an error adding your product ".mysqli_error($connection));
	}
	
}else{
	die();
}