<?php
require_once("includes/header.php");
if(isset($_GET['edit-id'])){
	$purchase_id = $_GET['edit-id'];
	$sql = "SELECT * FROM product_purchases WHERE id = $purchase_id";
	$result = mysqli_query($connection,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			
			$productId = $row['product'];
			$supplierId = $row['supplier'];
			$quantity = $row['quantity'];

			$productQuery = "SELECT * FROM products WHERE id = $productId";
			$productResult = mysqli_query($connection,$productQuery);
			if(mysqli_num_rows($productResult) > 0){

				while($productRow = mysqli_fetch_assoc($productResult)){

					$productName = $productRow['product_name'];
				}

			}

			$supplierQuery = "SELECT * FROM suppliers WHERE id = $supplierId";
			$purchaseResult = mysqli_query($connection,$supplierQuery);
			if(mysqli_num_rows($purchaseResult) > 0){

				while($supplierRow = mysqli_fetch_assoc($purchaseResult)){

					$supplierName = $supplierRow['supplier_name'];
				}

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
			<form action="form-handle/edit-purchase.php" method="post" id="data">

			<input style="display:none" name="purchaseId" value ="<?php echo $purchase_id ?>" />
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Product</label>
							<select name="productId" id="" class="form-control" required>
								<option value="<?php echo $productId ?>"><?php echo $productName ?></option>
								<?php
								$sql = "SELECT * FROM products";
								$result = mysqli_query($connection,$sql);
								
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];
									$name = $row['product_name'];
									
									echo "<option value='$id'>$name</option>";
								}
								?>
							</select>
							<input type="hidden" name="addPurchase">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Supplier</label>
							<select name="supplierId" id="" class="form-control" required>
								<option value="<?php echo $supplierId ?>"><?php echo $supplierName ?></option>
								<?php
								$sql = "SELECT * FROM suppliers";
								$result = mysqli_query($connection,$sql);
								
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];
									$name = $row['supplier_name'];
									
									echo "<option value='$id'>$name</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Quantity Required</label>
							<input type="number" name="quantity" id="" value="<?php echo $quantity ?>" class="form-control" placeholder="Product Amount" required>
						</div>
					</div>
					
				</div>
				
					<div class="form-group">
						<input type="submit" value="update Purchase" class="btn btn-xs btn-primary">
					</div>
			</form>
		</div>
	</div>
<?php require_once("includes/footer.php") ?>