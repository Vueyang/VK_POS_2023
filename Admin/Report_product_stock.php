<?php
include("connetdb.php");
$menu = "Report_product_stock";
?>
<?php include("header.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

<body>

	<!-- Main content -->
	<br>
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">

				<h3 class="card-title " style="font-size: 2rem;">ລາຍງານສີນຄ້າທີຍັງເຫຼືອໜ້ອຍກວ່າ 10 ອັນ</h3>
			</div>
			<br>
            <div class="col" align="end">
									<form class="form-group my-3" method="GET">
										<div class="row">
											<div class="col-12">
												<!--<input type="submit" value="ລາຍງານ" class="btn btn-success " >-->
					<a href="print_report_stock.php?pro_id=<?php echo $rs_order['pro_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ພີມອອກ</a>
											</div>
										</div>
									</form>
								</div>		
			<div class="card-body">
				<div class="row">
					<div class="col">
						<?php

						//$nquery = "SELECT * from  product_new p, type_product t WHERE p.type_id = t.type_id and amount < 10 GROUP BY p.pro_id ";

						//$rs_my_order = mysqli_query($conn, $nquery);
						//echo ($query_my_order);//test query

						$nquery = mysqli_query($conn, "SELECT COUNT(pro_id) FROM `product_new`");
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
								$nquery = "SELECT * from  product_new p, type_product t WHERE p.type_id = t.type_id and amount < 10 GROUP BY p.pro_id ";
								// $nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id AND en.en_name LIKE '%$search%' OR m.mem_username LIKE '%$search%' GROUP BY m.mem_id DESC $limit ");
							}else{
								//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$nquery = mysqli_query($conn, "SELECT * from  product_new p, type_product t WHERE p.type_id = t.type_id and amount < 10 GROUP BY p.pro_id ");
								//$nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY mem_id DESC $limit");
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
							
						?>

						<table id="datatablesSimples" class="table table-bordered  table-hover table-striped">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດ</th>
									<th>ຊື່ສີນຄ້າ</th>
									<th>ປະເພດສີນຄ້າ</th>
									<th>ລາຄາ</th>
									<th>ຈຳນວນ</th>
									<th>ຮູບ</th>
								</tr>

							</thead>

							<tbody>
							<?php if($row > 0) { ?>
								<?php foreach ($nquery as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>
										<td>
											<?= $rs['pro_id'] ?>
										</td>
										<td>
											<?= $rs['pro_name'] ?>
										</td>
										<td>
											<?= $rs['type_name'] ?>
										</td>
										<td>
											<?= $rs['price'] ?>
										</td>
										<td>
											<?= $rs['amount']; ?>
										</td>
										<td><img src="./image/<?= $rs["image"] ?>" width="100px" height="80px"> </td>
									</tr>
									<?php
								}
								mysqli_close($conn);
									?>
									<?php } ?>
							</tbody>
						</table>

						<div class="card-footer" align="end">
							<div id="pagination_controls">

								<?php echo $paginationCtrls; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>



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
		});	</script>

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