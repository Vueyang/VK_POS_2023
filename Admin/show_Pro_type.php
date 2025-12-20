<?php
include("connetdb.php");
$menu = "pro_type"
	?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" href="./assets/adminlte.min.css">
	<link rel="stylesheet" href="./assets/adminlte.min.css"> -->
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
	.button {
		display: flex;
		justify-content: space-between;
	}

	.fa {
		padding: 5px;
	}

	.text {
		text-align: center;
		align-items: center;
		justify-content: center;
		padding: 10px;
	}
</style>

<body>

	<!-- Main content -->
	<br>
	<div class="container">
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນປະເພດສີນຄ້າ</h3>
				<div align="right">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalstock"
						data-bs-whatever="@mdo"><i class="fa fa-plus"></i>ເພີ່ມປະເພດສີນຄ້າໄໝ່</button>
				</div>

			</div>
			<br>
			<div class="card-body">
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
									<form class="form-group my-3" action = "show_Pro_type.php" method="GET">
										<div class="row">
											<div class="col-1">
												<input type="submit" value="ເບີ່ງທັງໝົດ" class="btn btn-primary " >
											</div>
										</div>
									</form>
								</div>	
								<div class="col" align="end">
									<form class="form-group my-3" action = "print_type_product.php" method="GET">
										<div class="row">
											<div class="col-12">
												<!--<input type="submit" value="ລາຍງານ" class="btn btn-success " >-->
					<a href="print_type_product.php?type_id=<?php echo $rs_order['type_id']; ?>&act=view" target="_blank"
						class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ລາຍງານ</a>
											</div>
										</div>
									</form>
								</div>						
  							</div>
						
							<br>
				<div class="row">
					<div class="col">
						<?php
						$nquery = mysqli_query($conn, "SELECT COUNT(type_id) FROM `type_product`");

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
						$searchs = $_GET['search'];
						if(isset($_GET['search'])){
							$nquery_1 = mysqli_query($conn, "SELECT * from  type_product WHERE type_id AND type_id LIKE '%$searchs%' OR type_name LIKE '%$searchs%' GROUP BY type_id DESC $limit");
						}else{
							$nquery_1 = mysqli_query($conn, "SELECT * from  type_product WHERE type_id  GROUP BY type_id DESC $limit");
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
						}
						
						//echo ($query_my_order);//test query
						?>

						<table id="datatablesSimples" class="table table-bordered  table-hover table-striped">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດປະເພດ</th>
									<th>ຊື່ປະເພດສີນຄ້າ</th>
									<th>ຮູບ</th>
									<th>review</th>

								</tr>

							</thead>

							<tbody>
								<?php foreach ($nquery_1 as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>
										<td>
											<?= $rs['type_id'] ?>
										</td>
										<td>
											<?= $rs['type_name'] ?>
										</td>
										<td><img src="./image/<?= $rs["type_img"] ?>" width="100px" height="80px"> </td>
										<td>
											<div class="grid d-flex hstack gap-3 justify-content-center">
												<div>
													<button type="button" class="btn btn-warning" data-bs-toggle="modal"
														data-bs-target="#Modal<?= $rs['type_id'] ?>">
														<i class="fas fa-pencil-alt"></i>ແກ້ໄຂ
													</button>
												</div>
												<div>
													<a class="btn btn-danger grid d-flex hstack gap-2"
														href="delete_pro_type.php?id=<?= $rs['type_id']; ?> &&product_type_del=del"
														onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
															class="fas fas fa-trash"></i>ລຶບ</a>
												</div>
											</div>

										</td>
									</tr>
									<div class="modal fade" id="Modal<?= $rs["type_id"] ?>" tabindex="-1"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<h1 class="modal-title fs-3 text " id="exampleModalLabel">
													ໜ້າແກ້ໄຂຂໍ້ມູນປະເພດສີນຄ້າ
												</h1>
												<div class="modal-header">
													<div class="modal-body">
														<form name="form1" method="post" action="update_pro_type.php"
															enctype="multipart/form-data">
															<label for="text" style="padding:10px 0px;">
																ລະຫັດປະເພດສີນຄ້າ*:</label>
															<input type="text" name="type_id" class="form-control"
																placeholder="ຊື່ປະເພດສີນຄ້າ" value="<?= $rs['type_id'] ?>"
																readonly required>
															<br>
															<label for="text" style="padding:10px 0px;">
																ຊື່ປະເພດສີນຄ້າ*:</label>
															<input type="text" name="type" class="form-control"
																placeholder="ຊື່ປະເພດສີນຄ້າ" value="<?= $rs['type_name'] ?>"
																required>
															<br>
															<label for="text" style="padding:10px 0px;"> ຮູບສີນຄ້າ*:</label>
															<div class="col-sm-10">
																<img id="blah" src="./image/<?= $rs['type_img'] ?>"
																	alt="your image" width="200" />
																<div class="custom-file mb-4 mt-4">
																	<input type="file" name="type_img"
																		onchange="readURL(this);">
																	<input type="hidden" name="textimg" class="form-control"
																		value="<?= $rs['image'] ?>">
																	<br>
																</div>
															</div>
															<div class="button mb-4 mt-4">
																<a class="btn btn-danger" href="show_Pro_type.php"
																	role="button">ຍົກເລີກ</a>
																<button type="submit" class="btn btn-primary"><i
																		class="fa fa-save"></i>ບັນທືກ</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</tbody>
						</table>
						<div class="card-footer" align="end">
							<div id="pagination_controls">

								<?php echo $paginationCtrls; ?>

							</div>
						</div>
					</div>
					<?php include("frm_add_product_type.php") ?>
				</div>
			</div>

		</div>

	</section>
	</div>
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