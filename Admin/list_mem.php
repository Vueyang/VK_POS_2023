<?php
$menu = "member";
include('connetdb.php')
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

<body>

	<!-- Main content -->
	<br>
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນສະມາຊິກ</h3>
				<div align="right">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalstock"
						data-bs-whatever="@mdo"><i class="fa fa-plus"></i>ເພີ່ມສະມາຊິກ</button>
				</div>
			</div>
			<br>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<?php

						$nquery = "SELECT * FROM  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY mem_id ";

						$rs_my_order = mysqli_query($conn, $nquery);
						$row = mysqli_fetch_array($rs_my_order);
						//echo ($query_my_order);//test query
						?>

						<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ຊື່</th>
									<th>ຊື່ຜູ້ໃຊ້</th>
									<th>ໜຳແໜ່ງ</th>
									<th align="center">review</th>

								</tr>

							</thead>

							<tbody>
								<?php foreach ($rs_my_order as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>

										<td>
											<?= $rs['en_name'] ?>
										</td>

										<td>
											<?= $rs['mem_username']; ?>
										</td>
										<td>
											<?= $rs['position']; ?>
										</td>

										<td>
											<div class="grid d-flex hstack gap-3 justify-content-center"
												style="--bs-columns: 4; --bs-gap: 5rem;">
												<div>
													<input type="hidden" name="mem_id" value="<?php echo $rs['mem_id']; ?>">
													<input type="hidden" name="ref_l_id"
														value="<?php echo $rs['ref_l_id']; ?>">
													<button type="button" class="btn btn-warning" data-bs-toggle="modal"
														data-bs-target="#myModal">
														<i class="fas fa-pencil-alt"></i>ແກ້ໄຂ
													</button>
												</div>
												<div>
													<a href="delete_member.php?id=<?= $rs['mem_id']; ?> &&member=del"
														class="del-btn btn btn-danger grid d-flex hstack gap-2"
														onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
															class="fas fas fa-trash"></i>
														ລືບ</a>
												</div>
											</div>

										</td>
										<!-- The Modal -->
										<div class="modal fade" id="myModal">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h1 class="modal-title fs-3 " id="exampleModalLabel">
															ຟອນແກ້ໄຂສະມາຊີກ
														</h1>
														<button type="button" class="btn-close"
															data-bs-dismiss="modal"></button>
													</div>
													<!-- Modal body -->
													<div class="modal-body">
														<form action="insert_member.php" method="POST"
															enctype="multipart/form-data">
															<label for="" class="col-sm-2 col-form-label">ຊື່ພະນັກງານ
															</label>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input type="text" name="en_name" class="form-control"
																		placeholder="" value="<?= $rs['en_name'] ?>">
																</div>
															</div>
															<label for="" class="col-sm-2 col-form-label">ຕຳແໜ່ງ</label>
															<div class="form-group row">
																<div class="col-sm-12">
																	<select name="ref_l_id" id="ref_l_id"
																		class="form-control" required>
																		<option value="selected">---ເລືອກຕຳແໜ່ງ---
																		</option>
																		<option value="1">ຜູ້ຈັດການ(Admin)</option>
																		<option value="2">HR</option>
																		<option value="3">ພະນັກງານບັນຊີ</option>
																		<option value="4">ພະນັກງານຈັດຊື້</option>
																		<option value="5">ພະນັກງານສາງ</option>
																		<option value="6">ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																		<option value="7">ພະນັກງານຂາຢືນຢັນລູກຄ້າ
																		</option>
																	</select>
																</div>
															</div>
															<label for=""
																class="col-sm-4 col-form-label">ຊື່ຜູ້ໃຊ້ລະບົບ</label>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input type="text" name="mem_username"
																		class="form-control" id="mem_username"
																		placeholder="ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້ລະບົບ" value=""
																		required>
																</div>
															</div>
															<label for="" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ
															</label>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input type="text" name="mem_password"
																		class="form-control" id="mem_password"
																		placeholder="ກະລຸນາໃສ່ລະຫັດຜ່ານ" value="" required>
																</div>
															</div>

														</form>
													</div>

													<!-- Modal footer -->
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-bs-dismiss="modal"
															aria-label="Close">ຍົກເລີກ</button>
														<button type="submit" class="btn btn-primary"><i
																class="fa fa-save"></i>ບັນທືກ</button>
													</div>
												</div>
											</div>
										</div>
									</tr>
									<div class="modal fade" id="Modalstock" tabindex="-1"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-3 " id="exampleModalLabel">
														ຟອນເພີ່ມສະມາຊີກ
													</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form action="insert_member.php" method="POST"
														enctype="multipart/form-data">
														<label for="" class="col-sm-2 col-form-label">ຊື່ພະນັກງານ </label>
														<div class="form-group row">
															<div class="col-sm-12">
																<?php
																$request = "SELECT * FROM tbl_employee";
																$result = mysqli_query($conn, $request);

																?>
																<select name="en_id" id="en_id" class="form-control"
																	required>
																	<option value="selected">---ເລືອກພະນັກງານ---</option>
																	<?php
																	while ($row = mysqli_fetch_array($result)) { ?>
																		<option value="<?= $row['en_id'] ?>">
																			<?= $row['en_name'] ?>
																		</option>
																	<?php } ?>;
																</select>
															</div>
														</div>
														<label for="" class="col-sm-2 col-form-label">ຕຳແໜ່ງ</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<select name="ref_l_id" id="ref_l_id" class="form-control"
																	required>
																	<option value="selected">---ເລືອກຕຳແໜ່ງ---</option>
																	<option value="1">ຜູ້ຈັດການ(Admin)</option>
																	<option value="2">HR</option>
																	<option value="3">ພະນັກງານບັນຊີ</option>
																	<option value="4">ພະນັກງານຈັດຊື້</option>
																	<option value="5">ພະນັກງານສາງ</option>
																	<option value="6">ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																	<option value="7">ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>
																</select>
															</div>
														</div>
														<label for="" class="col-sm-4 col-form-label">ຊື່ຜູ້ໃຊ້ລະບົບ</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="mem_username" class="form-control"
																	id="mem_username" placeholder="ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້ລະບົບ"
																	value="" required>
															</div>
														</div>
														<label for="" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ </label>
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="mem_password" class="form-control"
																	id="mem_password" placeholder="ກະລຸນາໃສ່ລະຫັດຜ່ານ"
																	value="" required>
															</div>
														</div>

														<div class="button mb-4 d-flex justify-content-between ">
															<button type="button" class="btn btn-danger"
																data-bs-dismiss="modal" aria-label="Close">ຍົກເລີກ</button>
															<button type="submit" class="btn btn-primary"><i
																	class="fa fa-save"></i>ບັນທືກ</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>


									<?php
									mysqli_close($conn);
								} ?>
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