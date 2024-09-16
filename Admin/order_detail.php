<!DOCTYPE html>
<html>
<?php
include('connetdb.php');
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['default_font_size' => 9,
'default_font' => 'dejavusans']);

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
							$order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
							//echo $order_id;
							$sqlpay = "SELECT d.* , p.* ,
											m.mem_username,o.order_date,o.order_status,o.pay_amount2
											FROM tbl_order_detail AS d
											INNER JOIN product_new AS p ON d.pro_id=p.pro_id
											INNER JOIN tbl_order_receive AS o ON d.order_id=o.order_id
											INNER JOIN tbl_member as m ON o.mem_id=m.mem_id
											WHERE d.order_id=$order_id";
							$querypay = mysqli_query($conn, $sqlpay);
							
							$rowmember = mysqli_fetch_array($querypay);
							$st = $rowmember['order_status'];
							//echo $rowmember;
							//exit();
						?>
						<br>
	<body class="t" style="font-family:'noto Sans Lao'; border-raduis:10px;">
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
					<td align="center" style="font-size: 18px;">ລາຍການສັ່ງຊື້ສີນຄ້າ</td>
				</tr>
				<tr>
					<td align="center" style="font-size: 16px;">ລະຫັດການສັ່ງຊື້: <?php echo "<lable style='color:#FF5580'>" . $order_id ."</lable>"; ?></td>
				</tr>
				<tr>
					<td align="center" style="font-size: 16px;">ວັນທີເດືອນປີສັ່ງຊື້: <?php echo "<lable style='color:#FF5580'>" . date('d/m/y H:i:s:m', strtotime($rowmember['order_date'])) . "</lable>"; ?></td>
				</tr>
				<tr>
					<td align="center" style="font-size: 16px;">ຜູ້ທຳລາຍການ: <?php echo "<lable style='color:#FF5580'>". $rowmember['mem_username'] . "</lable>"; ?></td>
				</tr>
				<tr>
					<td align="center" style="font-size: 16px;">ສະຖານະ: <?php include('mystatus.php'); ?></td>
				</tr>
			</table>
		
			<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
				<thead>
					<tr>
						<th width="5%" align="center">ລຳດັບ</th>
						<th width="10%" align="center">ຮູບ</th>
						<th width="35%" align="center">ສີນຄ້າ</th>
						<th width="10%" align="center">ລາຄາ/ໜ່ວຍ</th>
						<th width="10%" align="center">ຈຳນວນ</th>
						<th width="15%" align="center">ລວມ(ກີບ)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$total = 0;
					foreach ($querypay as $rspay) { 
						$total += $rspay['total']; //ລາຄາລວມ ທາງ ກ້າຕ່າ ?>
						
						<tr>
						<td><?= @$i += 1 ?></td>
						<td><img src="./image/<?= $rspay["image"] ?>" width="100px" > </td>
						<td><?= $rspay["pro_name"]?></td>
						<td align='right'><?= number_format($rspay["price"], 0) ?></td>
						<td align='right'>
						<input type='number' name='p_c_qty' value='<?=$rspay["p_c_qty"]?>' size='2'class='form-control' disabled/></td>
						<td align='right'><?= number_format($rspay['total'], 0) ?></td>
					</tr>
					<?php } ?>
					<?php
					include('../convertnumtoLao.php');
					?>
					<tr>
						<td align='right' colspan="4">
							<b>ລາຄາລວມທັງໝົດ
								(
								<?php echo Convert($total); ?> )
							</b>
							<br>
							<b>ຍອດເງີນທີ່ຮັບຊຳລະ
								(
								<?php echo Convert($rowmember['pay_amount2']); ?> )
							</b>
							<br>
							<?php
							$pay_amount3 = $rowmember['pay_amount2'] - $total;
							//echo $pay_amount3;
							?>
							<!--<b>ເງີນທອນ
								(
								<?php echo Convert($pay_amount3); ?> )

							</b>-->

						</td>
						<td align='right' colspan='2'>
							<b>
								<?php echo number_format($total, 0); ?> ກີບ
							</b>
							<br>
							<b>
								<?php echo number_format($rowmember['pay_amount2'], 0); ?> ກີບ
							</b>
							<br>
							<!--<b>
								<?php echo number_format($pay_amount3, 0); ?> Kip
							</b>-->
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
$mpdf->Output('report_pdf/Report_order_detail.pdf');
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
	<a href="report_pdf/Report_order_detail.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
</div>
<br>