<?php
    include_once('config.php');
    include_once('system_session.php');
    $userName = $_SESSION['userName'];
    $position = $_SESSION['position'];


    date_default_timezone_set('Asia/colombo');

?>

    <meta charset="UTF-8">
    <title>WESTART VENTURES...ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--<script src="https://www.w3schools.com/lib/w3.js"></script>-->
    <script src="js/w3.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/w3.js"></script>


<div class="header-main">

    <div class="logo-w3-agile">
        <h1><a href="index.php">WestArt</a></h1>
    </div>
    <div class="w3layouts-left">

        <!--search-box-->
        <!--<div class="w3-search-box"> -->

            <h1><a href="index.php">VENTURES</a></h1>

            <!--<form action="#" method="post">
               <input type="text" placeholder="Search..." required="">
                <input type="submit" value="">
            </form>-->
        <!--</div><!--//end-search-box-->
    <!--<div class="clearfix"> </div> -->
    </div>
    <div class="w3layouts-right">

        <?php
        $approvalQuery = "SELECT * from tblorder WHERE status = '0'";
        $approvalQuery = $mysqli->query($approvalQuery);
        $approvalCount = mysqli_num_rows($approvalQuery);
        $deliveryQuery = "SELECT * from tblorder WHERE status = '2'";
        $deliveryQuery = $mysqli->query($deliveryQuery);
        $deliveryCount = mysqli_num_rows($deliveryQuery);

        if ($position == 0){
            $strPosition = "Administrator";
        }elseif($position == 1){
            $strPosition = "Junior Admin";
        }elseif($position == 2){
            $strPosition = "Sales Person";
        }elseif($position == 3){
            $strPosition = "Delivery Position";
        }


        ?>
        <div class="profile_details_left"><!--notifications of menu start -->
            <ul class="nofitications-dropdown">

                <?php
                $productQuery = "SELECT productId,threshold from tblproductdetails";
                $productQuery = $mysqli->query($productQuery);
                $emptyProducts = Array();
                $expiryProducts = Array();
                while($productObj= $productQuery->fetch_object()){
                    $productId = $productObj->productId;
                    $threshold = $productObj->threshold;
                    $inventoryQuery = "SELECT quantity,sku from tblinventory WHERE  productId = $productId";
                    $inventoryQuery = $mysqli->query($inventoryQuery);
                    $inventoryObj = $inventoryQuery->fetch_object();
                    $quantity = $inventoryObj->quantity;
                    if ($quantity < $threshold){
                        $emptyProducts[] = $inventoryObj->sku;

                    }

                    $batchQuery = "SELECT expiryDate,sku,batchNo from tblbatch where productId = $productId order by expiryDate asc LIMIT 1";
                    $batchQuery = $mysqli->query($batchQuery);
                    if($batchObj = $batchQuery->fetch_object()){
                        $expiryDate = $batchObj->expiryDate;
                        $currentDate = date("Y-m-d");
                        $diff = date_diff(date_create($currentDate), date_create($expiryDate));

                        if ($diff->days < 365) {
                            $notific = "product " . $batchObj->sku . " belongs to batch " . $batchObj->batchNo . "`s expiry fell in one year due";
                            $expiryProducts[] = $notific;
                        }
                    }

                }
                $emptyNotificationCount = count($emptyProducts);
                $expiryNotificationCount = Count($expiryProducts);
                $day = date("l");

                if ($day == 'Saturday'){
                    $notificationCount = $emptyNotificationCount + $expiryNotificationCount + 1;
                }else{
                    $notificationCount = $emptyNotificationCount + $expiryNotificationCount;
                }
                ?>
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i><span class="badge"><?php echo $notificationCount;?></span></a><!--This span is for number of notification-->
                    <ul class="dropdown-menu">

                        <li>
                            <div class="notification_header">
                                <h3>You have <?php echo $notificationCount; ?> new messages</h3>
                            </div>
                        </li>
                        <!--add new customer-->
                        <?php
                        for ($i = 0;$i < $emptyNotificationCount;$i++){


                        ?>
                            <div>
                        <li class="odd"><a href="orderDetail.php"><a href = "inventorydetails.php">
                                <div class="user_img"><img src="images/notEmpty.jpg" alt=""></div>
                                <div class="notification_desc">
                                    <p>product <?php echo $emptyProducts[$i];?> has gone beyond its threshold stock level </p>

                                </div>
                                <div class="clearfix"></div>
                            </a></li>
                            </div>
                        <?php } ?>

                        <?php
                        for ($i = 0;$i < $expiryNotificationCount;$i++){


                            ?>
                            <div>
                                <li class="odd"><a href="orderDetail.php">
                                        <div class="user_img"><img src="images/expiry.jpg" alt=""></div>
                                        <div class="notification_desc">
                                            <p><?php echo $expiryProducts[$i];?></p>

                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                            </div>
                        <?php } ?>

                        <?php
                        $day = date("l");
                        if ($day == 'Saturday'){
                            ?>
                            <div>
                                <li class="odd"><a href = "#" >
                                        <div class="user_img"><img src="images/weekRep.png" alt=""></div>
                                        <div class="notification_desc">
                                            <p> Time to get your weekly report</p>



                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                            </div>
                        <?php } ?>





                            <div class="notification_bottom">
                                <a href="#">See all messages</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cart-arrow-down"></i><span class="badge blue"><?php echo $approvalCount; ?></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="notification_header">
                                <h3>You have <?php

                                    echo $approvalCount ?> notification </h3>
                            </div>
                        </li>
                        <?php
                            while($approvalObj = $approvalQuery->fetch_object()){
                                $takenBy = $approvalObj->takenBy;
                                $salesPersonQuery = "SELECT firstName from tbllogin WHERE userId = $takenBy";
                                $salesPersonQuery = $mysqli->query($salesPersonQuery);
                                $salesPersonObj = $salesPersonQuery->fetch_object();
                                $salesPersonName = $salesPersonObj->firstName;

                                $currentTime = date('Y-m-d H:i:s');
                                $takenTime = $approvalObj->takenTime;
                                $ago = findTime($takenTime,$currentTime);

                        ?>
                                <li class="odd"><a href="approveOrderInvoice.php?orderId=<?php echo $approvalObj->orderId?>&customerId=<?php echo $approvalObj->customerId; ?>">
                                        <div class="user_img"><img src="images/in6.jpg" alt=""></div>
                                        <div class="notification_desc">
                                            <p>Order waiting for approval <br> added by <?php echo $salesPersonName ?></p>
                                            <p><span><?php echo $ago; ?>ago</span></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a></li>
                        <?php } ?>

                        <!-- Modal -->





                            <div class="notification_bottom">
                                <a href="approveOrderDetails.php">See all notifications</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-truck"></i><span class="badge blue1"><?php echo $deliveryCount; ?></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="notification_header">
                                <h3>You have <?php echo $deliveryCount; ?> delivery notifications</h3>
                            </div>
                        </li>



                        <?php
                        while($deliveryObj = $deliveryQuery->fetch_object()){
                            $deliveredBy = $deliveryObj->deliveredBy;
                            $deliveryPersonQuery = "SELECT firstName from tbllogin WHERE userId = $deliveredBy";
                            $deliveryPersonQuery = $mysqli->query($deliveryPersonQuery);
                            $deliveryPersonObj = $deliveryPersonQuery->fetch_object();
                            $deliveryPersonName = $deliveryPersonObj->firstName;

                            $customerId = $deliveryObj->customerId;
                            $customerQuery = "SELECT customerName from tblcustomerdetails WHERE customerId = $customerId";
                            $customerQuery = $mysqli->query($customerQuery);
                            $customerObj = $customerQuery->fetch_object();
                            $customerName = $customerObj->customerName;

                            $currentsTime = date('Y-m-d H:i:s');
                            $deliveredTime = $deliveryObj->deliveredTime;
                            $ago = findTime($deliveredTime,$currentsTime);

                            ?>
                            <div>
                            <li class="odd"><a href = "#" >
                                    <div class="user_img"><img src="images/in3.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Order delivered to <?php echo $customerName; ?> <br> added by <?php echo $deliveryPersonName ?></p>
                                        <p><span><?php echo $ago; ?>ago</span></p>


                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            </div>
                        <?php } ?>

                        <!-- Modal -->




                        <li>
                            <div class="notification_bottom">
                                <a href="#">End of notifications</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <div class="clearfix"> </div>
            </ul>
            <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->

        <div class="clearfix"> </div>
    </div>
    <div class="profile_details w3l">
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <div class="profile_img">
                        <span class="prfil-img"><img src="images/in4.jpg" alt=""> </span>
                        <div class="user-name">
                            <p><?php echo $userName; ?></p>
                            <span><?php echo $strPosition ?> </span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up"></i>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul class="dropdown-menu drp-mnu">

                    <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                    <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <?php
    function findTime($startTime,$endTime){
        $elapsed = strtotime($endTime)-strtotime($startTime);
        if ($elapsed < 3600){
            $ago = round($elapsed/60)." minutes ";

        }elseif($elapsed<86400){
            $ago = round($elapsed/3600)." hours ";
        }else{
            $ago = round($elapsed/86400)." days ";

        }
        return $ago;
    }

    ?>


    <div class="clearfix"> </div>
</div>


