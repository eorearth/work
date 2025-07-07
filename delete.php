<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM work_logs WHERE id = $id";
    if ($conn->query($sql)) {
        header("Location: index.php"); // กลับไปหน้าหลัก
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล: " . $conn->error;
    }
} else {
    echo "ไม่พบ ID ที่ต้องการลบ";
}
?>
