<?php
require_once("includes/header.php"); ?>

	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<div class="clusters">
				<div class="cluster">
					<h1><i class="fa fa-users"></i></h1>
					<?php
						$sql = "SELECT * FROM managers";
						$result = mysqli_query($connection,$sql);
						$count = mysqli_num_rows($result);
					?>
					<h1><?php echo $count; ?></h1>
					<h2>Managers</h2>
				</div>
				<div class="cluster">
				<h1><i class="fa fa-th-list"></i></h1>
				<?php
						$sql = "SELECT * FROM suppliers";
						$result = mysqli_query($connection,$sql);
						$count = mysqli_num_rows($result);
					?>
				<h1><?php echo $count; ?></h1>
					<h2>Suppliers</h2>
				</div>
				<div class="cluster">
				<h1><i class="fa fa-list-ol"></i></h1>
				<?php
						$sql = "SELECT * FROM products";
						$result = mysqli_query($connection,$sql);
						$count = mysqli_num_rows($result);
					?>
				<h1><?php echo $count; ?></h1>
					<h2>Inventory</h2>
				</div>
				<div class="cluster">
				<h1><i class="fa fa-product-hunt"></i></h1>
				<?php
						$sql = "SELECT * FROM product_purchases";
						$result = mysqli_query($connection,$sql);
						$count = mysqli_num_rows($result);
					?>
				<h1><?php echo $count; ?></h1>
					<h2>Purchases</h2>
				</div>
			</div>
		</div>
	</div>
	
<?php require_once("includes/footer.php") ?>