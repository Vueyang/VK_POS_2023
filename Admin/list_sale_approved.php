<?php $menu = "list_sale_approved" ?>;
<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<h1>ລາຍການລູກຄ້າສັ່ງຊື້</h1>
	</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<div class="card card-gray">
		<div class="card-header ">
			<h3 class="card-title">....</h3>
			<div align="right">

			</div>
		</div>
		<br>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<table id="example1" class="table table-bordered  table-hover table-striped">
						<thead>
							<tr class="danger">
								<th width="7%">
									<center>ລະຫັດການສັ່ງຊື້.</center>
								</th>
								<th width="20%">ຊື່ລູກຄ້າ</th>
								<th width="20%">ທີ່ຢູ່ຈັດສົ່ງ</th>
								<th width="20%">ເບີໂທລະສັບ</th>
								<th width="20%">ສະຖານະ</th>
								<th width="10%">ວັນທີເດືອນປີສັ່ງຊື້</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM tbl_order";
							$result = mysqli_query($conn, $sql);
							//$request = mysqli_fetch_array($result);
							while ($rs_order = mysqli_fetch_array($result)) {

								?>
								<tr>
									<td>
										<?php echo $rs_order['order_id']; ?>
									</td>
									<td>
										<?php echo $rs_order['member_name']; ?>
									</td>
									<td>
										<?php echo $rs_order['member_address']; ?>
									</td>
									<td>
										<?php echo $rs_order['member_phone']; ?>
									</td>
									<td>
										<?php $st = $rs_order['order_status'];
										$cont = $rs_order['order_status'];
										if ($cont = 1) {
											include('mystatus.php');
										} elseif ($cont = 2) {
											include('mystatus.php');
										} elseif ($cont = 3) {
											include('mystatus.php');
										} elseif ($cont = 4) {
											include('mystatus.php');
										}

										?>

									</td>

									<td>
										<?php echo date('d/m/y H:i:s', strtotime($rs_order['order_date'])); ?>
									</td>
									<td>
										<a href="list_sale.php?order_id=<?php echo $rs_order['order_id']; ?>&act=view"
											target="_blank" class="btn btn-success btn-xs"><i
												class="nav-icon fas fa-clipboard-list"></i> ເບີ່ງລາຍການ</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card-footer">

		</div>

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
		// http://fordev22.com/
		// });
	});
</script>

</body>

</html>
<!-- http://fordev22.com/ -->