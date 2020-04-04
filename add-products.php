<?php
require_once("includes/header.php"); ?>
	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<form action="form-handle/add-products.php" method="post" enctype="multipart/form-data" id="data">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Product Name</label>
							<input type="text" name="product-name" id="" class="form-control" placeholder="Product Name">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Product Quantity</label>
							<input type="number" name="product-quantity" id="" class="form-control" placeholder="Product Quantity">
						</div>
					</div>
					
				</div>
				<div class="form-group">
						<textarea name="product-description" id="" class="form-control" placeholder="Product Description"></textarea>
						<input type="hidden" name="addProduct" value="True">
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label for="Image">Product Image</label>
							<input type="file" name="product-image" class="form-control" id="">
						</div>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="Add Product" class="btn btn-xs btn-primary">
					</div>
			</form>
		</div>
	</div>
<?php require_once("includes/footer.php") ?>