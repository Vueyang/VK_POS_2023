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
					<a class=" btn btn-primary" href="frm_add_mem.php"><i class="fa fa-plus"></i>ເພີ່ມສະມາຊິກ</a>
				</div>
			</div>
			<br>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<?php

						$nquery = "SELECT * from  tbl_member GROUP BY mem_id ";

						$rs_my_order = mysqli_query($conn, $nquery);
						//echo ($query_my_order);//test query
						?>

						<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ຮູບ</th>
									<th>ຊື່</th>
									<th>ນາມສະກຸນ</th>
									<th>ເບີໂທ</th>
									<th>ອີແມວ</th>
									<th>ໜຳແໜ່ງ</th>
									<th>review</th>

								</tr>

							</thead>

							<tbody>
								<?php foreach ($rs_my_order as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>
										<td><img src="./image/<?= $rs["mem_img"] ?>" width="100px" height="90px"> </td>
										<td>
											<?= $rs['mem_name'] ?>
										</td>
										<td>
											<?= $rs['mem_lastname'] ?>
										</td>
										<td>
											<?= $rs['mem_phone'] ?>
										</td>
										<td>
											<?= $rs['mem_email']; ?>
										</td>
										<td>
											<?= $rs['mem_username']; ?>
										</td>
										<td>
											<div class="grid d-flex hstack gap-3 justify-content-center"
												style="--bs-columns: 4; --bs-gap: 5rem;">
												<div>
													<input type="hidden" name="mem_id" value="<?php echo $rs['mem_id']; ?>">
													<input type="hidden" name="ref_l_id"
														value="<?php echo $rs['ref_l_id']; ?>">
													<a href="edit_profile.php?id=<?= $rs['mem_id'] ?>"
														class="btn btn-warning grid d-flex hstack gap-2"><i
															class="fas fa-pencil-alt"></i>
														ແກ້ໄຂ</a>
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