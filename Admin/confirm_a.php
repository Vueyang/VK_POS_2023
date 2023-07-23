<?php
$menu = "sale_pro";
?>

<?php include("header.php"); ?>

<?php

//echo'<pre>';
//print_r($_SESSION);
//echo'</pre>';
//exit();



error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id = $_SESSION['mem_id'];
$mem_address = $_SESSION['mem_address'];
?>

<!-- Content Header (Page header) -->
<!--<section class="content-header">
	<div class="container-fluid">
		<h1>ລາຍການສີນຄ້າທີ່ສັ່ງຊື້ທັງໝົດ</h1>
	</div>
	<!-- /.container-fluid
</section>-->

<!-- Main content -->
<section class="content mt-4">


	<div class="card card-gray ">
		<div class="card-header ">
			<h2>ລາຍການສີນຄ້າທີ່ສັ່ງຊື້ທັງໝົດ</h2>
		</div>
		<br>
		<div class="card-body">
			<div class="col-md-12">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12">
							<form id="frmcart" name="frmcart" method="post" action="saveorder_a.php">
								<?php if ($p_id != '') { ?>

									<h4>ຢືນຢັນລາຍການສັ່ງຊື້<br>
										ຊື່ຜູ້ :
										<?php echo $row_member['mem_name']; ?> <br />Address :
										<?php echo $row_member['mem_address']; ?>
									</h4>
								<?php } ?>

								<table border="0" align="center" class="table table-hover table-bordered table-striped">

									<tr>
										<td width="5%" align="center">ລຳດັບ</td>
										<td width="10%" align="center">ຮູບ</td>
										<td width="40%" align="center">ສີນຄ້າ</td>
										<td width="10%" align="center">ລາຄາ</td>
										<td width="10%" align="center">ຈຳນວນ</td>
										<td width="15%" align="center">ລວມ(ກີບ)</td>

									</tr>
									<?php

									$total = 0;
									if (!empty($_SESSION['cart'])) {
										foreach ($_SESSION['cart'] as $p_id => $qty) {
											$sql = "SELECT * FROM product_new where pro_id=$p_id";
											$query = mysqli_query($conn, $sql);
											$row = mysqli_fetch_array($query);
											$sum = $row['price'] * $qty; //เอาราคาสินค้ามา * จำนวนในตระกร้า
											$total += $sum; //ราคารวม ทั้ง ตระกร้า
											echo "<tr>";
											echo "<td>" . $i += 1 . "</td>";
											echo "<td>" . "<img src='image/" . $row['image'] . "' width='100%'>" . "</td>";
											echo "<td>"

												. $row["pro_name"]
												. "<br>"
												. "ສະຕ໋ອກ "
												. $row['amount']
												. " ລາຍການ"

												. "</td>";
											echo "<td align='right'>" . number_format($row["price"], 0) . "</td>";
											echo "<td align='right'>";
											$pqty = $row['amount']; //ประกาศตัวแปรจำนวนสินค้าใน stock
											echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty' readonly/></td>";
											echo "<td align='right'>" . number_format($sum, 2) . "</td>";
											//remove product
										}
										echo "<tr>";
										echo "<td></td>";
										echo "<td></td>";
										echo "<td></td>";
										echo "<td  align='center'><b>ລາຄາລວມ</b></td>";
										echo "<td align='right'colspan='2'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
										echo "</tr>";
									}
									?>
								</table>
								<?php if ($mem_id != '') { ?>

									<div class="form-group row">
										<label for="" class="col-sm-2 col-form-label">ຍອດເງີນທີ່ຕ້ອງຊຳລະ</label>
										<div class="col-sm-5">
											<input type="text" name="pay_amount" readonly class="form-control" id=""
												value="<?php echo ($total); ?>" placeholder="">
										</div>
									</div>



									<div class="form-group row">
										<label for="" class="col-sm-2 col-form-label">ຍອດເງີນທີ່ຮັບຊຳລະ</label>
										<div class="col-sm-5">
											<input type="number" min="<?php echo $total; ?>" name="pay_amount2" required
												class="form-control" id="" placeholder="">
										</div>
									</div>


									<div class="form-group row">
										<label for="" class="col-sm-2 col-form-label"></label>
										<div class="col-sm-5">
											<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>">

											<button type="submit"
												class="btn  btn-primary btn-block">ຢືນຢັນການສັ່ງຊື້</button>
										</div>


									<?php } else { ?>
										<button class="btn btn-success" onclick="window.print()">Print</button>

									<?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		</div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>
<script>
	$(function () {
		$(".datatable").DataTable();
		// $('#example2').DataTable({
		//   "paging": true,
		//   "lengthChange": false,
		//   "searching": false,
		//   "ordering": true,
		//   "info": true,
		//   "autoWidth": false,
		// });
	});
</script>

</body>

</html>