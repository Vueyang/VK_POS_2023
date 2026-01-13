<!DOCTYPE html>
<html lang="en">
<?php 
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
include('connetdb.php');
$menu = "index";
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
<!-- <?php
// include('connetdb.php');
?> -->

<body>
	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<!-- NAV -->
		<?php include('nav.php')?>
		<!-- /NAV -->
		<!-- /container -->
	</nav>
	<!-- SECTION -->
	<?php
	$type_id = isset($_GET['t_id']) ? mysqli_real_escape_string($conn, $_GET['t_id']) : null;
	$pr_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : null;
	// $type_id = @$_POST["id"];
// $pr_id = mysqli_real_escape_string($conn, $_GET['id']);
  echo($type_id);
$sql = "SELECT * FROM product_new, type_product WHERE product_new.type_id = type_product.type_id and product_new.pro_id ='$pr_id'";
$request = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($request);
// var_dump($pr_id);
?>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<div class="product-preview">
							<img src="../Admin/image/<?=$row['image']?>" alt="">
						</div>

						<div class="product-preview">
							<img src="../Admin/image/<?=$row['image']?>" alt="">
						</div>

						<div class="product-preview">
							<img src="../Admin/image/<?=$row['image']?>" alt="">
						</div>

						<div class="product-preview">
							<img src="../Admin/image/<?=$row['image']?>" alt="">
						</div>
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						<div class="product-preview">
							<img src="./img/product01.png" alt="">
						</div>

						<div class="product-preview">
							<img src="./img/product03.png" alt="">
						</div>

						<div class="product-preview">
							<img src="./img/product06.png" alt="">
						</div>

						<div class="product-preview">
							<img src="./img/product08.png" alt="">
						</div>
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name"><?=$row['pro_name']?></h2>
						<div>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<a class="review-link" href="#">10 Review(s) | Add your review</a>
						</div>
						<div>
							<h3 class="product-price"><?=number_format($row['price'],0) ?>ກີບ<del
									class="product-old-price">$990.00</del></h3>
							<span class="product-available">In Stock</span>
						</div>
						<p><?=$row['detail']?></p>

						 <div class="product-options">
							<label>
								Size
								<select class="input-select" name="selected_size" onchange="this.form.submit()">
										<option value="0">ເລືອກເບີ</option>
										<?php 
										$sqlsize = "SELECT * FROM tbl_size ORDER BY size_id DESC";
										$resultsize = mysqli_query($conn, $sqlsize);
										
										if(mysqli_num_rows($resultsize) > 0) {
											while($row_size = mysqli_fetch_assoc($resultsize)) {
												echo '<option value="'.$row_size['size_id'].'">'.$row_size['size_name'].'</option>';
											}
										} else {
											// ຖ້າບໍ່ມີຂໍ້ມູນໃນຖານຂໍ້ມູນ, ໃຫ້ເລືອກເບີເດີມ
											echo '
											<option value="1">M</option>
											<option value="2">N</option>
											<option value="3">L</option>
											<option value="4">ML</option>
											<option value="5">XL</option>
											';
										}
										?>
									</select>
							</label> 
							<label>
								Color
								<select class="input-select" name="selected_color" onchange="this.form.submit()">
									<option value="0">ເລືອກສີ</option>
									<?php
									$sqlcolor = "SELECT * FROM tbl_color ORDER BY color_id";
									$resultcolor = mysqli_query($conn, $sqlcolor);
									if(mysqli_num_rows($resultcolor) > 0){
										while($row_color = mysqli_fetch_assoc($resultcolor)){
											echo '<option value = "'.$row_color['color_id'].'">'.$row_color['color_name']. '</option>';
										}
									}else{
										echo '<option value="1">ສີດຳ</option>
											<option value="2">ສີຂາວ</option>
											<option value="3">ສີເຫຼືອງ</option>
											<option value="4">ສີຟ້າ</option>
											<option value="5">ສີຂຽວ</option>
											<option value="6">ສີມ່ວງ</option>
											<option value="7">ສີອອນ</option>';
									}
									?>
									
								</select>
							</label>
						</div>
						<div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input type="number" id="quantity" value="1" min="1" max="<?php echo $row['amount']; ?>" name="add_qty">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<?php if($row['amount'] > 0) {?>
							<button class="add-to-cart-btn">
								<i class="fa fa-shopping-cart"></i>
								<a href="product.php?id=<?=$row['pro_id'];?>&act=add&qty=" onclick="this.href=this.href+document.getElementById('quantity').value">ເພີ່ມເຂົ້າໄປກະຕ່າ</a>
								<input type="hidden" name="t_id" value="<?php echo $type_id; ?>">
							</button>
							<?php  } else { ?>
							<button class="add-to-cart-btn" disabled>
								<i class="fa fa-shopping-cart"></i>
								ສິນຄ້າຫມົດ
							</button>
							<?php } ?>
						</div>
						<!-- <div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input type="number" id="quantity" value="1" min="0" name="add_qty">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<?php if($row['amount'] > 0) {?>
							<button class="add-to-cart-btn" >
								<i class="fa fa-shopping-cart"></i>
								<a href="product.php?id=<?=$row['pro_id'];?>&act=add">ເພີ່ມເຂົ້າໄປກະຕ່າ</a>
								<input type="hidden" name="t_id" value="<?php echo $type_id; ?>">
							</button>
							<?php } ?>
						</div> -->


						<!-- <div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input type="number" id="quantity" value="1" min="1" name="add_qty">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<?php if ($row['amount'] > 0) { ?>
								<a href="product.php?id=<?= $row['pro_id'] ?>&act=add&qty=1" class="add-to-cart-btn">
									<i class="fa fa-shopping-cart"></i>
									ເພີ່ມເຂົ້າໄປກະຕ່າ
								</a>
							<?php } else { ?>
								<button class="add-to-cart-btn" disabled>
									<i class="fa fa-shopping-cart"></i>
									ສິນຄ້າຫມົດ
								</button>
							<?php } ?>
						</div> -->
						<!-- <div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<button class="add-to-cart-btn">
							<i class="fa fa-shopping-cart"></i>
							<a href="add_to_cart.php?id=<?=$pr_id?>">ສັ່ງຊື້ເລີຍ</a>
							</button>
						</div> -->

						<ul class="product-btns">
							<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
							<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
						</ul>

						<ul class="product-links">
							<li>Category:</li>
							<li><a href="Show_all_product.php?id=<?=$row['type_id']?>"><?=$row['type_name']?></a></li>
							<li><a href="#">Accessories</a></li>
						</ul>

						<ul class="product-links">
							<li>Share:</li>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i></a></li>
						</ul>

					</div>
				</div>
				<?php
				//mysqli_close($conn)?>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							<li><a data-toggle="tab" href="#tab2">Details</a></li>
							<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
											non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
									</div>
								</div>
							</div>
							<!-- /tab1  -->

							<!-- tab2  -->
							<div id="tab2" class="tab-pane fade in">
								<div class="row">
									<div class="col-md-12">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
											non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
									</div>
								</div>
							</div>
							<!-- /tab2  -->

							<!-- tab3  -->
							<div id="tab3" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<div class="col-md-3">
										<div id="rating">
											<div class="rating-avg">
												<span>4.5</span>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<ul class="rating">
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 80%;"></div>
													</div>
													<span class="sum">3</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 60%;"></div>
													</div>
													<span class="sum">2</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div></div>
													</div>
													<span class="sum">0</span>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Rating -->

									<!-- Reviews -->
									<div class="col-md-6">
										<div id="reviews">
											<ul class="reviews">
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
															do eiusmod tempor incididunt ut labore et dolore magna
															aliqua</p>
													</div>
												</li>
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
															do eiusmod tempor incididunt ut labore et dolore magna
															aliqua</p>
													</div>
												</li>
												<li>
													<div class="review-heading">
														<h5 class="name">John</h5>
														<p class="date">27 DEC 2018, 8:0 PM</p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
															do eiusmod tempor incididunt ut labore et dolore magna
															aliqua</p>
													</div>
												</li>
											</ul>
											<ul class="reviews-pagination">
												<li class="active">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- /Reviews -->

									<!-- Review Form -->
									<div class="col-md-3">
										<div id="review-form">
											<form class="review-form">
												<input class="input" type="text" placeholder="Your Name">
												<input class="input" type="email" placeholder="Your Email">
												<textarea class="input" placeholder="Your Review"></textarea>
												<div class="input-rating">
													<span>Your Rating: </span>
													<div class="stars">
														<input id="star5" name="rating" value="5" type="radio"><label
															for="star5"></label>
														<input id="star4" name="rating" value="4" type="radio"><label
															for="star4"></label>
														<input id="star3" name="rating" value="3" type="radio"><label
															for="star3"></label>
														<input id="star2" name="rating" value="2" type="radio"><label
															for="star2"></label>
														<input id="star1" name="rating" value="1" type="radio"><label
															for="star1"></label>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>
									<!-- /Review Form -->
								</div>
							</div>
							<!-- /tab3  -->
						</div>
						<!-- /product tab content  -->
					</div>
				</div>
				<!-- /product tab -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<?php include('related_product.php')?>
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<?php include('news_letter.php')?>
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<?php include('footer_1.php')?>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<!-- <script>
    // ຄົ້ນຫາ element ທີ່ຕ້ອງການ
    const quantityInput = document.getElementById('quantity');
    const qtyUp = document.querySelector('.qty-up');
    const qtyDown = document.querySelector('.qty-down');

    // ເພີ່ມຈຳນວນເມື່ອກົດປຸ່ມ (+)
    qtyUp.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 0;
    });

    // ລົບຈຳນວນເມື່ອກົດປຸ່ມ (-)
    qtyDown.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) { // ຮັບປະກັນວ່າຈຳນວນບໍ່ຕ່ຳກວ່າ 1
            quantityInput.value = currentValue - 0;
        }
    });
</script>	 -->
<script>
// Get elements
const quantityInput = document.getElementById('quantity');
const qtyUp = document.querySelector('.qty-up');
const qtyDown = document.querySelector('.qty-down');

// Increment quantity
qtyUp.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 0;
    updateAddToCartLink(currentValue + 0);
});

// Decrement quantity
qtyDown.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 0;
        updateAddToCartLink(currentValue - 0);
    }
});

// Update the "Add to Cart" link with the new quantity
function updateAddToCartLink(quantity) {
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    if (addToCartBtn) {
        const productId = <?= $row['pro_id'] ?>;
        addToCartBtn.href = `product.php?id=${productId}&act=add&qty=${quantity}`;
    }
}
</script>
</body>

</html>