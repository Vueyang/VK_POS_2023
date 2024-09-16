<?php
include('connetdb.php');
if(isset($_GET['member']) && $_GET['member'] == "del"){
$mem_id = $_GET['id'];
$sql = "DELETE FROM tbl_member WHERE mem_id = '$mem_id'";

if (mysqli_query($conn, $sql)) {
	echo "<script type='text/javascript'>";
	//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'list_mem.php?mem_del=mem_del'; ";
	echo "</script>";
}
mysqli_close($conn);
}

?>