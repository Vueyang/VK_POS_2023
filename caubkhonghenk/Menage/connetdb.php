<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}*/
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "product_db")
  or die("Error :" . mysqli_error($conn));
mysqli_query($conn, "SET NAMES UTF8");
date_default_timezone_set('Asia/Bangkok');




/*$m = "SELECT * FROM tbl_member";
$mem = mysqli_query($conn, $m);
echo $mem;
exit();*/
?>
