<?php
include_once('../php/database.php');
// if (isset($_POST['save_course'])) {
//     $coursename = $_POST['course_name'];
//     $description = $_POST['descrp'];
//     $exp = $_POST['experience'];
//     $images = $_POST["faculty_image"]['name'];
//     if (file_exists("upload/" . $_FILES["faculty_image"]["name"])) 
//     {
//         $store=$_FILES["faculty_image"]["name"];
//         $_SESSION['status']="Image already exists. '$store.'";
//         header('Location:course-list.php');

//     } 
    
//     else {
//         $query = "INSERT INTO course_list('name','description','experience','logo_path') VALUES('$coursename',' $description','$exp','$images')";
//         $query_run = mysqli_query($conn, $query);
//         if ($query_run) {
//             move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . $_FILES["faculty_image"]["name"]);
//             $_SESSION['success'] = "Course added";
//             header('Location:course-list.php');
//         } else {
//             $_SESSION['success'] = "Course not added";
//             header('Location:course-list.php');
//         }
//     }
// }
if(isset($_POST['save_course'])){
    // header("location:course-list.php?error = Done karo ne");
    // echo "done kaeo en";
    $tutor_id = $_POST['tutor'];
    $coursename = $_POST['course_name'];
    $description = $_POST['descrp'];
    $exp = $_POST['experience'];
    // $images = $_FILES["faculty_image"]['name'];
    $CreatedDate = date("Y-m-d");
    $UpdateDate = date("Y-m-d");
    // $target = "upload/".basename($images);
    // $sql = "INSERT INTO course_list("
    $sql = "INSERT INTO course_list(tutor_id,name,logo,description,experience,status,delete_flag,date_created,date_updated) VALUES('$tutor_id','$coursename','1.jpg','$description','$exp','0','0','$CreatedDate','$UpdateDate')";
    if($conn->query($sql)===TRUE){
        // header('Location:course-list.php');
        echo '<script>alert("Couser added")</script>';
        echo "done";
    }else{
        // header('Location:course-list.php');
        echo '<script>alert("Couser not added")</script>';
    }
}


?>