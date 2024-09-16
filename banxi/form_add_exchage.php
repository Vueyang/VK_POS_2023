<div class="modal fade" id="Modalstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-3 " id="exampleModalLabel">
                ຟອມເພີ່ມຂໍ້ມູນອັດຕາແລກປ່ຽນ
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="insert_exchage.php" method="POST" enctype="multipart/form-data">
					
					<label for="" class="col-sm-4 col-form-label">ອັດຕາແລກປ່ຽນເງີນບາດ</label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="number" name="bath_name" class="form-control" id="bath_name"
								placeholder="ອັດຕາແລກປ່ຽນເງີນບາດ" value="" required>
						</div>
					</div>
					<label for="" class="col-sm-6 col-form-label">ລະຫັອັດຕາແລກປ່ຽນເງີນໂດລາ </label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="number" name="dola_name" class="form-control" id="dola_name"
								placeholder="ອັດຕາແລກປ່ຽນເງີນໂດລາ" value="" required>
						</div>
					</div>

					<div class="button mb-4 d-flex justify-content-between ">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal"
							aria-label="Close">ຍົກເລີກ</button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->