

  
  
  
  <?php
include "includes/db.php";

$sql = "SELECT * FROM locations WHERE is_active = 1 ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

  <?php include 'includes/db.php'; ?>
  <!DOCTYPE html>
<html lang="en">


<head>
	<title>Đăng ký tour trải nghiệm Chương My</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Be+Vietnam+Pro:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">


  

  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="leaflet/leaflet.css">
<script src="leaflet/leaflet.js"></script>
</head>






<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
  <div class="container">

    <a class="navbar-brand" href="index.php">
      <span>CHƯƠNG MỸ</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
      <span class="oi oi-menu"></span>
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="index.php">Trang Chủ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="gioithieuchuongmy.php">Giới Thiệu</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#noibat">Nổi Bật</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#tatcadiadiem">Địa Điểm</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#lichtrinh">Lịch Trình</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#booking">Đăng Ký</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#danhgia1">Đánh Giá</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#lienhe">Liên Hệ</a>
        </li>

      </ul>
    </div>

  </div>
</nav>
	
	<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
				<div class="col-md-7 ftco-animate">
					<span class="subheading">Khám phá</span>
					<h1 class="mb-4"> CHƯƠNG MỸ</h1>
					<p class="caps">Nơi giao thoa giữa dấu ấn tâm linh cổ kính , tinh hoa làng nghề và </p>
					<p class="caps">những phút giây nghỉ dưỡng giữa thiên nhiên </p>
				</div>
<a href="https://www.youtube.com/watch?v=bTknKCEx_sU" 
   class="icon-video popup-youtube d-flex justify-content-center align-items-center">
  <span class="fa fa-play"></span>
</a>
			</div>
		</div>
	</div>


  	<!-- TÌM KIẾM-->
<section class="ftco-section ftco-no-pb ftco-no-pt">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="search-wrap-1 ftco-search">
<form action="#" onsubmit="return false;" class="search-property-1">
            <div class="row no-gutters">

              <div class="col-lg-9 d-flex">
                <div class="form-group p-4 border-0 w-100">
                  <label for="destination-search">Điểm đến</label>
                  <div class="form-field">
                    <div class="icon"><span class="fa fa-search"></span></div>
                    <input type="text" id="destination-search" class="form-control" placeholder="Ví dụ: Chùa Trầm">
                  </div>
                </div>
              </div>
              <div class="col-lg-3 d-flex">
                <div class="form-group d-flex w-100 border-0">
                  <div class="form-field w-100 align-items-center d-flex">
                    <input type="submit" value="Tìm kiếm" class="align-self-stretch form-control btn btn-primary">
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- GIỚI THIỆU-->
		<section class="ftco-section services-section">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
						<div class="w-100">
							<span class="subheading">Khám phá Chương Mỹ</span>
							<h2 class="mb-4">Hành trình trải nghiệm thiên nhiên và văn hóa Chương Mỹ</h2>
							<p>Chương Mỹ là một huyện ngoại thành Hà Nội, nổi bật với sự kết hợp hài hòa giữa cảnh quan thiên nhiên và các giá trị văn hóa truyền thống. Nơi đây sở hữu nhiều địa điểm du lịch hấp dẫn như Núi Trầm, Chùa Trầm, Chùa Trăm Gian cùng các làng nghề truyền thống như mây tre đan Phú Vinh.</p>

              <p>Không chỉ là điểm đến lý tưởng cho những chuyến dã ngoại trong ngày, Chương Mỹ còn mang đến những trải nghiệm đa dạng như leo núi, tham quan di tích tâm linh, khám phá làng nghề và thưởng thức không gian yên bình của vùng ngoại ô.</p>

              <p>Với vị trí không quá xa nội thành, Chương Mỹ là lựa chọn phù hợp cho những ai muốn tìm kiếm một hành trình ngắn ngày nhưng vẫn đầy đủ trải nghiệm thiên nhiên, văn hóa và thư giãn.</p>
							<p><a href="gioithieuchuongmy.php" class="btn btn-primary" target="_blank">
  Tìm hiểu thêm
