<!DOCTYPE html>
<html>
<?php
include('connetdb.php');
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['default_font_size' => 9,
'default_font' => 'dejavusans']);
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
ob_start();
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Preview</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
	<link href="/font/NotoSansLao-VariableFont_wdth,wght.ttf" rel="stylesheet">
</head>
<style type="text/css">
	*{
			font-family: "Noto Sans Lao", sans-serif;
  			font-optical-sizing: auto;
  			font-weight: <weight>;
  			font-style: normal;
  			font-variation-settings:"wdth" 100;

			font-size: 14px;
		}
	body {
		background-color: #CCC;
		width: 100%;
		height: 100%;
		padding: 0;
		margin: 0;
	}

	div {
		margin-top: 10px;
		background-color: #FFF;
		padding: 50px;
		width: 1000px;
		height: 90vh;
		display: block;
		margin: auto;
	}

	button {
		font-family: "noto Sans Lao";
	}

	.tb_detail {
		border-top: 1px solid #333;
		border-right: 1px solid #333;
	}

	.tb_detail th {
		border-bottom: 1px solid #333;
		border-left: 1px solid #333;
	}

	.tb_detail td {
		border-bottom: 1px solid #333;
		border-left: 1px solid #333;
        text-align:center;
	}

	@media print {
		body {
			background-color: #FFF;
		}

		button {
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
	<?php
							$expen_id = mysqli_real_escape_string($conn, $_GET['expen_id']);
							$mem_id = mysqli_real_escape_string($conn, $_GET['mem_id']);
							if($expen_id !=""){
								$sqlpay = "SELECT * FROM tb_expens1";
							}else{
								$sqlpay = "SELECT * FROM tb_expens1";
							}
							
							$querypay = mysqli_query($conn, $sqlpay);
							
							$rowmember = mysqli_fetch_array($querypay);
							
							$dt1 = mysqli_real_escape_string($conn, $_GET['expen_date']);
							$dateParts = explode('-', $dt1);
							$fromatdate = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
							//$text1 = "ລາຍງານວັນທີ";
							//$text2 = "ຫາ";
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
						<br>
	<body style="font-family:'noto Sans Lao'; border-raduis:10px;">
		<div style="border-raduis:10px; height: 100%;">
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td align="center" style="font-size: 16px;">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
			</tr>
			<tr>
				<td align="center" style="font-size: 16px;">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td style="font-size: 16px;">ຮ້ານ VK_POS</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 14px;">ຕັ້ງຢູ່ສາມແຍກຕະຫຼາດເກົ່າເມືອງລ້ອງຊານ ບ້ານ ຄອນວັດ, ເມືອງ ລ້ອງຊານ, ແຂວງ ໄຊສົມບູນ</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 12px;">ໂທ: 020 78665114, 020 78779149</td>
				<td align="right"></td>
			</tr>
		</table>
			<table cellpadding="0" cellspacing="0" align="center" width="100%">
				<tr>
					<td align="center" style="font-size: 20px; color:#06D001;"> <?php echo $txt?></td>
				</tr>
				<tr>
					<td align="center" style="font-size: 16px;">ຜູ້ທຳລາຍການ: <?php echo "<lable style='color:#FF5580'>". $_SESSION['mem_username'] . "</lable>"; ?></td>
				</tr>
			</table>
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
			<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
				<thead>
					<tr>
						<th width="5%" align="center">ລຳດັບ</th>
						<th width="35%" align="center">ຊື່ລາຍການທີ່ຈ່າຍ</th>
						<th width="10%" align="center">ຈຳນວນ</th>
						<th width="10%" align="center">ລາຄາ/ໜ່ວຍ</th>
						<th width="15%" align="center">ລວມ(ກີບ)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$total = 0;
					$total_SUM = 0;
					while ($row = mysqli_fetch_assoc($result)){ 
						$total += $row['prices'] * $row['amount']; //ລາຄາລວມ ທາງ ກ້າຕ່າ 
						
						
						?>
						
						<tr>
						<td><?= $i++ ?></td>
						<td><?= $row["content"]?></td>
						<td><?= $row["amount"]?></td>
						<td align='right'><?= number_format($row["prices"], 0) ?></td>
						<td align='right'><?= number_format($row["total"], 0) ?></td>
					</tr>
					
					<?php  } ?>
					
					<?php
					$total_SUM += $total;
					include('../convertnumtoLao.php');
					?>
					<tr>
						<td align='end' colspan="3">
							<b>ລາຄາລວມທັງໝົດ
								(
								<?php echo Convert($total_SUM); ?> ):
							</b>
							<br>
							<b>ຍອດເງີນທີ່ຈ່າຍ
								(
								<?php echo Convert($total_SUM); ?> ):
							</b>
							<br>
						</td>
						<td align='center' colspan='2'>
							<b>
								<?php echo number_format($total_SUM, 0); ?> ກີບ
							</b>
							<br>
							<b>
								<?php echo number_format($total_SUM, 0); ?> ກີບ
							</b>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
		</div>
	</body>

</html>
<?php
$html = ob_get_contents();
// $canvas = ob_get_contents();
// $mpdf->WriteHTML($canvas);
$mpdf->WriteHTML($html);
$mpdf->Output('report_pdf/Report_expen_detail.pdf');
ob_end_flush();

?>
<style>
	.button_print{
		text-align: center;
		height:0px;
		margin-top:-50px;
		
	}
	
	.button_print_1{
		margin-top:-100px;
		cursor: pointer;
	}
	.button_print_1:hover {
}
</style>
<div class="button_print my-12">
	<a href="report_pdf/Report_expen_detail.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
</div>
<br>