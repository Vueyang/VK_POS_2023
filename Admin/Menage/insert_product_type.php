<?php
include('connetdb.php');
//$type_id = $_POST['type_id'];
$type_name = $_POST['type'];
if(is_uploaded_file($_FILES['type_img']['tmp_name'])){
	$new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['type_img']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "./image/" . $new_image_name;
	move_uploaded_file($_FILES['type_img']['tmp_name'], $image_upload_path);
}else{$new_image_name = "";
}
//ຄຳສັ່ງເພີ່ມຂໍ້ມູນ
$sql = "INSERT INTO type_product(type_name, type_img) VALUES(' $type_name', '$new_image_name')";
$result = mysqli_query($conn, $sql);
if($result){
	echo "<script type='text/javascript'>";
  //echo "alert('เพิ่มข้อมูลเรียบร้อย');";
  echo "window.location = 'show_Pro_type.php?pro_type_add=pro_type_add'; ";
  echo "</script>";
}
mysqli_close($conn);
?>