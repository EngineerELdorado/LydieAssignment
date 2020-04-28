<?php
require_once("includes/header.php"); ?>
<?php

$user = $_SESSION["user"];
$userType = $user["type"];
?>
	<div class="main">
		<div class="left-nav">
			<?php require_once "includes/left-nav.php"; ?>
		</div>
		<div class="main-body">
			<table class="table table-hover js-basic-example dataTable table-custom">
			<div class="button" style="text-align:right;padding:20px 0px;">
			<?php if($userType=="Manager"){
 echo '<a href="add-purchases.php" class="btn add-button">Add Purchase</a>';
   }
  
   ?>	
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
						<th>Approve</th>
						<th>Reject</th>
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
						<td><a class="btn btn-xs btn-info" href="edit-purchases.php?edit-id=<?php echo $id; ?>">Edit</a></td>
						<td><a class="btn btn-xs btn-danger deleteButton" data-target="product" href="" data-id="<?php echo $id; ?>">Delete</a></td>
						<td class="<?php echo $user_class; ?>">
 <form action="form-handle/approve-purchase.php" method="post">
 <input value =<?php echo $id?> class="d-none" name="id" stye="visibility:hidden" />
 <button type="submit"  class="btn btn-xs btn-info">Approve</button>
 </form>
 </td>
 <td id ="reject" class="<?php echo $user_class; ?>">
 <form action="form-handle/reject-purchase.php" method="post">
 <input value =<?php echo $id?> class="d-none" name="id" stye="visibility:hidden" />
 <button type="submit"  class="btn btn-xs btn-danger rejectButton">Reject</button>
 </form>
 </td>
  

					</tr>
					<?php
						$counter++;
					}
					
				?>
					
				</tbody>
			</table>
		</div>
	</div>
	<script>
	document.getElementById("approve").addEventListener('click', function (event) {
		
        $purchaseId =  event.target.dataset.id;
        $sql = "UPDATE product_purchases set status ='Approved' where id = '{$purchaseId}'";mysqli_query($connection,$sql);
		alert("Purchase approved")  
	
event.preventDefault();

// Log the clicked element in the console


}, false);
	</script>
<?php require_once("includes/footer.php") ?>