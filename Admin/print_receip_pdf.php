<?php 
   require_once __DIR__ . '/vendor/autoload.php';
   error_reporting(error_reporting() & ~E_NOTICE);
   session_start();
   
   $mem_id = $_SESSION['mem_id'];
   $menu = "Report_Receip";
   include('connetdb.php');


//ທ່ານຊ່ວຍແກ້ໄຂ code ໃນການຄົ້ນຫາຕາມວັນທີ 
$daily = mysqli_real_escape_string($conn, $_GET['order_date']);
$dateParts = explode('-', $daily);
$formatdate =$dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

$txt1 = "ລາຍງານລາຍຮັບປະຈຳວັນທັງໝົດ";
$txt2 = "ລາຍງານລາຍຮັບປະຈຳວັນທີ";
$text = "";
if(!empty($daily)){
   $text = "$txt2 $formatdate";
   $query_chart = "SELECT SQL_CALC_FOUND_ROWS *, DATE_FORMAT(order_date, '%d-%M-%Y') AS order_date, SUM(pay_amount2) AS total_sum 
   FROM tbl_order_receive  WHERE DATE(order_date) = '$daily'
   GROUP BY order_date
   ORDER BY order_id DESC ";//GROUP BY order_id 

   $result_chart = mysqli_query($conn, $query_chart);
   $result = mysqli_query($conn, $query_chart);
   if (!$result_chart) {
     die("Query Failed: " . mysqli_error($conn)); // ກວດສອບ error ຂອງ SQL
   }
   if (!$result) {
   die("Query Failed: " . mysqli_error($conn));
   }
}else{
//  ດຶງຂໍ້ມູນຈາກຖານຂໍ້ມູນ ຄຳສັ່ງສຳລັບກຣາຟ
   $text = $txt1;
   $query_chart = "SELECT SQL_CALC_FOUND_ROWS*, DATE_FORMAT(order_date, '%d-%M-%Y') AS order_date, SUM(pay_amount2) AS total_sum
   FROM tbl_order_receive WHERE order_date
   GROUP BY order_date
   ORDER BY order_id DESC";

   $result_chart = mysqli_query($conn, $query_chart);
   if (!$result_chart) {
   die("Query Failed: " . mysqli_error($conn)); // ກວດສອບ error ຂອງ SQL
   }
   $result = mysqli_query($conn, $query_chart);
   if (!$result) {
     die("Query Failed: " . mysqli_error($conn));
   }
 
}
// ສ້າງ array ເກັບວັນທີ ແລະ ຍອດລວມ

$date_list = [];
$data_sales = [];
$data_orders = [];
$total_sell = 0;
$total_order = 0;
// ດຶງແຖວຂໍ້ມູນອອກມາ
if(!empty($result_chart)){
 while ($rs = mysqli_fetch_assoc($result_chart)) {
   if ($rs) {
       $date_list[] = $rs['order_date'];
       if ($rs['order_status'] == 4) {
           $data_sales[$rs['order_date']] += $rs['total_sum'];
           $total_sell += $rs['total_sum'];
       } elseif ($rs['order_status'] == 2) {
           $data_orders[$rs['order_date']] += $rs['total_sum'];
           $total_order += $rs['total_sum'];
       }
   } else {
     echo "ການສົ່ງຄຳສັ່ງຂໍ້ມູນລົ້ມເຫຼວ: " . mysqli_error($conn);
   } 
 }
}else{
  while ($rs = mysqli_fetch_assoc($result_chart_date)) {
    if ($rs) {
        $date_list[] = $rs['order_date'];
        if ($rs['order_status'] == 4) {
            $data_sales[$rs['order_date']] += $rs['total_sum'];
            $total_sell+= $rs['total_sum'];
        } elseif ($rs['order_status'] == 2) {
            $data_orders[$rs['order_date']] += $rs['total_sum'];
            $total_order += $rs['total_sum'];
        }
    } else {
      echo "ການສົ່ງຄຳສັ່ງຂໍ້ມູນລົ້ມເຫຼວ: " . mysqli_error($conn);
    } 
  }
}
 //var_dump($total_sell, $total_order);
 //  echo "<pre>";
 //  var_dump($date_list, $data_sales, $data_orders );
 //  echo "</pre>";

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
$date_sale = json_encode($date_sale); // ໃຊ້ json_encode ເພື່ອປ່ຽນ array ເປັນ JSON
$total_sale = implode(",", $total_sale);
$order_total = implode(",", $order_total);


   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview</title>
    <script src="js/jquery.js" type="text/javascript"></script>
	<link href="/font/NotoSansLao-VariableFont_wdth,wght.ttf" rel="stylesheet">
    <link rel="stylesheet" href="css_js/css/chart.css"></link>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
  <script src="css_js/js/highcharts.js"></script>
 <!-- <script src="css_js/js/exporting.js"></script> -->
