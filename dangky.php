
<!-- ĐĂNG KÝ TRẢI NGHIỆM-->
<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Gửi đánh giá - Chương Mỹ</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<section class="ftco-section ftco-about ftco-no-pt img booking-section-custom">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-12 about-intro">
        <div class="row align-items-stretch">

          <!-- ẢNH BÊN TRÁI -->
          <div class="col-md-6">
            <div class="booking-image" style="background-image:url(images/about-1.jpg);"></div>
          </div>

          <!-- FORM BÊN PHẢI -->
          <div class="col-md-6 pl-md-5 py-5">
            <div class="heading-section ftco-animate mb-4">
              <span class="subheading">Đăng ký</span>
              <h2 class="mb-3">Sẵn sàng cho một trải nghiệm đáng nhớ</h2>
              <p class="booking-desc">
                Chỉ cần vài thông tin cơ bản , chúng tôi sẽ giúp bạn thiết kế một lịch trình hoàn hảo nhất
              </p>
            </div>

<div id="successMessage" class="booking-success-message" style="display:none;">
  Cảm ơn bạn! Chúng tôi sẽ liên hệ lại trong vòng 24h.
</div>
            <form action="save_booking.php" method="POST">
              <div class="form-group">
                <input type="text" name="fullname" class="form-control" placeholder="Họ và tên: Nguyễn Văn A" required>
              </div>

              <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại: 09xxxxxxxx" required>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email: example@gmail.com">
              </div>

              <div class="form-group">
                <select name="schedule_type" class="form-control" required>
                  <option value="">Chọn lịch trình</option>
                  <option value="1 ngày">1 ngày</option>
                  <option value="2 ngày 1 đêm">2 ngày 1 đêm</option>
                </select>
              </div>

              <div class="form-group">
                <input type="number" name="people_count" class="form-control" placeholder="Số lượng người" min="1">
              </div>

              <div class="form-group">
                <textarea name="note" class="form-control" rows="4" placeholder="Ghi chú thêm: thời gian đi, điểm muốn tham quan..."></textarea>
              </div>

              <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary btn-booking-submit">Gửi đăng ký</button>
              </div>

              <p class="booking-proof">Đã có hơn 100+ lượt đăng ký trải nghiệm trong tháng này.</p>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>