<?php
    include('include/dbcon.php');
   
    include('navheader.php');
   ob_start();
    ?>


<body>
 

    <div class="form-background ">
    <a href="user-view.php">
    <button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>
    
        <div class="container mt-2  "> 
    <?php
  $user_id=$_GET['id'];
  $query1="select * from gms_user_account where USER_ID='$user_id'";
  $result=mysqli_query($conn,$query1);
  $rows=mysqli_fetch_assoc($result);

   if(isset($_POST['update'])){
    $user_id=$_GET['id'];
    $EMAIL =$_POST['EMAIL'];
    $emp_name =$_POST['emp_name'];
    $emp_phno =$_POST['emp_phno'];

    $emp_address =$_POST['emp_address'];
    $emp_joindate =$_POST['emp_joindate'];
    $emp_dateofbirth =$_POST['emp_dateofbirth'];
    $emp_shift=$_POST['emp_shift'];
    $emp_salary =$_POST['emp_salary'];
    $emp_designation =$_POST['emp_designation'];
    $emp_gender =$_POST['emp_gender'];
   
    $USER_TYPE=$_POST['USER_TYPE'];
    
       
    //    UPDATE `gms_user_account` SET `USER_ID`='$user_id',`EMAIL`='$EMAIL',`emp_name`='emp_name',`emp_phno`='emp_phno',
    //    `emp_address`='emp_address',`emp_joindate`='emp_joindate',`emp_dateofbirth`='emp_dateofbirth',`emp_shift`='emp_shift',
    //    `emp_salary`='emp_salary',`emp_designation`='emp_designation',
    //    `emp_gender`='emp_gender',`USER_STATUS`='USER_STATUS',`USER_TYPE`='USER_TYPE' WHERE `USER_ID`='$user_id'

        $updatesql=" UPDATE gms_user_account SET USER_ID='$user_id',EMAIL='$EMAIL',emp_name='$emp_name',emp_phno='$emp_phno',
        emp_address='$emp_address',emp_joindate='$emp_joindate',emp_dateofbirth='$emp_dateofbirth',emp_shift='$emp_shift',
        emp_salary='$emp_salary',emp_designation='$emp_designation',emp_gender='$emp_gender',USER_TYPE='$USER_TYPE' 
        WHERE USER_ID='$user_id'";
        print_r($updatesql);
        $qu=mysqli_query($conn,$updatesql);
        if($qu>0){
           
            $_SESSION['msg']= "Staff Updated Successfully.";
            header("location:user-view.php");
            
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
                <h3 class="text-center text-primary">Employee Update</h3>
                <form action="" method="post">
                <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $rows['EMAIL']; ?>" name="EMAIL">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Name</label>
                        <input type="text" class="form-control" value="<?php echo $rows['emp_name']; ?>"  name="emp_name">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Emp Phone No</label>
                        <input type="text" class="form-control" value="<?php echo $rows['emp_phno']; ?>"name="emp_phno">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Emp Address</label>
                        <input type="text" class="form-control" value="<?php echo $rows['emp_address']; ?>" name="emp_address">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Joining Date</label>
                        <input type="date" class="form-control" value="<?php echo $rows['emp_joindate']; ?>" name="emp_joindate">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control"  value="<?php echo $rows['emp_dateofbirth'];?>" name="emp_dateofbirth">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select form-control" name="emp_gender">
                            <option selected value="<?php echo $rows['emp_gender']; ?>"><?php echo $rows['emp_gender']; ?></option>
                            <option value="Male">Male</option>
                           
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>

                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Shift</label>
                        <select class="form-select form-control" name="emp_shift">
                            <option selected value="<?php echo $rows['emp_shift']; ?>"><?php echo $rows['emp_shift']; ?></option>
                            <option value="Morning">Morning</option>
                           
                            <option value="Evening">Evening</option>
                  

                        </select>
                        

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Salary</label>
                        <input type="text" class="form-control" value="<?php echo $rows['emp_salary']; ?>" name="emp_salary">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Designation</label>
                        <input type="text" class="form-control" value="<?php echo $rows['emp_designation']; ?>" name="emp_designation">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Type</label>
                        <select class="form-select form-control" name="USER_TYPE">
                            <option selected value="<?php echo $rows['USER_TYPE']; ?>"><?php echo $rows['USER_TYPE']; ?></option>
                            <option value="admin">Admin</option>
                           
                            <option value="user">User</option>
                  

                        </select>
                        

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

