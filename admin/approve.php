<?php
/**
 * Created by PhpStorm.
 * User: Haran
 * Date: 14/07/2017
 * Time: 04:04
 */
include_once('system_session.php');
include_once('config.php');

$userId = $_SESSION['userId'];
date_default_timezone_set('Asia/colombo');




if (isset($_GET['orderApproval'])){

    $customerId = $_GET['customerId'];
    $orderId = $_GET['orderApproval'];
    $itemQuery = "SELECT * from tblorderitems WHERE orderId = $orderId";
    $itemQuery = $mysqli->query($itemQuery);
    //print('<script> window.location="approveOrderInvoice.php?stock=empty"; </script> ');
    while($itemObj = $itemQuery->fetch_object()){

        $itemQuantity  = $itemObj->quantity;
        $sku = $itemObj->sku;
        $inventoryQuery = "SELECT quantity from tblinventory WHERE sku = '".$sku."'";
        $inventoryQuery = $mysqli->query($inventoryQuery);
        $inventoryObj = $inventoryQuery->fetch_object();
        $availQuantity = $inventoryObj->quantity;
        if ($availQuantity < $itemQuantity){
            print('<script> window.location="approveOrderInvoice.php?stock=empty&orderId=<?php echo $orderId;?>"; </script> ');
        }

    }
    $itemQuery = "SELECT * from tblorderitems WHERE orderId = $orderId";
    $itemQuery = $mysqli->query($itemQuery);
    while($itemObj = $itemQuery->fetch_object()){
        $itemQuantity  = $itemObj->quantity;
        $sku = $itemObj->sku;
        $batchQuery = "SELECT quantity from tblbatch WHERE sku = '".$sku."' ORDER by expiryDate ASC";
        $batchQuery = $mysqli->query($batchQuery);
        while($batchObj=$batchQuery->fetch_object()){
            $batchQuantity = $batchObj->quantity;
            if ($batchQuantity >= $itemQuantity){
                $batchQuantity -= $itemQuantity;
                $update = "UPDATE tblbatch SET quantity = $batchQuantity WHERE sku = '".$sku."'";
                $mysqli->query($update);
                break;
            }else{
                $batchQuantity = 0;
                $itemQuantity -= $batchQuantity;
                $update = "UPDATE tblbatch SET quantity = $batchQuantity WHERE sku = '".$sku."'";
                $mysqli->query($update);
            }

        }
        $currentTime = date('Y-m-d H:i:s');
        $approveQuery = "UPDATE tblorder SET approvedBy = '$userId',approvedTime = '$currentTime' , status = '1' WHERE orderId = $orderId";
        $results = $mysqli->query($approveQuery);
        if($results){
            print('<script> window.location="approveOrderInvoice.php?success=ok&orderId=<?php echo $orderId;?>&customerId=<?php echo $customerId; ?>"; </script> ');
        }else{
            print('<script> window.location="approveOrderInvoice.php?error=failed"; </script> ');
        }


    }





}


