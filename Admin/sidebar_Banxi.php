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
				<li class="nav-header">Dashboard</li>
		<li class="nav-item">
			<a href="Dashboard_BanXi.php" class="nav-link <?php if($menu == "Dashboard"){
				echo "active";}?>">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>Dashboard</p>	
			</a>
		</li>
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-header">ເມນູຟ່າຍບັນຊີ</li>
				<li class="nav-item">
					<a href="Report_Receip.php" class="nav-link <?php if ($menu == "Receip") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍຮັບ</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="list_Expens.php" class="nav-link <?php if ($menu == "list_Expens") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍຈ່າຍ</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="form_exchange.php" class="nav-link <?php if ($menu == "form_exchange") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ອັບຕາເລກປ່ຽນ</p>
					</a>
				</li>
				
			</ul>
			
			<hr>
			<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-header">ເມນູລາຍງານ</li>
				
				<li class="nav-item">
					<a href="Report_receive_daily.php" class="nav-link <?php if ($menu == "Report_Receip") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍງານລາຍຮັບ</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="Report_Expens_admin.php" class="nav-link <?php if ($menu == "R_Expens") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍງານລາຍຈ່າຍ</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="Report_exchange_admin.php" class="nav-link <?php if ($menu == "R_exchange") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍງານອັບຕາເລກປ່ຽນ</p>
					</a>
				</li>
				
			</ul>
			<br>
		</nav>
		<!-- /.sidebar-menu -->
		<!-- http://fordev22.com/ -->
	</div>
	<!-- /.sidebar -->
</aside>