<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id=$_SESSION['mem_id'];
$menu = "R_Expens";
include('connetdb.php');


	?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="css_js/css/styles.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" href="assets/adminlte.min.css">
	<link rel="stylesheet" href="assets/adminlte.min.css"> -->
	<link rel="stylesheet" href="assets/charts.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="highcharts/highcharts.js"></script>
<script type="text/javascript" src="highcharts/data.js"></script>
<script type="text/javascript" src="highcharts/exporting.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style type="text/css">
	

	@media print {
		body {
			background-color: #FFF;
		}
		
		button {
			visibility: hidden;
		}
		.H{
			visibility: hidden;
		}
		.button_print{
			visibility: hidden;
		}
		.card-footer{
			visibility: hidden;
		}
		@page {
			margin: 0;
			padding: 0;
		}

		.cash {
			display: none;
		}
	}
</style>
<body>

	<!-- Main content -->
	<br>
	<div class="container">
	<section class="content ">
		<div class="card card-gray l">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ລາຍງານຂໍ້ມູນລາຍຈ່າຍປະຈຳວັນ</h3>
			</div>
			<br>
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php

							$dt1 = isset($_GET['dt1']) ? mysqli_real_escape_string($conn, $_GET['dt1']) : '';
							
							if (!empty($dt1)) {
								// ໃຊ້ DATE() ໃນ SQL ເພື່ອປຽບທຽບວັນທີ
								$query = "SELECT *, SUM(total) AS total_sum 
								FROM tb_expens1 
								WHERE DATE(expen_date) = '$dt1'
								GROUP BY expen_id 
								ORDER BY expen_date DESC";
								$result = mysqli_query($conn, $query);

							// ຄຳສັ່ງສຳລັບກຣາຟ
									$query_chart = "SELECT DATE_FORMAT(expen_date, '%d-%M-%Y') AS expen_date, SUM(total) AS total_sum 
									FROM tb_expens1 
									WHERE DATE(expen_date) = '$dt1'
									GROUP BY DATE(expen_date)";
									$result_chart = mysqli_query($conn, $query_chart);
							}else{
									
									$nquery = mysqli_query($conn, "SELECT COUNT(DISTINCT(expen_id)) FROM `tb_expens1`");
									$row = mysqli_fetch_row($nquery);
									$rows = $row[0];
									$page_rows = 6; //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
									// ຄຳສັ່ງສຳລັບການສະແດງທັງໝົດ
									$last = ceil($rows / $page_rows);
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
									
									// ຄຳສັ່ງສຳລັບກຣາຟ
									$query_chart = "SELECT DATE_FORMAT(expen_date, '%d-%M-%Y') AS expen_date, SUM(total) AS total_sum 
												FROM tb_expens1 
												GROUP BY expen_date DESC $limit
												"; //ORDER BY expen_id 
									$result_chart = mysqli_query($conn, $query_chart);
									//
									$query = "SELECT SQL_CALC_FOUND_ROWS *, SUM(total) AS total_sum 
											FROM tb_expens1 
											GROUP BY expen_id 
											ORDER BY expen_date DESC $limit";
									$result = mysqli_query($conn, $query);
										$paginationCtrls = '';
										if ($last != 1) {
											if ($pagenum > 1) {
												$previous = $pagenum - 1;
												$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp; ';
												//print_r($previous);
										
												for ($i = $pagenum - 4; $i < $pagenum; $i++) {
													if ($i > 0) {
														$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
													}
												}
											}
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
								// ການຈັດການຂໍ້ມູນກຣາຟ
								$datesave = [];
								$totol = [];
								while($rs = mysqli_fetch_assoc($result_chart)){
									$datesave[] = '"' . $rs['expen_date'] . '"';
									$totol[] = $rs['total_sum'];
								}
								$datesave = implode(",", $datesave);
								$totol = implode(",", $totol);
            ?>
           <div align="center" class="card-header">
				<div class="row">
					<div class="col-md-12 H" style="display:flex;" >
						<a href="Report_Expens_admin.php?p=daily" class="btn btn-info" style=" margin: 10px;"><i class='fas fa-chart-bar'></i>ວັນ</a> 
						<a href="report_monthly.php?p=monthy" class="btn btn-success" style=" margin: 10px;"><i class='fas fa-chart-bar'></i>ເດືອນ</a> 
						<a href="report_yearly.php?p=yearly" class="btn btn-warning" style=" margin: 10px;"><i class='fas fa-chart-bar'></i>ປີ</a>
						<div align="center" style=" left: 20px; text-align: center; width:60%;">
						<h4 style=" margin: 10px;">ລາຍງານຂໍ້ມູນລາຍຈ່າຍປະຈຳວັນ</h4>
						</div>
						<form method="GET" class="row mt-2">
							<div class="col-sm-12">
							<input type="date" name="dt1" class="form-control" value="<?= isset($_GET['dt1']) ? $_GET['dt1'] : '' ?>" onchange="this.form.submit()">
							</div>
						</form>
					</div>
					
				</div>
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
                label: 'ລາຍຈ່າຍປະຈຳວັນ',
                data: [<?php echo $totol;?>
                ],
                backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5	)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(122, 14, 14, 0.5)',
                'rgba(152, 125, 207, 0.5)',
                'rgba(244, 159, 64, 0.5)',
				'rgba(79, 88, 202, 0.5)',
				'rgba(288, 35, 64, 0.5)',
				'rgba(33, 255, 64, 0.5)',
				'rgba(122, 141, 110, 0.5)',
				'rgba(16, 160, 64, 0.5)',
				'rgba(133, 101, 130, 0.5)',
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgb(36, 19, 2)',
				'rgb(208, 253, 119)',
				'rgba(288, 35, 64, 1)',
				'rgb(255, 33, 199)',
				'rgba(74, 9, 64, 1)',
				'rgb(33, 36, 31)',
				'rgb(145, 90, 141)',
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
                <hr>
			<div class="">
				
						<table class="table table-striped-columns  table-hover" id="datatable">
							<thead>
							<tr>
										<th>ລຳດັບ</th>
										<th>ລະຫັດ</th>
										<th>ລາຍການ</th>
										<th>ຈຳນວນ</th>
										<th>ລາຄາ/ໜ່ວຍ</th>
										<th>ລາຄາລວມ</th>
										<th>ວັນເດືອນປີທີ່ຈ່າຍ</th>
									</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$Alltotal = 0;
								while ($row = mysqli_fetch_assoc($result)) {
									$total += $row['total_sum'];
									echo "<tr>";
									echo "<td>" . $i++ . "</td>";
									echo "<td>" . htmlspecialchars($row['expen_id']) . "</td>";
									echo "<td>" . htmlspecialchars($row['content']) . "</td>";
									echo "<td>" . number_format($row['amount'], 0) . "</td>";
									echo "<td>" . number_format($row['prices'], 0) . "</td>";
									echo "<td>" . number_format($row['total_sum'], 0) . "</td>";
									echo "<td>" . htmlspecialchars($row['expen_date']) . "</td>";
									echo "</tr>";
								}
								$Alltotal += $total; 
								include('../convertnumtoLao.php');
								echo "<tr>";
											echo "<td  align='right'colspan='4'><b>ລາຄາລວມທັງໝົດ
											(
											" . Convert($Alltotal) . ")
										</b>
										<br>
										<b>ຍອດເງີນທີ່ຈ່າຍ
											(
											" . Convert($Alltotal) . " )
										</b>
										</td>";
											echo "<td align='right'colspan='2'> <b>
											" . number_format($Alltotal, 0) . " ກີບ
										</b>
										<br>
										<b>
											" . number_format($Alltotal, 0) . " ກີບ
										</b></td>";
											echo "</tr>";
								?>

							</tbody>
						</table>
						<div class="con">
						<div class="card-footer" align="end">
								<div id="pagination_controls">

									<?php echo $paginationCtrls; ?>

								</div>
							</div>

					</div>
					<br>
					<div align="center" class="button_print my-12">
					<a href="Record_Expens_daily.php?expen_date=<?= $dt1 ?>&act=view" target="_blank"
															class="button_print btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ພີມອອກ</a>
															</div>
															<br>
															</section>
															</div>
					</div>
					
					
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
<script src="css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!--<script src="css_js/assets/demo/chart-bar-demo.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</html>



<style>
	.button_print{
		text-align: center;
	}
	
	.button_print_1{
		margin-top:-100px;
		cursor: pointer;
	}
	#row_m{
		margin-right: 15px;
    	margin-left: 15px;
	}
</style>
