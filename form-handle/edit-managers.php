<?php

include "db.php";

if(isset($_POST['editManager'])){
	$name = mysqli_real_escape_string($connection,$_POST['manager-name']);
	$email = mysqli_real_escape_string($connection,$_POST['manager-email']);
	$phone = mysqli_real_escape_string($connection,$_POST['manager-phone']);
	$id = $_POST['id'];
	$sql = "UPDATE managers SET manager_name = '$name',manager_email = '$email',manager_phone = $phone WHERE id = $id";
	if(mysqli_query($connection,$sql)){
		die("Account Updated successfully!");
	}else{
		die("There was an error editing your product ".mysqli_error($connection));
	}
	
}else{
	die();
}