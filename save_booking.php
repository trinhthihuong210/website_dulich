<?php
include "includes/db.php";

$fullname = trim($_POST['fullname'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$schedule_type = trim($_POST['schedule_type'] ?? '');
$people_count = trim($_POST['people_count'] ?? '');
$note = trim($_POST['note'] ?? '');

if ($fullname == '' || $phone == '' || $schedule_type == '') {
    die("Vui lòng nhập đầy đủ họ tên, số điện thoại và lịch trình.");
}

$stmt = $conn->prepare("
    INSERT INTO bookings 
    (fullname, phone, email, schedule_type, people_count, note, status, created_at)
    VALUES (?, ?, ?, ?, ?, ?, 'Chờ xử lý', NOW())
");

$stmt->bind_param(
    "ssssss",
    $fullname,
    $phone,
    $email,
    $schedule_type,
    $people_count,
    $note
);

if ($stmt->execute()) {
    header("Location: index.php?booking_success=1#booking");
    exit;
} else {
    echo "Lỗi khi gửi đăng ký: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>