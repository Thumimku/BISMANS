<?php
/**
 * Created by PhpStorm.
 * User: Haran
 * Date: 13/07/2017
 * Time: 06:39
 */

include_once('system_session.php');
include_once('config.php');

if (isset($_GET['p'])) {
    $productName = $_GET['p'];

    $productQuery = "SELECT * from tblproductdetails WHERE name= '".$productName."'";
    $productQuery = $mysqli->query($productQuery);
    $productObj = $productQuery->fetch_object();
    $productId = $productObj->productId;
    $sku = $productObj->sku;



    echo $productId."&".$sku;
}