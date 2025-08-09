
	<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$menu = "Dashboard_HR";
include("header.php"); // header.php ຄວນມີ session_start() ຢູ່ແລ້ວ
$current_user_level = isset($_SESSION['ref_l_id']) ? $_SESSION['ref_l_id'] : '';

require_once('connetdb.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- ດຶງຂໍ້ມູນສະຫຼຸບສຳລັບ Dashboard (ບໍ່ມີ Pagination) ---
// ຈຳນວນພະນັກງານທັງໝົດ
$sql_total_employees = "SELECT COUNT(*) AS total_employees FROM tbl_employee";
$result_total_employees = $conn->query($sql_total_employees);
$total_employees = ($result_total_employees && $result_total_employees->num_rows > 0) ? $result_total_employees->fetch_assoc()['total_employees'] : 0;

// ພະນັກງານທີ່ກຳລັງ Active
$sql_active_employees = "SELECT COUNT(*) AS active_employees FROM tbl_employee WHERE employment_status = 'Active'";
$result_active_employees = $conn->query($sql_active_employees);
$active_employees = ($result_active_employees && $result_active_employees->num_rows > 0) ? $result_active_employees->fetch_assoc()['active_employees'] : 0;

// ຄຳຮ້ອງຂໍລາທີ່ລໍຖ້າການອະນຸມັດ
$sql_pending_leaves_count = "SELECT COUNT(*) AS pending_leaves FROM leave_requests WHERE status = 'Pending'";
$result_pending_leaves_count = $conn->query($sql_pending_leaves_count);
$pending_leaves_count = ($result_pending_leaves_count && $result_pending_leaves_count->num_rows > 0) ? $result_pending_leaves_count->fetch_assoc()['pending_leaves'] : 0;

// ພະນັກງານທີ່ກຳລັງລາ
$sql_on_leave_employees = "SELECT COUNT(*) AS on_leave_employees FROM tbl_employee WHERE employment_status = 'On Leave'";
$result_on_leave_employees = $conn->query($sql_on_leave_employees);
$on_leave_employees = ($result_on_leave_employees && $result_on_leave_employees->num_rows > 0) ? $result_on_leave_employees->fetch_assoc()['on_leave_employees'] : 0;


// --- Pagination ສຳລັບຕາຕະລາງ 'ພະນັກງານເຂົ້າໃໝ່ລ່າສຸດ' ---
$records_per_page_employees = 5; // 5 ຂໍ້ມູນຕໍ່ໜ້າ
// ຮັບຄ່າໜ້າປັດຈຸບັນຈາກ URL, ຖ້າບໍ່ມີໃຫ້ເປັນໜ້າ 1
$page_employees = isset($_GET['page_employees']) && is_numeric($_GET['page_employees']) ? (int)$_GET['page_employees'] : 1;

// ຄິດໄລ່ຈຳນວນຂໍ້ມູນທັງໝົດສຳລັບພະນັກງານ
$sql_total_latest_employees = "SELECT COUNT(*) AS total_latest FROM tbl_employee";
$result_total_latest_employees = $conn->query($sql_total_latest_employees);
$total_latest_employees = ($result_total_latest_employees && $result_total_latest_employees->num_rows > 0) ? $result_total_latest_employees->fetch_assoc()['total_latest'] : 0;

// ຄິດໄລ່ຈຳນວນໜ້າທັງໝົດ
$total_pages_employees = ceil($total_latest_employees / $records_per_page_employees);

// ປັບຄ່າ page_employees ໃຫ້ຢູ່ໃນຂອບເຂດທີ່ຖືກຕ້ອງ
if ($total_pages_employees == 0) $total_pages_employees = 1; // ຈັດການກໍລະນີທີ່ບໍ່ມີຂໍ້ມູນ
if ($page_employees < 1) $page_employees = 1;
if ($page_employees > $total_pages_employees) $page_employees = $total_pages_employees;

// ຄິດໄລ່ OFFSET
$offset_employees = ($page_employees - 1) * $records_per_page_employees;

// ດຶງຂໍ້ມູນພະນັກງານລ່າສຸດ 5 ຄົນ (ພ້ອມ Pagination) ດ້ວຍ Prepared Statement
$sql_latest_employees = "SELECT en_id, en_name, en_lastname, position, responsible, insert_date 
                          FROM tbl_employee 
                          ORDER BY insert_date DESC 
                          LIMIT ?, ?";
$stmt_latest_employees = $conn->prepare($sql_latest_employees);
if ($stmt_latest_employees === false) {
    die("Error preparing statement for latest employees: " . $conn->error);
}
$stmt_latest_employees->bind_param("ii", $offset_employees, $records_per_page_employees);
$stmt_latest_employees->execute();
$result_latest_employees = $stmt_latest_employees->get_result();
$stmt_latest_employees->close();


// --- Pagination ສຳລັບຕາຕະລາງ 'ຄຳຮ້ອງຂໍລາພັກທີ່ຍັງລໍຖ້າ' ---
$records_per_page_leaves = 5; // 5 ຂໍ້ມູນຕໍ່ໜ້າ
// ຮັບຄ່າໜ້າປັດຈຸບັນຈາກ URL, ຖ້າບໍ່ມີໃຫ້ເປັນໜ້າ 1
$page_leaves = isset($_GET['page_leaves']) && is_numeric($_GET['page_leaves']) ? (int)$_GET['page_leaves'] : 1;

// ຄິດໄລ່ຈຳນວນຂໍ້ມູນທັງໝົດສຳລັບຄຳຮ້ອງຂໍລາພັກທີ່ຍັງລໍຖ້າ
$sql_total_pending_leaves = "SELECT COUNT(*) AS total_pending FROM leave_requests WHERE status = 'Pending'";
$result_total_pending_leaves = $conn->query($sql_total_pending_leaves);
$total_pending_leaves = ($result_total_pending_leaves && $result_total_pending_leaves->num_rows > 0) ? $result_total_pending_leaves->fetch_assoc()['total_pending'] : 0;

// ຄິດໄລ່ຈຳນວນໜ້າທັງໝົດ
$total_pages_leaves = ceil($total_pending_leaves / $records_per_page_leaves);

// ປັບຄ່າ page_leaves ໃຫ້ຢູ່ໃນຂອບເຂດທີ່ຖືກຕ້ອງ
if ($total_pages_leaves == 0) $total_pages_leaves = 1; // ຈັດການກໍລະນີທີ່ບໍ່ມີຂໍ້ມູນ
if ($page_leaves < 1) $page_leaves = 1;
if ($page_leaves > $total_pages_leaves) $page_leaves = $total_pages_leaves;

// ຄິດໄລ່ OFFSET
$offset_leaves = ($page_leaves - 1) * $records_per_page_leaves;

// ດຶງຂໍ້ມູນຄຳຮ້ອງຂໍລາທີ່ລໍຖ້າການອະນຸມັດທັງໝົດ (ພ້ອມ Pagination) ດ້ວຍ Prepared Statement
$sql_all_pending_leaves = "SELECT lr.leave_id, e.en_name, e.en_lastname, lr.leave_type, lr.start_date, lr.end_date, lr.reason
                            FROM leave_requests lr
                            JOIN tbl_employee e ON lr.en_id = e.en_id  -- Changed lr.en_id to lr.emp_id
                            WHERE lr.status = 'Pending'
                            ORDER BY lr.request_date DESC
                            LIMIT ?, ?";
$stmt_all_pending_leaves = $conn->prepare($sql_all_pending_leaves);
if ($stmt_all_pending_leaves === false) {
    die("Error preparing statement for pending leaves: " . $conn->error);
}
$stmt_all_pending_leaves->bind_param("ii", $offset_leaves, $records_per_page_leaves);
$stmt_all_pending_leaves->execute();
$result_all_pending_leaves = $stmt_all_pending_leaves->get_result();
$stmt_all_pending_leaves->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HR Menager</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="./css_js/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<link rel="stylesheet" href="./assets/adminlte.min.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./css_js/css/styles_hr_add.css"/>
</head>
<body>
<div class="container">
    <h1>ລະບົບ HR</h1>
    <hr>
    <div class="summary-cards">
        <div class="card">
            <h2>ຈຳນວນພະນັກງານທັງໝົດ</h2>
            <p><?php echo $total_employees; ?></p>
        </div>
        <div class="card">
            <h2>ພະນັກງານປະຈຸບັນ</h2>
            <p><?php echo $active_employees; ?></p>
        </div>
        <div class="card">
            <h2>ພະນັກງານກຳລັງລາພັກ</h2>
            <p><?php echo $on_leave_employees; ?></p>
        </div>
        <div class="card">
            <h2>ຄຳຮ້ອງຂໍລາພັກລໍຖ້າການອະນຸມັດ</h2>
            <p><?php echo $pending_leaves_count; ?></p>
        </div>
    </div>

    <div class="dashboard-sections">
        <div class="section">
            <h2>ພະນັກງານເຂົ້າໃໝ່ລ່າສຸດ</h2>
            <table>
                <thead>
                    <tr>
                        <th>ລະຫັດ</th>
                        <th>ຊື່</th>
                        <th>ນາມສະກຸນ</th>
                        <th>ຕຳແໜ່ງ</th>
                        <th>ພະແນກ</th>
                        <th>ວັນທີ່ເລີ່ມເຮັດວຽກ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_latest_employees && $result_latest_employees->num_rows > 0): ?>
                        <?php while($row = $result_latest_employees->fetch_assoc()): ?>
                            
                            <tr>
                                <td><?php echo htmlspecialchars($row['en_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['en_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['en_lastname']); ?></td>
                                <td><?php echo htmlspecialchars($row['position']); ?></td>
                                <td><?php echo htmlspecialchars($row['responsible']); ?></td>
                                <td><?php echo htmlspecialchars($row['insert_date']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6">ບໍ່ມີຂໍ້ມູນພະນັກງານ.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php if ($page_employees > 1): ?>
                    <a href="?page_employees=<?php echo $page_employees - 1; ?>&page_leaves=<?php echo $page_leaves; ?>" class="btn">ໜ້າກ່ອນໜ້າ</a>
                <?php else: ?>
                    <span class="btn disabled">ໜ້າກ່ອນໜ້າ</span>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages_employees; $i++): ?>
                    <a href="?page_employees=<?php echo $i; ?>&page_leaves=<?php echo $page_leaves; ?>" class="btn <?php echo ($i == $page_employees) ? 'current-page' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>

                <?php if ($page_employees < $total_pages_employees): ?>
                    <a href="?page_employees=<?php echo $page_employees + 1; ?>&page_leaves=<?php echo $page_leaves; ?>" class="btn">ໜ້າຖັດໄປ</a>
                <?php else: ?>
                    <span class="btn disabled">ໜ້າຖັດໄປ</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="section">
            <h2>ຄຳຮ້ອງຂໍລາພັກທີ່ຍັງລໍຖ້າ</h2>
            <table>
                <thead>
                    <tr>
                        <th>ລະຫັດຄຳຮ້ອງ</th>
                        <th>ຊື່ພະນັກງານ</th>
                        <th>ປະເພດການລາພັກ</th>
                        <th>ວັນທີ່ເລີ່ມ</th>
                        <th>ວັນທີ່ສິ້ນສຸດ</th>
                        <th>ເຫດຜົນ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_all_pending_leaves && $result_all_pending_leaves->num_rows > 0): ?>
                        <?php while($row = $result_all_pending_leaves->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['leave_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['en_name'] . ' ' . $row['en_lastname']); ?></td>
                                <td><?php echo htmlspecialchars($row['leave_type']); ?></td>
                                <td><?php echo htmlspecialchars($row['start_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['end_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['reason']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6">ບໍ່ມີຄຳຮ້ອງຂໍລາພັກທີ່ຍັງລໍຖ້າ.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php if ($page_leaves < 1): ?>
                    <a href="?page_leaves=<?php echo $page_leaves - 1; ?>&page_employees=<?php echo $page_employees; ?>" class="btn">ໜ້າກ່ອນໜ້າ</a>
                <?php else: ?>
                    <span class="btn disabled">ໜ້າກ່ອນໜ້າ</span>
                <?php endif; ?>
                    <?php for ($i = 1; $i <= $total_pages_leaves; $i++): ?>
                    <a href="?page_leaves=<?php echo $i; ?>&page_employees=<?php echo $page_employees; ?>" class="btn <?php echo ($i == $page_leaves) ? 'current-page' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
                <?php if ($page_leaves < $total_pages_leaves): ?>
                    <a href="?page_leaves=<?php echo $page_leaves + 1; ?>&page_employees=<?php echo $page_employees; ?>" class="btn">ໜ້າຖັດໄປ</a>
                <?php else: ?>
                    <span class="btn disabled">ໜ້າຖັດໄປ</span>
                <?php endif; ?>
            </div>
        </div>
         
    </div>
   
</div>
<?php include('footer.php'); ?>
</body>


</html>








	