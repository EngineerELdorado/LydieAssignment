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
						<th>Quantity ordered</th>
						<th>Manager</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				
				
				<?php
					$sql = "SELECT pp.id as purchaseId, pp.status as purchaseStatus, p.product_name as productName, s.supplier_name as supplierName, m.manager_name as managerName, pp.quantity as quantity, p.product_image as productImage
					FROM product_purchases as pp 
					INNER JOIN products as p on pp.product =  p.id
					 INNER JOIN suppliers as s on pp.supplier =s.id
					  INNER JOIN managers as m on pp.manager = m.id
				";
					$result = mysqli_query($connection,$sql);
					$counter = 1;
					
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['purchaseId'];
						$product = $row['productName'];
						$supplier = $row['supplierName'];
						$manager = $row['managerName'];
						$quantity = $row['quantity'];
						$image = $row['productImage'];
						$status = $row['purchaseStatus'];
						?>
						<tr>
						<td><b><?php echo $counter; ?></b></td>
						<td><?php echo $product; ?></td>
						<td><img src="product-images/<?php echo $image; ?>" alt="" style="width:60px;"></td>
						
						<td><?php echo $supplier; ?></td>
						<td><?php echo $quantity; ?></td>
						<td><?php echo $manager; ?></td>
						<td style="color: <?php 
                                 if($status=="Approved"){
									 echo "blue";
								 }else if($status=="Rejected"){
									 echo "red";
								 }else if($status=="Pending"){
									 echo "orange";
								 }
						?>" ><?php echo $status; ?></td>
						
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