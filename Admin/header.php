<?php include("head.php"); ?>

<!-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm sidebar-collapse"> -->

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm sidebar-collapse">
	<!-- Site wrapper -->
	<div class="wrapper">


		<?php //include("navbar.php"); ?>
		<?php //include("sidebar.php"); ?>
		<?php //include("sidebar_2.php"); ?>
		<?php
// 1. ຕ້ອງມີ session_start() ຢູ່ເທິງສຸດຂອງໄຟລ໌ທຸກຄັ້ງທີ່ໃຊ້ $_SESSION
//session_start(); 

// 2. ດຶງລະດັບຜູ້ໃຊ້ຈາກ Session
// ໃຫ້ຄ່າເລີ່ມຕົ້ນເປັນ 0 ຖ້າ 'ref_l_id' ບໍ່ມີ (ໝາຍຄວາມວ່າຜູ້ໃຊ້ຍັງບໍ່ໄດ້ Login ຫຼື Session ຜິດພາດ)
$user_level = isset($_SESSION['ref_l_id']) ? (int)$_SESSION['ref_l_id'] : 0; 

// 3. Include navbar.php ທຸກຄັ້ງ
include("navbar.php"); 

// 4. ເລືອກ Sidebar ທີ່ຈະ Include ຕາມລະດັບຜູ້ໃຊ້
if ($user_level == 1) {
    // ສຳລັບລະດັບ Admin
    include("sidebar.php"); 
} elseif ($user_level == 2) {
    // ສຳລັບລະດັບ HR
    include("sidebar_HR.php"); 
} elseif ($user_level == 3) {
    // ສຳລັບລະດັບ ບັນຊີ (Finance)
    include("sidebar_3.php"); 
} elseif ($user_level == 4) {
    // ສຳລັບລະດັບ 4
    include("sidebar_4.php"); // ສົມມຸດວ່າທ່ານມີ sidebar_4.php
} elseif ($user_level == 5) {
    // ສຳລັບລະດັບ 5
    include("sidebar_5.php"); // ສົມມຸດວ່າທ່ານມີ sidebar_5.php
} elseif ($user_level == 6) {
    // ສຳລັບລະດັບ 6
    include("sidebar_6.php"); // ສົມມຸດວ່າທ່ານມີ sidebar_6.php
} elseif ($user_level == 7) {
    // ສຳລັບລະດັບ 7
    include("sidebar_7.php"); // ສົມມຸດວ່າທ່ານມີ sidebar_7.php
} else {
    // ກໍລະນີທີ່ລະດັບຜູ້ໃຊ້ບໍ່ຖືກຕ້ອງ ຫຼືບໍ່ໄດ້ Login
    // ທ່ານອາດຈະ Redirect ໄປໜ້າ Login, ສະແດງຂໍ້ຄວາມຜິດພາດ, 
    // ຫຼື include sidebar ເລີ່ມຕົ້ນ/ຫວ່າງເປົ່າ
    // ຕົວຢ່າງ: header("Location: login.php"); exit();
    // ຫຼື: include("sidebar_guest.php");
    header("Location: login.php");
	exit();
}

// ໂຄ້ດ HTML ແລະເນື້ອຫາຫຼັກຂອງໜ້າຈະຢູ່ລຸ່ມນີ້
?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
</body>