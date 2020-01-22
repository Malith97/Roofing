<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["product_code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
		case "edit":
			$total_price = 0.00;
			$total_weight = 0.00;
			foreach ($_SESSION['cart_item'] as $k => $v) {
			  if($_POST["product_code"] == $k) {
				  if($_POST["quantity"] == '0') {
					  unset($_SESSION["cart_item"][$k]);
				  } else {
					$_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
				  }
			  }
			  $total_price += $_SESSION['cart_item'][$k]["product_price"] * $_SESSION['cart_item'][$k]["quantity"];
			  $total_weight += $_SESSION['cart_item'][$k]["product_weight"] * $_SESSION['cart_item'][$k]["quantity"];	

				  
			}
			
			if($total_price!=0 && is_numeric($total_price)) {
				echo json_encode(array($total_price,$total_weight));
				exit();
			}
			exit();
		break;
		case "update1":
			$pricekm =0.00;
			$pricekg =0.00;
			$distance = $_POST["distance"];
			$agency = $_POST["agency"];
			$weight = $_SESSION['total_weight'];
			$temp = $db_handle->runQuery("SELECT km,kg FROM users Where id = ".$agency.";");
			$kmpr = $temp[0]["km"];
			$kgpr = $temp[0]["kg"];
			$pricekm = $distance * $kmpr;
			$pricekg = $weight * $kgpr;
			if($pricekm!=0 && is_numeric($pricekm)) {
				echo json_encode(array($pricekm,$pricekg));
				exit();
			}
			
			exit();
			
		break;	
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--===============================================================================================-->


</head>
<body class="animsition">

	<?php
		$session_items = 0;
		if(!empty($_SESSION["cart_item"])){
			$session_items = count($_SESSION["cart_item"]);
		}	
	?>
	
	<!-- Header -->
	<header class="header-v4" id="header">
		<!-- Header desktop -->
		<div class="container-menu-desktop">

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container" id="navbarNavAltMarkup">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="shopping_cart.php">Cart</a>
							</li>

							<li>
								<a href="blog.html">Blog</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<a href="shopping_cart.php" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?php echo $session_items; ?>">

	                        <i class="zmdi zmdi-shopping-cart"></i>
							</a>

						<a href="login.html" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0">
							<i class="zmdi zmdi-account-add"></i>
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

				<a href="login.html" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10" data-notify="0">
					<i class="zmdi zmdi-account-add"></i>
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
					<a href="index.html">Home</a>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Cart</a>
				</li>

				<li>
					<a href="blog.php">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			</a>

			<span class="stext-109 cl4">
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart items -->
	
		<div class="container" id="shopping-cart">
			<div class="row" style="width: 1850px;">
				<div class="col-lg-10 col-xl-7 m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5"></th>
									<th class="column-6">Status</th>
									<th class="column-6"><a href="shopping_cart.php?action=empty">Clear Cart</a></th>
								</tr>

								<form name="frmCartEdit" id="frmCartEdit">
								<?php
									$total_price = 0.00;
									$total_weight = 0.00;
									$pricekm =0.00;
									$pricekg =0.00;
									
									if(isset($_SESSION["cart_item"])){
									?>	
									<?php foreach ($_SESSION["cart_item"] as $item) { 
											$product_info = $db_handle->runQuery("SELECT * FROM product WHERE product_code = '" . $item["product_code"] . "'");
											$total_price += $item["product_price"] * $item["quantity"];	
											$total_weight += $item["product_weight"] * $item["quantity"];
											$_SESSION['total_weight'] = $total_weight;
								?>

								<tr class="table_row" onMouseOver="document.getElementById('remove<?php echo $item["product_code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('remove<?php echo $item["product_code"]; ?>').style.display='';" >
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php echo $product_info[0]["product_image"]; ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $item["product_name"]; ?></td>
									<td class="column-3"><?php echo "Rs.".$item["product_price"]; ?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="text" name="quantity" id="<?php echo $item["product_code"]; ?>" value="<?php echo $item["quantity"]; ?>" size="2" onblur="saveCart(this);">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td></td>
									<td class="column-5"></td>
									<td class="column-6"><a class="btn btn-danger" href="shopping_cart.php?action=remove&product_code=<?php echo $item["product_code"]; ?>" id="remove<?php echo $item["product_code"]; ?>">Remove</td>
								</tr>

									<?php
											}
										}
									?>
								</form>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Shipping Methods -->
	<form class="bg0 p-t-75 p-b-85"  method ="POST" action="php/plase_order.php">
		<div class="container">
			<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-4" style="margin-right: 500px;">Rate per KM</th>
									<th class="column-5">Rate per KG</th>
								</tr>

								<?php 
									$productByCode = $db_handle->runQuery("SELECT com_name,com_logo,km,kg FROM users Where type = 2");
									foreach($productByCode as $kmm ) {
										echo "<tr class='table_row'>
											<td class='column-1'>
												<div class='how-itemcart1'>
													<img src=\"data:image/jpeg;base64,".base64_encode( $kmm['com_logo'])."\"/>
												</div>
											</td>
											<td class='column-2'>
												<ul>
													<li>" . $kmm['com_name'] ."</li>
												</ul>
											</td>
											<td class='column-3'>
												<span class='stext-110 cl2' style='margin-left: 80px;'>Rs." . $kmm['km'] ."</span>
												<br />
											</td>
											<td class='column-4'>
												<span class='stext-110 cl2' style='margin-right: 70px;'>Rs." . $kmm['kg'] ."</span>
											</td>
										</tr>";
									}
									?>

							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
							<h4 class="mtext-109 cl2 p-b-30">
								Cart Totals
							</h4>
							
							<input type="hidden" id="weighthdd" name="weighthdd" value="<?php echo $total_weight; ?>"/>
							<input type="hidden" id="disprhdd" name="disprhdd" value="0"/>
							<input type="hidden" id="weiprhdd" name="weiprhdd" value="0"/>
							<input type="hidden" id="subpricehdd" name="subpricehdd" value="<?php echo $total_weight; ?>"/>
							<input type="hidden" id="totalpricehdd" name="totalpricehdd" value="0">
											
							<div class="flex-w flex-t bor12 p-b-13">
								<div class="size-208">
									<span class="stext-110 cl2">
										Weight:
									</span>
								</div>

								<div class="size-209">
									<span class="mtext-110 cl2" id="total_weight">
										<?php echo number_format($total_weight,2)."kg"; ?>
									</span>
								</div>
							</div>


							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Name
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm" style="height: 30px; margin-bottom: 5px; padding-bottom: 10px;">
									
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Name">
											<div class="dropDownSelect2"></div>
										</div>
											
								</div>
							</div>

							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Contact Number
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm" style="height: 30px; margin-bottom: 5px; padding-bottom: 10px;">
									
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="contact" placeholder="Type your contact number here">
											<div class="dropDownSelect2"></div>
										</div>
											
								</div>
							</div>

							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Address
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm" style="height: 30px; margin-bottom: 5px; padding-bottom: 10px;">
									
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Type your address here">
											<div class="dropDownSelect2"></div>
										</div>
											
								</div>
							</div>

							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Select City
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm" style="height: 30px; margin-bottom: 5px; padding-bottom: 10px;">
									
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<select name="distance" id="distance" class="form-control action" onchange="updateprice();">
												<?php 
												$productByCode = $db_handle->runQuery("SELECT * FROM distance");
												foreach($productByCode as $kmm ) {
													echo "<option value=". $kmm['km'] .">" . $kmm['city'] ."  -" . $kmm['km'] . "km</option>";
												}
												?>
											</select>
										</div>
											
								</div>
							</div>

							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Select Delivery Service
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm" style="height: 30px; margin-bottom: 5px; padding-bottom: 10px;">
									
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<select name="agency" id="agency" class="form-control action"  onchange="updateprice();">
												<?php 
												$productByCode = $db_handle->runQuery("SELECT id,com_name FROM users Where id > 1");
												foreach($productByCode as $ag ) {
													echo "<option value=". $ag['id'] .">" . $ag['com_name'] ."</option>";
												}
												?>
											</select>
										</div>
											
								</div>
							</div>


							<div class="flex-w flex-t p-t-15 p-b-30 bor12">

								<div class="size-208">
									<span class="stext-110 cl2">
										Charge for Weight
									</span>
								</div>

								<div class="size-209">
									<span class="mtext-110 cl2" id="charge_for_wei">
									Rs.0.00
									</span>
								</div>

								<br>

								<div class="size-208 p-t-5">
									<span class="stext-110 cl2">
										Charge for Distance
									</span>
								</div>

								<div class="size-209">
									<span class="mtext-110 cl2" id="charge_for_dis">
										Rs.0.00
									</span>
								</div>
							</div>



							<div class="flex-w flex-t bor12 p-t-15 p-b-13">
								<div class="size-208">
									<span class="stext-110 cl2">
										Subtotal:
									</span>
								</div>

								<div class="size-209">
									<span class="mtext-110 cl2" id="total_price">
										<?php echo "Rs.". number_format($total_price,2); ?>
									</span>
								</div>
							</div>


							<div class="flex-w flex-t p-t-27 p-b-33">
								<div class="size-208">
									<span class="mtext-101 cl2">
										Total:
									</span>
								</div>

								<div class="size-209 p-t-1">
									<span class="mtext-110 cl2"  id="tot_total_price">
										Rs.0.00
									</span>
								</div>
							</div>
							<button type="submit" name="submit"  value="trans" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Proceed to Checkout </button>
						</div>
				</div>
			</div>
		</div>
	</form>


	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm"   style="width:500px; align-items: center;padding-right: 250px;">
						<h4 class="mtext-109 cl2 p-b-30">
							Payment Gateway
						</h4>

						<div class="flex-w flex-t p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Name 
								</span>
							</div>

							<div class="size-209">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Name">
							</div>
						</div>

						<div class="flex-w flex-t p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Contact
								</span>
							</div>

							<div class="size-209">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="0XX XXX XXXX">
							</div>
						</div>

						<div class="flex-w flex-t p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Card
								</span>
							</div>

							<div class="size-209">
								<select class="js-select2" name="time">
									<option>Choose Card</option>
									<option>Visa</option>
									<option>Master</option>
									<option>Paypal</option>
									<option>Pioneer</option>
								</select>
								<div class="dropDownSelect2"></div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Card No:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="XXXX XXXX XXXX XXXX">
								</div>	
							</div>
						</div>

						<div class="flex-w flex-t p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Card Name
								</span>
							</div>

							<div class="size-209">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Name">
							</div>
						</div>

						<div class="flex-w flex-t p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									CVV
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="XXX">
								</div>	
							</div>
						</div>

						<div class="flex-w flex-t p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Expiration
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="XX-XX">
								</div>	
							</div>
						</div>

						

						<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
							Add to cart
						</button>

						
					</div>
				</div>
					
					
				</div>
			</div>
		</div>
	</div>	


	
		

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
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>

	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>

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
	<script src="js/main.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function saveCart(obj) {
	var quantity = $(obj).val();
	var product_code = $(obj).attr("id");
	console.log(quantity);
	$.ajax({
		url: "?action=edit",
		type: "POST",
		data: 'product_code='+product_code+'&quantity='+quantity,
		dataType: 'json',
		success: function(data){
			//console.log(data);//weighthdd/disprhdd/weiprhdd/subpricehdd/totalpricehdd
			var rs = "Rs.";
			var kg = "kg";
			document.getElementById("subpricehdd").value = data[0];
			document.getElementById("weighthdd").value = data[1];
			$("#total_price").html(rs+data[0].toFixed(2));
			$("#total_weight").html(data[1].toFixed(2)+kg);},
		error: function () {alert("Problem in sending reply!")}//total_weight,total_price
	});
}

function updateprice() {
	var  distance = document.getElementById("distance").value
	var  agency = document.getElementById("agency").value
	$.ajax({
		url: "?action=update1",
		type: "POST",
		data: 'distance='+distance+'&agency='+agency,
		dataType: 'json',
		success: function(data){
			//console.log(data);
			var rs = "Rs.";
			document.getElementById("disprhdd").value = data[0];
			document.getElementById("weiprhdd").value = data[1];
			$("#charge_for_dis").html(rs+data[0].toFixed(2));
			$("#charge_for_wei").html(rs+data[1].toFixed(2));},
		error: function () {alert("Problem in sending reply!")}
	});
}
</script>

<script>
$(document).ready(function(){
 $('.action').change(function(){
	var rs = "Rs.";
	 var dispr = document.getElementById("disprhdd").value;
	 var weipr = document.getElementById("weiprhdd").value;
	 var subtot = document.getElementById("subpricehdd").value;
	 var full_tot = Number(dispr)+Number(weipr)+Number(subtot);
	 document.getElementById("totalpricehdd").value = full_tot;
	 $("#tot_total_price").html(rs+full_tot.toFixed(2));

 });
});
</script>
</body>
</html>