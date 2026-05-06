<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("ID không hợp lệ.");
}

$stmt = $conn->prepare("SELECT image FROM itineraries WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $image_path = "../uploads/itineraries/" . $row['image'];

    if (file_exists($image_path)) {
        unlink($image_path);
    }

    $delete_stmt = $conn->prepare("DELETE FROM itineraries WHERE id = ?");
    $delete_stmt->bind_param("i", $id);
    $delete_stmt->execute();
    $delete_stmt->close();
}

$stmt->close();
$conn->close();

header("Location: admin_itineraries.php");
exit;
?>