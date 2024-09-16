<?php
header('Content-Type: application/json');

include('connetdb.php');

$sqlQuery = "SELECT SUM(total) as total, monthdate FROM tb_expens1 GROUP BY monthdate ORDER BY monthdate";
$result = mysqli_query($conn, $sqlQuery);
//print_r($result);
//exit();
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>