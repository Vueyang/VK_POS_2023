<!DOCTYPE html>
<html lang="en">
<?php include('connetdb.php');
$menu="product_type";
?>

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

<?php
// 1. ກຳນົດຈຳນວນຂໍ້ມູນທີ່ຈະສະແດງຕໍ່ 1 ໜ້າ
$perPage = 6; 

// 2. ກວດສອບວ່າຢູ່ໜ້າໃດ (ຖ້າບໍ່ມີໃຫ້ເປັນໜ້າ 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// 3. ນັບຈຳນວນຂໍ້ມູນທັງໝົດທີ່ມີໃນ Database
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM type_product");
$totalRow = mysqli_fetch_assoc($totalQuery);
$totalRecords = $totalRow['total'];

// 4. ຄິດໄລ່ຈຳນວນໜ້າທັງໝົດ
$totalPages = ceil($totalRecords / $perPage);

// 5. Query ດຶງຂໍ້ມູນແບບຈຳກັດ (LIMIT)
$sql = "SELECT * FROM type_product ORDER BY type_id LIMIT {$start}, {$perPage}";
$result = mysqli_query($conn, $sql);
?>


	<div class="container">
		<div class="overflow-x-auto main-nav nav navbar-nav">
			<div class="row">
				<h3 class="title" style="padding: 0px 15px;">ປະເພດສີນຄ້າ</h3>
				<!-- product -->
				<?php
				// $sql = "SELECT * FROM type_product ORDER BY type_id	";
				// $result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-sm-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="../Admin/image/<?=$row['type_img']?>" alt="" width="350" height="200">
                        </div>
                        <div class="shop-body">
                            <h3><?=$row['type_name']?></h3>
                            <a href="Show_all_product.php?id=<?=$row['type_id']?>" class="cta-btn">
                                Shop now <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                } 
            } else {
                echo "<p class='text-center'>ບໍ່ມີຂໍ້ມູນສິນຄ້າ</p>";
            }
            ?>
				<!-- /product -->
			</div>
		</div>
		<!-- SECTION -->
	</div>
	<div class="container">
		<div class="store-filter clearfix">
			<ul class="store-pagination">
				<?php if($page > 1): ?>
					<li><a href="?page=<?=$page-1?>"><i class="fa fa-angle-left"></i></a></li>
				<?php endif; ?>

				<?php for($i = 1; $i <= $totalPages; $i++): ?>
					<li class="<?= ($i == $page) ? 'active' : '' ?>">
						<a href="?page=<?=$i?>"><?=$i?></a>
					</li>
				<?php endfor; ?>

				<?php if($page < $totalPages): ?>
					<li><a href="?page=<?=$page+1?>"><i class="fa fa-angle-right"></i></a></li>
				<?php endif; ?>
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