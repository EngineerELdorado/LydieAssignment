<?php
require_once("includes/header.php"); ?>

	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<table class="table table-hover js-basic-example dataTable table-custom">
			<div class="button" style="text-align:right;padding:20px 0px;">
				<a href="add-products.php" class="btn add-button">Add Products</a>
			</div>
				<thead>
					<tr>
						<th>#No</th>
						<th>Name</th>
						<th>Image</th>
						<th>Description</th>
						<th>Quantity</th>
						<th>Last Updated</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT * FROM products order by id DESC";
					$result = mysqli_query($connection,$sql);
					$counter = 1;
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
						?>
						<tr>
						<td><b><?php echo $counter; ?></b></td>
						<td><?php echo $name; ?></td>
						<td><img src="product-images/<?php echo $image; ?>" alt="" style="width:60px;"></td>
						<td><?php echo $description; ?></td>
						<td><span class="badge badge-<?php echo $quantity_det; ?>"><?php echo $quantity; ?></span></td>
						<td><?php echo $date; ?></td>
						<td><a class="btn btn-xs btn-info" href="edit-products.php?edit-id=<?php echo $id; ?>">Edit Product</a></td>
						<td><a class="btn btn-xs btn-danger deleteButton" data-target="product" href="" data-id="<?php echo $id; ?>">Delete Product</a></td>
					</tr>
					<?php
						$counter++;
					}
					
				?>
				
				
					
					
				</tbody>
			</table>
		</div>
	</div>
	
<?php require_once("includes/footer.php") ?>