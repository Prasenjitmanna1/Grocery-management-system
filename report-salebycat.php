<?php 
include('navheader.php');

?>

<body>
    <div class="main-div" id="maindiv">
        <div class="container-fluid mt-1">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 table-heading">Recent Sale report</h3>
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
                            href="sale-search.php"><i class="fa fa-plus"></i> Add New Sale</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table tabe-hover table-bordered" id="list">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                               
                               
                                <th>Category </th>
                                <th>Sale Amount</th>

                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                         
                        
                         $i = 1;
                             $q = "Select * from salesbycat";
                              $query = mysqli_query($conn,$q);
                       while ( $res = mysqli_fetch_assoc($query)){
                                ?>

                            <tr>
                               
                                <td class="text-center"><?php echo $i++ ?></b></td>
                                
                                <td><?php echo $res['category_name']; ?></td>
        <td><?php echo $res['total_amount']; ?></td>

                            

                               
                               
                                
                       
                               
                                
                              
                                

                          

                                
                                
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