<?php 
include('navheader.php');

?>

<body>
    <div class="form-background ">
        <a href="dashboard.php">
    <button type="button" class="m-2 btn btn-sm btn-success"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
    </a>
        <div class="container mt-2  ">
        <?php
   
   if(isset($_POST['Submit'])){
        $c_pass =$_POST['c_pass'];
        $n_pass =$_POST['n_pass'];
        $hash = password_hash($n_pass,PASSWORD_BCRYPT);
        $id=$_SESSION["id"];

        $qry="SELECT * FROM `gms_user_account` WHERE user_id='$id'";
    	$rslt= mysqli_query($conn,$qry);
        $count= mysqli_num_rows($rslt);

        if ($count > 0) 
    	{
            $row=mysqli_fetch_array($rslt);
    		if (password_verify($c_pass, $row['PASSWORD'])) 
    		{
                $sql="UPDATE `gms_user_account` SET `PASSWORD`='$hash' WHERE `USER_ID`='$id'";

                $q=mysqli_query($conn,$sql);
                if($q>0){
                    echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
                      Password Updated Successfully.
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                
                
                }else{
                    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
                    Some Error Occur
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }


            }else{
                echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
             Wrong  Password
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }

        }else{
            echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
         Wrong  Password
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

      
    

   }


?>

            <div class="container col-lg-5 shadow p-4 rounded-2">
                <h3 class="text-center text-primary">Change password</h3>
                <form action="" method="post" onsubmit="return validation()">
                    <div class="mb-3">
                        <label  class="form-label">Current Password</label>
                        <input type="password" class="form-control" name="c_pass" required maxlength="30">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">New Password</label>
                        <input type="password" class="form-control" name="n_pass" required maxlength="30" id="pass">
                        <span id="password" class="text-danger"></span>

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control"  required maxlength="30" id="pass2">
                        <span id="password2" class="text-danger"></span>

                    </div>
                   
                   
                   

                    <input type="submit" value="Change Password " name="Submit" class="btn btn-primary">
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
        document.getElementById('password2').innerHTML = " ** Passwords and Confirm Must be same";
        return false;
      } else {
        document.getElementById('password2').innerHTML = "";
      }

    }
    </script>
   
</body>
<?php 
include('footer.php');

?>