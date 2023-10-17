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
	<style>
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
<style>
* {
	font-family: 'Noto Sans Lao', sans-serif;
}
</style>
<?php 
$url = $_SERVER['REQUEST_URI']?>

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

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">All Categories</option>
									<option value="1">Category 01</option>
									<option value="1">Category 02</option>
								</select>
								<input class="input" placeholder="Search here">
								<button class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>ກະຕ່າຂອງເຈົ້າ</span>
									<div class="qty">3</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a>
												</h3>
												<h4 class="product-price"><span class="qty">1x</span>$980.00
												</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>

										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product02.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a>
												</h3>
												<h4 class="product-price"><span class="qty">3x</span>$980.00
												</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>
									</div>
									<div class="cart-summary">
										<small>ລວມຈຳນວນເງີນທີ່ສັ່ງຊື້ທາງໝົດ</small>
										<h5>ຈຳນວນເງີນ: $3920.00</h5>
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