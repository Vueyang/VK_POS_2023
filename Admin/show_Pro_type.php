<?php
include("connetdb.php");
$menu = "pro_type"
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
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
	.button {
		display: flex;
		justify-content: space-between;
	}

	.fa {
		padding: 5px;
	}

	.text {
		text-align: center;
		align-items: center;
		justify-content: center;
		padding: 10px;
	}
</style>

<body>

	<!-- Main content -->
	<br>
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນປະເພດສີນຄ້າ</h3>
				<div align="right">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalstock"
						data-bs-whatever="@mdo"><i class="fa fa-plus"></i>ເພີ່ມປະເພດສີນຄ້າໄໝ່</button>
				</div>

			</div>
			<br>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<?php

						$nquery = "SELECT * from type_product GROUP BY type_id ";

						$rs_my_order = mysqli_query($conn, $nquery);
						//echo ($query_my_order);//test query
						?>

						<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດປະເພດ</th>
									<th>ຊື່ປະເພດສີນຄ້າ</th>
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
											<?= $rs['type_id'] ?>
										</td>
										<td>
											<?= $rs['type_name'] ?>
										</td>
										<td><img src="./image/<?= $rs["type_img"] ?>" width="100px" height="80px"> </td>
										<td>
											<div class="grid d-flex hstack gap-3 justify-content-center">
												<div>
													<button type="button" class="btn btn-warning" data-bs-toggle="modal"
														data-bs-target="#Modal<?= $rs['type_id'] ?>">
														<i class="fas fa-pencil-alt"></i>ແກ້ໄຂ
													</button>
												</div>
												<div>
													<a class="btn btn-danger grid d-flex hstack gap-2"
														href="delete_pro_type.php?id=<?= $rs['type_id']; ?> &&product_type_del=del"
														onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
															class="fas fas fa-trash"></i>ລຶບ</a>
												</div>
											</div>

										</td>
									</tr>
									<div class="modal fade" id="Modal<?= $rs["type_id"] ?>" tabindex="-1"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<h1 class="modal-title fs-3 text " id="exampleModalLabel">
													ໜ້າແກ້ໄຂຂໍ້ມູນປະເພດສີນຄ້າ
												</h1>
												<div class="modal-header">
													<div class="modal-body">
														<form name="form1" method="post" action="update_pro_type.php"
															enctype="multipart/form-data">
															<label for="text" style="padding:10px 0px;">
																ລະຫັດປະເພດສີນຄ້າ*:</label>
															<input type="text" name="type_id" class="form-control"
																placeholder="ຊື່ປະເພດສີນຄ້າ" value="<?= $rs['type_id'] ?>"
																readonly required>
															<br>
															<label for="text" style="padding:10px 0px;">
																ຊື່ປະເພດສີນຄ້າ*:</label>
															<input type="text" name="type" class="form-control"
																placeholder="ຊື່ປະເພດສີນຄ້າ" value="<?= $rs['type_name'] ?>"
																required>
															<br>
															<label for="text" style="padding:10px 0px;"> ຮູບສີນຄ້າ*:</label>
															<div class="col-sm-10">
																<img id="blah" src="./image/<?= $rs['type_img'] ?>"
																	alt="your image" width="200" />
																<div class="custom-file mb-4 mt-4">
																	<input type="file" name="type_img"
																		onchange="readURL(this);" required>
																	<input type="hidden" name="textimg" class="form-control"
																		value="<?= $rs['image'] ?>">
																	<br>
																</div>
															</div>
															<div class="button mb-4 mt-4">
																<a class="btn btn-danger" href="show_Pro_type.php"
																	role="button">ຍົກເລີກ</a>
																<button type="submit" class="btn btn-primary"><i
																		class="fa fa-save"></i>ບັນທືກ</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<?php include("frm_add_product_type.php") ?>
				</div>
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