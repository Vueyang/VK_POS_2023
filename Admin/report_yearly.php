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
				<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນລາຍຈ່າຍປະຈຳປີ</h3>
			</div>
			<br>
			
			<div class="card-body">
				<div class="row">
				
					<div class="col">
					
					<?php
					$year = isset($_GET['selected_year']) ? $_GET['selected_year'] : "";

					if ($year != "") {
						$query = "
						SELECT SUM(total) AS total, DATE_FORMAT(expen_date, '%Y') AS expen_year 
						FROM tb_expens1 
						WHERE YEAR(expen_date) = '$year' 
						GROUP BY DATE_FORMAT(expen_date, '%Y') 
						ORDER BY DATE_FORMAT(expen_date, '%Y') DESC
						";
						$result = mysqli_query($conn, $query);
						$resultchart = mysqli_query($conn, $query);
						
						
						//for chart
						$datesave = array();
						$totol = array();
						while($rs = mysqli_fetch_array($resultchart)){
						$datesave[] = "\"".$rs['expen_year']."\"";
						$totol[] = "\"".$rs['total']."\"";
						}
						$datesave = implode(",", $datesave);
						$totol = implode(",", $totol);
						// Remove the exit() statement
					
					}else{
						$query = "
						SELECT total, SUM(total) AS total, DATE_FORMAT(expen_date, '%Y') AS expen_year
						FROM tb_expens1
						GROUP BY DATE_FORMAT(expen_date, '%Y')
						ORDER BY DATE_FORMAT(expen_date, '%Y') DESC
						";
						$result = mysqli_query($conn, $query);
						$resultchart = mysqli_query($conn, $query);
						
						
						//for chart
						$datesave = array();
						$totol = array();
						while($rs = mysqli_fetch_array($resultchart)){
						$datesave[] = "\"".$rs['expen_year']."\"";
						$totol[] = "\"".$rs['total']."\"";
						}
						$datesave = implode(",", $datesave);
						$totol = implode(",", $totol);
					}
            ?>
          <div align="center" class="card-header">
				<div class="row">
					<div class="col-md-12" style="display:flex;" >
						<a href="Report_Expens_admin.php?p=daily" class="btn btn-info" style=" margin: 10px;"><i class='fas fa-chart-bar'></i>ວັນ</a> 
						<a href="report_monthly.php?p=monthy" class="btn btn-success" style=" margin: 10px;"><i class='fas fa-chart-bar'></i>ເດືອນ</a> 
						<a href="report_yearly.php?p=yearly" class="btn btn-warning" style=" margin: 10px;"><i class='fas fa-chart-bar'></i>ປີ</a>
						<div align="center" style=" left: 20px; text-align: center; width:50%;">
						<h4 style=" margin: 10px;">ຂໍ້ມູນລາຍຈ່າຍປະຈຳປີ</h4>
						</div>

						<form method="GET">
						<select class="form-select" name="selected_year" onchange="this.form.submit()">
							<option value="">ເລືອກປີ</option>
							<?php 
							$yearQuery = "SELECT DISTINCT DATE_FORMAT(expen_date, '%Y') AS expen_date FROM tb_expens1 ORDER BY expen_date DESC";
							$yearResult = mysqli_query($conn, $yearQuery);
							while ($row = mysqli_fetch_assoc($yearResult)) {
								$selected = ($_GET['selected_year'] ?? '') == $row['expen_date'] ? 'selected' : '';
								echo '<option value="' . $row['expen_date'] . '" ' . $selected . '>' . $row['expen_date'] . '</option>';
							}
							?>
					</select>
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
                label: 'ລາຍຈ່າຍປະຈຳປີ',
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



			<div class="card-body">

            <table class="table table-striped-columns  table-hover" id="datatable">
							<thead align="center">
							<tr>
										<th>ລຳດັບ</th>
                                        <th>ປີ</th>
                                        <th>ລາຄາລວມ</th>
									</tr>
							</thead>
							<tbody align="center">
								<?php
								$total = 0;
								$Alltotal = 0;
								foreach ($result as $rs_order) {
									$total += $rs_order['prices'] * $rs_order['amount']; //ລາຄາລວມ ທາງ ກ້າຕ່າ 
										$Alltotal += $rs_order['total']; 
									echo "<tr>";
									echo "<td>" . $l += 1 . "</td>";
                                    echo "<td>" . $rs_order['expen_year'] . "</td>";
									echo "<td>" . number_format($rs_order['total'], 0) . "</td>";
									
									echo "</tr>";
								}
								include('../convertnumtoLao.php');
								echo "<tr>";
											echo "<td  align='right'colspan='2'><b>ລາຄາລວມທັງໝົດ
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
						<div class="card-footer" align="end">
								<div id="pagination_controls">

									<?php echo $paginationCtrls; ?>

								</div>
							</div>

					</div>
					<div align="center" class="button_print my-12">
					<a href="record_expens_yearly.php?expen_date=<?= $year ?>&act=view" target="_blank"
															class="button_print btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ພີມອອກ</a>
															</div>
															<br>
					</div>  
				</div>
			</div>
			
		</div>
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