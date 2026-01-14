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
	 <div class="section">
		<div class="container ">
			<!-- row -->
			 <div class="col-md-12">
				<div class="overflow-x-auto">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<h3 class="title" style="padding: 0px 15px;">ປະເພດສີນຄ້າ</h3>
								<div class="products-slick" data-nav="#slick-nav-1">
									<!-- product -->
									<?php
    									// ຮັບຄ່າຈາກ URL ແລະ ປ້ອງກັນ SQL Injection
										$type_id = isset($_GET['type_id']) ? mysqli_real_escape_string($conn, $_GET['type_id']) : '';

										if($type_id != ''){
											// ໃຊ້ WHERE ເພື່ອຄົ້ນຫາຂໍ້ມູນທີ່ກົງກັບ ID ຫຼື ຊື່
											$sql = "SELECT * FROM type_product 
													WHERE type_id LIKE '%$type_id%' 
													OR type_name LIKE '%$type_id%' 
													ORDER BY type_id ASC";
										} else {
											// ຖ້າບໍ່ມີການຄົ້ນຫາ ໃຫ້ສະແດງທັງໝົດ
											$sql = "SELECT * FROM type_product ORDER BY type_id ASC";
										}

										$result = mysqli_query($conn, $sql);
										while($row = mysqli_fetch_array($result)){
									?>
									<div class="col-sm-4 col-xs-6 ">
										<div class="shop">
											<div class="shop-img">
												<img src="../Admin/image/<?=$row['type_img']?>" alt="" width="350" height="200">
											</div>
											<div class="shop-body">
												<h3><?=$row['type_name']?></h3>
												<a href="Show_all_product.php?id=<?=$row['type_id']?>" name="search_type"
													class="cta-btn">ເບິ່ງລາຍລະອຽດ
													<i class="fa fa-arrow-circle-right"></i></a>
											</div>
										</div>
									</div>
									<?php } ?>
									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
						<!-- shop -->
						<!-- /shop -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
	</div>
	<!-- /container -->
	<!-- /SECTION -->

	<!-- SECTION -->
	<?php
		// ຮັບຄ່າແຍກກັນ
		// ຮັບຄ່າແຍກກັນຢ່າງເດັດຂາດ
		$type_new = isset($_GET['type_new']) ? mysqli_real_escape_string($conn, $_GET['type_new']) : '';
		$type_hot = isset($_GET['type_hot']) ? mysqli_real_escape_string($conn, $_GET['type_hot']) : '';
		// 1. ຮັບຄ່າ ແລະ ປ້ອງກັນ SQL Injection
		$search_text = isset($_GET['search_text']) ? mysqli_real_escape_string($conn, $_GET['search_text']) : '';

		// 2. ສ້າງ Array ເພື່ອເກັບເງື່ອນໄຂ WHERE
		$conditions = array();

		// ຖ້າມີການເລືອກປະເພດສີນຄ້າ
		if ($type_new != "") {
			$conditions[] = "p.type_id = '$type_new'";
		}

		// ຖ້າມີການພິມຄົ້ນຫາ (ຄົ້ນຫາຈາກ ID ຫຼື ຊື່ສີນຄ້າ)
		if ($search_text != "") {
			$conditions[] = "(p.pro_id LIKE '%$search_text%' OR p.pro_name LIKE '%$search_text%')";
		}

		// 3. ລວມເງື່ອນໄຂເຂົ້າກັນ
		$where_sql = "";
		if (count($conditions) > 0) {
			// ໃຊ້ AND ເພື່ອໃຫ້ມັນກັ່ນຕອງທັງສອງຢ່າງພ້ອມກັນ (ຖ້າມີທັງສອງ)
			$where_sql = " WHERE " . implode(" AND ", $conditions);
		}

		// 4. ສ້າງ SQL Query
		$sql_new = "SELECT p.*, t.type_name 
					FROM product_new AS p
					INNER JOIN type_product AS t ON p.type_id = t.type_id
					$where_sql
					ORDER BY p.pro_id DESC";

		$result_new = mysqli_query($conn, $sql_new);

		// ກວດສອບ Error ຂອງ SQL (ສຳລັບນັກພັດທະນາ)
		if (!$result_new) {
			die("Error: " . mysqli_error($conn));
		}

	?>
	<div class="section">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">ສີນຄ້າມາໃໝ່</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="<?= ($type_new == '') ? 'active' : '' ?>">
									<a href="index.php?type_new=&type_hot=<?= $type_hot ?>">ທັງໝົດ</a>
								</li>

								<?php
								$sql_type = "SELECT * FROM type_product ORDER BY type_id ASC LIMIT 6";
								$res_type = mysqli_query($conn, $sql_type);
								while($row_t = mysqli_fetch_array($res_type)){
								?>
									<li class="<?= ($type_new == $row_t['type_id']) ? 'active' : '' ?>">
										<a href="index.php?type_new=<?= $row_t['type_id'] ?>&type_hot=<?= $type_hot ?>">
											<?= $row_t['type_name'] ?>
										</a>
									</li>
								<?php } ?>
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
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										
										<?php 
										if(mysqli_num_rows($result_new) > 0) {
										while($row=mysqli_fetch_array($result_new)){
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
														<p class="product-category"><?=$row['type_name']?></p>
														<h3 class="product-name"><a href="product.php?id=<?=$row['pro_id']?>"><?=$row['pro_name']?>
															</a></h3>
														<h4 class="product-price"><?=number_format($row['price'])?>
															<!-- <del class="product-old-price">$990.00</del> -->
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
											} else {
												echo "<p style='padding:20px; text-align:center;'>ບໍ່ມີສີນຄ້າໃນປະເພດນີ້</p>";
											}
											//mysqli_close($conn);
											?>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
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
<?php 
// SQL ສຳລັບສີນຄ້າຂາຍດີ
	$filter_hot = "";
	if ($type_hot != "") {
		$filter_hot = " AND t.type_id = '$type_hot' ";
	}
	$qry_khaidy = "SELECT p.pro_name, p.pro_id, p.price, p.image, t.type_name, SUM(o.total) AS total_sales 
				FROM tbl_order_detail as o 
				INNER JOIN product_new as p ON p.pro_id = o.pro_id
				INNER JOIN type_product as t ON t.type_id = p.type_id
				INNER JOIN tbl_order_receive as ord ON ord.order_id = o.order_id
				WHERE ord.order_status = 4 $filter_hot 
				GROUP BY p.pro_id 
				ORDER BY total_sales DESC 
				LIMIT 5";
	$rsp_khaidy = mysqli_query($conn, $qry_khaidy);
?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">ສີນຄ້າທີ່ຂາຍດີ</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
							<li class="<?= ($type_hot == '') ? 'active' : '' ?>">
								<a href="index.php?type_hot=&type_new=<?= $type_new ?>">ທັງໝົດ</a>
							</li>
							<?php
							$sql_type2 = "SELECT DISTINCT t.type_id, t.type_name 
										FROM type_product t
										INNER JOIN product_new p ON t.type_id = p.type_id
										INNER JOIN tbl_order_detail od ON p.pro_id = od.pro_id
										INNER JOIN tbl_order_receive ord ON od.order_id = ord.order_id
										WHERE ord.order_status = 4 
										ORDER BY t.type_id ASC LIMIT 5";
							$res_type2 = mysqli_query($conn, $sql_type2);
							while($row_t2 = mysqli_fetch_array($res_type2)){
							?>
								<li class="<?= ($type_hot == $row_t2['type_id']) ? 'active' : '' ?>">
									<a href="index.php?type_hot=<?= $row_t2['type_id'] ?>&type_new=<?= $type_new ?>">
										<?= $row_t2['type_name'] ?>
									</a>
								</li>
							<?php } ?>
						</ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-3">
                                <?php 
                                if(mysqli_num_rows($rsp_khaidy) > 0) {
                                    while($row_khaidy = mysqli_fetch_array($rsp_khaidy)){
                                ?>
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="../Admin/image/<?= $row_khaidy['image'];?>" alt="" style="height:200px; object-fit:cover;">
                                            <div class="product-label">
                                                <span class="sale">HOT</span>
                                                <span class="new">BEST SELLER</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $row_khaidy['type_name'];?></p>
                                            <h3 class="product-name">
                                                <a href="product.php?id=<?=$row_khaidy['pro_id']?>"><?= $row_khaidy['pro_name'];?></a>
                                            </h3>
                                            <h4 class="product-price"><?=number_format($row_khaidy['price']) ?> ກີບ</h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="product.php?id=<?=$row_khaidy['pro_id']?>" class="add-to-cart-btn" style="display:block; line-height:40px; text-align:center;">
                                                <i class="fa fa-shopping-cart"></i> ເບິ່ງລາຍລະອຽດ
                                            </a>
                                        </div>
                                    </div>
                                <?php 
                                    }
                                } else {
                                    echo "<div class='text-center' style='width:100%; padding:50px;'><h4>ຍັງບໍ່ມີຂໍ້ມູນການຂາຍໃນໝວດນີ້</h4></div>";
                                } 
                                ?>
                            </div>
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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