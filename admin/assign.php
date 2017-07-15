<?php
include_once ('config.php');
include_once ('system_session.php');
date_default_timezone_set('Asia/colombo');


if (isset($_POST['assignedTo'])){

    $assignedTo = $_POST['assignedTo'];
    $orderId = $_POST['orderId'];
    $assignedTime = date('Y-m-d H:i:s');

    $update = "UPDATE tblorder SET assignedTo = '$assignedTo' ,assignedTime = '$assignedTime',status = '4' WHERE orderId = $orderId";
    $results = $mysqli->query($update);

    if($results){

        print('<script> window.location="assignOrderDetails.php?success=ok"; </script> ');
    }else{
        print('<script> window.location="assignOrderDetails.php?error=failed"; </script> ');
    }
}