<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id = $_SESSION['mem_id'];
$menu = "Report_Receip";
include('connetdb.php');
include('header.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="css_js/js/chart_line.js"></script>
    <link href="css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/adminlte.min.css">
	<link rel="stylesheet" href="assets/adminlte.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <?php
  // ນັບຈຳນວນ order_id ທີ່ບໍ່ຊ້ຳກັນ
  $queryCount = mysqli_query($conn, "SELECT COUNT(DISTINCT(order_id)) FROM tbl_order_receive");
  $row = mysqli_fetch_row($queryCount);
  //print_r($row);
  $rows = $row[0];
  // ກຳນົດຈຳນວນຂໍ້ມູນຕໍ່ໜ້າ
  $page_rows = 6; // ຈຳນວນຂໍ້ມູນທີຕ້ອງການໃຫ້ສະແດງໃນ 1 ໜ້າ ສະແດງ 5 ລາຍການ(record) / ໜື່ງໜ້າ
  $last = ceil($rows / $page_rows);
  if($last < 1){
    $last = 1;
  }
  // ກວດສອບວ່າໜ້າທີ່ຖືກເລືອກແມ່ນຫຍັງ
  $pagenum = 1;
  if(isset($_GET['pn'])){
    $pagenum = preg_replace('#[^0-9]#','', $_GET['pn']);
  }
  if($pagenum < 1){
    $pagenum = 1;
  }else if($pagenum > $last){
    $pagenum = $last;
  }
  // ຄຳສັ່ງ LIMIT
  $limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
  //  ດຶງຂໍ້ມູນຈາກຖານຂໍ້ມູນ ຄຳສັ່ງສຳລັບກຣາຟ
  $query_chart = "SELECT DATE_FORMAT(order_date, '%d-%M-%Y') AS order_date, order_status, SUM(pay_amount2) AS total_sum
    FROM tbl_order_receive WHERE order_status IN (2,4)
    GROUP BY order_date, order_status 
    ORDER BY order_date DESC 
    $limit";

  $result_chart = mysqli_query($conn, $query_chart);
  if (!$result_chart) {
    die("Query Failed: " . mysqli_error($conn)); // ກວດສອບ error ຂອງ SQL
}
   // ຄຳສັ່ງ SQL ສຳລັບດຶງຂໍ້ມູນ
   $query = "SELECT SQL_CALC_FOUND_ROWS *, SUM(pay_amount2) AS total_sum 
   FROM tbl_order_receive 
   GROUP BY order_id
   ORDER BY order_date DESC $limit ";//GROUP BY order_id 
   $result = mysqli_query($conn, $query);
   if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }
   $paginationCtrls = '';
   if($last !=1){
    if($pagenum > 1){
      $previonus = $pagenum - 1;
      $paginationCtrls .= '<a href = "' . $_SERVER['PHP_SELF'] . '?pn=' . $previonus .'" class = "btn btn-info">Previous</a> &nbsp;';
      for($i = $pagenum - 4; $i < $pagenum; $i++){
        if($i > 0){
          $paginationCtrls .='<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class = "btn btn-primary">' . $i . ' </a> &nbsp;';
        }
      }
    }
    $paginationCtrls .= '<a href=""class="btn btn-danger">' . $pagenum .'</a> &nbsp;';
    for($i = $pagenum + 1; $i <= $last; $i++){
      $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i .'" class="btn btn-primary">' . $i . '</a> &nbsp;';
      if($i >= $pagenum + 4){
        break;
      }
    }
    if($pagenum != $last){
      $next = $pagenum +1;
      $paginationCtrls .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . ' ?pn=' . $next .'" class =" btn btn-info"> Next</a>';

    }
   }
   // ສ້າງ array ເກັບວັນທີ ແລະ ຍອດລວມ

   $date_list = [];
   $data_sales = [];
   $data_orders = [];
   
   while ($rs = mysqli_fetch_assoc($result_chart)) {
       $date_list[] = $rs['order_date'];
   
       if ($rs['order_status'] == 4) {
           $data_sales[$rs['order_date']] = $rs['total_sum'];
       } elseif ($rs['order_status'] == 2) {
           $data_orders[$rs['order_date']] = $rs['total_sum'];
       }
   }


// ປ່ຽນ array ເປັນລາຍຊື່ວັນທີ່ທີ່ບໍ່ຊ້ຳ
$date_sale = array_unique($date_list);
sort($date_sale); // ຈັດລຽງວັນທີ່

