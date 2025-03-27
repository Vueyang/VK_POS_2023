<?php 
	error_reporting(error_reporting() & ~E_NOTICE);
	session_start();
	require('connetdb.php');

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
</head>
<?php 
	$type_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	if($type_id == 0){
		$type_id1 = isset($_GET['type_id']) ? intval($_GET['type_id']) : 0;
		if($type_id1 == 0 ){
			die("ບໍ່ມີ type_id ທີ່ຖືກສົ່ງມາ");
		}
	}
	$sql = "SELECT * FROM product_new JOIN type_product ON product_new.type_id = type_product.type_id
			WHERE type_product.type_id = $type_id ORDER BY product_new.pro_id DESC";
			$result = mysqli_query($conn, $sql);
?>
<body>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">ສີນຄ້າທີກ່ຽວຂ້ອງ</h3> 
						<!-- Related Products -->
					</div>
				</div>

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div class="product-img">
							<img src="./img/product01.png" alt="">
							<div class="product-label">
								<span class="sale">-30%</span>
							</div>
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							<div class="product-rating">
							</div>
							<div class="product-btns">
								<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
										to wishlist</span></button>
								<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
										to compare</span></button>
								<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div class="product-img">
							<img src="./img/product02.png" alt="">
							<div class="product-label">
								<span class="new">NEW</span>
							</div>
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="product-btns">
								<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
										to wishlist</span></button>
								<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
										to compare</span></button>
								<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div class="product-img">
							<img src="./img/product03.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<div class="product-btns">
								<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
										to wishlist</span></button>
								<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
										to compare</span></button>
								<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div class="product-img">
							<img src="./img/product04.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							<div class="product-rating">
							</div>
							<div class="product-btns">
								<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
										to wishlist</span></button>
								<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
										to compare</span></button>
								<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
</body>

</html>