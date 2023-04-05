<?php
session_start();
include('./student-sidebar.php');
$currentUser = $_SESSION['username'];
// $id = $_SESSION['id'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}


$sql = "SELECT * from student where username='$currentUser'";
$gotResults = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($gotResults);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/updateprofile.css">
    <!-- <link rel="stylesheet" href="../css/studentCourse.css"> -->
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="title">Inquiries</div>
            <div class="content">

                <form method="post" action="">

                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Name</span>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="text" name="email" placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Course Name</span>
                            <input type="text" name="coursename" placeholder="Enter your email" required>
                        </div>
                        <label>Message</label>
                        <textarea id="subject" name="message" placeholder="Write something.."
                            style="height:100px;width:200px"></textarea>
                    </div>
                    <div class="button">
                        <input type="submit" name="submit" value="SEND">
                    </div>
                </form>

            </div>
        </div>
        </main>
        </section>
        <script src="../js/script.js"></script>

</body>

</html>