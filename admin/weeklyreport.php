<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Charts :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
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
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->


    <!--extra-->
    <link rel="stylesheet" type="text/css" href="css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="css/basictable.css" />

</head> 
<body onload="getChartData()">
   <div class="page-container">
   <!--/content-inner-->


<div class="left-content">
	   <div class="mother-grid-inner">
           <?php
           include_once("notifi.php");
           include_once("slidebar.php");
           ?>
<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Weekly Report</li>
            </ol>
           <div class="col-md-6 w3l-char">
		<div class="w3-agile-chat">
                            <div class="charts">


                                    <div class="charts-grids widget">
                                        <h4 class="title">Sales rep</h4>
                                        <canvas id="pie1"> </canvas>
                                    </div>


                                <div class="clearfix"> </div>

                                <script type = "text/javascript">

                                    var salesPersonName;


                                    function getChartData()
                                    {
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function () {
                                            if (this.readyState == 4 && this.status == 200) {
                                                var results = this.responseText;

                                                var sResults = results.split("#");
                                                var strName =  sResults[0].split("&");
                                                var strCount = sResults[1].split("&");




                                                var barChartData = {
                                                    labels : strName,
                                                    datasets : [

                                                        {
                                                            fillColor : "rgb(135, 66, 165)",
                                                            strokeColor : "rgba(79, 82, 186, 0.9)",
                                                            highlightFill: "#1b93e1",
                                                            highlightStroke: "#1b93e1",
                                                            data : strCount
                                                        }
                                                    ]

                                                };


                                                new Chart(document.getElementById("pie1").getContext("2d")).Bar(barChartData);


                                            }
                                        };
                                        xmlhttp.open("GET", "getSalesPersonName.php?p=haran", true);
                                        xmlhttp.send();


                                        getChartData2();


                                    }




                                </script>





                            </div>

                        </div>
                       </div>
                       <div class="col-md-6 w3l-char">
                           <div class="mother-grid-inner">

                               <div class="agile-grids">


                                   <div class="agile-tables">
                                       <div class="w3l-table-info">
                                           <h2>Weekly Sales Rep Earnings</h2>


                                           <table id="datatable">
                                               <thead>
                                               <tr>
                                                   <th>Employee Name</th>
                                                   <th>No. Orders</th>


                                                   <th>Amount</th>




                                               </tr>
                                               </thead>
                                               <tbody>
                                               <?php
                                               $nameQuery = "SELECT firstName,userId from tbllogin where position = 2";
                                               $nameQuery = $mysqli->query($nameQuery);
                                               $nameCount = 0;
                                               $orderCount = 0;
                                               $totalCount = 0;
                                               $totalArray = Array();
                                               $nameArray = Array();
                                               $orderArray = Array();

                                               while($nameObj = $nameQuery->fetch_object()){

                                                   $nameArray[$nameCount] = $nameObj->firstName;
                                                   $nameCount += 1;
                                                   $salesPersonId = $nameObj->userId;

                                                   $currentDate = strtotime("today");
                                                   $weekStart = strtotime("last sunday midnight",$currentDate);
                                                   $orderQuery = "SELECT total from tblorder WHERE takenBy = $salesPersonId and orderId < $currentDate and orderId > $weekStart";

                                                   $orderQuery = $mysqli->query($orderQuery);
                                                   $numOfOrder = mysqli_num_rows($orderQuery);
                                                   $orderArray[$orderCount] = $numOfOrder;
                                                   $orderCount += 1;

                                                   if ($numOfOrder == 0){
                                                       $totalArray[$totalCount]=0;

                                                   }else{
                                                       $total = 0;
                                                       while($orderObj = $orderQuery->fetch_object()){
                                                           $total += $orderObj->total;
                                                       }
                                                       $totalArray[$totalCount] = $total;
                                                   }
                                                   $totalCount += 1;
                                               }
                                               $finalTotal = 0;
                                               $totalArrLen = count($totalArray);
                                               for($i = 0 ; $i < $totalArrLen; $i++){
                                                   $finalTotal += $totalArray[$i];
                                               }

                                               ?>

                                               <?php
                                               $nameArrLen = count($nameArray);
                                               for($i = 0 ; $i < $totalArrLen; $i++){

                                               ?>
                                               <tr id="weeklyreport_rowid">
                                                   <th><?php echo $nameArray[$i] ?></th>
                                                   <th><?php echo $orderArray[$i] ?></th>
                                                   <th><?php echo $totalArray[$i] ?></th>
                                               </tr>
                                               <?php } ?>


                                               </tbody>
                                           </table>
                                           <div id="addedRows"></div>


                                       </div>
                                   </div>


                               </div>
                           </div>
                       </div>
                        <div class="clearfix"></div>
                       <div class="col-md-6 w3l-char">
                           <div class="mother-grid-inner">
                           <div class="w3-agile-chat">
                               <div class="charts">


                                   <div class="charts-grids widget">
                                       <h4 class="title">Order</h4>
                                       <canvas id="pie2"> </canvas>
                                   </div>


                                   <div class="clearfix"> </div>

                                   <script type = "text/javascript">
                                       function getChartData2()
                                       {

                                           var xmlhttp1 = new XMLHttpRequest();

                                           xmlhttp1.onreadystatechange = function () {
                                               if (this.readyState == 4 && this.status == 200) {
                                                   var results = this.responseText;


                                                   var sResults = results.split("#");
                                                   var strSku =  sResults[0].split("&");
                                                   var strCount = sResults[1].split("&");





                                                   var barChartData = {
                                                       labels : strSku,
                                                       datasets : [

                                                           {
                                                               fillColor : "rgb(155, 197, 13)",
                                                               strokeColor : "rgba(79, 82, 186, 0.9)",
                                                               highlightFill: "#1b93e1",
                                                               highlightStroke: "#1b93e1",
                                                               data : strCount
                                                           }
                                                       ]

                                                   };


                                                   new Chart(document.getElementById("pie2").getContext("2d")).Bar(barChartData);


                                               }

                                           };
                                           xmlhttp1.open("GET", "getProductSale.php?p=haran", true);
                                           xmlhttp1.send();

                                       }

                                   </script>

                               </div>

               </div>
           </div>
           </div>
           <div class="col-md-6 w3l-char">
               <div class="mother-grid-inner">

                   <div class="agile-grids">



                       <div class="agile-tables">
                           <div class="w3l-table-info">
                               <h2>Weekly order</h2>


                               <table id="datatable">
                                   <thead>
                                   <tr>
                                       <th>SKU</th>
                                        <th>Product Name</th>
                                       <th>Amount</th>




                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php
                                   $productQuery = "SELECT productId,sku,name from tblproductdetails";
                                   $productQuery = $mysqli->query($productQuery);
                                   while($productObj = $productQuery->fetch_object()){
                                       $sku = $productObj->sku;
                                       $currentDate = strtotime("today");
                                       $weekStart = strtotime("last sunday midnight",$currentDate);
                                       $quantityQuery = "SELECT quantity from tblorderitems WHERE sku = '".$sku."' and orderId < $currentDate and orderId > $weekStart ";
                                       $quantityQuery = $mysqli->query($quantityQuery);
                                       $quantity = 0;
                                       while($quantityObj = $quantityQuery->fetch_object()){
                                           $quantity += $quantityObj->quantity;

                                       }

                                       if($quantity > 0 ){
                                       $productName = $productObj->name;




                                    ?>
                                   <tr id="weeklyreport_rowid">
                                       <td id="weeklyreport_productid"> <?php echo $sku ; ?></td>
                                       <td id="weeklyreport_productename"><?php echo $productName ; ?></td>
                                       <td id="weeklyreport_productamount"><?php echo $quantity ; ?></td>
                                   </tr>
                                   <?php }} ?>


                                   </tbody>
                               </table>
                               <div id="addedRows"></div>


                           </div>
                       </div>


                   </div>
               </div>
           </div>


           <div class="clearfix"> </div>

           <div class="agile-grids">
               <!-- tables -->

               <div class="agile-tables">
                   <div class="w3l-table-info">
                       <h2>Inventory Details</h2>

                       <table id="datatable">
                           <thead>
                           <tr>
                               <th>SKU</th>
                               <th>Product Name</th>
                               <th>WS PRICE</th>

                               <th>Supplier</th>




                           </tr>
                           </thead>
                           <tbody>
<?php
$productQuery = "SELECT * from tblproductdetails";
$productQuery = $mysqli->query($productQuery);
while($productObj = $productQuery->fetch_object()){ ?>

                           <tr id="inventarydetails_rowid">
                               <td id="inventerydetails_inventaryid"><?php echo $productObj->sku; ?></td>
                               <td id="inventarydetails_inventaryname"><?php echo $productObj->name; ?>  </td>
                               <td id="inventarydetails_sku"><?php echo $productObj->wsPrice; ?></td>
                               <td id="inventarydetails_quantity"><?php echo $productObj->supplier; ?></td>






                           </tr>
    <?php } ?>


                           </tbody>
                       </table>
                       <div id="addedRows"></div>


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
	 <p>© 2016 Pooled . All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->

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

   <!--js -->
   <script src="js/jquery.nicescroll.js"></script>
   <script src="js/scripts.js"></script>
   <!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- candlestick -->
		<script type="text/javascript" src="js/jquery.jqcandlestick.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jqcandlestick.css" />
		<!-- //candlestick -->
</body>
</html>