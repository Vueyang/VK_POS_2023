<style>
	.button {
		display: flex;
		justify-content: space-between;
	}

	.fa {
		padding: 5px;
	}

	.text {
		text-align: center;
		align-items: center;
		justify-content: center;
		padding: 10px;
	}
</style>

<div class="modal fade" id="Modalstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<h1 class="modal-title fs-3 text " id="exampleModalLabel">
				ໜ້າເພີ່ມຂໍ້ມູນປະເພດສີນຄ້າ
			</h1>
			<div class="modal-header d-flex">

				<div class="modal-body">
					<form name="form1" method="post" action="insert_product_type.php" enctype="multipart/form-data">
						<label for="text" style="padding:10px 0px;"> ຊື່ປະເພດສີນຄ້າ*:</label>
						<input type="text" name="type" class="form-control" placeholder="ຊື່ປະເພດສີນຄ້າ" required>
						<br>
						<label for="text" style="padding:10px 0px;"> ຮູບສີນຄ້າ*:</label>
						<div class="col-sm-10">
							<img id="blah" src="./image/" alt="your image" width="200" />
							<div class="custom-file mb-4 mt-4">
								<input type="file" name="type_img" onchange="readURL(this);" required>
							</div>
						</div>
						<br>
						<div class="button mb-4 mt-4">
							<a class="btn btn-danger" href="show_Pro_type.php" role="button">ຍົກເລີກ</a>
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content -->
</div>