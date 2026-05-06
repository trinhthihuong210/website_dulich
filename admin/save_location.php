<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: admin_locations.php");
    exit;
}

$name = trim($_POST['name'] ?? '');
$slug = trim($_POST['slug'] ?? '');
$category = trim($_POST['category'] ?? '');
$location_name = trim($_POST['location_name'] ?? '');
$short_desc = trim($_POST['short_desc'] ?? '');
$detail_title = trim($_POST['detail_title'] ?? '');
$full_desc = trim($_POST['full_desc'] ?? '');
$opening_hours = trim($_POST['opening_hours'] ?? '');
$ticket_price = trim($_POST['ticket_price'] ?? '');
$latitude = trim($_POST['latitude'] ?? '');
$longitude = trim($_POST['longitude'] ?? '');
$map_top = trim($_POST['map_top'] ?? '');
$map_left = trim($_POST['map_left'] ?? '');
$note = trim($_POST['note'] ?? '');
$is_featured = (int)($_POST['is_featured'] ?? 0);
$is_active = (int)($_POST['is_active'] ?? 1);

if ($name === '') {
    die("Thiếu tên địa điểm.");
}

if ($slug === '') {
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
}

function uploadFile($inputName, $folder, $allowedExt) {
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== 0) {
        return '';
    }

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $originalName = basename($_FILES[$inputName]['name']);
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExt)) {
        die("File $inputName không đúng định dạng.");
    }

    $newName = time() . "_" . rand(1000, 9999) . "." . $ext;
    $target = $folder . $newName;

    if (!move_uploaded_file($_FILES[$inputName]['tmp_name'], $target)) {
        die("Upload $inputName thất bại.");
    }

    return $newName;
}

$image = uploadFile("image", "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_2 = uploadFile("image_2", "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_3 = uploadFile("image_3", "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_4 = uploadFile("image_4", "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_5 = uploadFile("image_5", "../uploads/locations/", ['jpg','jpeg','png','webp']);
$video_url = uploadFile("video_file", "../uploads/videos/", ['mp4','webm']);

$stmt = $conn->prepare("
    INSERT INTO locations (
        name, slug, category, location_name, short_desc, detail_title, full_desc,
        image, image_2, image_3, image_4, image_5, video_url,
        opening_hours, ticket_price, latitude, longitude, map_top, map_left,
        note, is_featured, is_active
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");
$stmt = $conn->prepare("
INSERT INTO locations (
name, slug, category, location_name,
short_desc, detail_title, full_desc,
image, image_2, image_3, image_4, image_5,
video,
opening_hours, ticket_price,
latitude, longitude,
map_top, map_left,
visit_tips,
is_featured, is_active
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
"sssssssssssssssssssiii",
$name,
$slug,
$category,
$location_name,
$short_desc,
$detail_title,
$full_desc,
$image,
$image_2,
$image_3,
$image_4,
$image_5,
$video,
$opening_hours,
$ticket_price,
$latitude,
$longitude,
$map_top,
$map_left,
$visit_tips,
$is_featured,
$is_active
);

if ($stmt->execute()) {
    header("Location: admin_locations.php?added=1");
    exit;
} else {
    echo "Lỗi thêm địa điểm: " . $stmt->error;
}
?>