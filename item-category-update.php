<?php
    include('include/dbcon.php');
   
    include('navheader.php');
   ob_start();
    ?>


<body>
 

    <div class="form-background ">
    <a href="item-category.php">
    <button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>
        <div class="container mt-2  "> 
    <?php
   $id=$_GET['id'];
  $query1="select * from gms_item_category where CATEGORY_ID='$id'";
  $result=mysqli_query($conn,$query1);
  $rows=mysqli_fetch_assoc($result);

   if(isset($_POST['update'])){
    $id=$_GET['id'];
    $CATEGORY_NAME =$_POST['CATEGORY_NAME'];
    $CATEGORY_DESC =$_POST['CATEGORY_DESC'];
    
   
        $updatesql=" UPDATE `gms_item_category` SET `CATEGORY_NAME`='$CATEGORY_NAME',`CATEGORY_DESC`='$CATEGORY_DESC'WHERE CATEGORY_ID='$id'";
  
        $qu=mysqli_query($conn,$updatesql);
        if($qu>0){
           
            $_SESSION['msg']= "Item category  Updated Successfully.";
            header("location:item-category.php");
            
            }
else{
    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
    Some Errors Occured
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
   }



?>


        <div class="container mt-2  ">



            <div class="container login-container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Item category Update</h3>
                <form action="" method="post">
                <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" value="<?php echo $rows['CATEGORY_NAME']; ?>" name="CATEGORY_NAME"  required maxlength="30">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Description</label>
                        <input type="text" class="form-control" value="<?php echo $rows['CATEGORY_DESC']; ?>"  name="CATEGORY_DESC"  required maxlength="40">

                    </div>
                  
                
                
                    <input type="submit" value="Update" name="update" class="btn btn-primary col-12">
                </form>
            </div>

        </div>
    </div>

</body>
<?php 
include('footer.php');

?>

