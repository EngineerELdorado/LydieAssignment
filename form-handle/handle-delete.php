<?php
include "db.php";
if(isset($_POST['id'])){
	$target = $_POST['target'];
	$id = $_POST['id'];
	switch($target){
		case 'product':
			$sql = "DELETE FROM products WHERE id = $id";
			break;
		case 'supplier':
			$sql = "DELETE FROM suppliers WHERE id = $id";
			break;	
		case 'manager':
			$sql = "DELETE FROM managers WHERE id = $id";
			break;
	}
	mysqli_query($connection,$sql);
}
