<?php
include('connetdb.php');
$type_id = $_POST['type_id'];
$type_name = $_POST['type'];
$type_img = $_POST['textimg'];
if(is_uploaded_file($_FILES['type_img']['tmp_name'])){
	$new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['type_img']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "./image/" . $new_image_name;
	move_uploaded_file($_FILES['type_img']['tmp_name'], $image_upload_path);
}else{$new_image_name = "$type_img";
}
// function Update
$sql = "UPDATE type_product SET type_name = '$type_name', type_img = '$new_image_name' WHERE type_id = '$type_id'";
$result = mysqli_query($conn, $sql);
if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'show_Pro_type.php?type_id=$type_id&&pro_type_edit=pro_type_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'show_Pro_type.php?type_id=$type_id&&pro_type_edit_error=pro_type_edit_error'; ";
	echo "</script>";
}
?>