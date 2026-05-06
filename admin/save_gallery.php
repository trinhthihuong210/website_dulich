
<a href="dashboard.php" style="
  display:inline-block;
  margin-bottom:20px;
  background:#f15d30;
  color:#fff;
  padding:10px 16px;
  border-radius:8px;
  text-decoration:none;
">
  ← Quay về tổng quan
</a>
<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$sort_order = isset($_POST['sort_order']) ? (int)$_POST['sort_order'] : 0;
$is_active = isset($_POST['is_active']) ? (int)$_POST['is_active'] : 1;

if ($title === '') {
    die("Vui lòng nhập tiêu đề ảnh.");
}

$image_name = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $upload_dir = "../uploads/gallery/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_name = basename($_FILES['image']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($file_ext, $allowed_ext)) {
        die("Chỉ được upload ảnh JPG, JPEG, PNG hoặc WEBP.");
    }

    $image_name = time() . "_" . rand(1000,9999) . "." . $file_ext;
    $target_file = $upload_dir . $image_name;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        die("Upload ảnh thất bại.");
    }
} else {
    die("Vui lòng chọn ảnh.");
}

$stmt = $conn->prepare("
    INSERT INTO gallery (title, image, sort_order, is_active)
    VALUES (?, ?, ?, ?)
");

$stmt->bind_param("ssii", $title, $image_name, $sort_order, $is_active);

if ($stmt->execute()) {
    header("Location: admin_gallery.php");
    exit;
} else {
    echo "Lỗi khi thêm ảnh: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>