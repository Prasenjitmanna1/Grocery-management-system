<?php
session_start();
// session_destroy();
$name=$_POST['hidden_name'];
$price=$_POST['hidden_price'];
$qty=$_POST['quantity'];
//add to cart
if(isset($_POST["add_to_cart"])){

//to check if already exist
    $check_item=  array_column( $_SESSION['cart'],'iname');
    if(in_array($name,$check_item)){
        echo"
        <script>
        alert('Item already exist');
        window.location.href='purchase-test.php';
        </script>
        ";
    }else{
    

    $_SESSION['cart'][]=array(
   
    'iname' => $name,
    'iprice' => $price,
     'iqty' =>$qty

    );
  header("location:purchase-cart-view.php");
}
}
//remove from cart
if(isset($_POST["remove"])){
 foreach($_SESSION['cart'] as $key => $value){
    if($value['iname']=== $_POST['item']){
        unset($_SESSION['cart'][$key]);

        // rearrange key value
        $_SESSION['cart'] = array_values($_SESSION['cart'] );
        header("location:purchase-cart-view.php");
    }
 }
}
//Update Cart
if(isset($_POST["update"])){
    foreach($_SESSION['cart'] as $key => $value){
       if($value['iname']=== $_POST['item']){
        $_SESSION['cart'][$key]=array(
   
            'iname' => $name,
            'iprice' => $price,
             'iqty' =>$qty        
            );
            header("location:purchase-cart-view.php");
       }
    }
   }
//Empty Cart

   if (isset ( $_POST ["empty"] )) { // remove item from cart
    foreach($_SESSION['cart'] as $key => $value){
        // if($value['iname']=== $_POST['item']){
            unset($_SESSION['cart'][$key]);
    
            // rearrange key value
            // $_SESSION['cart'] = array_values($_SESSION['cart'] );
            // header("location:purchase-cart-view.php");
        // }
     }
  
}
?>