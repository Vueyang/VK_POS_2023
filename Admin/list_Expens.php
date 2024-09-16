<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id=$_SESSION['mem_id'];
$menu = "list_Expens";
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
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <section class="content ">
		<div class="card card-gray">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນລາຍຈ່າຍ</h3>
				<div align="right">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalstock"
						data-bs-whatever="@mdo"><i class="fa fa-plus"></i> ເພີ່ມຂໍ້ມູນລາຍຈ່າຍ</button>
				</div>
			</div>
			<br>
			<div class="card-body">
				<div class="row">
					<div class="col">
					<?php
            $query = "
            SELECT content, total, SUM(total) AS totol, DATE_FORMAT(expen_date, '%d-%M-%Y') AS expen_date
            FROM tb_expens1
            GROUP BY DATE_FORMAT(expen_date, '%d%')
            ORDER BY DATE_FORMAT(expen_date, '%Y-%M-%d') DESC
            ";
            $result = mysqli_query($conn, $query);
            $resultchart = mysqli_query($conn, $query);
            //for chart
            $datesave = array();
            $totol = array();
            while($rs = mysqli_fetch_array($resultchart)){
            $datesave[] = "\"".$rs['expen_date']."\"";
            $totol[] = "\"".$rs['totol']."\"";
            }
            $datesave = implode(",", $datesave);
            $totol = implode(",", $totol);
           /* echo $datesave;
            echo $totol;
            exit();*/
            ?>
           <div align="center" class="card-header">
			
				
						<h4>ລາຍການຂໍ້ມູນລາຍຈ່າຍ</h4>
			
            </div>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
            <hr>
            <p align="center">
                <!--devbanban.com-->
                <canvas id="myChart" width="800px" height="300px"></canvas>
                <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: [<?php echo $datesave;?>
                
                ],
                datasets: [{
                label: 'ລາຍຈ່າຍເປັນວັນ',
                data: [<?php echo $totol;?>
                ],
                backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5	)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(244, 159, 64, 0.5)',
				'rgba(190, 255, 64, 0.5)',
				'rgba(288, 35, 64, 0.5)',
				'rgba(33, 255, 64, 0.5)',
				'rgba(74, 90, 64, 0.5)',
				'rgba(16, 160, 64, 0.5)',
				'rgba(66, 33, 64, 0.5)',
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
				'rgba(190, 255, 64, 1)',
				'rgba(288, 35, 64, 1)',
				'rgba(33, 255, 64, 1)',
				'rgba(74, 9, 64, 1)',
				'rgba(74, 90, 64, 1)',
				'rgba(66, 33, 64, 1)',
                ],
                borderWidth: 1
                }]
                },
                options: {
                scales: {
                yAxes: [{
                ticks: {
                beginAtZero:true
                }
                }]
                }
                }
                });
                </script>
            </p>



						<?php

						$nquery = mysqli_query($conn, "SELECT COUNT(expen_id) FROM `tb_expens1`");
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
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens1 ORDER BY expen_id DESC $limit");
							}else{
								//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens1 ORDER BY expen_id DESC $limit");
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
							
                

				
			<div class="card-body">

						<table id="datatablesSimples" class="table table-striped-columns  table-hover">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ຊື່ລາຍການທີ່ຈ່າຍ</th>
                                    <th>ຈຳນວນ</th>
									<th>ລາຄາ/ໜ່ວຍ</th>
									<th>ລາຄາລວມ</th>
                                    <th>ວັນເດືອນປີທີ່ຈ່າຍ</th>
									<th>ຈັດການ</th>

								</tr>

							</thead>

							<tbody>
								<?php foreach ($nquery_1 as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>

										<td>
											<?= $rs['content']; ?>
										</td>
                                        <td>
											<?= $rs['amount']; ?>
										</td>
										<td>
											<?= number_format($rs['prices'], 0);  ?> ກີບ
										</td>
										<td>
											<?= number_format($rs['total'], 0);  ?> ກີບ
										</td>
                                        <td>
											<?= $rs['expen_date']; ?>
										</td>
										<td>
											<div class="grid d-flex hstack gap-3 justify-content-center"
												style="--bs-columns: 4; --bs-gap: 5rem;">
												<div>
												<input type="hidden" name="expen_id" value="<?php echo $rs['mem_id']; ?>">
													<input type="hidden" name="expen_id" value="<?php echo $rs['expen_id']; ?>">
													<button type="button" class="btn btn-warning" data-bs-toggle="modal"
														data-bs-target="#myModal<?= $rs['expen_id'] ?>">
														<i class="fas fa-pencil-alt"></i> ແກ້ໄຂ
													</button>
												</div>
												<div>
												<input type="hidden" name="mem_id" value="<?php echo $rs['mem_id']; ?>">
												<input type="hidden" name="expen_id" value="<?php echo $rs['expen_id']; ?>">
													<a href="Expens_detail.php?expen_id=<?php echo $rs['expen_id']; ?>&act=view" target="_blank"
														class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ເບີ່ງລາຍການ</a>
												</div>						
						<!--<div>
												<input type="hidden" name="exchage_id" value="<?php echo $rs['expen_id']; ?>">
													<a href="delete_exchage.php?id=<?= $rs['expen_id']; ?> &&exchage=del"
														class="del-btn btn btn-danger grid d-flex hstack gap-2"
														onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
															class="fas fas fa-trash"></i>
														ລືບ</a>
												</div>-->
											</div>

										</td>


									</tr>
									<!-- The Modal -->
									<div class="modal fade" id="myModal<?= $rs['expen_id'] ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h1 class="modal-title fs-3 " id="exampleModalLabel">
														ຟອນແກ້ໄຂຂໍ້ມູນລາຍຈ່າຍ
													</h1>
													<button type="button" class="btn-close"
														data-bs-dismiss="modal"></button>
												</div>
												<!-- Modal body -->
												<div class="modal-body">

													<label for="" class="col-sm-12 col-form-label">ຊື່ລາຍການທີ່ຈ່າຍ
													</label>
													<form action="edit_expen.php?id=<?= $rs['expen_id']; ?>" method="POST"
														enctype="multipart/form-data">
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="content" class="form-control" id="content"
																	placeholder="ຊື່ລາຍການທີ່ຈ່າຍ" value="<?= $rs['content'] ?>" require>
															</div>
														</div>
														
														<label for="" class="col-sm-4 col-form-label">ຈຳນວນ</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="number" name="amount" class="form-control"
																	id="amount" placeholder="ຈຳນວນ"
																	value="<?= $rs['amount'] ?>" required />
															</div>
														</div>
														<label for="" class="col-sm-4 col-form-label">ລາຄາ</label>
														<div class="form-group row">
															<div class="col-sm-12">
																<input type="text" name="prices" class="form-control"
																	id="prices" placeholder="ລາຄາ"
																	value="<?= $rs['prices'] ?>" required />
															</div>
														</div>
														<!-- Modal footer -->
														<div class="button mb-4 d-flex justify-content-between">
															<button type="button" class="btn btn-danger"
																data-bs-dismiss="modal" aria-label="Close">ຍົກເລີກ</button>
																<input type="hidden" name="expen_id" value="<?php echo $rs['mem_id']; ?>">
																<input type="hidden" name="expen_id" value="<?php echo $rs['expen_id']; ?>">
															<button type="submit" class="btn btn-primary"><i
																	class="fa fa-save"></i> ບັນທືກ</button>
														</div>
													</form>
												</div>


											</div>
										</div>
									</div>







									
									<?php
								//mysqli_close($conn);
							} ?>
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
		<?php include('form_add_expens.php') ?>
	</section>

            <?php //mysqli_close($con);?>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>

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

</html>