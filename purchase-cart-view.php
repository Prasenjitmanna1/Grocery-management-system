<?php
ob_start();
include('navheader.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body>
    <?php
if(isset($_SESSION['msg'])){
      
      $error= $_SESSION['msg']; 
      echo "
      
      <div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
      $error
       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

    

   }
   unset($_SESSION['msg']); 
?>
    <!-- <div class="container mt-5">

       
        
            <div class="row">
                <div class="col-lg-8 bg-light rounded  border border-primary p-4">


                    


       
      
    </div>
    </div>
    </div> -->


    <div class="container">
    <a href="search.php">
<button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>
        <div class="row">
            <div class="col-lg-8 text-center rounded">
                <h1> Invoice items</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row justify-content-around">
            <div class="col-lg-8">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white fs-5">
                        <th>Sl</th>
                        <th>Item Code</th>
                        <th>name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>GST Slab(%)</th>
                        <th>GST Amount</th>
                        <th>Total Price</th>
                        <!-- <th>Update</th> -->
                        <th>Action</th>
                    </thead> 
                    <tbody>
                        <?php
                           
                            $total=0; 
                            $sum_total=0;
                            $keys=0;
                            $gst_amount=0;
                            $gst_total=0;
                            if(isset($_SESSION['pcart'])){ 
                                
                                foreach($_SESSION['pcart']  as $key=> $value){
                                    $total=$value['iprice']*$value['iqty'];
                                    $gst_amount=$total*$value['igst']/100;

                                    $gst_total +=($total*$value['igst']/100);
                                    $sum_total +=$value['iprice']*$value['iqty'];
                                    $keys=$key+1;
                                  echo"
                               <form action='purchase-cart.php' method='POST'>
                                    <tr>
                                    <td>$keys</td>
                                    <td><input type='hidden' name='hidden_code' value='$value[icode]'>$value[icode] </td>
                                    <td><input type='hidden' name='hidden_name' value='$value[iname]'>$value[iname] </td>
                                    <td><input type='hidden' name='hidden_price' value='$value[iprice]'>$value[iprice]</td>
                                   
                                    <td><input type='hidden' name='quantity' value='$value[iqty]'>$value[iqty] $value[iunit]</td>
                                    <input type='hidden' name='hidden_unit' value='$value[iunit]'>
                                    <td> <input type='hidden' name='hidden_gst' value='$value[igst]'>$value[igst]</td>
                                    <td> $gst_amount</td>
                                    <td> $total</td>
                                  
                                    <td><button name='remove' class='btn btn-danger'><i class='fa fa-trash-can'></i></button></td>
                                    <input type='hidden' name='item' value='$value[iname]'>

                                    
                                    </tr>";
                                         
                                }
                            }
                                    ?>
                        <tr>
                            <td colspan='6'></td>
                            <td><b>Total:</b><?php echo number_format($gst_total,2); ?></td>
                            <td><b>Total:</b><?php echo number_format($sum_total,2); ?></td>
                            <td> </td>
                        </tr>
                        </form>

                    </tbody>
                    <!-- <td><button name='update' class='btn btn-warning'>Update </button></td> -->
                </table>
            </div>



            <?php
                
                function inv()
                {
                    
                    include('include/dbcon.php');
             $q="select CONCAT('G',LPAD(RIGHT(ifnull(max(INVOICE_NO),'G00000'),5) + 1,5,'0')) from gms_purchase_master";
              $rs  = mysqli_query($conn,$q);
              return mysqli_fetch_array($rs)[0];
                  }
               
                        if(isset($_POST['submit'])){
                          $invoice=inv();
                          $purchase_date=$_POST['PURCHASE_DATE'];
                          $discount=$_POST['discount'];
                          $sTotal=$sum_total-$gst_total;
                          $gst= $gst_total;
                          $ss=$_POST['sub_total'];
                        //   $gtotal= $ss- $discount;
                          $supplier=$_POST['Supplier_id'];
                          $insquery1="INSERT INTO `gms_purchase_master`( `INVOICE_NO`, `PURCHASE_DATE`, `TOTAL`, `GST_AMOUNT`,`CREATED_ON`, `SUPPLIER_ID`,`SUB_TOTAL`,`DISCOUNT`)
                           VALUES ('$invoice','$purchase_date','$sTotal','$gst',NOW(),'$supplier','$ss','$discount')";
                            $result2=mysqli_query($conn, $insquery1);
                          
                            foreach($_SESSION['pcart']  as $key=> $value){
                                $iid=$value['id'];
                                $code=$value['icode'];
                                $name=$value['iname'];
                                   
                                    $price=$value['iprice'];
                                    $unit=$value['iunit'];

                                    if($value['iunit']=="Kg" or $value['iunit']=="Ltr"){
                                        $qty=$value['iqty']*1000;
                                    }else{
                                        $qty=$value['iqty'];
                                    }
                                 
                                    $sum_total =$value['iprice']*$value['iqty'];
                                    $query = "INSERT INTO `gms_purchase_details`( `ITEM_NAME`, `ITEM_ID`, `ITEM_QTY`, `ITEM_PRICE`, `UNIT`,`INVOICE_NO`) 
                                    VALUES ('$name',' $iid','$qty','$price','$unit','$invoice')";
                                    $result = mysqli_query($conn, $query);
                                    if($result>0 and $result2>0){
                                         unset($_SESSION['pcart'][$key]);
                                         header("location:purchase-bill.php?id=$invoice");
                                         $_SESSION['msg']="Bill generated Successfully";
                                       
                                    } else{


                                        $error=mysqli_error($conn);
                                        $_SESSION['msg']="Some Unexpected error Occured $error" ;
                                    }
                                   
                       
                            }
                            
                           
                        }

                        //Empty Cart

                        if (isset($_POST["empty"] )) { 
                        
                            unset($_SESSION['pcart']);
                        

                            
                            header("location:purchase-cart-view.php");

                        }



                                    ?>
            <div class="col-lg-4 mr-1 bg-light rounded  border border-primary p-4">
            <form action="" method="post">

                <div class="row">

                    <div class=" col">

                        <label class="form-label">Select Supplier</label>



                        <select class="form-select form-control" name="Supplier_id" required>
                            <option selected value="">Select Supplier</option> -->
                            <?php
                             $Totalwotax=0;
                            $Totalwotax=$sum_total-$gst_total;
                                $query1="Select supplier_id,supplier_name,supplier_gstno from `gms_supplier` where status='active'";
                                $result=mysqli_query($conn,$query1);
                                $today=date("Y-m-d");
                                $rows=mysqli_fetch_assoc($result);
                                foreach ($result as $row){
                            
                                ?>
                            <option value="<?php echo $row['supplier_id']; ?>">
                                <?php echo $row['supplier_name'];echo"-"; echo $row['supplier_gstno'];?></option>
                            <?php } ?>
                        </select>

                    </div>
                  
                    <div class=" col">
                        <label class="form-label">Purchase Date</label>
                        <input type="date" class="form-control" value="<?php echo $today; ?>" name="PURCHASE_DATE">

                    </div>
                </div> 
                <div class="row">
                    <div class=" col">
                        <label class="form-label">Rounded(-)</label>
                        <input type="text" placeholder="discount" id="discount" name="discount" value="0" class=" form-control ">

                    </div>
                    <div class=" col">
                        <label class="form-label">Total Bill</label>
                        <input type="text" id="price" name="sub_total" value=" <?php echo number_format($sum_total,2); ?>" class=" form-control " readonly>

                    </div>


                </div>
               
                <h3>Total Before GST</h3>
                <h1 class="bg-primary text-white">
                    <?php echo number_format($Totalwotax,2); ?>
                </h1>
                <h3>Total GST</h3>
                <h1 class="bg-warning text-white">
                    <?php echo number_format($gst_total,2); ?>
                </h1>
                <input type="submit" value="submit" name="submit" class='btn btn-success'>
                <input type="submit" value="Clear Cart " name="empty" class='btn btn-danger '>
                </form>
               
            </div>

        </div>
    </div>
</body>
<script>
    $('#discount, #price').on('input',function() {
    var discount = parseInt($('#discount').val());
    var price = parseFloat($('#price').val());
    $('#price').val((price - discount  ? price - discount  : 0));
});

</script>