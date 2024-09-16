<?php
include('../Admin/connetdb.php');
if(isset($_GET['exchage']) && $_GET['exchage'] == "del"){
    $exchage_id = $_GET['id'];
    $sql = "DELETE FROM tb_exchage WHERE exchage_id = '$exchage_id'";
    //echo $sql;
    //EXIT();
    if(mysqli_query($conn, $sql)){
        echo "<script type ='text/javascript'>";
        echo "window.location = 'form_exchange.php?exchage_del=exchage_del'";
        echo "</script>";
    }else{
        echo "<script type ='text/javascript'>";
        echo "window.location = 'form_exchange.php?exchage_error=exchage_error'";
        echo "</script>";
    }
}
?>