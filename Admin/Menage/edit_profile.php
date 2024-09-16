<?php
$menu = ""
	?>
<?php include("header.php"); ?>
<?php
$mem_id = $_GET['id'];
//$mem_id = $_SESSION['mem_id'];
$query_member = "SELECT * FROM tbl_member WHERE mem_id = '$mem_id' ";
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
		<div class="modal-body">

			<label for="" class="col-sm-2 col-form-label">ຊື່ພະນັກງານ
			</label>
			<form action="edit_mamber.php" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="en_name" class="form-control" placeholder=""
							value="<?= $row['en_name'] ?>">
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ຕຳແໜ່ງ</label>
				<div class="form-group row">
					<div class="col-sm-12">
						<select name="ref_l_id" id="ref_l_id" class="form-control" required>
							<?php if ($row['ref_l_id'] == 1) {
								echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option selected>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
							} elseif ($row['ref_l_id'] == 2) {
								echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option selected>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
							} elseif ($row['ref_l_id'] == 3) {
								echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option selected>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
							} elseif ($row['ref_l_id'] == 4) {
								echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option selected>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
							} elseif ($row['ref_l_id'] == 5) {
								echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option selected>ພະນັກງານສາງ</option>
																			<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
							} elseif ($row['ref_l_id'] == 6) {
								echo "<option>---ເລືອກຕຳແໜ່ງ---</option>
																			<option>ຜູ້ຈັດການ(Admin)</option>
																			<option>HR</option>
																			<option>ພະນັກງານບັນຊີ</option>
																			<option>ພະນັກງານຈັດຊື້</option>
																			<option>ພະນັກງານສາງ</option>
																			<option selected>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
																			<option>ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>";
							} elseif ($row['ref_l_id'] == 7) {
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
						<input type="text" name="username" class="form-control" id="username"
							placeholder="ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້ລະບົບ" value="<?= $row['mem_username'] ?>" required />
					</div>
				</div>
				<label for="" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ
				</label>
				<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="mem_password" class="form-control" id="mem_password"
							placeholder="ກະລຸນາໃສ່ລະຫັດຜ່ານ" value="" required>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="button mb-4 d-flex justify-content-between">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal"
						aria-label="Close">ຍົກເລີກ</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
				</div>
			</form>
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