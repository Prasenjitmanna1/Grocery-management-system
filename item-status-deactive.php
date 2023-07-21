 
<?php
 include('include/dbcon.php');


if(isset($_GET['id'])){
	$Id = $_GET['id'];

$q = "UPDATE `gms_item` SET REMARKS='Unavailable' where ITEM_ID= '$Id'";

$qu=mysqli_query($conn, $q);
if($qu>0){
           
    $_SESSION['msg']= "Item is set to unavailable Successfully.";
   
    
    }else{
        echo"njnjnj";
    }


}
header('location:items.php');
 ?>
