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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My CSS -->
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">

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
                            <!-- <input type="hidden" name="studentid"> -->
                            <input type="hidden" name="studentid" value="<?php echo $row['id'] ?>">

                            <span class="details">Username</span>
                            <input type="text" name="name" value="<?php echo $currentUser ?>"
                                placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="text" name="email" value="<?php echo $row['email'] ?>"
                                placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Course Name</span>
                            <select name="coursename" id="">
                                <option value="#">-- Select Course --</option>
                                <?php
                                $sql = "SELECT * from course_request where student_id = '$row[id]' AND status = '1'";
                                $gotResults = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($gotResults)) {
                                    echo "<option value='" . $row['course_name'] . "'>" . $row['course_name'] . "</option>";
                                }
                                if (mysqli_num_rows($gotResults) == 0) {
                                    echo "<option value='#'>No Course Request</option>";
                                }
                                ?>

                            </select>
                            <!-- <input type="text" name="coursename" placeholder="Enter your email" required> -->
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

<?php
// require('../php/database.php');
// extract($_POST);

if (isset($_POST['submit'])) {
    if ($_POST['coursename'] != '#') {
        $studentid = $_POST['studentid'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $coursename = $_POST['coursename'];
        $sql2 = "SELECT * FROM course_request WHERE course_name = '$coursename' AND student_id = '$studentid'";
        $gotResults = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_array($gotResults);
        $course_id = $row['course_id'];
        $tutor_id = $row['tutor_id'];
        $message = $_POST['message'];
        $CreatedDate = date("Y-m-d");
        $sql3 = "INSERT into inquiries(student_id,username,email,course_id,course_name,tutor_id,message,delete_flag,date_created,status) VALUES('$studentid ','$name','$email','$course_id','$coursename','$tutor_id','$message','0','$CreatedDate','1')";
        $success2 = $conn->query($sql3);
        if ($success2) {
            echo "<script>
            swal({
                title: 'Success!',
                text: 'Inquiry Sent',
                icon: 'success',
                button: 'Ok',
            });
            </script>";
        } else {
            echo "<script>
            swal({
                title: 'Error!',
                text: 'Inquiry Not Sent',
                icon: 'error',
                button: 'Ok',
            });
            </script>";
        }
    } else {
        echo "<script>
        swal({
            title: 'Error!',
            text: 'Please select a course',
            icon: 'error',
            button: 'Ok',
        });
        </script>";
    }


    // $sql = "INSERT into inquiries 
    // (student_id,username,email,course_name,
    // message,date_created) VALUES
    // ('$studentid ','$name','$email','$coursename','$message','$CreatedDate')";
    // $success = $conn->query($sql);

    // $sql2 = "SELECT id,tutor_id from course_list Where name = '$coursename'";
    // $gotResults = mysqli_query($conn, $sql2);
    // $row = mysqli_fetch_array($gotResults);

    // $course_id = $row['id'];
    // $tutor_id = $row['tutor_id'];

    // $sql3 = "Update inquiries set course_id = '$course_id' ,tutor_id = '$tutor_id'  where course_name = '$coursename'";
    // $success2 = $conn->query($sql3);

    // if ($success && $success2) {
    //     echo "<script>
    //             swal({
    //                 title: 'Success!',
    //                 text: 'Inquiry sent successfully!',
    //                 icon: 'success',
    //                 button: 'Ok',
    //             }).then(function() {
    //                 window.location = 'inquiries.php';
    //             });
    //             </script>";
    // } else {
    //     echo "<script>
    //             swal({
    //                 title: 'Error!',
    //                 text: 'Something went wrong!',
    //                 icon: 'error',
    //                 button: 'Ok',
    //             }).then(function() {
    //                 window.location = 'inquiries.php';
    //             });
    //             </script>";


    // }
}
?>