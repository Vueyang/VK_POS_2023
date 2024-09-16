<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id=$_SESSION['mem_id'];
$menu = "R_Expens";
include('../Admin/connetdb.php');

$mpdf = new \Mpdf\Mpdf(['default_font_size' => 9,
'default_font' => 'dejavusans']);
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
ob_start();
	?>
<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="../Admin/css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="../Admin/assets/adminlte.min.css">
	<link rel="stylesheet" href="../Admin/assets/adminlte.min.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

	<!-- Main content -->
	<br>
	<section class="content ">
		<div class="card card-gray">
			<div class="card-header ">
				<h3 class="card-title" style="font-size: 2rem;">ລາຍງານຂໍ້ມູນລາຍຈ່າຍ</h3>
			</div>
			<br>
			<form name="frm" method="POST" action="Report_Expens.php">
			
					<div class="row mt-1">
						<div class="col-sm-2" style="text-align:center; font-size:20px;">
							<label for="text">ເລືອກວັນທີເດືອນປີ</label>
						</div>
						<div class="col-sm-2">
							<input type="date" name="dt1" class="form-control">
						</div>
						<div class="col-sm-2">
							<input type="date" name="dt2" class="form-control">
						</div>
						<div class="col-sm-1">
							<button type="submit" class="btn btn-primary"><i class="fas fa-search "></i></button>
						</div>
						<div class="col-sm-1">
							<button type="refesh" class="btn btn-primary">ເບີ່ງທັງໝົດ</i></button>
						</div>
					</div>
				</form>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<?php

						//$nquery = "SELECT * FROM  tbl_member m, tbl_employee en WHERE m.en_id = en.en_id  GROUP BY mem_id ";
						//$nquery = mysqli_query("SELECT COUNT(mem_id) FROM `tbl_member`");
						//$rs_my_order = mysqli_query($conn, $nquery);
						//$row = mysqli_fetch_row($nquery);
						//echo ($query_my_order);//test query
						$nquery = mysqli_query($conn, "SELECT COUNT(expen_id) FROM `tb_expens`");
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
							$dt1 = @$_POST['dt1'];
							$dt2 = @$_POST['dt2'];
							
							$date_to_date = date('Y/m/d', strtotime($dt2 . "+1 days")); //ຈາກ query ເອົາຂໍ້ມູນຈາກວັນທີ່ທີ່ເຮົາເລືອກຈາກເລີ່ມຕົ້ນຖືວັນທີ່ເຮົາຕ້ອງການມາສະແດງ
							$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
							if (($dt1 != "") & ($dt2 != "")) {
								echo "ຄົ້ນຫາຈາກວັນທີ $dt1 ຫາ $dt2 ";
								
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens WHERE expen_date BETWEEN '$dt1' and '$date_to_date' ORDER BY expen_id DESC $limit");
								
							}else{
								//$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens ORDER BY expen_id DESC $limit");
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
							
                <hr>
							
						<table id="datatablesSimples" class="table table-striped-columns  table-hover show-expen-type">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດ</th>
									<th>ຊື່ລາຍການທີ່ຈ່າຍ</th>
                                    <th>ຈຳນວນ</th>
									<th>ລາຄາ/ໜ່ວຍ</th>
									<th>ລາຄາລວມ</th>
                                    <th>ວັນເດືອນປີທີ່ຈ່າຍ</th>
								</tr>

							</thead>

							<tbody>
								<?php 
								$total = 0;
								$Alltotal = 0;
								foreach ($nquery_1 as $rs) { 
									$total += $rs['prices'] * $rs['amount']; //ລາຄາລວມ ທາງ ກ້າຕ່າ 
									$Alltotal = $rs['total'] + $total; 
									?>
									<tr>
										<td>
											<?= $l += 1 ?>
										</td>
										<td>
											<?= $rs['expen_id']; ?>
										</td> 
										<td>
											<?= $rs['content']; ?>
										</td>
                                        <td>
											<?= $rs['amount']; ?>
										</td>
										<td>
											<?= number_format($rs['prices'], 0);  ?> ກີບ
										</td>
										<td>
											<?= number_format($rs['total'], 0);  ?> ກີບ
										</td>
                                        <td>
											<?= date('d/m/Y H:m:s',strtotime($rs['expen_date']))	; ?>
										</td>

									</tr>
									
									<?php
								//mysqli_close($conn);
							} ?>
							</tbody>
							<?php
					include('../convertnumtoLao.php');
					?>
					<tr>
						<td align='center' colspan="4">
							<b>ລາຄາລວມທັງໝົດ
								(
								<?php echo Convert($total); ?> )
							</b>
							<br>
							<b>ຍອດເງີນທີ່ຈ່າຍ
								(
								<?php echo Convert($total); ?> )
							</b>
							<br>
						</td>
						<td align='start' colspan='2'>
							<b>
								<?php echo number_format($total, 0); ?> ກີບ
							</b>
							<br>
							<b>
								<?php echo number_format($total, 0); ?> ກີບ
							</b>
						</td>
					</tr>
						</table>
						<div class="card-footer" align="end">
							<div id="pagination_controls">

								<?php echo $paginationCtrls; ?>

							</div>
						</div>
					</div>  
				</div>
			</div>
			<div class="button_print my-12">
				
				<a href="Report_Expens.php?expen_date=<?= $dt1 ?>?date_end=<?=$dt2?>&act=view" target="_blank"
														class="button_print btn btn-primary btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ພີມອອກ</a>
														</div>
														<br>
		</div>
		
													</section>
	<?php include('footer.php'); ?>
	<script>
		$(function () {
			$(".datatable").DataTable();
			// $('#example2').DataTable({
			//   "paging": true,
			//   "lengthChange": false,
			//   "searching": false,
			//   "ordering": true,
			//   "info": true,
			//   "autoWidth": false,
			// http://fordev22.com/
			// });
		});
	</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script src="../Admin/css_js/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../Admin/assets/demo/chart-area-demo.js"></script>
<script src=".../Admin/css_js/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
	crossorigin="anonymous"></script>
<script src="../Admin/css_js/js/datatables-simple-demo.js"></script>

</html>

<style>
	.button_print{
		text-align: center;
	}
	
	.button_print_1{
		margin-top:-100px;
		cursor: pointer;
	}
	.button_print_1:hover {
}
</style>

<br>
<?php
$html = ob_get_contents();

$mpdf->WriteHTML($html);
$mpdf->Output('report_pdf/Report_expen_detail.pdf');
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
		cursor: pointer;
	}
	.button_print_1:hover {
}
</style>
<div class="button_print my-12">
	<a href="report_pdf/Report_expen_detail.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
</div>
<br>