<?php
session_start();
include "../config.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET['id']) || !isset($_GET['status'])) {
    die("Thiếu dữ liệu.");
}

$id = (int)$_GET['id'];
$status = trim($_GET['status']);

$allowed_status = ["Mới", "Đã liên hệ", "Từ chối", "Hoàn tất"];

if (!in_array($status, $allowed_status)) {
    die("Trạng thái không hợp lệ.");
}

$stmt = mysqli_prepare($conn, "UPDATE bookings SET status = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "si", $status, $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: admin_bookings.php");
    exit;
} else {
    echo "Lỗi cập nhật trạng thái.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>