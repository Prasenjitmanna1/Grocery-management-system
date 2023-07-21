<?php 
include('navheader.php');

?>
<style>
    .qty {
        text-align: right;
    }
</style>

<body>
    <div class="main-div" id="maindiv">
        <div class="container-fluid mt-1">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 table-heading">Sale </h3>
                </div>
            </div>
            <hr class=" hr-line opacity-100 ">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <form method="post">
                        <div class="input-group">
                            <div class="form-outline ">
                                <input type="search" id="form1" class="form-control " name="str"
                                    placeholder="Enter Barcode" required />
                                <!-- <label class="form-label" for="form1">Search</label> -->
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
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

                    </form>
                    <div class="col">
                        <div class="container">
                            <div class="row">

                                <?php
                                    include('include/dbcon.php');
                                    if(isset($_POST['submit'])){
                                        $str=mysqli_real_escape_string($conn,$_POST['str']);
                                        $sql = "SELECT * from items_cat where (item_code like '%$str%' or item_name like  '%$str%')  and (REMARKS='available')";
                                        
                                        $res=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($res)>0){ 
                                            while($row=mysqli_fetch_assoc($res)){
                                                ?>

                                <div class="col-md-4">
                                    <form method="post" action="sale-cart.php">
                                        <div class="border border-primary border-2"
                                            style="  border-radius:5px; padding:16px;" align="center">


                                            <h4 class=" text-secondary item-name"><span
                                                    class="text-capitalize text-primary">Item
                                                    Name:</span>
                                                <?php echo $row["ITEM_NAME"]; ?></h4>

                                            <img src="barcode.php?text=<?php echo $row['ITEM_CODE']; ?>&codetype=code39&size=40&print=true"
                                                alt="testing" />

                                            <?php
                                        if($row["ITEM_STOCK_QUANTITY"]!=0  ){
                                            ?>
                                            <p>available
                                                Stock:<?php echo $row["ITEM_STOCK_QUANTITY"]; echo $row["ITEM_UNIT"]; ?>
                                            </p>
                                            <?php
                                        }else{
                                            $weight=$row["ITEM_STOCK_Weight"]/1000;
                                            ?>
                                            <p class="text-info">Available Stock:<span
                                                    class="font-weight-bold"><?php echo $weight; echo $row["ITEM_UNIT"];?></span>
                                            </p>


                                            <?php
                                        }
                                        ?>

                                            <h4 class="text-danger"><i class="fa fa-indian-rupee-sign"></i>
                                                <?php echo $row["ITEM_MRP"]; ?></h4>
                                            <?php
                                                    if($row["ITEM_STOCK_QUANTITY"]==0 or $row["ITEM_UNIT"]=='Kg' or $row["ITEM_UNIT"]=='ltr' ){
                                                        ?>
                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Weight(in Kg/Ltr)</label>
                                                    <input type="number" class="form-control" name="ITEM_STOCK_Weightk"
                                                        value="0">

                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Weight(in g/ml)</label>
                                                    <input type="number" class="form-control" name="ITEM_STOCK_Weightg"
                                                        value="0">

                                                </div>
                                            </div>
                                            <?php
                                        }else{
                                            ?>
                                            <input type="number" name="quantity" value="1" class="form-control qty"
                                                id="cartValue" />
                                            <?php
                                                    }
                                            ?>
                                            <input type="hidden" name="hidden_id"
                                                value="<?php echo $row["ITEM_ID"]; ?>" />
                                            <input type="hidden" name="hidden_code"
                                                value="<?php echo $row["ITEM_CODE"]; ?>" />
                                            <input type="hidden" name="hidden_name"
                                                value="<?php echo $row["ITEM_NAME"]; ?>" />
                                                <input type="hidden" name="hidden_discount"
                                                value="<?php echo $row["ITEM_DISCOUNT"]; ?>" />

                                            <input type="hidden" name="hidden_price"
                                                value="<?php echo $row["ITEM_MRP"]; ?>" />
                                            <input type="hidden" name="hidden_unit"
                                                value="<?php echo $row["ITEM_UNIT"]; ?>" />
                                            <input type="hidden" name="hidden_gst"
                                                value="<?php echo $row["ITEM_GST_SLAB"]; ?>" />


                                            <input type="submit" name="add_to_cart" style="margin-top:5px;"
                                                class="btn btn-success" value="Add to Cart" />

                                        </div>
                                    </form>
                                </div>

                                <?php
                                            }
                                        }else{
                                            echo "No Products found";
                                        }
                                    }
                                    ?>
                            </div>
                        </div>




                    </div>




                </div>

                <!-- start of side part  -->

                <div class="col-lg-2">
                    <div class="card  border border-primary " style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4 class="text-center p-2"> Items In Cart</h4>
                            </li>
                        </ul>
                        <table class="m-2">

                            <thead>
                                <tr class="text-success">
                                    <th>
                                        Item name
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <?php
$count=0;
                                if(isset($_SESSION['scart'])){ 
                                    
                                    
                                        $count= count(($_SESSION['scart']));
                                    foreach($_SESSION['scart']  as $key=> $value){
                                        
                                        $keys=$key+1;
                                        echo"                           
                                        <tr>                                                          
                                    <td>$value[iname] </td>                               
                                        <td>$value[iqty] $value[iunit]</td>                              
                                                                
                                        </tr>";
                                            
                                    }
                                }
                                ?>
                        </table>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item "> Total Item:<?php echo $count;?></li>
                            <?php
                    if(isset($_SESSION['scart'])){ 
                        ?>
                            <a href="sale-cart-view.php" class="btn border border-success m-2 text-Success">
                                Go To Cart<i class="fa-solid fa-cart-shopping p-1"></i>
                            </a>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <!-- End of Side Part  -->
            </div>

        </div>
        <script>
            // to submit on enter key
            document.getElementById('submit')
                .addEventListener('keyup', function (event) {
                    if (event.code === 'Enter') {
                        event.preventDefault();
                        document.querySelector('form').submit();
                    }
                });
        </script>
</body>

</html>