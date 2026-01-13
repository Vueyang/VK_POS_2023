<?php
	ob_start(); // Enable output buffering (optional)
	session_start(); // Start the session
	
	// Your PHP code here
	error_reporting(error_reporting() & ~E_NOTICE);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VK_POS_2023</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">

<link href="assets/tagsinput.css?v=11" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../Admin/font/NotoSansLao-VariableFont_wdth,wght.ttf">
<link rel="stylesheet" href="../Admin/font-awesome/fonts/fontawesome-webfont.eot">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
<!-- ckeditor -->
<script src="assets/ckeditor.js"></script>

	<style>
		*{
			font-family: "Noto Sans Lao", sans-serif;
		}
		body {
		
		font-family: "Noto Sans Lao", sans-serif;
		  font-optical-sizing: auto;
		  font-weight: <weight>;
		  font-style: normal;
		  font-variation-settings:"wdth" 100;

		font-size: 14px;
	}
	.header_nav h3 {
		top: 20%;
		left: 40%;
		transform: translate(-50%, -50%);
		font-size: 25px;
		background-image: -webkit-linear-gradient(45deg, white, red, white, yellow);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		animation: pop 5s infinite;
	}

	.header_nav h4 {
		top: 20%;
		left: 40%;
		transform: translate(-50%, -50%);
		font-size: 25px;
		background-image: -webkit-linear-gradient(45deg, white, red, white, yellow);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		animation: pop 5s infinite;
	}

	@keyframes pop {
		0% {
			transform: scale(0.5);
		}

		50% {
			transform: scale(0.8);
		}

		100% {
			transform: scale(1);
		}
	}
	</style>
</head>

<?php
include('connetdb.php');
?>

