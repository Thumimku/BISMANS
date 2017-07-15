<?php
/**
 * Created by PhpStorm.
 * User: Haran
 * Date: 16/07/2017
 * Time: 01:00
 */


include_once ('config.php');
include_once ('system_session.php');
date_default_timezone_set('Asia/colombo');
                                   $productQuery = "SELECT productId,sku,name from tblproductdetails";
                                   $productQuery = $mysqli->query($productQuery);
                                   $strSku = "";
                                   $strCount = "";
                                   while($productObj = $productQuery->fetch_object()) {
                                       $sku = $productObj->sku;

                                       $currentDate = strtotime("today");
                                       $weekStart = strtotime("last sunday midnight", $currentDate);
                                       $quantityQuery = "SELECT quantity from tblorderitems WHERE sku = '" . $sku . "' and orderId < $currentDate and orderId > $weekStart ";
                                       $quantityQuery = $mysqli->query($quantityQuery);
                                       $quantity = 0;
                                       while ($quantityObj = $quantityQuery->fetch_object()) {
                                           $quantity += $quantityObj->quantity;

                                       }

                                       if ($quantity > 0) {

                                           $productName = $productObj->name;
                                           $strSku .= $sku."&";
                                           $strCount .= $quantity."&";
                                       }
                                   }

                                   $strSku = substr($strSku,0,-1);
                                   $strCount = substr($strCount,0,-1);
                                   echo $strSku."#".$strCount;





