<?php
session_start();
include('./student-sidebar.php');
$currentUser = $_SESSION['username'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Courses</title>
    <link rel="stylesheet" href="../css/studentCourse.css">
</head>

<body>

    <section id="content">
        <!-- MAIN -->
        <main>
            <!-- Modal HTML -->
            <div class="head-title">
                <div class="left">
                    <h1>Courses</h1>
                </div>
            </div>
            <hr>
        </main>

    </section>

</body>

</html>