<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/vcandfac.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="../images/E-logo.png" alt="">
            <div class="line"></div>
            <p>OnlineEdu</p>
        </div>
        <div class="logo-space">
        </div>
    </header>
    <br>
    <center>
        <h1>Popular Courses<h1>
    </center>
    <div class="container" py-4>
        <div class="row" mt-3>

            <?php
            require '../php/database.php';
            $query = "SELECT * FROM course_list";
            $query_run = mysqli_query($conn, $query);
            $check_course = mysqli_num_rows($query_run) > 0;
            if ($check_course) {
                while ($row = mysqli_fetch_array($query_run)) {
                    $sql1 = $row['tutor_id'];
                    $query1 ="SELECT * FROM tutor_list WHERE id = '$sql1'";
                    $query_run1=mysqli_query($conn,$query1);
                    $row1 = mysqli_fetch_array($query_run1);

                    
                    ?>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                        <img src="../images/avatars/<?php echo $row1['avtar']; ?>" class="card-img-top" width="200px" height="240px" alt="Faculty images">
                            <div class="card-body">
                                 <h2 class="card-title"><?php echo $row['name'];?></h2>
                                <h7 class="card-title"><?php echo $row['description'];?></h7>
                                <h6><?php echo $row1['lastname'].",".$row1['firstname'].$row1['middlename']?></h6>
                                <p class="card-text"><b>₹449</b></p>
                                <button class="btn btn-success">View Details</button>
                            </div>
                        </div>
                    </div>
                    <?php

                    
                }
            } else {
                echo "No courses found";
            }
            ?>

        </div>
    </div>




</body>

</html>