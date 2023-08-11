<?php
include('connetdb.php');

$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$en_name = mysqli_real_escape_string($conn, $_POST["en_name"]);
$en_lastname = mysqli_real_escape_string($conn, $_POST["en_lastname"]);
$date = mysqli_real_escape_string($conn, $_POST["date_of_birth"]);
$newDate = date('Y/m/d', strtotime(str_replace('/', '-', $date)));
$en_phone = mysqli_real_escape_string($conn, $_POST["en_phone"]);
$en_email = mysqli_real_escape_string($conn, $_POST["en_email"]);
$village = mysqli_real_escape_string($conn, $_POST["village"]);
$district = mysqli_real_escape_string($conn, $_POST["district"]);
$provice = mysqli_real_escape_string($conn, $_POST["provice"]);
$position = mysqli_real_escape_string($conn, $_POST["position"]);
$responsible = mysqli_real_escape_string($conn, $_POST["responsible"]);
//$en_password = mysqli_real_escape_string($conn, (sha1($_POST["en_password"])));


$date1 = date("Ymd_His");
$numrand = (mt_rand());
$en_img = (isset($_POST['en_img']) ? $_POST['en_img'] : '');
$upload = $_FILES['en_img']['name'];
if ($upload != '') {

  $path = "./image/";
  $type = strrchr($_FILES['en_img']['name'], ".");
  $newname = $numrand . $date1 . $type;
  $path_copy = $path . $newname;
  // $path_link="../en_img/".$newname;
  move_uploaded_file($_FILES['en_img']['tmp_name'], $path_copy);
} else {
  $newname = '';
}
$gender1 = "";
if ($gender == "0") {
  $gender1 = "ຊາຍ";
} elseif ($gender == "1") {
  $gender1 = "ຍິງ";
}

$posotion1 = "";
if ($position == "0") {
  $posotion1 = "ຜູ້ໃຊ້ລະບົບ(Admin)";
} elseif ($position == "1") {
  $posotion1 = "ຜູ້ຈັກການ";
} elseif ($position == "2") {
  $posotion1 = "ພະນັກງານການຕະຫຼາດ";
} elseif ($position == "3") {
  $position = "ພະນັກງານບັນຊີ";
} elseif ($position == "4") {
  $posotion1 = "ພະນັກງານຂາຍ";
}
$sql = "INSERT INTO tbl_employee
  (
  gender,
  en_name,
  en_lastname,
  date_of_birth,
  en_phone,
  en_email,
  village,
  district,
  provice,
  position,
  responsible,
  en_image
  )
  VALUES
  (
  '$gender',
  '$en_name',
  '$en_lastname',
  '$newDate',
  '$en_phone',
  '$en_email',
  '$village',
  '$district',
  '$provice',
  '$posotion',
  '$responsible',
  '$newname'
  )";

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");

//exit();
//mysqli_close($conn);

if ($result) {
  echo "<script type='text/javascript'>";
  //echo "alert('เพิ่มข้อมูลเรียบร้อย');";
  echo "window.location = 'list_employee.php?en_add=en_add'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "window.location = 'list_employee.php?en_add_error=en_add_error'; ";
  echo "</script>";
}
?>