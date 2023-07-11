<?php include ("connetdb.php")?>
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
</head>


<body>
	<section class="content" style="padding: 20px 20px;">
		<div class="card card-gray">
			<div class="alert  card-header h4 text-center " role="alert">
				ໜ້າເພີ່ມຂໍ້ມູນປະເພດສີນຄ້າ
			</div>
			<div class="col-sm-12" style=" padding: 10px 20px">
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
	</section>
	<?php include('footer.php'); ?>
</body>

</html>