<?php $menu = "Report_sale_approved" ?>;
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

	<!-- Main content -->
	<section class="content">
		<div class="card card-gray">
			<div class="card-header ">
				<div align="start">
					<h4>ລາຍງານຢືນຢັນການສັ່ງຊື້</h4>
				</div>
			</div>
			<br>
			<div class="card-body">
				<a href="list_sale_approved.php"><button type="button"
						class="btn btn-outline-warning">ລໍຖ້າການຢືນຢັນ</button></a>
				<a href="pay_order_subccess.php"><button type="button"
						class="btn btn-outline-success">ຢືນຢັນສຳເລັດແລ້ວ</button></a>
				<a href="cancel_order.php"><button type="button" class="btn btn-outline-danger">ຍົກເລີກແລ້ວ</button></a>
				<br>
				<form name="frm" method="POST" action="list_sale_approved.php">
					<div class="row mt-4">
						<div class="col-sm-2">
							<input type="date" name="dt1" class="form-control">
						</div>
						<div class="col-sm-2">
							<input type="date" name="dt2" class="form-control">
						</div>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-primary"><i class="fas fa-search p-1"></i></button>
						</div>
					</div>
				</form>
				<form name="form" method="POST" action="?t_id=<?php echo $t_id; ?>&b_id=<?php echo $b_id; ?>">
					<div class="row">
						<div class="col">
							<?php
							$dt1 = @$_POST['dt1'];
							$dt2 = @$_POST['dt2'];
							$date_to_date = date('Y/m/d', strtotime($dt2 . "+1 days")); //ຈາກ query ເອົາຂໍ້ມູນຈາກວັນທີ່ທີ່ເຮົາເລືອກຈາກເລີ່ມຕົ້ນຖືວັນທີ່ເຮົາຕ້ອງການມາສະແດງ
							if (($dt1 != "") & ($dt2 != "")) {
								echo "ຄົ້ນຫາຈາກວັນທີ $dt1 ຫາ $dt2 ";
								$query_my_order = "SELECT o.* ,o.member_name
FROM tbl_order as o WHERE o.order_status=1 and order_date BETWEEN '$dt1' and '$date_to_date' ORDER BY order_date DESC";
							} else {
								$query_my_order = "SELECT o.* ,o.member_name
FROM tbl_order as o WHERE o.order_status=1 ORDER BY order_date DESC";
							}

							$rs_my_order = mysqli_query($conn, $query_my_order);
							//echo ($query_my_order);//test query
							?>
					
							<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
								<thead>

									<tr>
										<th>ລຳດັບ</th>
										<th>ລະຫັດການສັ່ງຊື້</th>
										<th>ຊື່ລູກຄ້າ</th>
										<th>ລວມເປັນເງີນ</th>
										<th>ເບີໂທລະສັບ</th>
										<th>ສະຖານະ</th>
										<th>ວັນທີເດືອນປີສັ່ງຊື້</th>
										<th>Review</th>
									</tr>

								</thead>

								<tbody>
									<?php foreach ($rs_my_order as $rs) { ?>
										<tr>
											<td>
												<?= $l += 1 ?>
											</td>
											<td>
												<?= $rs['order_id'] ?>
											</td>
											<td>
												<?= $rs['member_name'] ?>
											</td>
											<td>
												<?= number_format($rs['pay_amount']) ?>
											</td>
											<td>
												<?= $rs['member_phone'] ?>
											</td>
											<td>
												<?php $st = $rs['order_status'];
												$count = $rs['order_status'];
												if ($count == 1) {
													include('mystatus.php');
												}
												?>
											</td>
											<td>
												<?php echo date('d/m/Y H:i:s:m', strtotime($rs['order_date'])); ?>
											</td>
											<td>
												<button
													class="btn btn-primary grid d-flex hstack gap-3 justify-content-center"
													type="button"
													onclick="window.location='review_detail.php?order_id=<?= $rs['order_id'] ?>';"><i
														class="nav-icon fas fa-clipboard-list"></i>ເບີ່ງລາຍການ</button>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
			<div class=" card-footer">

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="./css_js/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/datatables-simple-demo.js"></script>

</html>