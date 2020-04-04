<?php
require_once("includes/header.php"); ?>

	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<table class="table table-hover js-basic-example dataTable table-custom">
			
				<thead>
					<tr>
						<th>#No</th>
						<th>Name</th>
						<th>Image</th>
						<th>Supplier</th>
						<th>Quantity Received</th>
						<th>Manager</th>
					</tr>
				</thead>
				<tbody>
				
				
				<?php
					$sql = "SELECT product_purchases.id,product_purchases.product, product_purchases.supplier,product_purchases.quantity,product_purchases.manager,products.product_name,products.product_image,suppliers.supplier_name,managers.manager_name FROM product_purchases INNER JOIN suppliers ON product_purchases.supplier = suppliers.id INNER JOIN products ON product_purchases.product = products.id INNER JOIN managers on product_purchases.manager = managers.id WHERE product_purchases.status = 'Approved'";
					$result = mysqli_query($connection,$sql);
					$counter = 1;
					
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['id'];
						$product = $row['product_name'];
						$supplier = $row['supplier_name'];
						$manager = $row['manager_name'];
						$quantity = $row['quantity'];
						$image = $row['product_image'];
						?>
						<tr>
						<td><b><?php echo $counter; ?></b></td>
						<td><?php echo $product; ?></td>
						<td><img src="product-images/<?php echo $image; ?>" alt="" style="width:60px;"></td>
						
						<td><?php echo $supplier; ?></td>
						<td><?php echo $quantity; ?></td>
						<td><?php echo $manager; ?></td>
						
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