<?php

include "db.php";

if(isset($_POST['addProduct'])){
	$name = mysqli_real_escape_string($connection,$_POST['product-name']);
	$description = mysqli_real_escape_string($connection,$_POST['product-description']);
	$quantity = mysqli_real_escape_string($connection,$_POST['product-quantity']);
	
	
	if(isset($_FILES['product-image']['name']) && $_FILES['product-image']['name'] !== ''){
		$target_dir = "../product-images/";

$target_file = $target_dir . str_replace(" ","-",basename($_FILES["product-image"]["name"]));
$target_file = $target_dir . str_replace("(","-",basename($_FILES["product-image"]["name"]));
$target_file = $target_dir . str_replace(")","-",basename($_FILES["product-image"]["name"]));
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(getimagesize($_FILES["product-image"]["tmp_name"])) {
        
    } else {
        die("File is not an image.");
       
    }
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
   
}
if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file)) {
        $imagename = str_replace(" ","-",basename($_FILES["product-image"]["name"]));
        $imagename = str_replace("(","-",basename($_FILES["product-image"]["name"]));
        $imagename = str_replace(")","-",basename($_FILES["product-image"]["name"]));
    } else {
        die("Error uploading file!");
    }
	}else{
		$imagename = '';	
	}
	
	$sql = "INSERT INTO products(product_name,product_description,quantity,product_image) VALUES('{$name}','{$description}',$quantity,'{$imagename}')";
	if(mysqli_query($connection,$sql)){
		die("Product added successfully!");
	}else{
		die("There was an error adding your product ".mysqli_error($connection));
	}
	
}else{
	die();
}