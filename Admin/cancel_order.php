<?php $menu = "list_sale_approved" ?>;
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
	<section class="content-header">
		<div class="container-fluid">
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="card card-gray">
			<div class="card-header ">
				<div align="start">
					<h4>ລາຍການລູກຄ້າສັ່ງຊື້</h4>
				</div>
			</div>
			<br>
			<div class="card-body">
				<a href="list_sale_approved.php"><button type="button"
						class="btn btn-outline-warning">ລໍຖ້າການຢືນຢັນ</button></a>
				<a href="pay_order_subccess.php"><button type="button"
						class="btn btn-outline-success">ຢືນຢັນສຳເລັດແລ້ວ</button></a>
				<a href="cancel_order.php"><button type="button" class="btn btn-outline-danger">ຍົກເລີກແລ້ວ</button></a>
				<div class="row">
					<div class="col mt-4">
						<?php

						$query_my_order = "SELECT o.* ,o.member_name
FROM tbl_order as o WHERE o.order_status=0 ";
						$rs_my_order = mysqli_query($conn, $query_my_order);
						//echo ($query_my_order);//test query
						?>

						<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
							<thead>

								<tr>
									<th>ລະຫັດການສັ່ງຊື້</th>
									<th>ຊື່ລູກຄ້າ</th>
									<th>ເບີໂທລະສັບ</th>
									<th>ສະຖານະ</th>
									<th>ວັນທີເດືອນປີສັ່ງຊື້</th>
									<th>ວັນທີເດືອນປີຍົກເລີກການສັ່ງຊື້</th>
									<th>review</th>
								</tr>

							</thead>
							<tfoot>
								<tr>
									<th>code</th>
									<th>name</th>
									<th>phone</th>
									<th>status</th>
									<th>date</th>
									<th>confirm_date</th>
									<th>review</th>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($rs_my_order as $rs) { ?>
									<tr>
										<td>
											<?= $rs['order_id'] ?>
										</td>
										<td>
											<?= $rs['member_name'] ?>
										</td>
										<td>
											<?= $rs['member_phone'] ?>
										</td>
										<td>
											<?php $st = $rs['order_status'];
											$count = $rs['order_status'];
											if ($count == 0) {
												include('mystatus.php');
											}
											?>
										</td>
										<td>
											<?= date('d/m/Y H:i:s:m', strtotime($rs['order_date'])) ?>
										</td>
										<td>
											<?= date('d/m/Y H:i:s:m', strtotime($rs['confirm_date'])) ?>
										</td>
										<td>
											<a href="review_detail_cancelOk.php?order_id=<?php echo $rs['order_id']; ?>"
												target="_blank" class="btn btn-success btn-xs"><i
													class="nav-icon fas fa-clipboard-list"></i> ເບີ່ງລາຍການ</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card-footer">

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