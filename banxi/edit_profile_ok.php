<?php
include('../dmin/connetdb.php');
$mem_id = $_POST['en_id'];
//$ref_l_id = $_POST['ref_l_id'];
$mem_name = $_POST['mem_name'];
$mem_lastname = $_POST['mem_lastname'];
$mem_phone = $_POST['mem_phone'];
$mem_email = $_POST['mem_email'];
$mem_village = $_POST['mem_village'];
$mem_district = $_POST['mem_district'];
$mem_provice = $_POST['mem_provice'];
$mem_username = $_POST['mem_username'];
$mem_password = (sha1($_POST['mem_password']));
$mem_img = $_POST['mem_img2'];
// upload image
if (is_uploaded_file($_FILES['mem_img']['tmp_name'])) {
	$new_image_name = 'pro_' . uniqid() . "." . pathinfo(basename($_FILES['mem_img']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "./image/" . $new_image_name;
	move_uploaded_file($_FILES['mem_img']['tmp_name'], $image_upload_path);
} else {
	$new_image_name = "$mem_img";
}
// function Update
$sql = "UPDATE tbl_member SET mem_name = '$mem_name', ref_l_id = '$ref_l_id', mem_lastname = '$mem_lastname',
mem_phone = '$mem_phone', mem_email = '$mem_email', mem_village = '$mem_village', mem_district = '$mem_district', mem_provice = '$mem_provice', mem_username = '$mem_username', mem_password = '$mem_password', mem_img = '$new_image_name' WHERE mem_id ='$mem_id'";
/*$result = mysqli_query($conn, $sql);
if($result){
	echo "<script> alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ')</script>";
	echo "<script>window.location='list_mem.php';</script>";
} else {
	echo "<script> alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້')</script>";
}*/
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");
mysqli_close($conn);

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
?>