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

$stmt = $conn->prepare("SELECT * FROM locations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Không tìm thấy địa điểm.");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Sửa địa điểm</title>

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
  box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(280px, 1fr));
  gap: 18px 28px;
}

.form-full {
  grid-column: 1 / -1;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: 700;
}

input, select, textarea, button {
  width: 100%;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ddd;
}

textarea {
  min-height: 110px;
}

button {
  margin-top: 22px;
  background: #f15d30;
  color: #fff;
  border: none;
  font-weight: bold;
  cursor: pointer;
}

.preview-img {
  width: 150px;
  height: 95px;
  object-fit: cover;
  border-radius: 10px;
  display: block;
  margin: 8px 0;
  background: #eee;
}

.old-file {
  color: #666;
  font-size: 13px;
  margin: 6px 0;
}

.note {
  font-size: 14px;
  color: #777;
  margin-bottom: 18px;
}
</style>
</head>

<body>

<a href="admin_locations.php" class="back-btn">← Quay về quản lý địa điểm</a>

<h2>Sửa địa điểm</h2>

<div class="admin-box">

<form action="update_location.php" method="POST" enctype="multipart/form-data">

  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

  <p class="note">Nếu không chọn ảnh/video mới, hệ thống sẽ giữ ảnh/video cũ.</p>

  <div class="form-grid">

    <div>
      <label>Tên địa điểm</label>
      <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
    </div>

    <div>
      <label>Slug</label>
      <input type="text" name="slug" value="<?php echo htmlspecialchars($row['slug']); ?>">
    </div>

    <div>
      <label>Danh mục</label>
      <select name="category">
        <option value="tam-linh" <?php if($row['category'] == 'tam-linh') echo 'selected'; ?>>Tâm linh</option>
        <option value="thien-nhien" <?php if($row['category'] == 'thien-nhien') echo 'selected'; ?>>Thiên nhiên</option>
        <option value="cafe" <?php if($row['category'] == 'cafe') echo 'selected'; ?>>Cafe</option>
<option value="lang-nghe" <?php if($row['category'] == 'lang-nghe') echo 'selected'; ?>>Làng nghề</option>
        <option value="nghi-duong" <?php if($row['category'] == 'nghi-duong') echo 'selected'; ?>>Nghỉ dưỡng</option>
      </select>
    </div>

    <div>
      <label>Vị trí</label>
      <input type="text" name="location_name" value="<?php echo htmlspecialchars($row['location_name']); ?>">
    </div>

    <div class="form-full">
      <label>Mô tả ngắn</label>
      <textarea name="short_desc"><?php echo htmlspecialchars($row['short_desc']); ?></textarea>
    </div>

    <div class="form-group form-full">
  <label>Tiêu đề trang chi tiết</label>
  <input type="text" name="detail_title"
         value="<?php echo htmlspecialchars($row['detail_title'] ?? ''); ?>"
         placeholder="Ví dụ: Chùa Trầm - không gian tâm linh giữa núi đá">
