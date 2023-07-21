<?php
    include('include/dbcon.php');
   
    include('navheader.php');
   ob_start();
    ?>


<body>
 

    <div class="form-background ">
        
    <?php
   
    function ItemCode()
    {
      
      include('include/dbcon.php');
    //   $doc =$_GET['doc'];
    //   $dt =$_GET['id'];
            $rs  = mysqli_query($conn,"select LPAD(RIGHT(ifnull(max(ITEM_CODE),'100000050'),9) + 1,9,'0') from gms_item");
      return mysqli_fetch_array($rs)[0];
      }


   if(isset($_POST['Submit'])){
   
    
      
        $ITEM_CODE =ItemCode();
        $ITEM_NAME =ucfirst($_POST['ITEM_NAME']);
        $ITEM_HSN_CODE =$_POST['ITEM_HSN_CODE'];
        $ITEM_DESC =$_POST['ITEM_DESC'];
        $ITEM_SIZE =$_POST['ITEM_SIZE'];
        $ITEM_UNIT =$_POST['ITEM_UNIT'];
        $ITEM_STOCK_QUANTITY =$_POST['ITEM_STOCK_QUANTITY'];
        $kg =$_POST['ITEM_STOCK_Weightk'];
        $g =$_POST['ITEM_STOCK_Weightg'];
        $ITEM_STOCK_Weight = ($kg*1000)+$g;
        $ITEM_MRP =$_POST['ITEM_MRP'];
        $ITEM_GST_SLAB =$_POST['ITEM_GST_SLAB'];
        $ITEM_DISCOUNT =$_POST['ITEM_DISCOUNT'];
        $ITEM_FLOOR_NO =$_POST['ITEM_FLOOR_NO'];
        $ITEM_DISPLAY_NO =$_POST['ITEM_DISPLAY_NO'];
        $REMARKS =$_POST['REMARKS'];
        $ENCODED_BY =$row['emp_name'];
         
        // $today = ; 
        // $ITEM_DATE =$today;
        $ITEM_CATEGORY =$_POST['ITEM_CATEGORY'];
        // echo $ITEM_STOCK_Weight;
   
        $sql2="select * from gms_item where ITEM_NAME ='$ITEM_NAME' ";
        // print_r($sql2);
        $q2=mysqli_query($conn,$sql2);
        $num=mysqli_num_rows($q2);
        // print_r($num);
        if($num>0){
            echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
            Item already Added.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }else{
            $sql=" INSERT INTO `gms_item`( `ITEM_CODE`, `ITEM_NAME`, `ITEM_HSN_CODE`, `ITEM_DESC`,
            `ITEM_SIZE`, `ITEM_UNIT`, `ITEM_STOCK_QUANTITY`, `ITEM_STOCK_Weight`, `ITEM_MRP`, `ITEM_GST_SLAB`,
             `ITEM_DISCOUNT`, `ITEM_FLOOR_NO`, `ITEM_DISPLAY_NO`,  `REMARKS`, `ENCODED_BY`, 
             `ITEM_CATEGORY`,`ITEM_DATE`) VALUES ('$ITEM_CODE','$ITEM_NAME','$ITEM_HSN_CODE','$ITEM_DESC','$ITEM_SIZE','$ITEM_UNIT',
              '$ITEM_STOCK_QUANTITY','$ITEM_STOCK_Weight','$ITEM_MRP',' $ITEM_GST_SLAB',' $ITEM_DISCOUNT',
              '$ITEM_FLOOR_NO','$ITEM_DISPLAY_NO','$REMARKS','$ENCODED_BY','$ITEM_CATEGORY',NOW())";
            $q=mysqli_query($conn,$sql);
        //     echo $q;
        //    print_r($sql);
    
            if($q>0){
               
                $_SESSION['msg']= "Item  added Successfully";
                header("location:items.php");
                
                }
                else{
                    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
                    Unavailable to add item due to Some technical error
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }

        }

   }


