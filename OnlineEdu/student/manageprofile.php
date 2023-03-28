<?php
session_start();
include_once('../php/database.php');
include('./student-sidebar.php');

$currentUser = $_SESSION['username'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php"); 
}
$sql = "SELECT * from student where username='$currentUser'";
$gotResults = mysqli_query($conn, $sql);

// if ($gotResults) {
//     if (mysqli_num_rows($gotResults) > 0) {
$row = mysqli_fetch_array($gotResults);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/updateprofile.css">

    <title>Student-Manage profile</title>
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="title">Complete your Profile</div>
            <div class="content">

                <form method="post" action="upload.php" enctype="multipart/form-data">

                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="fullname" placeholder="Enter your name" required
                                value="<?php echo $row['fullname']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" name="username" placeholder="Enter your username" required
                                value="<?php echo $row['username']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Enter your email" required
                                value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="number" name="phone" placeholder="Enter your number" required
                                value="<?php echo $row['phonenumber']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Birthday</span>
                            <input type="date" name="dob" placeholder="Enter your birthdate" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Qualification</span>
                            <input type="text" name="qualify" placeholder="Enter your qualification" required>
                        </div>
                    </div>
                    <div class="gender-details" required>
                        <input type="radio" name="gender" value="Male" id="dot-1" <?php
                        if ($row['gender'] == "Male") {
                            echo "checked";
                        }
                        ?>>
                        <input type="radio" name="gender" value="Female" id="dot-2" <?php
                        if ($row['gender'] == "Female") {
                            echo "checked";
                        }
                        ?>>

                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                        </div>
                    </div>


                    <div class="image-upload">
                        <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
                        Select image to upload:
                        <input type="file" name="file" id="fileToUpload" required>
                        <!-- <input type="submit" value="Upload" name="submit"> -->
                        <!-- </form> -->
                    </div>

                    <div class="button">
                        <input type="submit" name="submit" value="Save">
                    </div>

                </form>



            </div>
        </div>
    </div>


    <script src="../js/script.js"></script>
</body>

</html>