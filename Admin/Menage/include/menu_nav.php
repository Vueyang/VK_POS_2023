<div class="containt_main">
               <?php
                  include("connectdb.php");
                  $sql_c1 = $conn->query("select * from tb_product_type");
                  ?>
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.php">ໜ້າຫຼັກ</a>
                     <?php while($rs_c1 = $sql_c1->fetch_assoc()):
		                  ?>
                        <a class="dropdown-item" href="show_detail.php?id=<?=$rs_c1["type_id"]?>&name=<?=$rs_c1["type_name"]?>"><?php echo $rs_c1["type_name"]; ?></a>
                        <?php
		                  endwhile;
		                  ?>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <?php
                  $sql_c = $conn->query("select * from tb_product_type");
                  ?>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ປະເພດສີນຄ້າ
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <?php while($rs_c = $sql_c->fetch_assoc()):
		                  ?>
                        <a class="dropdown-item" href="show_detail.php?id=<?=$rs_c["type_id"]?>&name=<?=$rs_c["type_name"]?>"><?php echo $rs_c["type_name"]; ?></a>
                        <?php
		                  endwhile;
		                  ?>
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="ຄົ້ນຫາສີນຄ້າ">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>