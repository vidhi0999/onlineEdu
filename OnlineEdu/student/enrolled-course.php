<?php
session_start();
include('../php/database.php');
include('./student-sidebar.php');
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

    <link rel="stylesheet" href="../css/enrolled-course.css">


    <style>

    </style>

</head>

<body>

    <!-- CONTENT -->
    <section id="content">

        <main>
            <section id="pdf">
                <div class=" head-title">
                    <div class="left">
                        <h1>STUDY MATERIAL</h1>
                    </div>
                </div>
                <hr>
                <br>
                <?php

                $chapter = 1;
                $course_id = $_GET['id'];
                $_SESSION['course_id'] = $_GET['id'];
                $courseID = $_SESSION['course_id'];
                $sql = "SELECT * FROM course_attachment WHERE course_id = '$courseID'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    $pdf_src = "../course-pdf/" . $row['filename']
                        ?>

                    <div class="archive">
                        <article class=" article">
                            <!-- <div class="image"> -->
                            <embed src='<?php echo $pdf_src; ?>' type="application/pdf" border-radius="20px" width="100%"
                                height="350">
                            <!-- </div> -->
                        </article>

                        <article class="article">

                            <h2 style="margin-top:10px">Chapter:
                                <?php echo $chapter . " " . $row['ch_name']; ?>
                            </h2>
                            <br>
                            <hr>

                            <br>
                            <p>Description:
                                <?php echo $row['ch_description']; ?>
                            </p>
                        </article>


                    </div>
                    <?php
                    $chapter++;

                }
                ?>
                </div>
            </section>
            <br>
            <br>
            <br>


            <section id="video">
                <!-- <main> -->
                <!-- Modal HTML -->
                <div class="head-title">
                    <div class="left">
                        <h1>VIDEO LECTURES</h1>
                    </div>
                </div>
                <hr>
                <br>

                <div class="archive">
                    <article class="article">
                        <div class="image">
                        </div>
                    </article>

                    <article class="article">
                    </article>
                </div>

                <!-- </main> -->
            </section>

        </main>

    </section>

    <script src="../js/script.js"></script>

</body>

</html>