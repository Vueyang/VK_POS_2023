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
							//echo $expen_id;
							if($expen_id !=""){
								$sqlpay = "SELECT * FROM tb_expens";
							}else{
								$sqlpay = "SELECT * FROM tb_expens";
							}
							
							$querypay = mysqli_query($conn, $sqlpay);
							
							$rowmember = mysqli_fetch_array($querypay);
							//print_r($querypay);
							 //exit();
							//$st = $rowmember['order_status'];



							$nquery = mysqli_query($conn, "SELECT COUNT(expen_id) FROM `tb_expens`");
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
							$dt1 = mysqli_real_escape_string($conn, $_GET['expen_date']);
							$dt2 = mysqli_real_escape_string($conn, $_GET['date_end']);
							//echo $dt1;
							//echo $dt2;
							//exit();
							$text1 = "ລາຍງານວັນທີ";
							$text2 = "ຫາ";
							$t="ລາຍງານທັງໝົດ";
							$date_to_date = date('Y/m/d', strtotime($dt2 . "+1 days")); //ຈາກ query ເອົາຂໍ້ມູນຈາກວັນທີ່ທີ່ເຮົາເລືອກຈາກເລີ່ມຕົ້ນຖືວັນທີ່ເຮົາຕ້ອງການມາສະແດງ
							if (($dt1 != "") & ($dt2 != "")) {
								$txt="ລາຍງານວັນທີເດືອນປີ $dt1 ຫາ $dt2 ";
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens WHERE expen_date BETWEEN '$dt1' and '$date_to_date' ");
								
							}else{
								//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens ");
								$txt = $t;
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
					<td align="center" style="font-size: 18px;">ລາຍງານລາຍຈ່າຍຊື້ເຄື່ອງໃຊ້ໃນຮ້ານ</td>
				</tr>
				<tr>
					<td align="center" style="font-size: 20px; color:red;"> <?php echo $txt?></td>
				</tr>
				<tr>
					<td align="center" style="font-size: 16px;">ຜູ້ທຳລາຍການ: <?php echo "<lable style='color:#FF5580'>". $_SESSION['mem_username'] . "</lable>"; ?></td>
				</tr>
			</table>
		
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
					$total = 0;
					foreach ($nquery_1  as $rspay) { 
						$total += $rspay['prices'] * $rspay['amount']; //ລາຄາລວມ ທາງ ກ້າຕ່າ ?>
						
						<tr>
						<td><?= @$i += 1 ?></td>
						<td><?= $rspay["content"]?></td>
						<td><?= $rspay["amount"]?></td>
						<td align='right'><?= number_format($rspay["prices"], 0) ?></td>
						<td align='right'><?= number_format($total, 0) ?></td>
					</tr>
					<?php } ?>
					<?php
					include('../convertnumtoLao.php');
					?>
					<tr>
						<td align='end' colspan="3">
							<b>ລາຄາລວມທັງໝົດ
								(
								<?php echo Convert($total); ?> ):
							</b>
							<br>
							<b>ຍອດເງີນທີ່ຈ່າຍ
								(
								<?php echo Convert($total); ?> ):
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