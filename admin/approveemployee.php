<?php
include_once('config.php');
include_once('system_session.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Tabels :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
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
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <script src="js/w3.js"></script>
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <!-- tables -->
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
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Approve Employee</li>
            </ol>


            <div class="agile-grids">
                <!-- tables -->

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2> Approval details </h2>
                        <?php
                        if(isset($_GET['success']))
                        {
                            echo "<h3 style='text-align: center;'><font color=\"red\"> Approved!.</font></h3>";
                        }
                        if(isset($_GET['removed']))
                        {
                            echo "<h3 style='text-align: center;'><font color=\"red\"> Rejected!.</font></h3>";
                        }
                        else if(isset($_GET['error']))
                        {
                            echo "<h3 style='text-align: center;'><font color=\"red\"> Failed, Could not Approve!</font></h3>";

                        }
                        else if(isset($_GET['dup']))
                        {
                            echo "<h3 style='text-align: center;'> <font color=\"red\"> Duplicate Shop Registration, Please Check & Re-enter it.</font></h3>";
                        }?>
                        <table id="table">
                            <thead>
                            <tr>
                                <th>Employee Id</th>
                                <th>First Name</th>
                                <th>Contact No</th>
                                <th>Position</th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $employeeQuery = "SELECT * from tbllogin WHERE status =0";
                            $employeeQuery = $mysqli->query($employeeQuery);
                            while ($employeeObj = $employeeQuery->fetch_object()) {
                                $status = $employeeObj->status;
                                $position = $employeeObj->position;

                                if($position==0) {
                                    $strPosition = "Admin";
                                }elseif($position==1){
                                    $strPosition = "Junior Admin";

                                }elseif($position==2){
                                    $strPosition = "Sales Person";

                                }elseif($position == 3){
                                    $strPosition = "Delivery Person";
                                }
                                ?>
                                <tr>
                                    <td id="employee_name"><?php echo $employeeObj->userId;?></td>
                                    <td id="employee_masterarea"><?php echo $employeeObj->firstName;?></td>
                                    <td id="employee_contactnumber"><?php echo $employeeObj->contactNo;?></td>
                                    <td id="employee_supplier"><?php echo $strPosition;?></td>
                                    <td><div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <a href = "approveEmployeeDetails.php?employeeId=<?php echo $employeeObj->userId;?>"  <button class="btn-primary btn" id="addnewcustomer_accept	">View details</button> </a>


                                            </div>
                                        </div></td>

                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>





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