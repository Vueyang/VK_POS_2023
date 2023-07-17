<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('connetdb.php');
$order_id = @$_POST['order_id'];
$sql = "SELECT * FROM tbl_order WHERE order_id =$order_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$total = $row['pay_amount'];
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VK_POS_2023</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<div class="row border mt-4">
			<div class="bg-success p-2 fs-3 text-center" style="--bs-bg-opacity: .5;">
				ການສັ່ງຊື້ສຳເລັດແລ້ວ
			</div>
			<div class="col">
				<label for="text" class="fs-5">ລະຫັດການສັ່ງຊື້:</label>
				<?= $row['order_id'] ?> <br>
				<label for="text" class="fs-5">ຊື່ ແລະ ນາມສະກຸນ (ລູກຄ້າ):</label>
				<?= $row['member_name'] ?>
				<br>
				<label for="text" class="fs-5">ທີ່ຢູ່ການຈັດສົ່ງສີນຄ້າ:</label>
				<?= $row['member_address'] ?> <br>
				<label for="text" class="fs-5">ເບີໂທລະສັບ:</label>
				<?= $row['member_phone'] ?> <br>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ລຳດັບ</th>
							<th scope="col">ຊື່ສີນຄ້າ</th>
							<th scope="col">ຈຳນວນ</th>
							<th scope="col">ລາຄາ</th>
							<th scope="col">ລາຄາລວມ</th>
						</tr>
					</thead>
					<tbody class="table-group-divider">
						<?php
						$sql1 = "SELECT * FROM tbl_order_detail t_o_d, product_new p WHERE t_o_d.pro_id = p.pro_id and t_o_d.order_id = '" . $_SESSION['order_id'] . "'";
						$result1 = mysqli_query($conn, $sql1);
						$m = 1;
						while ($rs = mysqli_fetch_array($result1)) {
							?>
							<tr>
								<th>
									<?= $m ?>
								</th>
								<td>
									<?= $rs['pro_name'] ?>
								</td>
								<td>
									<?= $rs['p_c_qty'] ?>
								</td>
								<td>
									<?= number_format($rs['total_price']) ?>
								</td>
								<td>
									<?= number_format($rs['total']) ?>
								</td>
							</tr>
							<?php
							$m = $m + 1;
						}
						; ?>
					</tbody>
				</table>
				<h5 class="text-end">ລາຄາລວມທັງໝົດ:
					<?= number_format($total) ?> ກີບ
				</h5><br>
			</div>
			<div class="">ກະລຸນາໂອນເງີນພາຍໃນ 7 ວັນ ຈ່າຍຜ່ານ:
				<label class="text-success h5">
					<?= $row['b_name'] ?>
				</label>
			</div>
		</div>
		<div class="mt-2" style="text-align:right ">
			<button class="btn btn-outline-primary" onclick="window.print()">Print</button>
			<a href="show_product.php" class="btn btn-outline-secondary">ກັບຄືນ</a>
		</div>
	</div>
</body>

</html>