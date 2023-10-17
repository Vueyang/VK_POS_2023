<!DOCTYPE html>
<html lang="en">
<?php include('connetdb.php')?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VK_POS_2023</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

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

	<head>
		<?php include('nav.php')?>
	</head>




	<div class="container">
		<div class="overflow-x-auto">
			<div class="row">
				<h3 class="title" style="padding: 0px 15px;">ປະເພດສີນຄ້າ</h3>
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
							<a href="Show_all_product.php?id<?=$row['type_id']?>" name="search_type"
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
		<!-- SECTION -->
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
	<footer id="footer">
		<!-- top footer -->
		<?php include('footer_1.php')?>
		<!-- /bottom footer -->
	</footer>

</body>
<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</html>