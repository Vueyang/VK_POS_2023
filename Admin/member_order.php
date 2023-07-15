<!DOCTYPE html>
<html lang="en">

<head>

	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<?php

$query_my_order = "SELECT o.* ,o.member_name
FROM tbl_order as o WHERE o.order_status=1 ";
$rs_my_order = mysqli_query($conn, $query_my_order);
//echo ($query_my_order);//test query
?>
<table id="datatablesSimple">
	<thead>

		<tr>
			<th>ລະຫັດການສັ່ງຊື້</th>
			<th>ຊື່ລູກຄ້າ</th>
			<th>ເບີໂທລະສັບ</th>
			<th>ສະຖານະ</th>
			<th>ວັນທີເດືອນປີສັ່ງຊື້</th>
			<th>Review</th>
		</tr>

	</thead>

	<tbody>
		<?php foreach ($rs_my_order as $rs) { ?>
			<tr>
				<td>
					<?= $rs['order_id'] ?>
				</td>
				<td>
					<?= $rs['member_name'] ?>
				</td>
				<td>
					<?= $rs['member_phone'] ?>
				</td>
				<td>
					<?php $st = $rs['order_status'];
					$count = $rs['order_status'];
					if ($count == 1) {
						include('mystatus.php');
					}
					?>
				</td>
				<td>
					<?= $rs['order_date'] ?>
				</td>
				<td>
					<a href="review_detail.php?order_id=<?php echo $rs_order['order_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ເບີ່ງລາຍການ</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="./css_js/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/datatables-simple-demo.js"></script>