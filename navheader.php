<?php
    include('include/dbcon.php');
    session_start();
    ob_start();

      if(!isset( $_SESSION["id"]) ){

$_SESSION['msg']="Please lOgin to continue...";
header('location:login.php');
      }



    ?>
<style>
  .noti {
    color: white;
    display: inline-block;

    position: relative;

    padding: 2px 5px;

  }

  .button-badge {
    background-color: #fa3e3e;
    border-radius: 2px;
    color: white;

    padding: 1px 3px;
    font-size: 10px;

    position: absolute;
    /* Position the badge within the relatively positioned button */
    top: 0;
    right: 0;
  }
</style>


<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
    type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css"
    integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>

  <div id="mySidenav" class="sidenav d-flex flex-column flex-shrink-0 text-white bg-dark">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

      <span class="fs-6 fw-bold">Grocery Management</span>
    </a>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!-- <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a> -->

    <hr>

    <?php
    $id=$_SESSION["id"];
$query="SELECT * FROM `gms_user_account` WHERE User_id='$id' and user_type='admin'";
$result=mysqli_query($conn,$query);
$counts=mysqli_num_rows($result);
if($counts>0) {


    ?>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
      <li>
        <a href="dashboard.php" class="nav-link text-whit active" aria-current="page">

          <i class="fas fa-chart-line"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="supplier-view.php" class="nav-link ">

          <i class="fas fa-store"></i> Supplier
        </a>
      </li>
      <li>
        <a href="customer-details.php" class="nav-link ">

        <i class="fas fa-user-circle"></i> Customer
        </a>
      </li>

      <li>
        <a href="user-view.php" class="nav-link ">

          <i class="fas fa-user-tie"></i> Employee
        </a>
      </li>
      <li>
        <a href="item-category.php" class="nav-link ">

          <i class="fas fa-box"></i> Product Category
        </a>
      </li>

      <li>
        <a href="items.php" class="nav-link ">

          <i class="fas fa-gifts"></i> Products
        </a>
      </li>
      <li>
        <a href="purchase-details.php" class="nav-link ">

          <i class="fas fa-receipt"></i> Purchase Bill
        </a>
      </li>
      <li>
        <a href="search.php" class="nav-link ">

          <i class="fas fa-shopping-bag"></i> Create Purchase
        </a>
      </li>
      <li>
        <a href="sale-search.php" class="nav-link ">

          <i class="fas fa-shopping-cart"></i> Create Sale
        </a>
      </li>
      </li>
      <a href="sale-details.php" class="nav-link ">

        <i class="fas fa-receipt"></i> Sale Bill
      </a>
      </li>
      <li>
        <a href="barcode-generate.php" class="nav-link ">

          <i class="fas fa-barcode"></i> Generate barcode
        </a>
      </li>
      <?php
            $query= "SELECT * FROM `gms_user_account` where user_status='N'  ORDER BY USER_ID  ";
            $rslt = mysqli_query($conn,$query);
            $Unconfirm_employeee=mysqli_num_rows($rslt);
            ?>
      <li>
        <a href="user-list.php" class="nav-link ">

          <i class="fas fa-user-check"></i> Approval
          <?php
          if($Unconfirm_employeee>0){
            ?>
          <span class="counter counter-lg text-center">
            <?php
            
            echo"$Unconfirm_employeee";
            }
            ?>
          </span>
        </a>


      </li>
    

    </ul>
    <?php
          }
          ?>

    <!-- Employee -->
    <?php
    $id=$_SESSION["id"];
