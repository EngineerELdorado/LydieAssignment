<?php
require_once("includes/header.php"); ?>
	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<form action="form-handle/add-managers.php" method="post" id="data">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" name="manager-name" id="" class="form-control" placeholder="Manager Name">
							<input type="hidden" name="addManager">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Email</label>
							<input type="email" name="manager-email" id="" class="form-control" placeholder="Manager Email">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Phone</label>
							<input type="text" name="manager-phone" id="" class="form-control" placeholder="Manager Phone Number">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="Name">Password</label>
							<input type="password" name="manager-password" id="" class="form-control" placeholder="Manager Phone Number">
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