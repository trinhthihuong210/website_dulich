<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT * FROM gallery ORDER BY sort_order ASC, id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý thư viện ảnh</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f6f6f6;
      padding: 30px;
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

    input, button, select {
      padding: 10px;
      margin: 6px 0;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    button {
      background: #f15d30;
      color: #fff;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background: #d94c24;
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
      width: 110px;
      height: 75px;
      object-fit: cover;
      border-radius: 8px;
    }

    .delete-btn {
      color: #fff;
      background: #dc3545;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      display: inline-block;
    }

    .status-on {
      color: green;
      font-weight: bold;
    }

    .status-off {
      color: #999;
      font-weight: bold;
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
.admin-box label {
  display: block;
  margin-top: 12px;
  margin-bottom: 6px;
  font-weight: 600;
}

.note {
  color: #666;
  margin-bottom: 18px;
}

  </style>
</head>

<body>

<a href="dashboard.php" class="back-btn">← Quay về tổng quan</a>

<h2>QUẢN LÝ THƯ VIỆN ẢNH</h2>
<div class="admin-box">
  <h3>Thêm ảnh mới vào thư viện</h3>
  <p class="note">Chọn ảnh từ máy tính. Hệ thống sẽ tự lưu vào thư mục uploads/gallery và hiển thị ngoài trang chủ.</p>

  <form action="save_gallery.php" method="POST" enctype="multipart/form-data">
    <label>Tiêu đề ảnh</label>
    <input type="text" name="title" placeholder="Ví dụ: Chùa Trầm, Đồi Bù..." required>

    <label>Thứ tự hiển thị</label>
    <input type="number" name="sort_order" placeholder="Ví dụ: 1, 2, 3..." value="0">

    <label>Trạng thái</label>
    <select name="is_active">
      <option value="1">Hiển thị</option>
      <option value="0">Ẩn</option>
    </select>

    <label>Chọn ảnh</label>
    <input type="file" name="image" accept="image/*" required>

    <button type="submit">Thêm ảnh</button>
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
    <th>Thời gian</th>
    <th>Hành động</th>
  </tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>

      <td>
        <img src="../uploads/gallery/<?php echo htmlspecialchars($row['image']); ?>">
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

      <td><?php echo $row['created_at']; ?></td>

      <td>
        <a class="delete-btn"
           href="delete_gallery.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Bạn có chắc muốn xoá ảnh này không?')">
           Xoá
        </a>
      </td>
    </tr>
  <?php } ?>
</table>

</body>
</html>