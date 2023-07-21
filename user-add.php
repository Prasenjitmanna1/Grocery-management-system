<?php
    include('include/dbcon.php');
    session_start();
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- css stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
  <script src="https://kit.fontawesome.com/119e1e070c.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>
<style>
    body {
        background-image: radial-gradient(circle farthest-corner at 50.7% 54%, rgba(204, 254, 152, 1) 0%, rgba(229, 253, 190, 1) 92.4%);
    }

    .login-container {
        background-color: #fff;
    }
</style>

<body>
 
    <nav class="navbar top-navbar navbar-dark ">
        <!-- Navbar content -->
        <div class="container-fluid">
            <div class="row ">
                <div class="col align-self-start">

                    <a class="navbar-brand ms-3 " href="#">
                        <img class="rounded-2" src="img/logo.jpg" alt="" width="50" height="40">
                    </a>
                    <a class="navbar-brand logo-name" href="#">Grocery Management System</a>
                </div>

            </div>

        </div>

    </nav>
    <div class="form-background ">
        
    <?php
   
   if(isset($_POST['Submit'])){
        $EMAIL =$_POST['EMAIL'];
        $PASSWORD =$_POST['PASSWORD'];
       
        $hash = password_hash($PASSWORD,PASSWORD_BCRYPT);
        $emp_name =$_POST['emp_name'];        
        $emp_phno =$_POST['emp_phno'];
        $emp_address =$_POST['emp_address'];
        $emp_joindate =$_POST['emp_joindate'];
        $emp_dateofbirth =$_POST['emp_dateofbirth'];
        // $emp_image ='abc';
        $emp_gender=$_POST['emp_gender'];
        $profilepic = $_FILES['emp_image'];
    
        $filename = $profilepic['name'];
        $filepath = $profilepic['tmp_name'];
        $fileerror = $profilepic['error'];
        $destfile ='Images/'.$filename;
        move_uploaded_file($filepath, $destfile);
        $query="select * from gms_user_account where EMAIL='$EMAIL' or  emp_phno= '$emp_phno'";
        $result=mysqli_query($conn,$query);
        $res1=mysqli_num_rows($result);
if($res1>0){
    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
    Email id: $EMAIL or Mobile No:$emp_phno Already Exist.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";

}else{



$sql="INSERT INTO `gms_user_account`( `EMAIL`,`PASSWORD`,  `emp_name`, `emp_phno`, `emp_address`, `emp_joindate`, `emp_dateofbirth`,   `emp_image`,  `emp_gender`, `USER_STATUS`) VALUES 
('$EMAIL','$hash','$emp_name','$emp_phno','$emp_address','$emp_joindate','$emp_dateofbirth','$destfile','$emp_gender','N')";

$q=mysqli_query($conn,$sql);
if($q>0){
    echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
      Registration Successful.Please wait for the admin to activate your account
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";


}else{
    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
    Some Errors Occured
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
   }

}

?>


        <div class="container mt-2  ">



            <div class="container login-container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Employee Registration</h3>
                <form action="" method="post" enctype="multipart/form-data" onsubmit="return validation()">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="EMAIL" required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Password</label>
                        <input type="password" class="form-control" name="PASSWORD" id="pass" required>
                        <div id="emailHelp" class="form-text text-muted">Use combination of alphabet,numbers,symbol.
                        </div>
                        <span id="password" class="text-danger"></span>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="pass2" required>
                        <div id="emailHelp" class="form-text text-muted">Use combination of alphabet,numbers,symbol.
                        </div>
                        <span id="password2" class="text-danger"></span>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Name</label>
                        <input type="text" class="form-control" name="emp_name" required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Emp Phone No</label>
                        <input type="text" class="form-control" name="emp_phno" required maxlength="10">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Emp Address</label>
                        <input type="text" class="form-control" name="emp_address" required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Joining Date</label>
                        <input type="date" class="form-control" name="emp_joindate" max="2022-07-14">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" name="emp_dateofbirth">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Passport Photo</label>
                        <input type="file" class="form-control" name="emp_image" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select form-control" name="emp_gender" required>
                            <option  value=""selected>Select Gender</option>
                            <option value="Male">Male</option>
                           
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>

                        </select>

                    </div>
<div class=" d-flex flex-row-reverse">
<input type="submit" value="Submit" name="Submit" class="btn btn-primary ">
</div>
                    
                    <p class="text-muted">Already have a Account
        <a class="text-decoration-none" href="login.php">login Here</a>
      </p>
                </form>
            </div>

        </div>
    </div>
    <script type="text/javascript">
    function validation() {
        var pass = document.getElementById('pass').value;
        var pass2 = document.getElementById('pass2').value;
        const pass_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&_+=*.]{8,}$/;
       
        if (!pass.match(pass_pattern)) {
        document.getElementById('password').innerHTML =
          "Require a Uppercase letter,lowercase letter, digit and a special characters like !@#$%^&_+=*.  and length should be greater than 8 digits ";
        return false;
      }
      if ((pass.length <= 8) || (pass.length > 20)) {
        document.getElementById('password').innerHTML = " ** Passwords lenght must be between  8 and 20";
        return false;
      } else {
        document.getElementById('password').innerHTML = "";
      }

      if ((pass2!=pass)) {
        document.getElementById('password2').innerHTML = " ** Passwords and Confirm Password  Must be same";
        return false;
      } else {
        document.getElementById('password2').innerHTML = "";
      }

    }
    </script>
</body>



</html>