</a></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-1 d-block img" style="background-image: url(images/services-1.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><i class="fa-solid fa-landmark"></i></div>
									<div class="media-body">
										<h3 class="heading mb-3">Du lịch Tâm Linh</h3>
										<p>Tham quan chùa Trầm , chùa Trăm Gian và các địa điểm tâm linh nổi bật</p>
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-2 d-block img" style="background-image: url(images/services-2.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Làng nghề truyền thống</h3>
										<p>Khám phá làng nghề mây tre đan Phú Vinh và nghề thủ công lâu đời</p>
									</div>
								</div>    
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-3 d-block img" style="background-image: url(images/services-3.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-paragliding"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Thiên nhiên & Trekking</h3>
										<p>Leo núi , dã ngoại và tận hưởng cảnh quan thiên nhiên tại Núi Trầm , Đồi Bù</p>
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-4 d-block img" style="background-image: url(images/services-4.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-map"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Nghỉ ngơi & Cafe</h3>
										<p>Thư giãn tại các quán cafe sân vườn và homestay giữa không gian yên bình </p>
									</div>
								</div>      
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



 <!-- ĐỊA ĐIỂM NỔI BẬT-->
<section id="noibat" class="ftco-section ftco-select-destination featured-places-section">
<div style="background: linear-gradient(135deg, #d4f1e4, #e7efe7);">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading" style="color:#ff6b2c;">Chương Mỹ</span>
          <h2 class="mb-4" style="color:#222;">Địa Điểm Nổi Bật</h2>
        </div>
      </div>

      <div class="row featured-places-row">

      <!-- Chùa Trầm -->
      <div class="col-md-6 col-lg-3 mb-4">
        <a href="chuatram.html" class="featured-place-card" style="background-image: url('images/place-1.jpg');">
          <span class="place-tag">Tâm linh</span>
          <div class="place-overlay">
            <h3>Chùa Trầm</h3>
            <p>Không gian tâm linh cổ kính, phù hợp tham quan và vãn cảnh.</p>
          </div>
        </a>
      </div>

      <!-- Núi Trầm -->
      <div class="col-md-6 col-lg-3 mb-4">
        <a href="nuitram.html" class="featured-place-card" style="background-image: url('images/place-2.jpg');">
          <span class="place-tag">Thiên nhiên</span>
          <div class="place-overlay">
            <h3>Núi Trầm</h3>
            <p>Địa điểm leo núi, dã ngoại và ngắm cảnh nổi bật tại Chương Mỹ.</p>
          </div>
        </a>
      </div>

      <!-- Chùa Trăm Gian -->
      <div class="col-md-6 col-lg-3 mb-4">
        <a href="chuatramgian.html" class="featured-place-card" style="background-image: url('images/place-3.jpg');">
          <span class="place-tag">Văn hóa</span>
          <div class="place-overlay">
            <h3>Chùa Trăm Gian</h3>
            <p>Ngôi chùa cổ với kiến trúc độc đáo và giá trị lịch sử đặc sắc.</p>
          </div>
        </a>
      </div>

      <!-- Đồi Bù -->
      <div class="col-md-6 col-lg-3 mb-4">
        <a href="doibu.html" class="featured-place-card" style="background-image: url('images/place-4.jpg');">
          <span class="place-tag">Trải nghiệm</span>
          <div class="place-overlay">
            <h3>Đồi Bù</h3>
            <p>Nơi lý tưởng để săn mây, dù lượn và tận hưởng thiên nhiên.</p>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>


<!-- TẤT CẢ ĐỊA ĐIỂM + MAP SONG HÀNH -->
 <section id="tatcadiadiem" class="ftco-section side-map-section">
  <div class="container">

    <div class="row justify-content-center pb-4">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Chương Mỹ</span>
        <h2 class="mb-4">Tất Cả Địa Điểm Tham Quan</h2>
      </div>
    </div>

    <div class="place-filters text-center mb-5">
      <button class="filter-btn active" data-filter="all">Tất cả</button>
      <button class="filter-btn" data-filter="tam-linh">Tâm linh</button>
      <button class="filter-btn" data-filter="thien-nhien">Thiên nhiên</button>
      <button class="filter-btn" data-filter="cafe">Cafe</button>
      <button class="filter-btn" data-filter="lang-nghe">Làng nghề</button>
      <button class="filter-btn" data-filter="nghi-duong">Nghỉ dưỡng</button>
    </div>

    <div class="side-map-layout">

      <div class="place-list-column">

        <?php
        $sql = "SELECT * FROM locations 
                WHERE is_active = 1 
                ORDER BY sort_order ASC, id ASC";
        $result = mysqli_query($conn, $sql);
        $firstPlace = null;

        while($row = mysqli_fetch_assoc($result)) {
          if ($firstPlace === null) {
            $firstPlace = $row;
          }
        ?>

       <div class="side-place-card"
     data-id="<?php echo $row['id']; ?>"
     data-category="<?php echo htmlspecialchars($row['category']); ?>"
     data-title="<?php echo htmlspecialchars($row['name']); ?>"
     data-desc="<?php echo htmlspecialchars($row['short_desc']); ?>"
     data-image="uploads/locations/<?php echo htmlspecialchars($row['image']); ?>"
     data-link="detail.php?id=<?php echo $row['id']; ?>"
     data-lat="<?php echo htmlspecialchars($row['latitude']); ?>"
     data-lng="<?php echo htmlspecialchars($row['longitude']); ?>">

          <div class="side-place-thumb"
               style="background-image: url('uploads/locations/<?php echo htmlspecialchars($row['image']); ?>');">
          </div>

          <div class="side-place-content">
<h4 class="vn-title">
  <?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?>
</h4>
            <p class="location">
              <span class="fa-solid fa-location-dot"></span>
              <?php echo htmlspecialchars($row['location_name']); ?>
            </p>

            <ul>
<li>
  <?php
    if ($row['category'] == 'tam-linh') {
      echo '<span class="fa fa-university"></span> Tâm linh';
    } elseif ($row['category'] == 'thien-nhien') {
      echo '<span class="fa fa-tree"></span> Thiên nhiên';
    } elseif ($row['category'] == 'cafe') {
      echo '<span class="fa fa-coffee"></span> Cafe';
    } elseif ($row['category'] == 'lang-nghe') {
      echo '<span class="fa fa-cogs"></span> Làng nghề';
    } elseif ($row['category'] == 'nghi-duong') {
      echo '<span class="fa fa-home"></span> Nghỉ dưỡng';
    } else {
      echo '<span class="fa fa-map-marker"></span> Khác';
    }
  ?>
</li>

              <li>
<span class="fa fa-sun-o"></span>
                <?php echo htmlspecialchars($row['short_desc']); ?>
              </li>
            </ul>

            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mt-2">
              Xem chi tiết
            </a>
          </div>
        </div>

        <?php } ?>

      </div>

      <div class="map-sticky-column">
        <div class="sticky-map-card">


<div class="sticky-map-box">
  <div id="chuongMyMap" style="width:100%; height:380px; min-height:380px; background:red; border-radius:22px; overflow:hidden;"></div>
</div><script>
document.addEventListener("DOMContentLoaded", function () {

  var map = L.map('chuongMyMap').setView([20.858, 105.675], 11);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
  }).addTo(map);

  var locations = [
  <?php
  $pin_sql = "SELECT * FROM locations 
              WHERE is_active = 1 
              AND latitude IS NOT NULL 
              AND longitude IS NOT NULL 
              ORDER BY sort_order ASC, id ASC";
  $pin_result = mysqli_query($conn, $pin_sql);

  while($pin = mysqli_fetch_assoc($pin_result)) {
  ?>
    {
      id: <?php echo (int)$pin['id']; ?>,
      name: "<?php echo htmlspecialchars($pin['name'], ENT_QUOTES, 'UTF-8'); ?>",
      desc: "<?php echo htmlspecialchars($pin['short_desc'], ENT_QUOTES, 'UTF-8'); ?>",
      image: "uploads/locations/<?php echo htmlspecialchars($pin['image'], ENT_QUOTES, 'UTF-8'); ?>",
      lat: <?php echo (float)$pin['latitude']; ?>,
      lng: <?php echo (float)$pin['longitude']; ?>,
      category: "<?php echo htmlspecialchars($pin['category'], ENT_QUOTES, 'UTF-8'); ?>",
      link: "detail.php?id=<?php echo (int)$pin['id']; ?>"
    },
  <?php } ?>
  ];

  var markers = [];
  var activeMarker = null;

  function updateInfo(loc) {
    document.getElementById("stickyInfoTitle").innerText = loc.name;
    document.getElementById("stickyInfoDesc").innerText = loc.desc;
    document.getElementById("stickyInfoImage").style.backgroundImage = "url('" + loc.image + "')";
    document.getElementById("stickyInfoLink").href = loc.link;
  }

  function clearMarkers() {
    markers.forEach(function(marker) {
      map.removeLayer(marker);
    });
    markers = [];
    activeMarker = null;
  }

function createMarker(loc) {
  var marker = L.circleMarker([loc.lat, loc.lng], {
    radius: 7,
    color: "#ffffff",
    weight: 3,
    fillColor: "#2b2b2b",
    fillOpacity: 1
  }).addTo(map);

  // tooltip khi hover
  marker.bindTooltip(loc.name, {
    permanent: false,
    direction: "top",
    offset: [0, -10],
    opacity: 0.95
  });

  // hover effect
  marker.on("mouseover", function () {
    if (marker !== activeMarker) {
      marker.setStyle({
        fillColor: "#ff784e",
        radius: 9
      });
    }
  });

  marker.on("mouseout", function () {
    if (marker !== activeMarker) {
      marker.setStyle({
        fillColor: "#2b2b2b",
        radius: 7
      });
    }
  });

  // click
  marker.on("click", function () {

    if (activeMarker) {
      activeMarker.setStyle({
        fillColor: "#2b2b2b",
        radius: 7
      });
    }

    marker.setStyle({
      fillColor: "#f05a28",
      radius: 11
    });

    activeMarker = marker;

    updateInfo(loc);
    map.setView([loc.lat, loc.lng], 14);
  });

  markers.push(marker);
  return marker;
}

  function showMarkers(category) {
    clearMarkers();

    var visibleLocations = locations.filter(function(loc) {
      return category === "all" || loc.category === category;
    });

    visibleLocations.forEach(function(loc) {
      createMarker(loc);
    });

    if (markers.length > 0) {
      var group = L.featureGroup(markers);

      map.fitBounds(group.getBounds(), {
        padding: [30, 30],
        maxZoom: 14
      });

      updateInfo(visibleLocations[0]);
      setTimeout(function() {
  var firstDot = markers[0].getElement().querySelector(".custom-map-dot");
  if (firstDot) firstDot.classList.add("custom-map-dot-active");
}, 100);


      if (markers[0].getElement()) {
markers[0].getElement().classList.add("map-dot-active");
      }

      activeMarker = markers[0];
    }
  }

  showMarkers("all");

  document.querySelectorAll(".filter-btn").forEach(function(btn) {
    btn.addEventListener("click", function() {
      document.querySelectorAll(".filter-btn").forEach(function(b) {
        b.classList.remove("active");
      });

      this.classList.add("active");

      var category = this.getAttribute("data-filter");
      showMarkers(category);
    });
  });

  document.querySelectorAll(".side-place-card").forEach(function(card) {
    card.addEventListener("click", function() {
      var id = this.getAttribute("data-id");

      var loc = locations.find(function(item) {
        return item.id == id;
      });

      if (!loc) return;

      clearMarkers();

      var marker = createMarker(loc);

      if (marker.getElement()) {
        marker.getElement().classList.add("map-dot-active");
      }

      activeMarker = marker;

      updateInfo(loc);
      map.setView([loc.lat, loc.lng], 15);
    });
  });

  setTimeout(function () {
    map.invalidateSize();
  }, 500);

});
</script>

<!-- THÔNG TIN ĐỊA ĐIỂM DƯỚI MAP-->
<div class="sticky-map-info">

  <div class="sticky-map-info-image"
       id="stickyInfoImage"
       style="background-image: url('uploads/locations/<?php echo $firstPlace ? htmlspecialchars($firstPlace['image']) : ''; ?>');">
  </div>

  <div class="sticky-map-info-content">

    <span class="sticky-map-info-label">THÔNG TIN ĐỊA ĐIỂM</span>
<h3 id="stickyInfoTitle" 
    style="
           font-weight: 700 !important;
           letter-spacing: 0 !important;
           line-height: 1.25 !important;
           font-style: normal !important;
           text-transform: none !important;">
  <?php echo $firstPlace ? htmlspecialchars($firstPlace['name'], ENT_QUOTES, 'UTF-8') : 'Địa điểm'; ?>
</h3>

    <p id="stickyInfoDesc">
      <?php echo $firstPlace ? htmlspecialchars($firstPlace['short_desc']) : ''; ?>
    </p>

    <a id="stickyInfoLink"
       href="detail.php?id=<?php echo $firstPlace ? $firstPlace['id'] : 0; ?>"
       class="sticky-map-info-btn">
      Xem chi tiết →
    </a>

  </div>

</div>

        </div>
      </div>

    </div>

  </div>
</section>
<!--
<section class="ftco-section ftco-select-destination featured-places-section">
  <div style="background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('images/bg_3.jpg') center center / cover no-repeat; padding: 90px 0;">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading" style="color:#c9612d;">Chương Mỹ</span>
          <h2 class="mb-4" style="color:#fff;">Địa Điểm Nổi Bật</h2>
        </div>
      </div>

      <div class="row featured-places-row">
-->

    <!-- LỊCH TRÌNH -->
<section id="lichtrinh" class="ftco-section custom-itinerary-preview">
  <div style="background: #f8f9f3;"></div>
    <div class="container">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading" style ="color:#ff6b2c;">Lịch Trình Gợi Ý</span>
  
               <div class="col-md-12 heading-section text-center ftco-animate">

  
        </div>
      </div>

      <div class="row justify-content-center pb-4">
        <div class="col-md-12 text-center">

          <div class="timeline-slider-wrap">
            <button class="timeline-arrow timeline-arrow-left" id="timelinePrev">&#10094;</button>

            <div class="timeline-slider-viewport">
              <div class="timeline-slider-track" id="timelineTrack">

                <?php
                $sql = "SELECT * FROM itineraries WHERE is_active = 1 ORDER BY sort_order ASC, id ASC";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <div class="timeline-slide">
                    <img src="uploads/itineraries/<?php echo htmlspecialchars($row['image']); ?>"
                         alt="<?php echo htmlspecialchars($row['title']); ?>">
                  </div>
                <?php } ?>

              </div>
            </div>

            <button class="timeline-arrow timeline-arrow-right" id="timelineNext">&#10095;</button>
          </div>

          <div class="text-center mt-4">
            <a href="dangky.php" class="more-itinerary-btn">
              Đăng ký trải nghiệm <span class="arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>


 <!-- ALBUM ẢNH-->  
<section class="gallery-section">
  <div class="container-fluid">

 <div class="heading-section text-center ftco-animate mb-4">
  <span class="subheading">Thư Viện Ảnh</span>
  <h2 class="mb-4">Khoảnh Khắc Nổi Bật</h2>
</div>
    <div class="gallery-drag-wrapper">
      <?php
      $sql = "SELECT * FROM gallery WHERE is_active = 1 ORDER BY sort_order ASC, id ASC";
      $result = mysqli_query($conn, $sql);

      $items = [];
      while($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
      }

      $chunks = array_chunk($items, 8);

      foreach($chunks as $chunk) {
      ?>
        <div class="gallery-page">
          <?php foreach($chunk as $index => $row) { ?>
            <div class="gallery-item gallery-item-<?php echo $index + 1; ?>">
              <img src="uploads/gallery/<?php echo htmlspecialchars($row['image']); ?>" 
                   alt="<?php echo htmlspecialchars($row['title']); ?>">
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- FEEDBACK -->
 
<section id="danhgia1" class="cm-review-section-fix">
  <div class="container">

 <div class="heading-section text-center ftco-animate mb-4">
  <span class="subheading">Cảm Nhận Du Khách</span>
  <h2 class="mb-4"style ="color:#ffff ;">Du khách nói gì về Chương Mỹ</h2>
</div>

    <div class="cm-review-list">
      <?php
      $sql = "SELECT * FROM reviews 
              WHERE is_approved = 1 AND is_active = 1 
              ORDER BY created_at DESC";
      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_assoc($result)) {
        $avatar = !empty($row['avatar']) 
          ? 'uploads/reviews/' . $row['avatar'] 
          : 'images/default-avatar.jpg';
      ?>
        <div class="cm-review-item">

          <div>
            <div class="cm-stars">
              <?php for($i = 0; $i < (int)$row['rating']; $i++) { ?>
                <span class="fa fa-star"></span>
              <?php } ?>
            </div>

            <p class="cm-content">
              <?php echo htmlspecialchars($row['content']); ?>
            </p>
          </div>

          <div class="cm-user">
            <div class="cm-avatar" style="background-image: url('<?php echo $avatar; ?>');"></div>
            <div>
              <h4><?php echo htmlspecialchars($row['customer_name']); ?></h4>
<span><?php echo htmlspecialchars($row['customer_type']); ?></span>
            </div>
          </div>

        </div>
      <?php } ?>
    </div>

  </div>
</section>

<style>
.cm-review-section-fix {
  position: relative;
  padding: 110px 0;
  background-image: url("images/bg_8.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  overflow: hidden;
}

.cm-review-section-fix::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.48);
  z-index: 1;
}

.cm-review-section-fix .container {
  position: relative;
  z-index: 2;
}

.cm-review-title {
  text-align: center;
  margin-bottom: 45px;
}

.cm-review-title span {
  color: #f15d30;
  font-size: 24px;
  font-family: cursive;
}

.cm-review-title h2 {
  color: #fff;
  font-size: 44px;
  font-weight: 700;
}

.cm-review-list {
  display: flex;
  gap: 32px;
  overflow-x: auto;
  padding: 10px 0 25px;
}

.cm-review-item {
  flex: 0 0 calc((100% - 64px) / 3);
  min-width: 320px;
  background: rgba(255,255,255,0.96);
  border-radius: 18px;
  padding: 30px 28px;
  min-height: 330px;
  box-shadow: 0 14px 35px rgba(0,0,0,0.12);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.cm-stars {
  margin-bottom: 18px;
}

.cm-stars .fa-star {
  color: #f15d30;
  font-size: 16px;
  margin-right: 4px;
}

.cm-content {
  color: #444;
  font-size: 16px;
  line-height: 1.8;
  margin-bottom: 24px;
}

.cm-user {
  display: flex;
  align-items: center;
  gap: 14px;
}

.cm-avatar {
  width: 62px;
  height: 62px;
  border-radius: 50%;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  flex-shrink: 0;
}

.cm-user h4 {
  margin: 0 0 4px;
  font-size: 18px;
  font-weight: 600;
  color: #222;
}

.cm-user span {
  color: #f15d30;
  font-size: 15px;
}

@media (max-width: 991px) {
  .cm-review-item {
    flex: 0 0 70%;
  }
}
</style>

<!-- ĐĂNG KÝ TRẢI NGHIỆM-->

<section id="booking" class="ftco-section ftco-about ftco-no-pt img booking-section-custom">
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

<!-- GUI DANH GIA KHACH HANG-->

<section class="ftco-intro ftco-section ftco-no-pt review-index-cta">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <div class="img" style="background-image: url(images/bg_9.jpg);">
          <div class="overlay"></div>

          <h2>Chia sẻ trải nghiệm của bạn</h2>
          <p>Hãy kể lại hành trình của bạn tại Chương Mỹ. Những chia sẻ chân thật sẽ giúp người đến sau có thêm lựa chọn phù hợp.</p>
          
          <p class="mb-0">
            <a href="danhgia.php" class="btn btn-primary px-4 py-3">
              Gửi đánh giá 
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Footer-->
<footer id="lienhe" class="ftco-footer footer-custom bg-bottom" style="background-image: url(images/bg_16.png);">
  <div class="footer-overlay"></div>

  <div class="container">
    <div class="row mb-5">

      <!-- CỘT 1 -->
      <div class="col-md-3 pt-5">
        <div class="ftco-footer-widget pt-md-5 mb-4">
          <h2 class="ftco-heading-2">Chương Mỹ</h2>
          <p>
            Điểm đến gần Hà Nội với sự giao thoa giữa thiên nhiên, tâm linh,
            làng nghề truyền thống và những trải nghiệm nghỉ dưỡng cuối tuần.
          </p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft social-real">
  <li class="ftco-animate">
    <a href="https://facebook.com" target="_blank" aria-label="Facebook">
      <span class="fa-brands fa-facebook-f"></span>
    </a>
  </li>
  <li class="ftco-animate">
    <a href="https://zalo.me" target="_blank" aria-label="Zalo">
      <span class="fa-solid fa-comment-dots"></span>
    </a>
  </li>
  <li class="ftco-animate">
    <a href="https://instagram.com" target="_blank" aria-label="Instagram">
      <span class="fa-brands fa-instagram"></span>
    </a>
  </li>
</ul>
        </div>
      </div>

      <!-- CỘT 2 -->
      <div class="col-md-3 pt-5 border-left">
        <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Liên kết nhanh</h2>
          <ul class="list-unstyled">
            <li><a href="index.html#gioithieu" class="py-2 d-block">Giới thiệu</a></li>
            <li><a href="index.html#diadiemnoibat" class="py-2 d-block">Địa điểm nổi bật</a></li>
            <li><a href="index.html#tatcadiadiem" class="py-2 d-block">Tất cả địa điểm</a></li>
            <li><a href="index.html#goiylichtrinh" class="py-2 d-block">Gợi ý lịch trình</a></li>
            <li><a href="index.html#dangkytrai-nghiem" class="py-2 d-block">Đăng ký trải nghiệm</a></li>
          </ul>
        </div>
      </div>

      <!-- CỘT 3 -->
      <div class="col-md-3 pt-5 border-left">
        <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Trải nghiệm nổi bật</h2>
          <ul class="list-unstyled">
            <li><a href="nuitram.html" class="py-2 d-block">Khám phá Núi Trầm</a></li>
            <li><a href="chuatram.html" class="py-2 d-block">Vãn cảnh Chùa Trầm</a></li>
            <li><a href="chuatramgian.html" class="py-2 d-block">Tham quan Chùa Trăm Gian</a></li>
            <li><a href="langnghephuvinh.html" class="py-2 d-block">Làng nghề Phú Vinh</a></li>
            <li><a href="lasicafe.html" class="py-2 d-block">Cafe ngắm cảnh</a></li>
            <li><a href="homestay.html" class="py-2 d-block">Nghỉ dưỡng cuối tuần</a></li>
          </ul>
        </div>
      </div>

      <!-- CỘT 4 -->
      <div class="col-md-3 pt-5 border-left">
        <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Liên hệ</h2>
          <div class="block-23 mb-3">
            <ul>
              <li>
<span class="icon fa fa-map-marker"></span>
                <span class="text">Chương Mỹ, Hà Nội, Việt Nam</span>
              </li>
              <li>
                <a href="tel:0325439557">
                  <span class="icon fa fa-phone"></span>
                  <span class="text">+84 325 439 557</span>
                </a>
              </li>
              <li>
                <a href="mailto:trinhthihuong21@gmail.com">
                  <span class="icon fa fa-paper-plane"></span>
                  <span class="text">Trinhthihuong21@gmail.com</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12 text-center">
        <p class="footer-copy">
          © <script>document.write(new Date().getFullYear());</script> Khám phá Chương Mỹ. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  </svg>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="js/main.js"></script>



<!-- js cua loc dia diem tam linh, lang nghe -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const filterBtns = document.querySelectorAll(".filter-btn");
  const placeCards = document.querySelectorAll(".side-place-card");
  const mapPins = document.querySelectorAll(".map-pin");

  const stickyInfoTitle = document.getElementById("stickyInfoTitle");
  const stickyInfoDesc = document.getElementById("stickyInfoDesc");
  const stickyInfoImage = document.getElementById("stickyInfoImage");
  const stickyInfoLink = document.getElementById("stickyInfoLink");
  const stickyMapInner = document.getElementById("stickyMapInner");

  function activatePlace(placeKey, title, desc, image, link) {
    placeCards.forEach(card => {
      card.classList.toggle("active", card.dataset.place === placeKey);
    });

    mapPins.forEach(pin => {
      pin.classList.toggle("active", pin.dataset.place === placeKey);
    });

    if (stickyInfoTitle) stickyInfoTitle.textContent = title;
    if (stickyInfoDesc) stickyInfoDesc.textContent = desc;
    if (stickyInfoImage) stickyInfoImage.style.backgroundImage = `url('${image}')`;
    if (stickyInfoLink) stickyInfoLink.setAttribute("href", link);

    const zoomMap = {
      chuatram: "scale(1.2) translate(-6%, -4%)",
      chuatramgian: "scale(1.2) translate(-5%, 4%)",
      doibu: "scale(1.25) translate(-12%, 10%)",
      phuvinh: "scale(1.2) translate(-16%, -6%)",
      nuitram: "scale(1.18) translate(-4%, -2%)",
      island: "scale(1.24) translate(-18%, -10%)",
      lasi: "scale(1.24) translate(-20%, 0%)",
      hillstay: "scale(1.28) translate(-22%, -14%)"
    };

    if (stickyMapInner) {
      stickyMapInner.style.transform = zoomMap[placeKey] || "scale(1)";
    }
  }

  placeCards.forEach(card => {
    card.addEventListener("click", function (e) {
      const clickedLink = e.target.closest("a");
      if (clickedLink && clickedLink.classList.contains("btn")) return;

      activatePlace(
        this.dataset.place,
        this.dataset.title,
        this.dataset.desc,
        this.dataset.image,
        this.dataset.link
      );
    });
  });

  mapPins.forEach(pin => {
    pin.addEventListener("click", function () {
      const placeKey = this.dataset.place;
      const matchedCard = document.querySelector(`.place-card[data-place="${placeKey}"]`);
      if (!matchedCard) return;

      activatePlace(
        matchedCard.dataset.place,
        matchedCard.dataset.title,
        matchedCard.dataset.desc,
        matchedCard.dataset.image,
        matchedCard.dataset.link
      );
    });
  });

  filterBtns.forEach(btn => {
    btn.addEventListener("click", function () {
      filterBtns.forEach(item => item.classList.remove("active"));
      this.classList.add("active");

      const filter = this.dataset.filter;

      placeCards.forEach(card => {
        const matched = filter === "all" || card.dataset.category === filter;
        card.classList.toggle("hidden", !matched);
      });

      mapPins.forEach(pin => {
const matched = filter === "all" || pin.dataset.category === filter;
        pin.classList.toggle("hidden", !matched);
      });
    });
  });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const track = document.getElementById("timelineTrack");
  const slides = document.querySelectorAll(".timeline-slide");
  const prevBtn = document.getElementById("timelinePrev");
  const nextBtn = document.getElementById("timelineNext");

  let currentIndex = 0;
  const totalSlides = slides.length;

  function updateTimelineSlider() {
    track.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  prevBtn.addEventListener("click", function () {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateTimelineSlider();
  });

  nextBtn.addEventListener("click", function () {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateTimelineSlider();
  });
});
</script>


<script>
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('success') === '1') {
  document.getElementById('successMessage').style.display = 'block';

  // xoá ?success=1 sau khi hiện
  window.history.replaceState({}, document.title, window.location.pathname);
}
</script>




