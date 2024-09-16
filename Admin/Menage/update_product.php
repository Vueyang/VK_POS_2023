<?php
include('connetdb.php');
$pr_id = $_POST['pro_id'];
$pr_name = $_POST['pname'];
$pr_type_id = $_POST['typeID'];
$pr_price = $_POST['price'];
$pr_amount = $_POST['amount'];
$pr_detail = $_POST['detail'];
$pr_img = $_POST['textimg'];
// upload image
if(is_uploaded_file($_FILES['file1']['tmp_name'])){
	$new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "./image/" . $new_image_name;
	move_uploaded_file($_FILES['file1']['tmp_name'], $image_upload_path);
}else{$new_image_name = "$pr_img";
}
// function Update
$sql = "UPDATE product_new SET pro_name = '$pr_name', type_id = '$pr_type_id', price = '$pr_price', amount = '$pr_amount', detail = '$pr_detail', image = '$new_image_name' WHERE pro_id ='$pr_id'";
//$result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn). "<br>$sql");
	mysqli_close($conn);
if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'frm_Show_product.php?pro_id=$pr_id&&pro_edit=pro_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_mem.php?mem_id=$pr_id&&pro_edit_error=pro_edit_error'; ";
	echo "</script>";
}
mysqli_close($conn);
?>