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
							$yearly = mysqli_real_escape_string($conn, $_GET['expen_date']);
							
							$mem_id = mysqli_real_escape_string($conn, $_GET['mem_id']);
							if($expen_id !=""){
								$sqlpay = "SELECT * FROM tb_expens1";
							}else{
								$sqlpay = "SELECT * FROM tb_expens1";
							}
							
							$querypay = mysqli_query($conn, $sqlpay);
							
							$rowmember = mysqli_fetch_array($querypay);
							$t="ລາຍງານລາຍຈ່າຍປະຈຳປີທັງໝົດ";
							if (!empty($yearly)) {
								$txt="ລາຍງານປະຈຳປີ: $yearly ";
								$nqueryResult = "SELECT SUM(total) AS total_sum,
								DATE_FORMAT(expen_date, '%Y') AS expen_year 
								FROM tb_expens1 
								WHERE YEAR(expen_date) = '$yearly'
								GROUP BY DATE_FORMAT(expen_date, '%Y')
								ORDER BY expen_year DESC";
								$nquery_1 = mysqli_query($conn, $nqueryResult);
							}else{
								$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$txt = $t;
								$nqueryResult = "SELECT SUM(total) AS total_sum,
								DATE_FORMAT(expen_date, '%Y') AS expen_year 
								FROM tb_expens1 
								WHERE DATE_FORMAT(expen_date, '%Y')
								GROUP BY DATE_FORMAT(expen_date, '%Y')
								 DESC";
								$nquery_1 = mysqli_query($conn, $nqueryResult);
							}
							

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
		
			<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
				<thead>
					<tr>
                    <th>ລຳດັບ</th>
                    <th>ປີ</th>
                    <th>ລາຄາລວມ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$total = 0;
                    $Alltotal = 0;
                    foreach ($nquery_1 as $rs_order) {
                        $total += $rs_order['prices'] * $rs_order['amount']; //ລາຄາລວມ ທາງ ກ້າຕ່າ 
                            $Alltotal += $rs_order['total_sum']; 
                        echo "<tr>";
                        echo "<td>" . $l += 1 . "</td>";
                        echo "<td>" . $rs_order['expen_year'] . "</td>";
                        echo "<td>" . number_format($rs_order['total_sum'], 0) . "</td>";
                        
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
			<br>
		</div>
	</body>

</html>
<?php
$html = ob_get_contents();

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