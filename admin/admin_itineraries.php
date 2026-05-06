<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT * FROM itineraries ORDER BY sort_order ASC, id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý lịch trình</title>

<style>
body {
  font-family: Arial, sans-serif;
  background: #f5f5f5;
  padding: 30px;
}

.back-btn {
  display: inline-block;
  margin-bottom: 20px;
  background: #f15d30;
  color: #fff;
  padding: 10px 16px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
}

h2 {
  margin-bottom: 20px;
}

.admin-box {
  background: #fff;
  padding: 25px;
  border-radius: 14px;
  margin-bottom: 30px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}

.admin-box label {
  display: block;
  margin-top: 12px;
  margin-bottom: 6px;
  font-weight: 600;
}

input, select, button {
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ddd;
  width: 280px;
  display: block;
}

button {
  margin-top: 16px;
  background: #f15d30;
  color: #fff;
  border: none;
  cursor: pointer;
  font-weight: bold;
}

.note {
  color: #666;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  box-shadow: 0 8px 24px rgba(0,0,0,0.06);
}

th, td {
  border: 1px solid #ddd;
  padding: 12px;
  text-align: left;
  vertical-align: middle;
}

th {
  background: #f15d30;
  color: #fff;
}

img {
  width: 150px;
  height: 95px;
  object-fit: cover;
  border-radius: 8px;
}

.status-on {
  color: green;
  font-weight: bold;
}

.status-off {
  color: red;
  font-weight: bold;
}

.delete-btn {
  background: #dc3545;
  color: #fff;
  padding: 8px 12px;
  border-radius: 6px;
  text-decoration: none;
}
.btn-hide {
  background: #6c757d;
  color: #fff;
  padding: 6px 10px;
  border-radius: 6px;
  text-decoration: none;
}

.btn-show {
  background: #28a745;
  color: #fff;
  padding: 6px 10px;
  border-radius: 6px;
  text-decoration: none;
}
</style>
</head>

<body>

<a href="dashboard.php" class="back-btn">← Quay về tổng quan</a>

<h2>QUẢN LÝ LỊCH TRÌNH</h2>

<div class="admin-box">
  <h3>Thêm ảnh lịch trình mới</h3>
  <p class="note">Chọn ảnh thiết kế lịch trình từ máy tính. Ảnh sẽ được lưu vào uploads/itineraries.</p>

  <form action="save_itinerary.php" method="POST" enctype="multipart/form-data">
    <label>Tiêu đề lịch trình</label>
    <input type="text" name="title" placeholder="Ví dụ: Lịch trình 1 ngày" required>

    <label>Thứ tự hiển thị</label>
    <input type="number" name="sort_order" value="0">

    <label>Trạng thái</label>
    <select name="is_active">
      <option value="1">Hiển thị</option>
      <option value="0">Ẩn</option>
    </select>

    <label>Chọn ảnh lịch trình</label>
    <input type="file" name="image" accept="image/*" required>

    <button type="submit">Thêm lịch trình</button>
  </form>
</div>

<table>
  <tr>
    <th>ID</th>
    <th>Ảnh</th>
    <th>Tiêu đề</th>
    <th>Tên file</th>
    <th>Thứ tự</th>
    <th>Trạng thái</th>
    <th>Thao tác</th>
    <th>Hành động</th>
  </tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>

      <td>
        <img src="../uploads/itineraries/<?php echo htmlspecialchars($row['image']); ?>">
      </td>

      <td><?php echo htmlspecialchars($row['title']); ?></td>
      <td><?php echo htmlspecialchars($row['image']); ?></td>
      <td><?php echo htmlspecialchars($row['sort_order']); ?></td>
<td>
  <?php if($row['is_active'] == 1) { ?>
    <span class="status-on">Đang hiện</span>
  <?php } else { ?>
    <span class="status-off">Đang ẩn</span>
  <?php } ?>
</td>

<td>
  <?php if($row['is_active'] == 1) { ?>
    <a href="toggle_itinerary.php?id=<?php echo $row['id']; ?>&status=0"
       class="btn-hide">Ẩn</a>
  <?php } else { ?>
    <a href="toggle_itinerary.php?id=<?php echo $row['id']; ?>&status=1"
       class="btn-show">Hiện</a>
  <?php } ?>
</td>

<td>
  <a class="delete-btn"
     href="delete_itinerary.php?id=<?php echo $row['id']; ?>"
     onclick="return confirm('Bạn có chắc muốn xoá lịch trình này không?')">
     Xoá
  </a>
</td>
    </tr>
  <?php } ?>
</table>

</body>
</html>