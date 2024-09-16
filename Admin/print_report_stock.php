<!DOCTYPE html>
<html>
<?php
include('connetdb.php');
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['default_font_size' => 9,
'default_font' => 'dejavusans']);

ob_start();
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Preview</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
	<link href="/font/NotoSansLao-VariableFont_wdth,wght.ttf" rel="stylesheet">
</head>
<style type="text/css">
	*{
			font-family: "Noto Sans Lao", sans-serif;
  			font-optical-sizing: auto;
  			font-weight: <weight>;
  			font-style: normal;
  			font-variation-settings:"wdth" 100;

			font-size: 14px;
		}
	body {
		background-color: #CCC;
		width: 100%;
		height: 100%;
		padding: 0;
		margin: 0;
	}

	div {
		margin-top: 10px;
		background-color: #FFF;
		padding: 50px;
		width: 1000px;
		height: 90vh;
		display: block;
		margin: auto;
	}

	button {
		font-family: "noto Sans Lao";
	}

	.tb_detail {
		border-top: 1px solid #333;
		border-right: 1px solid #333;
	}

	.tb_detail th {
		border-bottom: 1px solid #333;
		border-left: 1px solid #333;
	}

	.tb_detail td {
		border-bottom: 1px solid #333;
		border-left: 1px solid #333;
        text-align:center;
	}

	@media print {
		body {
			background-color: #FFF;
		}

		button {
			visibility: hidden;
		}

		@page {
			margin: 0;
			padding: 0;
		}

		.cash {
			display: none;
		}
	}
</style>
<?php
							$nquery = mysqli_query($conn, "SELECT COUNT(pro_id) FROM `product_new`");
                            $row = mysqli_fetch_row($nquery);
                                $rows = $row[0];
                                $page_rows = 6; //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
                                $last = ceil($rows / $page_rows);
                                //print_r($last);
                                if ($last < 1) {
                                    $last = 1;
                                }
                                $pagenum = 1;
                                if (isset($_GET['pn'])) {
                                    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
                                }
                                if ($pagenum < 1) {
                                    $pagenum = 1;
                                } else if ($pagenum > $last) {
                                    $pagenum = $last;
                                }
                                $limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
                                if(isset($_GET['search'])){
                                    $search = $_GET['search'];
                                    //print_r($search);
                                    $nquery = "SELECT * from  product_new p, type_product t WHERE p.type_id = t.type_id and amount < 10 GROUP BY p.pro_id ";
                                    // $nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id AND en.en_name LIKE '%$search%' OR m.mem_username LIKE '%$search%' GROUP BY m.mem_id DESC $limit ");
                                }else{
                                    //$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
                                    $nquery = mysqli_query($conn, "SELECT * from  product_new p, type_product t WHERE p.type_id = t.type_id and amount < 10 GROUP BY p.pro_id ");
                                    //$nquery_1 = mysqli_query($conn, "SELECT * from  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY mem_id DESC $limit");
                                    $paginationCtrls = '';
                                    if ($last != 1) {
                                        if ($pagenum > 1) {
                                            $previous = $pagenum - 1;
                                            $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp; ';
                                    
                                    
                                            for ($i = $pagenum - 4; $i < $pagenum; $i++) {
                                                if ($i > 0) {
                                                    $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
                                                }
                                            }
                                        }
                                    
                                    
                                        //$paginationCtrls .= ''.$pagenum.' &nbsp; ';
                                    
                                    
                                        $paginationCtrls .= '<a href=""class="btn btn-danger">' . $pagenum . '</a> &nbsp; ';
                                        //echo $paginationCtrls;
    
                                    
                                    
                                        for ($i = $pagenum + 1; $i <= $last; $i++) {
                                            $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
                                            if ($i >= $pagenum + 4) {
                                                break;
                                            }
                                        }
                                    
                                    
                                        if ($pagenum != $last) {
                                            $next = $pagenum + 1;
                                    
                                    
                                            $paginationCtrls .= ' &nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-info">Next</a> ';
                                        }
                                        
                                    }
                                    //print_r($nquery_1);
                                    //echo $nquery;
                                    //exit();
                                }
                                
						?>
                        
<body style="font-family:'noto Sans Lao'; border-raduis:10px;">

<br>
	<div style="border-raduis:10px; height: 100%;">
		
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td align="center" style="font-size: 20px;">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
			</tr>
			<tr>
				<td align="center" style="font-size: 20px;">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" align="center" width="1000">
			<tr>
				<td style="font-size: 20px;">ຮ້ານ VK_POS</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 18px;">ຕັ້ງຢູ່ສາມແຍກຕະຫຼາດເກົ່າເມືອງລ້ອງຊານ ບ້ານ ຄອນວັດ, ເມືອງ ລ້ອງຊານ, ແຂວງ ໄຊສົມບູນ</td>
				<td align="right"></td>
			</tr>
			<tr>
				<td style="font-size: 16px;">ໂທ: 020 78665114, 020 78779149</td>
				<td align="right"></td>
			</tr>
		</table>
		<center><label
				style="font-family:'noto Sans Lao'; font-weight:bold; font-size:20px">ສະຫຼຸບລາຍການສີນຄ້າທັງໝົດ</label>
		</center>
		<br>
		<table cellpadding="0" cellspacing="0" width="100%" class="tb_detail">
			<thead>
            <tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດ</th>
									<th>ຊື່ສີນຄ້າ</th>
									<th>ປະເພດສີນຄ້າ</th>
									<th>ລາຄາ</th>
									<th>ຈຳນວນ</th>
									<th>ຮູບ</th>
								</tr>
			</thead>
				<tbody>
                <?php if($row > 0) { ?>
								<?php foreach ($nquery as $rs) { ?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>
										<td>
											<?= $rs['pro_id'] ?>
										</td>
										<td>
											<?= $rs['pro_name'] ?>
										</td>
										<td>
											<?= $rs['type_name'] ?>
										</td>
										<td>
											<?= $rs['price'] ?>
										</td>
										<td>
											<?= $rs['amount']; ?>
										</td>
										<td><img src="./image/<?= $rs["image"] ?>" width="100px" height="80px"> </td>
									</tr>
									<?php
								}
								mysqli_close($conn);
									?>
									<?php } ?>
							</tbody>
				
		</table>
	</div>
	
</body>

</html>
<?php
$html = ob_get_contents();

$mpdf->WriteHTML($html);
$mpdf->Output('report_pdf/Report_product_stock.pdf');
ob_end_flush();

?>
<style>
	.button_print{
		text-align: center;
		height:0px;
		margin-top:-50px;
	}
	.button_print_1{
		margin-top:-100px;
		cursor:pointer;
	}
</style>
<div class="button_print my-12">
	<a href="report_pdf/Report_product_stock.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
</div>
<br>