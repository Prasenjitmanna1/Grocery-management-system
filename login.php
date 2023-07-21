<?php
    include('include/dbcon.php');
    session_start();
    ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log-In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- css stylesheet -->
  <script src="https://kit.fontawesome.com/119e1e070c.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/style.css">
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
        <!-- <div class="col align-self-center">
          <a class="navbar-brand" href="#">Home</a>
        </div>
        <div class="col align-self-end">
          <span class="navbar-text">
            log
          </span>
        </div> -->
      </div>


  </nav>



  <div class="container  text-center p-5 ">
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


  <?php
    if (isset($_POST['login'])) 
    {
    	$uid =  mysqli_real_escape_string($conn,$_POST['uid']);
    	$pass =  mysqli_real_escape_string($conn,$_POST['upass']);
    	//$utype = $_POST['usertype'];
    	$qry="SELECT * FROM `gms_user_account` WHERE email= '$uid' and user_status='Y' ";
    	$rslt= mysqli_query($conn,$qry);
      $count= mysqli_num_rows($rslt);
    	
      
    	if ($count > 0) 
    	{
        $row=mysqli_fetch_array($rslt);
    		if (password_verify($pass, $row['PASSWORD'])) 
    		{
          header("location:dashboard.php");
          $_SESSION["id"] = $row['USER_ID'];
    			// if ($utype=='admin') 
    			// {
          //         
                   
    				
    			// }
    			// else
    			// {
    			// 	header("location:staff.php");
    			// }
    		}
    		else
    		{

          echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
          Wrong password
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    			
    		}
    	}
    	else
    	{
        echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
        User not found
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    	
    	}
    	
    	
    }
  ?>



    <div class="container login-container w-50 text-center shadow p-4 rounded-2">
      <img src="img/tl.jpg" width="100px" height="100px">
      <form action="" method="POST">

        <h5>Log-in</h5>
        <div class="form-row p-3 ">
          <!-- Loging in as :
          <select name="usertype" class="form-control mt-2 mb-2">
            <option value="admin" class="form-control ">Admin</option>
            <option value="Employee" class="form-control">Staff</option>
          </select> -->
          Email:
          <input type="text" name="uid" class="form-control rounded-2 mt-2 mb-2" required>
          Password :
          <input type="password" name="upass" class="form-control  mt-2 mb-2" required>
          <input type="submit" name="login" value="Log-In" class="btn btn-outline-success col-lg-12 mt-2">
      </form>
      <p class="text-muted">Don't have a Account
        <a class="text-decoration-none" href="user-add.php">Register here</a>
      </p>
    </div>

  </div>


</body>

</html>