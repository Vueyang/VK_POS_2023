<?php
session_start();
include("connetdb.php");
/*if ((empty($_SESSION["MM_UserName"])) or (empty($_SESSION["MM_UserRight"]))) {
header("location:../login.php");
exit;
};*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ລະບົບບໍລິຫານການຈັດການຂໍ້ມູນພາຍໃນຮ້ານສົມບູນແອ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <style type="text/css">
@import url("css/style1.css");
*{ 
font-family:"BoonHome";
}
body,td,th {
	font-family: "BoonHome";
	src: url('fonts/boonhome-400.eot'); 
src: url('fonts/boonhome-400.eot?#iefix') format('embedded-opentype'), 
url('fonts/boonhome-400.woff2') format('woff2'), 
url('fonts/boonhome-400.woff') format('woff'), 
url('fonts/boonhome-400.ttf') format('truetype'),
url('fonts/boonhome-400.svg#boonhome-400') format('svg'); 
font-weight: normal;
font-style: normal; 
}
</style>
 <?php
 include("include/styles.php");
?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php
 //include("include/top_nav.php");
?>
<!-- end Side Navbar -->
    <div class="page">
      <!-- navbar-->
      <?php
 //include("include/header.php");
?>
      <!-- Statistics Section-->
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">ຂໍ້ມູນອັດຕາແລກປ່ຽນ</li>
          </ul>
        </div>
      </div>
      <div class="container-fluid">
          <!-- start Modal form-->
          <div class="col-lg-4">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>ເພີ່ມຂໍ້ມູນອັດຕາແລກປ່ຽນ</h4>
                </div>
                <div class="card-body text-center">
                  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">ເພີ່ມຂໍ້ມູນອັດຕາແລກປ່ຽນ</button>
                  <!-- Modal-->
                  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">ຟອມເພີ່ມຂໍ້ມູນອັດຕາແລກປ່ຽນ</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                        <form name="checkForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return check()">
                            <div class="form-group">       
                              <label>ອັດຕາແລກປ່ຽນເງີນບາດ</label>
                              <input type="text" name="bath_name" placeholder="ອັດຕາແລກປ່ຽນເງີນບາດ" class="form-control" require>
                            </div>
                            <div class="form-group">       
                              <label>ອັດຕາແລກປ່ຽນເງີນໂດລາ</label>
                              <input type="text" name="dola_name" placeholder="ອັດຕາແລກປ່ຽນເງີນໂດລາ" class="form-control" require>
                            </div>
                            <div class="form-group">       
                              <input type="submit" name="save" value="ບັນທຶກ" class="btn btn-primary">
                              <input type="reset" value="ລືມ" class="btn btn-primary">
                            </div>
                          </form>

                          <?php
if (isset($_POST['save'])) { 
include"connetdb.php";
ob_start();
date_default_timezone_set("Asia/Vientiane");
$date = date('Y-m-d');
$t=date("H:i:s");
$bath_name = $_POST["bath_name"];
$dola_name = $_POST["dola_name"];
$sql = $conn->query("insert into tb_exchage(bath_name,dola_name) values('$bath_name','$dola_name')");
mysqli_close($conn);
echo "<center><h3>ເພີ່ມຂໍ້ມູນສຳເລັດແລ້ວ !!!</h3></center>";
echo "<meta http-equiv='refresh' content='0; url=form_exchange.php'>";
}
?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">ປິດ</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end Modal form-->
      <section class="statistics">
          <!-- start table-->

          <?php
require('connetdb.php');
$sql=$conn->query("select * from tb_exchage");
$Num_Rows = $sql->num_rows;	
	
//=====step 1========
error_reporting(E_ALL ^ E_NOTICE);
$Per_Page = 10;   // Per Page
$Page = $_GET["Page"];
if(!$_GET["Page"])
{

$Page=1;
}
////=====step 2========
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
////=====step 3========
if($Num_Rows<=$Per_Page)
{
$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{

$Num_Pages =($Num_Rows/$Per_Page)+1;

$Num_Pages = (int)$Num_Pages;
}
////=====step order========
$sql = $conn->query("select * from tb_exchage order  by exchage_id ASC LIMIT $Page_Start , $Per_Page");
if($Num_Rows == 0) {
        echo '<p align=center>ຍັງບໍ່ມີຂໍ້ມູນ !!!</p>';
    }
    else {
?>
      <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>ລາຍການຂໍ້ມູນອັດຕາແລກປ່ຽນ</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-bordered" cellspacing="0">
                      <thead class="thead-dark">
                        <tr>
                          <th>ລໍາດັບ</th>
                          <th>ອັດຕາແລກປ່ຽນເງີນບາດ</th>
                          <th>ອັດຕາແລກປ່ຽນເງີນໂດລາ</th>
                          <th>ຈັດການ</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
 $i=0;
 while($row=$sql->fetch_assoc()){
	 $i++;
 ?>
                        <tr>
                          <th scope="row"><?=$i;?></th>
                          <td><?php echo $row['bath_name'];?> ບາດ</td>
                          <td><?php echo $row['dola_name'];?> ໂດລາ</td>
                          <td><a href="form_edit_exchange.php?exchage_id=<?php echo $row['exchage_id'];?>&of_name=<?=$row['dola_name']?>" class="btn btn-success">ແກ້ໄຂ</a>
                         </td>
                        </tr>
                      </tbody>
                      <?php
 }
?> 
                    </table>
                    <div id="num"> Page
<?php
//===========Step5==================
if($Prev_Page)
{
	echo " <a href=".$_SERVER["SCRIPT_NAME"]."?Page=".$Prev_Page.">ກັບ</a> ";
	
}
//===========Step6==================
for($i=1; $i<=$Num_Pages; $i++){
$Page1 = $Page-2;
$Page2 = $Page+2;
//===========Step7==================
if($i != $Page && $i >= $Page1 && $i <= $Page2)
{
echo "<label id='numshow'> <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[txtKeyword]>$i</a> </label>";
}
else if($i==$Page)
{
echo "<label id='c'> $i </label>";
}
}
////===========Step8==================
if($Page!=$Num_Pages)
{
echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Num_Pages&txtKeyword=$_GET[txtKeyword]'>  ຕໍ່ໄປ</a> ";
}
}
mysqli_close($conn);

?>
</div>
                  </div>
                </div>
              </div>
            </div>
      </section>
      </div>
        <!-- end table-->
      <!-- end Statistics Section-->
      <?php
      //include("include/footer.php");
      ?>
    </div>
    <!-- JavaScript files-->
   <?php
   include("include/script.php");
   ?>
   <script language="JavaScript">
   function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
 </script>
  </body>
</html>