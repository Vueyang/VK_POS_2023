<?php
include("connetdb.php");
$menu = "product_stock";
?>
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

<body>

	<!-- Main content -->
	<br>
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">

				<h3 class="card-title " style="font-size: 2rem;">ລາຍການສີນຄ້າທີຍັງເຫຼືອໜ້ອຍກວ່າ 10 ອັນ</h3>
			</div>
			<br>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<?php

						$nquery = "SELECT * from  product_new p, type_product t WHERE p.type_id = t.type_id and amount < 10 GROUP BY p.pro_id ";

						$rs_my_order = mysqli_query($conn, $nquery);
						//echo ($query_my_order);//test query
						?>

						<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດ</th>
									<th>ຊື່ສີນຄ້າ</th>
									<th>ປະເພດສີນຄ້າ</th>
									<th>ລາຄາ</th>
									<th>ຈຳນວນ</th>
									<th>ຮູບ</th>
									<th>review</th>

								</tr>

							</thead>

							<tbody>
								<?php foreach ($rs_my_order as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>
										<td>
											<?= $rs['pro_id'] ?>
										</td>
										<td>
											<?= $rs['pro_name'] ?>
										</td>
										<td>
											<?= $rs['type_name'] ?>
										</td>
										<td>
											<?= $rs['price'] ?>
										</td>
										<td>
											<?= $rs['amount']; ?>
										</td>
										<td><img src="./image/<?= $rs["image"] ?>" width="100px" height="80px"> </td>
										<td>
											<button type="button" class="btn btn-primary" data-bs-toggle="modal"
												data-bs-target="#Modalstock<?= $rs['pro_id'] ?>"
												data-bs-whatever="@mdo">ເພີ່ມສະຕ໋ອນສີນຄ້າ</button>
										</td>
									</tr>
									<div class="modal fade" id="Modalstock<?= $rs['pro_id'] ?>" tabindex="-1"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">ຟອນເພີ່ມສະຕ໋ອນສີນຄ້າ
													</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form name="frm-stock" method="POST" action="add_stock_pro.php">
														<label for="text">ລະຫັດສີນຄ້າ:</label>
														<input type="text" name="pro_id" class="form-control"
															value="<?= $rs['pro_id'] ?>" readonly required
															placeholder="ລະຫັດສີນຄ້າ">
														<br>
														<label for="text">ຊື່ສີນຄ້າ:</label>
														<input type="text" name="pro_name" class="form-control"
															value="<?= $rs['pro_name'] ?>" readonly required
															placeholder="ຊື່ສີນຄ້າ">
														<br>
														<label for="text">ຈຳນວນ:</label>
														<input type="number" name="p_amount" class="form-control"
															value="<?= $rs['amount'] ?>" required placeholder="ຈຳນວນ">
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary"
																data-bs-dismiss="modal">ຍົກເລີກ</button>
															<button type="submit"
																class="btn btn-primary grid d-flex hstack gap-2"><i
																	class="fa fa-save"></i>ບັນທືກ</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<?php
								}
								mysqli_close($conn)
									?>
							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>

	</section>



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
		});	</script>

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