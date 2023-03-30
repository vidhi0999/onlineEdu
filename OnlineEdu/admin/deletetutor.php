<?php
include('../php/database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM tutor_list WHERE id='$id'";
    $sql2 = "DELETE FROM course_list WHERE tutor_id='$id'";

    $sql = "DELETE FROM tutor_meta WHERE tutor_id='$id'";

    // $result = mysqli_query($conn, $sql);
    if ($conn->query($sql1) === TRUE) {
        if ($conn->query($sql2) === TRUE) {
            if ($conn->query($sql) === TRUE) {
                header("location:tutor-list.php");
            }
        }
    } else {
        echo "Tutor not deleted";
    }
}

?>