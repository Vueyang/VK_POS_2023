<?php

$query_my_order = "SELECT o.* ,m.mem_username FROM tbl_order_receive as o INNER JOIN tbl_member as m ON o.mem_id=m.mem_id WHERE o.order_status=4 ORDER BY o.order_id DESC"
	or die
	("Error : " . mysqlierror($query_my_order));
$rs_my_order = mysqli_query($conn, $query_my_order);
//echo ($rs_my_order);//test query
?>
<?php
$query_1 = mysqli_query($conn, "SELECT COUNt(order_id) FROM 'tbl_order_receive'");
$row = mysqli_fetch_row($query_1);
echo $row;
$row = $row[0];
$page_rows = 6;
$last = ceil($row / $page_rows);
if($last < 1){
	$last = 1;
}
$pagenum = 1;
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if($pagenum < 1){
	$pagenum = 1;
}elseif($pagenum > $last){
	$pagenum = $last;
}
$limit = 'LIMIT' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
$numpage = mysqli_query($conn, "SELECT * FROM tbl_order_receive ORDER BY order_id DESC $limit");
print_r($numpage);
$pageinationCtrls = '';
if($last != 1){
	if($pagenum > 1){
		$previos = $pagenum - 1;
		$pageinationCtrls .= '<a href = "' .$_SERVER['PHP_SELF'] . '?pn=' . $previos .'" class="btn btn-info">Previous</a> &nbsp; ';
		for($i = $pagenum - 4; $i < $pagenum; $i++){
			if($i > 0){
				$pageinationCtrls .='<a href="' . $_SERVER['PHP_SELF'] . '?pn=' .$i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';

			}
		}
	}
	$pageinationCtrls .='<a href=""class="btn btn-danger">' . $pagenum . '</a> &nbsp; ';

	for($i = $pagenum + 1; $i <= $last; $i++){
		$pageinationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
		if($i >= $pagenum + 4){
			break;
		}
	}

	if($pagenum != $last){
		$next = $pagenum + 1;
		$pageinationCtrls .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-info">Next</a>';
	}
}
//print_r($pageinationCtrls);
//echo $query_1;
//exit();
?>
<table id="datatablesSimple" class="table table-bordered  table-hover table-striped">
	<thead>
		<tr class="danger">
			<th width="7%">
				<center>ລະຫັດ</center>
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
					<?php echo $rs_order['mem_username']; ?>
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
					<?php echo date('d/m/y H:i:s:m', strtotime($rs_order['order_date'])); ?>
				</td>
				<td>
					<a href="list_sale.php?order_id=<?php echo $rs_order['order_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ເບີ່ງລາຍການ</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
	
</div>
</table>
