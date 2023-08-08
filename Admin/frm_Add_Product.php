<?php include("connetdb.php");
$menu = "product";
?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VK_2023_Product</title>
	<!--Bootstrap css-->
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./fonts/NotoSansLao-VariableFont_wdth,wght.ttf">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<style>
		.button {
			display: flex;
			justify-content: space-between;
		}

		.fa {
			padding: 5px;
		}
	</style>
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
</head>

<body>
	<section class="content" style="padding: 20px 20px;">
		<div class="card card-gray">
			<div class="alert  card-header h4 text-center " role="alert">
				ໜ້າເພີ່ມຂໍ້ມູນສີນຄ້າ
			</div>
			<div class=" col-sm-12" style=" padding: 10px 20px;">
				<form name="form1" method="post" action="insert_product.php" enctype="multipart/form-data">
					<label for="text" style="padding:10px 0px;"> ຊື່ສີນຄ້າ*:</label>
					<input type="text" name="pname" class="form-control" placeholder="ຊື່ສີນຄ້າ" required> <br>
					<label for="text" style="padding:10px 0px;"> ປະເພດສີນຄ້າ*:</label>
					<select class="form-select" name="typeID" aria-label="Default select example">
						<option selected>ກະລູນາເລືອກປະເພດສີນຄ້າ</option>
						<?php
						$sql = "SELECT * FROM type_product ORDER BY type_name";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_array($result)) {
							?>
							<option value="<?= $row["type_id"] ?>"><?= $row["type_name"] ?></option>
							<?php
						}
						;
						?>
					</select>
					<label for="text" style="padding:10px 0px;"> ລາຄາສີນຄ້າ*:</label>
					<input type="number" name="price" class="form-control" placeholder="ລາຄາສີນຄ້າ" required> <br>
					<label for="text" style="padding:10px 0px;"> ລາຍລະອຽດ*:</label>
					<textarea name="detail" required class="form-control" placeholder="ລາຍລະອຽດ"></textarea> <br>
					<br>
					<label for="text" style="padding:10px 0px;"> ຈຳນວນສີນຄ້າ*:</label>
					<input type="number" name="amount" class="form-control" placeholder="ຈຳນວນສີນຄ້າ" required> <br>
					<label for="text" style="padding:10px 0px;"> ຮູບສີນຄ້າ*:</label>
					<div class="col-sm-10">
						<img id="blah" src="/image/" alt="your image" width="200" />
						<div class="custom-file mb-4 mt-4">
							<input type="file" name="file1" onchange="readURL(this);" required>
						</div>
					</div>
					<div class="button mb-4 ">
						<a class="btn btn-danger" href="frm_Show_product.php" role="button">ຍົກເລີກ</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php include('footer.php'); ?>
</body>

</html>