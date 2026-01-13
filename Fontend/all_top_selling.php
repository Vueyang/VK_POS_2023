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

<body>
	<div class="container">
    <?php 
        $query = "SELECT p.pro_name, p.pro_id, p.price, p.image, t.type_name, SUM(o.total) AS total_sales 
                  FROM tbl_order_detail as o 
                  INNER JOIN product_new as p ON p.pro_id = o.pro_id
                  INNER JOIN type_product as t ON t.type_id = p.type_id
                  INNER JOIN tbl_order_receive as ord ON ord.order_id = o.order_id
                  WHERE ord.order_status = 4 
                  GROUP BY o.pro_id 
                  ORDER BY total_sales DESC 
                  LIMIT 5"; // ເພີ່ມ Limit ເປັນ 9 ເພື່ອໃຫ້ໄດ້ 3 Slide (Slide ລະ 3 ແຖວ)
        $rsp_khaidy = mysqli_query($conn, $query) or die("Error : " . mysqli_error($conn));
        $total_rows = mysqli_num_rows($rsp_khaidy);
    ?>

    <div class="row">
        <div class="col-md-4 col-xs-6">
            <div class="section-title">
                <h4 class="title">ສີນຄ້າທີຂາຍດີ</h4>
                <div class="section-nav"><div id="slick-nav-4" class="products-slick-nav"></div></div>
            </div>
            <div class="products-widget-slick" data-nav="#slick-nav-4">
                <?php 
                    $i = 0;
                    while($rw = mysqli_fetch_array($rsp_khaidy)) {
                        if ($i % 3 == 0) echo '<div>'; ?>
                        <div class="product-widget">
                            <div class="product-img"><img src="../Admin/image/<?=$rw['image']?>"></div>
                            <div class="product-body">
                                <p class="product-category"><?=$rw['type_name']?></p>
                                <h3 class="product-name"><?=$rw['pro_name']?></h3>
                                <h4 class="product-price"><?=number_format($rw['price'])?> ກີບ</h4>
                            </div>
                        </div>
                <?php $i++; if ($i % 3 == 0 || $i == $total_rows) echo '</div>'; } ?>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="section-title">
                <h4 class="title">ສີນຄ້າທີຂາຍດີ</h4>
                <div class="section-nav"><div id="slick-nav-5" class="products-slick-nav"></div></div>
            </div>
            <div class="products-widget-slick" data-nav="#slick-nav-5">
                <?php 
                    mysqli_data_seek($rsp_khaidy, 0); // *** ສັ່ງ Reset ຂໍ້ມູນໃຫ້ກັບໄປເລີ່ມຕົ້ນໃໝ່ ***
                    $i = 0;
                    while($rw2 = mysqli_fetch_array($rsp_khaidy)) {
                        if ($i % 3 == 0) echo '<div>'; ?>
                        <div class="product-widget">
                            <div class="product-img"><img src="../Admin/image/<?=$rw2['image']?>"></div>
                            <div class="product-body">
                                <p class="product-category"><?=$rw2['type_name']?></p>
                                <h3 class="product-name"><?=$rw2['pro_name']?></h3>
                                <h4 class="product-price"><?=number_format($rw2['price'])?> ກີບ</h4>
                            </div>
                        </div>
                <?php $i++; if ($i % 3 == 0 || $i == $total_rows) echo '</div>'; } ?>
            </div>
        </div>

        <!-- <div class="clearfix visible-sm visible-xs"></div> -->

        <div class="col-md-4 col-xs-6">
            <div class="section-title">
                <h4 class="title">ສີນຄ້າທີຂາຍດີ</h4>
                <div class="section-nav"><div id="slick-nav-6" class="products-slick-nav"></div></div>
            </div>
            <div class="products-widget-slick" data-nav="#slick-nav-6">
                <?php 
                    mysqli_data_seek($rsp_khaidy, 0); // *** ສັ່ງ Reset ຂໍ້ມູນໃຫ້ກັບໄປເລີ່ມຕົ້ນໃໝ່ອີກຄັ້ງ ***
                    $i = 0;
                    while($rw3 = mysqli_fetch_array($rsp_khaidy)) {
                        if ($i % 3 == 0) echo '<div>'; ?>
                        <div class="product-widget">
                            <div class="product-img"><img src="../Admin/image/<?=$rw3['image']?>"></div>
                            <div class="product-body">
                                <p class="product-category"><?=$rw3['type_name']?></p>
                                <h3 class="product-name"><?=$rw3['pro_name']?></h3>
                                <h4 class="product-price"><?=number_format($rw3['price'])?> ກີບ</h4>
                            </div>
                        </div>
                <?php $i++; if ($i % 3 == 0 || $i == $total_rows) echo '</div>'; } ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>