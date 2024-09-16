<?php
include('connetdb.php');
$pro_name = $_POST['pname'];
$typeID = $_POST['typeID'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$pr_detail = $_POST['detail'];
// upload image
if(is_uploaded_file($_FILES['file1']['tmp_name'])){
	$new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
	$image_upload_path = "./image/" . $new_image_name;
	move_uploaded_file($_FILES['file1']['tmp_name'], $image_upload_path);
}else{$new_image_name = "";
}
//ຄຳສັ່ງເພີ່ມຂໍ້ມູນ
$sql = "INSERT INTO product_new(pro_name, type_id, price, amount, detail, image) VALUES('$pro_name', '$typeID', '$price', '$amount', '$pr_detail', '$new_image_name')";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn). "<br>$sql");
  //exit();
  //mysqli_close($conn);

  if($result){
  echo "<script type='text/javascript'>";
  //echo "alert('เพิ่มข้อมูลเรียบร้อย');";
  echo "window.location = 'frm_Show_product.php?pro_add=pro_add'; ";
  echo "</script>";
  }

?>