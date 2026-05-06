<?php
include 'includes/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM locations WHERE id = $id AND is_active = 1";
$result = mysqli_query($conn, $sql);
$place = mysqli_fetch_assoc($result);

if (!$place) {
  echo "Không tìm thấy địa điểm.";
  exit;
}

$title = !empty($place['detail_title']) ? $place['detail_title'] : $place['name'];
$overview = !empty($place['full_desc']) ? $place['full_desc'] : $place['short_desc'];
$tips = !empty($place['visit_tips'])
  ? $place['visit_tips']
  : 'Nên chuẩn bị trang phục thoải mái, giày dễ đi và kiểm tra thời tiết trước khi tham quan.';?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($title); ?></title>

<style>
html { scroll-behavior: smooth; }
body { margin:0; font-family: Arial, sans-serif; color:#333; background:#fff; }

#tongquan, #video, #hinhanh, #kinhnghiem, #bando {
  scroll-margin-top: 100px;
}

.detail-hero {
  height: 360px;
  background-size: cover;
  background-position: center;
}

.detail-container {
  max-width: 1180px;
  margin: 0 auto;
  padding: 70px 24px;
}

.breadcrumb {
  font-size: 16px;
  color: #777;
  margin-bottom: 28px;
}

.breadcrumb a {
  color: #555;
  text-decoration: none;
}

