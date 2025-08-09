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
		
				<li class="nav-item">
					<a href="Dashboard_HR.php" class="nav-link <?php if ($menu == "Dashboard_HR") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
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
			 <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-header">ເມນູລາຍງານ</li>
				<li class="nav-item">
					<a href="Report_employee.php" class="nav-link <?php if ($menu == "Report_employee") {
						echo "active";
					} ?> ">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>ລາຍງານຂໍ້ມູນພະນັກງານ</p>
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