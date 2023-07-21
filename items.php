<?php 
include('navheader.php');

?>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<body>
    <div class="main-div" id="maindiv">
        <div class="container-fluid mt-1">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 table-heading">Items</h3>
                </div>
            </div>
            <hr class=" hr-line opacity-100 ">
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


        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <a class="btn btn-block btn-sm btn-default btn-flat border-primary "
                            href="items-add.php"><i class="fa fa-plus"></i> Add New Item</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table tabe-hover table-bordered" id="list">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                               
                                <th>Item code</th>
                                <th>Item name</th>
                                <th>Item Category</th>

                                <th>Item Stock Quantity</th>
                                <!-- <th>Unit</th> -->
                                <th>Item Rack No</th>
                                <th>Status</th>

                                
                                
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                         
                        
                         $i = 1;
                             $q = "SELECT i.*,c.* FROM gms_item i inner join gms_item_category c
                              on i.ITEM_CATEGORY=c.CATEGORY_ID ORDER BY i.ITEM_NAME";
                              $query = mysqli_query($conn,$q);
                       while ( $res = mysqli_fetch_assoc($query)){
                                ?>

                            <tr>
                               
                                <td class="text-center"><?php echo $i++ ?></b></td>
                                
                                <td>
                                <svg class="barcode"
                                    jsbarcode-format="CODE39"
                                    jsbarcode-value="<?php echo $res['ITEM_CODE']; ?>"
                                    jsbarcode-textmargin="0"
                                    jsbarcode-width="1"
                                    jsbarcode-fontoptions="bold">
                                    </svg>
                                     <!-- <img src="barcode.php?text=&codetype=code39&size=40&print=true"
                                                alt="testing" />  -->
                                            </td>
                                <td><?php  echo $res['ITEM_NAME']; ?> </td>
                                <td><?php  echo $res['CATEGORY_NAME']; ?> </td>

                                <?php
                                        if  ($res['ITEM_STOCK_QUANTITY']!=0){
                                           
                                            ?>
                                <td><?php echo $res['ITEM_STOCK_QUANTITY']; echo"&nbsp";echo strtoupper($res['ITEM_UNIT']); ?> </td>
                                <?php }
                                
                                else  if ($res['ITEM_UNIT']=='Kg'){
                                        $weight= $res['ITEM_STOCK_Weight']/1000;
                                       // $ogwt = $res['ITEM_STOCK_Weight'];
                                        // $kg = strpos($weight, ".") ;     
                                        // $mygram=$ogwt-$kg*1000;
                                        // $kg_arr = explode('.',$weight);
                                        // $gpart= strpos($weight, ".") ;
                                        

                                        // if(strlen($g)==2){
                                        //     $g=$kg_arr[1];
                                        //     $gram=$g*10;
                                        // }else if($gpart==0){
                                        //     $gram=0;
                                        // }
                                        
                                        
                                        // else{
                                        //     $gram=$g;
                                        // }
                                        // if($gpart!=0){
                                          
                                        //     $mygram= $ogwt;
                                        // } else{
                                        //     $mygram=0;
                                        // }
                                       
                                ?>
                                         


                                <td><?php echo $weight; echo" Kg";?>
                                    <?php 
                                // $wt=$res['ITEM_STOCK_Weight']; 
                                // $netwt=$wt/1000;
                                // echo $kg; echo $mygram;
                                 ?> </td>
                                <?php
                                } else  if ($res['ITEM_UNIT']=='Ltr'){
                                    $weight= $res['ITEM_STOCK_Weight']/1000;
                                    // $ogwt = $res['ITEM_STOCK_Weight'];
                                    
                                    // // $Ltr = strpos($weight, ".") ; 
                                    // $ltr_arr = explode('.',$weight); 
                                    // $ml=$ltr_arr[1];
                                    //   if(strlen($g)==2){
                                    //         $fml=$ml*10;
                                    //     }else{
                                    //         $fml=$ml;
                                    //     }
                                   // $mlpart= strpos($weight, ".") ;     
                                    // if($mlpart!=0){
                                      
                                    //     $ml=$ogwt-$ltr_arr[0];
                                    // } else{
                                    //     $ml=0;
                                    // }
                                     
                                     //$input = "0.8";
                                    

                                    // echo $ltr; 
                                    // echo $ml; 
                                    
                                    
                                                                    
                                    ?>

                                <td><?php echo  $weight; echo"&nbsp"; echo" Ltr";   ?>
                                <?php
                                }else{
                            ?>
                            <td><?php  echo "Undefined Unit"; ?> </td>
                                   <?php
                                }
                               
                                ?>
                               
                                <td><?php  echo $res['ITEM_DISPLAY_NO']; ?> </td>
                                <td><?php  echo $res['REMARKS']; ?> </td>
                               
                                
                              
                                

                          

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-info btn-flat view_parcel" data-id="">
                                            <i class="fas fa-eye"></i>
                                        </button> -->
                                        <a href="item-details.php?id=<?php echo $res['ITEM_ID']; ?>" class="btn btn-warning btn-flat ">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                   <a href="item-update.php?id=<?php echo $res['ITEM_ID']; ?>" class="btn btn-primary btn-flat ">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        
                                        <?php
                                        if  ($res['REMARKS']=="available"){
                                            ?>
                                        <a href="item-status-deactive.php?id=<?php echo $res['ITEM_ID']; ?>" class="btn btn-danger btn-flat ">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <?php
                                        }else{
                                            ?>
                                            <a href="item-status-active.php?id=<?php echo $res['ITEM_ID']; ?>" class="btn btn-success btn-flat ">
                                            <i class="fas fa-circle-check"></i>
                                        </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <?php 
          }
             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>








    <style>
        table td {
            vertical-align: middle !important;
        }
    </style>
    <script>
    JsBarcode(".barcode").init();
</script>

    <?php 
include('footer.php');

?>