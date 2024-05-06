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

						//$nquery = "SELECT * FROM  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY mem_id ";
						//$nquery = mysqli_query("SELECT COUNT(mem_id) FROM `tbl_member`");
						//$rs_my_order = mysqli_query($conn, $nquery);
						//$row = mysqli_fetch_row($nquery);
						//echo ($query_my_order);//test query
						$nquery = mysqli_query($conn, "SELECT COUNT(mem_id) FROM `tbl_member`");

							$row = mysqli_fetch_row($nquery);
							$rows = $row[0];
							$page_rows = 6; //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
							$last = ceil($rows / $page_rows);
							//print_r($last);
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
							if(isset($_GET['search'])){
								$search = $_GET['search'];
								//print_r($search);
								$nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id AND en.en_name LIKE '%$search%' OR m.mem_username LIKE '%$search%' GROUP BY mem_id DESC $limit ");
								//echo $nquery;
							}else{
								//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY mem_id DESC $limit");
								//echo $nquery_1;
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
									//echo $paginationCtrls;

								
								
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
								//print_r($nquery_1);
								//echo $nquery_1;
								//exit();
							}
							

						?>
						<div class="row ">
    							<div class="col">
									<form class="form-group my-3" method="GET">
										<div class="row">
											<div class="col-10">
											<input type="text" placeholder="ຄົ້ນຫາ" class="form-control" name="search"  required>
											</div>
											<div class="col-2">
											<input type="submit" value="ຄົ້ນຫາ" class="btn btn-info" >
											</div>
										</div>
									</form>
   								</div>
								<div class="col" align="end">
									<form class="form-group my-3" action = "list_employee.php" method="GET">
										<div class="row">
											<div class="col-12">
												<input type="submit" value="ເບີ່ງທັງໝົດ" class="btn btn-primary " >
											</div>
										</div>
									</form>
								</div>						
  							</div>
						<!--<form action = "list_mem.php " method="GET">
							<div class="input-group">
								<input type="text" name="search" class="form-control" placeholder="ຄົ້ນຫາ" require>
								<span class="input-group-append">
									<button class="btn btn-outline-success" type="submit" value="ค้นหาข้อมูลพนักงาน">ຄົ້ນຫາ</button>
									<input type="submit" value="ค้นหาข้อมูลพนักงาน" class="btn btn-info">
								</span>
							</div> 
						</form>-->
						<br>
						<table id="datatablesSimples" class="table table-striped-columns  table-hover">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ຊື່</th>
									<th>ຊື່ຜູ້ໃຊ້</th>
									<th>ສິດທີ</th>
									<th align="center">review</th>

								</tr>

							</thead>

							<tbody>
								<?php foreach ($nquery_1 as $rs) { ?>
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
											<?php
											if ($rs['ref_l_id'] == 1) {
												echo "ຜູ້ຈັດການ(Admin)";
											} elseif ($rs['ref_l_id'] == 2) {
												echo "HR";
											} elseif ($rs['ref_l_id'] == 3) {
												echo "ພະນັກງານບັນຊີ";
											} elseif ($rs['ref_l_id'] == 4) {
												echo "ພະນັກງານຈັດຊື້";
											} elseif ($rs['ref_l_id'] == 5) {
												echo "ພະນັກງານສາງ";
											} elseif ($rs['ref_l_id'] == 6) {
												echo "ພະນັກງານຂາຍໜ້າຮ້ານ";
											} elseif ($rs['ref_l_id'] == 7) {
												echo "ພະນັກງານຂາຢືນຢັນລູກຄ້າ";
											}
											?>
										</td>

										<td>
											<div class="grid d-flex hstack gap-3 justify-content-center"
												style="--bs-columns: 4; --bs-gap: 5rem;">
												<div>
													<input type="hidden" name="mem_id" value="<?php echo $rs['mem_id']; ?>">
													<input type="hidden" name="ref_l_id"
														value="<?php echo $rs['ref_l_id']; ?>">
													<button type="button" class="btn btn-warning" data-bs-toggle="modal"
														data-bs-target="#myModal<?= $rs['mem_id'] ?>">
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


									</tr>
									<!-- The Modal -->
									<div class="modal fade" id="myModal<?= $rs['mem_id'] ?>">
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

													<label for="" class="col-sm-2 col-form-label">ຊື່ພະນັກງານ
													</label>
													<form action="edit_mamber.php" method="POST"
														enctype="multipart/form-data">
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="en_name" class="form-control"
																	placeholder="" value="<?= $rs['en_name'] ?>">
															</div>
														</div>
														<label for="" class="col-sm-2 col-form-label">ຕຳແໜ່ງ</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<select name="ref_l_id" id="ref_l_id" class="form-control"
																	required>
																	<?php if ($rs['ref_l_id'] == 1) {
																		echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option selected>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} elseif ($rs['ref_l_id'] == 2) {
																		echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option selected>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} elseif ($rs['ref_l_id'] == 3) {
																		echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option selected>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} elseif ($rs['ref_l_id'] == 4) {
																		echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option selected>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} elseif ($rs['ref_l_id'] == 5) {
																		echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option selected>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} elseif ($rs['ref_l_id'] == 6) {
																		echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option selected>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} elseif ($rs['ref_l_id'] == 7) {
																		echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option selected>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} else {
																		echo "<option selected>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option >ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
																	} ?>

																</select>
															</div>
														</div>
														<label for="" class="col-sm-4 col-form-label">ຊື່ຜູ້ໃຊ້ລະບົບ</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="username" class="form-control"
																	id="username" placeholder="ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້ລະບົບ"
																	value="<?= $rs['mem_username'] ?>" required />
															</div>
														</div>
														<label for="" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ
														</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="mem_password" class="form-control"
																	id="mem_password" placeholder="ກະລຸນາໃສ່ລະຫັດຜ່ານ"
																	value="" required>
															</div>
														</div>

														<!-- Modal footer -->
														<div class="button mb-4 d-flex justify-content-between">
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
								//mysqli_close($conn);
							} ?>
							</tbody>
						</table>
						<div class="card-footer" align="end">
							<div id="pagination_controls">

								<?php echo $paginationCtrls; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php include('frm_add_member.php') ?>
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