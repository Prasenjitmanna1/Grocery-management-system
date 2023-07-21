<?php
  include('include/dbcon.php');

        $customer_name =$_POST['customer_name'];
        $customer_address =$_POST['customer_address'];
        $customer_phno =$_POST['customer_phno'];
      

$sql1="INSERT INTO `gms_customer`( `customer_name`, `customer_address`, `customer_phoneno`) 
VALUES ('$customer_name', '$customer_address', ' $customer_phno')";
echo"$sql1";
print_r($sql1);
$q1=mysqli_query($conn,$sql1);
if($q1>0){
    $_SESSION['msg']=" Customer Details Enterd Successfully";
  
      header("location:sale-cart-view.php");

}else{
    $_SESSION['msg']=" Unexpected Error occured";
    header("location:sale-cart-view.php");
}
 


?>