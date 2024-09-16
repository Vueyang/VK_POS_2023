<div class="modal fade" id="Modalstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-3 " id="exampleModalLabel">
                ຟອມເພີ່ມຂໍ້ມູນລາຍຈ່າຍ
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="insert_expen.php" method="POST" enctype="multipart/form-data">
					
					<label for="" class="col-sm-4 col-form-label">ຊື່ລາຍການທີ່ຈ່າຍ</label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="content" class="form-control" id="content"
								placeholder="ຊື່ລາຍການທີ່ຈ່າຍ" value="" required>
						</div>
					</div>
                    <label for="" class="col-sm-4 col-form-label">ຈຳນວນ</label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="number" name="amount" class="form-control" id="amount"
								placeholder="ຈຳນວນ" value="" required>
						</div>
					</div>
					<label for="" class="col-sm-6 col-form-label">ລາຄາ </label>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="number" name="prices" class="form-control" id="prices"
								placeholder="ລາຄາ" value="" required>
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