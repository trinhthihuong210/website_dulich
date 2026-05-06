<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Giới thiệu Chương Mỹ</title>

  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wgh…00;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Be Vietnam Pro', sans-serif;
      background: #f7f4ef;
      color: #2b2b2b;
      line-height: 1.8;
    }

    .navbar {
      height: 76px;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 18px rgba(0,0,0,0.06);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .navbar a {
      margin: 0 22px;
      text-decoration: none;
      color: #222;
      font-weight: 500;
    }

    .navbar a:hover {
      color: #f15d30;
    }

    .hero {
      height: 520px;
      background:
        linear-gradient(rgba(0,0,0,0.38), rgba(0,0,0,0.55)),
        url("images/place-1.jpg") center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      padding: 0 20px;
    }

    .hero span {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      color: #cb6026;
      font-style: italic;
    }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: 64px;
      max-width: 980px;
      margin: 16px auto;
      line-height: 1.2;
    }

    .hero p {
      max-width: 760px;
      margin: auto;
      font-size: 18px;
      color: #f1f1f1;
    }

    .container {
      width: 88%;
      max-width: 1180px;
      margin: auto;
    }

    .intro-section {
      padding: 85px 0;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 55px;
      align-items: center;
    }

    .intro-text span,
    .section-label {
      color: #f15d30;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      font-size: 13px;
    }

    .intro-text h2,
    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: 44px;
      line-height: 1.25;
      margin: 14px 0 22px;
      color: #222;
    }

    .intro-text p {
      color: #5f5f5f;
      margin-bottom: 18px;
    }

    .intro-img {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 18px;
    }

    .intro-img img {
      width: 100%;
      height: 260px;
      object-fit: cover;
      border-radius: 24px;
      box-shadow: 0 14px 35px rgba(0,0,0,0.12);
    }

    .intro-img img:first-child {
      transform: translateY(35px);
    }

    .highlight-section {
      padding: 80px 0;
      background: #fff;
    }

    .section-heading {
      text-align: center;
      max-width: 760px;
      margin: 0 auto 45px;
    }

    .highlight-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
    }
.highlight-card {
      background: #f9f5ef;
      padding: 30px 24px;
      border-radius: 24px;
      transition: 0.3s;
    }

    .highlight-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 14px 32px rgba(0,0,0,0.08);
    }

    .highlight-card .icon {
      width: 58px;
      height: 58px;
      background: #f15d30;
      color: #fff;
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      margin-bottom: 18px;
    }

    .highlight-card h3 {
      font-size: 21px;
      margin-bottom: 12px;
      color: #222;
    }

    .highlight-card p {
      color: #666;
      font-size: 15px;
    }

    .experience-section {
      padding: 90px 0;
    }

    .experience-list {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
      margin-top: 40px;
    }

    .experience-card {
      background: #fff;
      border-radius: 26px;
      overflow: hidden;
      box-shadow: 0 14px 35px rgba(0,0,0,0.08);
    }

    .experience-card img {
      width: 100%;
      height: 230px;
      object-fit: cover;
    }

    .experience-content {
      padding: 26px;
    }

    .experience-content h3 {
      font-size: 22px;
      margin-bottom: 12px;
    }

    .experience-content p {
      color: #666;
      font-size: 15px;
    }

    .cta-section {
      margin: 70px auto 90px;
      background:
        linear-gradient(rgba(2, 0, 0, 0.45), rgba(0,0,0,0.55)),
        url("images/bg_9.jpg") center/cover no-repeat;
      border-radius: 34px;
      padding: 80px 40px;
      text-align: center;
      color: #fff;
    }

    .cta-section h2 {
      font-family: 'Playfair Display', serif;
      font-size: 44px;
      margin-bottom: 18px;
    }

    .cta-section p {
      max-width: 700px;
      margin: 0 auto 28px;
      color: #f1f1f1;
    }

    .btn-orange {
      display: inline-block;
      background: #f15d30;
      color: #fff;
      padding: 14px 30px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      transition: 0.3s;
    }

    .btn-orange:hover {
      background: #d94c24;
    }

    @media (max-width: 992px) {
      .intro-section,
      .highlight-grid,
      .experience-list {
        grid-template-columns: 1fr;
      }

      .hero h1 {
        font-size: 42px;
      }

      .intro-text h2,
      .section-title {
        font-size: 34px;
      }
    }
    /* Scroll mượt */
html {
  scroll-behavior: smooth;
}

/* Tránh bị navbar che */
#booking {
  scroll-margin-top: 100px;
}

/* Highlight khi tới section */
#booking.highlight {
  animation: glow 1s ease;
}

@keyframes glow {
  0% { box-shadow: 0 0 0 rgba(255,107,44,0); }
  50% { box-shadow: 0 0 30px rgba(255,107,44,0.4); }
  100% { box-shadow: 0 0 0 rgba(255,107,44,0); }
}
  </style>
</head>

<body>

  <div class="navbar">
    <a href="index.php">Trang Chủ</a>
    <a href="index.php#gioithieu">Giới Thiệu</a>
    <a href="index.php#diadiem">Nổi Bật</a>
    <a href="index.php#tatcadiadiem">Địa Điểm</a>
    <a href="index.php#lichtrinh">Lịch Trình</a>
    <a href="index.php#booking">Trải Nghiệm</a>
     <a href="index.php#booking">Đăng Ký</a>
      <a href="index.php#booking">Liên Hệ</a>
    
  </div>
  

  

  <section class="hero">
    
    <div>
      <span>Khám phá Chương Mỹ</span>
