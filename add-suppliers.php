<?php
require_once("includes/header.php"); ?>
	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<form action="form-handle/add-suppliers.php" method="post" id="data">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" name="supplier-name" id="" class="form-control" placeholder="Supplier Name">
							<input type="hidden" name="addSupplier">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Email</label>
							<input type="email" name="supplier-email" id="" class="form-control" placeholder="Supplier Email">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Phone</label>
							<input type="text" name="supplier-phone" id="" class="form-control" placeholder="Supplier Phone Number">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Password</label>
							<input type="password" name="supplier-password" id="" class="form-control" placeholder="Supplier Phone Number">
						</div>
					</div>
				</div>
				
					<div class="form-group">
						<input type="submit" value="Register" class="btn btn-xs btn-primary">
					</div>
			</form>
		</div>
	</div>
<?php require_once("includes/footer.php") ?>