</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 1.1.0
	</div>
	<strong>Copyright &copy; POS VK<a href="#"> VK Channel</a>.</strong> All rights
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

<!-- Bootstrap 4 -->
<!-- http://fordev22.com/ -->
<script src="../Admin/assets/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../Admin/assets/jquery.dataTables.js"></script>
<script src="../Admin/assets/dataTables.bootstrap4.js"></script>
<script src="../Admin/assets/tagsinput.js?v=1"></script>

<!-- Select2 -->
<!-- http://fordev22.com/ -->
<script src="../Admin/assets/sweetalert2@9.js"></script>



<!-- AdminLTE App -->
<script src="../Admin/assets/adminlte.min.js"></script>





<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- http://fordev22.com/ -->

<script>
$(document).ready(function() {
	//$('.sidebar-menu').tree();
	//$('.select2').select2();
	//Initialize Select2 Elements
	$('.select2').select2({
		theme: 'bootstrap4'
	})
})
</script>




<script>
$(function() {
	$('#example1').DataTable()
	$('#example2').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': false,
		'ordering': true,
		'info': true,
		'autoWidth': false
	})
})
</script>

<!-- http://fordev22.com/ -->