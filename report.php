<?php
require_once 'config.php';
$date = $_GET['date'] ?? date('Y-m-d');

$sql = "SELECT * FROM work_logs WHERE DATE(start_time) = '$date'";
$result = $conn->query($sql);
?>
<h2>รายงานประจำวันที่ <?= $date ?></h2>
<table border="1">
    <tr>
        <th>ประเภทงาน</th><th>ชื่องาน</th><th>สถานะ</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['task_type'] ?></td>
        <td><?= $row['task_name'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