$query="SELECT * FROM `gms_user_account` WHERE User_id='$id' and user_type='User'";
$result=mysqli_query($conn,$query);
$counts=mysqli_num_rows($result);
if($counts>0){
    ?>

    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
      <li>
        <a href="dashboard.php" class="nav-link text-whit active" aria-current="page">

          <i class="fas fa-chart-line"></i> Dashboard
        </a>
      </li>
      </li>
      <li>
        <a href="customer-details.php" class="nav-link ">

        <i class="fas fa-user-circle"></i> Customer
        </a>
      </li>
      <li>
        <a href="item-category.php" class="nav-link ">

          <i class="fas fa-box"></i> Product Category
        </a>
      </li>

      <li>
        <a href="items.php" class="nav-link ">

          <i class="fas fa-gifts"></i> Products
        </a>
      </li>
      <li>
        <a href="purchase-details.php" class="nav-link ">

          <i class="fas fa-receipt"></i> Purchase Bill
        </a>
      </li>
      <li>
        <a href="search.php" class="nav-link ">

          <i class="fas fa-shopping-bag"></i> Create Purchase
        </a>
      </li>
      <li>
        <a href="sale-search.php" class="nav-link ">

          <i class="fas fa-shopping-cart"></i> Create Sale
        </a>
      </li>
      </li>
      <a href="sale-details.php" class="nav-link ">

        <i class="fas fa-receipt"></i> Sale Bill
      </a>
      </li>
      <li>
        <a href="barcode-generate.php" class="nav-link ">

          <i class="fas fa-barcode"></i> Generate barcode
        </a>
      </li>
      <li>
        <a href="supplier-view.php" class="nav-link ">

          <i class="fas fa-store"></i> Supplier
        </a>
      </li>

    </ul>



    <?php
}
?>

    <hr>


    <?php
 if(isset($_SESSION['id'])){
  $id= $_SESSION["id"];

      $qry="SELECT * FROM `gms_user_account` WHERE user_id= '$id'";
      
      $rslt= mysqli_query($conn,$qry);
      
      $row=mysqli_fetch_array($rslt);

      ?>

    <span class=" text-white">

    </span>
    <?php 
          }
                ?>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
        data-bs-toggle="dropdown" aria-expanded="false">
        <!-- <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> -->
        <strong> <?php 
      echo $row['emp_name'];
      ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">


        <li><a class="dropdown-item" href="user-details.php?id=<?php echo $id;?>">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>

  <!-- end of side nav -->

  <!-- Start of top navbar -->
  <nav class="navbar top-navbar navbar-dark ">
    <!-- Navbar content -->
    <div class="container-fluid">
      <div class="row ">
        <div class="col align-self-start">
          <span class="navbar-text ham-menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

          <a class="navbar-brand ms-3 " href="dashboard.php">
            <img class="rounded-2" src="img/logo.jpg" alt="" width="50" height="40">
          </a>
          <a class="navbar-brand logo-name" href="dashboard.php">Grocery Management System</a>
        </div>
      
      </div>
      <?php
          $querys="Select * from low_stock";
          $query2 = mysqli_query($conn,$querys);
          $nums=mysqli_num_rows($query2);

         
          ?>

      <div class="d-flex flex-row-reverse " style="
    margin-right: 10px;">
        <div class="btn-group dropstart">
          <i class="fa-solid fa-bell text-white fs-3 noti" data-bs-toggle="dropdown" data-bs-toggle="tooltip"
            data-bs-placement="left" title="Notification" aria-expanded="false"></i>
          <?php $query= "SELECT * FROM `gms_user_account` where user_status='N'  ORDER BY USER_ID  ";
            $rslt = mysqli_query($conn,$query);
            $Unconfirm_employeee=mysqli_num_rows($rslt); if($nums>0 || $Unconfirm_employeee){
  ?>
          <span class="counter button-badge">
            <?php $a=0;
     $a=$nums+$Unconfirm_employeee;
      echo $a ; 
    ?>
          </span>

          <?php
 
  }?>
          <ul class="dropdown-menu">
            <?php
                  if($nums>0){
                    ?>
            <li><a class="dropdown-item" href="low-stock.php">Low Stock <span
                  class="counter counter-lg text-center"><?php echo $nums;?></span></a></li>
            <?php
                }
                    ?>
            <li><a class="dropdown-item" href="user-list.php">
                Employee Confirm
                <?php
          if($Unconfirm_employeee>0){
            ?>
                <span class="counter counter-lg">
                  <?php
            
            echo"$Unconfirm_employeee";
            }?>
              </a></li>
            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Separated link</a></li> -->
          </ul>



        </div>
      
      </div>

    </div>

  </nav>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/119e1e070c.js" crossorigin="anonymous"></script>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "210px";
      document.getElementById("maindiv").style.marginLeft = "210px";


    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("maindiv").style.marginLeft = "0";
    }
  </script>