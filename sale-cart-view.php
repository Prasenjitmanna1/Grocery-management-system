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
<a href="sale-search.php">
<button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>


    <div class="container">
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
                        <th>Discount</th>
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
                            $discount=0;
                            $dtotal=0;
                            $total_discount=0;
                           
                            if(isset($_SESSION['scart'])){ 
                                
                                foreach($_SESSION['scart']  as $key=> $value){
                                    $total=$value['iprice']*$value['iqty'];
                                    
                                    $discount= $value['iqty']*$value['idiscount'];
                                    $dtotal=$total- $discount;
                                
                                    $gst_amount=$dtotal*$value['igst']/100;
                                    $gst_total +=($dtotal*$value['igst']/100);
                                    $total_discount +=$discount; //total discount of every item
                                    $sum_total +=$dtotal;
                                    $keys=$key+1;
                                  echo"
                               <form action='sale-cart.php' method='POST'>
                                    <tr>
                                    <td>$keys</td>
                                    <td><input type='hidden' name='hidden_code' value='$value[icode]'>$value[icode] </td>
                                    <td><input type='hidden' name='hidden_name' value='$value[iname]'>$value[iname] </td>
                                    <td><input type='hidden' name='hidden_price' value='$value[iprice]'>$value[iprice]</td>
                                   
                                    <td><input type='hidden' name='quantity' value='$value[iqty]'>$value[iqty] $value[iunit]</td>
                                    <input type='hidden' name='hidden_unit' value='$value[iunit]'>
                                    <td> <input type='hidden' name='hidden_gst' value='$value[igst]'>$value[igst]</td>
                                    <td> $gst_amount</td>
                                    <td> $discount</td>
                                    <td> $dtotal</td>
                                  
                                    <td><button name='remove' class='btn btn-danger'><i class='fa fa-trash-can'></i></button></td>
                                    <input type='hidden' name='item' value='$value[iname]'>

                                    
                                    </tr>";
                                         
                                }
                            }
                                    ?>
                        <tr>
                            <td colspan='6'></td>
                            <td><b>Total:</b><?php echo number_format($gst_total,2); ?></td>
                            <td><b>Discount:</b><?php echo number_format ($total_discount,2); ?></td>
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
             $q="select CONCAT('S',LPAD(RIGHT(ifnull(max(INVOICE_NO),'S00000'),5) + 1,5,'0')) from gms_sales_master";
              $rs  = mysqli_query($conn,$q);
              return mysqli_fetch_array($rs)[0];
                  }
                 
                        if(isset($_POST['submit'])){
                          $invoice=inv();
                           $purchase_date=$_POST['PURCHASE_DATE'];
                          $discounts=$_POST['discounts'];
                            $final_discount=$discounts+$total_discount; //total discount of every amount + rounding
                          $gst= $gst_total;
                          $ss=$_POST['sub_total'];
                        //   $gtotal= $ss- $discount;
                          $customer=$_POST['customer_id'];
                        //   `AMOUNT_RECEIVED`, `DUE`,
                        $insquery1="INSERT INTO `gms_sales_master`(`INVOICE_NO`, `INVOICE_DATE`, `CUST_ID`, `TOTAL`, `DISCOUNT`, `GST`,`TOTAL_AMOUNT`) VALUES 
                          ('$invoice',' $purchase_date','$customer','$sum_total',' $final_discount','$gst','$ss')";
                        //   $insquery1="INSERT INTO `gms_purchase_master`( `INVOICE_NO`, `PURCHASE_DATE`, `TOTAL`, `GST_AMOUNT`,`CREATED_ON`, `SUPPLIER_ID`,`SUB_TOTAL`,`DISCOUNT`)
                        //    VALUES ('$invoice','$purchase_date','$sTotal','$gst',NOW(),'$supplier','$ss','$discount')";
                            $result2=mysqli_query($conn, $insquery1);
                          
                            foreach($_SESSION['scart']  as $key=> $value){
                                $iid=$value['id'];
                                $code=$value['icode'];
                                $name=$value['iname'];
                               
                                   
                                    $price=$value['iprice'];
                                    $unit=$value['iunit'];
                                    $disc=$value['idiscount']*$value['iqty'];
                                    if($value['iunit']=="Kg" or $value['iunit']=="Ltr"){
                                        $qty=$value['iqty']*1000;
                                      
                                    }else{
                                        $qty=$value['iqty'];
                                       
                                    }
                                    $sum_total =$value['iprice']*$value['iqty'];
                                    $query = "INSERT INTO `gms_sales_details`( `SALES_INVOICE_ID`, `ITEM_ID`, `ITEM_UNIT`, `ITEM_QTY`, `ITEM_RATE`,`discount`) VALUES
                                     ('$invoice',' $iid','$unit','$qty','$price','$disc')";
                                    
                                    $result = mysqli_query($conn, $query);
                                    if($result>0 and $result2>0){
                                         unset($_SESSION['scart'][$key]);
                                         header("location:sale-bill.php?id=$invoice");
                                         $_SESSION['msg']="Bill generated Successfully";
                                        
                                    } else{
                                        $error=mysqli_error($conn);
                                        //$_SESSION['msg']="$error";
                                        echo"
                                        <script>
                                        alert('$error');
                                        window.location.href='sale-cart-view.php';
                                        </script>
                                        ";
                                    }
                                   
                       
                            }
                            
                           
                        }

                        //Empty Cart

                        if (isset($_POST["empty"] )) { 
                        
                            unset($_SESSION['scart']);
                        

                            
                            header("location:sale-cart-view.php");

                        }



                                    ?>
            <div class="col-lg-4 mr-1 bg-light rounded  border border-primary p-4">
                <form action="" method="post">

                    <div class="row">

                        <div class=" col">

                            <label class="form-label">Select Customer
                                 <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fa-solid fa-square-plus"></i>
                            </button>
                            </label>


                        
                            <select class="form-select form-control" name="customer_id" required>
                                <option selected value="">Select Customer</option> -->
                                 <?php
                                        $Totalwotax=0;
                                        $Totalwotax=$sum_total-$gst_total;
                                            $query1="Select customer_id,customer_name,customer_phoneno from `gms_customer` order by  customer_id desc";
                                            $result=mysqli_query($conn,$query1);
                                            $today=date("Y-m-d");
                                            $rows=mysqli_fetch_assoc($result);
                                            foreach ($result as $row){
                                        
                                    ?>
                                <option value="<?php echo $row['customer_id']; ?>">
                                    <?php echo $row['customer_name'];echo"-"; echo $row['customer_phoneno'];?></option>
                                <?php } ?>
                            </select>
                           

                        </div>

                        <div class=" col">
                            <label class="form-label">Sales Date</label>
                            <input type="date" class="form-control" value="<?php echo $today; ?>" name="PURCHASE_DATE">

                        </div>
                    </div>
                    <div class="row">
                        <div class=" col">
                            <label class="form-label">Rounded(-)</label>
                            <input type="text" placeholder="discount" id="discount" name="discounts" value="0"
                                class=" form-control ">

                        </div>
                        <div class=" col">
                            <label class="form-label">Total Bill</label>
                            <input type="text" id="price" name="sub_total"
                                value=" <?php echo number_format($sum_total,2); ?>" class=" form-control ">

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

    <!-- Modal -->





    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="customer-ba.php" method="post">
                    <div class="mb-3">
                        <label  class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Customer Address</label>
                        <input type="text" class="form-control" name="customer_address">

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Contact No</label>
                        <input type="number" class="form-control" name="customer_phno">

                    </div>
                                           
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   
                    <input type="submit" class="btn btn-primary" name="submit1" value="Create Customer">
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    $('#discount, #price').on('input', function () {
        var discount = parseInt($('#discount').val());
        var price = parseFloat($('#price').val());
        $('#price').val((price - discount ? price - discount : 0));
    });
</script>