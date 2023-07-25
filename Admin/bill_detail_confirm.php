<?php include('connetdb.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php include("header.php");

//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//exit();
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id = $_SESSION['mem_id'];
//$mem_address = $_SESSION['mem_address'];
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VK_POS_2023</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
	* {
		font-family: 'Noto Sans Lao', sans-serif;
	}
</style>

<body>
	<div class="content" style="padding:20px;">
		<div class="card card-gray">
			<div class="card-header ">
				<div align="start">
					<h4>ການກວດສອບລາຍລະອຽກການສັ່ງຊື້</h4>
				</div>
			</div>
			<br>
			<div class="card-body">
				<div class="row">
					<?php

					$order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
					//echo $order_id;
					
					$sql_d = "SELECT * FROM tbl_order o, tbl_order_detail d, product_new p WHERE d.pro_id=p.pro_id and o.order_id= d.order_id and d.order_id = $order_id ORDER BY o.order_status = 2 ";
					$result_d = mysqli_query($conn, $sql_d);
					$row = mysqli_fetch_array($result_d)
						?>
					<div class="col">
						<h5>ລະຫັດການສັ່ງຊື້:
							<?= $order_id; ?> <br>
						</h5>
						<h5>ຊື່ ແລະ ນາມສະກຸນ (ລູກຄ້າ):
							<?= $row['member_name'] ?>
						</h5>
						<h5>ທີ່ຢູ່ການຈັດສົ່ງສີນຄ້າ:
							<?= $row['member_address'] ?>
						</h5>
						<h5>ເບີໂທລະສັບ:
							<?= $row['member_phone'] ?> <br>
						</h5>
						<h5>ວັນເດືອນປີສັ່ງຊື້ :
							<?php echo date('d/m/Y H:i:s:m', strtotime($row['order_date'])); ?>
						</h5>
						<h5>
							ສະຖານະ :
							<?php
							$st = $row['order_status'];
							$cont = $row['order_status'];
							if ($cont == 2) {
								include('mystatus.php');
							}
							?>

						</h5>
						<h5>ພະນັກງານຜູ້ທຳລາຍການນີ້:
							<?= $_SESSION['mem_name'] ?>
						</h5>
						<table border="0" align="center" class="table table-hover table-bordered table-striped">
							<tr>
								<td width="5%" align="center">ລຳດັບ</td>
								<td width="10%" align="center">ຮູບ</td>
								<td width="35%" align="center">ຊື່ສີນຄ້າ</td>
								<td width="10%" align="center">ຈຳນວນ</td>
								<td width="10%" align="center">ລາຄາ/ໜ່ວຍ</td>
								<td width="15%" align="center">ລວມ(ກີບ)</td>
							</tr>
							<?php
							$total = 0;
							foreach ($result_d as $rspay) {
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
								</td>
								<td align='right' colspan='2'>
									<b>
										<?php echo number_format($total, 0); ?> Kip
									</b>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<br>
				<div align="end">
					<?php if ($mem_id != "") { ?>
						<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>">
						<a href="list_sale_approved.php"><button type="button"
								class="btn btn-outline-warning">ກັບຄືນ</button></a>
						<a href="confirm_customer.php?order_id=<?= $row['order_id'] ?>"><button type="button"
								class="btn btn-outline-success">ຢືນຢັນ</button></a>
						<a href="confirm_cancel_order.php?order_id=<?= $row['order_id'] ?>"><button type="button"
								class="btn btn-outline-danger">ຍົກເລີກ</button></a>
					<?php }

					?>
				</div>

			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>
	<script>
		$(function () {
			$(".datatable").DataTable();
			// $('#example2').DataTable({
			//   "paging": true,
			//   "lengthChange": false,
			//   "searching": false,
			//   "ordering": true,
			//   "info": true,
			//   "autoWidth": false,
			// http://fordev22.com/
			// });
		});
	</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="./css_js/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/datatables-simple-demo.js"></script>

</html>