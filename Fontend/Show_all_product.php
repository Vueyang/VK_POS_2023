<!DOCTYPE html>
<html lang="en">
<?php include('connetdb.php');
$menu = "list_sale";
//session_start();

?>

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

	<link href="/font/NotoSansLao-VariableFont_wdth,wght.ttf" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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
<body>
	<!-- HEADER -->
	<!-- container -->
	<!-- NAV -->
	<?php 

		// 1. ຮັບຄ່າ type_id ຈາກ URL (ກວດສອບທັງ id ແລະ type_id ເພື່ອຄວາມແນ່ນອນ)
// 1. ຮັບຄ່າ ID ປະເພດສິນຄ້າ
$type_id = isset($_GET['id']) ? intval($_GET['id']) : (isset($_GET['type_id']) ? intval($_GET['type_id']) : 0);

// 2. ສ້າງເງື່ອນໄຂ WHERE
$where_condition = "";
if ($type_id > 0) {
    $where_condition = " WHERE product_new.type_id = $type_id ";
}

// 3. ກຳນົດຈຳນວນຂໍ້ມູນຕໍ່ໜ້າ (ໃຊ້ຊື່ດຽວກັນທັງໝົດ)
$perPage = 9; 

// 4. ນັບຈຳນວນແຖວທັງໝົດ
$sql_count = "SELECT COUNT(product_new.pro_id) FROM product_new $where_condition";
$query_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_row($query_count);
$total_rows = $row_count[0];

// 5. ຄິດໄລ່ການແບ່ງໜ້າ
$last_page = ceil($total_rows / $perPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) { $page = 1; } elseif ($page > $last_page) { $page = $last_page; }

$start = ($page - 1) * $perPage;
if($start < 0) { $start = 0; } // ປ້ອງກັນກໍລະນີບໍ່ມີຂໍ້ມູນເລີຍ

// 6. ດຶງຂໍ້ມູນສິນຄ້າ (LIMIT ໃຊ້ $start ແລະ $perPage)
$sql = "SELECT * FROM product_new 
        INNER JOIN type_product ON product_new.type_id = type_product.type_id 
        $where_condition 
        ORDER BY product_new.pro_id LIMIT $start, $perPage";
$result = mysqli_query($conn, $sql) or die("Error Query:" . mysqli_error($conn));
?>

	<head>
		<?php include('nav.php')?>
	</head>
	<!-- SECTION -->

	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<div class="checkbox-filter">
						<?php 
							$rqcategory = "SELECT * FROM type_product ORDER BY type_id";
							$resultcategory = mysqli_query($conn, $rqcategory) or die("Error :" . mysqli_error($conn));
							//  var_dump($resultcategory);
							while($rowcategory=mysqli_fetch_array($resultcategory)){ 
							echo "<div class='input-checkbox'>";
							echo "<input type='checkbox' id='category-1'>";
							echo "<label for='category-1'>";
							echo "<span></span>";
							echo $rowcategory['type_name'];
									// echo "<small>(120)</small>";
							echo "</label>";
							echo "</div>";
						 } ?>
						</div>
					</div>
						
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Price</h3>
						<div class="price-filter">
							<div id="price-slider"></div>
							<div class="input-number price-min">
								<input id="price-min" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
							<span>-</span>
							<div class="input-number price-max">
								<input id="price-max" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Brand</h3>
						<div class="checkbox-filter">
							<div class="input-checkbox">
								<input type="checkbox" id="brand-1">
								<label for="brand-1">
									<span></span>
									SAMSUNG
									<small>(578)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-2">
								<label for="brand-2">
									<span></span>
									LG
									<small>(125)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-3">
								<label for="brand-3">
									<span></span>
									SONY
									<small>(755)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-4">
								<label for="brand-4">
									<span></span>
									SAMSUNG
									<small>(578)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-5">
								<label for="brand-5">
									<span></span>
									LG
									<small>(125)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-6">
								<label for="brand-6">
									<span></span>
									SONY
									<small>(755)</small>
								</label>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Top selling</h3>
						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product01.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product02.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product03.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->
				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="store-sort">
							<label>
								Sort By:
								<select class="input-select">
									<option value="0">Popular</option>
									<option value="1">Position</option>
								</select>
							</label>

							<label>
								Show:
								<select class="input-select">
									<option value="0">20</option>
									<option value="1">50</option>
								</select>
							</label>
						</div>
						<ul class="store-grid">
							<li class="active"><i class="fa fa-th"></i></li>
							<li><a href="#"><i class="fa fa-th-list"></i></a></li>
						</ul>
					</div>
					<!-- /store top filter -->

					<!-- store products -->
				
					<div class="row">
						<?php

							while($row=mysqli_fetch_array($result)){
							?>
						<!-- product -->
						<div class="col-sm-4 col-xs-6">
							<div class="product">
								<div class="product-img">
									<img src="../Admin/image/<?=$row['image']?>" alt="" width="350" height="200">
									<div class="product-label">
										<span class="sale">-30%</span>
										<span class="new">NEW</span>
									</div>
								</div>
								<div class="product-body">
									<p class="product-category"><?=$row['pro_name']?></p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price"><?=number_format($row['price'])?> <del
											class="product-old-price">$990.00</del>
									</h4>
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
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
												view</span></button>
									</div>
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn"><a
											href="product.php?id=<?=$row['pro_id']?>">ເບີ່ງລາຍລະອຽດ</a><i
											class="fa fa-shopping-cart"></i>
											<input type="hidden" name="t_id" value="<?php echo $type_id; ?>">
										</button>
								</div>
							</div>
						</div>
						<!-- /product -->
						<?php } ?>

					</div>
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
			 <div class="store-filter clearfix">
						<ul class="store-pagination">
							<?php if($page > 1): ?>
								<li><a href="?id=<?= $type_id ?>&page=<?= $page-1 ?>"><i class="fa fa-angle-left"></i></a></li>
							<?php endif; ?>

							<?php 
							for($i = 1; $i <= $last_page; $i++): 
								if($i >= $page - 2 && $i <= $page + 2): // ສະແດງແຕ່ເລກໃກ້ຄຽງ
							?>
								<li class="<?= ($i == $page) ? 'active' : '' ?>">
									<a href="?id=<?= $type_id ?>&page=<?= $i ?>"><?= $i ?></a>
								</li>
							<?php 
								endif;
							endfor; 
							?>

							<?php if($page < $last_page): ?>
								<li><a href="?id=<?= $type_id ?>&page=<?= $page+1 ?>"><i class="fa fa-angle-right"></i></a></li>
							<?php endif; ?>
						</ul>
					</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Sign Up for the <strong>NEWSLETTER</strong></p>
						<form>
							<input class="input" type="email" placeholder="Enter Your Email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<?php include('footer_1.php')?>
	</footer>
	<!-- /FOOTER -->
</body>
<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</html>