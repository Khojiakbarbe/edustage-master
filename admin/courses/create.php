<?php
include '../connect.php';
if (empty($_SESSION['login'])) {
    header('location: admin/auth/login.php');
}

if (isset($_POST['submit'])) {
    $price = $_POST['price'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $name = $_POST['name'];
    $students = $_POST['students'];
    $likes = $_POST['likes'];
    $from_time = $_POST['from_time'];
    $until_time = $_POST['until_time'];

    if (isset($_FILES['image1']) && isset($_FILES['image2'])) {
        $image1 = $_FILES['image1'];
        $image2 = $_FILES['image2'];
        $errors = array();

        // Функция для загрузки изображения
        function uploadImage($image, $targetDirectory)
        {
            $file_name = $image['name'];
            $file_tmp = $image['tmp_name'];
            $destination = $targetDirectory . $file_name;

            if (move_uploaded_file($file_tmp, $destination)) {
                return $file_name; // Возвращаем имя загруженного файла
            } else {
                return "Error while uploading the file.";
            }
        }

        // Загружаем первое изображение
        $result1 = uploadImage($image1, "../images/");
        if (is_string($result1)) {
            $errors[] = "Image 1: " . $result1;
        }

        // Загружаем второе изображение
        $result2 = uploadImage($image2, "../images/");
        if (is_string($result2)) {
            $errors[] = "Image 2: " . $result2;
        }

        if (empty($errors)) {
            // Оба изображения успешно загружены
            echo "Both images uploaded successfully.";
        } else {
            // Вывод ошибок, если они есть
            print_r($errors);
        }
    }


    $pdoStatement = $pdo->prepare("
    INSERT INTO `courses`
    (`image`, `price`, `category`, `from_time`,`until_time`, `title`, `text`, `teacher_img`, `name`, `students`, `likes`)
     VALUES 
    (:image,:price,:category,:from_time,:until_time, :title,:text,:teacher_img,:name,:students,:likes)
    ");

    $pdoStatement->bindParam('image', $result1);
    $pdoStatement->bindParam('teacher_img', $result2);
    $pdoStatement->bindParam('price', $price);
    $pdoStatement->bindParam('category', $category);
    $pdoStatement->bindParam('title', $title);
    $pdoStatement->bindParam('text', $text);
    $pdoStatement->bindParam('name', $name);
    $pdoStatement->bindParam('students', $students);
    $pdoStatement->bindParam('likes', $likes);
    $pdoStatement->bindParam('from_time', $from_time);
    $pdoStatement->bindParam('until_time', $until_time);

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
    <title>Category</title>
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
                                <span class="hide-menu">Courses/create</span>
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
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-12 text-end mb-3">
                        <a class="btn btn-success btn-sm" href="index.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <form action="create.php" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="image1">Image</label>
                                <input class="form-control" type="file" id="image1" name="image1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="price">Price</label>
                                <input class="form-control" type="text" id="price" name="price"
                                    placeholder="Enter price">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category">Category</label>
                                <input class="form-control" type="text" id="category" name="category"
                                    placeholder="Enter category">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="title">title</label>
                                <input class="form-control" type="text" id="title" name="title"
                                    placeholder="Enter title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="text">text</label>
                                <input class="form-control" type="text" id="text" name="text" placeholder="Enter text">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image2">Teacher Image</label>
                                <input class="form-control" type="file" id="image2" name="image2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name">Teacher Name</label>
                                <input class="form-control" type="text" id="name" value="0" name="name"
                                    placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="students">Students</label>
                                <input class="form-control" type="number" id="students" name="students"
                                    placeholder="Enter students">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="likes">Likes</label>
                                <input class="form-control" type="number" id="likes" value="0" name="likes"
                                    placeholder="Enter likes">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="from_time">from_time</label>
                                <input class="form-control" type="number" id="from_time" value="0" name="from_time"
                                    placeholder="Enter from_time">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="until_time">until_time</label>
                                <input class="form-control" type="number" id="until_time" value="0" name="until_time"
                                    placeholder="Enter until_time">
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