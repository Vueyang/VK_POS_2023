<?php
$menu = ""
	?>
<?php include("header.php"); ?>
<?php
//$mem_id = $_GET['id'];
$en_id = $_SESSION['en_id'];
$query_member = "SELECT * FROM tbl_member WHERE mem_id = $en_id";
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
			<h3 class="card-title">ໜ້າແກ້ໄຂຂໍ້ມູນສີນຄ້າ</h3>
		</div>
		<br>
		<div class="card-body">
			<div class="col-md-12">
				<form action="edit_profile_ok.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="member" value="edit_profile">
					<input type="hidden" name="mem_id" value="<?php echo $row['mem_id']; ?>">
					<input type="hidden" name="ref_l_id" value="<?php echo $row['ref_l_id']; ?>">
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ຊື່ </label>
						<input type="text" name="mem_name" class="form-control" id="mem_name" placeholder=""
							value="<?php echo $row['mem_name']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ນາມສະກຸນ </label>
						<input type="text" name="mem_lastname" class="form-control" id="mem_lastname" placeholder=""
							value="<?php echo $row['mem_lastname']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ເບີໂທ </label>
						<input type="text" name="mem_phone" class="form-control" id="mem_phone" placeholder=""
							value="<?php echo $row['mem_phone']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">Email </label>
						<input type="text" name="mem_email" class="form-control" id="mem_email" placeholder=""
							value="<?php echo $row['mem_email']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ບ້ານ </label>
						<input type="text" name="mem_village" class="form-control" id="mem_village" placeholder=""
							value="<?php echo $row['mem_village']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ເມືອງ </label>
						<input type="text" name="mem_district" class="form-control" id="mem_district" placeholder=""
							value="<?php echo $row['mem_district']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ແຂວງ </label>
						<input type="text" name="mem_provice" class="form-control" id="mem_provice" placeholder=""
							value="<?php echo $row['mem_provice']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ຊື່ຜູ້ໃຊ້ລະບົບ </label>
						<input type="text" name="mem_username" class="form-control" id="mem_username" placeholder=""
							value="<?php echo $row['mem_username']; ?>">
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ </label>
						<input type="text" name="mem_password" class="form-control" id="mem_password"
							placeholder="ໃສ່ລະຫັດຜ່ານກ່ອນບັນທືກ" required="" value="" required>
					</div>
					<label for="" class="col-sm-2 col-form-label">ຮູບເກົ່າ</label>
					<div class="col-sm-10">
						<img src="image/<?php echo $row['mem_img']; ?>" width="150px">
						<input type="hidden" name="mem_img2" value="<?php echo $row['mem_img']; ?>">
					</div>
					<label for="" class="col-sm-2 col-form-label">ຮູບໃໝ່</label>
					<div class="col-sm-10">
						<img id="blah" src="image/" alt="your image" width="200" />
						<div class="custom-file mb-4 mt-4">
							<input type="file" name="mem_img" onchange="readURL(this);">
						</div>
					</div>
					<div class="button mb-4 mt-4">
						<a class=" btn btn-danger" href="list_mem.php" role="button">ຍົກເລີກ</a>
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