// ສ້າງ array ສຳລັບຂໍ້ມູນ (ຖ້າບໍ່ມີ, ໃຫ້ເປັນ 0)
$total_sale = [];
$order_total = [];
foreach ($date_sale as $date) {
    $total_sale[] = isset($data_sales[$date]) ? $data_sales[$date] : 0;
    $order_total[] = isset($data_orders[$date]) ? $data_orders[$date] : 0;
}

// ປ່ຽນ array ເປັນ string
$date_sale = '"' . implode('","', $date_sale) . '"';
$total_sale = implode(",", $total_sale);
$order_total = implode(",", $order_total);
  //  var_dump($date_sale, $total_sale, $date_order, $order_total);
   //var_dump($order_total); //ປະມວນ var_dump($date_sale) ກ່ອນເພື່ອເບິ່ງຂໍ້ມູນເປັນ string ຫຼື ບໍ່.
  ?>
    <div class="container">
        <div class="card mb-4" >
            <div class="card-header" style="background-color:#6c757d" >
                <h3 class="card-title" style="color:white; font-size: 1.5rem;">ຂໍ້ມູນລາຍງານລາຍຮັບປະຈຳວັນ</h3>
            </div>
            <div class="card-body">
                 <canvas id="chartjs"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ລຳດັບ</th>
                            <th>ລາຍການ</th>
                            <th>ລາຍຮັບ</th>
                            <th>ລາຍຮັບລວມ</th>
                            <th>ວັນເດືອນປີທີ່</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $total_SUMALL = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        $total += $row['total_sum'];
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['receive_name']) . "</td>";
                        echo "<td>" . number_format($row['pay_amount'], 0) . "</td>";
                        echo "<td>" . number_format($row['total_sum'], 0) . "</td>";
                        echo "<td>" . htmlspecialchars($row['order_date']) . "</td";
                        echo "</tr>";
                        
                      }
                      $total_SUMALL = $total;
                      include('../convertnumtoLao.php');
                      echo "<tr>";
                        echo "<td align='right' colspan='4'><b>ລາຄາລວມທັງໝົດ
                        (
                        " .Convert($total_SUMALL) . ")
                        </b>
                        <br>
                        <b>ຍອດລາຍຮັບ
                        (" . Convert($total_SUMALL) .")
                        </b>
                        </td>";
                        echo "<td align='right' colspan='2' <b>" . number_format($total_SUMALL, 0) . " ກີບ
                        </b>
                        <br>
                        <b> " . number_format($total_SUMALL, 0) . " ກີບ
                        </b></td>";
                      echo "</tr>";
                      ?>
                    </tbody>
                </table>
                <div class="card-footer" align="end">
                    <div id="pagination_controls">
                      <?php echo $paginationCtrls;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    
</body>

</html>



<script>
// chart colors
var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d','#5BA3E6','#015DE5','#00bfff','rgba(11, 137, 240, 0.28)','rgba(23, 33, 41, 0.11)'];

var date_sale = [<?php echo $date_sale; ?>];
var total_sale = [<?php echo $total_sale; ?>];
var order_total = [<?php echo $order_total; ?>];

console.log("Dates:", date_sale);
console.log("Sales (Status 4):", total_sale);
console.log("Orders (Status 2):", order_total);

new Chart(document.getElementById("chartjs"), {
  type: "line",
  data: {
    labels: date_sale,
    datasets: [{
      label: "ຍອດຂາຍ (KIP)",
      fill: true,
      backgroundColor: "rgba(71, 167, 247, 0.41)",
      backgroundColor: colors[9],
      borderColor: "#007bff",
      data:  total_sale
    }, 
    {
      label: "ຍອດສັ່ງຊື້ (KIP)",
      fill: true,
      backgroundColor: "rgba(11, 53, 20, 0.41)",
      backgroundColor: colors[3],
      borderColor: "#adb5bd",
      borderDash: [4, 4],
      data: order_total
    }]
  },
  options: {
    scales: {
      xAxes: [{
        reverse: true,
        gridLines: {
          color: "rgba(0,0,0,0.05)"
        }
      }],
      yAxes: [{
        borderDash: [5, 5],
        gridLines: {
          color: "rgba(0,0,0,0)",
          fontColor: "#fff"
        }
      }]
    }
  }
});
  /* chart.js chart examples */




</script>