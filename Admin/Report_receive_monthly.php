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
  <link rel="stylesheet" href="css_js/css/chart.css"></link>
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <script src="css_js/js/highcharts.js"></script>
<script src="css_js/js/exporting.js"></script>
<script src="css_js/js/export-data.js"></script>
<script src="css_js/js/accessibility.js"></script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <?php
  //ທ່ານຊ່ວຍແກ້ໄຂ code ໃນການຄົ້ນຫາຕາມວັນທີ 
  $month = isset($_GET['selected_month']) ? mysqli_real_escape_string($conn, $_GET['selected_month']) : "";
// ນັບຈຳນວນ order_id ທີ່ບໍ່ຊ້ຳກັນ
 $queryCount = mysqli_query($conn, "SELECT COUNT(DISTINCT DATE_FORMAT(order_date, '%Y-%m')) FROM tbl_order_receive");
 $row = mysqli_fetch_row($queryCount);
$rows = $row[0];

// ກຳນົດຈຳນວນຂໍ້ມູນຕໍ່ໜ້າ
$page_rows = 6; // ຈຳນວນຂໍ້ມູນທີຕ້ອງການໃຫ້ສະແດງໃນ 1 ໜ້າ ສະແດງ 5 ລາຍການ(record) / ໜື່ງໜ້າ
$last = ceil($rows / $page_rows);

if($last < 1){
  $last = 1;
}

// ກວດສອບວ່າໜ້າທີ່ຖືກເລືອກແມ່ນຫຍັງ
$pagenum = 1;
 if(isset($_GET['pn']) ? intval($_GET['pn']) : 1){
   $pagenum = preg_replace('#[^0-9]#','', $_GET['pn']);
 }
 if($pagenum < 1){
   $pagenum = 1;
 }else if($pagenum > $last){
   $pagenum = $last;
  
 }

// ຄຳສັ່ງ LIMIT
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
if(!empty($month)){
      $query_chart = "SELECT 
        DATE_FORMAT(order_date, '%m-%Y') AS order_month, 
        SUM(pay_amount2) AS total_sum, 
        SUM(CASE WHEN order_status = 4 THEN pay_amount2 ELSE 0 END) AS total_sales, 
        SUM(CASE WHEN order_status = 2 THEN pay_amount2 ELSE 0 END) AS total_orders 
        FROM tbl_order_receive WHERE DATE_FORMAT(order_date, '%Y-%m') = '$month'
        GROUP BY DATE_FORMAT(order_date, '%Y-%m') 
        ORDER BY order_month DESC $limit";

      $result_chart = mysqli_query($conn, $query_chart);
      
      if (!$result_chart) {
        die("Query Failed: " . mysqli_error($conn)); // ກວດສອບ error ຂອງ SQL
      }
      // ຄຳສັ່ງ SQL ສຳລັບດຶງຂໍ້ມູນ
      // $query = "SELECT SQL_CALC_FOUND_ROWS *, SUM(pay_amount2) AS total_sum 
      // FROM tbl_order_receive  WHERE DATE(order_date) = '$daily'
      // GROUP BY order_date
      // ORDER BY order_id DESC $limit ";//GROUP BY order_id 
      // $result = mysqli_query($conn, $query);
      $result = mysqli_query($conn, $query_chart);
      if (!$result) {
      die("Query Failed: " . mysqli_error($conn));
      }
}else{
 // ດຶງຂໍ້ມູນເປັນເດືອນ
$query_chart = "SELECT SQL_CALC_FOUND_ROWS *,
        DATE_FORMAT(order_date, '%m-%Y') AS order_month, 
        SUM(pay_amount2) AS total_sum, 
        SUM(CASE WHEN order_status = 4 THEN pay_amount2 ELSE 0 END) AS total_sales, 
        SUM(CASE WHEN order_status = 2 THEN pay_amount2 ELSE 0 END) AS total_orders 
        FROM tbl_order_receive 
        GROUP BY DATE_FORMAT(order_date, '%m-%Y') 
        ORDER BY order_date DESC $limit";


      $result_chart = mysqli_query($conn, $query_chart);
      if (!$result_chart) {
      die("Query Failed: " . mysqli_error($conn)); // ກວດສອບ error ຂອງ SQL
      }
      $result = mysqli_query($conn, $query_chart);
      if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
      }

      // // ຄຳສັ່ງ SQL ສຳລັບດຶງຂໍ້ມູນ
      // $query = "SELECT SQL_CALC_FOUND_ROWS *, SUM(pay_amount2) AS total_sum 
      // FROM tbl_order_receive WHERE order_id
      // GROUP BY order_date
      // ORDER BY order_id DESC $limit ";//GROUP BY order_id 
      // $result = mysqli_query($conn, $query);
      // if (!$result) {
      //   die("Query Failed: " . mysqli_error($conn));
      // }
      $paginationCtrls = '';
      if($last !=1){
      if($pagenum > 1){
        $previonus = $pagenum - 1;
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp;';
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
      if($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-info">Next</a>';
      }
    }
}
   // ສ້າງ array ເກັບວັນທີ ແລະ ຍອດລວມ
