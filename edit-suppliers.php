<?php
require_once("includes/header.php");
if(isset($_GET['edit-id'])){
	$supplier_id = $_GET['edit-id'];
	$sql = "SELECT * FROM suppliers WHERE id = $supplier_id";
	$result = mysqli_query($connection,$sql);
					
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$name = $row['supplier_name'];
			$email = $row['supplier_email'];
			$phone = $row['supplier_phone'];
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
			<form action="form-handle/edit-suppliers.php" method="post" id="data">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" name="supplier-name" id="" class="form-control" placeholder="Supplier Name" value="<?php echo $name; ?>">
							<input type="hidden" name="editSupplier">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Email</label>
							<input type="email" name="supplier-email" id="" class="form-control" placeholder="Supplier Email" value="<?php echo $email; ?>">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Phone</label>
							<input type="text" name="supplier-phone" id="" class="form-control" placeholder="Supplier Phone Number" value="<?php echo $phone; ?>">
						</div>
					</div>
				</div>
				
					<div class="form-group">
						<input type="submit" value="Update Records" class="btn btn-xs btn-primary">
					</div>
			</form>
		</div>
	</div>
<?php require_once("includes/footer.php") ?>