<?php
session_start();
include "../includes/db.php";

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: ../login.php");
    exit;
}

function get_count($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    if (!$result) return 0;
    $row = mysqli_fetch_row($result);
    return $row[0];
}

$newBookings = get_count($conn, "SELECT COUNT(*) FROM bookings WHERE status = 'Mới'");
$pendingReviews = get_count($conn, "SELECT COUNT(*) FROM reviews WHERE is_approved = 0");
$totalGallery = get_count($conn, "SELECT COUNT(*) FROM gallery WHERE is_active = 1");
$totalLocations = get_count($conn, "SELECT COUNT(*) FROM locations WHERE is_active = 1");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Trang quản trị Chương Mỹ</title>

<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: 'Be Vietnam Pro', sans-serif;
  background: #f4f6f8;
  color: #222;
}

.admin-layout {
  display: flex;
  min-height: 100vh;
}

.sidebar {
  width: 260px;
  background: #1f2933;
  color: #fff;
  padding: 28px 22px;
}

.logo {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 35px;
}

.menu a {
  display: block;
  color: rgba(255,255,255,0.8);
  text-decoration: none;
  padding: 13px 14px;
  border-radius: 10px;
  margin-bottom: 8px;
  font-size: 14px;
}

.menu a:hover,
.menu a.active {
  background: #f15d30;
  color: #fff;
}

.main {
  flex: 1;
  padding: 35px 40px;
}

.topbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 35px;
}

.topbar h1 {
  margin: 0;
  font-size: 28px;
}

.logout {
  background: #222;
  color: #fff;
  padding: 10px 18px;
  border-radius: 30px;
  text-decoration: none;
  font-size: 14px;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 22px;
  margin-bottom: 35px;
}

.stat-card {
  background: #fff;
  border-radius: 18px;
  padding: 24px;
  box-shadow: 0 12px 30px rgba(0,0,0,0.06);
}

.stat-card span {
  color: #777;
  font-size: 14px;
}

.stat-card h2 {
  margin: 12px 0 0;
  font-size: 36px;
  color: #f15d30;
}

.module-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 22px;
}

.module-card {
  background: #fff;
  padding: 28px;
  border-radius: 18px;
  text-decoration: none;
  color: #222;
  box-shadow: 0 12px 30px rgba(0,0,0,0.06);
  transition: 0.25s;
}

.module-card:hover {
  transform: translateY(-5px);
  background: #f15d30;
  color: #fff;
}

.module-card .icon {
  font-size: 34px;
  margin-bottom: 14px;
}

.module-card h3 {
  margin: 0 0 10px;
  font-size: 18px;
}

.module-card p {
  margin: 0;
  font-size: 14px;
  line-height: 1.6;
  color: #666;
}

.module-card:hover p {
  color: rgba(255,255,255,0.9);
}

@media (max-width: 1100px) {
  .stats-grid,
  .module-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 700px) {
.admin-layout {
    flex-direction: column;
  }

  .sidebar {
    width: 100%;
  }

  .stats-grid,
  .module-grid {
    grid-template-columns: 1fr;
  }
}
</style>
</head>

<body>

<div class="admin-layout">

  <aside class="sidebar">
    <div class="logo">Chương Mỹ Admin</div>

    <nav class="menu">
      <a href="dashboard.php" class="active">Tổng quan</a>
      <a href="admin_bookings.php">Đăng ký trải nghiệm</a>
      <a href="admin_reviews.php">Duyệt đánh giá</a>
      <a href="admin_gallery.php">Thư viện ảnh</a>
      <a href="admin_locations.php">Địa điểm</a>
      <a href="admin_itineraries.php">Lịch trình</a>
    </nav>
  </aside>

  <main class="main">

    <div class="topbar">
      <h1>TỔNG QUAN QUẢN TRỊ</h1>
      <a href="../logout.php" class="logout">Đăng xuất</a>
    </div>

    <div class="stats-grid">
      <div class="stat-card">
        <span>Đơn đăng ký mới</span>
        <h2><?php echo $newBookings; ?></h2>
      </div>

      <div class="stat-card">
        <span>Đánh giá chờ duyệt</span>
        <h2><?php echo $pendingReviews; ?></h2>
      </div>

      <div class="stat-card">
        <span>Ảnh đang hiển thị</span>
        <h2><?php echo $totalGallery; ?></h2>
      </div>

      <div class="stat-card">
        <span>Địa điểm đang hiển thị</span>
        <h2><?php echo $totalLocations; ?></h2>
      </div>
    </div>

    <div class="module-grid">

      <a href="admin_bookings.php" class="module-card">
        <div class="icon">📋</div>
        <h3>Đăng ký trải nghiệm</h3>
        <p>Xem thông tin khách hàng, cập nhật trạng thái đã liên hệ hoặc từ chối.</p>
      </a>

      <a href="admin_reviews.php" class="module-card">
        <div class="icon">⭐</div>
        <h3>Duyệt đánh giá</h3>
        <p>Duyệt, ẩn hoặc xóa đánh giá trước khi hiển thị trên trang chủ.</p>
      </a>

      <a href="admin_gallery.php" class="module-card">
        <div class="icon">🖼️</div>
        <h3>Thư viện ảnh</h3>
        <p>Upload ảnh mới, sắp xếp thứ tự và quản lý trạng thái hiển thị.</p>
      </a>

      <a href="admin_locations.php" class="module-card">
        <div class="icon">📍</div>
        <h3>Địa điểm</h3>
        <p>Quản lý địa điểm nổi bật, tất cả địa điểm và nội dung mô tả.</p>
      </a>
      <a href="admin_itineraries.php" class="module-card">
  <div class="icon">🗓️</div>
  <h3>Lịch trình</h3>
  <p>Quản lý ảnh, tiêu đề và nội dung các lịch trình du lịch.</p>
</a>

    </div>

  </main>

</div>

</body>
</html>