<?php
    include('include/dbcon.php');
   
    include('navheader.php');
   ob_start();
    ?>


<body>
 

    <div class="form-background ">
    <a href="items.php">

<button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
   
    </a>
        <div class="container mt-2  "> 
    <?php
  $id=$_GET['id'];
  $query1="select * from gms_item where ITEM_ID='$id'";
  $result=mysqli_query($conn,$query1);
  $rows1=mysqli_fetch_assoc($result);

   if(isset($_POST['update'])){
    $id=$_GET['id'];
    $ITEM_NAME=$_POST['ITEM_NAME'];
    $ITEM_CATEGORY=$_POST['ITEM_CATEGORY'];
    $ITEM_HSN_CODE=$_POST['ITEM_HSN_CODE'];
    $ITEM_DESC=$_POST['ITEM_DESC'];
    $ITEM_SIZE=$_POST['ITEM_SIZE'];
    $ITEM_UNIT=$_POST['ITEM_UNIT'];
    $ITEM_STOCK_QUANTITY=$_POST['ITEM_STOCK_QUANTITY'];
    $ITEM_MRP=$_POST['ITEM_MRP'];
    $ITEM_GST_SLAB=$_POST['ITEM_GST_SLAB'];
    $ITEM_DISCOUNT=$_POST['ITEM_DISCOUNT'];
    $ITEM_FLOOR_NO=$_POST['ITEM_FLOOR_NO'];
    $ITEM_DISPLAY_NO=$_POST['ITEM_DISPLAY_NO'];
    $REMARKS=$_POST['REMARKS'];
    $ITEM_DATE=$_POST['ITEM_DATE'];
    $ITEM_CATEGORY=$_POST['ITEM_CATEGORY'];
    $ITEM_kg=$_POST['ITEM_STOCK_Weightk'];
    $ITEM_g=$_POST['ITEM_STOCK_Weightg'];
    $ITEM_STOCK_Weight= ($ITEM_kg*1000)+ $ITEM_g;

   
    
   
   

        $updatesql="  UPDATE `gms_item` SET `ITEM_NAME`='$ITEM_NAME',`ITEM_HSN_CODE`='$ITEM_HSN_CODE',`ITEM_DESC`='$ITEM_DESC',`ITEM_SIZE`='$ITEM_SIZE',`ITEM_UNIT`='$ITEM_UNIT',`ITEM_STOCK_QUANTITY`='$ITEM_STOCK_QUANTITY',
        `ITEM_STOCK_Weight`='$ITEM_STOCK_Weight',`ITEM_MRP`='$ITEM_MRP',`ITEM_GST_SLAB`='$ITEM_GST_SLAB',`ITEM_DISCOUNT`='$ITEM_DISCOUNT',`ITEM_FLOOR_NO`='$ITEM_FLOOR_NO',`ITEM_DISPLAY_NO`='$ITEM_DISPLAY_NO' ,`REMARKS`='$REMARK',
        `ITEM_CATEGORY`='$ITEM_CATEGORY' WHERE  `ITEM_ID`= '$id'";
        print_r($updatesql);
        $qu=mysqli_query($conn,$updatesql);
        if($qu>0){
           
            $_SESSION['msg']= "Items Updated Successfully.";
            header("location:items.php");
            
            }
else{
    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
    Some Errors Occured
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
   }



?>


        <div class="container mt-2  ">



        <div class="container login-container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Items Update</h3>
                <form action="" method="post">
                  
             
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="ITEM_NAME" value="<?php echo $rows1['ITEM_NAME']; ?>">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Category</label>
                        <select class="form-select form-control" name="ITEM_CATEGORY">
                            <?php
                            $c_id=$rows1['ITEM_CATEGORY'];
                        $q1="select c.CATEGORY_ID, c.CATEGORY_NAME from gms_item_category c
                        inner join gms_item i
                        on i.ITEM_CATEGORY=c.CATEGORY_ID 
                        where c.CATEGORY_ID= $c_id";

            $r1=mysqli_query($conn,$q1);
            $r2=mysqli_fetch_assoc($r1);
            ?>



            <option value="<?php echo$r2['CATEGORY_ID'];?>" selected> <?php echo$r2['CATEGORY_NAME']; ?>
                            </option>
                            <option selected value="">Select Category</option>
                            <?php
                       
                        $query="select * from gms_item_category ";

                        $result=mysqli_query($conn,$query);
                         $rows=mysqli_fetch_assoc($result);
                         foreach ($result as $row){
            
              ?>
                            <option value="<?php echo$rows['CATEGORY_ID'];?>" selected> <?php echo$rows['CATEGORY_NAME']; ?>
                            </option>
                          <?Php } 
                          ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item HSN Code</label>
                        <input type="text" class="form-control" name="ITEM_HSN_CODE"  value="<?php echo $rows1['ITEM_HSN_CODE']; ?>">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Description</label>
                        <input type="text" class="form-control" name="ITEM_DESC"  value="<?php echo $rows1['ITEM_DESC']; ?>">

                    </div>
              

                    
                    <div class="mb-3">
                        <label class="form-label">Item Size</label>
                        <input type="text" class="form-control" placeholder="big/small/200g,etc" name="ITEM_SIZE" value="<?php echo $rows1['ITEM_SIZE']; ?>">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item unit</label>
                        <select class="form-select form-control" name="ITEM_UNIT">
                            <option selected value="<?php echo $rows1['ITEM_UNIT']; ?>"><?php echo $rows1['ITEM_UNIT']; ?></option>
                            <option value="pcs">pcs</option>
                           
                            <option value="Pkt">Pkt</option>
                            <option value="Ltr">Ltr</option>
                            <!-- <option value="Ml">Ml</option> -->
                            <option value="Box">Box</option>
                            <option value="Kg">Kg</option>
                            <!-- <option value="g">g</option> -->

                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Previous Item Stock</label>
                        <input type="text" class="form-control" value="0" name="ITEM_STOCK_QUANTITY" value="<?php echo $rows1['ITEM_STOCK_QUANTITY']; ?>">

                    </div>
                    <?php
                   $weight= $rows1['ITEM_STOCK_Weight']/1000;
                  $ogwt = $rows1['ITEM_STOCK_Weight'];
                  $kg = strpos($weight, ".") ;     
                $mygram=$ogwt-$kg*1000;
                // echo  $mygram;
            // $gram = substr($weight, strpos($weight, ".") + 1,4);
            // // echo $kg1;
            // echo'-';
            // echo  $kg;
             
                    
                    ?>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Item Weight(in Kilogram-kg)</label>
                                <input type="number" class="form-control" name="ITEM_STOCK_Weightk"  value="<?php echo $kg ; ?>">

                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Item Weight(in gram-g)</label>
                                <input type="number" class="form-control" name="ITEM_STOCK_Weightg" value="<?php echo $mygram; ?>">

                            </div>
                            </div>

                    <div class="mb-3">
                        <label class="form-label">Item MRP</label>
                        <input type="text" class="form-control"  name="ITEM_MRP" required value="<?php echo $rows1['ITEM_MRP']; ?>">
                        <small >Enter per kg rate</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item GST slab</label>
                        <select class="form-select form-control" name="ITEM_GST_SLAB" required >
                        <option  selected value="<?php echo $rows1['ITEM_GST_SLAB']; ?>"><?php echo $rows1['ITEM_GST_SLAB']; ?></option>
                        <option value="">Select GST</option>
                            <option >No Tax</option>
                           
                            <option value="5">5% GST</option>
                            <option value="12">12% GST</option>
                            <option value="18">18% GST</option>
                            <option value="28">28% GST</option>                           

                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Discount(in percent%)</label>
                        <input type="text" class="form-control" value="0" name="ITEM_DISCOUNT" value="<?php echo $rows1['ITEM_DISCOUNT']; ?>">

                    </div>
  
                     <div class="mb-3">
                        <label class="form-label">Item Floor No</label>
                        <select class="form-select form-control" name="ITEM_FLOOR_NO">
                        <option selected value="<?php echo $rows1['ITEM_FLOOR_NO']; ?>"><?php echo $rows1['ITEM_FLOOR_NO']; ?></option>
                        <option >Select Floor</option>
                            <option value="ground">Ground</option>
                           
                            <option value="1st Floor">1st Floor</option>
                            <option value="2nd Floor">2nd Floor</option>
                            <option value="3rd  Floor">3rd  Floor</option>
                            <option value="4th  Floor">4th  Floor</option>


                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Display No.</label>
                        <input type="text" class="form-control" name="ITEM_DISPLAY_NO" value="<?php echo $rows1['ITEM_DISPLAY_NO']; ?>">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Item Status</label>
                        <input type="text" class="form-control" value="available" name="REMARKS" readonly value="<?php echo $rows1['REMARKS']; ?>">

                    </div>
                
                    <input type="submit" value="Update" name="update" class="btn btn-primary col-12">
                </form>
            </div>

        </div>
    </div>

</body>
<?php 
include('footer.php');

?>

