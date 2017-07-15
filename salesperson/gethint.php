<?php
$q = ($_GET['q']);
include('config.php');
$sql="SELECT * FROM products WHERE item_name ='$q'";
$result = mysqli_query($dbc,$sql);
$row = mysqli_fetch_array($result);
echo $row['Whole_sale_price'];

?>