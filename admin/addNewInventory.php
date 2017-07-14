<?php
/**
 * Created by PhpStorm.
 * User: Haran
 * Date: 14/07/2017
 * Time: 00:20
 */

include_once('config.php');
if (isset($_POST['productName']) && isset($_POST['quantity'])){


    $productId = $_POST['productId'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];
    $batchNo = $_POST['batchNo'];
    $expiryDate = $_POST['expiryDate'];





    $queryCount = count($productId);
    for ($i = 0; $i < $queryCount;$i++){
        $time = time();
        $batchId = $time.$i;
        $proId = $productId[$i];
        $qty = $quantity[$i];

        $batchInsert = "INSERT INTO `tblbatch` (`batchId`,`productId`,`sku`,`batchNo`,`quantity`,`expiryDate`) VALUES ('$batchId', '$productId[$i]', '$sku[$i]','$batchNo[$i]','$quantity[$i]','$expiryDate[$i]')";
        $update = "UPDATE tblinventory SET quantity = quantity + $qty WHERE productId = $proId";

        $results = $mysqli->query($update);
        $batchResults = $mysqli->query($batchInsert);

    }

        if ($results && $batchResults) {
            print('<script> window.location="addInventory.php?sucess=ok"; </script> ');
        } else {
            if ($mysqli->errno == "1062") {
                print('<script> window.location="addInventory.php?dup=fail"; </script> ');
            } else {
                print('<script> window.location="addInventory.php?error=fail"; </script> ');
                $error = $mysqli->errno;
            }
        }






}

