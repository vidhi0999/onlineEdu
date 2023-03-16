<?php
include_once('../php/database.php');
if (isset($_POST['save_course'])) {
    $coursename = $_POST['course_name'];
    $description = $_POST['descrp'];
    $exp = $_POST['experience'];
    $images = $_POST["faculty_image"]['name'];
    $tutorname = $_POST['tutor'];
    if (file_exists("upload/" . $_FILES["faculty_image"]["name"])) 
    {
        $store=$_FILES["faculty_image"]["name"];
        $_SESSION['status']="Image already exists. '$store.'";
        header('Location:course-list.php');

    } 
    
    else {
        $query = "INSERT INTO course_list('name','description','experience','logo_path','tutor_name') VALUES('$coursename',' $description','$exp','$images', '$tutorname')";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . $_FILES["faculty_image"]["name"]);
            $_SESSION['success'] = "Course added";
            header('Location:course-list.php');
        } else {
            $_SESSION['success'] = "Course not added";
            header('Location:course-list.php');
        }
    }
}


?>