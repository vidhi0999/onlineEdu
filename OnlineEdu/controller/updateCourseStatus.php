<?php
include_once('../php/database.php');
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    $sql = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0  order by c.`name` asc ");

    $row = $result->fetch_assoc();

    if ($row['status'] == 0) {
        $update = mysqli_query($conn, "UPDATE course_list SET status = 1 where id='$course_id'");
    } else if ($row["status"] == 1) {
        $update = mysqli_query($conn, "UPDATE course_list SET status =0 where id='$course_id'");
    }

    header('location: course-list.php');
}
?>