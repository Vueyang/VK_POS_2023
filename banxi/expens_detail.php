<!DOCTYPE html>
<html>
<?php
include('../Admin/connetdb.php');
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
	<link rel="stylesheet" href="../Admin/font-awesome/css/font-awesome.min.css" type="text/css">
	<script src="../Admin/js/jquery.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
	<link href="../Admin/font/NotoSansLao-VariableFont_wdth,wght.ttf" rel="stylesheet">
	
	<script src="../js/jquery.js" type="text/javascript"></script>
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
							//$date1 =  mysqli_real_escape_string($conn, $_GET['expen_date']);
							//$date2 =mysqli_real_escape_string($conn, $_GET['end_date']);
							$date1=$_SESSION = ['expen_date'];
							$date2=$_SESSION = ['end_date'];
							echo $date1;
							echo $date2;
							$date_to_date = date('Y/m/d', strtotime($date2 . "+1 days"));

							if (($date1 == $_SESSION = ['expen_date']) & ($date2 == $_SESSION = ['end_date'])) {
								echo "ຄົ້ນຫາຈາກວັນທີ $date1 ຫາ $date2 ";
								//$sqlpay = "SELECT * FROM tb_expens WHERE expen_id = '$expen_id'";
								$sqlpay = "SELECT * FROM tb_expens WHERE expen_id";
							}else{
								$sqlpay = "SELECT * FROM tb_expens WHERE expen_id ='$expen_id'";
								
							}
							$querypay = mysqli_query($conn, $sqlpay);
							
								$rowmember = mysqli_fetch_array($querypay);
							
							print_r($sqlpay);
							 //exit();
							//$st = $rowmember['order_status'];
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
					<td align="center" style="font-size: 18px;">ລາຍການຊື້ເຄື່ອງໃຊ້ໃນຮ້ານ</td>
				</tr>
			</table>
			<hr>
			<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
				<thead>
					<tr>
						<th>ລຳດັບ</th>
						<th>ຊື່ລາຍການທີ່ຈ່າຍ</th>
						<th>ຈຳນວນ</th>
						<th>ລາຄາ/ໜ່ວຍ</th>
						<th>ລວມ(ກີບ)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$total = 0;
					$Alltotal = 0;
					foreach ($querypay as $rspay) { 
						$total += $rspay['prices'] * $rspay['amount']; //ລາຄາລວມ ທາງ ກ້າຕ່າ 
						$Alltotal = $rspay['total'] + $total; 
						?>
						
						<tr>
							<td><?= @$i += 1 ?></td>
							<td><?= $rspay["content"]?></td>
							<td><?= $rspay["amount"]?></td>
							<td><?= number_format($rspay["prices"], 0) ?></td>
							<td><?= number_format($rspay['total'], 0) ?></td>
						</tr>
					<?php } ?>
					<?php
					include('../convertnumtoLao.php');
					?>
					<tr>
						<td align='center' colspan="3">
							<b>ລາຄາລວມທັງໝົດ
								(
								<?php echo Convert($total); ?> )
							</b>
							<br>
							<b>ຍອດເງີນທີ່ຈ່າຍ
								(
								<?php echo Convert($total); ?> )
							</b>
							<br>
						</td>
						<td align='center' colspan='2'>
							<b>
								<?php echo number_format($total, 0); ?> ກີບ
							</b>
							<br>
							<b>
								<?php echo number_format($total, 0); ?> ກີບ
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

$mpdf->WriteHTML($html);
$mpdf->Output('report_pdf/Report_expen.pdf');
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
	<a href="report_pdf/Report_expen.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
	
</div>
<br>




