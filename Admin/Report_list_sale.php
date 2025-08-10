<?php $menu = "Report_list_sale" ?>;
<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

	<!-- Main content -->
	<br>
	<div class="container">
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">

				<h3 class="card-title " style="font-size: 2rem;">ລາຍງານການຂາຍໜ້າຮ້ານ</h3>

			</div>
			<br>
			
			<div class="card-body">
				<?php
				include('Report_list_order.php');
				/*$act = (isset($_GET['act']) ? $_GET['act'] : '');
				if ($act == 'view') {

					include('order_detail.php');
					//include('list_order.php');


				} else {
					
					
				} */?>
			</div>
			<div class="card-footer">

			</div>

		</div>

	</section>
	</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="./css_js/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="./css_js/js/datatables-simple-demo.js"></script>

</html>