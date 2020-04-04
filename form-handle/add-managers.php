<?php

include "db.php";

if(isset($_POST['addManager'])){
	$name = mysqli_real_escape_string($connection,$_POST['manager-name']);
	$email = mysqli_real_escape_string($connection,$_POST['manager-email']);
	$phone = mysqli_real_escape_string($connection,$_POST['manager-phone']);
	$pass = mysqli_real_escape_string($connection,$_POST['manager-password']);
	$pass = password_hash($pass,PASSWORD_BCRYPT,array("cost" => 12));
	$sql = "SELECT * FROM managers WHERE manager_email = '$email' OR manager_phone = $phone";
	$result = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result) > 0){
		die("Manager already registered!");
	}
	$sql = "SELECT * FROM suppliers WHERE supplier_email = '$email' OR supplier_phone = $phone";
	$result = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result) > 0){
		die("Email already registered!");
	}
	
	$sql = "INSERT INTO managers(manager_name,manager_email,manager_phone,manager_password) VALUES('{$name}','{$email}',$phone,'{$pass}')";
	if(mysqli_query($connection,$sql)){
		die("Account Created successfully!");
	}else{
		die("There was an error adding your product ".mysqli_error($connection));
	}
	
}else{
	die();
}