<body>

	<script src="https://use.fontawesome.com/06368cfa2a.js"></script>
	<script src="js/countdown.js"></script>
	<header>

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +8562078665114</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> nkaujkiabvang20212022@gmail.com</a></li>
					<li><a href="https://maps.app.goo.gl/pXEe6GATqks857BB9"><i class="fa fa-map-marker"></i>
							ແຜນທີ່ບໍລິສັດ</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-dollar"></i> Kip</a></li>
					<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="./img/vk.jpg" width="50" style="border-radius: 30px;" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->
					<?php
    // ດຶງປະເພດສີນຄ້າທັງໝົດ
						$sqltype ="SELECT * FROM type_product ORDER BY type_name ASC";
						$rsptype = mysqli_query($conn, $sqltype) or die("Error :" . mysqli_error($conn));
					?>

				<div class="col-md-6">
					<div class="header-search">
						<form action="Show_all_product.php" method="GET">
							<select class="input-select" name="type_id">
								<option value="">ທັງໝົດ (All)</option>
								<?php while($row_t = mysqli_fetch_array($rsptype)) { ?>
									<option value="<?= $row_t['type_id'] ?>">
										<?= $row_t['type_name'] ?>
									</option>
								<?php } ?>
							</select>
							
							<input class="input" name="search_text" placeholder="ຄົ້ນຫາສີນຄ້າຢູ່ບ່ອນນີ້...">
							<button type="submit" class="search-btn">ຄົ້ນຫາ</button>
						</form>
					</div>
				</div>
					<!-- /SEARCH BAR -->
					<?php
					// Database connection (assuming $conn is already defined)
					$p_id = mysqli_real_escape_string($conn, $_GET['id']);
					$actdd = mysqli_real_escape_string($conn, $_GET['add']);
					$act = mysqli_real_escape_string($conn, $_GET['act']);

					// Sanitize input
					if (isset($_GET['pro_id'])) {
						$product_id = mysqli_real_escape_string($conn, $_GET['pro_id']);
					} else {
						$product_id = null;
					}

					// Handle actions (add, remove, update)
					if (isset($_GET['act'])) {
						$act = mysqli_real_escape_string($conn, $_GET['act']);

						if ($act == 'remove' && !empty($product_id)) {
							// Remove product from cart
							unset($_SESSION['cart'][$product_id]);
							header('Location: Show_all_product.php?id=' . $product_id);
						}
					}


					if (isset($_GET['id']) && isset($_GET['act']) && $_GET['act'] == 'add') {
						$product_id = intval($_GET['id']); // Sanitize the product ID
						$quantity = isset($_GET['qty']) ? intval($_GET['qty']) : 1; // Default to 1 if quantity is not provided

						// Initialize the cart if it doesn't exist
						if (!isset($_SESSION['cart'])) {
							$_SESSION['cart'] = [];
						}

						// Add the product to the cart or update its quantity
						if (isset($_SESSION['cart'][$product_id])) {
							// If product already exists in cart, increase the quantity
							$_SESSION['cart'][$product_id] += $quantity;
						} else {
							// If product doesn't exist in cart, add it with the specified quantity
							$_SESSION['cart'][$product_id] = $quantity;
						}

						// Redirect back to the product page or cart page
						header('Location: product.php?id=' . $product_id);
						exit();
					}
					?>
					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
						<!-- Cart Dropdown -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>ກະຕ່າຂອງເຈົ້າ</span>
									<div class="qty"><?= array_sum($_SESSION['cart'] ?? []); ?></div> <!-- Display total items in cart -->
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<?php
										$qtysum = 0; // Calculate total quantity
										$total = 0;
										if (!empty($_SESSION['cart'])) {
											foreach ($_SESSION['cart'] as $product_id => $qty) {
												$sql = "SELECT * FROM product_new, type_product 
														WHERE product_new.type_id = type_product.type_id 
														AND product_new.pro_id = '$product_id'";
												$query = mysqli_query($conn, $sql);
												if ($query && mysqli_num_rows($query) > 0) {
													$row = mysqli_fetch_array($query);
													$sum = $row['price'] * $qty; // Calculate total price for this product
													$total += $sum; // Add to the overall total
													$qtysum += $row['amount'];
													?>
													<div class="product-widget">
														<div class="product-img">
															<img src="../Admin/image/<?= $row['image'] ?>" alt="">
														</div>
														<div class="product-body">
															<h3 class="product-name"><a href="#"><?= $row['pro_name'];?></a></h3>
															<h4 class="product-price"><span class="qty"><?= $qty ?>x</span><?= number_format($row['price'], 0) ?> LAK</h4>
														</div>
														<button class="delete">
															<a href='nav.php?pro_id=<?= $product_id ?>&act=remove'>
																<i class="fa fa-close"></i>
															</a>
														</button>
													</div>
												<?php }
											}
										} else {
											echo "<p>ກະຕ່າຂອງເຈົ້າຍັງວ່າງເປົ່າ</p>";
										}
										?>
									</div>
									<div class="cart-summary">
										<small>ລວມຈຳນວນເງີນທີ່ສັ່ງຊື້ທາງໝົດ</small>
										<h5>ຈຳນວນເງີນ: LAK <?= number_format($total, 0) ?></h5> <!-- Display total price -->
									</div>
									<div class="cart-btns">
										<a href="#">ເບີ່ງກະຕ່າຂອງເຈົ້າ</a>
										<a href="#">ຊຳລະເງີນເງິນ <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Tootle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Tootle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>


		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- Example single danger button -->
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a
								class="<?= $url[0] == 'index' || $url[0] == 'index' ? 'active-menu-custom' : ''?>"
								href="index.php">ໜ້າຫຼັກ</a></li>
						<li><a class="<?= $url[0] == 'promotion' || $url[0] == 'promotion' ? 'active-menu-custom' : ''?>"
								href="#">ໂປຣໂມຊັນ</a></li>
						<li><a class="<?= $url[0] == 'about' || $url[0] == 'about' ? 'active-menu-custom' : ''?>"
								href="#">ກ່ຽວກັບພວກເຮົາ</a></li>
						<li><a class="<?= $url[0] == '' || $url[0] == 'product_type' ? 'active-menu-custom' : ''?>"
								href="product_type.php">ປະເພດສີນຄ້າ</a></li>
						<li><a class="<?= $url[0] == '' || $url[0] == 'product' ? 'active-menu-custom' : ''?>"
								href="Show_all_product.php">ສີນຄ້າ</a></li>
						<li><a class="<?= $url[0] == '' || $url[0] == 'accessories' ? 'active-menu-custom' : ''?>"
								href="#">ອຸປະກອນເສີມ</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
		</nav>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- /container -->
	<!-- NAVIGATION -->
	<!-- /NAVIGATION -->
</body>

</html>