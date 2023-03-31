<?php
session_start();
include('./student-sidebar.php');
$currentUser = $_SESSION['username'];
if (empty($currentUser)) {
    header("location:../php/loginstu.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Student</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/updateprofile.css">
    <!-- <link rel="stylesheet" href="../css/studentCourse.css"> -->



</head>

<body>
    <div class="main">
        <div class="container">
            <div class="title">Inquiries</div>
            <div class="content">


                <!-- <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Message:</label>
                    <textarea class="form-control" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
                </form>
            </div> -->



                <form method="post" action="">

                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="fullname" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="number" name="phone" placeholder="Enter your number" required>
                        </div>
                        <div class="input-box">
                            <label>Message:</label>
                            <!-- <span class="details">Message:</span> -->

                            <textarea class="form-control" name="message" required> </textarea>
                            <!-- <input type="text" name="message" required> -->

                        </div>

                    </div>
                    <div class="button">
                        <input type="submit" name="submit" value="SEND">
                    </div>

                </form>

            </div>
        </div>
        <!-- </div> -->
        </main>
        </section>
        <script src="../js/script.js"></script>

</body>

</html>