<!-- xem đánh giá -->
<script>
const reviewSlider = document.querySelector('.cm-review-list');

let isDown = false;
let startX;
let scrollLeft;

if (reviewSlider) {
  reviewSlider.addEventListener('mousedown', function(e) {
    isDown = true;
    reviewSlider.classList.add('dragging');
    startX = e.pageX - reviewSlider.offsetLeft;
    scrollLeft = reviewSlider.scrollLeft;
  });

  reviewSlider.addEventListener('mouseleave', function() {
    isDown = false;
    reviewSlider.classList.remove('dragging');
  });

  reviewSlider.addEventListener('mouseup', function() {
    isDown = false;
    reviewSlider.classList.remove('dragging');
  });

  reviewSlider.addEventListener('mousemove', function(e) {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - reviewSlider.offsetLeft;
    const walk = (x - startX) * 1.5;
    reviewSlider.scrollLeft = scrollLeft - walk;
  });
}
</script>



<!-- kéo chuột album-->
<script>
(function () {
  const gallery = document.querySelector('.gallery-drag-wrapper');
  if (!gallery) return;

  let galleryIsDown = false;
  let galleryStartX = 0;
  let galleryScrollLeft = 0;

  gallery.addEventListener('mousedown', function (e) {
    galleryIsDown = true;
    gallery.classList.add('dragging');
    galleryStartX = e.pageX - gallery.offsetLeft;
    galleryScrollLeft = gallery.scrollLeft;
  });

  gallery.addEventListener('mouseleave', function () {
    galleryIsDown = false;
    gallery.classList.remove('dragging');
  });

  gallery.addEventListener('mouseup', function () {
    galleryIsDown = false;
    gallery.classList.remove('dragging');
  });

  gallery.addEventListener('mousemove', function (e) {
    if (!galleryIsDown) return;
    e.preventDefault();

    const x = e.pageX - gallery.offsetLeft;
    const walk = (x - galleryStartX) * 1.5;
    gallery.scrollLeft = galleryScrollLeft - walk;
  });
})();
</script>

