<?php

include "db.php";

if(isset($_POST['editProduct'])){
	$name = mysqli_real_escape_string($connection,$_POST['product-name']);
	$description = mysqli_real_escape_string($connection,$_POST['product-description']);
	$quantity = mysqli_real_escape_string($connection,$_POST['product-quantity']);
	$id = mysqli_real_escape_string($connection,$_POST['productId']);
	$current_image = $_POST['productImage'];
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
		unlink("../product-images/$current_image");
    } else {
        die("Error uploading file!");
    }
	}else{
		$imagename = $current_image;	
	}
	
	$sql = "UPDATE products SET product_name = '{$name}',product_description = '{$description}',quantity = $quantity,product_image = '{$imagename}' WHERE id = $id";
	
	if(mysqli_query($connection,$sql)){
		die("Product updated successfully!");
	}else{
		die("There was an error updating your product ".mysqli_error($connection));
	}
	
}else{
	die();
}