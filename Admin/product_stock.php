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
											<div class="grid d-flex hstack gap-3 justify-content-center"
												style="--bs-columns: 4; --bs-gap: 5rem;">
												<div>
													<button type="button" class="btn btn-light" data-toggle="modal"
														data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล
														สมาชิก</button>
													<a class="btn btn-primary" data-toggle="modal"
														data-target="#exampleModal"
														href="product_stock.php?id=<?= $rs['pro_id'] ?>" role="button"><i
															class="fas fa-pencil-alt"></i>ເພີ່ມສະຕ໋ອນສີນຄ້າ</a>
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
		</div>

	</section>
	<!-- /.content -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<form action="member_db.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="member" value="add">
				<div class="modal-content">
					<div class="modal-header bg-dark">
						<h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สมาชิก</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="" class="col-sm-2 col-form-label">ระดับการใช้งาน </label>
							<div class="col-sm-10">
								<select class="form-control select2" name="ref_l_id" id="ref_l_id" required>
									<option value="">-- เลือกประเภท --</option>

									<option value="1">ผู้ดูแลระบบ(Admin)</option>
									<option value="2">พนักงาน</option>

								</select>

							</div>
						</div>

						<div class="form-group row">
							<label for="" class="col-sm-2 col-form-label">ชื่อ </label>
							<div class="col-sm-10">
								<input type="text" name="mem_name" class="form-control" id="mem_name" placeholder=""
									value="">
							</div>
						</div>

						</span>
						<div class="form-group row">
							<label for="" class="col-sm-2 col-form-label">Username </label>
							<div class="col-sm-10">
								<input type="text" name="mem_username" class="form-control" id="mem_username"
									placeholder="" value="">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-2 col-form-label">Password </label>
							<div class="col-sm-10">
								<input type="text" name="mem_password" class="form-control" id="mem_password"
									placeholder="ใส่รหัสผ่านก่อนกดบันทึก" value="" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-2 col-form-label">img</label>
							<div class="col-sm-10">




								เลือกไฟล์ใหม่<br>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="mem_img" name="mem_img"
										onchange="readURL(this);">
									<label class="custom-file-label" for="file">Choose file</label>
								</div>
								<br><br>
								<img id="blah" src="#" alt="your image" width="300" />
							</div>
						</div>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ยืนยัน</button>
					</div>
				</div>
			</form>
		</div>
	</div>
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