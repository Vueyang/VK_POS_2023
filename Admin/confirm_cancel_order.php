<?php
include('connetdb.php');
include('header.php');


//error_reporting(error_reporting() & ~E_NOTICE);
session_start();
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//exit();
$mem_id = $_POST['mem_id'];
//$mem_address = $_SESSION['mem_address'];

$order_id = @$_GET['order_id'];
$sql = "UPDATE tbl_order SET order_status = 0 WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
	echo "<script>window.location='bill_detail_confirm.php'</script>";
} else {
	echo "<script>alert('ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ')</script>";
}
mysqli_close($conn);
?>