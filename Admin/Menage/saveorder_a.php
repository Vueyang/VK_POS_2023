<?php
include('connetdb.php');
//error_reporting( error_reporting() & ~E_NOTICE );
session_start();
/*echo "<pre>";
print_r($_SESSION);
print_r($_SESSION['cart']);
print_r($_POST);
echo "</pre>";
//exit();*/
$mem_id = $_SESSION['mem_id'];
//print_r($mem_id);
/*print_r($_SESSION['cart']);
echo "</pre>";*/
//exit();
if ($mem_id == '') {
	session_destroy();
	echo '<script>';
	echo "alert('ບໍ່ສຳເລັດ');";
	echo "window.location='list_sale.php';";
	echo '</script>';
}
?>
<!--ສ້າງຕົວແປສຳລັບບັນທືກການສັ່ງຊື້-->
<?php
$mem_id = $_REQUEST["mem_id"];
$receive_name = 'ລູກຄ້າໜ້າຮ້ານ';
$order_status = 4;
$b_name = 'ຊຳລະໜ້າຮ້ານ';
//$member_name = $_SESSION["member_name"];
//$member_phone = $_SESSION["member_phone"];
//$member_address = $_SESSION["member_address"];
$pay_amount = $_REQUEST["pay_amount"]; //ยอดเงินรวม
$pay_amount2 = $_REQUEST["pay_amount2"]; //ยอดเงินที่ต้องจ่าย
$order_date = Date("Y-m-d G:i:s");
//ບັນທືກການສັ່ງຊື້ order
//echo $en_id;
//exit();
mysqli_query($conn, "BEGIN");
$sql1 = "INSERT INTO tbl_order_receive 
VALUES (null,
'$mem_id', 
'$receive_name', 
'$order_status',
'$b_name', 
'$pay_amount',
'$pay_amount2',
'$order_date'
)";
$query1 = mysqli_query($conn, $sql1);
if($query1){
	//ຟັງຊັນ MAX() ຈະຄືນຄ່າທີຫຼາຍທີສຸດໃນຄໍລັນທີລະບູ ອອກມາ ຫຼື ຈະເວົ້າງ່າຍໆກໍ່ຄື ໃຊ້ສຳລັບຫາຄ່າຫຼາຍທີສຸດນັ້ນເອງ.
$sql2 = "SELECT MAX(order_id) as order_id 
FROM tbl_order_receive 
WHERE mem_id='$mem_id'";
$query2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($query2);
$order_id = $row["order_id"];
//echo "order_id" . " = " . $row["order_id"];
//echo $order_id;
//exit();
foreach ($_SESSION['cart'] as $p_id => $qty) {
//query3 เพื่อให้รู้ว่า ใน ตระกร้าสินค้า มีการสั่งซื้อสินค้าอะไรบ้าง เพื่อให้เอาราคาสินค้าต่อหน่วย มาคูณกับ จำนวนสั่งซื้อทั้งหมดและเก็บลงตาราง order_detail
$sql3 = "SELECT * FROM product_new WHERE pro_id=$p_id";
$query3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($query3);
$price = $row3['price'];
$total = $row3['price'] * $qty;
$count = mysqli_num_rows($query3); //นับว่ามีการqueryได้ไหม
/*echo "<pre>";
print_r($row3);
echo "</pre>";
echo $total;
//exit();*/
$sql4 = "INSERT INTO tbl_order_detail 
			   VALUES (null,
			   '$order_id', 
			   '$p_id', 
			   '$qty',
			   '$price', 
			   '$total'
			   )";
$query4 = mysqli_query($conn, $sql4);
//echo $query4;
//exit();
if ($query4 != "") {
	for ($i = 0; $i < $count; $i++) {
		$have = $row3['amount'];
		$stc = $have - $qty;
		//echo "ຍອດຄົງເຫຼືອ: ".$stc;
		//echo "<hr>";
		$sql5 = "UPDATE product_new SET  
		 amount=$stc
		 WHERE  pro_id=$p_id ";
		$query5 = mysqli_query($conn, $sql5);
	}
} else {
	echo "Error";
}
//echo $sql4;
//ตัดสต๊อก

/*   stock  */
}
}else{
	mysqli_query($conn, "enconrret");
	echo "enconrret is fail";
}
//echo $query1;

/*mysqli_query($conn, "BEGIN");
$sql1 = "INSERT INTO tbl_order VALUES(null, '$mem_id', '$receive_name', '$order_status', '$b_name', '$pay_amount', '$pay_amount2', '$order_date')";
	$query1 = mysqli_query($conn, $sql1);
	if($query1){
		mysqli_query($conn, "COMMIT");
		echo "Trasation committed successfully.";
	}else{
		mysqli_query($conn, "ROLLBACK");
		echo "Trasation rolled back due to query failure";
	}

echo $query1;
echo "<hr/>";
//exit();*/


//exit();
//ถ้าทำงานครบตามเงื่อนไข
if ($query1 && $query4) {
	mysqli_query($conn, "COMMIT"); //จะ COMMIT บันทึกสำเร็จคือบันทึก sql1 กับ sql4 แล้ว
	$msg = "ບັນທືກຂໍ້ມູນສຳເລັດແລ້ວ ";

	foreach ($_SESSION['cart'] as $p_id) //วนซ้ำ $_SESSION['cart'] เพื่อเช็คเตรียมจะunset
	{
		//unset($_SESSION['cart'][$p_id]);
		unset($_SESSION['cart']); //unset($_SESSION['cart'][$p_id]);
	}
} else {
	mysqli_query($conn, "ROLLBACK");
	$msg = "ບັນທືກຂໍ້ມູນບໍ່ສຳເລັດ ມີຂໍ້ມູນທີຜິດພາບ";
}
?>
<script type="text/javascript">
	//alert("<?php echo $msg; ?>");
	window.location = 'list_sale.php?order_id=<?php echo $order_id; ?>&act=view&&save_ok=save_ok';
</script>