<!--GOOGLE <MAP TAT CA DIA DIEM-->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll(".filter-btn");
  const cards = document.querySelectorAll(".side-place-card");
  const pins = document.querySelectorAll(".map-pin");

  const infoImage = document.getElementById("stickyInfoImage");
  const infoTitle = document.getElementById("stickyInfoTitle");
  const infoDesc = document.getElementById("stickyInfoDesc");
  const infoLink = document.getElementById("stickyInfoLink");

  function updateInfo(data) {
    infoTitle.textContent = data.title;
    infoDesc.textContent = data.desc;
    infoImage.style.backgroundImage = `url('${data.image}')`;
    infoLink.href = data.link;

    cards.forEach(card => card.classList.remove("active"));
    pins.forEach(pin => pin.classList.remove("active"));

    document.querySelectorAll(`[data-id="${data.id}"]`).forEach(item => {
      item.classList.add("active");
    });
  }

  cards.forEach(card => {
    card.addEventListener("mouseenter", function () {
      updateInfo(this.dataset);
    });

    card.addEventListener("click", function (e) {
      if (!e.target.closest("a")) {
        updateInfo(this.dataset);
      }
    });
  });

  pins.forEach(pin => {
    pin.addEventListener("mouseenter", function () {
      updateInfo(this.dataset);
    });

    pin.addEventListener("click", function () {
      updateInfo(this.dataset);
    });
  });

  filterButtons.forEach(button => {
    button.addEventListener("click", function () {
      const filter = this.dataset.filter;

      filterButtons.forEach(btn => btn.classList.remove("active"));
      this.classList.add("active");

      let firstVisible = null;

      cards.forEach(card => {
        const match = filter === "all" || card.dataset.category === filter;
        card.style.display = match ? "flex" : "none";

        if (match && !firstVisible) {
          firstVisible = card;
        }
      });

      pins.forEach(pin => {
        const match = filter === "all" || pin.dataset.category === filter;
        pin.style.display = match ? "block" : "none";
      });

      if (firstVisible) {
        updateInfo(firstVisible.dataset);
      }
    });
  });

  if (cards.length > 0) {
    updateInfo(cards[0].dataset);
  }
});
</script>

<!-- Tiimf kiems-->
 <script>
document.querySelector('.search-property-1').addEventListener('submit', function() {
  let keyword = document.getElementById('destination-search').value.toLowerCase();

  let places = document.querySelectorAll('.side-place-card');

  places.forEach(function(place) {
    let title = place.getAttribute('data-title').toLowerCase();

    if (title.includes(keyword)) {
      place.style.display = 'flex';
    } else {
      place.style.display = 'none';
    }
  });

  // Scroll xuống phần địa điểm
  document.querySelector('.side-map-layout').scrollIntoView({ behavior: 'smooth' });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.querySelector(".main-navbar");
  const hero = document.querySelector(".hero");

  function updateNavbarColor() {
    if (!navbar || !hero) return;

    const heroBottom = hero.offsetTop + hero.offsetHeight;

    if (window.scrollY > heroBottom - 120) {
      navbar.classList.add("nav-dark");
    } else {
      navbar.classList.remove("nav-dark");
    }
  }

  window.addEventListener("scroll", updateNavbarColor);
  updateNavbarColor();
});
</script>




		</body>
		
		</html>