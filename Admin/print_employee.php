<!DOCTYPE html>
<html>

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

<body style="font-family:'noto Sans Lao'; border-raduis:10px;">
<br>
	<div style="border-raduis:10px; height: 100%;">
		<?php
		require("connetdb.php");
		?>
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
				style="font-family:'noto Sans Lao'; font-weight:bold; font-size:20px">ສະຫຼຸບຈໍານວນພະນັກງານ</label>
		</center>
		<br>
		<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
			<thead>
				<tr>
					<th width="50">ລໍາດັບ</th>
					<th width="50">ລະຫັດ</th>
					<th width="50">ຮູບ</th>
					<th width="50">ເພດ</th>
					<th>ຊື່ ແລະ ນາມສະກຸນ</th>
					<th>ວັນເດືອນປີເກີດ</th>
					<th>ບ່ອນຢູ່</th>
					<th>ຕໍາແໜ່ງ</th>
					<th>ໜ້າທີ່ຮັບຜິດຊອບ</th>
					<th>ເບີໂທ</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$load_sql = "SELECT * FROM tbl_employee";
				$load_query = $conn->query($load_sql);
				$i = 1;
				$gender = "";
				while ($load_row = $load_query->fetch_row()) {
					if ($load_row[1] == 0) {
						$gender = "ຊາຍ";
					} elseif ($load_row[1] == 1) {
						$gender = "ຍິງ";
					}else{
						$gender="";
					}
					?>
					<tr>
						<td align="center">
							<?= $i ?>
						</td>
						<td align="center">
							<?= $load_row[0] ?>
						</td>
						<td align="center">
						<img src="./image/<?= $load_row[12] ?>" width="100px" height="90px">
					 </td>
						
						<td align="center">
							<?= $gender ?>
						</td>
						<td>&nbsp;

							<?= $load_row[2] ?>
							<?= $load_row[3] ?>
						</td>
						<td align="center">
							<?= date('d/m/Y', strtotime($load_row[4])) ?>
						</td>
						<td>&nbsp;
							<?= $load_row[7] ?>
							<?= $load_row[8] ?>
							<?= $load_row[9] ?>
						</td>
						<td>&nbsp;
							<?= $load_row[10] ?>
						</td>
						<td>&nbsp;
							<?= $load_row[11] ?>
						</td>
						<td align="center">
							<?= $load_row[5] ?>
						</td>
					</tr>
					<?php
					$i++;
				}
				?>
			</tbody>
		</table>
		<br>
		<center><button onClick="print_bill()"><i class="fa fa-print"></i> ພີມອອກ</button></center>
		
	</div>
	<script>
		function print_bill() {
			window.print();
		}
	</script>
	<br>
</body>

</html>