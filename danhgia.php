<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Gửi đánh giá - Chương Mỹ</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<style>
.review-hero {
  height: 360px;
  background: url('images/destination-4.jpg') center/cover no-repeat;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.review-hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.55);
}

.review-hero-content {
  position: relative;
  color: #fff;
  text-align: center;
  z-index: 2;
}

.review-hero h1 {
  font-size: 44px;
  font-weight: 700;
  color: #fff;
}

.review-hero p {
  color: rgba(255,255,255,0.9);
}

.review-section {
  padding: 80px 0;
  background: #f7f7f7;
}

.review-box {
  max-width: 720px;
  margin: auto;
  background: #fff;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

.review-box h3 {
  text-align: center;
  margin-bottom: 10px;
}

.review-box p {
  text-align: center;
  color: #777;
  margin-bottom: 25px;
}

.review-box input,
.review-box textarea {
  width: 100%;
  padding: 12px 15px;
  border-radius: 12px;
  border: 1px solid #ddd;
  margin-bottom: 15px;
  font-size: 15px;
}

.review-box textarea {
  min-height: 140px;
  resize: vertical;
}

.star-rating {
  display: flex;
  flex-direction: row-reverse;
  justify-content: center;
  margin-bottom: 20px;
}

.star-rating input {
  display: none;
}

.star-rating label {
  font-size: 32px;
  color: #ccc;
  cursor: pointer;
  transition: 0.2s;
  margin: 0 3px;
}

.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input:checked ~ label {
  color: #f15d30;
}

.upload-box {
  display: block;
  text-align: center;
  padding: 16px;
  border: 2px dashed #f15d30;
  border-radius: 12px;
  color: #f15d30;
  cursor: pointer;
  margin-bottom: 15px;
  font-weight: 500;
}

.upload-box:hover {
  background: rgba(241,93,48,0.08);
}

.preview-img {
  display: none;
  margin: 10px auto 20px;
  width: 110px;
  height: 110px;
  object-fit: cover;
  border-radius: 50%;
}

.submit-btn {
  width: 100%;
  background: #f15d30;
  color: #fff;
  border: none;
  padding: 14px;
  border-radius: 30px;
  font-weight: 600;
  cursor: pointer;
}

.submit-btn:hover {
  background: #d94c24;
}

.review-success-message {
  max-width: 720px;
  margin: 0 auto 25px;
  background: #eaf8ee;
  color: #2f7a3e;
  padding: 15px 18px;
  border-radius: 12px;
  font-weight: 500;
  text-align: center;
}

.back-home {
  display: block;
  text-align: center;
  margin-top: 18px;
  color: #f15d30;
  font-weight: 600;
}
</style>
</head>

<body>

<section class="review-hero">
  <div class="review-hero-content">
    <h1>CHIA SẺ TRẢI NGHIỆM CỦA BẠN</h1>
    <p>Mỗi đánh giá của bạn giúp mọi người có lựa chọn phù hợp và giúp Chương Mỹ đẹp hơn</p>
  </div>
</section>

<section class="review-section">
  <div class="container">
<?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
      <div class="review-success-message">
        Cảm ơn bạn đã đánh giá! Đánh giá sẽ được xem xét trong vòng 24h và duyệt lên website.
      </div>
    <?php } ?>

    <div class="review-box">
      <h3>Gói Trọn Cảm Xúc Sau Hành Trình</h3>
      <p>Hãy kể lại khoảnh khắc đáng nhớ nhất của bạn</p>

      <form action="save_review.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="customer_name" placeholder="Tên của bạn là..." required>

        <input type="text" name="customer_type" placeholder="Ví dụ: Nhóm bạn, Hà Nội">

        <div class="star-rating">
          <input type="radio" name="rating" value="5" id="star5" checked><label for="star5">★</label>
          <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
          <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
          <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
          <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
        </div>

        <textarea name="content" placeholder="Hãy kể về trải nghiệm đáng nhớ nhất của bạn..." required></textarea>

        <label class="upload-box">
          📸 Thêm 1 ảnh avatar hoặc ảnh kỉ niệm
          <input type="file" name="avatar" id="avatarInput" accept="image/*" hidden>
        </label>

        <img id="preview" class="preview-img">

        <button type="submit" class="submit-btn">Gửi đánh giá</button>
      </form>

      <a href="index.php" class="back-home">← Quay về trang chủ</a>
    </div>
  </div>
</section>

<script>
document.getElementById("avatarInput").onchange = function(e) {
  const file = e.target.files[0];
  if(file){
    const reader = new FileReader();
    reader.onload = function(){
      const img = document.getElementById("preview");
      img.src = reader.result;
      img.style.display = "block";
    }
    reader.readAsDataURL(file);
  }
};
</script>

</body>
</html>