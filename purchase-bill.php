<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Invoice</title>
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/119e1e070c.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="page" size="A4" id="printableArea">
        <div class="top-section">
            <div class="address">
                <div class="address-content">
                    <h2> Grocery Management System </h2>
                    <p> Jec road,Garmur, Jorhat, Assam </p>
                </div>
            </div>
            <div class="contact">
                <div class="contact-content">
                    <div class="email">Email:<span class="span"> grocery@gmail.com </span></div>
                    <div class="number">Number:<span class="span"> +91-97068-22333 </span></div>
                </div>
            </div>
        </div>
  <?php
    include('include/dbcon.php');
$invoice=$_GET['id'];
$q = "SELECT * FROM `gms_purchase_master` where INVOICE_NO='$invoice' ";
$query = mysqli_query($conn,$q);
$res = mysqli_fetch_assoc($query)
// while ( $res = mysqli_fetch_assoc($query)){
// SELECT m.*,d.* FROM gms_purchase_master as m 
//         INNER JOIN gms_purchase_details as d ON m.INVOICE_NO =d.INVOICE_NO group by m.INVOICE_NO;
  ?>

        





     <div class="billing-invoice">
        <div class="title">
            Purchase Bill
        </div>
        <div class="des">
            <p class="code">
                <?php echo $res['INVOICE_NO'];?>
               
            </p>
            <p class="issue">Issued:<span>  <?php echo $res['PURCHASE_DATE'];?></span></p>
        </div>
     </div>
            <?php
                $invoice=$_GET['id'];
            $q1 = "SELECT m.supplier_id,m.INVOICE_NO,s.* FROM gms_purchase_master as m INNER JOIN gms_supplier as s ON m.supplier_id =s.supplier_id  where INVOICE_NO='$invoice' ";
            $query1 = mysqli_query($conn,$q1);
            $supres = mysqli_fetch_assoc($query1)
           
            ?>
     <div class="billing-to">
        <div class="title"> Billed To </div>
        <div class="billed-sec">
            <div class="name">
            <?php echo ucfirst($supres['SUPPLIER_NAME']);?>
            </div>
            <p><i class="fa-solid fa-phone text-success"></i> <?php echo $supres['SUPPLIER_PHNO'];?></p>
            <p>GST:<?php echo strtoupper($supres['SUPPLIER_GSTNO']);?></p>
            <p>GST Type:<?php echo ucfirst($supres['SUPPLIER_GSTTYPE']);?></p>
        </div>
     
     <div class="billed-sec">
        <div class="sub-title">Billing Address</div>
        <div class="ship-add"><?php echo $supres['SUPPLIER_ADDRESS'];?></div>
     </div>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>Product Name</th>
               <th>HSN/SAC</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>GST</th>
                <th>GST-Amount</th>                
                <th>Amount</th>
            </tr>
            <?php
 

                $q3 = "SELECT i.item_hsn_code, i.item_gst_slab,m.* FROM gms_purchase_details as m INNER JOIN gms_item as i ON m.item_id =i.item_id where INVOICE_NO='$invoice' ";

                $query3 = mysqli_query($conn,$q3);
                $res3 = mysqli_fetch_assoc($query3);
                $qty=0;
                $gst=0;
                $total=0;

                foreach ($query3 as $key=>$ress3){
                ?>
            <tr>
                <?php
                 if($ress3['UNIT']=="Kg" or $ress3['UNIT']=="Ltr"){
                    $qty=$ress3['ITEM_QTY']/1000;
                 }else{
                    $qty=$ress3['ITEM_QTY'];
                 }
                
                
                 ?>
                <td><?php $keys=$key+1; echo $keys; ?></td>
                <td><?php echo ucfirst($ress3['ITEM_NAME']);?></td>
                <td><?php echo ucfirst($ress3['item_hsn_code']);?></td>
                <td><?php echo $ress3['ITEM_PRICE'];?> </td>
               
              
            <td><?php  echo $qty;?><?php echo $ress3['UNIT'];?></td>
                    
              
                <td><?php echo $ress3['item_gst_slab'];?>%</td>
                <td><?php echo $ress3['ITEM_PRICE']*$qty*$ress3['item_gst_slab']/100;?></td>
                <td><?php echo $qty*$ress3['ITEM_PRICE'];?> </td>
                <?php  $qty +=$qty;
                $gst+= $ress3['ITEM_PRICE']*$qty*$ress3['item_gst_slab']/100;
                $total += $qty*$ress3['ITEM_PRICE'];
                 ?>
            </tr>
            <?php } ?>
            <tr>
                <td  colspan="5"></td>
               
                <td></td>
                
                <td >
                    <b>
                        <?php echo  $gst;?>
                        </b>
                </td>
                <td><b>
                    <?php echo  $total;?></b></td>
            </tr>
        </table>
    </div>
