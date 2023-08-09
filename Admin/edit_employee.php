<?php
$menu = "employee";
include('connetdb.php');
?>
<?php include("header.php"); ?>
<?php
$en_id = $_GET['id'];
//$en_id = $_SESSION['id'];
$query_member = "SELECT * FROM tbl_employee WHERE en_id = $en_id";
$rs_member = mysqli_query($conn, $query_member);
$row = mysqli_fetch_array($rs_member);
//echo $row['mem_name'];
//echo ($query_member);//test query
?>
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
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content" style="padding:20px 20px">
	<div class="card card-gray">
		<div class="card-header ">
			<h3 class="card-title">ໜ້າແກ້ໄຂຂໍ້ມູນພະນັກງານ</h3>
		</div>
		<br>
		<div class="card-body">
			<div class="col-md-12">
				<form action="edit_employee_ok.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="member" value="edit_profile">
					<input type="hidden" name="en_id" value="<?php echo $row['en_id']; ?>">
					<input type="hidden" name="ref_l_id" value="<?php echo $row['ref_l_id']; ?>">
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ຊື່ </label>
						<input type="text" name="en_name" class="form-control" id="en_name" placeholder=""
							value="<?php echo $row['en_name']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ນາມສະກຸນ </label>
						<input type="text" name="en_lastname" class="form-control" id="en_lastname" placeholder=""
							value="<?php echo $row['en_lastname']; ?>">
					</div>
					<select name="gender" id="gender" class="form-select" aria-label="Default select example">
						<?php
						foreach ($row as $rs) {
							?>
							<option value="<? $rs ?>">
								<?= $rs['gender'] ?>
							</option>
						<?php } ?>
					</select>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ວັນທີເດືອນປີ </label>
						<input type="date" name="date_of_birth" class="form-control" id="en_phone" placeholder=""
							value="<?php echo $row['date_of_birth']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ເບີໂທ </label>
						<input type="text" name="en_phone" class="form-control" id="en_phone" placeholder=""
							value="<?php echo $row['en_phone']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ອິແມວ </label>
						<input type="text" name="en_email" class="form-control" id="en_email" placeholder=""
							value="<?php echo $row['en_email']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ບ້ານ </label>
						<input type="text" name="village" class="form-control" id="village" placeholder=""
							value="<?php echo $row['village']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ເມືອງ </label>
						<input type="text" name="district" class="form-control" id="district" placeholder=""
							value="<?php echo $row['district']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ແຂວງ </label>
						<input type="text" name="provice" class="form-control" id="provice" placeholder=""
							value="<?php echo $row['provice']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ຕຳແໜ່ງ </label>
						<input type="text" name="position" class="form-control" id="position" placeholder=""
							value="<?php echo $row['position']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ໜ້າທີຮັບຜິດຊອບ </label>
						<input type="text" name="responsible" class="form-control" id="mem_password"
							placeholder="ໜ້າທີຮັບຜິດຊອບ" value="<?php echo $row['responsible']; ?>" required>
					</div>
					<label for="" class="col-sm-2 col-form-label">ຮູບເກົ່າ</label>
					<div class="col-sm-10">
						<img src="./image/<?php echo $row['en_image']; ?>" width="150px">
						<input type="hidden" name="en_image2" value="<?php echo $row['en_image']; ?>">
					</div>
					<label for="" class="col-sm-2 col-form-label">ຮູບໃໝ່</label>
					<div class="col-sm-10">
						<img id="blah" src="./image/" alt="your image" width="200" />
						<div class="custom-file mb-4 mt-4">
							<input type="file" name="en_image" onchange="readURL(this);">
						</div>
					</div>
					<div class="button mb-4 mt-4">
						<a class=" btn btn-danger" href="list_employee.php" role="button">ຍົກເລີກ</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
					</div>
				</form>
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

</html>


<!-- http://fordev22.com/ -->