<?php

$user = $_SESSION["user"];
$userType = $user["type"];
?>
<ul class="navigation">
   <?php if($userType=="Manager"){
 echo "<li><a href='index.php'>Home</a></li>";
 echo "<li><a href='suppliers.php'>Suppliers</a></li>";
 echo "<li><a href='managers.php'>Managers</a></li>";
 echo "<li><a href='inventory.php'>Inventory</a></li>";
 echo "<li><a href='purchases.php'>Purchase orders</a></li>";
 echo "<li><a href='report.php'>Report</a></li>";
   }
   else{
	echo "<li><a href='index.php'>Home</a></li>";
	echo "<li><a href='inventory.php'>Inventory</a></li>";
	echo "<li><a href='purchases.php'>received orders</a></li>";
	echo "<li><a href='report.php'>Report</a></li>";
   }
   
   ?>
   
	
</ul>