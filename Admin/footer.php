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
<!-- Bootstrap 4 -->
<script src="./sets/bootstrap.bundle.min.js"></script>

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
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<?php if (isset($_GET['mem_editp'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
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
	})
</script>
<?php } ?>
<?php if (isset($_GET['pro_error'])) { ?>
<script>
	Swal.fire({
		title: 'error',
		text: 'ຂໍ້ມູນ Username ຊໍ້າ',
		icon: 'error',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<!--end-------------->
<!-----funtion product_type--------->
<?php if (isset($_GET['pro_type_add'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ບັນທືກຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<?php if (isset($_GET['pro_type_edit'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['product_type_del'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ລືບຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>
<?php if (isset($_GET['save_ok'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ບັນທືກຂໍ້ມູນການສັ່ງສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>


<?php if (isset($_GET['order_cancel'])) { ?>
<script>
	Swal.fire({
		title: 'ລຳເລັດ',
		text: 'ທ່ານໄດ້ຍົດເລີກຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>

<?php if (isset($_GET['order_cancel_error'])) { ?>
<script>
	Swal.fire({
		title: 'Error',
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
		text: 'ທ່ານໄດ້ຢືນຢາຂໍ້ມູນສຳເລັດ',
		icon: 'success',
		confirmButtonText: 'ຕົກລົງ'
	})
</script>
<?php } ?>