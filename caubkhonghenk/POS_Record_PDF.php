<?php
include('connetdb.php');
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['default_font_size' => 9,
'default_font' => 'dejavusans']);
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<title>Document</title>
</head>
<?php
							$nquery = mysqli_query($conn, "SELECT COUNT(mem_id) FROM `tbl_member`");

							$row = mysqli_fetch_row($nquery);
							
                            $nquery_1 = mysqli_query($conn, "SELECT * from  product_new WHERE pro_id  GROUP BY pro_id DESC");
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
				style="font-family:'noto Sans Lao'; font-weight:bold; font-size:20px">ສະຫຼຸບຈໍານວນພະນັກງານທີ່ໃຊ້ລະບົບ</label>
		</center>
		<br>
		<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
			<thead>
            <tr>
								
					<th width="50">ລຳດັບ</th>
					<th width="50">ລະຫັດ</th>
					<th width="50">ຮູບ</th>
					<th>ຊື່ສີນຄ້າ</th>
					<th>ລາຄາ</th>
					<th>ຈຳນວນ</th>
					<th>ລາຍລະອຽດ</th>
                    <th width="100">ຈຳນວນທີ່ຕ້ອງກັນຊື້</th>
                    <th width="50">ໝາຍຕິດ</th>
				</tr>
			</thead>
				<tbody>
									<?php foreach ($nquery_1 as $rs) { ?>
										<tr>
                                        <td>
												<?= $l += 1 ?>
											</td>
                                            <td>
												<?= $rs['pro_id'] ?>
											</td>
											<td><img src="./image/<?= $rs["image"] ?>" width="100px" height="70px"> </td>
											<td>
												<?= $rs['pro_name']?>
											</td>
											<td>
                                            <?= number_format($rs['price'], 0); ?> ກີບ
											</td>
                                            <td>
												<?= $rs['amount'] ?>
											</td>
											<td>
												<?= $rs['detail'] ?>
											</td>
                                            <td></td>
                                            <td></td>
										</tr>
									<?php } ?>
							</tbody>
				
		</table>
		<br>
		<!--<center><button onClick="print_bill()"><i class="fa fa-print"></i> ພີມອອກ</button></center>-->
		
		
		
	</div>
	
</body>
	
</html>
<?php
$html = ob_get_contents();

$mpdf->WriteHTML($html);
$mpdf->Output('Report.pdf');
ob_end_flush();

?>
<a href="Report.pdf"><button class="btn btn-primary">Export PDF</button> </a>