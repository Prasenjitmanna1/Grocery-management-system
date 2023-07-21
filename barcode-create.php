<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<style>

</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		 include('include/dbcon.php');
   
		$item_id = $_POST['item_id'];
        $query="select * from gms_item where item_id=$item_id ";

        $result=mysqli_query($conn,$query);
         $rows=mysqli_fetch_assoc($result);
		// $product_id = $_POST['product_id'];
		// $rate = $_POST['rate'];

		for($i=1;$i<=$_POST['qty'];$i++){
            ?>
			<svg class="barcode"
            jsbarcode-format="CODE39"
            jsbarcode-value="<?php echo $rows['ITEM_CODE']; ?>"
            jsbarcode-textmargin="0"
            
            jsbarcode-fontoptions="bold">
            </svg>&nbsp&nbsp&nbsp&nbsp
            <?php
		}

		?>
	</div>
    <script>
    JsBarcode(".barcode").init();
</script>

</body>
</html>
