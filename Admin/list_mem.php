<?php
$menu = "member";
include('connetdb.php')
?>
<?php include("header.php"); ?>
<?php
$query_member = "SELECT * FROM tbl_member";
$rs_member = mysqli_query($conn, $query_member);
//echo ($query_level);//test query
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#blah').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
</script>
<!-- Main content -->
<style>
.fa {
	padding: 5px;
}

.fas {
	margin: 2px;
}
</style>
<section class="content" style="padding: 20px 20px">
	<div class="card card-gray text-center mb-4 mt-4">
		<div class="card-header ">
			<h3 class="card-title" style="font-size: 2rem;">ຂໍ້ມູນສີນຄ້າ</h3>
			<div align="right">
				<a class=" btn btn-primary" href="frm_add_mem.php"><i class="fa fa-plus"></i>ເພີ່ມສີນຄ້າໄໝ່</a>
			</div>
		</div>
		<br>
		<div class="card-body ">
			<div class="row">
				<table id="example1" class="table table-bordered text-center">
					<thead>
						<tr class="danger">
							<th width="5%">
								<center>ລຳດັບ</center>
							</th>
							<th width="10%">ຮູບ</th>
							<th>ຊື່</th>
							<th>ນາມສະກຸນ</th>
							<th>ເບີໂທ</th>
							<th>ອີແມວ</th>
							<th>ຜູ້ຈັກການລະບົບ</th>
							<th>ແກ້ໄຂ</th>
							<th>ລືບ</th>
						</tr>
					</thead>
					<?php
						$sql = "SELECT * FROM tbl_member";
						$result = mysqli_query($conn, $sql);
						while($row=mysqli_fetch_array($result)){
						?>
					<tbody>
						<tr>
							<td><?php echo @$l+=1; ?></td>
							<td><img src="./image/<?php echo $row['mem_img']; ?>" width="100%"></td>
							<td><?php echo $row['mem_name']; ?></td>
							<td><?php echo $row['mem_lastname']; ?></td>
							<td><?php echo $row['mem_phone']; ?></td>
							<td><?php echo $row['mem_email']; ?></td>
							<td><?php echo $row['mem_username']; ?></td>
							<td>
								<p style="margin-bottom: 10px;">
									<input type="hidden" name="mem_id" value="<?php echo $row['mem_id'];?>">
									<input type="hidden" name="ref_l_id" value="<?php echo $row['ref_l_id'];?>">
									<a href="edit_profile.php?id=<?=$row['mem_id']?>" class="btn btn-warning"><i
											class="fas fa-pencil-alt"></i>
										ແກ້ໄຂ</a>
								</p>
								<!-- <a href="level.php?ace=edit&l_id=<?php echo $row_level['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
							</td>
							<td><a href="delete_member.php?id=<?= $row['mem_id'];?> &&member=del"
									class="del-btn btn btn-danger"
									onclick="return confirm('ທ່ານຕ້ອງການລືບຂໍ້ມູນ ຫຼື ບໍ່ !!!')"><i
										class="fas fas fa-trash"></i>
									ລືບ</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer">
		</div>
	</div>
</section>

<?php include('footer.php'); ?>
<script>
$(function() {
	$(".datatable").DataTable();
	// $('#example2').DataTable({
	//   "paging": true,
	//   "lengthChange": false,
	//   "searching": false,
	//   "ordering": true,
	//   "info": true,
	//   "autoWidth": false,
	// http://fordev22.com/
	// });
});
</script>

</body>

</html>
<!-- http://fordev22.com/ -->