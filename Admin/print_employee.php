<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Preview</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
	<script src="js/jquery.js" type="text/javascript"></script>
</head>
<style type="text/css">
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

<body style="font-family:'noto Sans Lao';">
	<div>
		<?php
		require("connetdb.php");
		?>
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td align="center">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
			</tr>
			<tr>
				<td align="center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td>ຮ້ານ VK_POS</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td>ບ້ານ ຍອດງື່ມ, ເມືອງແປກ, ແຂວງ ຊຽງຂວາງ</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td>ໂທ: 020 78665114, 02059673954</td>
				<td align="right"></td>
			</tr>
		</table>
		<center><label
				style="font-family:'noto Sans Lao'; font-weight:bold; font-size:20px">ສະຫຼຸບຈໍານວນພະນັກງານ</label>
		</center>
		<label>ຕາຕະລາງລາຍຊື່ພະນັກງານ</label>
		<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
			<thead>
				<tr>
					<th width="50">ລໍາດັບ</th>
					<th width="50">ລະຫັດ</th>
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
				$load_sql = "select * from tbl_member";
				$load_query = $conn->query($load_sql);
				$i = 1;
				$gender = "";
				while ($load_row = $load_query->fetch_row()) {
					if ($load_row == 0) {
						$gender = "ຊາຍ";
					} elseif ($load_row == 1) {
						$gender = "ຍິງ";
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
							<?= $load_row[4] ?>
						</td>
						<td>&nbsp;

							<?= $load_row[2] ?>
							<?= $load_row[3] ?>
						</td>
						<td align="center">
							<?= date('d/m/Y', strtotime($load_row[3])) ?>
						</td>
						<td>&nbsp;
							<?= $load_row[4] ?>
						</td>
						<td>&nbsp;
							<?= $load_row[5] ?>
						</td>
						<td>&nbsp;
							<?= $load_row[6] ?>
						</td>
						<td align="center">
							<?= $load_row[7] ?>
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
</body>

</html>