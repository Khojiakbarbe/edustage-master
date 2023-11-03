<?php
include "admin/connect.php";
$pdoCourse = $pdo->prepare("
SELECT * FROM `courses`
");
$pdoCourse->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="register_form">
        <h3>Courses for Free</h3>
        <p>It is high time for learning</p>
        <form class="form_area" action="index.php" method="post">
            <div class="row">
                <div class="col-lg-12 form_group">
                    <input name="name" placeholder="Your Name" required="" type="text" />
                    <input name="phone" placeholder="Your Phone Number" required="" type="number" />
                    <input name="email" placeholder="Your Email Address"
                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required="" type="email" />
                </div>
                <div class="col-lg-12 text-center">
                    <button type="submit" name="register" class="primary-btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>