$date_list = [];
$data_sales = [];
$data_orders = [];
$total_sell = 0;
$total_order = 0;
// ດຶງແຖວຂໍ້ມູນອອກມາ
while ($rs = mysqli_fetch_assoc($result_chart)) {
    if ($rs) {
      // ປ່ຽນຮູບແບບວັນທີຈາກ 2-2025 ເປັນ February 2025
      $month_year = $rs['order_month']; // ດຶງຂໍ້ມູນວັນທີຈາກຖານຂໍ້ມູນ
      $month = DateTime::createFromFormat('m-Y', $month_year); // ປ່ຽນຮູບແບບວັນທີ
      $formatted_date = $month->format('F Y'); // ປ່ຽນເປັນ February 2025

      $date_list[] = $formatted_date; // ເກັບເດືອນໃນຮູບແບບໃໝ່
        $data_sales[$rs['order_month']] = $rs['total_sales']; // ຍອດຂາຍ
        $data_orders[$rs['order_month']] = $rs['total_orders']; // ຍອດສັ່ງຊື້
        $total_sell += $rs['total_sales'];
        $total_order += $rs['total_orders'];
    } else {
        echo "ການສົ່ງຄຳສັ່ງຂໍ້ມູນລົ້ມເຫຼວ: " . mysqli_error($conn);
    }
}
// ປ່ຽນ array ເປັນລາຍຊື່ວັນທີ່ທີ່ບໍ່ຊ້ຳ
$date_sale = array_unique($date_list);
sort($date_sale); // ຈັດລຽງວັນທີ່
// var_dump($result_chart);

 $total_sale = [];
 $order_total = [];
 foreach ($date_sale as $date) {
     $total_sale[] = isset($data_sales[$date]) ? $data_sales[$date] : 0;
     $order_total[] = isset($data_orders[$date]) ? $data_orders[$date] : 0;
 }
 // ປ່ຽນ array ເປັນ string

 $date_sale = json_encode($date_sale); // ໃຊ້ json_encode ເພື່ອປ່ຽນ array ເປັນ JSON
 $total_sale = implode(",", $data_sales);
 $order_total = implode(",", $data_orders);
 
