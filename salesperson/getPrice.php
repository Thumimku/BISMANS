<?php
$q = ($_GET['q']);
include('config.php');
$sql="SELECT * FROM tblproductdetails WHERE name ='$q'";
$result = mysqli_query($dbc,$sql);
$row = mysqli_fetch_array($result);
echo $row['productId']."&".$row['mrPrice'];

?>