<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Chùa Trầm - Du lịch Chương Mỹ</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wgh…y=Playfair+Display:wght@600;700&family=Arizonia&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: "Be Vietnam Pro", sans-serif;
      background: #f7f4ef;
      color: #222;
    }

    .place-hero {
      min-height: 520px;
      background:
        linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.55)),
        url("images/chuatram.jpg") center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
      padding: 80px 20px;
    }

    .place-hero span {
      font-family: "Arizonia", cursive;
      color: #f15d30;
      font-size: 34px;
    }

    .place-hero h1 {
      font-family: "Playfair Display", serif;
      font-size: 68px;
      font-weight: 700;
      margin: 10px 0 15px;
    }

    .place-hero p {
      font-size: 18px;
      max-width: 720px;
      margin: auto;
      line-height: 1.8;
    }

    .place-section {
      padding: 80px 0;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
      margin-top: -55px;
      position: relative;
      z-index: 5;
    }

    .info-card {
      background: #fff;
      padding: 24px;
      border-radius: 20px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.08);
    }

    .info-card .icon {
      font-size: 26px;
      margin-bottom: 10px;
    }

    .info-card h4 {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .info-card p {
      margin: 0;
      color: #666;
      font-size: 14px;
    }

    .content-box {
      background: #fff;
      border-radius: 26px;
      padding: 42px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
    }

    .section-sub {
      font-family: "Arizonia", cursive;
      color: #f15d30;
      font-size: 30px;
    }

    .content-box h2,
    .gallery-title,
    .video-title,
    .experience-title {
      font-family: "Playfair Display", serif;
      font-size: 42px;
      font-weight: 700;
      margin-bottom: 22px;
    }

    .content-box p {
      color: #555;
      line-height: 1.9;
      font-size: 16px;
    }

    .side-img {
      width: 100%;
      height: 520px;
      object-fit: cover;
      border-radius: 26px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.1);
    }

    .mini-gallery {
      display: grid;
      grid-template-columns: 1.2fr 1fr 1fr;
      grid-template-rows: 230px 230px;
      gap: 16px;
    }

    .mini-gallery img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 20px;
    }

    .mini-gallery img:first-child {
      grid-row: span 2;
    }

    .video-box {
      background: #fff;
padding: 30px;
      border-radius: 26px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
    }

    .video-box video {
      width: 100%;
      border-radius: 20px;
      display: block;
    }

    .experience-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
    }

    .experience-card {
      background: #fff;
      border-radius: 22px;
      padding: 26px;
      text-align: center;
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
    }

    .experience-card .icon {
      font-size: 34px;
      margin-bottom: 14px;
    }

    .experience-card h4 {
      font-size: 17px;
      font-weight: 700;
    }

    .experience-card p {
      color: #666;
      font-size: 14px;
      line-height: 1.7;
      margin: 0;
    }

    .cta-box {
      background:
        linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
        url("images/bg_3.jpg") center/cover no-repeat;
      border-radius: 28px;
      padding: 60px 30px;
      text-align: center;
      color: #fff;
    }

    .cta-box h2 {
      font-family: "Playfair Display", serif;
      font-size: 42px;
      font-weight: 700;
    }

    .cta-btn {
      display: inline-block;
      margin-top: 20px;
      background: #f15d30;
      color: #fff;
      padding: 14px 34px;
      border-radius: 999px;
      font-weight: 700;
      text-decoration: none;
    }

    .cta-btn:hover {
      background: #d94c24;
      color: #fff;
    }

    .back-link {
      display: inline-block;
      margin-bottom: 25px;
      color: #f15d30;
      font-weight: 700;
      text-decoration: none;
    }

    @media (max-width: 992px) {
      .info-grid,
      .experience-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .place-hero h1 {
        font-size: 48px;
      }

      .mini-gallery {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
      }

      .mini-gallery img,
      .mini-gallery img:first-child {
        height: 260px;
        grid-row: auto;
      }
    }
  </style>
</head>

<body>

<section class="place-hero">
  <div>
    <span>Khám phá Chương Mỹ</span>
    <h1>Chùa Trầm</h1>
    <p>
      Một điểm đến tâm linh yên bình, nơi núi đá, kiến trúc cổ và không gian vãn cảnh
      hòa vào nhau tạo nên trải nghiệm nhẹ nhàng ngay gần Hà Nội.
    </p>
  </div>
</section>

