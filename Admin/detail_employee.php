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
//echo $row['position'];
//echo ($query_member);//test query
//exit();
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
	<div class="container">
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
					<div class="row">
						<div class="col">
							<label for="" class="col-form-label">ລະຫັດ </label>
						<input type="text" name="en_id" class="form-control " disabled="disabled" id="en_id" placeholder=""
							value="<?php echo $row['en_id']; ?>">
						</div>
						<div class="col">
							<label for="" class="col-form-label">ຊື່ </label>
						<input type="text" name="en_name" disabled="disablied" class="form-control" id="en_name" placeholder=""
							value="<?php echo $row['en_name']; ?>">
						</div>
						<div class="col">
							<label for="" class="col-form-label">ນາມສະກຸນ </label>
							<input type="text" name="en_lastname" disabled="disablied" class="form-control" id="en_lastname" placeholder=""
								value="<?php echo $row['en_lastname']; ?>">
						</div>
					</div>
					
					<div class="row">
						<div class="col">
							<label for="" class="col-form-label">ເພດ </label>
							<select name="gender" id="gender" disabled="disablied" class="form-control" required>
								<?php
								if ($row['gender'] == 0) {
									echo "<option>---ເລືອກເພດ---</option>
									<option selected>ຊາຍ</option>
									<option>ຍິງ</option>";
								} elseif ($row['gender'] == 1) {
									echo "<option>---ເລືອກເພດ---</option>
									<option>ຊາຍ</option>
									<option selected>ຍິງ</option>";

								} else {
									echo "<option>---ເລືອກເພດ---</option>
									<option>ຊາຍ</option>
									<option>ຍິງ</option>";
								} ?>
							</select>
						</div>
						<div class="col">
							<label for="" class="col-form-label">ວັນທີເດືອນປີ </label>
							<input type="date" name="date_of_birth" disabled="disablied" class="form-control" id="en_phone" placeholder=""
								value="<?php echo $row['date_of_birth']; ?>">
						</div>
						<div class="col">
							<label for="" class="col-form-label">ເບີໂທ </label>
							<input type="text" name="en_phone" class="form-control" disabled="disablied" id="en_phone" placeholder=""
								value="<?php echo $row['en_phone']; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="" class="col-form-label">ບ້ານ </label>
							<input type="text" name="village" class="form-control" disabled="disablied" id="village" placeholder=""
								value="<?php echo $row['village']; ?>">
						</div>
						<div class="col">
							<label for="" class="col-form-label">ເມືອງ </label>
							<input type="text" name="district" class="form-control" disabled="disablied" id="district" placeholder=""
							value="<?php echo $row['district']; ?>">
						</div>
						<div class="col">
							<label for="" class="col-form-label">ແຂວງ </label>
							<input type="text" name="provice" class="form-control" disabled="disablied" id="provice" placeholder=""
							value="<?php echo $row['provice']; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col">
						<label for="" class=" col-form-label">ອິແມວ </label>
						<input type="text" name="en_email" class="form-control" disabled="disablied" id="en_email" placeholder=""
							value="<?php echo $row['en_email']; ?>">
						</div>
					<div class="col">
						<label for="" class=" col-form-label">ພະແນກ </label>
						<select name="position" class="form-control" disabled="disablied" required aria-label="Default select example">
							<option value="<?= $row['position']; ?>">
							<?php 
								if ($row['position'] == "ຜູ້ຈັດການ(Admin)") {
								  echo "<option>---ພະແນນ---</option>
								  	<option selected>ບໍລິຫານ</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";

							  } elseif ($row['position'] == "HR") {
								  echo "<option>---ພະແນນ---</option>
								  	<option selected>HR</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";
							  } elseif ($row['position'] == "ບັນຊີ") {
								  echo "<option>---ພະແນນ---</option>
								  	<option selected>ບັນຊີ</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";
							  } elseif ($row['position'] == "ຈັດຊື້") {
								  echo "<option>---ພະແນນ---</option>
								  <option selected>ຈັດຊື້</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";
							  } elseif ($row['position'] == "ສາງ") {
								  echo "<option>---ພະແນນ---</option>
								  <option selected>ສາງ</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";
							  } elseif ($row['position'] == "ຂາຍ") {
								  echo "<option>---ພະແນນ---</option>
								  	<option selected>ຂາຍ</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";
							  } elseif ($row['position'] == "ການຕະຫຼາດ") {
								  echo "<option>---ພະແນນ---</option>
								  	<option selected>ການຕະຫຼາດ</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";
							  } else {
								  echo "<option selected>---ພະແນນ---</option>
									<option selected>ບໍລິຫານ</option>
									<option>HR</option>
									<option>ບັນຊີ</option>
									<option>ຈັດຊື້</option>
									<option>ສາງ</option>
									<option>ຂາຍ</option>
									<option>ການຕະຫຼາດ</option>";
							  }
							  ?></option>
						</select>
					</div>
					<div class="col">
						<label for="" class=" col-form-label">ຕຳແໜ່ງ </label>
						<select name="responsible" class="form-control" disabled="disablied" required aria-label="Default select example">
							<option value="<?= $row['responsible']; ?>">
							<?php 
								if ($row['responsible'] == "ຜູ້ຈັດການ(Admin)") {
								  echo "<option>---ຕຳແໜ່ງ---</option>
								  	<option selected>ຜູ້ຈັດການ(Admin)</option>
									<option>HR</option>
									<option>ພະນັກງານບັນຊີ</option>
									<option>ພະນັກງານຈັດຊື້</option>
									<option>ພະນັກງານສາງ</option>
									<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
									<option>ພະນັກງານຢືນຢັນ</option>";

							  } elseif ($row['responsible'] == "HR") {
								  echo "<option>---ຕຳແໜ່ງ---</option>
								  	<option>ຜູ້ຈັດການ(Admin)</option>
									<option selected>HR</option>
									<option>ພະນັກງານບັນຊີ</option>
									<option>ພະນັກງານຈັດຊື້</option>
									<option>ພະນັກງານສາງ</option>
									<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
										<option>ພະນັກງານຢືນຢັນ</option>";
							  } elseif ($row['responsible'] == "ພະນັກງານບັນຊີ") {
								  echo "<option>---ຕຳແໜ່ງ---</option>
								  	<option>ຜູ້ຈັດການ(Admin)</option>
									<option>HR</option>
									<option selected>ພະນັກງານບັນຊີ</option>
									<option>ພະນັກງານຈັດຊື້</option>
									<option>ພະນັກງານສາງ</option>
									<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
										<option>ພະນັກງານຢືນຢັນ</option>";
							  } elseif ($row['responsible'] == "ພະນັກງານຈັດຊື້") {
								  echo "<option>---ຕຳແໜ່ງ---</option>
								  <option>ຜູ້ຈັດການ(Admin)</option>
									<option>HR</option>
									<option>ພະນັກງານບັນຊີ</option>
									<option selected>ພະນັກງານຈັດຊື້</option>
									<option>ພະນັກງານສາງ</option>
									<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
										<option>ພະນັກງານຢືນຢັນ</option>";
							  } elseif ($row['responsible'] == "ພະນັກງານສາງ") {
								  echo "<option>---ຕຳແໜ່ງ---</option>
								  <option>ຜູ້ຈັດການ(Admin)</option>
									<option>HR</option>
									<option>ພະນັກງານບັນຊີ</option>
									<option>ພະນັກງານຈັດຊື້</option>
									<option selected>ພະນັກງານສາງ</option>
									<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
										<option>ພະນັກງານຢືນຢັນ</option>";
							  } elseif ($row['responsible'] == "ພະນັກງານຂາຍໜ້າຮ້ານ") {
								  echo "<option>---ຕຳແໜ່ງ---</option>
								  <option>ຜູ້ຈັດການ(Admin)</option>
									<option>HR</option>
									<option>ພະນັກງານບັນຊີ</option>
									<option>ພະນັກງານຈັດຊື້</option>
									<option>ພະນັກງານສາງ</option>
									<option selected>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
										<option>ພະນັກງານຢືນຢັນ</option>";
							  } elseif ($row['responsible'] == "ພະນັກງານຢືນຢັນ") {
								  echo "<option>---ຕຳແໜ່ງ---</option>
								  <option>ຜູ້ຈັດການ(Admin)</option>
									<option>HR</option>
									<option>ພະນັກງານບັນຊີ</option>
									<option>ພະນັກງານຈັດຊື້</option>
									<option>ພະນັກງານສາງ</option>
									<option >ພະນັກງານຂາຍໜ້າຮ້ານ</option>
										<option selected>ພະນັກງານຢືນຢັນ</option>";
							  } else {
								  echo "<option selected>---ຕຳແໜ່ງ---</option>
								<option>ຜູ້ຈັດການ(Admin)</option>
								<option>HR</option>
								<option>ພະນັກງານບັນຊີ</option>
								<option>ພະນັກງານຈັດຊື້</option>
								<option>ພະນັກງານສາງ</option>
								<option>ພະນັກງານຂາຍໜ້າຮ້ານ</option>
								<option>ພະນັກງານຢືນຢັນ</option>";
							  }
							  ?></option>
						</select>
					</div>
					</div>
					<div class="row">
						<div class="col">
						<label for="" class=" col-form-label">ເງີນເດືອນ </label>
						<input type="text" name="salary" class="form-control" disabled="disablied" id="salary" placeholder=""
							value="<?php echo $row['salary']; ?>">
						</div>
					</div>
					<hr>
					<div class="row " >
						<div class="col">
							<label for="" class="rounded mx-auto d-block">ຮູບ</label><hr>
							<div class=" align-self-center " >
								<img src="./image/<?php echo $row['en_image']; ?>" class="rounded mx-auto d-block" width="150px" >
								<input type="hidden" name="en_image2" value="<?php echo $row['en_image']; ?>">
							</div>
						</div>
					</div>
					</div>
					<div class="button mb-4 mt-4">
						<a class=" btn btn-danger" href="list_employee.php" role="button">ຍົກເລີກ</a>
					</div>
					
				</form>
			</div>
		</div>
		<div class="card-footer">
		</div>
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