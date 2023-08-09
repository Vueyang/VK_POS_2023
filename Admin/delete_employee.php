<?php
include('connetdb.php');
if (isset($_GET['employee']) && $_GET['employee'] == "del") {
	$en_id = $_GET['id'];
	$sql = "DELETE FROM tbl_employee WHERE en_id = '$en_id'";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>";
		//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
		echo "window.location = 'list_employee.php?en_del=en_del'; ";
		echo "</script>";
	}
	mysqli_close($conn);
}

?>