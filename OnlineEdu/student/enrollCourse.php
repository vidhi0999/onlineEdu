<?php

session_start();
include_once('../php/database.php');
$currentUser = $_SESSION['username'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}
if (empty($_POST['id'])) {
    header("Location:student-courses.php");
}

if (isset($_POST['course_id'])) {
    $id = $_POST['course_id'];
}
if (isset($_POST['enroll'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM course_list WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $course_name = $result['name'];
    $course_id = $result['id'];
    $tutor_id = $result['tutor_id'];
    $student_user = $_SESSION['username'];
    $sql2 = "SELECT * FROM student WHERE username='$student_user'";
    $query2 = mysqli_query($conn, $sql2);
    $result2 = mysqli_fetch_assoc($query2);
    $student_id = $result2['id'];
    $student_userName = $result2['username'];
    $sql3 = "INSERT INTO course_request(tutor_id,course_id,course_name,student_id,student_userName,status,delete_flag) VALUES('$tutor_id','$course_id','$course_name','$student_id','$student_userName','0','0')";
    if ($conn->query($sql3)) {
        // echo "done karo mee";
        header("location:student-courses.php");
    }

} else if (isset($_POST['cancel'])) {
    // echo "Cancelled";
    header("Location:student-courses.php");
}
?>
<html>

<head>
    <title>Enroll Course</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/studentCourse.css">
    <!-- <link rel="stylesheet" href="../css/enrollCourse.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="main-con">
        <div class="container">
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header flex-column">
                            <div class="icon-box">
                                <i class="material-icons" name="cross">&#xE5CD;</i>
                            </div>
                            <h4 class="modal-title w-100">Are you sure?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to enroll this course? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <form action="" method="post">
                                <button type="submit" class="btn btn-secondary" name="cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" name="enroll">Enroll</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php



?>