?>



        <div class="container mt-2  ">

        <a href="items.php">
    <button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>

            <div class="container login-container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Items</h3>
                <form action="" method="post">
                  
                <div class="row">
                  
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="ITEM_NAME" required maxlength="60" placeholder="Eg: Haldi 200gm">

                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Category</label>
                        <select class="form-select form-control" name="ITEM_CATEGORY" required >
                            <option selected value="">Select Category</option>
                            <?php
                       
                        $query="select * from gms_item_category ";

                        $result=mysqli_query($conn,$query);
                         $rows=mysqli_fetch_assoc($result);
                         foreach ($result as $row){
            
              ?>
                            <option value="<?php echo$row['CATEGORY_ID'];?>" selected> <?php echo$row['CATEGORY_NAME']; ?>
                            </option>
                          <?Php } 
                          ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item HSN Code</label>
                        <input type="text" class="form-control" name="ITEM_HSN_CODE" required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Description</label>
                        <input type="text" class="form-control" name="ITEM_DESC"  >

                    </div>
              

                    
                    <div class="mb-3">
                        <label class="form-label">Item Size</label>
                        <input type="text" class="form-control" placeholder="big/small/200g,etc" name="ITEM_SIZE"  >

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item unit</label>
                        <select class="form-select form-control" name="ITEM_UNIT"  onchange="yesnoCheck(this);" required>
                            <option selected value="">Select Unit</option>
                            <option value="pcs">pcs</option>
                           
                            <option value="Ltr">Ltr</option>
                           
                            <option value="Kg">Kg</option>
                         

                        </select>

                    </div>

                    <div class="mb-3" id="ifYes" style="display: none;">
                        <label class="form-label">Item Stock Quantity</label>
                        <input type="text" class="form-control" value="0" name="ITEM_STOCK_QUANTITY">

                    </div>
                        <div class="row" id="ifYes2" style="display:block;">
                            <div class="mb-3 col-6">
                                <label class="form-label">Item Weight(in kg/Ltr)</label>
                                <input type="number" class="form-control" name="ITEM_STOCK_Weightk" value="0" placeholder="7">

                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Item Weight(in g/ml)</label>
                                <input type="number" class="form-control" name="ITEM_STOCK_Weightg" value="0" placeholder="250">

                            </div>
                        </div>

                    <div class="mb-3">
                        <label class="form-label">Item MRP</label>
                        <input type="text" class="form-control"  name="ITEM_MRP" required>
                        <small >Enter per kg rate</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item GST slab</label>
                        <select class="form-select form-control" name="ITEM_GST_SLAB" required>
                            <option selected value="">Select GST</option>
                            <option value="0">No Tax</option>
                           
                            <option value="5">5% GST</option>
                            <option value="12">12% GST</option>
                            <option value="18">18% GST</option>
                            <option value="28">28% GST</option>                           

                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Discount</label>
                        <input type="text" class="form-control" value="0" name="ITEM_DISCOUNT" maxlength="3">

                    </div>
  
                     <div class="mb-3">
                        <label class="form-label">Item Floor No</label>
                        <select class="form-select form-control" name="ITEM_FLOOR_NO">
                            <option selected>Select Floor</option>
                            <option value="ground">Ground</option>
                           
                            <option value="1st Floor">1st Floor</option>
                            <option value="2nd Floor">2nd Floor</option>
                            <option value="3rd  Floor">3rd  Floor</option>
                            <option value="4th  Floor">4th  Floor</option>


                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Rack No.</label>
                        <input type="text" class="form-control" name="ITEM_DISPLAY_NO">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Item Status</label>
                        <input type="text" class="form-control" value="available" name="REMARKS" readonly>

                    </div>

                
                
                    <input type="submit" value="Create" name="Submit" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>
    <script>
function yesnoCheck(that) {
    if (that.value == "pcs") {
  
        document.getElementById("ifYes").style.display = "block";
        document.getElementById("ifYes2").style.display = "none";
    } else {
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("ifYes2").style.display = "block";
    }
}
</script>
</body>
<?php 
include('footer.php');

?>

