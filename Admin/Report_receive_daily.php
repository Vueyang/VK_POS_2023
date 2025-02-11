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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
    <link href="css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/adminlte.min.css">
	<link rel="stylesheet" href="assets/adminlte.min.css">
	<link rel="stylesheet" href="assets/charts.css">
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
  $query_chart = "SELECT DATE_FORMAT(order_date, '%d-%M-%Y') AS order_date, SUM(pay_amount2) AS total_sum
  FROM tbl_order_receive GROUP BY DATE(order_date) ORDER BY order_id DESC $limit";
  $result_chart = mysqli_query($conn, $query_chart);
  //print_r($result_chart);
   // ຄຳສັ່ງ SQL ສຳລັບດຶງຂໍ້ມູນ
   $query = "SELECT SQL_CALC_FOUND_ROWS *, SUM(pay_amount2) AS total_sum 
   FROM tbl_order_receive 
   GROUP BY order_id
   ORDER BY order_date DESC $limit ";//GROUP BY order_id 
   $result = mysqli_query($conn, $query);
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
   $datesave = [];
   $totol = [];
   while($rs = mysqli_fetch_assoc($result_chart)){
    
    $datesave[]= '"' . $rs['order_date'] . '"'; // ເພີ່ມວັນທີເຂົ້າ array
    $total[] = $rs['total_sum']; // ເພີ່ມຍອດລວມເຂົ້າ array
    //print_r($datesave);
   }
   // ປ່ຽນ array ເປັນ string ທີ່ຄ່າແຍກດ້ວຍ comma
   $datesave = implode(",", $datesave);
   $totol = implode(",", $total);
  ?>
    <div class="container">
        <div class="card mb-4" >
            <div class="card-header" style="background-color:#6c757d" >
                <h3 class="card-title" style="color:white; font-size: 1.5rem;">ຂໍ້ມູນລາຍງານລາຍຮັບປະຈຳວັນ</h3>
            </div>
            <div class="card-body">
                <canvas id="chartjs-line" ></canvas>
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
    <script>
new Chart(document.getElementById("chartjs-line"), {
  type: "line",
  data: {
    labels: <?php echo $datesave;?>,
    datasets: [{
      label: "Sales ($)",
      fill: true,
      backgroundColor: "transparent",
      borderColor: window.theme.primary,
      data: <?php echo $total;?>
    }, {
      label: "Orders",
      fill: true,
      backgroundColor: "transparent",
      borderColor: "#adb5bd",
      borderDash: [4, 4],
      data: [958, 724, 629, 883, 915, 1214, 1476, 1212, 1554, 2128, 1466, 1827]
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
</script>
</body>

</html>



