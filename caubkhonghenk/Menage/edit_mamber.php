<?php
include('connetdb.php');

$mem_id = $_POST['mem_id'];
$ref_l_id = $_POST['ref_l_id'];
//echo $ref_l_id;
//echo $mem_id;
$mem_username = $_POST['username'];
$mem_password = (sha1($_POST['mem_password']));
$ref_l_id_1 = "";
if ($ref_l_id == "ຜູ້ຈັດການ(Admin)") {
	$ref_l_id_1 = 1;
} elseif ($ref_l_id == "HR") {
	$ref_l_id_1 = 2;
} elseif ($ref_l_id == "ພະນັກງານບັນຊີ") {
	$ref_l_id_1 = 3;
} elseif ($ref_l_id == "ພະນັກງານຈັດຊື້") {
	$ref_l_id_1 = 4;
} elseif ($ref_l_id == "ພະນັກງານສາງ") {
	$ref_l_id_1 = 5;
} elseif ($ref_l_id == "ພະນັກງານຂາຍໜ້າຮ້ານ") {
	$ref_l_id_1 = 6;
} elseif ($ref_l_id == "ພະນັກງານຂາຢືນຢັນລູກຄ້າ") {
	$ref_l_id_1 = 7;
}
// function Update
$sql = "UPDATE tbl_member SET ref_l_id = '" . $ref_l_id_1 . "', mem_username = '" . $mem_username . "', mem_password = '" . $mem_password . "' WHERE mem_id = '" . $mem_id . "' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");


if ($result) {
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'list_mem.php	?mem_id=$mem_id&&mem_editp=mem_editp'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_mem.php?mem_id=$mem_id&&mem_editp_error=mem_editp_error'; ";
	echo "</script>";
}
mysqli_close($conn);
?>