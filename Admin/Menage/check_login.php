<?php
include('connetdb.php');
session_start();
if (isset($_POST['mem_username'])) {
  //connection
  //รับค่า user & mem_password       

  $mem_username = mysqli_real_escape_string($conn, $_POST['mem_username']);
  $mem_password = mysqli_real_escape_string($conn, sha1($_POST['mem_password']));
  $chk = trim($mem_username) or trim($mem_password);
  if ($chk == '') {
    echo '<script>';
    echo "alert(\" ຊື່ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ \");";
    echo "window.history.back()";
    echo '</script>';
  } //close if chk trim
  else {
    //query 
    $sql = "SELECT * FROM tbl_member m, tbl_employee e
                              WHERE m.en_id = e.en_id AND mem_username='" . $mem_username . "' 
                              AND mem_password='" . $mem_password . "' ";
    $result = mysqli_query($conn, $sql);
    //echo mysqli_num_rows($result);
    
//echo $_POST['mem_password'];
    //exit();
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $_SESSION["mem_id"] = $row["mem_id"];
      $_SESSION["mem_username"] = $row["mem_username"];
      $_SESSION["ref_l_id"] = $row["ref_l_id"];
      $_SESSION["en_image"] = $row["en_image"];
      $_SESSION["mem_address"] = $row["mem_address"];
      //echo $_SESSION['mem_password'];
      //var_dump($_SESSION);
      //exit();
      if ($_SESSION["ref_l_id"] == "1") { //ຖ້າເປັນ admin ໃຫ້ເຂົ້າໄປໜ້າ admin_page.php
        //echo "Are Your Admin";
        //exit();
        Header("Location:Dashboard.php");

      } elseif ($_SESSION["ref_l_id"] == "2") {

        Header("Location:admin/list_employee.php");
      } elseif ($_SESSION["ref_l_id"] == "3") {

        Header("Location: Report_Receip.php");
      } elseif ($_SESSION["ref_l_id"] == "4") {

        Header("Location:list_employee.php");
      } elseif ($_SESSION["ref_l_id"] == "5") {

        Header("Location:list_employee.php");
      } elseif ($_SESSION["ref_l_id"] == "6") {

        Header("Location:list_employee.php");
      } elseif ($_SESSION["ref_l_id"] == "7") {

        Header("Location:list_sale_approved.php");
      }
    } else {
      echo "<script>";
      echo "alert(\"ຊື່ ຫຼື  ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ\");";
      echo "window.history.back()";
      echo "</script>";
    }
  } //close else chk trim
  //exit();
} else {
  Header("Location: index.php"); //user & mem_password incorrect back to login again
}



?>