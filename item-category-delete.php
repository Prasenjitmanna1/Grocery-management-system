
<?php
 include('include/dbcon.php');


if(isset($_GET['id'])){
	$Id = $_GET['id'];

$q = "delete  from gms_item_category where CATEGORY_ID= '$Id'";

$result=mysqli_query($conn, $q);

if($result>0){
    $_SESSION['msg']= "Item category Deleted Successfully";
                header("location:item-category.php");
}else{
    $_SESSION['msg']= "Some Error Occured";
    header("location:item-category.php");
}

}

 ?>
