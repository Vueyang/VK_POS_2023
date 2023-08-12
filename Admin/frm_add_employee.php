<?php
$menu = "employee";
include('connetdb.php')
	?>
<?php include("header.php"); ?>
<?php
$query_enber = "SELECT * FROM tbl_employee";
$rs_enber = mysqli_query($conn, $query_enber);
//echo ($query_level);//test query
?>
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./fonts/NotoSansLao-VariableFont_wdth,wght.ttf">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
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
<style>
	.button {
		display: flex;
		justify-content: space-between;
	}

	.fa {
		padding: 5px;
	}
</style>
<!-- /.content -->
<section class="content" style="padding: 20px 20px;">
	<div class="card card-gray">
		<div class="alert  card-header h4 text-center">
			<h5>ໜ້າເພີ່ມຂໍ້ມູນພະນັກງານ</h5>
		</div>
		<div class=" col-sm-12" style=" padding: 10px 20px;">
			<form action="insert_employee.php" method="POST" enctype="multipart/form-data">

				<label for="" class="col-sm-2 col-form-label">ຊື່ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="en_name" class="form-control" id="en_name" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ນາມສະກຸນ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="en_lastname" class="form-control" id="en_lastname" placeholder=""
							value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ເພດ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<select class="form-select" name="gender" id="gender" required>
							<option value="">-- ກະລຸນາເລືອກເພດ --</option>
							<option value="0">ຊາຍ</option>
							<option value="1">ຍິງ</option>
						</select>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ວັນທີເດືອນປີເກິດ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder=""
							value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ເບີໂທ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="en_phone" class="form-control" id="en_phone" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">Email </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="en_email" class="form-control" id="en_email" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ບ້ານ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="village" class="form-control" id="village" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ເມືອງ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="district" class="form-control" id="district" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ແຂວງ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="provice" class="form-control" id="provice" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ຕຳແໜ່ງ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="position" class="form-control" id="position" placeholder="ຕຳແໜ່ງ"
							value="" required>
					</div>
				</div>
				<div class="form-group row">
					<label bel for="" class="col-sm-2 col-form-label">ໜ້າທີຮັບຜິດຊອບ </label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="responsible" class="form-control" id="responsible"
								placeholder="ໜ້າທີຮັບຜິດຊອບ" value="" required>
						</div>
					</div>
					<label for="" class="col-sm-2 col-form-label">ຮູບ</label>
					<div class="form-group row">
						<div class="col-sm-12">
							ກະລຸນາເລືອກຮູບ<br>
							<img id="blah" src="./image/" alt="your image" width="200" />
							<div class="col-sm-10 mt-4 mb-4">
								<input type="file" name="en_img" onchange="readURL(this);" required>
							</div>
						</div>
					</div>
					<div class="button mb-4 ">
						<a class="btn btn-danger" href="list_employee.php" role="button">ຍົກເລີກ</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
					</div>
			</form>
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
	});
</script>

</body>

</html>
<!-- http://fordev22.com/ -->