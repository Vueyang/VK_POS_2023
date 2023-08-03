<?php
$menu = "report_p5"
	?>
<?php include("header.php"); ?>
<?php

$query_my_order = "SELECT p.pro_name, SUM(o.total) AS totol
FROM tbl_order_detail as o
INNER JOIN product_new as p ON p.pro_id=o.pro_id
INNER JOIN tbl_order as ord ON ord.order_id=o.order_id
WHERE ord.order_status =4
GROUP BY o.pro_id ORDER BY  totol DESC LIMIT 5
"
	or die
	("Error : " . mysqlierror($query_my_order));
$rs_my_order = mysqli_query($conn, $query_my_order);
//echo ($query_my_order);//test query
//exit();
?>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<link rel="stylesheet" href="assets/charts.css">
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<h1>Dashboard</h1>
	</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<div class="card card-gray">
		<div class="card-header ">
			<h3 class="card-title">Report Top 5</h3>

		</div>
		<br>
		<div class="card-body">
			<div class="row">

				<div class="col-md-12">
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					<table class="table" id="datatable">
						<thead>
							<tr>

								<th>ຊື່ສີນຄ້າ</th>
								<th>ຈຳນວນຍອດຂາຍ</th>

							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($rs_my_order as $rs_order) {
								echo "<tr>";
								echo "<td>" . $rs_order['pro_name'] . "</td>";
								echo "<td>" . $rs_order['totol'] . "</td>";


								echo "</tr>";
							}
							?>

						</tbody>
					</table>


				</div>

			</div>

		</div>
	</div>
	<div class="card-footer"></div>

</section>
<!-- /.content -->




<script>
	// Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

	// Create the chart
	Highcharts.chart('container', {
		data: {
			table: 'datatable',
		},
		chart: {
			type: 'column'
		},
		title: {
			text: 'ລາຍງານພາບລວມຍອດຂາຍ 5 ອັນດັບທີ່ຂາຍດີ',
			style: {

			}
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'ຍອດຂາຍ'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				colorByPoint: true,

				borderWidth: 2,
				dataLabels: {
					enabled: true,

					style: {

					},
				}
			}
		},
		/*xAxis: {
			//gridLineWidth: 1,
			labels: {
				style: {
	
					font: '11px Trebuchet MS, Verdana, sans-serif'
				}
			},
			title: {
				text: 'สินค้า',
				style: {
	
					fontWeight: 'bold',
					fontSize: '12px',
					fontFamily: 'Trebuchet MS, Verdana, sans-serif'
				}
			}
		},*/
		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
		},
	});
</script>





<?php include('footer2.php'); ?>
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

</html>
<!-- http://fordev22.com/ -->