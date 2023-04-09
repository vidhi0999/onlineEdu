<?php
session_start();
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}
include("../php/database.php");
$course_id = $_GET['id'];
$sql = $conn->query("SELECT * FROM course_list WHERE id = '$course_id'");
$row = $sql->fetch_assoc();
$tutor_id = $row['tutor_id'];
$sql2 = $conn->query("SELECT * FROM tutor_list WHERE id = '$tutor_id'");
$row2 = $sql2->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin</title>


</head>

<body>

    <?php
    include('./header.php');
    ?>

    <!-- CONTENT -->
    <section id="content">

        <!-- MAIN -->
        <main>
            <div class="courses">
                <div class="head-title">
                    <div class="left">
                        <h3>Add attachment</h3>
                    </div>
                </div>

                <hr>
                <div  id="form" tabindex="-1" role="dialog" >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">New attachment</h5>
                                    <a href="./course-attachment.php">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </a>
                                </div>

                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <!-- COURSSE NAME -->
                                        <!-- CHAPTER NAME, -->
                                        <!-- DESCRIPTION,  -->
                                        PDF / VIDEO
                                        <div class="form-group">
                                            <input type="text" value="<?php echo "$course_id";?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="CourseName">Course Name</label>
                                            <input type="text" value="<?php echo $row['name'];?>" name="course_name" class="form-control" id="courseName"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Chapter Name</label>
                                            <input type="text" name="ch-name" class="form-control" id="desc" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Chapter Description</label>
                                            <input type="text" name="ch-description" class="form-control" id="desc" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="courseImg">Course's Logo</label>
                                            <input type="file" name="course_image" id="course_image"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" name="save_course" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>