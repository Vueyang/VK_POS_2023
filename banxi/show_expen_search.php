<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
include('../Admin/connetdb.php');
	?>



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
							$date=$_POST['date'];
							$type=$_POST['type'];
							$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
							if($type == "ເປັນມື້"){
								//print_r($search);
								$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens WHERE expen_date = '".$date."' ORDER BY expen_id DESC $limit");
							}if($type == "ເປັນເດືອນ"){
									//print_r($search);
									$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens WHERE left(expen_date, 7) = '".date('Y-m',strtotime($date))."' ORDER BY expen_id DESC $limit");
								}
								if($type == "ເປັນປີ"){
									//print_r($search);
									$nquery_1 = mysqli_query($conn, "SELECT * from  tb_expens WHERE expen_date = '".date('Y',strtotime($date))."' ORDER BY expen_id DESC $limit");
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
							
                
							
						<table id="datatablesSimples" class="table table-striped-columns  table-hover show-expen-type">
							<thead>

								<tr>
									<th>ລຳດັບ</th>
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
						<td align='center' colspan='2'>
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
						
					
