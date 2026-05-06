<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$status = isset($_GET['status']) ? (int)$_GET['status'] : 0;

if ($id <= 0) {
    die("ID không hợp lệ");
}

$stmt = $conn->prepare("UPDATE itineraries SET is_active = ? WHERE id = ?");
$stmt->bind_param("ii", $status, $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: admin_itineraries.php");
exit;