<div class="modal fade" id="Modalstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-3 " id="exampleModalLabel">
					ຟອນເພີ່ມສະມາຊີກ
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="insert_member.php" method="POST" enctype="multipart/form-data">
					<label for="" class="col-sm-2 col-form-label">ຊື່ພະນັກງານ </label>
					<div class="form-group row">
						<div class="col-sm-12">
							<?php
							$request = "SELECT * FROM tbl_employee WHERE en_id";
							$result = mysqli_query($conn, $request);

							?>
							<select name="en_id" id="en_id" class="form-control" required>
								<option value="selected">---ເລືອກພະນັກງານ---</option>
								<?php
								while ($row = mysqli_fetch_array($result)) { ?>
									<option value="<?= $row['en_id'] ?>">
										<?= $row['en_name'] ?>
									</option>
								<?php }
								mysqli_close($conn);
								?>;
							</select>
						</div>
					</div>
					<label for="" class="col-sm-2 col-form-label">ຕຳແໜ່ງ</label>
					<div class="form-group row">
						<div class="col-sm-12">
							<select name="ref_l_id" id="ref_l_id" class="form-control" required>
								<option value="selected">---ເລືອກຕຳແໜ່ງ---</option>
								<option value="1">ຜູ້ຈັດການ(Admin)</option>
								<option value="2">HR</option>
								<option value="3">ພະນັກງານບັນຊີ</option>
								<option value="4">ພະນັກງານຈັດຊື້</option>
								<option value="5">ພະນັກງານສາງ</option>
								<option value="6">ພະນັກງານຂາຍໜ້າຮ້ານ</option>
								<option value="7">ພະນັກງານຂາຢືນຢັນລູກຄ້າ</option>
							</select>
						</div>
					</div>
					<label for="" class="col-sm-4 col-form-label">ຊື່ຜູ້ໃຊ້ລະບົບ</label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="mem_username" class="form-control" id="mem_username"
								placeholder="ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້ລະບົບ" value="" required>
						</div>
					</div>
					<label for="" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ </label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="mem_password" class="form-control" id="mem_password"
								placeholder="ກະລຸນາໃສ່ລະຫັດຜ່ານ" value="" required>
						</div>
					</div>

					<div class="button mb-4 d-flex justify-content-between ">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal"
							aria-label="Close">ຍົກເລີກ</button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ບັນທືກ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->