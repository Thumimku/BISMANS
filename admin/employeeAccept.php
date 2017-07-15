<?php
/**
 * Created by PhpStorm.
 * User: Haran
 * Date: 16/07/2017
 * Time: 02:57
 */
include_once ('system_session.php');

include_once ('config.php');

if (isset($_POST['employeeId'])){

    $employeeId = $_POST['employeeId'];
    if ($_POST['selection']==1) {
        $acceptQuery = "UPDATE tbllogin SET status = '1' WHERE userId = $employeeId";
        $results = $mysqli->query($acceptQuery);
        if($results){

            print('<script> window.location="approveEmployee.php?success=ok"; </script> ');
        }else{
            print('<script> window.location="approveEmployee.php?error=failed"; </script> ');
        }
    }elseif($_POST['selection']==2) {
        $acceptQuery = "DELETE FROM `tbllogin` WHERE `tbllogin`.`userId` = $employeeId";
        $results = $mysqli->query($acceptQuery);
        if ($results) {

            print('<script> window.location="approveEmployee.php?removed=ok"; </script> ');
        } else {
            print('<script> window.location="approveEmployee.php?error=failed"; </script> ');
        }
    }
}