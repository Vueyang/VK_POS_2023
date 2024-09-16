<?php
$menu = "R_employee";
include('../Admin/connetdb.php')
	?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="../Admin/css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="../Admin/assets/adminlte.min.css">
	<link rel="stylesheet" href="../Admin/assets/adminlte.min.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<?php
							$query1 = mysqli_query($conn, "SELECT COUNT(en_id) FROM `tbl_employee`");

							$row = mysqli_fetch_row($query1);
							//echo "<pre>";
//print_r($row);
//print_r($_SESSION['cart']);
//print_r($_POST);
//echo "</pre>";
//exit();
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
								$nquery = mysqli_query($conn, "SELECT * from  tbl_employee WHERE en_name LIKE '%$search%' OR en_lastname LIKE '%$search%' OR en_phone LIKE '%$search%'  ORDER BY en_id DESC $limit ");
								//echo $nquery;
							}else{
								//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$nquery = mysqli_query($conn, "SELECT * from  tbl_employee ORDER BY en_id DESC $limit");
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
								
							}
							
							
						?>
<body>

	<!-- Main content -->
	<br>
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ລາຍງານຂໍ້ມູນພະນັກງານ</h3>
			</div>
			<br>
			<div class="card-body-card">
				<div class="row-row">
					<div class="col">
						<?php

						//$nquery = "SELECT * from  tbl_employee GROUP BY en_id ";

						//$rs_my_order = mysqli_query($conn, $nquery);
						//echo ($query_my_order);//test query
						?>
						<div class="container text-center">
							<div class="row ">
								<div class="col" align="end">
									<form class="form-group my-3" action = "Report_enployee.php" method="GET">
										<div class="row">
											<div class="col-12">
					<a href="Report_enployee.php?en_id=<?php echo $rs_order['en_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ພີມອອກ</a>
												<!--<input type="submit" value="ລາຍງານ" class="btn btn-success " >-->
											</div>
										</div>
									</form>
								</div>						
  							</div>
						</div>
						
							<br>
							
  
						
						<table id="datatablesSimples" class="table table-striped-columns table-hover">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ຮູບ</th>
									<th>ເພດ</th>
									<th>ຊື່ ແລະ ນາມສະກຸນ</th>
									<th>ເບີໂທ</th>
                                    <th>ບ້ານ</th>
                                    <th>ເມືອງ</th>
                                    <th>ແຂວງ</th>
									<th>ອີແມວ</th>
									<th>ໜຳແໜ່ງ</th>
								</tr>

							</thead>

							<tbody>
								<?php if($row > 0) { ?>
									<?php foreach ($nquery as $rs) {
										$gender="";
										if($rs['gender']== "0"){
											$gender = "ຊາຍ";
										}elseif($rs['gender']== "1"){
											$gender="ຍີງ";
										}else{
											$gender="";
										} 
										?>
										<tr>
											<td>
												<?= $l += 1 ?>
											</td>
											<td><img src="../Admin/image/<?= $rs["en_image"] ?>" width="100px" height="90px"> </td>
											<td>
											<?= $gender?>	
											</td>
											<td>
												<?= $rs['en_name'] ?> <?= $rs['en_lastname'] ?>
											</td>
											<td>
												<?= $rs['en_phone'] ?>
											</td>
                                            <td>
												<?= $rs['village']; ?>
											</td>
                                            <td>
												<?= $rs['district']; ?>
											</td>
                                            <td>
												<?= $rs['provice']; ?>
											</td>
											<td>
												<?= $rs['en_email']; ?>
											</td>
											<td>
												<?= $rs['position']; ?>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer" align="end">
					<div id="pagination_controls">

						<?php echo $paginationCtrls; ?>

					</div>
				</div>
			</div>
			<div class="card-footer">

			</div>

		</div>
		
	</section>
	<!-- /.content -->
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
<script src="../Admin/css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../Admin/assets/demo/chart-area-demo.js"></script>
<script src="../Admin/css_js/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="../Admin/css_js/js/datatables-simple-demo.js"></script>

</html>