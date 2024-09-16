<?php
include('connetdb.php');
$en_id = $_POST['en_id'];
$ref_l_id = $_POST['ref_l_id'];
$en_name = $_POST['en_name'];
$en_lastname = $_POST['en_lastname'];
$gender = $_POST['gender'];
$date = $_POST['date_of_birth'];
$newDate = date('Y/m/d', strtotime(str_replace('/', '-', $date)));
$en_phone = $_POST['en_phone'];
$en_email = $_POST['en_email'];
$village = $_POST['village'];
$district = $_POST['district'];
$provice = $_POST['provice'];
$position = $_POST['position'];
$responsible = $_POST['responsible'];
//$en_username = $_POST['en_username'];
//$en_password = (sha1($_POST['en_password']));
$en_img = $_POST['en_image2'];
// upload image
if (is_uploaded_file($_FILES['en_image']['tmp_name'])) {
	$new_image_name = 'pro_' . uniqid() . "." . pathinfo(basename($_FILES['en_image']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "./image/" . $new_image_name;
	move_uploaded_file($_FILES['en_image']['tmp_name'], $image_upload_path);
} else {
	$new_image_name = "$en_img";
}
$gender1 = "";
if ($gender == "ຊາຍ") {
	$gender1 = 0;
} elseif ($gender == "ຍິງ") {
	$gender1 = 1;
}
// function Update
$sql = "UPDATE tbl_employee SET en_name = '$en_name', en_lastname = '$en_lastname', gender = '$gender1', date_of_birth = '$newDate',
en_phone = '$en_phone', en_email = '$en_email', village = '$village', district = '$district', provice = '$provice', position = '$position', responsible='$responsible', en_image = '$new_image_name' WHERE en_id ='$en_id'";
/*$result = mysqli_query($conn, $sql);
if($result){
	echo "<script> alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ')</script>";
	echo "<script>window.location='list_en.php';</script>";
} else {
	echo "<script> alert('ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້')</script>";
}*/
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");
mysqli_close($conn);

if ($result) {
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'list_employee.php	?en_id=$en_id&&en_edit=en_edit'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_employee.php?en_id=$en_id&&en_error=en_error'; ";
	echo "</script>";
}
?>