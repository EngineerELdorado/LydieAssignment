<?php
require_once("includes/header.php"); ?>

	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<table class="table table-hover js-basic-example dataTable table-custom">
			<div class="button" style="text-align:right;padding:20px 0px;">
				<a href="add-purchases.php" class="btn add-button">Add Purchase</a>
			</div>
				<thead>
					<tr>
						<th>#No</th>
						<th>Product</th>
						<th class="<?php echo $hidden_class; ?>">Supplier</th>
						<th>Quantity</th>
						<th>Manager</th>
						<th class="<?php echo $hidden_class; ?>">Edit</th>
						<th class="<?php echo $hidden_class; ?>">Delete</th>
						<th class="<?php echo $user_class; ?>">Approve</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT product_purchases.id,product_purchases.product, product_purchases.supplier,product_purchases.quantity,product_purchases.manager,products.product_name,suppliers.supplier_name,managers.manager_name FROM product_purchases INNER JOIN suppliers ON product_purchases.supplier = suppliers.id INNER JOIN products ON product_purchases.product = products.id INNER JOIN managers on product_purchases.manager = managers.id";
					$result = mysqli_query($connection,$sql);
					$counter = 1;
					
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['id'];
						$product = $row['product_name'];
						$supplier = $row['supplier_name'];
						$manager = $row['manager_name'];
						$quantity = $row['quantity'];
						
						?>
						<tr>
						<td><b><?php echo $counter; ?></b></td>
						<td><?php echo $product; ?></td>
						<td><?php echo $supplier; ?></td>
						<td><?php echo $quantity; ?></td>
						<td><?php echo $manager; ?></td>
						<td><a class="btn btn-xs btn-info" href="edit-purchases.php?edit-id=<?php echo $id; ?>">Edit Purchase</a></td>
						<td><a class="btn btn-xs btn-danger deleteButton" data-target="product" href="" data-id="<?php echo $id; ?>">Delete Purchase</a></td>
						<td class="<?php echo $user_class; ?>"><a class="btn btn-xs btn-info approvalRate" href="#" data-id="<?php echo $id; ?>">Approve Purchase</a></td>
						<td class="<?php echo $user_class; ?>"><a class="btn btn-xs btn-danger rejectButton" data-target="product" href="" data-id="<?php echo $id; ?>">Reject Purchase</a></td>
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