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
    <title>Student</title>
    <link rel="stylesheet" href="../css/studentCourse.css">

    <style>
    /* body {
        background-color: #eee;
    }

    .container {
        height: 100vh;
    } */

    .card {
        border: none;
    }

    .form-control {
        border-bottom: 2px solid #eee !important;
        border: none;
        font-weight: 600
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #8bbafe;
        outline: 0;
        box-shadow: none;
        border-radius: 0px;
        border-bottom: 2px solid blue !important;
    }

    .inputbox {
        position: relative;
        margin-bottom: 20px;
        width: 100%
    }

    .inputbox span {
        position: absolute;
        top: 7px;
        left: 11px;
        transition: 0.5s
    }

    .inputbox i {
        position: absolute;
        top: 13px;
        right: 8px;
        transition: 0.5s;
        color: #3F51B5
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0
    }

    .inputbox input:focus~span {
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px
    }

    .inputbox input:valid~span {
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px
    }

    .card-blue {
        background-color: #492bc4;
    }

    .hightlight {
        background-color: #5737d9;
        padding: 10px;
        border-radius: 10px;
        margin-top: 15px;
        font-size: 14px;
    }

    .yellow {
        color: #fdcc49;
    }

    .decoration {

        text-decoration: none;
        font-size: 14px;
    }

    .btn-success {
        color: #fff;
        background-color: #492bc4;
        border-color: #492bc4;
    }

    .btn-success:hover {
        color: #fff;
        background-color: #492bc4;
        border-color: #492bc4;
    }

    .decoration:hover {
        text-decoration: none;
        color: #fdcc49;
    }
    </style>
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

            <div class="container" py-4>
                <div class="row" mt-3>
                    <?php
                    require '../php/database.php';
                    $query = "SELECT * FROM course_list WHERE status = '1' AND delete_flag = '0'";
                    $query_run = mysqli_query($conn, $query);
                    $check_course = mysqli_num_rows($query_run) > 0;
                    if ($check_course) {
                        while ($row = mysqli_fetch_array($query_run)) {
                            $sql1 = $row['tutor_id'];
                            $_SESSION['course_id'] = $row['id'];
                            $currentUser = $_SESSION['username'];
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
                            <img src="../images/courses/<?php echo $row['logo']; ?>" class="card-img-top" width="200px"
                                height="240px" alt="Faculty images">
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






                                <!--  -->
                                <button type="button" class="btn btn-primary launch" data-toggle="modal"
                                    data-target="#staticBackdrop"> <i class="fa fa-rocket"></i> Pay Now
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="container mt-5 px-5">

                                        <div class="mb-4">

                                            <h2>Confirm order and pay</h2>
                                            <span>please make the payment, after that you can enjoy all the features and
                                                benefits.</span>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-8">


                                                <div class="card p-3">

                                                    <h6 class="text-uppercase">Payment details</h6>
                                                    <div class="inputbox mt-3"> <input type="text" name="name"
                                                            class="form-control" required="required"> <span>Name on
                                                            card</span> </div>


                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="inputbox mt-3 mr-2"> <input type="text"
                                                                    name="name" class="form-control"
                                                                    required="required"> <i
                                                                    class="fa fa-credit-card"></i> <span>Card
                                                                    Number</span>


                                                            </div>


                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="d-flex flex-row">


                                                                <div class="inputbox mt-3 mr-2"> <input type="text"
                                                                        name="name" class="form-control"
                                                                        required="required"> <span>Expiry</span> </div>

                                                                <div class="inputbox mt-3 mr-2"> <input type="text"
                                                                        name="name" class="form-control"
                                                                        required="required"> <span>CVV</span> </div>


                                                            </div>


                                                        </div>


                                                    </div>



                                                    <div class="mt-4 mb-4">

                                                        <h6 class="text-uppercase">Billing Address</h6>


                                                        <div class="row mt-3">

                                                            <div class="col-md-6">

                                                                <div class="inputbox mt-3 mr-2"> <input type="text"
                                                                        name="name" class="form-control"
                                                                        required="required"> <span>Street Address</span>
                                                                </div>


                                                            </div>


                                                            <div class="col-md-6">

                                                                <div class="inputbox mt-3 mr-2"> <input type="text"
                                                                        name="name" class="form-control"
                                                                        required="required"> <span>City</span> </div>


                                                            </div>




                                                        </div>


                                                        <div class="row mt-2">

                                                            <div class="col-md-6">

                                                                <div class="inputbox mt-3 mr-2"> <input type="text"
                                                                        name="name" class="form-control"
                                                                        required="required"> <span>State/Province</span>
                                                                </div>


                                                            </div>


                                                            <div class="col-md-6">

                                                                <div class="inputbox mt-3 mr-2"> <input type="text"
                                                                        name="name" class="form-control"
                                                                        required="required"> <span>Zip code</span>
                                                                </div>


                                                            </div>




                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="mt-4 mb-4 d-flex justify-content-between">


                                                    <span>Previous step</span>


                                                    <button class="btn btn-success px-3">Pay $840</button>




                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="card card-blue p-3 text-white mb-3">

                                                    <span>You have to pay</span>
                                                    <div class="d-flex flex-row align-items-end mb-3">
                                                        <h1 class="mb-0 yellow">$549</h1> <span>.99</span>
                                                    </div>

                                                    <span>Enjoy all the features and perk after you complete the
                                                        payment</span>
                                                    <a href="#" class="yellow decoration">Know all the features</a>

                                                    <div class="hightlight">

                                                        <span>100% Guaranteed support and update for the next 5
                                                            years.</span>


                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <!--  -->















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