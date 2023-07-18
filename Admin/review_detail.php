<?php include('connetdb.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VK_POS_2023</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
	* {
		font-family: 'Noto Sans Lao', sans-serif;
	}
</style>

<body>
	<div class="container">
		<div class="row border mt-4">
			<?php

			$order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
			//echo $order_id;
			$sqlpay = "SELECT d.* , p.* ,
				m.mem_name,o.order_date,o.order_status,o.pay_amount2
				FROM tbl_order_detail AS d
				INNER JOIN product_new AS p ON d.pro_id=p.pro_id
				INNER JOIN tbl_order AS o ON d.order_id=o.order_id
				INNER JOIN tbl_member as m ON o.mem_id=m.mem_id
				WHERE d.order_id=$order_id";
			$querypay = mysqli_query($conn, $sqlpay);
			$rowmember = mysqli_fetch_array($querypay);
			$st = $rowmember['order_status'];

			?>
			<div class="bg-success p-2 fs-3 text-center" style="--bs-bg-opacity: .5;">
				ການສັ່ງຊື້ສຳເລັດແລ້ວ
			</div>
			<div class="col">
				<label for="text" class="fs-5">ລະຫັດການສັ່ງຊື້:</label>
				<?= $order_id; ?> <br>
				<label for="text" class="fs-5">ຊື່ ແລະ ນາມສະກຸນ (ລູກຄ້າ):</label>
				<?= $rowmember['member_name'] ?>
				<br>
				<label for="text" class="fs-5">ທີ່ຢູ່ການຈັດສົ່ງສີນຄ້າ:</label>
				<?= $rowmember['member_address'] ?> <br>
				<label for="text" class="fs-5">ເບີໂທລະສັບ:</label>
				<?= $rowmember['member_phone'] ?> <br>
				<h5>ວ/ດ/ປ :
					<?php echo $rowmember['order_date']; ?>
				</h5>
				<h5>ຜູ້ທຳລາຍການ :
					<?php echo $rowmember['mem_name']; ?>
					<br />
					ສະຖານະ :
					<?php
					$cont = $st;
					if ($cont == 1) {
						include('mystatus.php');
					}
					?>

				</h5>

				<table border="0" align="center" class="table table-hover table-bordered table-striped">
					<tr>
						<td width="5%" align="center">ລຳດັບ</td>
						<td width="10%" align="center">ຮູບ</td>
						<td width="35%" align="center">ຊື່ສີນຄ້າ</td>
						<td width="10%" align="center">ລາຄາ/ໜ່ວຍ</td>
						<td width="10%" align="center">ຈຳນວນ</td>
						<td width="15%" align="center">ລວມ(ກີບ)</td>
					</tr>
					<?php
					$total = 0;
					foreach ($querypay as $rspay) {
						$total += $rspay['total']; //ราคารวม ทั้ง ตระกร้า
						echo "<tr>";
						echo "<td>" . @$i += 1 . "</td>";
						echo "<td>" . "<img src='image/" . $rspay['image'] . "' width='100%'>" . "</td>";
						echo "<td>" . $rspay["pro_name"] . "</td>";
						echo "<td align='right'>" . number_format($rspay["price"], 0) . "</td>";
						echo "<td align='right'>";
						echo "<input type='number' name='p_c_qty' value='$rspay[p_c_qty]' size='2'class='form-control' disabled/></td>";
						echo "<td align='right'>" . number_format($rspay['total'], 0) . "</td>";
					}
					include('../convertnumtothai.php');
					?>
					<tr>
						<td></td>
						<td align='right' colspan="3">
							<b>ລາຄາລວມທັງໝົດ
								(
								<?php echo Convert($total); ?> )
							</b>
							<br>
							<b>ຍອດເງີນທີ່ຮັບຊຳລະ
								(
								<?php echo Convert($rowmember['pay_amount2']); ?> )
							</b>
							<br>
							<?php
							$pay_amount3 = $rowmember['pay_amount2'] - $total;
							//echo $pay_amount3;
							?>
							<b>ເງີນທອນ
								(
								<?php echo Convert($pay_amount3); ?> )

							</b>

						</td>
						<td align='right' colspan='2'>
							<b>
								<?php echo number_format($total, 0); ?> Kip
							</b>
							<br>
							<b>
								<?php echo number_format($rowmember['pay_amount2'], 0); ?> Kip
							</b>
							<br>
							<b>
								<?php echo number_format($pay_amount3, 0); ?> Kip
							</b>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<a class="btn btn-success" onclick="window.print()">Print</a>
	</div>
</body>

</html>