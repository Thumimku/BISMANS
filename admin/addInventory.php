<?php
    include_once ('config.php');
    include_once ('system_session.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Tabels :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script src="js/w3.js"></script>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
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
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Add Inventory</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->

	<div class="agile-tables">
		<div class="w3l-table-info">
			<h2>Add Inventory</h2>

            <?php
            if (isset($_GET['sucess'])){
                echo "<h3 style='text-align: center;'><font color=\"red\"> Saved!.</font></h3>";
            }else if(isset($_GET['error'])){
                echo "<h3 style='text-align: center;'><font color=\"red\"> Failed, Could not save!</font></h3>";

            }else if(isset($_GET['dup'])){
                echo "<h3 style='text-align: center;'> <font color=\"red\"> Duplicate product detail, Please Check & Re-enter it.</font></h3>";
            }

            ?>
            <form method="post" action = "addNewInventory.php">
			<table id="datatable">

				<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
                    <th>SKU</th>
                    <th>BatchNumber</th>
                    <th>Quantity</th>

                    <th>Expiry Date</th>
                    <th style="padding:8px;"><span style="cursor:pointer;" onclick="addMoreRows(this.form);">+Add</span></th><br>


				</tr>
				</thead>
				<tbody>

				<tr id="rowId">
					<td id="inventery_inventaryid">
                        <input  name="productId[]"  id = "productId1" type="text" size="10%" required/>
                    </td>
					<td id="inventary_inventaryname">
                        <input  list = "products" name = "productName[]" id = "productName" type = "text" size = "10%" onkeyup="showHint(this.value)" onchange = "getProductDetails(this.value,this)" required />

                        <datalist id="products">


                        </datalist>
                    </td>
					<td id="inventary_sku">
                        <input  name="sku[]" id = "sku1" type="text" size="10%" required/>
                    </td>
					<td id="inventary_batchnumber">
                        <input  name="batchNo[]" type="number" size="10%" required/>
                    </td>
					<td id="inventary_quantity">
                        <input  name="quantity[]" type="number" size="10%" required/>
                    </td>
                    <td id="inventary_expirydate">
                        <input   name="expiryDate[]" type="date" size="10%" required/>
                    </td>
                    <td></td>




				</tr>


				</tbody>
			</table>
            <div id="addedRows"></div>

            <!--<script type="text/javascript">
                var rowCount = 1;

                function addMoreRows(frm) {
                    rowCount ++;
                    alert(rowCount);
                    var recRow = '<p id="rowCount'+rowCount+'"><tr><td ><input name="trPrice" type="text" size="10%"  maxlength="60" style="margin:10px 38px 0 0;" /></td><td id="inventary_inventaryname"> <select name="trPrice" type="text" style="margin:10px 45px 0 0;"> <option value="">Select...</option> <option value="M">Male</option> <option value="F">Female</option> </select> </td><td id="inventary_sku"><input  name="trPrice" type="text" size="10%"  maxlength="60" style="margin:10px 27px 0 0;"/> </td><td id="inventary_batchnumber"> <input  name="trPrice" type="number" size="10%"  maxlength="60" style="margin:10px 20px 0 0;"/> </td> <td id="inventary_quantity"> <input  name="trPrice" type="number" size="10%"  maxlength="60" style="margin:10px 20px 0 0;"/> </td> <td id="inventary_expirydate"> <input   name="trPrice" type="date" size="10%"  maxlength="60" style="margin:10px 20px 0 0;"/> </td> <td><span style="cursor:pointer;" onclick="removeRow('+rowCount+');">Delete</span></td></tr></p>';
                    jQuery('#addedRows').append(recRow);
                }

                function removeRow(removeNum,table) {

                    alert(removeNum);
                    tablenow.deleteRow(removeNum);

                }
            </script>-->

            <script type="text/javascript">

                function clearChildren( parent_id ) {
                    var childArray = document.getElementById( parent_id ).children;
                    if ( childArray.length > 0 ) {
                        document.getElementById( parent_id ).removeChild( childArray[ 0 ] );
                        clearChildren( parent_id );
                    }
                }

                var options = new Array();


                function showHint(str) {
                    if (str.length == 0) {
                        document.getElementById("productName").value = "";
                        clearChildren('products');
                        options = [];
                        return;
                    } else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {

                                var list = document.getElementById('products');

                                var optVal= this.responseText;

                                if(!contains(options,optVal)){
                                    clearChildren('products');
                                    var option = document.createElement('option');
                                    option.value = optVal;
                                    list.appendChild(option);
                                }

                                options.push(optVal);


                            }
                        };
                        xmlhttp.open("GET", "getProductHint.php?q=" + str, true);
                        xmlhttp.send();
                    }
                }

                function contains(a, obj) {
                    for (var i = 0; i < a.length; i++) {
                        if (a[i] === obj) {
                            return true;
                        }
                    }
                    return false;
                }


                function createInput(name,dynId) {
                    var inp = document.createElement("input");
                    inp.setAttribute("id", dynId);
                    inp.setAttribute("type", "text");
                    inp.setAttribute("name",name);
                    inp.setAttribute("size", "10%");
                    inp.setAttribute("required","");
                    return inp;
                }




                var rowCount = 2;
                function addMoreRows(str) {

                    var table = document.getElementById("datatable");
                    var row = table.insertRow(rowCount);

                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);


                    var dynamicProductId = "productId" + rowCount ;
                    var dynamicSku = "sku" + rowCount ;
                    rowCount += 1;



                    cell1.appendChild(createInput("productId[]",dynamicProductId));

                    cell2.innerHTML =   '<input list = "products" name = "productName[]" id = "productName" type = "text" size = "10%" onkeyup="showHint(this.value)" onchange = "getProductDetails(this.value,this)" required/>';

                    var datalist = document.createElement("datalist");
                    datalist.id = 'products';

                    cell2.appendChild(datalist);
                    cell3.appendChild(createInput("sku[]",dynamicSku));

                    cell4.innerHTML = '<input  name="batchNo[]" type="number" size="10%" required/> ';

                    cell5.innerHTML = '<input  name="quantity[]" type="number" size="10%" required/>';

                    cell6.innerHTML = '<input   name="expiryDate[]" type="date" size="10%" required/> ';
                    cell7.innerHTML = '<span style="cursor:pointer;" onclick="deleteRow(this);"><strong>DEL</strong></span>';

                }

                function deleteRow(r) {
                    var i = r.parentNode.parentNode.rowIndex;
                    document.getElementById("datatable").deleteRow(i);
                    rowCount -= 1;
                }

                function getProductDetails(str,element) {
                    if (str == "") {
                        document.getElementById("productId").value = "";
                        document.getElementById("sku").value = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {

                                var productDetail = this.responseText;
                                var detailArray = productDetail.split("&");
                                var productId = detailArray[0];
                                var sku = detailArray[1];

                                var rowNumber = getId(element);
                                var dynamicProductId = "productId" + rowNumber;
                                var dynamicSkuId = "sku" + rowNumber;

                                document.getElementById(dynamicProductId).value = productId;
                                document.getElementById(dynamicSkuId).value = sku;



                            }
                        };
                        xmlhttp.open("GET","getProductDetails.php?p="+str,true);
                        xmlhttp.send();
                    }
                }
                function  getId(element) {
                     return element.parentNode.parentNode.rowIndex;
                }


            </script>


            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button class="btn-primary btn" id="addinventary_accept	">Accept</button>


                    </div>
                </div>
            </div>
            </form>
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