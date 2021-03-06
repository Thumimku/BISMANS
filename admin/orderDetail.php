<?php
    include_once('config.php');
    include_once('system_session.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Order details</title>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <script src="js/w3.js"></script>
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <!-- tables -->
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
    <link rel="stylesheet" type="text/css" href="css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="css/basictable.css" />
    <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();

            $('#table-breakpoint').basictable({
                breakpoint: 768
            });

            $('#table-swap-axis').basictable({
                swapAxis: true
            });

            $('#table-force-off').basictable({
                forceResponsive: false
            });

            $('#table-no-resize').basictable({
                noResize: true
            });

            $('#table-two-axis').basictable();

            $('#table-max-height').basictable({
                tableWrapper: true
            });
        });
    </script>
    <!-- //tables -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <?php
            include_once("notifi.php");
            include_once("slidebar.php");
            ?>

            <!--heder end here-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Order Details</li>
            </ol>
            <div class="agile-grids">
                <!-- tables -->

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Order Details</h2>
                        <table id="table">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Taken By </th>
                                <th>Payment method </td>
                                <th>Order Status</th>


                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $orderQuery = "SELECT * from tblorder";
                            $orderQuery = $mysqli->query($orderQuery);


                            while ($orderObj = $orderQuery->fetch_object()) {
                                $customerId= $orderObj->customerId;
                                $takenBy = $orderObj->takenBy;
                                $paymentMethod = $orderObj->paymentMethod;
                                $status  = $orderObj->status;
                                $customerQuery = "SELECT customerName from tblcustomerdetails WHERE customerId = $customerId";
                                $customerQuery = $mysqli->query($customerQuery);
                                $customerObj = $customerQuery->fetch_object();
                                $customerName = $customerObj->customerName;

                                $salesPersonQuery = "SELECT firstName from tbllogin WHERE userId = $takenBy";
                                $salesPersonQuery = $mysqli->query($salesPersonQuery);
                                $salesPersonObj = $salesPersonQuery->fetch_object();
                                $salesPersonName = $salesPersonObj->firstName;


                                if (!isset($_GET['redirect'])){
                                    $link = "ordermodal.php?orderId=".$orderObj->orderId."&customerId=".$customerId;
                                }else{
                                    $link = '#';
                                }



                                if ($paymentMethod == 0){
                                    $paymentMethod = 'Cash';
                                }elseif($paymentMethod == 1){
                                    $paymentMethod ='Cart';
                                }elseif($paymentMethod== 2){
                                    $paymentMethod = 'Cheque';
                                }

                                if ($status == 0){
                                    $status = 'Registered';
                                }elseif($status == 1){
                                    $status = 'Approved';
                                }elseif($status==2){
                                    $status = 'Delivered';
                                }elseif($status == 3){
                                    $status = 'Paid';
                                }

                                if ($status != 'Registered'){


                                ?>
                                <tr>
                                    <td><?php echo $orderObj->orderId;?></td>
                                    <td><?php echo $customerName;?></td>
                                    <td><?php echo $salesPersonName;?></td>
                                    <td><?php echo $paymentMethod;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                              <a href = "<?php echo $link ?>"  <button class="btn-primary btn" id="addnewcustomer_accept	">View invoice</button> </a>


                                            </div>
                                        </div></td>
                                </tr>
                                <?php
                            } }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <script>
                    var pword=document.getElementById("signup_password").value;

                </script>
               


                <!-- //tables -->
            </div>
            <!-- script-for sticky-nav -->
            <script>
                $(document).ready(function() {
                    var navoffeset=$(".header-main").offset().top;
                    $(window).scroll(function(){
                        var scrollpos=$(window).scrollTop();
                        if(scrollpos >=navoffeset){
                            $(".header-main").addClass("fixed");
                        }else{
                            $(".header-main").removeClass("fixed");
                        }
                    });

                });
            </script>
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block">

            </div>
            <!--inner block end here-->
            <!--copy rights start here-->
            <div class="copyrights">
                <p>© 2017 WestArt Ventures . All Rights Reserved | Design by  MatLogic </p>
            </div>
            <!--COPY rights end here-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <div w3-include-html="slidebar.html"></div>
    <script>
        w3.includeHTML();
    </script>

    <div class="clearfix"></div>
</div>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->

</body>
</html>