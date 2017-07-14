<DIV class="product-item float-clear" style="clear:both;">
<div>
<DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV>
<DIV class="float-left"><select style="padding: 5px;border:#ccc 1px solid;border-radius:4px;margin: 0px 10px;" name="item_name[]" onchange="showUPrice(this)"><option value="">Select a product:</option>
<?php
include('config.php');
$sql="SELECT item_name FROM products";
$result = mysqli_query($dbc,$sql);

while ( $row=mysqli_fetch_assoc($result)) {
?>
<option value="<?php echo $row['item_name']; ?>"><?php echo $row['item_name']; ?></option>

<?php
// close while loop 
}
?>
</select></DIV>
<DIV class="float-left"><input type="text" name="item_quantity[]"onchange="calculateAmount(this.value)" /></DIV>
<DIV class="float-left"><input id="txtHint" type="text" name="item_price[]" /></DIV>
<DIV class="float-left"><input type="text" name="item_amount[]" /></DIV>
</div>
</DIV>

