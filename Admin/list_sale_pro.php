<?php
$menu = "sale_pro";
?>


<?php include("header.php"); ?>
<?php


$query_product_new = " SELECT * FROM product_new ";
$rs_product = mysqli_query($conn, $query_product_new);

// $query_product = " SELECT * FROM tbl_product ORDER BY rand()" or die
// ("Error : ".mysqlierror($query_product));
// $rs_product = mysqli_query($conn, $query_product);
//echo $rs_product;


?>

<?php

$query1 = mysqli_query($conn, "SELECT COUNT(pro_id) FROM `product_new`");

$row = mysqli_fetch_row($query1);

$rows = $row[0];
$page_rows = 6; //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
$last = ceil($rows / $page_rows);
if ($last < 1) {
	$last = 1;
}
$pagenum = 1;
if (isset($_GET['pn'])) {
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) {
	$pagenum = 1;
} else if ($pagenum > $last) {
	$pagenum = $last;
}
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
$nquery = mysqli_query($conn, "SELECT * from  product_new ORDER BY pro_id DESC $limit");

$paginationCtrls = '';
if ($last != 1) {
	if ($pagenum > 1) {
		$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp; ';


		for ($i = $pagenum - 4; $i < $pagenum; $i++) {
			if ($i > 0) {
				$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
			}
		}
	}


	//$paginationCtrls .= ''.$pagenum.' &nbsp; ';


	$paginationCtrls .= '<a href=""class="btn btn-danger">' . $pagenum . '</a> &nbsp; ';




	for ($i = $pagenum + 1; $i <= $last; $i++) {
		$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
		if ($i >= $pagenum + 4) {
			break;
		}
	}


	if ($pagenum != $last) {
		$next = $pagenum + 1;


		$paginationCtrls .= ' &nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-info">Next</a> ';
	}
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<h1>ຂາຍສີນຄ້າ</h1>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	<div class="card card-gray">
		<div class="card-header ">
			<h3 class="card-title">ສີນຄ້າ IN STOCK</h3>
		</div>
		<br>
		<div class="card-body">

			<div class="col-md-12">

				<div class="row">

					<div class="col-md-7">
						<form action="list_sale_pro.php" method="GET">
							<div class="input-group">
								<input type="text" name="p_id" class="form-control" placeholder="Scan Barcode"
									autofocus>
								<span class="input-group-append">
									<button class="btn btn-outline-success" type="submit">ຄົ້ນຫາ</button>
								</span>
							</div>
						</form>
						<br>
						<?php if ($row > 0) { ?>
							<div class="row">


								<?php while ($rs_prd = mysqli_fetch_array($nquery)) { ?>

									<div class="col-md-4">

										<div class="card" style="">
											<img width="100%" src="./image/<?php echo $rs_prd['image']; ?>" class="card-img-top"
												alt="<?php echo $rs_prd['pro_name']; ?>"
												title="<?php echo $rs_prd['pro_name']; ?>" width="40px" height="160px">
											<div class="card-body">
												<center>
													<h4 class="card-text">
														<?php echo $rs_prd['pro_name']; ?>
													</h4>
													<p class="card-text text-danger h5">
														<?php echo number_format($rs_prd['price'], 0); ?> ກີບ
													</p>

												</center>
												<?php if ($rs_prd['amount'] > 0) { ?>
													<center>

														<!-- QR Code -->
														<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $rs_prd['pro_id']; ?>&choe=UTF-8"
															title="Link to my Website" />
														<!-- QR Code -->

														<br>

														<a href="list_sale_pro.php?pro_id=<?php echo $rs_prd['pro_id']; ?>&act=add"
															class="btn btn-success" target=""><i class="fa fa-shopping-cart"></i>
															ເພີ່ມລົງກະຕ່າ</a>
													</center>
												<?php } else { ?>
													<button class="btn btn-danger" disabled> ສີນຄ້າໝົດແລ້ວ !</button>
												<?php } ?>



											</div>
										</div>


									</div>
								<?php } ?>


							</div>

						<?php } else { ?>
						<?php } ?>
					</div>


					<div class="col-md-5">
						<?php include('cart_a_2.php'); ?>
					</div>

				</div>


			</div>

		</div>
		<div class="card-footer" align="end">
			<div id="pagination_controls">

				<?php echo $paginationCtrls; ?>

			</div>
		</div>
</section>
<!-- /.content -->







<?php include('footer.php'); ?>

<script>
	$(function () {
		$(".datatable").DataTable();
		// $('#example2').DataTable({
		//   "paging": true,
		//   "lengthChange": false,
		//   "searching": false,
		//   "ordering": true,
		//   "info": true,
		//   "autoWidth": false,
		// http://fordev22.com/
		// });
	});
</script>

</body>

</html>