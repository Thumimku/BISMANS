<?php
/**
 * Created by PhpStorm.
 * User: Haran
 * Date: 15/07/2017
 * Time: 22:27'
 */

include_once ('config.php');
include_once ('system_session.php');
date_default_timezone_set('Asia/colombo');


                                        $nameQuery = "SELECT firstName,userId from tbllogin where position = 2";
                                        $nameQuery = $mysqli->query($nameQuery);

                                        $strName = "";
                                        $orderCount ="";

                                        while($nameObj = $nameQuery->fetch_object()){

                                            $name = $nameObj->firstName;
                                            $strName .= $name."&";
                                            $salesPersonId = $nameObj->userId;

                                            $currentDate = strtotime("today");
                                            $weekStart = strtotime("last sunday midnight",$currentDate);
                                            $orderQuery = "SELECT total from tblorder WHERE takenBy = $salesPersonId and orderId < $currentDate and orderId > $weekStart";
                                            $orderQuery = $mysqli->query($orderQuery);
                                            $numOfOrder = mysqli_num_rows($orderQuery);
                                            $orderCount.= $numOfOrder."&";




                                        }



                                        $strName = substr($strName,0,-1);
                                        $strCount = substr($orderCount,0,-1);
                                        echo $strName."#".$strCount;





