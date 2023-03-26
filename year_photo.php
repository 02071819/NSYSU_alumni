<?php
include "function.php";
include "connect.inc.php";

session_start();
$query = mysqli_query($conn, "select * from categories");
$cat_id = mysqli_real_escape_string($conn, $_GET['cat_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Year_Photo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/newPhoto.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mamba
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="index.php">中山大學校友會</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.php">首頁</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#about">關於我們</a></li>
                    <li><a class="nav-link scrollto" href="#services">活動資訊</a></li> -->
                    <li class="dropdown"><a href="#portfolio"><span>活動相簿</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <!-- <li><a href="#">81年次</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">82年次</a></li>
              <li><a href="#">83年次</a></li>
              <li><a href="#">84年次</a></li> -->
                            <?php
                            while ($data = mysqli_fetch_assoc($query)) {
                                echo " 
                        <li><a href='year_photo.php?cat_id=" . $data['id'] . "'>" . $data['cname'] . "</a></li>
                    ";
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#team">報名與繳費</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="newPhoto">
        <div class="Indexrow">
            <?php
            $get_photo = get_photo($conn, '', $cat_id);
            if (count($get_photo) > 0) {
                foreach ($get_photo as $list) { ?>
                    <div class="itemouter">
                        <div class="Indexcol">
                            <div class="imgBx">
                                <img src="./admin/assets/images/<?php echo $list['pimage'] ?>">
                            </div>

                        </div>
                        <div class="details">
                            <h4><?php echo $list['pname'] ?></h4>
                        </div>
                    </div>
            <?php }
            } else {
                echo "無此照片 !";
            }
            ?>

        </div>
    </div>
</body>

</html>