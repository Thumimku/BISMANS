<html>
<body>
<?php
include('config.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($dbc,"delete from customer where id='$id'");
if($query1)
{
header('location:CustomerDetails.php');
}
}
?>
</body>
</html>