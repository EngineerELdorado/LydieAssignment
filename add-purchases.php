<?php
require_once("includes/header.php"); ?>
	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<form action="form-handle/add-purchase.php" method="post" id="data">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Product</label>
							<select name="product" id="" class="form-control" required>
								<option value="">Select Product</option>
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
							<select name="supplier" id="" class="form-control" required>
								<option value="">Select Supplier</option>
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
							<input type="number" name="quantity" id="" class="form-control" placeholder="Product Amount" required>
						</div>
					</div>
					
				</div>
				
					<div class="form-group">
						<input type="submit" value="Request Purchase" class="btn btn-xs btn-primary">
					</div>
			</form>
		</div>
	</div>
<?php require_once("includes/footer.php") ?>