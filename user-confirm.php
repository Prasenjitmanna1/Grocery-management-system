<?php
    include('include/dbcon.php');
   
    include('navheader.php');
   ob_start();
    ?>


<body>
 

    <div class="form-background ">
    <div class="form-background ">
            <a href="user-list.php">
            <button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
            </a>
    <?php
     function EmpCod()
     {
         
         include('include/dbcon.php');
  $q="select CONCAT('GMS',LPAD(RIGHT(ifnull(max(emp_uniqueid),'GMS00000'),5) + 1,5,'0')) from gms_user_account";
   $rs  = mysqli_query($conn,$q);
   return mysqli_fetch_array($rs)[0];
       }
   if(isset($_POST['Submit'])){
        $user_id=$_GET['id'];
        $emp_uniqueid =EmpCod();
        $emp_shift =$_POST['emp_shift'];
        $emp_salary =$_POST['emp_salary'];
        $emp_designation =$_POST['emp_designation'];
       $USER_TYPE=$_POST['USER_TYPE'];
       
        
        $sql="UPDATE gms_user_account SET USER_ID='$user_id',emp_uniqueid='$emp_uniqueid', emp_shift='$emp_shift',emp_designation='$emp_designation', emp_salary='$emp_salary', USER_STATUS='Y', USER_TYPE='$USER_TYPE' where USER_ID='$user_id'";
        $q=mysqli_query($conn,$sql);
        if($q>0){
           
            $_SESSION['msg']= "Staff Updated Successfully.Now he can login with his ID";
            header("location:user-list.php");
            
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
                <h3 class="text-center text-primary">Employee Approve</h3>
                <form action="" method="post">
                    <!-- <div class="mb-3">
                        <label class="form-label">Employee Unique ID</label>
                        <input type="text" class="form-control" name="emp_uniqueid">

                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Employee Shift</label>
                        <select class="form-select form-control" name="emp_shift">
                            <option selected>Select Shift</option>
                            <option value="Morning">Morning</option>
                           
                            <option value="Evening">Evening</option>
                  

                        </select>
                        

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Salary</label>
                        <input type="text" class="form-control" name="emp_salary">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Designation</label>
                        <input type="text" class="form-control" name="emp_designation">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Type</label>
                        <select class="form-select form-control" name="USER_TYPE">
                            <option selected>Select Type</option>
                            <option value="admin">Admin</option>
                           
                            <option value="user">User</option>
                  

                        </select>
                        

                    </div>
                
                
                    <input type="submit" value="Accept User" name="Submit" class="btn btn-primary">
             
                <a href="user-reject.php?id=<?php  $user_id=$_GET['id']; echo  $user_id; ?>" class="btn btn-danger">Reject User</a>
                </form>
            </div>

        </div>
    </div>

</body>
<?php 
include('footer.php');

?>

