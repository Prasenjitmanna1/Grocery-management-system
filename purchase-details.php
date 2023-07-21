<?php 
include('navheader.php');

?>

<body>
    <div class="main-div" id="maindiv">
        <div class="container-fluid mt-1">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 table-heading">Purchase Details</h3>
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
                            href="search.php"><i class="fa fa-plus"></i> Create New Bill</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table tabe-hover table-bordered" id="list">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                               
                                <th>Invoice No</th>
                                <th>Purchase Date</th>
                               
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                         
                       
                         $i = 1;
                             $q = "SELECT * FROM `gms_purchase_master`  ORDER BY purchase_date desc";
                              $query = mysqli_query($conn,$q);
                       while ( $res = mysqli_fetch_assoc($query)){
                                ?>

                            <tr>
                               
                                <td class="text-center"><?php echo $i++ ?></b></td>
                                
                                <td><?php  echo $res['INVOICE_NO']; ?> </td>
                                <td><?php  echo $res['PURCHASE_DATE']; ?> </td>
                              
                                

                          

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-info btn-flat view_parcel" data-id="">
                                            <i class="fas fa-eye"></i>
                                        </button> -->
                                   <a href="purchase-bill.php?id=<?php echo $res['INVOICE_NO']; ?>" class="btn btn-primary btn-flat ">
                                   <i class="fa fa-receipt"></i>
                                        </a>
                                        
                                        
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

    <?php 
include('footer.php');

?>