<?php

$query_my_order = "SELECT o.* ,m.mem_name
FROM tbl_order as o
INNER JOIN tbl_member as m ON o.mem_id=m.mem_id

WHERE o.order_status=4
ORDER BY o.order_id DESC
"
	or die
	("Error : " . mysqlierror($query_my_order));
$rs_my_order = mysqli_query($conn, $query_my_order);
//echo ($query_my_order);//test query
?>
<table id="example1" class="table table-bordered  table-hover table-striped">
	<thead>
		<tr class="danger">
			<th width="7%">
				<center>No.</center>
			</th>
			<th width="20%">ພະນັກງານຂາຍ</th>
			<th width="20%">ສະຖານະ</th>
			<th width="10%">ວັນທີເດືອນປີຂາຍ</th>
			<th width="10%">ຈັດການ</th>

		</tr>
	</thead>
	<tbody>
		<?php foreach ($rs_my_order as $rs_order) { ?>
			<tr>
				<td>
					<?php echo $rs_order['order_id']; ?>
				</td>
				<td>
					<?php echo $rs_order['mem_name']; ?>
				</td>
				<td>
					<?php $st = $rs_order['order_status'];
					$count = $rs_order['order_status'];
					if ($count = 1) {
						include('mystatus.php');
					} elseif ($count = 4) {
						include('mystatus.php');
					}
					?>
				</td>
				<td>
					<?php echo date('d/m/y H:i:s', strtotime($rs_order['order_date'])); ?>
				</td>
				<td>
					<a href="list_sale.php?order_id=<?php echo $rs_order['order_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ເບີ່ງລາຍການ</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>