</div>

    <div class="form-full">
      <label>Giới thiệu chi tiết</label>
      <textarea name="full_desc"><?php echo htmlspecialchars($row['full_desc']); ?></textarea>
    </div>

    <div>
      <label>Ảnh chính hiện tại</label>
      <?php if (!empty($row['image'])) { ?>
        <img class="preview-img" src="../uploads/locations/<?php echo htmlspecialchars($row['image']); ?>">
        <p class="old-file"><?php echo htmlspecialchars($row['image']); ?></p>
      <?php } ?>
      <input type="file" name="image" accept="image/*">
    </div>

    <div>
      <label>Ảnh phụ 2 hiện tại</label>
      <?php if (!empty($row['image_2'])) { ?>
        <img class="preview-img" src="../uploads/locations/<?php echo htmlspecialchars($row['image_2']); ?>">
        <p class="old-file"><?php echo htmlspecialchars($row['image_2']); ?></p>
      <?php } else { echo '<p class="old-file">Chưa có ảnh</p>'; } ?>
      <input type="file" name="image_2" accept="image/*">
    </div>

    <div>
      <label>Ảnh phụ 3 hiện tại</label>
      <?php if (!empty($row['image_3'])) { ?>
        <img class="preview-img" src="../uploads/locations/<?php echo htmlspecialchars($row['image_3']); ?>">
        <p class="old-file"><?php echo htmlspecialchars($row['image_3']); ?></p>
      <?php } else { echo '<p class="old-file">Chưa có ảnh</p>'; } ?>
      <input type="file" name="image_3" accept="image/*">
    </div>

    <div>
      <label>Ảnh phụ 4 hiện tại</label>
      <?php if (!empty($row['image_4'])) { ?>
        <img class="preview-img" src="../uploads/locations/<?php echo htmlspecialchars($row['image_4']); ?>">
        <p class="old-file"><?php echo htmlspecialchars($row['image_4']); ?></p>
      <?php } else { echo '<p class="old-file">Chưa có ảnh</p>'; } ?>
      <input type="file" name="image_4" accept="image/*">
    </div>

    <div>
      <label>Ảnh phụ 5 hiện tại</label>
      <?php if (!empty($row['image_5'])) { ?>
        <img class="preview-img" src="../uploads/locations/<?php echo htmlspecialchars($row['image_5']); ?>">
        <p class="old-file"><?php echo htmlspecialchars($row['image_5']); ?></p>
      <?php } else { echo '<p class="old-file">Chưa có ảnh</p>'; } ?>
      <input type="file" name="image_5" accept="image/*">
    </div>

    <div>
<label>Video hiện tại</label>

<?php if (!empty($row['video'])) { ?>
  <video width="260" controls style="display:block; margin-bottom:10px; border-radius:10px;">
    <source src="../uploads/videos/<?php echo htmlspecialchars($row['video']); ?>" type="video/mp4">
  </video>
  <p><?php echo htmlspecialchars($row['video']); ?></p>
<?php } else { ?>
  <p>Chưa có video</p>
<?php } ?>

<input type="hidden" name="old_video" value="<?php echo htmlspecialchars($row['video'] ?? ''); ?>">

<input type="file" name="video_file" accept="video/mp4,video/webm">
    <div>
      <label>Giờ mở cửa</label>
      <input type="text" name="opening_hours" value="<?php echo htmlspecialchars($row['opening_hours']); ?>">
    </div>

    <div>
      <label>Giá vé</label>
      <input type="text" name="ticket_price" value="<?php echo htmlspecialchars($row['ticket_price']); ?>">
    </div>

    <div>
      <label>Vĩ độ</label>
      <input type="text" name="latitude" value="<?php echo htmlspecialchars($row['latitude']); ?>">
    </div>

    <div>
      <label>Kinh độ</label>
      <input type="text" name="longitude" value="<?php echo htmlspecialchars($row['longitude']); ?>">
    </div>

    <div>
      <label>Map top</label>
      <input type="text" name="map_top" value="<?php echo htmlspecialchars($row['map_top']); ?>" placeholder="Ví dụ: 55%">
    </div>

    <div>
      <label>Map left</label>
      <input type="text" name="map_left" value="<?php echo htmlspecialchars($row['map_left']); ?>" placeholder="Ví dụ: 40%">
    </div>

<div class="form-group form-full">
  <label>Lưu ý khi tham quan</label>
  <textarea name="visit_tips" placeholder="Nhập kinh nghiệm/lưu ý khi tham quan..."><?php echo htmlspecialchars($row['visit_tips'] ?? ''); ?></textarea>
</div>
    <div>
      <label>Nổi bật?</label>
      <select name="is_featured">
        <option value="0" <?php if($row['is_featured'] == 0) echo 'selected'; ?>>Không nổi bật</option>
        <option value="1" <?php if($row['is_featured'] == 1) echo 'selected'; ?>>Nổi bật</option>
      </select>
    </div>

    <div>
      <label>Trạng thái</label>
      <select name="is_active">
        <option value="1" <?php if($row['is_active'] == 1) echo 'selected'; ?>>Hiển thị</option>
        <option value="0" <?php if($row['is_active'] == 0) echo 'selected'; ?>>Ẩn</option>
      </select>
    </div>

  </div>

  <button type="submit">Cập nhật địa điểm</button>

</form>

</div>

</body>
</html>