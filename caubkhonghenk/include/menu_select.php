<section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
              <?php
require('connectdb.php');
$sql = $conn->query("select * from tb_customer");
$Num_Rows = $sql->num_rows;	
$sql1 = $conn->query("select * from tb_user");
$Num_Rows1 = $sql1->num_rows;	
$sql2 = $conn->query("select * from order_tb where order_status='3'");
$Num_Rows2 = $sql2->num_rows;	
$sql3 = $conn->query("select * from order_tb where order_status='0'");
$Num_Rows3 = $sql3->num_rows;	
?>
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">ຂໍ້ມູນລູກຄ້າ</strong><span>ທັງໝົດ</span>
                  <div class="count-number"><?=$Num_Rows;?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-padnote"></i></div>
                <div class="name"><strong class="text-uppercase">ຂໍ້ມູນຜູ້ໃຊ້ລະບົບ</strong><span>ທັງໝົດ</span>
                  <div class="count-number"><?=$Num_Rows1;?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-check"></i></div>
                <div class="name"><strong class="text-uppercase">ຂໍ້ມູນການສົ່ງເຄື່ອງສໍາເລັດ</strong><span>ທັງໝົດ</span>
                  <div class="count-number"><?=$Num_Rows2;?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-bill"></i></div>
                <div class="name"><strong class="text-uppercase">ຂໍ້ມູນການສັ່ງຊື້</strong><span>ທັງໝົດ</span>
                  <div class="count-number"><?=$Num_Rows3;?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            
          </div>
        </div>
      </section>