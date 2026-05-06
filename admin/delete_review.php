<?php
include "../includes/db.php";

$id = $_GET['id'] ?? '';

if ($id == '') {
    die("Thiếu ID");
}

// Xoá đánh giá
$stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: admin_reviews.php");
    exit;
} else {
    echo "Lỗi khi xoá: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>