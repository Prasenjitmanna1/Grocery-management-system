<?php 
include('navheader.php');

?>

<body>
    <div class="main-div" id="maindiv">
        <div class="container-fluid mt-1">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 table-heading">Supplier List</h3>
                </div>
            </div>
            <hr class=" hr-line opacity-100 ">
        </div>
        


        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <a class="btn btn-block btn-sm btn-default btn-flat border-primary "
                            href="supplier-add.php"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table tabe-hover table-bordered" id="list">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Supplier Name</th>
                                <th>Supplier Address</th>
                                <th>Contact Details</th>
                                <th>GST Number</th>
                                <th>GST type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                         
                       
                         $i = 1;
                             $q = "SELECT * FROM gms_supplier  ORDER BY SUPPLIER_ID  ";
                              $query = mysqli_query($conn,$q);
                       while ( $res = mysqli_fetch_assoc($query)){
                                ?>

                            <tr>
                               
                                <td class="text-center"><?php echo $i++ ?></b></td>
                                <td><?php  echo $res['SUPPLIER_NAME']; ?>  </td>
                                <td><?php  echo $res['SUPPLIER_ADDRESS']; ?> </td>
                                <td><?php  echo $res['SUPPLIER_PHNO']; ?> </td>
                                <td><?php  echo strtoupper($res['SUPPLIER_GSTNO']); ?> </td>
                                <td><?php  echo $res['SUPPLIER_GSTTYPE']; ?> </td>
                                <td><?php  echo $res['status']; ?> </td>

                          

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        
                                        <a href="supplier-update.php?id=<?php  echo $res['SUPPLIER_ID']; ?>" class="btn btn-primary btn-flat ">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <?php
                                        if  ($res['status']=="active"){
                                            ?>
                                        <a href="supplier-delete.php?id=<?php echo $res['SUPPLIER_ID']; ?>" class="btn btn-danger btn-flat ">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <?php
                                        }else{
                                            ?>
                                            <a href="supplier-active.php?id=<?php echo $res['SUPPLIER_ID']; ?>" class="btn btn-success btn-flat ">
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

    <?php 
include('footer.php');

?>