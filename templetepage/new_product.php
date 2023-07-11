<!DOCTYPE html>
<html lang="en">
<?php include('connetdb.php')?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</head>

<body>
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
													<h3 class="product-name"><a href="product.php">product name
															goes
															here</a></h3>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
														add
														to
														cart</button>
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
		<div class="container">
			<div class="store-filter clearfix">
				<span class="store-qty">Showing 20-100 products</span>
				<ul class="store-pagination">
					<li class="active">1</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
				</ul>
			</div>
		</div>

	</div>
</body>

</html>