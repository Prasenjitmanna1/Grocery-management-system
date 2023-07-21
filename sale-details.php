<?php 
include('navheader.php');

?>

<body>
    <div class="main-div" id="maindiv">
        <div class="container-fluid mt-1">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 table-heading">Sales Details</h3>
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
                            href="sale-search.php"><i class="fa fa-plus"></i> Create New bill</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table tabe-hover table-bordered" id="list">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                               
                                <th>Invoice No</th>
                                <th>Sales Date</th>
                                <th>Customer Name</th>
                               
                                <th>View Bill</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                         
                       
                         $i = 1;
                             $q = " select s.INVOICE_NO ,s.INVOICE_DATE,c.customer_name from gms_sales_master s inner join gms_customer c on s.cust_id= c.customer_id ORDER BY invoice_date desc";
                          
                              $query = mysqli_query($conn,$q);
                       while ( $res = mysqli_fetch_assoc($query)){
                                ?>

                            <tr>
                               
                                <td class="text-center"><?php echo $i++ ?></b></td>
                                
                                <td><?php  echo $res['INVOICE_NO']; ?> </td>
                                <td><?php  echo $res['INVOICE_DATE']; ?> </td>
                                <td><?php  echo ucfirst($res['customer_name']); ?> </td>
                              
                                

                          

                                
                                <td >
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-info btn-flat view_parcel" data-id="">
                                            <i class="fas fa-eye"></i>
                                        </button> -->
                                   <a href="sale-bill.php?id=<?php echo $res['INVOICE_NO']; ?>" class="btn btn-success btn-flat ">
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