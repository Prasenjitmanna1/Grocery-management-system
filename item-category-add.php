<?php
    include('include/dbcon.php');
   
    include('navheader.php');
   ob_start();
    ?>


<body>
 

    <div class="form-background ">
        
    <?php

   if(isset($_POST['Submit'])){
      
      
        $CATEGORY_NAME =$_POST['CATEGORY_NAME'];
        $CATEGORY_DESC =$_POST['CATEGORY_DESC'];
   
        $sql2="select * from `gms_item_category` where CATEGORY_NAME ='$CATEGORY_NAME' ";
        $q2=mysqli_query($conn,$sql2);
        $num=mysqli_num_rows($q2);
        if($num>0){
            echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
            Item already Added.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }else{
            $sql="INSERT INTO `gms_item_category`( `CATEGORY_NAME`, `CATEGORY_DESC`) VALUES ('$CATEGORY_NAME','$CATEGORY_DESC')";
            $q=mysqli_query($conn,$sql);
           
    
            if($q>0){
               
                $_SESSION['msg']= "Item category added Successfully";
                header("location:item-category.php");
                
                }
    else{
        echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
        Some Errors Occured
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }

        }

   }


?>


        <div class="container mt-2  ">
        <a href="item-category.php">
    <button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>


            <div class="container login-container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Item Category</h3>
                <form action="" method="post">
                  
             
                    <div class="mb-3">
                        <label class="form-label">Category name</label>
                        <input type="text" class="form-control" name="CATEGORY_NAME" required maxlength="30">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Description</label>
                        <input type="text" class="form-control" name="CATEGORY_DESC"  required maxlength="40">

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

