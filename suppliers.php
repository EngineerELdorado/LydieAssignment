<?php
require_once("includes/header.php"); ?>
	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<table class="table table-hover js-basic-example dataTable table-custom">
			<div class="button" style="text-align:right;padding:20px 0px;">
				<a href="add-suppliers.php" class="btn add-button">Add Suppliers</a>
			</div>
				<thead>
					<tr>
						<th>#No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php
					
					$sql = "SELECT * FROM suppliers";
					$result = mysqli_query($connection,$sql);
					$counter = 1;
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['id'];
						$name = $row['supplier_name'];
						$email = $row['supplier_email'];
						$phone = $row['supplier_phone'];
						
						?>
						<tr>
						<td><b><?php echo $counter; ?></b></td>
						<td><?php echo $name; ?></td>
						
						<td><?php echo $email; ?></td>
						
						<td><?php echo $phone; ?></td>
						<td><a class="btn btn-xs btn-info" href="edit-suppliers.php?edit-id=<?php echo $id; ?>">Edit Supplier</a></td>
						<td><a class="btn btn-xs btn-danger deleteButton" href="" data-target="supplier" data-id="<?php echo $id; ?>">Delete Supplier</a></td>
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