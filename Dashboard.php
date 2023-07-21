<?php include('navheader.php');

$q = "SELECT * FROM gms_supplier ";
$query = mysqli_query($conn,$q);
$supplier_count = mysqli_num_rows($query);
                               


$q2="SELECT * FROM `gms_user_account`";
$query2 = mysqli_query($conn,$q2);
$user_count = mysqli_num_rows($query2);

?>
<style>
  .card-body .icon {
    color: rgba(0, 0, 0, .15);
    z-index: 0;
  }

  .custom-card {
    border-radius: 10px;
    background: #2193b0;  
  background: -webkit-linear-gradient(to right, #6dd5ed, #667db6);  
  background: linear-gradient(to right, #6dd5ed, #667db6);
  
  }

  .custom-card:hover {
    background-color: #21D4FD;
    background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);

  }

  .custom-card2,
  .custom-card3 {
    border-radius: 15px;
    box-shadow: 7px 7px 13px -6px rgba(0, 0, 0, 0.94);
  }

  .card-body .icon i {
    padding-left: 30px;

    font-size: 40px;
    margin-top: 20px;
  }


  .dash-text {
    margin-top: 20px;
    font-family: 'Roboto', sans-serif;
    font-size: 30px;
    font-weight: bold;
  }

  .dash-text2 {

    font-size: 12px;
  }

  .dash-a {
    text-decoration: none;
  }
</style>
<!-- 
main-div2 doesn't get slide -->
<div class="main-div2" id="maindiv2">

  <div class="container mt-5 col-lg-9 ">
    <div class="row">
      <div class="col">

        <div class="card custom-card2  " style="width: 15rem;">
          <a href="supplier-view.php" class="dash-a">
            <div class="card-body ">
              <div class="row">
                <?php $q9="SELECT * FROM gms_supplier ";
                  $result9=mysqli_query($conn,$q9);
                  $res9=mysqli_num_rows($result9);
                  ?>
                <div class="inner col-sm-7">
                  <h3 class="dash-text  text-white  ">
                    <?php echo $res9;?>

                  </h3>
                  <p class="card-text dash-text2 text-white">Total Suppliers</p>
                </div>
                <div class="icon col-sm-4 text-white">
                  <i class="fas fa-store"></i>
                  <!-- <i class="fa-solid fa-truck"></i> -->

                </div>
              </div>
            </div>
            <div class="card-text-region text-center">

            </div>
        </div>
        </a>
      </div>
      <!-- end of first div -->
      <div class="col">

        <div class="card custom-card2 " style="width: 15rem;">
          <a href="items.php" class="dash-a">
            <div class="card-body ">
              <div class="row">
                <div class="inner col-sm-7">
                  <?php $q4="SELECT * FROM gms_item ";
                  $result4=mysqli_query($conn,$q4);
                  $res4=mysqli_num_rows($result4);
                  ?>
                  <h3 class="dash-text  text-primary  ">
                    <?php echo $res4;?>
                  </h3>
                  <p class="card-text dash-text2 text-secondary ">Total Items</p>
                </div>
                <div class="icon col-sm-4 text-secondary">
                  <i class="fa fa-boxes-stacked"> </i>
                </div>
              </div>
            </div>
            <div class="card-text-region text-center">

            </div>
        </div>
        </a>
      </div>
      <div class="col">

        <div class="card custom-card2 " style="width: 15rem;">
          <a href="report-monthlysale.php" class="dash-a">
            <div class="card-body ">
              <div class="row">
                <div class="inner col-sm-8">
                  <?php $q3="SELECT * FROM `monthlysale` WHERE month=MONTH(SYSDATE())";
                  $result3=mysqli_query($conn,$q3);
                  $res3=mysqli_fetch_array($result3);
                  ?>
                  <h3 class="dash-text  text-primary  ">
                    <?php echo number_format($res3['monthlysale'],2); ?>
                  </h3>
                  <?php $q1="SELECT MONTHNAME(sysdate()) as month";
                  $result1=mysqli_query($conn,$q1);
                  $res1=mysqli_fetch_array($result1);
                  ?>
                  <p class="card-text dash-text2 text-secondary "> Sale (<?php echo$res1['month']; ?>)</p>
                </div>
                <div class="icon col-sm-4 text-secondary mr-1">
                  <i class="fas fa-cash-register"></i>
                </div>
              </div>
            </div>
            <div class="card-text-region text-center">

            </div>
        </div>
        </a>
      </div>
      <div class="col">

        <div class="card custom-card2 " style="width: 15rem;">
          <a href="report-montlypurchase.php" class="dash-a">
            <div class="card-body ">
              <div class="row">
                <div class="inner col-sm-8">
                  <?php $q5="SELECT * FROM `monthlypurchase` WHERE month=MONTH(SYSDATE())";
                  $result5=mysqli_query($conn,$q5);
                  $res5=mysqli_fetch_array($result5);
                  ?>
                  <h3 class="dash-text  text-primary  ">
                    <?php echo number_format($res5['total'],2); ?>
                  </h3>
                  <p class="card-text dash-text2 text-secondary ">Purchase (<?php echo$res1['month']; ?>)</p>
                </div>
                <div class="icon col-sm-4 text-secondary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
              </div>
            </div>
            <div class="card-text-region text-center">

            </div>
        </div>
        </a>
      </div>
      <!-- End of tiles  -->
      <div class="container mt-5 col-lg-9  ">
        <div class="row">
          <div class="col">
            <div class="card custom-card3  bg-white" style="width: 25rem;">

              <div class="card-body ">
                <table class="table">
                  <thead>
                    <h4 class="text-center p-1  text-primary  ">
                      Recent Sales
                    </h4>
                    <tr>
                      <!-- <th scope="col">#</th> -->
                      <th scope="col">Name</th>
                      <th scope="col">Amount</th>
                      <!-- <th scope="col">Handle</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query2="Select c.customer_name, s.total_amount from gms_sales_master s inner join gms_customer c on
                     c.customer_id= s.cust_id order by INVOICE_NO desc limit 8";
                     $result6=mysqli_query($conn,$query2);
                     while ( $res6=mysqli_fetch_assoc($result6)){
                  
                    

                 
                     ?>
                    <tr>

                      <td><?php echo $res6['customer_name']; ?></td>
                      <td><?php echo number_format($res6['total_amount'],2); ?></td>

                    </tr>
                    <?php
                  }?>

                  </tbody>
                </table>
                <a class="text-decoration-none" href="report-recentsale.php">
                  <div class="d-flex flex-row-reverse m-0  text-primary">
                    <p>See more..</p>
                  </div>
                </a>

              </div>
            </div>
            <!-- end  -->


          </div>


          <div class="col">
            <div class="card custom-card3  bg-white" style="width: 25rem;">

              <div class="card-body ">
                <table class="table">
                  <thead>
                    <h4 class="text-center p-1  text-primary  ">
                      Sale By category
                    </h4>
                    <tr>

                      <th scope="col">Category</th>
                      <th scope="col">Sales Amount</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                 $query3="Select * from salesbycat limit 6";
                     $result7=mysqli_query($conn,$query3);
                     while ( $res7=mysqli_fetch_assoc($result7)){
                  
                    

                 
                     ?>
                    <tr>

                      <td><?php echo $res7['category_name']; ?></td>
                      <td><?php echo $res7['total_amount']; ?></td>

                    </tr>
                    <?php
                  }
                  ?>

                  </tbody>
                </table>
                <a class="text-decoration-none" href="report-salebycat.php">
                  <div class="d-flex flex-row-reverse m-0  text-primary">
                    <p>See more..</p>
                  </div>
                </a>

              </div>

            </div>
            <!-- end  -->
          </div>
        </div>
      </div>
    </div>





  </div>

</div>


</div>

<?php include('footer.php');
?>