<?php

$query_my_order = "SELECT o.* ,o.member_name
FROM tbl_order as o WHERE o.order_status=1 ";
$rs_my_order = mysqli_query($conn, $query_my_order);
//echo ($query_my_order);//test query
?>

<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
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
	<tfoot>
		<tr>
			<th>code</th>
			<th>name</th>
			<th>phone</th>
			<th>status</th>
			<th>date</th>
			<th>review</th>
		</tr>
	</tfoot>
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
					<a href="review_detail.php?order_id=<?php echo $rs['order_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ເບີ່ງລາຍການ</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>