<?php 
include('connetdb.php');
    $ref_l_id = mysqli_real_escape_string($conn,$_POST["ref_l_id"]);
  
  $mem_name = mysqli_real_escape_string($conn,$_POST["mem_name"]);
$mem_lastname = mysqli_real_escape_string($conn, $_POST["mem_lastname"]);
$mem_phone = mysqli_real_escape_string($conn, $_POST["mem_phone"]);
$mem_email = mysqli_real_escape_string($conn, $_POST["mem_email"]);
$mem_village = mysqli_real_escape_string($conn, $_POST["mem_village"]);
$mem_district = mysqli_real_escape_string($conn, $_POST["mem_district"]);
$mem_provice = mysqli_real_escape_string($conn, $_POST["mem_provice"]);
  $mem_username = mysqli_real_escape_string($conn,$_POST["mem_username"]);
  $mem_password = mysqli_real_escape_string($conn,(sha1($_POST["mem_password"])));
  

  $date1 = date("Ymd_His");
  $numrand = (mt_rand());
  $mem_img = (isset($_POST['mem_img']) ? $_POST['mem_img'] : '');
  $upload=$_FILES['mem_img']['name'];
  if($upload !='') { 

    $path="./image/";
    $type = strrchr($_FILES['mem_img']['name'],".");
    $newname =$numrand.$date1.$type;
    $path_copy=$path.$newname;
    // $path_link="../mem_img/".$newname;
    move_uploaded_file($_FILES['mem_img']['tmp_name'],$path_copy);  
  }else{
    $newname='';
  }

  $check = "
  SELECT mem_username 
  FROM tbl_member  
  WHERE mem_username = '$mem_username'
  ";
    $result1 = mysqli_query($conn, $check);
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
      echo "<script>";
      
      echo "window.location = 'list_mem.php?mem_error=mem_error'; ";
      echo "</script>";
    }else{

    
  $sql = "INSERT INTO tbl_member
  (
  ref_l_id,
  
  mem_name,
  mem_lastname,
  mem_phone,
  mem_email,
  mem_username,
  mem_password,
  mem_village,
  mem_district,
  mem_provice,
  mem_img
  )
  VALUES
  (
  '$ref_l_id',
  '$mem_name',
  '$mem_lastname',
  '$mem_phone',
  '$mem_email',
  '$mem_username',
  '$mem_password',
  '$mem_village',
  '$mem_district',
  '$mem_provice',
  '$newname'
  )";

  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn). "<br>$sql");

  }
  //exit();
  //mysqli_close($conn);

  if($result){
  echo "<script type='text/javascript'>";
  //echo "alert('เพิ่มข้อมูลเรียบร้อย');";
  echo "window.location = 'list_mem.php?mem_add=mem_add'; ";
  echo "</script>";
  }else{
  echo "<script type='text/javascript'>";
  echo "window.location = 'list_mem.php?mem_add_error=mem_add_error'; ";
  echo "</script>";
  }
?>