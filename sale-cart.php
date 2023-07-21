<?php
session_start();
ob_start();
// session_destroy();
include('include/dbcon.php');
$id=$_POST['hidden_id'];
$discount=$_POST['hidden_discount'];
$code=$_POST['hidden_code'];
$name=$_POST['hidden_name'];
$price=$_POST['hidden_price'];
$unit=$_POST['hidden_unit'];
$gst=$_POST['hidden_gst'];
$sql = "SELECT * from items_cat where ITEM_CODE='$code'";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($res);
if($rows["ITEM_STOCK_QUANTITY"]==0 or $rows["ITEM_UNIT"]=='Kg' or $rows["ITEM_UNIT"]=='ltr' ){
    $kg =$_POST['ITEM_STOCK_Weightk'];
    $g =$_POST['ITEM_STOCK_Weightg'];
    if ($g>0){
        $quantity = (($kg*1000)+$g)/1000;
    }else{
        $quantity = $kg;
    }
  
}
   
else{
    $qty=$_POST['quantity'];
    $quantity=$qty;
   
}


//add to cart
if(isset($_POST["add_to_cart"])){

//to check if already exist
    $check_item=  array_column( $_SESSION['scart'],'iname');
    if(in_array($name,$check_item)){
        echo"
        <script>
        alert('Item already exist');
        window.location.href='sale-search.php';
        </script>
        ";
    }else{
    

    $_SESSION['scart'][]=array(
        'id' => $id,
        'icode' => $code,
        'idiscount' =>$discount,
    'iname' => $name,
    'iprice' => $price,
    'iunit' => $unit,
    'igst' => $gst,
     'iqty' => $quantity

    );
    header("location:sale-search.php");
    // echo"
    // <script>
    // alert('Item Added');
    // window.location.href='sale-search.php';
    // </script>
    // ";
}
}


//remove from cart
if(isset($_POST["remove"])){
    foreach($_SESSION['scart'] as $key => $value){
       if($value['iname']=== $_POST['item']){
           unset($_SESSION['scart'][$key]);
   
           // rearrange key value
           $_SESSION['scart'] = array_values($_SESSION['scart'] );
           header("location:sale-cart-view.php");
       }
    }
   }




?>