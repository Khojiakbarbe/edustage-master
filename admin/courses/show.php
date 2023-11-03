<?php
include('../connect.php');
if (empty($_SESSION['login'])) {
    header('location: admin/auth/login.php');
}

$id = $_GET['id'];

$pdoStatement = $pdo->prepare("
    SELECT * FROM `courses` WHERE id=$id  
");

if (!$pdoStatement->execute()) {
    echo 'xatolik bor';
}

$data = $pdoStatement->fetch();
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
    <title>Show</title>
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
                            <a class="sidebar-link active" href="../courses/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Courses/show</span>
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
                                <span class="hide-menu">News Letter</span>
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
                        <h1>
                            <?= $data['category'] ?>
                        </h1>
                        <a href="index.php">
                            <button class="btn btn-danger text-white">
                                Back
                            </button>
                        </a>
                    </div>
                    <div class="col-12 text-end mb-3">
                        <a class="btn btn-success btn-sm" href="index.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered text-center">
                            <th>Image</th>
                            <th class="d-flex justify-content-center align-items-center mb-5">
                                <img src="../images/<?= $data['image'] ?>" width="300">
                            </th>
                            <tr>
                                <th>ID</th>
                                <td>
                                    <?= $data['id'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <?= $data['category'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>title</th>
                                <td>
                                    <?= $data['title'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Pirce</th>
                                <td>
                                    $
                                    <?= $data['price'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Text</th>
                                <td>
                                    <?= $data['text'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>teacher Image</th>
                                <td>
                                    <img src="../images/<?= $data['teacher_img'] ?>" width="300">
                                </td>
                            </tr>
                            <tr>
                                <th>Teacher Name</th>
                                <td>
                                    <?= $data['name'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Students</th>
                                <td>
                                    <?= $data['students'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Like</th>
                                <td>
                                    <?= $data['likes'] ?>
                                </td>
                            </tr>
                        </table>
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