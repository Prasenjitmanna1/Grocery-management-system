
<?php
 include('include/dbcon.php');


if(isset($_GET['id'])){
	$Id = $_GET['id'];

$q = "update `gms_supplier` set status='Discontinue' where SUPPLIER_ID= '$Id'";

mysqli_query($conn, $q);



}
header('location:supplier-view.php');
 ?>
