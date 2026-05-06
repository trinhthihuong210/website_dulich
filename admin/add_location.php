<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $category = $_POST['category'];
    $location_name = $_POST['location_name'];
    $short_desc = $_POST['short_desc'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO locations (name, slug, category, location_name, short_desc, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $slug, $category, $location_name, $short_desc, $image);
    $stmt->execute();

    header("Location: admin_locations.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm địa điểm</title>
</head>
<body>
  <h2>Thêm địa điểm mới</h2>

  <form method="POST">
    <p><input type="text" name="name" placeholder="Tên địa điểm" required></p>
    <p><input type="text" name="slug" placeholder="slug, ví dụ: nui-tram"></p>
    <p><input type="text" name="category" placeholder="Loại: tamlinh, cafe, thiennhien..." required></p>
    <p><input type="text" name="location_name" placeholder="Khu vực"></p>
    <p><input type="text" name="image" placeholder="Tên ảnh, ví dụ: destination-1.jpg"></p>
    <p><textarea name="short_desc" placeholder="Mô tả ngắn"></textarea></p>
    
    <p><button type="submit">Lưu địa điểm</button></p>
  </form>
</body>
</html>