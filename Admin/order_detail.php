<?php
include('connetdb.php');
$order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
//echo $order_id;
$sqlpay = "SELECT d.* , p.* ,
				m.mem_name,o.order_date,o.order_status,o.pay_amount2
				FROM tbl_order_detail AS d
				INNER JOIN product_new AS p ON d.pro_id=p.pro_id
				INNER JOIN tbl_order AS o ON d.order_id=o.order_id
				INNER JOIN tbl_member as m ON o.mem_id=m.mem_id
				WHERE d.order_id=$order_id";
$querypay = mysqli_query($conn, $sqlpay);
$rowmember = mysqli_fetch_array($querypay);
$st = $rowmember['order_status'];
?>
<center>
	<h4>ລາຍການສັ່ງຊື້ສີນຄ້າ<br>
		<h6>Order Id :
			<?php echo $order_id; ?>
		</h6>
		<h6>ວ/ດ/ປ :
			<?php echo date('d/m/y', strtotime($rowmember['order_date'])); ?>
		</h6>
		<h6>ຜູ້ທຳລາຍການ :
			<?php echo $rowmember['mem_name']; ?> <br />ສະຖານະ :
			<?php include('mystatus.php'); ?>
		</h6>
	</h4>
</center>

<table border="0" align="center" class="table table-hover table-bordered table-striped">

	<tr>
		<td width="5%" align="center">ລຳດັບ</td>
		<td width="10%" align="center">ຮູບ</td>
		<td width="35%" align="center">ສີນຄ້າ</td>
		<td width="10%" align="center">ລາຄາ/ໜ່ວຍ</td>
		<td width="10%" align="center">ຈຳນວນ</td>
		<td width="15%" align="center">ລວມ(ກີບ)</td>
	</tr>
	<?php
	$total = 0;
	foreach ($querypay as $rspay) {
		$total += $rspay['total']; //ราคารวม ทั้ง ตระกร้า
		echo "<tr>";
		echo "<td>" . @$i += 1 . "</td>";
		echo "<td>" . "<img src='image/" . $rspay['image'] . "' width='100%'>" . "</td>";
		echo "<td>" . $rspay["pro_name"] . "</td>";
		echo "<td align='right'>" . number_format($rspay["price"], 0) . "</td>";
		echo "<td align='right'>";
		echo "<input type='number' name='p_c_qty' value='$rspay[p_c_qty]' size='2'class='form-control' disabled/></td>";
		echo "<td align='right'>" . number_format($rspay['total'], 0) . "</td>";
	}
	include('../convertnumtothai.php');
	?>
	<tr>
		<td></td>
		<td align='right' colspan="3">
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
			<b>ເງີນທອນ
				(
				<?php echo Convert($pay_amount3); ?> )

			</b>

		</td>
		<td align='right' colspan='2'>
			<b>
				<?php echo number_format($total, 0); ?> Kip
			</b>
			<br>
			<b>
				<?php echo number_format($rowmember['pay_amount2'], 0); ?> Kip
			</b>
			<br>
			<b>
				<?php echo number_format($pay_amount3, 0); ?> Kip
			</b>
		</td>
	</tr>
</table>
<br>
<a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a>