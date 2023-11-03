<?php
include "./admin/connect.php";

if (empty($_SESSION['login'])) {
  header('location: admin/auth/login.php');
}
/// course star
$pdoCourse = $pdo->prepare("
SELECT * FROM `courses`
");
$pdoCourse->execute();

//// experts start

$pdoExperts = $pdo->prepare("
SELECT * FROM `experts`
");
$pdoExperts->execute();

/// register

if (isset($_POST["register"])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $pdoRegister = $pdo->prepare("
  INSERT INTO `register`(`name`,`phone`,`email`)
  VALUES
  (:name,:phone,:email)
  ");

  $pdoRegister->bindParam('name', $name);
  $pdoRegister->bindParam('phone', $phone);
  $pdoRegister->bindParam('email', $email);

  $pdoRegister->execute();

}

////// testimonial

$pdoTestimonial = $pdo->prepare("
SELECT * FROM `testimonial`
");
$pdoTestimonial->execute();

/// newsletter
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
  <title>Edustage Education</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
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
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt="" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin/courses/index.php">Cruds</a>
              </li>
              <li class="nav-item submenu dropdown">
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

  <!--================ Start Home Banner Area =================-->
  <section class="home_banner_area">
    <div class="banner_inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="banner_content text-center">
              <p class="text-uppercase">
                Best online education service In the world
              </p>
              <h2 class="text-uppercase mt-4 mb-5">
                One Step Ahead This Season
              </h2>
              <div>
                <a href="#" class="primary-btn2 mb-3 mb-sm-0">learn more</a>
                <a href="#" class="primary-btn ml-sm-3 ml-0">see course</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Home Banner Area =================-->

  <!--================ Start Feature Area =================-->
  <section class="feature_area section_gap_top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Awesome Feature</h2>
            <p>
              Replenish man have thing gathering lights yielding shall you
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="icon"><span class="flaticon-student"></span></div>
            <div class="desc">
              <h4 class="mt-3 mb-2">Scholarship Facility</h4>
              <p>
                One make creepeth, man bearing theira firmament won't great
                heaven
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="icon"><span class="flaticon-book"></span></div>
            <div class="desc">
              <h4 class="mt-3 mb-2">Sell Online Course</h4>
              <p>
                One make creepeth, man bearing theira firmament won't great
                heaven
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="icon"><span class="flaticon-earth"></span></div>
            <div class="desc">
              <h4 class="mt-3 mb-2">Global Certification</h4>
              <p>
                One make creepeth, man bearing theira firmament won't great
                heaven
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Feature Area =================-->

  <!--================ Start Popular Courses Area =================-->
  <div class="popular_courses">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Our Popular Courses</h2>
            <p>
              Replenish man have thing gathering lights yielding shall you
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single course -->
        <div class="col-lg-12">
          <div class="owl-carousel active_course">
            <?php while ($course = $pdoCourse->fetch()) {
              ; ?>
              <div class="single_course">
                <div class="course_head">
                  <img class="img-fluid" src="admin/images/<?= $course['image'] ?>" style="height: 200px !important;"
                    alt="" />
                </div>
                <div class="course_content">
                  <span class="price">$
                    <?= $course['price'] ?>
                  </span>
                  <span class="tag mb-4 d-inline-block">
                    <?= $course['category'] ?>
                  </span>
                  <h4 class="mb-3">
                    <a href="course-details.php?id=<?= $course['id'] ?>">
                      <?= $course['title'] ?>
                    </a>
                  </h4>
                  <p>
                    <?= $course['text'] ?>
                  </p>
                  <div
                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                    <div class="authr_meta">
                      <img style="width: 30px !important;height: 30px !important; border-radius: 50%;"
                        src="admin/images/<?= $course['teacher_img'] ?>" alt="" />
                      <span class="d-inline-block ml-2">
                        <?= $course['name'] ?>
                      </span>
                    </div>
                    <div class="mt-lg-0 mt-3">
                      <span class="meta_info mr-4">
                        <a href="#"> <i class="ti-user mr-2"></i>
                          <?= $course['students'] ?>
                        </a>
                      </span>
                      <span class="meta_info"><a href="#"> <i class="ti-heart mr-2"></i>
                          <?= $course['likes'] ?>
                        </a></span>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
            ; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================ End Popular Courses Area =================-->

  <!--================ Start Registration Area =================-->
  <div class="section_gap registration_area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="row clock_sec clockdiv" id="clockdiv">
            <div class="col-lg-12">
              <h1 class="mb-3">Register Now</h1>
              <p>
                There is a moment in the life of any aspiring astronomer that
                it is time to buy that first telescope. It’s exciting to think
                about setting up your own viewing station.
              </p>
            </div>
            <div class="col clockinner1 clockinner">
              <h1 class="days">150</h1>
              <span class="smalltext">Days</span>
            </div>
            <div class="col clockinner clockinner1">
              <h1 class="hours">23</h1>
              <span class="smalltext">Hours</span>
            </div>
            <div class="col clockinner clockinner1">
              <h1 class="minutes">47</h1>
              <span class="smalltext">Mins</span>
            </div>
            <div class="col clockinner clockinner1">
              <h1 class="seconds">59</h1>
              <span class="smalltext">Secs</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-1">
          <?= include "coursesforfee.php" ?>
        </div>
      </div>
    </div>
  </div>
  <!--================ End Registration Area =================-->

  <!--================ Start Trainers Area =================-->
  <section class="trainer_area section_gap_top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Our Expert Trainers</h2>
            <p>
              Replenish man have thing gathering lights yielding shall you
            </p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center d-flex align-items-center">
        <?php while ($expert = $pdoExperts->fetch()) {
          ; ?>
          <div style="display: grid; grid-row: 1fr 1fr !important;" class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div style="height: 350px !important;" class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" style="height: 100% !important; width:100% !important"
                src="admin/images/<?= $expert['image'] ?>" alt="" />
            </div>
            <div style="display: grid; grid-auto-rows: 1fr 1fr 1fr 1fr;" class="meta-text text-sm-center">
              <h4>
                <?= $expert['name'] ?>
              </h4>
              <p class="designation">
                <?= $expert['design'] ?>
              </p>
              <div class="mb-2">
                <p>
                  <?= $expert['comment'] ?>
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="https://facebook.com/<?= $expert['facebook'] ?>"><i class="ti-facebook"></i></a>
                <a href="https://twitter.com/<?= $expert['twitter'] ?>"><i class="ti-twitter"></i></a>
                <a href="https://linked-in/<?= $expert['linkedin'] ?>"><i class="ti-linkedin"></i></a>
                <a href="https://pinterest.com/<?= $expert['social'] ?>"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!--================ End Trainers Area =================-->

  <!--================ Start Events Area =================-->
  <div class="events_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3 text-white">Upcoming Events</h2>
            <p>
              Replenish man have thing gathering lights yielding shall you
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="single_event position-relative">
            <div class="event_thumb">
              <img src="img/event/e1.jpg" alt="" />
            </div>
            <div class="event_details">
              <div class="d-flex mb-4">
                <div class="date"><span>15</span> Jun</div>

                <div class="time-location">
                  <p>
                    <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                  </p>
                  <p>
                    <span class="ti-location-pin mr-2"></span> Hilton Quebec
                  </p>
                </div>
              </div>
              <p>
                One make creepeth man for so bearing their firmament won't
                fowl meat over seas great
              </p>
              <a href="#" class="primary-btn rounded-0 mt-3">View Details</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="single_event position-relative">
            <div class="event_thumb">
              <img src="img/event/e2.jpg" alt="" />
            </div>
            <div class="event_details">
              <div class="d-flex mb-4">
                <div class="date"><span>15</span> Jun</div>

                <div class="time-location">
                  <p>
                    <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                  </p>
                  <p>
                    <span class="ti-location-pin mr-2"></span> Hilton Quebec
                  </p>
                </div>
              </div>
              <p>
                One make creepeth man for so bearing their firmament won't
                fowl meat over seas great
              </p>
              <a href="#" class="primary-btn rounded-0 mt-3">View Details</a>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="text-center pt-lg-5 pt-3">
            <a href="#" class="event-link">
              View All Event <img src="img/next.png" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================ End Events Area =================-->

  <!--================ Start Testimonial Area =================-->
  <div class="testimonial_area section_gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Client say about me</h2>
            <p>
              Replenish man have thing gathering lights yielding shall you
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="testi_slider owl-carousel">
          <?php while ($testimonial = $pdoTestimonial->fetch()) {
            ; ?>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img style="height: 100px; width: 100px;" src="admin/images/<?= $testimonial['image'] ?>" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4><?= $testimonial['name'] ?></h4>
                    <p><?= $testimonial['comment'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php }
          ; ?>
        </div>
      </div>
    </div>
  </div>
  <!--================ End Testimonial Area =================-->

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
          <div class="form-wrap" id="m_embed_signup">
            <form action="index.php" method="post" class="form-inlin">
              <input class="form-control" name="email" placeholder="Your Email Address"
                 required="" type="email" />
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