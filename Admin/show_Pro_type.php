<?php
include("connetdb.php");
$menu = "pro_type"
?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>product</title>
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./fonts/NotoSansLao-VariableFont_wdth,wght.ttf">
</head>
<style>
* {
	font-family: 'Noto Sans Lao', sans-serif;
}

.fa {
	padding: 5px;
}

.fas {
	margin: 5px;
}
</style>

<body>
	<section class="content" style="padding: 20px 20px;">
		<div class="card card-gray text-center mb-4 mt-4">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນປະເພດສີນຄ້າ</h3>
				<div align="right">
					<a class="btn btn-primary" href="frm_add_product_type.php" role="button"><i
							class="fa fa-plus"></i>ເພີ່ມປະເພດສີນຄ້າໄໝ່</a>
				</div>
			</div>
			<table class="table table-bordered text-center">
				<tbody>
					<tr>
						<th scope="col">ລຳດັບ</th>
						<th scope="col">ລະຫັດປະເພດ</th>
						<th scope="col">ຊື່ປະເພດສີນຄ້າ</th>
						<th scope="col">ຮູບ</th>
						<th scope="col">ແກ້ໄຂ</th>
						<th scope="col">ລຶບ</th>
					</tr>
				</tbody>
				<?php
$sql = "SELECT * FROM type_product";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result)){
?>
				<tbody>
					<tr>
						<td><?php echo @$l+=1; ?></td>
						<td><?=$row["type_id"]?></td>
						<td><?=$row["type_name"]?></td>
						<td><img src="./image/<?=$row["type_img"]?>" width="100" height="80"> </td>
						<td><a class="btn btn-warning" href="frm_edit_product_type.php?id=<?=$row['type_id']?>"
								role="button"><i class="fas fa-pencil-alt"></i>ແກ້ໄຂ</a></td>
						<td><a class="btn btn-danger"
								href="delete_pro_type.php?id=<?= $row['type_id'];?> &&product_type_del=del"
								onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
									class="fas fas fa-trash"></i>ລຶບ</a></td>
					</tr>
				</tbody>

				<?php
		}
		//mysqli_close($conn); // ປີດການເຊື່ອຕໍ່ຖານຂໍ້ມູນ
		?>
			</table>
		</div>

	</section>
	<?php include('footer.php'); ?>
</body>

</html>
<script>
function Del(mypage) {
	var agree = confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່')
	if (agree) {
		window.location = mypage;
	}
}
</script>