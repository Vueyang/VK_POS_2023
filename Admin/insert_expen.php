<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
include("connetdb.php");
//$expen_id = mysqli_real_escape_string($conn, $_POST["expen_id"]);
$content= mysqli_real_escape_string($conn, $_POST["content"]);
$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
$prices = mysqli_real_escape_string($conn, $_POST["prices"]);
$total = $prices * $amount;
$mem_id= $_SESSION['mem_id'];
$Month = Date("F");
//echo $mem_id;
//exit();
$sql = "INSERT INTO tb_expens1
  (
  /*expen_id,*/
  content,
  amount,
  prices,
  total,
  mem_id,
  monthdate
  )
  VALUES
  (
  /*'$expen_id',*/
  '$content',
  '$amount',
  '$prices',
  '$total',
  '$mem_id',
  '$Month'
  )";

  $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");
if($result){
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_Expens.php?exchage_add=exchage_id';";
    echo "</script>";
}else{
    echo "script type='text/javascript'>";
    echo "window.location = 'list_Expens.php?exchage_add_error';";
    echo "</script>";
}