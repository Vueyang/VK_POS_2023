<?php 
include('connetdb.php');
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">

<link href="assets/tagsinput.css?v=11" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../Admin/font/NotoSansLao-VariableFont_wdth,wght.ttf">
<link rel="stylesheet" href="../Admin/font-awesome/fonts/fontawesome-webfont.eot">
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
</head>
<style>
    .container{
        margin-top: 20px;
    }
</style>

<body>
    <div class="container">
    <table cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td align="center" style="font-size: 16px;" class="card-text">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
			</tr>
			<tr>
				<td align="center" style="font-size: 16px;" class="card-text">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td style="font-size: 16px;" class="card-title">ຮ້ານ VK_POS</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 14px;" class="card-text">ຕັ້ງຢູ່ສາມແຍກຕະຫຼາດເກົ່າເມືອງລ້ອງຊານ ບ້ານ ຄອນວັດ, ເມືອງ ລ້ອງຊານ, ແຂວງ ໄຊສົມບູນ</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 12px;" class="display-6">ໂທ: 020 78665114, 020 78779149</td>
				<td align="right"></td>
			</tr>
		</table>
			<table cellpadding="0" cellspacing="0" align="center">
				
				<tr>
					<td align="center" class="display-6" style="font-size: 20px; color:#06D001;"> <?php echo $txt?></td>
				</tr>
				<tr>
					<td align="center" class="display-1" style="font-size: 16px;">ຊື່ລູກຄ້າ: <?php echo "<lable style='color:#FF5580'>". $_SESSION['mem_username'] . "</lable>"; ?></td>
				</tr>
			</table>
		
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Prices</th>
                    <th>amount</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>$100</td>
                    <td>2</td>
                    <td>$100</td>
                </tr>
                <!-- ທ່ານສາມາດເພີ່ມແຖວໃໝ່ຕາມຕ້ອງການ -->
                <tr>
                    <th scope="row">4</th>
                    <td colspan="3">John Doe</td>
                    <td>$100</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>