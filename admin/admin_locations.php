<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT * FROM locations ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý địa điểm</title>

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

.admin-box {
  background: #fff;
  padding: 25px;
  border-radius: 14px;
  margin-bottom: 30px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}

label {
  display: block;
  margin-top: 12px;
  margin-bottom: 6px;
  font-weight: 600;
}

input, select, textarea, button {
  width: 420px;
  max-width: 100%;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ddd;
}

textarea {
  min-height: 100px;
}

button {
  margin-top: 16px;
  background: #f15d30;
  color: #fff;
  border: none;
  font-weight: bold;
  cursor: pointer;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
}

th, td {
  border: 1px solid #ddd;
  padding: 12px;
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

.status-on {
  color: green;
  font-weight: bold;
}

.status-off {
  color: red;
  font-weight: bold;
}

.featured {
  color: #f15d30;
  font-weight: bold;
}

.btn {
  display: inline-block;
  padding: 7px 10px;
  border-radius: 6px;
  color: #fff;
  text-decoration: none;
  font-size: 13px;
  margin: 2px;
}

.edit-btn { background: #0d6efd; }
.delete-btn { background: #dc3545; }

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(280px, 1fr));
  gap: 18px 28px;
}

.form-group textarea,
.form-group input,
.form-group select {
  width: 100%;
}

.form-full {
  grid-column: 1 / -1;
}

.form-note {
  color: #777;
  font-size: 14px;
  margin-bottom: 18px;
}
.view-btn {
  background: #111;
}

table {
  min-width: 1300px;
}

.admin-table-wrap {
  overflow-x: auto;
}
</style>
</head>

<body>

<a href="dashboard.php" class="back-btn">← Quay về tổng quan</a>

<h2>Quản lý địa điểm</h2>

<div class="admin-box">
  <h3>Thêm địa điểm mới</h3>
  <form action="save_location.php" method="POST" enctype="multipart/form-data">

  <p class="form-note">
    Mỗi địa điểm nên có 1 ảnh chính, 4 ảnh phụ và 1 video để trang chi tiết hiển thị đầy đủ hơn.
  </p>

  <div class="form-grid">

    <div class="form-group">
      <label>Tên địa điểm</label>
      <input type="text" name="name" placeholder="Ví dụ: Chùa Trầm" required>
    </div>

    <div class="form-group">
      <label>Slug</label>
      <input type="text" name="slug" placeholder="Ví dụ: chua-tram">
    </div>

    <div class="form-group">
      <label>Danh mục</label>
      <select name="category">
        <option value="tam-linh">Tâm linh</option>
        <option value="thien-nhien">Thiên nhiên</option>
        <option value="cafe">Cafe</option>
        <option value="lang-nghe">Làng nghề</option>
      </select>
    </div>

    <div class="form-group">
      <label>Vị trí</label>
      <input type="text" name="location_name" placeholder="Ví dụ: Phụng Châu">
    </div>

    <div class="form-group form-full">
      <label>Mô tả ngắn</label>
      <textarea name="short_desc" placeholder="Ví dụ: Không gian tâm linh cổ kính, phù hợp tham quan và vãn cảnh..."></textarea>
    </div>
<div class="form-group form-full">
  <label>Tiêu đề trang chi tiết</label>
  <input type="text" name="detail_title" placeholder="Ví dụ: Chùa Trầm - không gian tâm linh giữa núi đá">
</div>
    <div class="form-group form-full">
      <label>Giới thiệu chi tiết</label>
      <textarea name="full_desc" placeholder="Viết bài giới thiệu dài về địa điểm..."></textarea>
    </div>

    <div class="form-group">
      <label>Ảnh chính / banner</label>
      <input type="file" name="image" accept="image/*" required>
    </div>

    <div class="form-group">
      <label>Ảnh phụ 2</label>
      <input type="file" name="image_2" accept="image/*">
    </div>

    <div class="form-group">
      <label>Ảnh phụ 3</label>
      <input type="file" name="image_3" accept="image/*">
    </div>

    <div class="form-group">
      <label>Ảnh phụ 4</label>
      <input type="file" name="image_4" accept="image/*">
    </div>

    <div class="form-group">
      <label>Ảnh phụ 5</label>
      <input type="file" name="image_5" accept="image/*">
    </div>

    <div class="form-group">
      <label>Video trải nghiệm</label>
      <input type="file" name="video_file" accept="video/mp4">
    </div>

    <div class="form-group">
      <label>Giờ mở cửa</label>
      <input type="text" name="opening_hours" placeholder="Ví dụ: 07:00 - 18:00">
    </div>

    <div class="form-group">
      <label>Giá vé</label>
      <input type="text" name="ticket_price" placeholder="Ví dụ: Miễn phí">
    </div>

    <div class="form-group">
      <label>Vĩ độ</label>
      <input type="text" name="latitude" placeholder="Ví dụ: 20.900">
    </div>

    <div class="form-group">
      <label>Kinh độ</label>
      <input type="text" name="longitude" placeholder="Ví dụ: 105.600">
    </div>

    <div class="form-group form-full">
<label>Lưu ý khi tham quan</label>
      <textarea name="note" placeholder="Ví dụ: Nên mặc trang phục lịch sự, đi giày thoải mái khi leo núi nhẹ..."></textarea>
    </div>

    <div class="form-group">
      <label>Nổi bật?</label>
      <select name="is_featured">
        <option value="0">Không nổi bật</option>
        <option value="1">Nổi bật</option>
      </select>
    </div>

    <div class="form-group">
      <label>Trạng thái</label>
      <select name="is_active">
        <option value="1">Hiển thị</option>
        <option value="0">Ẩn</option>
      </select>
    </div>

  </div>

  <button type="submit">Thêm địa điểm</button>

</form>
</div>

<table>
<tr>
  <th>ID</th>
  <th>Ảnh</th>
  <th>Tên</th>
  <th>Slug</th>
  <th>Danh mục</th>
  <th>Vị trí</th>
  <th>Map top</th>
  <th>Map left</th>
  <th>Giờ mở cửa</th>
  <th>Giá vé</th>
  <th>Nổi bật</th>
  <th>Trạng thái</th>
  <th>Chi tiết</th>
  <th>Hành động</th>
</tr>

  <?php while($row = mysqli_fetch_assoc($result)) { ?>
   <tr>
  <td><?php echo $row['id']; ?></td>

  <td>
    <?php if (!empty($row['image'])) { ?>
      <img src="../uploads/locations/<?php echo htmlspecialchars($row['image']); ?>">
    <?php } else { ?>
      Chưa có ảnh
    <?php } ?>
  </td>

  <td><?php echo htmlspecialchars($row['name']); ?></td>

  <td><?php echo htmlspecialchars($row['slug']); ?></td>

  <td><?php echo htmlspecialchars($row['category']); ?></td>

  <td><?php echo htmlspecialchars($row['location_name']); ?></td>

  <td><?php echo !empty($row['map_top']) ? htmlspecialchars($row['map_top']) : '<span class="status-off">Thiếu</span>'; ?></td>

  <td><?php echo !empty($row['map_left']) ? htmlspecialchars($row['map_left']) : '<span class="status-off">Thiếu</span>'; ?></td>

  <td><?php echo !empty($row['opening_hours']) ? htmlspecialchars($row['opening_hours']) : '—'; ?></td>

  <td><?php echo !empty($row['ticket_price']) ? htmlspecialchars($row['ticket_price']) : '—'; ?></td>

  <td>
    <?php if($row['is_featured'] == 1) { ?>
      <span class="featured">Nổi bật</span>
    <?php } else { ?>
      Không
    <?php } ?>
  </td>

  <td>
    <?php if($row['is_active'] == 1) { ?>
      <span class="status-on">Đang hiện</span>
    <?php } else { ?>
      <span class="status-off">Đang ẩn</span>
    <?php } ?>
  </td>

  <td>
    <a class="btn view-btn" href="../detail.php?id=<?php echo $row['id']; ?>" target="_blank">
      Xem
    </a>
  </td>

  <td>
<a class="btn edit-btn" href="edit_location.php?id=<?php echo $row['id']; ?>">Sửa</a>
    <a class="btn delete-btn"
       href="delete_location.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Bạn có chắc muốn xoá địa điểm này không?')">
       Xoá
    </a>
  </td>
</tr>
  <?php } ?>
</table>

</body>
</html>