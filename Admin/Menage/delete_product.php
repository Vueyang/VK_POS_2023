<?php
include('connetdb.php');
if(isset($_GET['product_del']) && $_GET['product_del'] == "del" ){
$pro_id = $_GET['id'];
$sql = "DELETE FROM product_new WHERE pro_id = '$pro_id'";
if (mysqli_query($conn, $sql)) {
	echo "<script type='text/javascript'>";
	//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'frm_Show_product.php?product_del=product_del'; ";
	echo "</script>";
}
mysqli_close($conn);
}

?>