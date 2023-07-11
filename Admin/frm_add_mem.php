<?php
$menu = "member";
include('connetdb.php')
?>
<?php include("header.php"); ?>
<?php
$query_member = "SELECT * FROM tbl_member";
$rs_member = mysqli_query($conn, $query_member);
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
		reader.onload = function(e) {
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
			<form action="insert_member.php" method="POST" enctype="multipart/form-data">
				<label for="" class="col-sm-2 col-form-label">ຊື່ຜູ້ໃຊ້ລະບົບ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<select class="form-select" name="ref_l_id" id="ref_l_id" required>
							<option value="">-- ກະລຸນາເລືອກຜູ້ໃຊ້ລະບົບ --</option>
							<option value="1">ຜູ້ໃຊ້ລະບົບ(Admin)</option>
							<option value="2">ພະນັກງານ</option>
						</select>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ຊື່ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_name" class="form-control" id="mem_name" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ນາມສະກຸນ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_lastname" class="form-control" id="mem_lastname" placeholder=""
							value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ເບີໂທ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_phone" class="form-control" id="mem_phone" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">Email </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_email" class="form-control" id="mem_email" placeholder="" value=""
							required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ບ້ານ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_village" class="form-control" id="mem_village" placeholder=""
							value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ເມືອງ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_district" class="form-control" id="mem_district" placeholder=""
							value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ແຂວງ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_provice" class="form-control" id="mem_provice" placeholder=""
							value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ຊື່ຜູ້ໃຊ້ລະບົບ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_username" class="form-control" id="mem_username" placeholder=""
							value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ </label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_password" class="form-control" id="mem_password"
							placeholder="ກະລຸນາໃສ່ລະຫັດຜ່ານ" value="" required>
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ຮູບ</label>
				<div class="form-group row">
					<div class="col-sm-12">
						ກະລຸນາເລືອກຮູບ<br>
						<img id="blah" src="image/" alt="your image" width="200" />
						<div class="col-sm-10 mt-4 mb-4">
							<input type="file" name="mem_img" onchange="readURL(this);" required>
						</div>
					</div>
				</div>
				<div class="button mb-4 ">
					<a class="btn btn-danger" href="list_mem.php" role="button">ຍົກເລີກ</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
				</div>
			</form>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>
<script>
$(function() {
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