// var_dump($total_sell, $total_order)
  ?>
    <div class="container">
        <div class="card mb-4" >
            <div class="card-header" style="background-color:#6c757d" >
                <h3 class="card-title" style="color:white; font-size: 1.5rem;">ຂໍ້ມູນລາຍງານລາຍຮັບປະຈຳເດືອນ</h3>
            </div>
            <div align="center" class="card-header">
              <div class="row">
                <div class="col-md-12" style="display:flex;" >
                  <a href="Report_receive_daily.php?p=daily" class="btn btn-info" style=" margin: 10px;"><i class='fas fa-chart-bar'></i> ວັນ</a> 
                  <a href="Report_receive_monthly.php?p=monthy" class="btn btn-success" style=" margin: 10px;"><i class='fas fa-chart-bar'></i> ເດືອນ</a>
                  </form>
                  <a href="Report_receive_yearly.php?p=yearly" class="btn btn-warning" style=" margin: 10px;"><i class='fas fa-chart-bar'></i> ປີ</a>
                  <div align="center" style=" left: 20px; text-align: center; width:60%;">
                    <h4 style=" margin: 10px;">ຂໍ້ມູນລາຍງານລາຍຮັບປະຈຳເດືອນ</h4>
                  </div>
                  <form method="GET">
					<input type="hidden" name="p" value="<?=$_GET['p']??''?>">
					<select class="form-select" name="selected_month" onchange="this.form.submit()">
						<option value="">ເລືອກເດືອນ</option>
						<?php 
						$monthQuery = "SELECT DISTINCT DATE_FORMAT(order_date, '%Y-%m') AS order_month 
									FROM tbl_order_receive 
									ORDER BY order_month DESC";
						$monthResult = mysqli_query($conn, $monthQuery);
						while ($row = mysqli_fetch_assoc($monthResult)) {
							$selected = ($_GET['selected_month'] ?? '') == $row['order_month'] ? 'selected' : '';
							$monthName = date('F Y', strtotime($row['order_month'].'-01'));
							echo '<option value="'.$row['order_month'].'" '.$selected.'>'.$monthName.'</option>';
						}
						?>
					</select>
			</form>
                </div>
                
              </div>
			      </div>
            

           
        </div>
        <figure class="highcharts-figure">
                <div id="Highcharts"></div>
            
        
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ລຳດັບ</th>
                            <th>ເດືອນປີ</th>
                            <th>ລາຍຮັບລວມ</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $total_SUMALL = 0;
                      $total = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        $total += $row['total_sum'];
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        $month_year = $row['order_month']; // ດຶງຂໍ້ມູນວັນທີຈາກຖານຂໍ້ມູນ
                      $month = DateTime::createFromFormat('m-Y', $month_year); // ປ່ຽນຮູບແບບວັນທີ
                      $formatted_month = $month->format('F Y'); // ປ່ຽນເປັນ February 2025nth']. '-01'));
									echo "<td>" . $formatted_month . "</td>";
                        echo "<td>" . number_format($row['total_sum'], 0) . "</td>";
                        echo "</tr>";
                      }
                      $total_SUMALL = $total;
                      include('../convertnumtoLao.php');
                      echo "<tr>";
                        echo "<td align='right' colspan='2'><b>ລາຄາລວມທັງໝົດ
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
       
    </figure>
    <div align="center" class="button_print my-12">
					<a href="Recode_Receive_m_PDF.php?expen_date=<?= $dt1 ?>&act=view" target="_blank"
															class="button_print btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> ພີມອອກ</a>
															</div>
                              <br>
    <?php include('footer.php'); ?>
    
</body>

</html>



<script>
Highcharts.chart('Highcharts', {
    chart: {
        type: 'column',
        styledMode: true
    },
    title: {
        text: 'ຍອດຂາຍ ແລະ ຍອດສັ່ງຊື້'
    },
    xAxis: {
        categories: <?php echo $date_sale; ?>, // ວັນທີ່
        crosshair: true
    },
    yAxis: [{ // Primary axis
        className: 'highcharts-color-0',
        title: {
            text: 'ຍອດສັ່ງຊື້ (KIP): <?php echo number_format($total_order, 0); ?>'
        }
    }, { // Secondary axis
        className: 'highcharts-color-1',
        opposite: true,
        title: {
            text: 'ຍອດຂາຍ (KIP): <?php echo number_format($total_sell, 0); ?>'
        }
    }],
    plotOptions: {
        column: {
            borderRadius: 5
        }
    },
    series: [{
        name: 'ຍອດສັ່ງຊື້ (KIP)',
        data: [<?php echo $order_total; ?>], // ຂໍ້ມູນຍອດສັ່ງຊື້
        tooltip: {
            valueSuffix: ' ກີບ'
        }
    }, {
        name: 'ຍອດຂາຍ (KIP)',
        data: [<?php echo $total_sale; ?>], // ຂໍ້ມູນຍອດຂາຍ
        yAxis: 1
    }]
});
</script>