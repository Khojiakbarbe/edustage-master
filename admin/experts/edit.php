<?php

include "../connect.php";
if (empty($_SESSION['login'])) {
    header('location: admin/auth/login.php');
}

$id = $_GET['id'];

$pdoGet = $pdo->prepare("
SELECT * FROM `experts` WHERE id=$id
");
$pdoGet->execute();
$data = $pdoGet->fetch();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $comment = $_POST['comment'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $social = $_POST['social'];

    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $errors = array();
        $file_name = $image['name'];
        $file_size = $image['size'];
        $file_tmp = $image['tmp_name'];
        $file_type = $image['type'];
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../images/" . $file_name);
        } else {
            print_r($errors);
        }
    }


    $pdoStatement = $pdo->prepare("
    UPDATE `experts` SET `image`=:image,`name`=:name,`position`=:position,`comment`=:comment,`facebook`=:facebook,`twitter`=:twitter,`linkedin`=:linkedin,`social`=:social WHERE id=$id
    ");

    $pdoStatement->bindParam('image', $file_name);
    $pdoStatement->bindParam('name', $name);
    $pdoStatement->bindParam('position', $position);
    $pdoStatement->bindParam('comment', $comment);
    $pdoStatement->bindParam('facebook', $facebook);
    $pdoStatement->bindParam('twitter', $twitter);
    $pdoStatement->bindParam('linkedin', $linkedin);
    $pdoStatement->bindParam('social', $social);

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
                            <a class="sidebar-link active" href="../experts/index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Expert Trainers/edit</span>
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
                        <h1>Edit Skill</h1>
                    </div>
                    <div class="col-12 text-end mb-3">
                        <a class="btn btn-success btn-sm" href="index.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <form action="edit.php?id=<?= $data['id'] ?>" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="image">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" value="<?= $data['name'] ?>" type="text" id="name"
                                    name="name" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="position">position</label>
                                <input class="form-control" type="text" id="position" value="<?= $data['position'] ?>"
                                    name="position" placeholder="Enter position">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="comment">comment</label>
                                <input class="form-control" type="text" id="comment" name="comment"
                                    value="<?= $data['comment'] ?>" placeholder="Enter comment">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="facebook">facebook</label>
                                <input class="form-control" type="facebook" id="facebook"
                                    value="<?= $data['facebook'] ?>" name="facebook" placeholder="Enter facebook">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="twitter">Twitter</label>
                                <input class="form-control" type="text" value="<?= $data['twitter'] ?>" id="twitter"
                                    name="twitter">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="linkedin">linked-in</label>
                                <input class="form-control" value="<?= $data['linkedin'] ?>" type="text" id="linkedin"
                                    name="linkedin">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="social">One more</label>
                                <input class="form-control" type="text" value="<?= $data['social'] ?>" id="social"
                                    name="social" placeholder="Enter social">
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