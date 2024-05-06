<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();

$mem_id = $_SESSION['mem_id'];
//echo $mem_id;
//exit;
$p_id = mysqli_real_escape_string($conn, $_GET['pro_id']);
$actdd = mysqli_real_escape_string($conn, 'add');
$act = mysqli_real_escape_string($conn, $_GET['act']);

if ($actdd == 'add' && !empty($p_id)) //ກວດວ່າ $act=='add' ແລະ p_id ຖ້າບໍ່ແມ່ນຄ່າຫວ່າງໃຫ້ທຳເງື່ອນໄຂນີ້
{
	if (isset($_SESSION['cart'][$p_id])) //ຖ້າມີ p_id ໃນກະຕ່າ
	{
		$_SESSION['cart'][$p_id] = 1; //ໃຫ້ສີນຄ້າເທົ່າກັບ = 1 	
		//$_SESSION['cart'][$p_id]++; //ໃຫ້ເພີ່ມທີລະ1
	}else //ຖ້າບໍ່ເຈີໃຫ້ສີນຄ້າທີ່ສົ່ງມານັ້ນ
	{
		//$_SESSION['cart'][$p_id] = 1; //ໃຫ້ສີນຄ້າເທົ່າກັບ = 1
		$_SESSION['cart'][$p_id]++; //ໃຫ້ເພີ່ມທີລະ1
	}
}

// session_destroy();
//header("location: cart.php");

/*echo'<pre>';
print_r($_SESSION);
echo'</pre>';
exit();*/




if ($act == 'remove' && !empty($p_id)) //ຍົກເລີກການສັ່ງຊື້
{
	unset($_SESSION['cart'][$p_id]);
}

if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$_SESSION['cart'][$p_id] = $amount;
	
	}
}
?>
<form id="frmcart" name="frmcart" method="post"
	action="?t_id=<?php echo $t_id; ?>&b_id=<?php echo $b_id; ?>=1&act=update">
	<h4>ລາຍການສັ່ງຊື້</h4>
	<br>
	<table border="0" align="center" class="table table-hover table-bordered table-striped">

		<tr>
			<td width="1%">ລ/ດ</td>

			<td width="5%">ຊື່ສີນຄ້າ</td>
			<td width="4%">ລາຄາ</td>
			<td width="15%">ຈຳນວນ</td>
			<td width="4%">ລວມ(ກີບ)</td>
			<td width="3%">ລົບ</td>
		</tr>
		<?php

		$total = 0;
		if (!empty($_SESSION['cart'])) {

			foreach ($_SESSION['cart'] as $p_id => $qty) {
				$sql = "SELECT * FROM product_new where pro_id=$p_id";
				$query = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($query);
				$sum = $row['price'] * $qty; //ເອົາລາຄາສີນຄ້າມາ * ຈຳນວນ
				$total += $sum; //ລາຄາທັງໝົດ
				echo "<tr>";
				echo "<td>" . $ii += 1 . "</td>";

				echo "<td>"

					. $row["pro_name"]
					/*. "<br>"
					. "ສະຕ໋ອກ "
					. $row['amount']
					. " ລາຍການ"*/

					. "</td>";
				echo "<td align='right'>" . number_format($row["price"], 0) . "</td>";
				echo "<td align='right'>";



				$pqty = $row['amount']; //ປະກາດຕົວແປຈຳນວນສີນຄ້າໃນ stock
				echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0' max='$pqty'/>";


				echo "<td align='right'>" . number_format($sum, 0) . "</td>";

				//remove product
		
				echo "<td align='center'><a href='list_sale_pro.php?pro_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ລົບ</a></td>";
				echo "</tr>";

			}
			echo "<tr>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";

			echo "<td bgcolor='#CEE7FF' align='center'><b>ລາຄາລວມ</b></td>";
			echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 0) . "</b>" . "</td>";
			echo "<td align='left' bgcolor='#CEE7FF'></td>";
			echo "</tr>";
		}
		?>

	</table>
	<p align="right">
		<!-- <a href="list_l.php" class="btn btn-info">กลับหน้ารายการสินค้า</a> -->


		<!-- <a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a> -->

		<input type="submit" name="button" id="button" value="ປັບປຸງ" class="btn btn-warning" />
		<input type="button" name="Submit2" value="ຂາຍ" onclick="window.location='confirm_a.php';"
			class="btn btn-primary" />
		<!--<input type="hidden" name="t_id" value="<?php echo $t_id; ?>">
		<input type="hidden" name="b_id" value="<?php echo $b_id; ?>">-->




	</p>
</form>