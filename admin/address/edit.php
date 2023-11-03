<?php

include "../connect.php";

if (empty($_SESSION['login'])) {
    header('location: admin/auth/login.php');
}
;

$id = $_GET['id'];

$pdoGet = $pdo->prepare("
SELECT * FROM `address` WHERE id=$id
");
$pdoGet->execute();
$data = $pdoGet->fetch();

if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    $street = $_POST['street'];
    $phone = $_POST['phone'];
    $day_from = $_POST['day_from'];
    $day_until = $_POST['day_until'];
    $call_time_from = $_POST['call_time_from'];
    $call_time_until = $_POST['call_time_until'];
    $email = $_POST['email'];



    $pdoStatement = $pdo->prepare("
    UPDATE `address` SET `address`=:address,`street`=:street,`phone`=:phone,`day_from`=:day_from,`day_until`=:day_until,`call_time_from`=:call_time_from,`call_time_until`=:call_time_until,`email`=:email WHERE id=$id
    ");

    $pdoStatement->bindParam('address', $address);
    $pdoStatement->bindParam('street', $street);
    $pdoStatement->bindParam('phone', $phone);
    $pdoStatement->bindParam('day_from', $day_from);
    $pdoStatement->bindParam('day_until', $day_until);
    $pdoStatement->bindParam('call_time_from', $call_time_from);
    $pdoStatement->bindParam('call_time_until', $call_time_until);
    $pdoStatement->bindParam('email', $email);

    if ($pdoStatement->execute())
        header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="../../index.php" class="text-nowrap logo-img w-100">
                        <button class='btn btn-primary w-100' style="font-size: large;">Home</button>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">CRUDS</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../courses/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Courses</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../register/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Register</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../experts/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Expert Trainers</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../testimonial/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">testimonial</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../address/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Address</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../newsletter/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">News Lettr</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../messages/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Messages</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../auth/logOut.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-login"></i>
                                </span>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="body-wrapper">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Edit Skill</h1>
                    </div>
                    <div class="col-12 text-end mb-3">
                        <a class="btn btn-success btn-sm" href="index.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <form action="edit.php?id=<?= $data['id'] ?>" method="post" autocomplete="off">
                            <div class="mb-3">
                                <label class="form-label" for="address">Address</label>
                                <input class="form-control" value="<?= $data['address'] ?>" type="text" id="address"
                                    name="address" placeholder="Enter address">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="street">street</label>
                                <input class="form-control" type="text" id="street" value="<?= $data['street'] ?>"
                                    name="street" placeholder="Enter street">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">phone</label>
                                <input class="form-control" type="text" id="phone" name="phone"
                                    value="<?= $data['phone'] ?>" placeholder="Enter phone">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="day_from">day_from</label>
                                <input class="form-control" type="text" id="day_from" value="<?= $data['day_from'] ?>"
                                    name="day_from" placeholder="Enter day_from">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="day_until">day_until</label>
                                <input class="form-control" type="text" value="<?= $data['day_until'] ?>" id="day_until"
                                    name="day_until">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="call_time_from">Call time from (am)</label>
                                <input class="form-control" value="<?= $data['call_time_from'] ?>" type="number"
                                    id="call_time_from" name="call_time_from">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="call_time_until">Call time until (pm)</label>
                                <input class="form-control" type="number" value="<?= $data['call_time_until'] ?>"
                                    id="call_time_until" name="call_time_until" placeholder="Enter call_time_until">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="text" value="<?= $data['email'] ?>" id="email"
                                    name="email" placeholder="Enter email">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="../assets/js/dashboard.js"></script>
</body>

</html>