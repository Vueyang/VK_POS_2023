<?php
include("../Admin/connetdb.php");
$exchage_id = mysqli_real_escape_string($conn, $_POST["exchage_id"]);
$baht_name= mysqli_real_escape_string($conn, $_POST["bath_name"]);
$dola_name = mysqli_real_escape_string($conn, $_POST["dola_name"]);
$sql = "INSERT INTO tb_exchage
  (
  exchage_id,
  baht_name,
  dola_name
  )
  VALUES
  (
  '$exchage_id',
  '$baht_name',
  '$dola_name'
  )";

  $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");
if($result){
    echo "<script type='text/javascript'>";
    echo "window.location = 'form_exchange.php?exchage_add=exchage_id';";
    echo "</script>";
}else{
    echo "script type='text/javascript'>";
    echo "window.location = 'form_add_exchange.php?exchage_add_error';";
    echo "</script>";
}