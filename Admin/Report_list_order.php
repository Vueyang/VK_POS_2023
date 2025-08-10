<?php
/*$dt1 = @$_POST['dt1'];
$dt2 = @$_POST['dt2'];
$date_to_date = date('Y/m/d', strtotime($dt2 . "+1 days")); //ຈາກ query ເອົາຂໍ້ມູນຈາກວັນທີ່ທີ່ເຮົາເລືອກຈາກເລີ່ມຕົ້ນຖືວັນທີ່ເຮົາຕ້ອງການມາສະແດງ
	if (($dt1 != "") & ($dt2 != "")) {
		echo "ຄົ້ນຫາຈາກວັນທີ $dt1 ຫາ $dt2 ";
		//$query_my_order = "SELECT o.* ,m.mem_username FROM tbl_order_receive as o WHERE o.order_status=1 and order_date BETWEEN '$dt1' and '$date_to_date' ORDER BY order_date DESC";
		$query_my_order = "SELECT o.* ,m.mem_username FROM tbl_order_receive as o INNER JOIN tbl_member as m ON o.mem_id=m.mem_id WHERE o.order_status=4  AND o.order_date BETWEEN '$dt1' and '$date_to_date' ORDER BY o.order_date OR ORDER BY o.order_id DESC";
	}else{
		$query_my_order = "SELECT o.* ,m.mem_username FROM tbl_order_receive as o INNER JOIN tbl_member as m ON o.mem_id=m.mem_id WHERE o.order_status=4 ORDER BY o.order_id DESC";
	}
/*$query_my_order = "SELECT o.* ,m.mem_username FROM tbl_order_receive as o INNER JOIN tbl_member as m ON o.mem_id=m.mem_id WHERE o.order_status=4 ORDER BY o.order_id DESC"
	or die
	("Error : " . mysqlierror($query_my_order));
$rs_my_order = mysqli_query($conn, $query_my_order);*/
//echo ($rs_my_order);//test query
//$rs_my_order = mysqli_query($conn, $query_my_order);
include('connetdb.php');
?>
<?php
$nquery = mysqli_query($conn, "SELECT COUNT(order_id) FROM 'tbl_order_receive'");
$row = mysqli_fetch_row($nquery);
	$rows = $row[0];
	$page_rows = 6; //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
	$last = ceil($rows / $page_rows);
	//print_r($last);
	if ($last < 1) {
		$last = 1;
	}
	$pagenum = 1;
	if (isset($_GET['pn'])) {
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	if ($pagenum < 1) {
		$pagenum = 1;
	} else if ($pagenum > $last) {
		$pagenum = $last;
	}
	$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
	if(isset($_GET['search'])){
		$search = $_GET['search'];
		//print_r($search);
		$nquery_1 = mysqli_query($conn, "SELECT o.* ,m.mem_username FROM tbl_order_receive as o INNER JOIN tbl_member as m ON o.mem_id=m.mem_id WHERE o.order_status=4 AND o.order_id LIKE '%$search%' OR o.order_date LIKE '%$search%' OR m.mem_username LIKE '%$search%' ORDER BY o.order_id DESC $limit");
	}else{
		//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
		//$nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY mem_id DESC $limit");
		//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
		$nquery_1 = mysqli_query($conn, "SELECT o.* ,m.mem_username FROM tbl_order_receive as o INNER JOIN tbl_member as m ON o.mem_id=m.mem_id WHERE o.order_status=4 ORDER BY o.order_id DESC $limit");
		$paginationCtrls = '';
		if ($last != 1) {
			if ($pagenum > 1) {
				$previous = $pagenum - 1;
				$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp; ';
		
		
				for ($i = $pagenum - 4; $i < $pagenum; $i++) {
					if ($i > 0) {
						$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
					}
				}
			}
		
		
			//$paginationCtrls .= ''.$pagenum.' &nbsp; ';
		
		
			$paginationCtrls .= '<a href=""class="btn btn-danger">' . $pagenum . '</a> &nbsp; ';
			//echo $paginationCtrls;

		
		
			for ($i = $pagenum + 1; $i <= $last; $i++) {
				$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
				if ($i >= $pagenum + 4) {
					break;
				}
			}
		
		
			if ($pagenum != $last) {
				$next = $pagenum + 1;
		
		
				$paginationCtrls .= ' &nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-info">Next</a> ';
			}
			
		}
		//print_r($nquery_1);
		//echo $nquery;
		//exit();
	}
//print_r($pageinationCtrls);
//echo $query_1;
//exit();
?>
<div class="row ">
    							<div class="col">
									<form class="form-group my-3" method="GET">
										<div class="row">
											<div class="col-10">
											<input type="text" placeholder="ຄົ້ນຫາ" class="form-control" name="search"  required>
											</div>
											<div class="col-2">
											<input type="submit" value="ຄົ້ນຫາ" class="btn btn-info" >
											</div>
										</div>
									</form>
   								</div>
								<div class="col" align="end">
									<form class="form-group my-3" action = "Report_list_sale.php" method="GET">
										<div class="row">
											<div class="col-1">
												<input type="submit" value="ເບີ່ງທັງໝົດ" class="btn btn-primary " >
											</div>
										</div>
									</form>
								</div>	
								<div class="col" align="end">
									<form class="form-group my-3" action = "Report_order.php" method="GET">
										<div class="row">
											<div class="col-12">
												<!--<input type="submit" value="ລາຍງານ" class="btn btn-success " >-->
												<a href="Report_order.php?order_id=<?php echo $rs_order['order_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ລາຍງານ</a>
											</div>
										</div>
									</form>
								</div>						
  							</div>
						
							<br>
<table id="datatablesSimples" class="table table-bordered  table-hover table-striped">
	<thead>
		<tr class="danger">
		<th width="10">
				<center>ລຳດັບ</center>
			</th>
			<th width="7%">
				<center>ລະຫັດ</center>
			</th>
			<th width="20%">ພະນັກງານຂາຍ</th>
			<th width="20%">ສະຖານະ</th>
			<th>ວັນທີເດືອນປີຂາຍ</th>

		</tr>
	</thead>
	<tbody>
		<?php foreach ($nquery_1 as $rs_order) { ?>
			<tr>
			<td>
					<?php echo $l += 1 ?>
				</td>
				<td>
					<?php echo $rs_order['order_id']; ?>
				</td>
				<td>
					<?php echo $rs_order['mem_username']; ?>
				</td>
				<td>
					<?php $st = $rs_order['order_status'];
					$count = $rs_order['order_status'];
					//print_r($count);
					//exit();
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
			</tr>
		<?php } ?>
	</tbody>
	
</div>
</table>
<div class="card-footer" align="end">
							<div id="pagination_controls">

								<?php echo $paginationCtrls; ?>

							</div>
						</div>