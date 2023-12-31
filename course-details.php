<?php
include "admin/connect.php";

if (empty($_SESSION['login'])) {
  header('location: admin/auth/login.php');
}

$id = $_GET['id'];
$pdoCourse = $pdo->prepare("
SELECT * FROM `courses` WHERE id=$id
");

$pdoCourse->execute();
$data = $pdoCourse->fetch();
if (isset($_POST["newsletter"])) {
  $email = $_POST['email'];
  $postEmail = $pdo->prepare("
  INSERT INTO `newsletter`(`email`)VALUES(:email)
  ");
  $postEmail->bindParam("email", $email);
  $postEmail->execute();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Courses Details</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />

  <style>
    .primary-btn2:hover {
      color: #002347 !important;
    }
  </style>
</head>

<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area white-header">
    <div class="main_menu">
      <div class="search_input" id="search_input_box">
        <div class="container">
          <form class="d-flex justify-content-between" method="" action="">
            <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
            <button type="submit" class="btn"></button>
            <span class="ti-close" id="close_search" title="Close Search"></span>
          </form>
        </div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand" href="index.php">
            <img class="logo-2" src="img/logo2.png" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin/courses/index.php">Cruds</a>
              </li>
              <li class="nav-item submenu dropdown active">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="courses.php">Courses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="elements.php">Elements</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="single-blog.php">Blog Details</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin/auth/logOut.php">Log Out</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link search" id="search">
                  <i class="ti-search"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->

  <!--================Home Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="banner_content text-center">
              <h2>Course Details</h2>
              <div class="page_link">
                <a href="index.php">Home</a>
                <a href="courses.php">Courses</a>
                <a href="course-details.php">Courses Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================ Start Course Details Area =================-->
  <section class="course_details_area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 course_details_left">
          <div class="main_image">
            <img class="img-fluid" style="height: 500px; width:600px" src="admin/images/<?= $data['image'] ?>" alt="">
          </div>
          <div class="content_wrapper">
            <h4 class="title">
              <?= $data['title'] ?>
            </h4>
            <div class="content">
              <?= $data['text'] ?>
            </div>

          </div>
        </div>


        <div class="col-lg-4 right-contents">
          <ul>
            <li>
              <a class="justify-content-between d-flex" href="#">
                <p>Trainer’s Name</p>
                <span class="or">
                  <?= $data['name'] ?>
                </span>
              </a>
            </li>
            <li>
              <a class="justify-content-between d-flex" href="#">
                <p>Course Fee </p>
                <span>$
                  <?= $data['price'] ?>
                </span>
              </a>
            </li>
            <li>
              <a class="justify-content-between d-flex" href="#">
                <p>Available Seats </p>
                <span>
                  <?= $data['students'] ?>
                </span>
              </a>
            </li>
            <li>
              <a class="justify-content-between d-flex" href="#">
                <p>Schedule </p>
                <span>from
                  <?= $data['from_time'] ?>am to
                  <?= $data['until_time'] ?>pm
                </span>
              </a>
            </li>
          </ul>
          <button class="primary-btn2 text-uppercase enroll rounded-0 text-white">Enroll the course</button>

        </div>
      </div>
    </div>
  </section>
  <!--================ End Course Details Area =================-->

  <!--================ Start footer Area  =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" >
            <form action="course-details.php" method="post" class="form-inlin">
              <input class="form-control" name="email" placeholder="Your Email Address" required="" type="email" />
              <button type="submit" name="newsletter" class="btn btn-warning">
                subscribe
              </button>

            </form>
          </div>
        </div>
      </div>
      <div class="row footer-bottom d-flex justify-content-between">
        <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
            class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        <div class="col-lg-4 col-sm-12 footer-social">
          <a href="#"><i class="ti-facebook"></i></a>
          <a href="#"><i class="ti-twitter"></i></a>
          <a href="#"><i class="ti-dribbble"></i></a>
          <a href="#"><i class="ti-linkedin"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/owl-carousel-thumb.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/theme.js"></script>
</body>

</html>