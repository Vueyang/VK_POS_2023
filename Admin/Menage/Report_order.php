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
							$query_my_order = "SELECT o.* ,m.mem_username FROM tbl_order_receive as o INNER JOIN tbl_member as m ON o.mem_id=m.mem_id WHERE o.order_status=4 ORDER BY o.order_id DESC"
                            or die
                            ("Error : " . mysqlierror($query_my_order));
                            $rs_my_order = mysqli_query($conn, $query_my_order);
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
            <center>
                <label align= "center" style="font-family:'noto Sans Lao'; font-weight:bold; font-size:20px">ສະຫຼຸບລາຍການຂາຍສີນຄ້າ</label>
            </center>
            <br>
			<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
                <thead>
                    <tr class="danger">
                        <th width="10">
                                <center>ລຳດັບ</center>
                            </th>
                            <th width="7%">
                                <center>ລະຫັດ</center>
                            </th>
                            <th width="20%">ພະນັກງານຜູ້ທຳລາຍນີ້</th>
                            <th width="20%">ສະຖານະ</th>
                            <th>ວັນທີເດືອນປີຂາຍ</th>
                    </tr>
                </thead>
				<tbody>
                    <?php foreach ($rs_my_order as $rs_order) { ?>
                        <tr>
                            <td>
                                <?php echo $l += 1 ?>
                            </td>
                            <td>
                                <?php echo $rs_order['order_id']; ?>
                            </td>
                            <td>
                                <?php echo $rs_order['mem_username']; ?>
                            </td>
                            <td>
                                <?php $st = $rs_order['order_status'];
                                $count = $rs_order['order_status'];
                                //print_r($count);
                                //exit();
                                if ($count = 1) {
                                    include('mystatus.php');
                                } elseif ($count = 4) {
                                    include('mystatus.php');
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo date('d/m/y H:i:s:m', strtotime($rs_order['order_date'])); ?>
                            </td>
                        </tr>
                    <?php } ?>
				</tbody>
			</table>
		</div>
	</body>
</html>
<?php
$html = ob_get_contents();

$mpdf->WriteHTML($html);
$mpdf->Output('report_pdf/Report_order_PDF.pdf');
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
	<a href="report_pdf/Report_order_PDF.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
</div>
<br>