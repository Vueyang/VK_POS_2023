<style>
	* {
		font-family: 'Noto Sans Lao', sans-serif;
	}
</style>


<aside class="main-sidebar sidebar-dark-gray elevation-4">
	<!-- Brand Logo -->
	<!-- <a href="" class="brand-link bg-gray">
	  <img src="../assets/img/FD22.png"
		   alt="AdminLTE Logo"
		   class="brand-image img-circle elevation-3"
		   style="opacity: .8">
	  <span class="brand-text font-weight-light">FD22 | POS System</span>
	</a> -->


	<a href="" class="brand-link bg-gray">
		<img src="./image/vk.jpg" alt="AdminLTE Logo" class="brand-image">
		<span class="brand-text font-weight-light">VK2023 | POS System</span>
	</a>

	<!-- Sidebar -->
	<br>
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-2 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="./image/<?php echo $_SESSION['en_image']; ?>" class="img-circle elevation-2" alt="User Image">
				<!-- <img src="../assets/img/FD22.png" class="img-circle elevation-2" alt="User Image"> -->
			</div>
			<div class="info">
				<a href="edit_profile.php?id<?= $_SESSION['mem_id'] ?>" target="" class="d-block">
					<?php echo $_SESSION['mem_username']; ?> | Edit
					Profile</a>
			</div>
		</div>



		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<!-- nav-compact -->

			<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-header">Dashboard</li>
				<li class="nav-item">
					<a href="Dashboard.php" class="nav-link <?php if ($menu == "Dashboard") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="report_p5.php" class="nav-link <?php if ($menu == "report_p5") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-crown text-fuchsia"></i>
						<p>5 ອັນດັບສີນຄ້າຍອດຂາຍດີ</p>
					</a>
				</li>
			</ul>
			<hr>
			<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-header">ເມນູຟ່າຍບັນຊີ</li>
				<li class="nav-item">
					<a href="#" class="nav-link <?php if ($menu == "Report_Receip") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍຮັບ</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link <?php if ($menu == "Report_Expens") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍຈ່າຍ</p>
					</a>
				</li>
			</ul>
			<br>
			<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-header">ເມນູສຳລັບການຂາຍ</li>
				<li class="nav-item">
					<a href="list_sale_approved.php" class="nav-link <?php if ($menu == "list_sale_approved") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-cart-plus"></i>
						<p>ຢືນຢັນການສັ່ງຊື້ </p>
					</a>
				</li>
				<li class="nav-item">
					<a href="list_sale.php" class="nav-link <?php if ($menu == "list_sale") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍການຂາຍ </p>
					</a>
				</li>


				<li class="nav-item">
					<a href="list_sale_pro.php" class="nav-link <?php if ($menu == "sale_pro") {
						echo "active";
					} ?> ">
						<i class="nav-icon fa fa-shopping-cart "></i>
						<p>ຂາຍສີນຄ້າ </p>
					</a>
				</li>
				<li class="nav-item">
					<a href="show_Pro_type.php" class="nav-link <?php if ($menu == "pro_type") {
						echo "active";
					} ?> ">
						<i class="nav-icon fa fa-calendar-plus "></i>
						<p>ຂໍ້ມູນປະເພດສີນຄ້າ </p>
					</a>
				</li>
				<li class="nav-item">
					<a href="frm_Show_product.php" class="nav-link <?php if ($menu == "product") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-calendar-plus "></i>
						<p>ຂໍ້ມູນສີນຄ້າ </p>
					</a>
				</li>
				<li class="nav-item">
					<a href="product_stock.php" class="nav-link <?php if ($menu == "product_stock") {
						echo "active";
					} ?> ">
						<i class="nav-icon far fa-calendar-plus "></i>
						<p>ຂໍ້ມູນສີນຄ້າທີຄົງເຫຼືອ < 10 ອັນ </p>
					</a>
				</li>
			</ul>
			<hr>
			<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-header">ການຕັ້ງຄ່າຂໍ້ມູນລະບົບ</li>

				<li class="nav-item">
					<a href="list_mem.php" class="nav-link <?php if ($menu == "member") {
						echo "active";
					} ?> ">
						<i class="nav-icon fa fa-users"></i>
						<p>ຂໍ້ມູນສະມາຊີກ </p>
					</a>
				</li>
				<li class="nav-item">
					<a href="list_employee.php" class="nav-link <?php if ($menu == "employee") {
						echo "active";
					} ?> ">
						<i class="nav-icon fa fa-copy"></i>
						<p>ຂໍ້ມູນພະນັກງານ </p>
					</a>
				</li>
			</ul>

					<hr>
			<!--<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
				data-accordion="false">

				<li class="nav-item">
					<a href="logout.php" class="nav-link text-danger">
						<i class="nav-icon fas fa-power-off"></i>
						<p>ອອກຈະລະບົບ</p>
					</a>
				</li>

			</ul>-->
		</nav>
		<!-- /.sidebar-menu -->
		<!-- http://fordev22.com/ -->
	</div>
	<!-- /.sidebar -->
</aside>