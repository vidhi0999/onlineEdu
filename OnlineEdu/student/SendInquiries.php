<?php
require('../php/database.php');
extract($_POST);
$sql = "INSERT into inquiries (student_id,username,email,course_name,message,date_created) VALUES('" . $id . "','" . $name . "','" . $email . "','" . $coursename . "','" . $message . "','" . date('Y-m-d') . "')";
$success = $conn->query($sql);


if (!$success) {
    die("Couldn't enter data: " . $conn->error);
}
echo "Thank You for Contacting Us. We will get back to you soon. ";
$conn->close();


?>