<?php
    $q4 = "SELECT * FROM gms_purchase_master  where INVOICE_NO='$invoice' ";

$query4 = mysqli_query($conn,$q4);
$res4 = mysqli_fetch_assoc($query4);

?>





    <div class="row">
<div class="col-lg-6">
    <div class=" table">
        <table>
        <tr>
        <th>
                Type
            </th>
            <th>
                Taxable Amount
            </th>
            <th>
                Tax Amount
            </th>
        </tr>
        <tr>
            <td>SGST</td>
            
            <td><?php echo  number_format($res4['SUB_TOTAL']-$res4['GST_AMOUNT'],2)?></td>
            <td><?php echo number_format($res4['GST_AMOUNT'],2)/2; ?></td>
        </tr>
        <tr>
            <td>CGST</td>
         
            <td><?php echo  number_format($res4['SUB_TOTAL']-$res4['GST_AMOUNT'],2)?></td>
            <td><?php echo number_format($res4['GST_AMOUNT'],2)/2;?></td>
        </tr>
        </table>
    </div>
</div>
<div class="col-lg-6">
    <div class="table">
        <table>
        <tr>
            <th>
              Amounts:
            </th>
            <th>
               
            </th>
            
        </tr>
        <tr>
            <td>Sub total</td>
            <td><?php echo number_format($res4['SUB_TOTAL'],2); ?></td>
        </tr>
        <tr>
            <td>Discount</td>
            <td><?php echo number_format($res4['DISCOUNT'],2); ?></td>
        </tr>
        </table>
    </div>
</div>
</div>


<?php
function convertNumberToWordsForIndia($number){
    $words = array(
    '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
    '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
    '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
    '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
    '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
    '80' => 'eighty','90' => 'ninty');
    
    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0,0,0,0,0,0,0,0,0);        
    $received_number_array = array();
    
    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    
  		$received_number_array[$i] = substr($number,$i,1);    
  	}

    //Populate the empty array with the numbers received - most critical operation
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
        $number_array[$i] = $received_number_array[$j]; 
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for($i=0,$j=1;$i<9;$i++,$j++){
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($number_array[$j]==0 || $number_array[$i] == "1"){
                $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
                $number_array[$i] = 0;
            }
               
        }
    }

    $value = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    
            $value = $number_array[$i]*10; 
        }
        else{ 
            $value = $number_array[$i];    
        }            
        if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
        if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
        if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
        if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
        if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }            

    }
    if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
    return ucwords(strtolower(" ".$number_to_words_string)."Rupees Only.");
}


?>

<div class="container">
<div class="col-lg-7 bg-success  text-white">
Invoice Amount in Words:
    </div>
    <div class=" col-lg-7 border border-success border-top-0">

    <?php
      echo convertNumberToWordsForIndia($res4['SUB_TOTAL']);
    ?>
    </div>
</div>

    <div class="bottom-section">
        <div class="status-content">
            <!-- <h4>Payment Status</h4>
            <p class="status free"></p>
            <p>Payment Method:<span>ssl commerce</span></p> -->
            <p class="tnx"> Thank You For Shopping</p>
        </div>
    </div>
    <div class="container ">
    
        <div class="d-flex flex-row-reverse">

       
    <button type="button" id="print-button" class="btn btn-success m-2" onclick="printDiv('printableArea')">Print <i class="fa-solid fa-print"></i> </button>
    <a href="search.php">
    <button type="button" id="print-button2" class="btn border border-success text-success m-2">Create New <i class="fa-solid fa-house-chimney"></i> </button>
    </a>    
</div>    
</div>
    </div>
</body>
<script>

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</html>