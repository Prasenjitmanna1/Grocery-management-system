<?php
    include('include/dbcon.php');
   
    include('navheader.php');
   ob_start();
    ?>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

<body>
 

    <div class="form-background ">      
    




        <div class="container mt-2  ">



            <div class="container login-container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Items</h3>
                <form action="barcode-create.php" method="post">
                  
                <div class="row">
                <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <select class="form-select form-control" name="item_id">
                            <option selected value="">Select Name</option>
                            <?php
                       
                        $query="select * from gms_item ";

                        $result=mysqli_query($conn,$query);
                         $rows=mysqli_fetch_assoc($result);
                         foreach ($result as $row){
            
                                ?>
                            <option value="<?php echo $row['ITEM_ID'];?>" selected> <?php echo $row['ITEM_NAME']; ?>
                            </option>
                          <?Php } 
                          ?>
                        </select>

                    </div>  
                    <div class="mb-3">
                        <label class="form-label">Barcode Quantity</label>
                        <input type="text" class="form-control" name="qty">

                    </div>
                      

                
                
                    <input type="submit" value="Create" name="Submit" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>

</body>
<?php 
include('footer.php');

?>

