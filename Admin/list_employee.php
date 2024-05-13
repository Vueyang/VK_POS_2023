<?php
$menu = "employee";
include('connetdb.php')
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
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນພະນັກງານ</h3>
				<div align="right">
					<a class=" btn btn-primary" href="frm_add_employee.php"><i class="fa fa-plus"></i>ເພີ່ມພະນັກງານ</a>
				</div>
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
									<form class="form-group my-3" action = "list_employee.php" method="GET">
										<div class="row">
											<div class="col-1">
												<input type="submit" value="ເບີ່ງທັງໝົດ" class="btn btn-primary " >
											</div>
										</div>
									</form>
								</div>	
								<div class="col" align="end">
									<form class="form-group my-3" action = "Report_enployee.php" method="GET">
										<div class="row">
											<div class="col-12">
					<a href="Report_enployee.php?en_id=<?php echo $rs_order['en_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ລາຍງານ</a>
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
									<th>ຊື່</th>
									<th>ເບີໂທ</th>
									<th>ອີແມວ</th>
									<th>ໜຳແໜ່ງ</th>
									<th>review</th>

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
											<td><img src="./image/<?= $rs["en_image"] ?>" width="100px" height="90px"> </td>
											<td>
											<?= $gender?>	
											</td>
											<td>
												<?= $rs['en_name'] ?><?= $rs['en_lastname'] ?>
											</td>
											<td>
												<?= $rs['en_phone'] ?>
											</td>
											<td>
												<?= $rs['en_email']; ?>
											</td>
											<td>
												<?= $rs['position']; ?>
											</td>
											<td>
												<div class="grid d-flex hstack gap-3 justify-content-center"
													style="--bs-columns: 4; --bs-gap: 5rem;">
													<div>
														<input type="hidden" name="en_id" value="<?php echo $rs['en_id']; ?>">
														<input type="hidden" name="ref_l_id"
															value="<?php echo $rs['ref_l_id']; ?>">
														<a href="edit_employee.php?id=<?= $rs['en_id'] ?>"
															class="btn btn-warning grid d-flex hstack gap-2"><i
																class="fas fa-pencil-alt"></i>
															ແກ້ໄຂ</a>
													</div>
													<div>
														<a href="delete_employee.php?id=<?= $rs['en_id']; ?> &&employee=del"
															class="del-btn btn btn-danger grid d-flex hstack gap-2"
															onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
																class="fas fas fa-trash"></i>
															ລືບ</a>
													</div>
												</div>

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
<script src="./css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="./css_js/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/datatables-simple-demo.js"></script>

</html>