<?php
/**
 * Created by PhpStorm.
 * User: Haran
 * Date: 13/07/2017
 * Time: 15:34
 */

include_once ('config.php');
include_once ('system_session.php');

// Array with names

$productArray = Array();
$productQuery = "SELECT productId, name from tblproductdetails";
$productQuery = $mysqli->query($productQuery);

$count = 0;
while($productObj= $productQuery->fetch_object()){
    $productName = $productObj->name;
    $productArray[$count] = $productName;
    $count += 1;
}
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($productArray as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
                break;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;