<script src="css_js/js/export-data.js"></script>
<script src="css_js/js/accessibility.js"></script>
  <link rel="stylesheet" href="css/boostarp.css">
</head>
<body>
<div class="container" ><br>
      <table cellpadding="0" cellspacing="0" align="center" width="1000">
        <tr>
          <td align="center" style="font-size: 16px;">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</td>
        </tr>
        <tr>
          <td align="center" style="font-size: 16px;">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</td>
        </tr>
      </table>
      <table cellpadding="0" cellspacing="0" align="center" width="1000">
        <tr>
          <td style="font-size: 16px;">ຮ້ານ VK_POS</td>
          <td align="right"></td>
        </tr>
        <tr>
          <td style="font-size: 14px;">ຕັ້ງຢູ່ສາມແຍກຕະຫຼາດເກົ່າເມືອງລ້ອງຊານ ບ້ານ ຄອນວັດ, ເມືອງ ລ້ອງຊານ, ແຂວງ ໄຊສົມບູນ</td>
          <td align="right"></td>
        </tr>
        <tr>
          <td style="font-size: 12px;">ໂທ: 020 78665114, 020 78779149</td>
          <td align="right"></td>
        </tr>
      </table>
        <table cellpadding="0" cellspacing="0" align="center" width="100%">
          <tr>
            <td align="center" style="font-size: 20px; color:#06D001;"> <?php echo $text?></td>
          </tr>
          <tr>
            <td align="center" style="font-size: 16px;">ຜູ້ທຳລາຍການ: <?php echo "<lable style='color:#FF5580'>". $_SESSION['mem_username'] . "</lable>"; ?></td>
          </tr>
          
        </table>
        <figure class="highcharts-figure mt-2">
            <div id="Highcharts"></div>
        </figure>
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
                      $total = 0;
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
                <div class="button_print my-12">
                  <a href="report_pdf/Recode_receive_detail.pdf"><button class="btn btn-primary my-12 button_print_1">ລາຍງານເປັນ PDF</button> </a>
              </div>
        <br>
                    </div>
<?php 
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>

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
            text: 'ຍອດສັ່ງຊື້ = <?php echo number_format($total_order, 0);?> (KIP)'
        }
    }, { // Secondary axis
        className: 'highcharts-color-1',
        opposite: true,
        title: {
            text: 'ຍອດຂາຍ = <?php echo number_format($total_sell, 0);?> (KIP)'
        }
    }],
    plotOptions: {
        column: {
            borderRadius: 5
        }
    },
    series: [{
        name: 'ຍອດສັ່ງຊື້',
        data: [<?php echo $order_total; ?>], // ຂໍ້ມູນຍອດສັ່ງຊື້
        tooltip: {
            valueSuffix: ' ກີບ'
        }
    }, {
        name: 'ຍອດຂາຍ',
        data: [<?php echo $total_sale; ?>], // ຂໍ້ມູນຍອດຂາຍ
        yAxis: 1
    }]
});



</script>
</body>
</html>