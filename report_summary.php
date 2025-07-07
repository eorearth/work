<?php
require_once 'config.php';

$month = $_GET['month'] ?? date('Y-m');

$sql = "SELECT status, COUNT(*) AS total 
        FROM work_logs 
        WHERE DATE_FORMAT(start_time, '%Y-%m') = '$month'
        GROUP BY status";

$result = $conn->query($sql);

// เตรียมข้อมูลให้แสดงในตาราง
$status_data = [
    'ดำเนินการ' => 0,
    'เสร็จสิ้น' => 0,
    'ยกเลิก' => 0
];

while ($row = $result->fetch_assoc()) {
    $status = $row['status'];
    $status_data[$status] = $row['total'];
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายงานสรุปสถานะการทำงาน</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>รายงานสรุปสถานะการทำงาน ประจำเดือน <?= htmlspecialchars($month) ?></h2>

    <form method="GET" class="mb-3">
        <label>เลือกเดือน:</label>
        <input type="month" name="month" value="<?= $month ?>">
        <button type="submit" class="btn btn-primary btn-sm">ดูรายงาน</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>สถานะ</th>
                <th>จำนวน</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ดำเนินการ</td>
                <td><?= $status_data['ดำเนินการ'] ?></td>
            </tr>
            <tr>
                <td>เสร็จสิ้น</td>
                <td><?= $status_data['เสร็จสิ้น'] ?></td>
            </tr>
            <tr>
                <td>ยกเลิก</td>
                <td><?= $status_data['ยกเลิก'] ?></td>
            </tr>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary">กลับหน้าแรก</a>
</body>
</html>
