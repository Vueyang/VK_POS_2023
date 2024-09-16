<?php 
session_start();
switch($_SESSION['MM_UserRight']){
  		case 'Admin' :?>
<?php
include("include/top_nav_admin.php");
?>
<?php break;
		case 'seller' : ?>
<?php
		include("include/top_nav_seller.php");
		?>
<?php break;
	case 'banxi' : ?>
		<?php
				include("include/top_nav_banxi.php");
				?>
		<?php break;
		case 'super_Admin' : ?>
			<?php
					include("include/top_nav_super_Admin.php");
					?>
			<?php break;
  } ?>