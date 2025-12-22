<!DOCTYPE html>
<html lang="en">
<?php
$menu = "Dashboard";
include("header.php");
include('connetdb.php') ?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VK_POS_2023</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="css_js/css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<?php

$tatol = "SELECT SUM(pay_amount2) AS total_sum FROM tbl_order_receive";
$result = mysqli_query($conn, $tatol);
if (!$result) {
	die("Query Failed: " . mysqli_error($conn)); // ກວດສອບ error ຂອງ SQL
}
$row = mysqli_fetch_array($result);
$total_sum = $row['total_sum'];



$tatol1 = "SELECT SUM(total) AS total_sum1 FROM tb_expens1";
$result1 = mysqli_query($conn, $tatol1);
if (!$result1) {
	die("Query Failed: " . mysqli_error($conn)); // ກວດສອບ error ຂອງ SQL
}
$row1 = mysqli_fetch_array($result1);
$total_sum1 = $row1['total_sum1'];

///////////////////



	//   echo($total_sum);
	//   print($total_sum);
	//   exit();
// // Function Status pedding status(1)
// $sql1 = "SELECT COUNT(order_id) AS amount_no FROM tbl_order_receive WHERE order_status = '1'";
// $result1 = mysqli_query($conn, $sql1);
// $row1 = mysqli_fetch_array($result1);


// // Function Status success status(2)
// $sql2 = "SELECT COUNT(order_id) AS amount_success FROM tbl_order WHERE order_status = '2'";
// $result2 = mysqli_query($conn, $sql2);
// $row2 = mysqli_fetch_array($result2);


// // Function Status success status(0)
// $sql3 = "SELECT COUNT(order_id) AS amount_cancel FROM tbl_order WHERE order_status = '0'";
// $result3 = mysqli_query($conn, $sql3);
// $row3 = mysqli_fetch_array($result3);


// // Function Product Stock < 10 
// $sql4 = "SELECT COUNT(pro_id) AS amount_pro_stock FROM product_new WHERE amount < 10";
// $result4 = mysqli_query($conn, $sql4);
// $row4 = mysqli_fetch_array($result4);
?>

<body>
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Dashboard</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				<div class="row">

					<div class="col-xl-6 col-md-6">
						<div class="card bg-warning text-white mb-4">
							<div class="card-body">
								<h4>ລາຍຈ່າຍ</h4>
								<h3>
									<?php echo number_format($total_sum1, 0) ?> ກີບ
								</h3>
							</div>

						</div>
					</div>
					<div class="col-xl-6 col-md-6">
						<div class="card bg-success text-white mb-4">
							<div class="card-body">
								<h4> ລາຍຮັບ</h4>
								<h3>
									<?php echo number_format($total_sum, 0) ?> ກີບ
								</h3>
							</div>
							
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-area me-1"></i>
								Area Chart Example
							</div>
							<div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
							
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-bar me-1"></i>
								ຂໍ້ມູນລາຍຈ່າຍ
							</div>
							<div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
						</div>
					</div>
				</div>
			</div>
		</main>

	</div>
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
	<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"-->
		crossorigin="anonymous"></script>
	<script src="css_js/js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="css_js/assets/demo/chart-area-demo.js"></script>
	<!--<script src="css_js/assets/demo/chart-bar-demo.js"></script>-->
	<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
		crossorigin="anonymous"></script>
	<script src="css_js/js/datatables-simple-demo.js"></script>
	<script type="text/javascript" src="highcharts/Chart.min.js"></script>
<script type="text/javascript" src="highcharts/Cjquery.min.js"></script>
</body>

</html>
<script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data_expens_chart.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].expen_date);
                        marks.push(data[i].total);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'ຍອດລາຍຈ່າຍ',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#myBarChart");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>