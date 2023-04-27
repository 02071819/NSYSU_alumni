<?php
include "connect.inc.php";

$query = mysqli_query($conn, "select * from categories");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NSYSU alumni30</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/top_icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet"> -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('assets/img/slide/首頁＿1280x720px.jpg');">
            <!-- <div class="carousel-container">
              <div class="carousel-content container">
              </div>
            </div> -->
            <!-- <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
              <path fill="#fff" fill-opacity="1" d="M0,192L20,208C40,224,80,256,120,240C160,224,200,160,240,128C280,96,320,96,360,117.3C400,139,440,181,480,181.3C520,181,560,139,600,122.7C640,107,680,117,720,133.3C760,149,800,171,840,192C880,213,920,235,960,229.3C1000,224,1040,192,1080,170.7C1120,149,1160,139,1200,154.7C1240,171,1280,213,1320,213.3C1360,213,1400,171,1420,149.3L1440,128L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path>
            </svg> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div id="navbar" class="navbar">
        <ul>
          <!-- <div class="head_icon">
            <img src="./assets/img/header_icon/test_headicon.png" alt="" class="head_icon_home">
            <li><a class="nav-link scrollto active" href="#hero">首頁</a></li>
          </div> -->
          <div class="head_icon">
            <img src="./assets/img/header_icon/activity_icon.png" alt="">
            <li><a class="nav-link scrollto" href="#services"><strong>活動資訊</strong></a></li>
          </div>
          <div class="head_icon">
            <img src="./assets/img/header_icon/money_icon.png" alt="" class="head_icon_money">
            <li><a class="nav-link scrollto" href="./goldflow.php"><strong>報名與繳費</strong></a></li>
          </div>
          <div class="head_icon">
            <img src="./assets/img/header_icon/photo_icon.png" alt="">
            <li class="dropdown"><a href="#photo"><span><strong>活動紀錄</strong></span> <i class="bi bi-chevron-down"></i></a>
              <!-- <ul>
                <?php
                while ($data = mysqli_fetch_assoc($query)) {
                  echo " 
                        <li><a href='year_photo.php?cat_id=" . $data['id'] . "'>" . $data['cname'] . "</a></li>
                    ";
                }
                ?>
              </ul> -->
            </li>
          </div>
          <div class="head_icon">
            <img src="./assets/img/header_icon/footer_icon.png" alt="" class="head_icon_footer">
            <li><a class="nav-link scrollto" href="#footer"><strong>關於我們</strong></a></li>
          </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </div><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <!-- <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-simple-smile" style="color: #20b38e;"></i>
              <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
              <p>校友總會屆數</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="bi bi-document-folder" style="color: #c042ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="50000" data-purecounter-duration="1" class="purecounter"></span>
              <p>校友人數</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="bi bi-live-support" style="color: #46d1ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="bi bi-users-alt-5" style="color: #ffb459;"></i>
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="services-activity d-flex justify-content-center ">
          <div class="services-description">
            <div class="section-title d-flex justify-content-center ">
              <img src="./assets/img/header_icon/activity_icon.png" class="col-lg-2 col-xl-2">
              <h2>活動資訊</h2>
            </div>
            <p>歲月沖淡了沙灘上的腳印，畢業30年後重聚，同窗敘舊，校園探秘，走入青春的時光迴廊之中~</p>
            <br><br><a href="./activity_info/activity.php" class="btn btn-light">了解更多</a>
          </div>
          <img src="assets/img/activity/活動資訊圖.jpg" alt="" class="services_activity_img">
        </div>
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= photo Section ======= -->
    <section id="photo" class="photo">
      <div class="container" data-aos="fade-up">
        <div class="photo-activity d-flex justify-content-center ">
          <img src="assets/img/photo_record/中山校區遠眺.jpg" alt="" class="photo_activity_img">
          <div class="photo-description">
            <div class="section-title d-flex justify-content-center ">
              <img src="./assets/img/header_icon/photo_icon.png" class="col-lg-2 col-xl-2">
              <h2>活動紀錄</h2>
            </div>
            <p>成立宗旨主要是服務及聯絡校友，增進校友情誼，並且能協助母校發展，進而達到服務社會的理想。</p>
            <br><br><a href="#" class="btn btn-light">敬啟期待</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <div class="section-title d-flex">
              <img src="./assets/img/header_icon/footer_icon.png" class="col-lg-2 col-xl-2">
              <h2>關於我們</h2>
            </div>
            <div class="footer-item">
              <p>
                <br>
                校友服務暨社會責任中心 (校友服務組)<br>
                電話 : (07) 525-5011~12<br>
                Email : alumni_service@mail.nsysu.edu.tw<br>
                地址 : 高雄市鼓山區蓮海路70號 (西子樓校友會館)<br>
              </p>
              <div class="social-links d-flex mt-5">
                <a href="https://asc.nsysu.edu.tw/" class="twitter" target="_blank"><img src="./assets/img/top_icon.png" class="back-to-top-img-link"></a>
                <a href="https://www.facebook.com/nsysu.alumni/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top align-items-center justify-content-center">
    <div class="back-to-top-item">
      <img src="./assets/img/top_icon.png" class="back-to-top-img">
      <p><strong>TOP</strong></p>
    </div>
    <!-- <i class="bi bi-arrow-up-short"></i> -->
  </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
