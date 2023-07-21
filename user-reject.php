<?php
 include('include/dbcon.php');


if(isset($_GET['id'])){
	$Id = $_GET['id'];

$q = "UPDATE gms_user_account SET  USER_STATUS='N' where  where USER_ID='$Id'";

$qu=mysqli_query($conn, $q);
if($qu>0){
           
    $_SESSION['msg']= "User rejected Successfully.";
   
    
    }else{
        echo"Unexpected Error Occured";
    }


}
header('location:user-list.php');
 ?>
