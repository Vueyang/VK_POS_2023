<?php
include('connetdb.php');
include('header.php');


//error_reporting(error_reporting() & ~E_NOTICE);
session_start();
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//exit();
$mem_id = $_SESSION['mem_name'];
//$mem_address = $_SESSION['mem_address'];
$mem_id = $_SESSION['mem_id'];
if (@$_SESSION['mem_id'] == '') {
	session_destroy();
	echo '<script>';
	echo "alert('ບໍ່ສຳເລັດ');";
	echo "window.location='list_sale_approved.php';";
	echo '</script>';
}
$datetime = date('Y-m-d H:i:s');
$order_id = @$_GET['order_id'];
$sql = "UPDATE tbl_order SET order_status = 0, mem_id = '$mem_id', confirm_date = '$datetime' WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
	//echo "<script>window.location='cancel_order.php'</script>";
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'cancel_order.php?order_cancel=cl'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_mem.php?order_cancel_error=cl'; ";
	echo "</script>";
	//echo "<script>alert('ຂໍ້ມູນມີບາງຢ່າງຜິດພາບ')</script>";
}
mysqli_close($conn);
?>