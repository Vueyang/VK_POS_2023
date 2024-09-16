<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
include('connetdb.php');
$mem_id = $_SESSION['mem_id'];
$expen_id = $_POST['expen_id'];
$content = $_POST['content'];
$amount = $_POST['amount'];
$prices = $_POST['prices'];
$total = $prices * $amount;
//echo $mem_id;
//exit();
$sql = "UPDATE tb_expens SET content = '$content', amount = '$amount', prices = '$prices', total='$total', mem_id='$mem_id' WHERE expen_id = '$expen_id'";
$result = mysqli_query($conn, $sql) or die("Error in query; $sql" . mysqli_error($conn) . "<br>$sql");
//print_r($sql);
//exit();
mysqli_close($conn);
if ($result) {
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'list_Expens.php?expen_id=$expen_id&&expen_edit=expen_edit'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_Expens.php?expen_id=$expen_id&&expen_error=expen_error'; ";
	echo "</script>";
}
?>