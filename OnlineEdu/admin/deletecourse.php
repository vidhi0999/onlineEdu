<?php
include('../php/database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $sql = "DELETE FROM course_list WHERE id='$id'";
    $sql = "UPDATE course_list SET delete_flag = '1' WHERE id='$id'";
    $sql2 = "UPDATE course_request SET delete_flag = '1' WHERE course_id='$id'";
    // $result = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        header("location:course-list.php");
    } else {
        echo "error in deleting";
    }
}

?>