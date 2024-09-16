<?php
include('connetdb.php');
if(isset($_GET['product_type_del']) && $_GET['product_type_del'] == "del"){
$type_id = $_GET['id'];
$sql = "DELETE FROM type_product WHERE type_id = '$type_id'";
if(mysqli_query($conn, $sql)){
	echo "<script type='text/javascript'>";
	echo "window.location ='show_Pro_type.php?product_type_del=product_type_del';";
	echo "</script>";
} else {
	echo "Error : " . $sql . mysqli_errno($conn);}
}
mysqli_close($conn);
?>