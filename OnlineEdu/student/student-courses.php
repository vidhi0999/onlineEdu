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
    <title>Courses</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="stylesheet" href="../css/vcandfac.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../js/sweetalert.min.js"></script> -->

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->


    <title>Student</title>
    <link rel="stylesheet" href="../css/studentCourse.css">



</head>

<body>

    <!-- CONTENT -->
    <section id="content">
        <!-- MAIN -->
        <main>
            <!-- Modal HTML -->

            <div class="head-title">
                <div class="left">
                    <h1>Courses</h1>
                </div>
            </div>
            <hr>


            <!-- <div class="modal fade" id="DeletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Dete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">$times;</span>
                            </button>
                        </div>
                        <form action="code.php" method="POST">
                            <div class="modal-body">
                                <input type="text" name="delete_id" class="delete_user_id">
                                <h4>Do you want to delete this User?</h4>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->



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
                            //session_start();
                            $_SESSION['course_id'] = $row['id'];
                            $currentUser = $_SESSION['username'];
                            // $course_id = $_SESSION['course_id'];
                            $_SESSION['course_name'] = $row['name'];
                            $query1 = "SELECT * FROM tutor_list WHERE id = '$sql1'";
                            $query_run1 = mysqli_query($conn, $query1);
                            $row1 = mysqli_fetch_array($query_run1);
                            $course_id = $row['id'];
                            $sql2 = "SELECT * FROM course_request WHERE course_id ='$course_id' && student_userName = '$currentUser' ";
                            $query = mysqli_query($conn, $sql2);
                            $result = mysqli_fetch_assoc($query);
                            ?>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <img src="../images/avatars/<?php echo $row1['avtar']; ?>" class="card-img-top"
                                width="200px" height="240px" alt="Faculty images">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php echo $row['name']; ?>
                                </h2>
                                <h7 class="card-title">
                                    <?php echo $row['description']; ?>
                                </h7>
                                <hr>
                                <h6 style="color: rgba(0, 0, 0, 0.350);">
                                    <?php echo $row1['lastname'] . ", " . $row1['firstname'] . " " . $row1['middlename'] ?>
                                </h6>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <p class="card-text"><b>₹449</b></p>
                                <?php

                                        if ($result['status'] === '1') {
                                            ?>
                                <button onclick="done()" class="enrolled" name="enrolled">
                                    Enrolled
                                </button>

                                <?php
                                        } else if ($result['status'] === '0') {
                                            ?>
                                <button onclick="done()" class="requested" name="requested">
                                    Requested
                                </button>

                                <?php
                                        } else {
                                            ?>

                                <a href="./enrollCourse.php?id=<?php echo $row['id']; ?>">
                                    <button class="enrollNow" value="" class="btn" title="View" id="view"
                                        data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-target=" #view"
                                        name="enrollNow">
                                        Enroll now
                                    </button>
                                </a>

                                <?php
                                        }
                                        ?>
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
        </main>
    </section>
    <script src="../js/script.js"></script>

    <!-- <script src="../js/sweetalert.min.js"></script> -->
    <!-- <script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");

        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '/enrollCourse.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    // $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });

</script> -->
    <!-- <script type="text/javascript">


function done(){
    document.querySelector(".main-container").style.display = "block"
} -->
    </script>
</body>

</html>