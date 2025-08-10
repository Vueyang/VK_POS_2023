<?php
$menu = "form_exchange";
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
	<div class="container">
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນອັດຕາແລກປ່ຽນ</h3>
				<div align="right">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalstock"
						data-bs-whatever="@mdo"><i class="fa fa-plus"></i>ເພີ່ມຂໍ້ມູນອັດຕາແລກປ່ຽນ</button>
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
						$nquery = mysqli_query($conn, "SELECT COUNT(exchage_id) FROM `tb_exchage`");
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
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_exchage ORDER BY exchage_id DESC $limit");
							}else{
								//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_exchage ORDER BY exchage_id DESC $limit");
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
								//echo $nquery;
								//exit();
							}
							

						?>
							
                <div align="center" class="card-header">
                  <h4>ລາຍການຂໍ້ມູນອັດຕາແລກປ່ຽນ</h4>
                </div>

						<table id="datatablesSimples" class="table table-striped-columns  table-hover">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ອັດຕາແລກປ່ຽນເງີນບາດ</th>
									<th>ອັດຕາແລກປ່ຽນເງີນໂດລາ</th>
									<th>ຈັດການ</th>

								</tr>

							</thead>

							<tbody>
								<?php foreach ($nquery_1 as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>

										<td>
											<?= number_format($rs['baht_name'], 0); ?> ບາດ
										</td>

										<td>
											<?= number_format($rs['dola_name'], 0);  ?> ໂດລາ
										</td>
										<td>
											<div class="grid d-flex hstack gap-3 justify-content-center"
												style="--bs-columns: 4; --bs-gap: 5rem;">
												<div>
													<input type="hidden" name="exchage_id" value="<?php echo $rs['exchage_id']; ?>">
													<button type="button" class="btn btn-warning" data-bs-toggle="modal"
														data-bs-target="#myModal<?= $rs['exchage_id'] ?>">
														<i class="fas fa-pencil-alt"></i>
													</button>
												</div>
												<div>
												<input type="hidden" name="exchage_id" value="<?php echo $rs['exchage_id']; ?>">
													<a href="delete_exchage.php?id=<?= $rs['exchage_id']; ?> &&exchage=del"
														class="del-btn btn btn-danger grid d-flex hstack gap-2"
														onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
															class="fas fas fa-trash"></i>
														</a>
												</div>
											</div>

										</td>


									</tr>
									<!-- The Modal -->
									<div class="modal fade" id="myModal<?= $rs['exchage_id'] ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h1 class="modal-title fs-3 " id="exampleModalLabel">
														ຟອນແກ້ໄຂຂໍ້ມູນອັດຕາແລກປ່ຽນ
													</h1>
													<button type="button" class="btn-close"
														data-bs-dismiss="modal"></button>
												</div>
												<!-- Modal body -->
												<div class="modal-body">

													<label for="" class="col-sm-12 col-form-label">ອັດຕາແລກປ່ຽນເງີນບາດ
													</label>
													<form action="edit_exchage.php?id=<?= $rs['exchage_id']; ?>" method="POST"
														enctype="multipart/form-data">
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="baht_name" class="form-control" id="baht_name"
																	placeholder="ອັດຕາແລກປ່ຽນເງີນບາດ" value="<?= $rs['baht_name'] ?>" require>
															</div>
														</div>
														
														<label for="" class="col-sm-4 col-form-label">ອັດຕາແລກປ່ຽນເງີນໂດລາ</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="dola_name" class="form-control"
																	id="dola_name" placeholder="ອັດຕາແລກປ່ຽນເງີນໂດລາ"
																	value="<?= $rs['dola_name'] ?>" required />
															</div>
														</div>
														
														<!-- Modal footer -->
														<div class="button mb-4 d-flex justify-content-between">
															<button type="button" class="btn btn-danger"
																data-bs-dismiss="modal" aria-label="Close">ຍົກເລີກ</button>
																<input type="hidden" name="exchage_id" value="<?php echo $rs['exchage_id']; ?>">
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
		<?php include('form_add_exchage.php') ?>
	</section>
</div>
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