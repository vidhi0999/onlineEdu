<?php
session_start();
include('../php/database.php');

// include('./student-sidebar.php');
$currentUser = $_SESSION['username'];
// $id = $_SESSION['id'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}

$sql = "SELECT * from student where username='$currentUser'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!-- SIDEBAR -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <section id="sidebar">
        <div class="brand">
            <div class="logo">
                <img src="../images/E-logo.png" alt="">
                <div class="line"></div>
                OnlineEdu
            </div>
        </div>
        <ul class="side-menu top">
            <li>
                <a href="videos.php">
                    <i class='fa fa-video-camera'></i>
                    <span class="text">Video Lectures</span>
                </a>
            </li>
            <li>
                <a href="pdf.php">
                    <i class='fa fa-file-pdf-o'></i>
                    <span class="text">pdf</span>
                </a>
            </li>

            <li>
                <a href="./student-dashboard.php">
                    <i class='fa fa-arrow-left'></i>
                    <span class="text">back</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">

        <!-- NAVBAR -->
        <nav>

            <i class='fa fa-bars'></i>
            <form action="#">
                <div class="form-input">
                    Online Tutorial Portal
                </div>
            </form>

            <?php echo $row['username']; ?>

            <a href="#" class="profile">
                <?php
                if ($row['filename'] == "") {
                    ?>
                    <img src="../images/student/default.png">
                    <?php
                } else {
                    ?>
                    <?php
                    ?>
                    <img src='../images/student/<?php echo $row['filename']; ?>'>



                    <?php
                }
                ?>

            </a>
        </nav>

    </section>

    <script src="../js/script.js"></script>

</body>

</html>