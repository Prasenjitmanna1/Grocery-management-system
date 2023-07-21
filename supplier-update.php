<?php 
include('navheader.php');

?>

<body>
    <div class="form-background ">
        <a href="supplier-view.php">
        <button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>
        <div class="container mt-2  ">
        <?php
        if(isset($_GET['id'])){
        $id=$_GET["id"];
        $query="SELECT * FROM gms_supplier WHERE SUPPLIER_ID='$id'";
        
        $result= mysqli_query($conn,$query);
        
        $row = mysqli_fetch_assoc($result);
    }
   if(isset($_POST['Update'])){
    $supplier_name =ucfirst($_POST['supplier_name']);
        $supplier_address =$_POST['supplier_address'];
        $supplier_phno =$_POST['supplier_phno'];
        $supplier_phno = strtoupper($_POST['supplier_phno']);
        $supplier_gsttype =$_POST['supplier_gsttype'];
        $supplier_gstno =$_POST['supplier_gstno'];

      


$sql="  UPDATE `gms_supplier` SET `SUPPLIER_ID`='$id',`SUPPLIER_NAME`='$supplier_name',`SUPPLIER_ADDRESS`='$supplier_address',`SUPPLIER_PHNO`='$supplier_phno',`SUPPLIER_GSTNO`='$supplier_gstno',`SUPPLIER_GSTTYPE`='$supplier_gsttype' WHERE `SUPPLIER_ID`='$id'";

$q=mysqli_query($conn,$sql);
if($q>0){
    echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
      Supplier Details Updated Successfully
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";


}else{
    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
    Some Error Occur
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
   }


?>

            <div class="container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Update Supplier</h3>
                <form action="" method="post">
                    <div class="mb-3">
                        <label  class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" name="supplier_name" value="<?php echo $row['SUPPLIER_NAME']; ?>" maxlength="30" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Supplier Address</label>
                        <input type="text" class="form-control" name="supplier_address" value="<?php echo $row['SUPPLIER_ADDRESS']; ?>" maxlength="40" required>

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="supplier_phno" value="<?php echo $row['SUPPLIER_PHNO']; ?>" maxlength="10" required>

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">GST No</label>
                        <input type="text" class="form-control" name="supplier_gstno" value="<?php echo $row['SUPPLIER_GSTNO']; ?>" maxlength="15" required>

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">GST Type</label>
                        <select class="form-select" name="supplier_gsttype">
                            <option selected value="<?php echo $row['SUPPLIER_GSTTYPE']; ?>"><?php echo $row['SUPPLIER_GSTTYPE']; ?></option>
                            <option value="Regular">Regular</option>
                            <option value="Composite">Composite</option>

                        </select>

                    </div>
                 

                    <input type="submit" value="Update" name="Update" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>
   
</body>
<?php 
include('footer.php');

?>