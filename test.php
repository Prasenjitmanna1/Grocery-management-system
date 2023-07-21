<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<div class="container">
	<h1>jQuery live Try</h1>
	<form>
    <select onchange="yesnoCheck(this);">
    <option value="">Valitse automerkkisi</option>
    <option value="lada">Lada</option>
    <option value="mosse">Mosse</option>
    <option value="volga">Volga</option>
    <option value="vartburg">Vartburg</option>
    <option value="other">Muu</option>
</select>

<div id="ifYes" style="display: none;">
    <label for="car">1st</label> <input type="text" id="car" name="car" /><br />
</div>
<div id="ifYes2" style="display:block;">
    <label for="car">2nd</label> <input type="text" id="car" name="car" /><br />
</div>
</tr>
	</form>
</div>
<svg id="barcode"></svg>
<svg class="barcode"
  jsbarcode-format="upc"
  jsbarcode-value="123456789012"
  jsbarcode-textmargin="0"
  jsbarcode-fontoptions="bold">
</svg>

<script>
    JsBarcode(".barcode").init();

JsBarcode("#barcode", "1234", {
  format: "pharmacode",
  lineColor: "#0aa",
  width: 4,
  height: 40,
  displayValue: false
});
on yesnoCheck(that) {
    if (that.value == "other") {
  
        document.getElementById("ifYes").style.display = "block";
        document.getElementById("ifYes2").style.display = "none";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
