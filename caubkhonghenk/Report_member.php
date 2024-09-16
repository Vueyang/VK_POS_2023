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
							$nquery = mysqli_query($conn, "SELECT COUNT(mem_id) FROM `tbl_member`");

							$row = mysqli_fetch_row($nquery);
							
                            //$nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member WHERE mem_id  GROUP BY mem_id DESC");
							$nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY m.mem_id DESC");
							//$load_sql = "SELECT * FROM product_new";
				//$load_query = $conn->query($load_sql);
                            //$row_1 = mysqli_fetch_array($nquery_1);
                            //echo $nquery_1;
						?>
                        
<body style="font-family:'noto Sans Lao'; border-raduis:10px;">

<br>
	<div style="border-raduis:10px; height: 100%;">
		
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td align="center" style="font-size: 20px;">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
			</tr>
			<tr>
				<td align="center" style="font-size: 20px;">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td style="font-size: 20px;">ຮ້ານ VK_POS</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 18px;">ຕັ້ງຢູ່ສາມແຍກຕະຫຼາດເກົ່າເມືອງລ້ອງຊານ ບ້ານ ຄອນວັດ, ເມືອງ ລ້ອງຊານ, ແຂວງ ໄຊສົມບູນ</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 16px;">ໂທ: 020 78665114, 020 78779149</td>
				<td align="right"></td>
			</tr>
		</table>
		<center><label
				style="font-family:'noto Sans Lao'; font-weight:bold; font-size:20px">ສະຫຼຸບຈໍານວນພະນັກງານທີໃຊ້ລະບົບ VK_POS</label>
		</center>
		<br>
		<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
			<thead>
            <tr>
                                    <th align="center">ລຳດັບ</th>
                                    <th align="center">ລະຫັດ</th>
                                    <th align="center">ຮູບ</th>
                                    <th align="center">ຊື່ ແລະ ນາມສະກຸນ</th>
                                    <th align="center">ຊື່ຜູ້ໃຊ້ລະບົບ</th>
                                    <th align="center">ສິດທີ</th>
                                </tr>
			</thead>
				<tbody>
				<?php if($row > 0) { ?>
									<?php foreach ($nquery_1 as $rs) { ?>
										<tr>
											<td>
												<?= $l += 1 ?>
											</td>
                                            <td>
												<?= $rs['mem_id'] ?>
											</td>
											<td><img src="./image/<?= $rs["en_image"] ?>" width="100px" height="90px"> </td>
											<td>
												<?= $rs['en_name'], $rs['en_lastname'] ?>
											</td>
											<td>
												<?= $rs['mem_username'] ?>
											</td>
											<td>
												<?= $rs['responsible']; ?>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
				
		</table>
	</div>
	
</body>

</html>
<?php
$html = ob_get_contents();

$mpdf->WriteHTML($html);
$mpdf->Output('report_pdf/Report_member.pdf');
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
	<a href="report_pdf/Report_member.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
</div>
<br>

