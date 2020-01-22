<?php
    // Check if user has requested to get detail
    if (isset($_POST["get_data"]))
    {
        // Get the ID of customer user has selected
        $id = $_POST["id"];

        // Connecting with database
        $connection = mysqli_connect("localhost", "root", "", "roofing");

        // Getting specific customer's detail
        $sql = "SELECT * FROM sub_order WHERE order_id='$id'";
        $result = mysqli_query($connection, $sql);
        $data = array();
		while ($row = mysqli_fetch_object($result))
		{
			array_push($data, $row);
		}

		echo json_encode($data);

        // Important to stop further executing the script on AJAX by following line
        exit();
    }
?>

<?php
    // Connecting with database and executing query
    $connection = mysqli_connect("localhost", "root", "", "roofing");
    $sql = "SELECT * FROM main_order";
    $result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="css/c3.min.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/bootstrap.css" />
	<script src="jquery/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li >
								<a href="sell_index.php">Home</a>
							</li>

							<li >
								<a href="sell_add_item.html">Add Item</a>
							</li>

							<li  class="active-menu">
								<a href="sell_orders.php">Orders</a>
							</li>

							<li >
									<a href="sell_messages.php">Messages</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<a href="login.html" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0">
							<i class="zmdi zmdi-power"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="login.html" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0">
					<i class="zmdi zmdi-power"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="sell_index.html">Home</a>
				</li>

				<li>
					<a href="sell_add_item.html">Add Item</a>
				</li>

				<li>
					<a href="sell_orders.html" class="label1 rs1" data-label1="New">Orders</a>
				</li>
			</ul>
		</div>
	</header>

	<!-- Cart -->
	

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Orders
		</h2>
	</section>	


	<!-- Content page -->

	<div class="mx-auto rounded" style="background-color: #ffffff; padding-top: 70px;">

	<div class=" mx-auto rounded" style=" padding-top: : 50%; width: 1100px;">
       
        <div class="body" style="background-color: #ffffff;   border-radius: 15px;">
            <div id="chart-zoom"></div>
        </div>
        
    </div>


	<div class="container">
	    <table class="table">
	        <tr>
	            <th>Order ID</th>
	            <th># Items</th>
	            <th>Weight</th>
	            <th>Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Distabce</th>
				<th>Sub Total</th>
				<th>Charges 1</th>
				<th>Charges 2</th>
				<th>Total</th>
	            <th>Status</th>
	            <th>View Order</th>
	        </tr>

	        <!-- Display dynamic records from database -->
	        <?php while ($row = mysqli_fetch_object($result)) { ?>
	            <tr>
	                <td><?php echo $row->order_id; ?></td>
	                <td><?php echo $row->order_items; ?></td>
	                <td><?php echo $row->order_weight; ?> KG</td>
					<td><?php echo $row->customer_name; ?></td>
					<td><?php echo $row->customer_contact; ?></td>
					<td><?php echo $row->customer_address; ?></td>
					<td><?php echo $row->distance; ?> </td>
					<td><?php echo $row->sub_price; ?> </td>
					<td><?php echo $row->dis_price; ?> </td>
					<td><?php echo $row->wei_price; ?> </td>
					<td><?php echo $row->total; ?> </td>
	                <td><?php echo $row->order_status; ?></td>
	                <!--Button to display details -->
	        <td>
	            <button class = "btn btn-primary" onclick="loadData(this.getAttribute('data-id'));" data-id="<?php echo $row->order_id; ?>">
	                Details
	            </button>
	        </td>
	            </tr>
	        <?php } ?>
	    </table>
	</div>

	<script>
    function loadData(id) {
        console.log(id);
        $.ajax({
            url: "sell_orders.php",
            method: "POST",
            data: {get_data: 1, id: id},
            success: function (response) {
                data = JSON.parse(response);
				console.log(data);
				var html = "";
				$("#data2").empty();
				for(var a = 0; a < data.length; a++) {
					var order_id = data[a].order_id;
					var product_name = data[a].product_name;
					var quantity = data[a].quantity;
					var product_colour = data[a].product_colour;


					html += "<tr>";
						html += "<td>" + order_id + "</td>";
						html += "<td>" + product_name + "</td>";
						html += "<td>" + quantity + "</td>";
					html += "</tr>";
				}
				document.getElementById("data2").innerHTML += html;
                $("#myModal").modal();
            }
        });
    }
	</script>

<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-hidden = "true" style="margin-top: 150px;">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <h8 class = "modal-title">
               <table class="table" style="width: 475px;">
	          <thead class="thead-light" >
	            <tr>
	              <th scope="col">Order ID</th>
	              <th scope="col">Name</th>
	              <th scope="col">Quantity</th>

	            </tr>
	          </thead>
	          <tbody id="data2"></tbody>
	        </table>
            </h8>

            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
            </button>
         </div>
         
         <div id = "modal-body">
            
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               OK
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
</div><!-- /.modal -->

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Tiles
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Roofing Sheets
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Paints
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Other
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Delivery
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? <br> Let us know in store at <br> වහලය showroom , 256 Main St , Galle Rd, Rathmalana or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="wahalaya@gmail.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | by <a href="https://wahalaya.com" target="_blank">වහලය</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>

	
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>

	<script src="js/d3.v5.min.js"></script>
	<script src="js/c3.min.js"></script>
	<script src="js/c3.js"></script>


<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "php/sup_sub_orders.php", true);
    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = "";
            for(var a = 0; a < data.length; a++) {
                var order_id = data[a].order_id;
                var product_name = data[a].product_name;
                var quantity = data[a].quantity;
                var product_colour = data[a].product_colour;


                html += "<tr>";
                    html += "<td>" + order_id + "</td>";
                    html += "<td>" + product_name + "</td>";
                    html += "<td>" + quantity + "</td>";
                html += "</tr>";
            }
            document.getElementById("data2").innerHTML += html;
        }
    };
</script>


</body>
</html>