<div class="container">
  <div class="info-grid">
    <div class="info-card">
      <div class="icon">📍</div>
      <h4>Vị trí</h4>
      <p>Phụng Châu, Chương Mỹ</p>
    </div>

    <div class="info-card">
      <div class="icon">🏯</div>
      <h4>Loại hình</h4>
      <p>Tâm linh, vãn cảnh</p>
    </div>

    <div class="info-card">
      <div class="icon">⏰</div>
      <h4>Thời gian phù hợp</h4>
      <p>Buổi sáng hoặc chiều mát</p>
    </div>

    <div class="info-card">
      <div class="icon">🌿</div>
      <h4>Trải nghiệm</h4>
<p>Chụp ảnh, leo núi nhẹ, picnic</p>
    </div>
  </div>
</div>

<section class="place-section">
  <div class="container">

    <a href="index.php" class="back-link">← Quay về trang chủ</a>

    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="content-box">
          <span class="section-sub">Giới thiệu</span>
          <h2>Không gian cổ kính giữa núi đá</h2>

          <p>
            Chùa Trầm là một trong những địa điểm nổi bật của Chương Mỹ, phù hợp với những
            chuyến đi ngắn trong ngày. Nơi đây mang vẻ đẹp mộc mạc, yên tĩnh và có cảnh quan
            núi đá tự nhiên rất đặc trưng.
          </p>

          <p>
            Khi đến Chùa Trầm, du khách có thể vãn cảnh chùa, chụp ảnh cùng không gian cổ kính,
            hoặc leo nhẹ lên các khu vực núi đá để ngắm toàn cảnh xung quanh. Đây là lựa chọn
            phù hợp cho nhóm bạn, gia đình hoặc những ai muốn tìm một điểm nghỉ ngắn gần Hà Nội.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <img src="images/chuatram.jpg" alt="Chùa Trầm" class="side-img">
      </div>
    </div>

  </div>
</section>

<section class="place-section pt-0">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-sub">Hình ảnh</span>
      <h2 class="gallery-title">Một vài khoảnh khắc tại Chùa Trầm</h2>
    </div>

    <div class="mini-gallery">
      <img src="images/chuatram.jpg" alt="Chùa Trầm">
      <img src="images/chuatram2.jpg" alt="Cảnh Chùa Trầm">
      <img src="images/nuitram.jpg" alt="Núi Trầm">
      <img src="images/chuatram3.jpg" alt="Không gian Chùa Trầm">
      <img src="images/chuatram4.jpg" alt="Vãn cảnh Chùa Trầm">
    </div>
  </div>
</section>

<section class="place-section pt-0">
  <div class="container">
    <div class="video-box">
      <div class="text-center mb-4">
        <span class="section-sub">Video</span>
        <h2 class="video-title">Cảm nhận không gian Chùa Trầm</h2>
      </div>

      <video controls poster="images/chuatram.jpg">
        <source src="videos/chuatram.mp4" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ video.
      </video>
    </div>
  </div>
</section>

<section class="place-section pt-0">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-sub">Trải nghiệm</span>
      <h2 class="experience-title">Bạn có thể làm gì tại đây?</h2>
    </div>

    <div class="experience-grid">
      <div class="experience-card">
        <div class="icon">🏯</div>
        <h4>Vãn cảnh chùa</h4>
        <p>Tham quan không gian tâm linh, tìm cảm giác bình yên và thư thái.</p>
      </div>

      <div class="experience-card">
        <div class="icon">📸</div>
<h4>Chụp ảnh</h4>
        <p>Không gian cổ kính, núi đá và cây xanh rất hợp để lưu lại khoảnh khắc.</p>
      </div>

      <div class="experience-card">
        <div class="icon">⛰️</div>
        <h4>Leo núi nhẹ</h4>
        <p>Phù hợp cho chuyến đi ngắn, vận động nhẹ và ngắm cảnh xung quanh.</p>
      </div>

      <div class="experience-card">
        <div class="icon">🧺</div>
        <h4>Đi trong ngày</h4>
        <p>Kết hợp cùng Núi Trầm, cafe hoặc các điểm gần đó để có lịch trình trọn vẹn.</p>
      </div>
    </div>
  </div>
</section>

<section class="place-section pt-0">
  <div class="container">
    <div class="cta-box">
      <h2>Sẵn sàng cho một chuyến đi nhẹ nhàng tại Chương Mỹ?</h2>
      <p>Đăng ký trải nghiệm để được gợi ý lịch trình phù hợp hơn.</p>
      <a href="dangky.php" class="cta-btn">Đăng ký trải nghiệm</a>
    </div>
  </div>
</section>

</body>
</html>