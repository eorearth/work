<?php
require_once 'config.php';

$id = $_GET['id'] ?? null;
$data = [
    'task_type' => '',
    'task_name' => '',
    'start_time' => '',
    'end_time' => '',
    'status' => ''
];

if ($id) {
    $res = $conn->query("SELECT * FROM work_logs WHERE id = $id");
    if ($res && $res->num_rows > 0) {
        $data = $res->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_type = $_POST['task_type'];
    $task_name = $_POST['task_name'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $status = $_POST['status'];

    if ($id) {
        // อัปเดต
        $sql = "UPDATE work_logs SET 
            task_type='$task_type',
            task_name='$task_name',
            start_time='$start_time',
            end_time='$end_time',
            status='$status'
            WHERE id = $id";
    } else {
        // เพิ่มใหม่
        $sql = "INSERT INTO work_logs (task_type, task_name, start_time, end_time, status) 
            VALUES ('$task_type', '$task_name', '$start_time', '$end_time', '$status')";
    }

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "ผิดพลาด: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'แก้ไข' : 'เพิ่ม' ?> งาน</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2><?= $id ? 'แก้ไข' : 'เพิ่ม' ?> รายการงาน</h2>
    <form method="POST">
        <div class="mb-2">
            <label>ประเภทงาน</label>
            <select name="task_type" class="form-control" required>
                <?php foreach (['Development', 'Test', 'Document'] as $type): ?>
                    <option <?= $data['task_type'] == $type ? 'selected' : '' ?>><?= $type ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-2">
            <label>ชื่องาน</label>
            <input type="text" name="task_name" class="form-control" value="<?= $data['task_name'] ?>" required>
        </div>

        <div class="mb-2">
            <label>เวลาเริ่ม</label>
            <input type="datetime-local" name="start_time" class="form-control" value="<?= str_replace(' ', 'T', $data['start_time']) ?>" required>
        </div>

        <div class="mb-2">
            <label>เวลาสิ้นสุด</label>
            <input type="datetime-local" name="end_time" class="form-control" value="<?= str_replace(' ', 'T', $data['end_time']) ?>" required>
        </div>

        <div class="mb-2">
            <label>สถานะ</label>
            <select name="status" class="form-control" required>
                <?php foreach (['ดำเนินการ', 'เสร็จสิ้น', 'ยกเลิก'] as $s): ?>
                    <option <?= $data['status'] == $s ? 'selected' : '' ?>><?= $s ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><?= $id ? 'อัปเดต' : 'บันทึก' ?></button>
        <a href="index.php" class="btn btn-secondary">ยกเลิก</a>
    </form>
</body>
</html>
