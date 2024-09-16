<?php
include"connectdb.php";
$sql = $conn->query("select * from tb_user where user_id='".$_SESSION["login_true"]."'");
$rs = $sql->fetch_assoc();
?>
<header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.php" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>ຮ້ານສົມບູນແອ </span><strong class="text-primary">  <?php
                             if($rs["Status"]=="super_Admin")
                              {
                              ?>
                             ເຈົ້າຂອງຮ້ານ
                              <?php
                              }
                              else if($rs["Status"]=="Admin")
                              {
                              ?>
                              ຜູ້ຈັດການຮ້ານ
                              <?php
                              }
                              else if($rs["Status"]=="banxi")
                              {
                              ?>
                              ພະນັກງານບັນຊີ
                              <?php
                              }
                              else
                              {
                              ?>  
                           ພະນັກງານຂາຍສີນຄ້າ
                              <?php
                              }
                              ?></strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <!-- Log out-->
                <li class="nav-item"><a href="log_out.php" class="nav-link logout" onclick="return confirm('ທ່ານຈະອອກຈາກລະບົບແທ້ບໍ?')"> <span class="d-none d-sm-inline-block">ອອກຈາກລະບົບ</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>