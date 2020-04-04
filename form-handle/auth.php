<?php
session_start();
ob_start();

include "db.php";
if(isset($_POST['user-email']) && isset($_POST['user-password'])){
	$email = $_POST['user-email'];
	$password = $_POST['user-password'];
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		$sql = "SELECT * FROM managers WHERE manager_email = '$email'";
		
		$result = mysqli_query($connection,$sql);
		
		if(mysqli_num_rows($result) > 0){
			
			while($row = mysqli_fetch_assoc($result)){
				
				$user_id = $row['id'];
				$name = $row['manager_name'];
				$email = $row['manager_email'];
				$phone = $row['manager_phone'];
				$type = "Manager";
				$db_pass = $row['manager_password'];
				
				if(password_verify($password,$db_pass)){
					$user = array("id" => $user_id,"name" => $name, "email" => $email, "phone" => $phone, "type" => $type );
					
					$_SESSION['user'] = $user;
					
					
					die("Manager Login Successful! System redirecting shortly.");
				}else{
					die("Invalid Username or password!");
				}
			}
		}else{
			
		$sql = "SELECT * FROM suppliers WHERE supplier_email = '$email'";
			
		$result = mysqli_query($connection,$sql);
		
		if(mysqli_num_rows($result) > 0){
			
			  while($row = mysqli_fetch_assoc($result)){
				
				$user_id = $row['id'];
				$name = $row['supplier_name'];
				$email = $row['supplier_email'];
				$phone = $row['supplier_phone'];
				$type = "Supplier";
				$db_pass = $row['supplier_password'];
				
				if(password_verify($password,$db_pass)){
					$user = array("id" => $user_id,"name" => $name, "email" => $email, "phone" => $phone, "type" => $type );
					
					$_SESSION['user'] = $user;
					
					die("Supplier Login Successful! System redirecting shortly.");
					
				}else{
					die("Invalid Username or password!");
				}
			}	
		}else{
			die("Invalid Username or password!");
		}
		
	}
	
	
}else{
		die("Invalid Email Address!");
	}
}