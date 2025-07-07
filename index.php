<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Worklog System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>รายการบันทึกงานประจำวัน</h1>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-auto">
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            <a href="form.php" class="btn btn-success">เพิ่มรายการ</a>
            <a href="index.php" class="btn btn-secondary mt-3">กลับหน้าแรก</a>
            <a href="report_summary.php" class="btn btn-outline-info">สรุปรายเดือน</a>


        </div>
    </form>

    <?php
    $where = "";
    if (!empty($_GET['date'])) {
        $date = $_GET['date'];
        $where = "WHERE DATE(start_time) = '$date'";
    }
    $sql = "SELECT * FROM work_logs $where ORDER BY start_time ASC";
    $result = $conn->query($sql);
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ประเภทงาน</th>
                <th>ชื่องาน</th>
                <th>เริ่ม</th>
                <th>สิ้นสุด</th>
                <th>สถานะ</th>
                <th>อัปเดตล่าสุด</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['task_type'] ?></td>
                    <td><?= $row['task_name'] ?></td>
                    <td><?= $row['start_time'] ?></td>
                    <td><?= $row['end_time'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['updated_at'] ?></td>
                    <td>
                        <a href="form.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบ?')">ลบ</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>
