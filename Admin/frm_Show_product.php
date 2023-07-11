<?php
include("connetdb.php");
$menu = "product";
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
	.test {
		color: black;
	}

	.fa {
		padding: 5px;
	}

	.fas {
		margin: 5px;
	}
	</Style>
</head>


<body>
	<section class="content" style=" padding: 20px 20px">
		<div class="card card-gray text-center mb-4 mt-4">
			<div class="card-header ">

				<h3 class="card-title " style="font-size: 2rem;">ຂໍ້ມູນສີນຄ້າ</h3>
				<div align="right">
					<a class=" btn btn-primary" href="frm_Add_Product.php"><i class="fa fa-plus"></i>ເພີ່ມສີນຄ້າໄໝ່</a>
				</div>
			</div>
			<div class="card-body ">
				<div class="row">
					<table class="table table-bordered text-center">
						<tbody>
							<tr class="danger">
								<th scope="col">ລຳດັບ</th>
								<th scope="col">ລະຫັດ</th>
								<th scope="col">ຊື່ສີນຄ້າ</th>
								<th scope="col">ປະເພດສີນຄ້າ</th>
								<th scope="col">ລາຄາ</th>
								<th scope="col">ຈຳນວນ</th>
								<th scope="col">ຮູບ</th>
								<th scope="col">ແກ້ໄຂ</th>
								<th scope="col">ລຶບ</th>
							</tr>
						</tbody>
						<?php
								$sql = "SELECT * FROM product_new, type_product WHERE product_new.type_id = type_product.type_id ";
								$result = mysqli_query($conn, $sql);
								while($row=mysqli_fetch_array($result)){
							?>
						<tbody>
							<tr>
								<td><?php echo @$l+=1; ?></td>
								<td><?=$row["pro_id"]?></td>
								<td><?=$row["pro_name"]?></td>
								<td><?=$row["type_name"]?></td>
								<td><?=$row["price"]?></td>
								<td><?=$row["amount"]?></td>
								<td><img src="image/<?=$row["image"]?>" width="100px" height="80px"> </td>
								<td>
									<p style="margin-bottom: 10px;">
										<a class="btn btn-warning" href="frm_Edit_Product.php?id=<?=$row['pro_id']?>"
											role="button"><i class="fas fa-pencil-alt"></i>ແກ້ໄຂ</a>
									</p>
								</td>
								<td><a class="del-btn btn btn-danger"
										href="delete_product.php?id=<?=$row['pro_id']?> &&product_del=del"><i
											class="fas fas fa-trash"
											onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"></i>ລຶບ</a>
								</td>
							</tr>
						</tbody>

						<?php
		}
		@$total+=$row_product['amount'];
		//mysqli_close($conn); // ປີດການເຊື່ອຕໍ່ຖານຂໍ້ມູນ
		?>
					</table>
					<?php
                
                
                //echo $total;
                ?>
					</tbody>
					</table>
					<?php if(isset($_GET['d'])){ ?>
					<div class="flash-data" data-flashdata="<?php echo $_GET['d'];?>"></div>
					<?php } ?>
				</div>
			</div>
			<div class="card-footer">
			</div>
			<table class="table table-bordered text-center">

			</table>
		</div>
	</section>
	<?php include('footer.php'); ?>
	<script>
	$(function() {
		$(".datatable").DataTable();
		//$('#example2').DataTable({
		//"paging": true,
		//"lengthChange": false,
		//"searching": false,
		//"ordering": true,
		//"info": true,
		//"autoWidth": false,
		//http: //fordev22.com/
		//});
	});
	</script>
</body>

</html>