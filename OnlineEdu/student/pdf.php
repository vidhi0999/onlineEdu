<?php
// session_start();
include('enrolled-course.php');
$currentUser = $_SESSION['username'];
// $id = $_SESSION['id'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}

$sql = "SELECT * from student where username='$currentUser'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/updateprofile.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My CSS -->
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">

    <!-- <link rel="stylesheet" href="../css/studentCourse.css"> -->
</head>

<body>
    <section id="content">
        <!-- MAIN -->
        <main>
            <!-- Modal HTML -->
            <div class="head-title">
                <div class="left">
                    <h1>STUDY MATERIAL</h1>
                </div>
            </div>
            <hr>
        </main>

    </section>

    <script src="../js/script.js"></script>

</body>

</html>