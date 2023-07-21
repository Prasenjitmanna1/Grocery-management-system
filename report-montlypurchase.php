
<?php 
include('navheader.php');

?>

<body>
    <div class="main-div" id="maindiv">
        <div class="container-fluid mt-1">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 table-heading">Purchase  report</h3>
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
                            href="search.php"><i class="fa fa-plus"></i> Add New Purchase</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table tabe-hover table-bordered" id="list">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                               
                                <th>Year</th>
                                <th>Month</th>
                                <th>Total Purchase</th>

                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                         
                        
                         $i = 1;
                             $q = "SELECT * FROM `monthlypurchase`";
                              $query = mysqli_query($conn,$q);
                       while ( $res = mysqli_fetch_assoc($query)){
                                ?>

                            <tr>
                               
                                <td class="text-center"><?php echo $i++ ?></b></td>
                                
                               
                                <td><?php  echo $res['year']; ?> </td>
                                <td><?php 
                                $monthNum  =  $res['month'];
                                $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
                                
                                echo  $monthName; ?> </td>

                            

                               
                               
                                <td><?php  echo $res['total']; ?> </td>
                       
                               
                                
                              
                                

                          

                                
                                
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