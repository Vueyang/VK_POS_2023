<!DOCTYPE html>
<html lang="en">

<?php include('connetdb.php')?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>VK_POS_2023</title>

	<!-- Google font -->
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
	<link href="fonts/fontawesome-webfont.ttf" rel="stylesheet">
	<link href="/fonts/NotoSansLao-VariableFont_wdth,wght.ttf" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Google Font: Source Sans Pro -->
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
	body {
		
		font-family: "Noto Sans Lao", sans-serif;
		  font-optical-sizing: auto;
		  font-weight: <weight>;
		  font-style: normal;
		  font-variation-settings:"wdth" 100;

		font-size: 14px;
	}
</style>


</head>
<!-- <style type="text/css">
	*{
			font-family: "Noto Sans Lao", sans-serif;
  			font-optical-sizing: auto;
  			font-weight: <weight>;
  			font-style: normal;
  			font-variation-settings:"wdth" 100;

			font-size: 14px;
		}
</style> -->
<!-- <style>
*{
	font-family: 'Noto Sans Lao', sans-serif;
}
</style> -->

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<?php include('nav.php')
		?>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->
	<!-- SECTION -->
	<!-- container -->
	<div class="container ">
		<!-- row -->
		<div class="overflow-x-auto">
			<div class="row">
				<div class="products-tabs">
					<!-- tab -->
					<div id="tab1" class="tab-pane active">
						<h3 class="title" style="padding: 0px 15px;">ປະເພດສີນຄ້າ</h3>
						<div class="products-slick" data-nav="#slick-nav-1">
							<!-- product -->
							<?php
								$sql = "SELECT * FROM type_product ORDER BY type_id	";
				
				$result = mysqli_query($conn, $sql);
				while($row=mysqli_fetch_array($result)){
					?>
							<div class="col-sm-4 col-xs-6 ">
								<div class="shop">
									<div class="shop-img">
										<img src="../Admin/image/<?=$row['type_img']?>" alt="" width="350" height="200">
									</div>
									<div class="shop-body">
										<h3><?=$row['type_name']?></h3>
										<a href="Show_all_product.php?id=<?=$row['type_id']?>" name="search_type"
											class="cta-btn">Shop
											now
											<i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<?php
				}
				//mysqli_close($conn);
				?>
							<!-- /product -->
						</div>

					</div>
					<!-- /tab -->
				</div>
				<!-- shop -->

				<!-- /shop -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Products</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
								<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
								<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
								<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="overflow-x-auto">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php
										$sql = "SELECT * FROM product_new ORDER BY pro_id";
									$result = mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($result)){
										?>
										<div class="col-sm-4 col-xs-6 ">
											<div class="product">
												<div class="product-img">
													<img src="../Admin/image/<?=$row['image']?>" alt="" width="350"
														height="200">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"><?=$row['pro_name']?></p>
													<h3 class="product-name"><a href="product.php">ເບີ່ງລາຍລະອຽດ
														</a></h3>
													<h4 class="product-price"><?=number_format($row['price'])?>
														<del class="product-old-price">$990.00</del>
													</h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i
																class="fa fa-heart-o"></i><span class="tooltipp">add
																to
																wishlist</span></button>
														<button class="add-to-compare"><i
																class="fa fa-exchange"></i><span class="tooltipp">add to
																compare</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span
																class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><a
															href="product.php?id=<?=$row['pro_id']?>">ເບີ່ງລາຍລະອຽດ</a><i
															class="fa fa-shopping-cart"></i>
													</button>
												</div>
											</div>
										</div>
										<?php
										}
										//mysqli_close($conn);
										?>
										<!-- /product -->
									</div>
								</div>
								<!-- /tab -->
							</div>
							<!-- shop -->

							<!-- /shop -->
						</div>
					</div>

				</div>
				<!-- Products tab & slick -->
			</div>
		</div>
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<?php include('hot_deal_countdown.php')?>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Top selling</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
								<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
								<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
								<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab2" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-2">
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product06.png" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
												<span class="new">NEW</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del
													class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
														class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span
														class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span
														class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
												cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product07.png" alt="">
											<div class="product-label">
												<span class="new">NEW</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del
													class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
														class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span
														class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span
														class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
												cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product08.png" alt="">
											<div class="product-label">
												<span class="sale">-30%</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del
													class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
														class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span
														class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span
														class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
												cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product09.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del
													class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
														class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span
														class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span
														class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
												cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del
													class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
														class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span
														class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span
														class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
												cart</button>
										</div>
									</div>
									<!-- /product -->
								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<?php include('all_top_selling.php')?>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<?php include('news_letter.php')?>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<?php include('footer_1.php')?>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>