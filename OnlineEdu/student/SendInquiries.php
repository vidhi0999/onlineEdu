<?php
require('../php/database.php');
extract($_POST);
$sql = "INSERT into inquiries (student_id,username,email,course_name,message,date_created) VALUES('" . $id . "','" . $name . "','" . $email . "','" . $coursename . "','" . $message . "','" . date('Y-m-d') . "')";
$success = $conn->query($sql);

// $sql2 = "SELECT id FROM course_list where name ='" . $coursename . "'";

// $result = $conn->query($sql2);


// $sql3 = "SELECT tutor_id FROM course_list where name ='" . $coursename . "'";

if (!$success) {
    die("Couldn't enter data: " . $conn->error);
}
echo "Thank You for Contacting Us. We will get back to you soon. ";
$conn->close();


?>