<h1>Hành trình trải nghiệm thiên nhiên và văn hóa ngoại thành Hà Nội</h1>
      <p>Chương Mỹ là điểm đến phù hợp cho những chuyến đi ngắn ngày, nơi du khách có thể kết hợp tham quan di tích, khám phá làng nghề, leo núi, nghỉ dưỡng và tận hưởng không gian yên bình.</p>
    </div>
  </section>

  <div class="container">
    <section class="intro-section">
      <div class="intro-text">
        <span>Về Chương Mỹ</span>
        <h2>Vùng đất giao hòa giữa thiên nhiên, lịch sử và văn hóa truyền thống</h2>
        <p>Chương Mỹ nằm ở cửa ngõ phía Tây Nam Hà Nội, là vùng đất có cảnh quan đa dạng với núi đá, đồng quê, làng nghề truyền thống và nhiều công trình văn hóa lâu đời.</p>
        <p>Không ồn ào như các điểm du lịch nổi tiếng trong trung tâm thành phố, Chương Mỹ mang đến cảm giác gần gũi, chậm rãi và thư giãn. Đây là lựa chọn lý tưởng cho nhóm bạn, gia đình trẻ hoặc những người muốn tìm một hành trình nhẹ nhàng vào cuối tuần.</p>
        <p>Từ Núi Trầm, Chùa Trầm, Chùa Trăm Gian cho đến làng nghề mây tre đan Phú Vinh, mỗi điểm đến đều mang một màu sắc riêng, tạo nên bức tranh du lịch đa dạng của vùng ngoại thành Hà Nội.</p>
      </div>

      <div class="intro-img">
        <img src="images/destination-5.jpg" alt="Chùa Trầm">
        <img src="images/destination-3.jpg" alt="Núi Trầm">
        
      
      </div>
    </section>
  </div>

  <section class="highlight-section">
    <div class="container">
      <div class="section-heading">
        <span class="section-label">Điểm nổi bật</span>
        <h2 class="section-title">Vì sao nên khám phá Chương Mỹ?</h2>
      </div>

      <div class="highlight-grid">
        <div class="highlight-card">
        
          <h3>Thiên nhiên gần Hà Nội</h3>
          <p>Núi Trầm, Đồi Bù và các khu vực ngoại ô mang đến không gian trong lành, thích hợp leo núi, dã ngoại và săn ảnh.</p>
        </div>

        <div class="highlight-card">
          
          <h3>Di tích tâm linh</h3>
          <p>Chùa Trầm, Chùa Trăm Gian là những điểm đến có giá trị văn hóa, lịch sử và kiến trúc lâu đời.</p>
        </div>

        <div class="highlight-card">
      
          <h3>Làng nghề truyền thống</h3>
          <p>Làng nghề Phú Vinh giúp du khách hiểu hơn về mây tre đan, nghề thủ công và đời sống văn hóa địa phương.</p>
        </div>

        <div class="highlight-card">
    
          <h3>Cafe & nghỉ dưỡng</h3>
<p>Các quán cafe sân vườn, homestay và villa ngoại ô tạo nên trải nghiệm thư giãn nhẹ nhàng sau hành trình tham quan.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="experience-section">
    <div class="container">
      <div class="section-heading">
        <span class="section-label">Trải nghiệm gợi ý</span>
        <h2 class="section-title">Một ngày ở Chương Mỹ có thể làm gì?</h2>
      </div>

      <div class="experience-list">
        <div class="experience-card">
          <img src="images/destination-4.jpg" alt="Leo núi">
          <div class="experience-content">
            <h3>Leo núi và dã ngoại</h3>
            <p>Bắt đầu buổi sáng tại Núi Trầm, tận hưởng không khí trong lành, ngắm cảnh và chụp ảnh với khung cảnh núi đá đặc trưng.</p>
          </div>
        </div>

        <div class="experience-card">
          <img src="images/destination-1.jpg" alt="Vãn cảnh chùa">
          <div class="experience-content">
            <h3>Vãn cảnh chùa cổ</h3>
            <p>Ghé Chùa Trầm hoặc Chùa Trăm Gian để tìm hiểu kiến trúc cổ, không gian tâm linh và những dấu ấn lịch sử địa phương.</p>
          </div>
        </div>

        <div class="experience-card">
          <img src="images/nghe-may-tre-dan-2.jpg" alt="Làng nghề">
          <div class="experience-content">
            <h3>Khám phá làng nghề</h3>
            <p>Trải nghiệm nghề mây tre đan Phú Vinh, tìm hiểu quá trình làm sản phẩm thủ công và mua quà lưu niệm địa phương.</p>
          </div>
        </div>
      </div>

<div class="cta-section">
  <h2>Sẵn sàng lên lịch trình cho chuyến đi?</h2>

  <p>
    Khám phá các điểm đến nổi bật, xem gợi ý lịch trình và đăng ký trải nghiệm 
    để có một hành trình trọn vẹn tại Chương Mỹ.
  </p>

  <!-- NÚT -->
  <a href="dangky.php" class="btn-orange scroll-btn">
    Đăng ký trải nghiệm
  </a>
</div>

    </div>

  </section>
<script>
document.querySelectorAll(".scroll-btn").forEach(btn => {
  btn.addEventListener("click", function () {
    setTimeout(() => {
      const target = document.querySelector("#booking");
      if (target) {
        target.classList.add("highlight");

        setTimeout(() => {
          target.classList.remove("highlight");
        }, 1000);
      }
    }, 500);
  });
});
</script>
</body>

</html>