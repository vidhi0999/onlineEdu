<?php
include('../php/database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM course_list WHERE id='$id'";
    // $result = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        header("location:course-list");
    } else {
        echo "error in deleting";
    }
}

?>