</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 1.1.0
	</div>
	<strong>Copyright &copy; POS VK 2023<a href="#">VK Channel</a>.</strong> All rights
	reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->



<script src="./assets/jquery.min.js"></script>
<!-- Bootstrap 4
<script src="./sets/bootstrap.bundle.min.js"></script> -->

<!-- Select2 -->
<script src="./assets/select2.full.min.js"></script>
<!-- DataTables -->
<script src="./assets/jquery.dataTables.js"></script>
<script src="./assets/dataTables.bootstrap4.js"></script>
<script src="./assets/tagsinput.js?v=1"></script>

<script src="./assets/sweetalert2@9.js"></script>

<script src="./assets/adminlte.min.js"></script>

<!-- AdminLTE App -->
<script src="./assets/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- http://fordev22.com/ -->


<script>
	$(document).ready(function () {
		//$('.sidebar-menu').tree();
		//$('.select2').select2();
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})
</script>

<script>
	$(function () {

		// cb(start, end);
		// $('#createContactModal').modal('show')
		$('#example1').DataTable({
			"order": [
				[0, "desc"]
			],
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			],

		});



	});
</script>
<!-----funtion member--------->
<?php if (isset($_GET['mem_add'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ບັນທືກຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ',
	}).then(() => {
		location.href = "list_mem.php";
	});
</script>
<?php } ?>
<?php if (isset($_GET['mem_editp'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ',
	}).then(() => {
		location.href = "list_mem.php";
	});
</script>
<?php } ?>

<?php if (isset($_GET['mem_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຊື່ນີ້ມີຢູ່ແລ້ວ',
		icon: 'error',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "list_mem.php";
	})
</script>
<?php } ?>

<?php if (isset($_GET['mem_del'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ລືບຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "list_mem.php";
	})
</script>
<?php } ?>
<!-----funtion end member--------->
<!-----funtion product--------->
<?php if (isset($_GET['pro_add'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ບັນທືກຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "frm_Show_product.php";
	})
</script>
<?php } ?>
<?php if (isset($_GET['pro_edit'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "frm_Show_product.php";
	})
</script>
<?php } ?>
<?php if (isset($_GET['product_del'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ລືບຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "frm_Show_product.php";
	})
</script>
<?php } ?>
<?php if (isset($_GET['pro_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ມີຂໍ້ມູນຢູ່ແລ້ວ',
		icon: 'error',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "frm_Show_product.php";
	})
</script>
<?php } ?>
<!--end-------------->
<!-----funtion product_type--------->
<?php if (isset($_GET['pro_type_add'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ບັນທືກຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "show_Pro_type.php";
	})
</script>
<?php } ?>
<?php if (isset($_GET['pro_type_edit'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "show_Pro_type.php";
	})
</script>
<?php } ?>


<?php if (isset($_GET['product_type_del'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ລືບຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	}).then(() => {
		location.href = "show_Pro_type.php";
	})
</script>
<?php } ?>

<?php if (isset($_GET['save_ok'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ບັນທືກຂໍ້ມູນການສັ່ງສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['order_cancel'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ຍົດເລີກຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<?php if (isset($_GET['order_cancel_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['confirm_order'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ຢືນຢາຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['confirm_order_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['pro_stock'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ເພີ່ມຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['pro_stock_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<?php if (isset($_GET['en_edit'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['en_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<?php if (isset($_GET['en_del'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ລືບຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<?php if (isset($_GET['en_add'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ເພີ່ມຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['en_add_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<!--step add exchage-->
<?php if (isset($_GET['exchage_add'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ເພີ່ມຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['exchage_add_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<!--step edit exchage-->

<?php if (isset($_GET['exchage_edit'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<?php if (isset($_GET['exchage_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<!---step delete exchage--->
<?php if (isset($_GET['exchage_del'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ລືບຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<!--- step error delete exchage---->
<?php if (isset($_GET['exchage_error'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານບໍ່ສາມາດລືບຂໍ້ມູນນີ້ໄດ້',
		icon: 'error',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<!---step edit expen--->

<?php if (isset($_GET['expen_edit'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<?php if (isset($_GET['expen_error'])) { ?>
<script>
	Swal.fire({
		title: 'ບໍ່ລຳເລັບ',
		text: 'ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<!---step delete expen--->
<?php if (isset($_GET['expen_del'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ລືບຂໍ້ມູນສຳເລັດແລ້ວ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<?php if (isset($_GET['expen_error'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານບໍ່ສາມາດລືບຂໍ້ມູນນີ້ໄດ້',
		icon: 'error',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>