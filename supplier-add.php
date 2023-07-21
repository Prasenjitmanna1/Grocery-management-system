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
   
   if(isset($_POST['Submit'])){
        $supplier_name =ucfirst($_POST['supplier_name']);
        $supplier_address =$_POST['supplier_address'];
        $supplier_phno = strtoupper($_POST['supplier_phno']);
        $supplier_gstno =$_POST['supplier_gstno'];
        $supplier_gsttype =$_POST['supplier_gsttype'];
        //$created_by =$_POST['created_by'];

$sql="INSERT INTO `gms_supplier`( `SUPPLIER_NAME`, `SUPPLIER_ADDRESS`, `SUPPLIER_PHNO`, `SUPPLIER_GSTNO`, `SUPPLIER_GSTTYPE`, `status`) VALUES
('$supplier_name',' $supplier_address','$supplier_phno','$supplier_gstno','$supplier_gsttype',' active')";

$q=mysqli_query($conn,$sql);
if($q>0){
    echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
      Supplier Details Enterd Successfully
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";


}else{
    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
    Dome Error Occur
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
   }


?>

            <div class="container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Supplier Information</h3>
                <form action="" method="post">
                    <div class="mb-3">
                        <label  class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" name="supplier_name" required maxlength="30">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Supplier Address</label>
                        <input type="text" class="form-control" name="supplier_address" required maxlength="40">

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="supplier_phno"  required maxlength="10">

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">GST No</label>
                        <input type="text" class="form-control" name="supplier_gstno" required maxlength="15">

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">GST Type</label>
                        <select class="form-select" name="supplier_gsttype" required>
                            <option selected>Select GST Type</option>
                            <option value="Regular">Regular</option>
                            <option value="Composite">Composite</option>

                        </select>

                    </div>
                   

                    <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>
   
</body>
<?php 
include('footer.php');

?>