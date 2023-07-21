
<?php
 include('include/dbcon.php');


if(isset($_GET['id'])){
	$Id = $_GET['Id'];

$q = "delete  from `gms_user_account` where USER_ID= '$Id'";

mysqli_query($conn, $q);



}
header('location:user-view.php');
 ?>
