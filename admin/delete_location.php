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

$stmt = $conn->prepare("SELECT image, image_2, image_3, image_4, image_5, video_url FROM locations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $images = ['image', 'image_2', 'image_3', 'image_4', 'image_5'];

    foreach ($images as $imgField) {
        if (!empty($row[$imgField])) {
            $path = "../uploads/locations/" . $row[$imgField];
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    if (!empty($row['video_url'])) {
        $videoPath = "../uploads/videos/" . $row['video_url'];
        if (file_exists($videoPath)) {
            unlink($videoPath);
        }
    }

    $delete_stmt = $conn->prepare("DELETE FROM locations WHERE id = ?");
    $delete_stmt->bind_param("i", $id);
    $delete_stmt->execute();
    $delete_stmt->close();
}

$stmt->close();
$conn->close();

header("Location: admin_locations.php?deleted=1");
exit;
?>