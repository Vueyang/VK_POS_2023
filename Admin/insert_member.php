<?php
include('connetdb.php');

$en_id = mysqli_real_escape_string($conn, $_POST["en_id"]);
$ref_l_id = mysqli_real_escape_string($conn, $_POST["ref_l_id"]);
$mem_username = mysqli_real_escape_string($conn, $_POST["mem_username"]);
$mem_password = mysqli_real_escape_string($conn, (sha1($_POST["mem_password"])));

$check = "
  SELECT mem_username 
  FROM tbl_member  
  WHERE mem_username = '$mem_username'
  ";
$result1 = mysqli_query($conn, $check);
$num = mysqli_num_rows($result1);

if ($num > 0) {
  echo "<script>";
  echo "window.location = 'list_mem.php?mem_error=mem_error'; ";
  echo "</script>";
} else {
  $sql = "INSERT INTO tbl_member
  (
  en_id,
  ref_l_id,
  mem_username,
  mem_password
  )
  VALUES
  (
  '$en_id',
  '$ref_l_id',
  '$mem_username',
  '$mem_password'
  )";

  $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");
}
//exit();
//mysqli_close($conn);

if ($result) {
  echo "<script type='text/javascript'>";
  //echo "alert('เพิ่มข้อมูลเรียบร้อย');";
  echo "window.location = 'list_mem.php?mem_add=mem_add'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "window.location = 'list_mem.php?mem_add_error=mem_add_error'; ";
  echo "</script>";
}
?>