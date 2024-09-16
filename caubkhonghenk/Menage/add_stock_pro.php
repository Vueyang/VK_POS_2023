<?php
include('connetdb.php');
$pro_id = $_POST['pro_id'];
$amount = $_POST['p_amount'];
$sql = "UPDATE product_new SET amount = amount + $amount WHERE pro_id = '$pro_id'";
$hand = mysqli_query($conn, $sql);
if ($hand) {
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'product_stock.php?pro_id=$pro_id&&pro_stock=pro_stock'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location = 'product_stock.php?pro_id=$pro_id&&pro_stock_error=pro_stock_error'; ";
	echo "</script>";
}
mysqli_close($conn);
?>