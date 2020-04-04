<?php
require_once("includes/header.php");
if(isset($_GET['edit-id'])){
	$product_id = $_GET['edit-id'];
	$sql = "SELECT * FROM products WHERE id = $product_id";
	$result = mysqli_query($connection,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$name = $row['product_name'];
			$image = $row['product_image'];
			$description = $row['product_description'];
			$quantity = $row['quantity'];
			$date = $row['date'];
			if($quantity < 20){
				$quantity_det = 'danger';
			}elseif($quantity >= 20 && $quantity < 50){
				$quantity_det = 'warning';
			}else{
				$quantity_det = 'success';
			}
		}
	}else{
		header("Location: index.php");
	}
}else{
	header("Location: index.php");
}
?>

	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<form action="form-handle/edit-products.php" method="post" enctype="multipart/form-data" id="data">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Product Name</label>
							<input type="text" name="product-name" id="" class="form-control" placeholder="Product Name" value="<?php echo $name; ?>">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Product Quantity</label>
							<input type="number" name="product-quantity" id="" class="form-control" placeholder="Product Quantity" value="<?php echo $quantity; ?>">
						</div>
					</div>
					
				</div>
				<div class="form-group">
						<textarea name="product-description" id="" class="form-control" placeholder="Product Description"><?php echo $description; ?></textarea>
						<input type="hidden" name="editProduct" value="True">
						<input type="hidden" name="productId" value="<?php echo $id; ?>">
						<input type="hidden" name="productImage" value="<?php echo $image; ?>">
					</div>
					<div class="row">
					<div class="col-sm-6">
						<img src="product-images/<?php echo $image; ?>" style="display:block;margin-left:auto;margin-right:auto;width:70%;" alt="">
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label for="Image">Product Image</label>
							<input type="file" name="product-image" class="form-control" id="">
						</div>
						</div>
					</div>
					<br>
					<div class="form-group">
						<input type="submit" value="Edit Product" class="btn btn-xs btn-primary">
					</div>
			</form>
		</div>
	</div>
<?php require_once("includes/footer.php") ?>