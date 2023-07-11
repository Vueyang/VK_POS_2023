<?php include("connetdb.php");
$pro_id = $_GET['id'];
$sql_edit = "SELECT * FROM product_new WHERE pro_id = '$pro_id'";
$result_edit = mysqli_query($conn, $sql_edit);
$rs = mysqli_fetch_array($result_edit);
// ດືງປະເພດສີນຄ້າມາສະແດງເພື່ອທີ່ຈາກເອົາມາແກ້ໄຂ
$pro_type_id = $rs['type_id'];
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
</head>
<style>
.button {
	display: flex;
	justify-content: space-between;
}

.fa {
	padding: 5px;
}
</style>

<body>
	<section class="content" style="padding: 20px 20px;">
		<div class="card card-gray">
			<div class="alert card-header h4 text-center" role="alert">
				ໜ້າແກ້ໄຂຂໍ້ມູນສີນຄ້າ
			</div>
			<div class="col-sm-12" style=" padding: 10px 20px">
				<form name="form1" method="post" action="update_product.php" enctype="multipart/form-data">
					<label for="text" style="padding:10px 0px;"> ລະຫັດສີນຄ້າ*:</label>
					<input type="text" name="pro_id" class="form-control" readonly placeholder="ລະຫັດສີນຄ້າ"
						value="<?=$rs['pro_id']?>" required> <br>
					<label for="text" style="padding:10px 0px;"> ຊື່ສີນຄ້າ*:</label>
					<input type="text" name="pname" class="form-control" placeholder="ຊື່ສີນຄ້າ"
						value="<?=$rs['pro_name']?>" required> <br>
					<label for="text" style="padding:10px 0px;"> ປະເພດສີນຄ້າ*:</label>
					<select class="form-select" name="typeID" aria-label="Default select example">
						<option selected>ກະລູນາເລືອກປະເພດສີນຄ້າ</option>
						<?php
					$sql = "SELECT * FROM type_product ORDER BY type_name";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_array($result)){
							$pr_typeid = $row['type_id'];
					?>
						<option value="<?= $row["type_id"] ?>" <?php if ($pro_type_id == $pr_typeid) {
							  echo "selected=selected";
						}?>>
							<?=$row["type_name"]?></option>
						<?php
						};
						?>
					</select>
					<label for="text" style="padding:10px 0px;"> ລາຄາສີນຄ້າ*:</label>
					<input type="number" name="price" class="form-control" value="<?=$rs['price']?>" placeholder="
						ລາຄາສີນຄ້າ" required> <br>
					<label for="text" style="padding:10px 0px;"> ຈຳນວນສີນຄ້າ*:</label>
					<input type="number" name="amount" class="form-control" value="<?=$rs['amount']?>" placeholder="
						ຈຳນວນສີນຄ້າ" required> <br>
					<label for="text" style="padding:10px 0px;"> ລາຍລະອຽດ*:</label>
					<div class="form-floating">
						<textarea class="form-control" name="detail" placeholder="Leave a comment here"
							id="floatingTextarea2" style="height: 100px"><?=$rs['detail']?></textarea>
						<label for="floatingTextarea2">ລາຍລະອຽດ</label>
					</div><br>
					<label for="text" style="padding:10px 0px;"> ຮູບສີນຄ້າ*:</label> <br>
					<img src="image/<?=$rs['image']?>" width="130px" height="100px;"> <br> <br>
					<input type="file" name="file1"> <br>
					<input type="hidden" name="textimg" class="form-control" value="<?=$rs['image']?>"> <br>
					<div class="button mb-4 mt-4">
						<a class=" btn btn-danger" href="frm_Show_product.php" role="button">ຍົກເລີກ</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>ບັນທືກ</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php include('footer.php'); ?>
</body>


</html>