.breadcrumb a:hover { color:#f15d30; }

.detail-title {
  font-size: 56px;
  line-height: 1.15;
  color: #222;
  margin-bottom: 22px;
  font-weight: 800;
}

.detail-meta {
  color: #888;
  font-size: 17px;
  margin-bottom: 34px;
}

.detail-short-desc {
  font-size: 22px;
  font-style: italic;
  color: #666;
  line-height: 1.7;
  margin-bottom: 45px;
}

.quick-view {
  background: #eaf7ff;
  padding: 34px 40px;
  border-radius: 18px;
  margin-bottom: 80px;
}

.quick-view h3 {
  font-size: 30px;
  margin-bottom: 20px;
}

.quick-view a {
  display: block;
  color: #222;
  font-size: 20px;
  margin: 16px 0;
  text-decoration: none;
}

.quick-view a:hover { color:#f15d30; }

.detail-section {
  margin-bottom: 90px;
}

.section-heading {
  margin-bottom: 34px;
}

.section-heading span {
  display: inline-block;
  color: #f15d30;
  font-weight: 700;
  letter-spacing: 2px;
  margin-bottom: 8px;
}

.section-heading h2 {
  font-size: 40px;
  color: #222;
  margin: 0;
}

.overview-layout {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 42px;
  align-items: center;
}

.overview-text p {
  font-size: 17px;
  line-height: 1.9;
  color: #555;
  text-align: justify;
}

.overview-image img {
  width: 100%;
  height: 430px;
  object-fit: cover;
  border-radius: 26px;
  box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

.video-box video {
  width: 100%;
  max-height: 560px;
  border-radius: 26px;
  background: #000;
}

.empty-note {
  background: #f8f8f8;
  padding: 28px;
  border-radius: 18px;
  color: #666;
}

.detail-gallery {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 22px;
}

.detail-gallery img {
  width: 100%;
  height: 270px;
  object-fit: cover;
  border-radius: 22px;
transition: 0.35s ease;
}

.detail-gallery img:hover {
  transform: scale(1.03);
}

.detail-gallery img:nth-child(1) {
  grid-column: span 2;
}

.detail-gallery img:nth-child(5) {
  grid-column: span 2;
}

.tips-box {
  background: #fff7f2;
  padding: 34px 40px;
  border-left: 5px solid #f15d30;
  border-radius: 22px;
}

.tips-box p {
  font-size: 17px;
  line-height: 1.9;
  color: #555;
  margin: 0;
}

.map-box {
  overflow: hidden;
  border-radius: 26px;
  box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

.detail-actions {
  display: flex;
  gap: 22px;
  margin-top: 50px;
}

.detail-actions a {
  text-decoration: none;
  padding: 15px 30px;
  border-radius: 999px;
  font-weight: 700;
}

.btn-back {
  background: #111;
  color: #fff;
}

.btn-register {
  background: #f15d30;
  color: #fff;
}

.btn-back:hover {
  background:#f15d30;
}

.btn-register:hover {
  background:#111;
}

@media (max-width: 992px) {
  .detail-title { font-size: 38px; }
  .overview-layout { grid-template-columns: 1fr; }
  .detail-gallery { grid-template-columns: 1fr; }
  .detail-gallery img,
  .detail-gallery img:nth-child(1),
  .detail-gallery img:nth-child(5) {
    grid-column: span 1;
  }
}

/* FIX 1: Font tiêu đề chi tiết */
.detail-title {
  font-family: 'Playfair Display', Georgia, serif !important;
  font-size: 62px !important;
  font-weight: 800 !important;
  line-height: 1.15 !important;
  letter-spacing: -1px;
}

/* FIX 2: số 01 - 02 - 03 nhỏ lại */
.section-heading {
  display: block !important;
}

.section-heading span {
  display: block !important;
  font-size: 40px !important;
  color: #f15d30 !important;
  font-weight: 700 !important;
  letter-spacing: 3px !important;
  margin-bottom: 10px !important;
}

.section-heading h2 {
  font-size: 42px !important;
  line-height: 1.2 !important;
  margin: 0 !important;
}

/* ===== TITLE 03 + TEXT CÙNG HÀNG ===== */
.section-heading-row {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 30px;
}

.section-heading-row span {
  font-size: 26px;
  font-weight: 800;
  color: #f15d30;
}



/* ===== GALLERY 2 HÀNG CHUẨN ===== */
.detail-gallery {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 18px;
}

/* reset */
.detail-gallery img {
  width: 100%;
  height: 240px;
  object-fit: cover;
  border-radius: 14px;
}

/* HÀNG 1 */
.detail-gallery img:nth-child(1) {
  grid-column: span 4;
  height: 300px;
}

.detail-gallery img:nth-child(2) {
  grid-column: span 2;
  height: 300px;
}

/* HÀNG 2 */
.detail-gallery img:nth-child(3),
.detail-gallery img:nth-child(4),
.detail-gallery img:nth-child(5) {
  grid-column: span 2;
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="detail-hero"
     style="background-image: linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)), url('uploads/locations/<?php echo htmlspecialchars($place['image']); ?>');">
</div>

<div class="detail-container">

  <div class="breadcrumb">
    <a href="index.php">Trang chủ</a> /
    <a href="index.php#tatcadiadiem">Chương Mỹ</a> /
    <span><?php echo htmlspecialchars($place['name']); ?></span>
  </div>

  <h1 class="detail-title"><?php echo htmlspecialchars($title); ?></h1>

  <p class="detail-meta"><?php echo date("d.m.Y"); ?> | Địa điểm du lịch Chương Mỹ</p>

  <p class="detail-short-desc"><?php echo htmlspecialchars($place['short_desc']); ?></p>

  <div class="quick-view">
    <h3>Xem nhanh</h3>
    <a href="#tongquan">1. Giới thiệu tổng quan</a>
    <a href="#video">2. Video giới thiệu</a>
    <a href="#hinhanh">3. Một số ảnh nổi bật</a>
    <a href="#kinhnghiem">4. Kinh nghiệm tham quan</a>
    <a href="#bando">5. Bản đồ chỉ đường</a>
  </div>

  <section id="tongquan" class="detail-section">
    <div class="section-heading-row">
      <span>01</span>
      <h2>GIỚI THIỆU TỔNG QUAN</h2>
    </div>

    <div class="overview-layout">
      <div class="overview-text">
        <p><?php echo nl2br(htmlspecialchars($overview)); ?></p>
      </div>

      <div class="overview-image">
        <img src="uploads/locations/<?php echo htmlspecialchars($place['image']); ?>" alt="">
      </div>
    </div>
  </section>



<section id="video" class="detail-section">
  <div class="section-heading-row">
    <span>02</span>
    <h2>VIDEO GIỚI THIỆU</h2>
  </div>

  <div class="video-box">
    <?php if (!empty($place['video'])) { ?>
      <video controls playsinline style="width:100%; border-radius:26px; background:#000;">
        <source src="uploads/videos/<?php echo htmlspecialchars($place['video']); ?>" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ video.
      </video>
    <?php } else { ?>
      <p class="empty-note">Hiện chưa có video giới thiệu cho địa điểm này.</p>
    <?php } ?>
  </div>
</section>

  <section id="hinhanh" class="detail-section">
    <div class="section-heading-row">
      <span>03</span>
      <h2>MỘT SỐ ẢNH NỔI BẬT</h2>
    </div>

    <div class="detail-gallery">
      <?php
      $images = [
        $place['image'] ?? '',
        $place['image_2'] ?? '',
        $place['image_3'] ?? '',
        $place['image_4'] ?? '',
        $place['image_5'] ?? ''
      ];

      foreach ($images as $img) {
        if (!empty($img)) {
          echo '<img src="uploads/locations/' . htmlspecialchars($img) . '" alt="">';
        }
      }
      ?>
    </div>
  </section>

  <section id="kinhnghiem" class="detail-section">
    <div class="section-heading-row">
      <span>04</span>
      <h2>KINH NGHIỆM THAM QUAN</h2>
    </div>

    <div class="tips-box">
      <p><?php echo nl2br(htmlspecialchars($tips)); ?></p>
    </div>
  </section>

  <section id="bando" class="detail-section">
    <div class="section-heading-row">
      <span>05</span>
      <h2>BẢN ĐỒ CHỈ ĐƯỜNG</h2>
    </div>

    <div class="map-box">
      <iframe
        src="https://www.google.com/maps?q=<?php echo htmlspecialchars($place['latitude']); ?>,<?php echo htmlspecialchars($place['longitude']); ?>&hl=vi&z=15&output=embed"
        width="100%"
        height="420"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
      </iframe>
    </div>
  </section>

  <div class="detail-actions">
    <a href="index.php" class="btn-back">← Quay về trang chủ</a>
    <a href="dangky.php" class="btn-register">Đăng ký trải nghiệm</a>
  </div>

</div>

</body>
</html>

