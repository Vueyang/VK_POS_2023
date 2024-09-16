<?php 
 include('connetdb.php');
 $exchage_id = $_POST['exchage_id'];
 $baht_name = $_POST['baht_name'];
 $dalo_name = $_POST['dola_name'];
  
 $sql="UPDATE tb_exchage SET baht_name = '$baht_name', dola_name = '$dalo_name' WHERE exchage_id = '$exchage_id'";
 $result= mysqli_query($conn, $sql) or die("Error in query: $sql" . mysqli_error($conn) . "<br>$sql");
 //exit(); 
 mysqli_close($conn);
 if($result){
    echo "<script type='text/javascript'>";
    echo "window.location = 'form_exchange.php?exchage_id=$exchage_id&&exchage_edit=exchage_edit';";
    echo "</script>";
 }else{
    echo "<script type='text/javascript'>";
    echo "window.location = 'form_exchange.php?exchage_id=$exchage_id&&exchage_error=exchage_error';";
    echo "</script>";
 }
?>