<?php
include("connetdb.php");
$menu = "product_stock";
?>
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<?php
$pro_id = $_GET['id'];

$sql = "SELECT * FROM product_new WHERE pro_id = '$pro_id'";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
?>

<body>
	<!-- Main content -->
	<br>
	<section class="content ">
		<div class="card card-gray">
			<!-- Modal Header -->
			<div class="alert card-header h4 text-center" role="alert">
				ຟອນເພີ່ມສະຕ໋ອນສີນຄ້າ
			</div>
			<!-- Modal body -->

			<div class="col-sm-12">
				<form name="frm-stock" method="POST" action="add_stock_pro.php">
					<label for="text">ລະຫັດສີນຄ້າ:</label>
					<input type="text" name="pro_id" class="form-control" value="<?= $rs['pro_id'] ?>" readonly required
						placeholder="ລະຫັດສີນຄ້າ">
					<br>
					<label for="text">ຊື່ສີນຄ້າ:</label>
					<input type="text" name="pro_name" class="form-control" value="<?= $rs['pro_name'] ?>" readonly
						required placeholder="ຊື່ສີນຄ້າ">
					<br>
					<label for="text">ຈຳນວນ:</label>
					<input type="number" name="p_amount" class="form-control" value="<?= $rs['amount'] ?>" required
						placeholder="ຈຳນວນ">
					<div class="button mb-4 mt-4 d-flex gap-2">
						<a class="btn btn-danger" href="product_stock.php">ຍົກເລີກ</a>
						<button type="submit" class="btn btn-primary grid d-flex hstack gap-2"><i
								class="fa fa-save"></i>ບັນທືກ</button>
					</div>
				</form>
			</div>

	</section>

	<!-- The Modal -->


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
		});	</script>

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