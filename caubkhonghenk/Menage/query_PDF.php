<?php $menu = "list_sale_approved" ?>;
<?php
include('connetdb.php');
include('header.php');


//error_reporting(error_reporting() & ~E_NOTICE);
session_start();

$mem_id = $_SESSION['mem_id'];
$mem_address = $_SESSION['mem_address'];
//$order_id = $_SESSION['order_id'];

//$mem_address = $_SESSION['mem_address'];
$datetime = date('Y-m-d H:i:s');
//$order_id = @$_GET['order_id'];
$order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
$sql = "SELECT * FROM tbl_order WHERE order_id= $order_id ORDER BY order_status = 2,";
//$sql = "UPDATE tbl_order SET order_status = 2, mem_id ='$mem_id', confirm_date = '$datetime' WHERE order_id = '$order_id' ";
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
$result = mysqli_query($conn, $sql);


?>
<script type='text/javascript'>
	window.location = 'bill_detail.confirm.php?order_id=<?php echo $order_id ?>&&confirm_order=co'; 
</script>
<?php mysqli_close($conn); ?>