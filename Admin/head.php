<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>POS VK | By VK.com</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="" href="assets/img/t.png" />
	<!-- Font Awesome -->
	<!--  http://fordev22.com/ -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<!-- http://fordev22.com/ -->
	<link rel="stylesheet" href="assets/icheck-bootstrap.min.css">
	<!-- DataTables -->

	<link rel="stylesheet" href="assets/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="assets/select2.min.css">
	<link rel="stylesheet" href="assets/select2-bootstrap4.min.css">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">

	<link href="assets/tagsinput.css?v=11" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="font/NotoSansLao-VariableFont_wdth,wght.ttf">
	<link rel="stylesheet" href="font-awesome/fonts/fontawesome-webfont.eot">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
	<!-- ckeditor -->
	<script src="assets/ckeditor.js"></script>

	<style>
		body {
			
			font-family: "Noto Sans Lao", sans-serif;
  			font-optical-sizing: auto;
  			font-weight: <weight>;
  			font-style: normal;
  			font-variation-settings:"wdth" 100;

			font-size: 14px;
		}
	</style>


	<style type="text/css">
		@media print {
			.btn {
				display: none;
				/* ซ่อน  */
			}
		}
	</style>
</head>
<?php

//error_reporting( error_reporting() & ~E_NOTICE );

//print_r($_SESSION);
$m_level = $_SESSION['ref_l_id'];
if ($m_level != 1 and $m_level != 2 and $m_level !=3 and $m_level !=4 and $m_level !=5 and $m_level !=6 and $m_level !=7) {
	Header("Location:Dashboard.php");
}

include('connetdb.php')




	//clear session
//unset($_SESSION['mem_name']);//clear session บางตัว
// session_destroy();
	?>