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

$id = (int)($_POST['id'] ?? 0);
$detail_title = trim($_POST['detail_title'] ?? '');


$name = trim($_POST['name'] ?? '');
$slug = trim($_POST['slug'] ?? '');
$category = trim($_POST['category'] ?? '');
$location_name = trim($_POST['location_name'] ?? '');
$short_desc = trim($_POST['short_desc'] ?? '');
$full_desc = trim($_POST['full_desc'] ?? '');
$opening_hours = trim($_POST['opening_hours'] ?? '');
$ticket_price = trim($_POST['ticket_price'] ?? '');
$latitude = trim($_POST['latitude'] ?? '');
$longitude = trim($_POST['longitude'] ?? '');
$map_top = trim($_POST['map_top'] ?? '');
$map_left = trim($_POST['map_left'] ?? '');
$visit_tips = trim($_POST['visit_tips'] ?? '');
$is_featured = (int)($_POST['is_featured'] ?? 0);
$is_active = (int)($_POST['is_active'] ?? 1);

if ($id <= 0 || $name == '') {
    die("Thiếu ID hoặc tên địa điểm.");
}

if ($slug == '') {
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
}

function uploadFile($inputName, $oldFile, $folder, $allowedExt) {
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== 0) {
        return $oldFile;
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

    if (!empty($oldFile) && file_exists($folder . $oldFile)) {
        unlink($folder . $oldFile);
    }

    return $newName;
}

$stmtOld = $conn->prepare("SELECT image, image_2, image_3, image_4, image_5, video_url FROM locations WHERE id = ?");
$stmtOld->bind_param("i", $id);
$stmtOld->execute();
$old = $stmtOld->get_result()->fetch_assoc();

if (!$old) {
    die("Không tìm thấy địa điểm.");
}

$image = uploadFile("image", $old['image'], "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_2 = uploadFile("image_2", $old['image_2'], "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_3 = uploadFile("image_3", $old['image_3'], "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_4 = uploadFile("image_4", $old['image_4'], "../uploads/locations/", ['jpg','jpeg','png','webp']);
$image_5 = uploadFile("image_5", $old['image_5'], "../uploads/locations/", ['jpg','jpeg','png','webp']);

$video = uploadFile(
    "video_file",
    $_POST['old_video'] ?? '',
    "../uploads/videos/",
    ['mp4','webm']
);
$stmt = $conn->prepare("
UPDATE locations SET
name = ?,
slug = ?,
category = ?,
location_name = ?,
short_desc = ?,
detail_title = ?,
full_desc = ?,
image = ?,
image_2 = ?,
image_3 = ?,
image_4 = ?,
image_5 = ?,
video = ?,
opening_hours = ?,
ticket_price = ?,
latitude = ?,
longitude = ?,
map_top = ?,
map_left = ?,
visit_tips = ?,
is_featured = ?,
is_active = ?
WHERE id = ?
");

$stmt->bind_param(
    "ssssssssssssssssssssiii",
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
    $is_active,
    $id
);

if ($stmt->execute()) {
    header("Location: admin_locations.php?updated=1");
    exit;
} else {
    echo "Lỗi cập nhật: " . $stmt->error;
}
?>