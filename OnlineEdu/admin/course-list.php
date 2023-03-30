<?php
session_start();
include_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin</title>
</head>

<body>

    <?php
    include('./header.php');
    ?>

    <!-- CONTENT -->
    <section id="content">
        <!-- MAIN -->
        <main>

            <div class="courses">

                <div class="head-title">
                    <div class="left">
                        <h3>List of Courses</h3>
                    </div>

                    <button type="button" class="btn" data-toggle="modal" data-target="#form">
                        <div class="right-plus" data-toggle="modal" data-target="#form">
                            <i class=" fa fa-plus"></i> Create New
                        </div>
                    </button>

                    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">New Course</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="email1">Tutor</label>
                                            <!-- <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email"> -->
                                            <select class="form-control" name="tutor">
                                                <option value="" selected> Select option </option>
                                                <option value="1"> Cooper, Mark D </option>
                                                <option value="2"> Blake, Claire C </option>
                                                <option value="3"> Miller, Samantha Jane C </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="CourseName">Course Name</label>
                                            <input type="text" name="course_name" class="form-control" id="courseName">
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Description</label>
                                            <input type="text" name="descrp" class="form-control" id="desc">
                                        </div>
                                        <div class="form-group">
                                            <label for="exp">Experience</label>
                                            <!-- <input type="text" class="form-control" id="exp" placeholder="1 Years"> -->
                                            <select class="form-control" name="experience">
                                                <option value="" selected> Select option </option>
                                                <option value="1 Year"> 1 Year </option>
                                                <option value="2 Year"> 2 Years </option>
                                                <option value="3 Year"> 3 Years </option>
                                                <option value="4 Year"> 4 Years </option>
                                                <option value="5 Year"> 5 Years </option>
                                                <option value="More than 5 Year"> More than 5 Years </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="courseImg">Course's Logo</label>
                                            <input type="file" name="course_image" id="course_image"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" name="save_course" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="17.5%">
                        <col width="10%">
                        <col width="22.5%">
                        <col width="19%">
                        <col width="15%">
                        <col width="11%">
                    </colgroup>


                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Created<i class="fa fa-sort"></i></th>
                            <th>Image</th>
                            <th>Tutor<i class="fa fa-sort"></i></th>
                            <th>Name<i class="fa fa-sort"></i></th>
                            <th>Status<i class="fa fa-sort"></i></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // $i = 1;
                        $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0  order by c.`id` asc");
                        while ($row = $qry->fetch_assoc()):
                            ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo date("Y-m-d ", strtotime($row['date_created'])) ?>
                            </td>
                            <td>
                                <img src="../images/courses/<?php echo $row['logo']; ?>">

                            </td>
                            <td>
                                <?php echo $row['tutor'] ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>

                            <td>

                                <?php if ($row['status'] == 1): ?>
                                <a href="../controller/updateInactive.php?id=<?php
                                        echo $row['id'];
                                        ?>">
                                    <span class="btn btn-success">Active</span> </a>

                                <?php elseif ($row['status'] == 0): ?>
                                <a href="../controller/updateActive.php?id=<?php
                                        echo $row['id'];
                                        ?>">
                                    <span class="btn btn-danger">Inactive</span></a>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="icons">
                                    <button class="view" class="btn" title="View" id="view" data-toggle="modal"
                                        type="button" data-id="<?php echo $row['id'] ?>" data-target=" #view"
                                        style="border:none; background-color:inherit">
                                        <a href="course_view.php?id=<?php
                                            // session_start(); 
                                            echo $row['id'];
                                            // $_SESSION['id'] = $row['id'];
                                            ?>">
                                            <i style=" padding: 0.100rem 0.10rem;" class="fa fa-eye"></i>
                                        </a>
                                    </button>

                                </div>

                                <div class="icons">
                                    <button class="edit" class="btn" title="edit" id="edit" data-toggle="modal"
                                        type="button" data-id="<?php echo $row['id'] ?>"
                                        style="border:none; background-color:inherit">
                                        <a href="course_edit.php?id=<?php
                                            // session_start(); 
                                            echo $row['id'];
                                            // $_SESSION['id'] = $row['id'];
                                            ?>">
                                            <i style=" padding: 0.100rem 0.10rem;" class="fa fa-edit"></i>
                                        </a>
                                    </button>
                                </div>
                                <div class="icons">
                                    <button class="delete" class="btn" title="delete" id="delete" data-toggle="modal"
                                        type="button" data-id="<?php echo $row['id'] ?>"
                                        style="border:none; background-color:inherit">
                                        <a href="deletecourse.php?id=<?php
                                            // session_start(); 
                                            echo $row['id'];
                                            // $_SESSION['id'] = $row['id'];
                                            ?>">
                                            <i style=" padding: 0.100rem 0.10rem;" class="fa fa-trash"></i>
                                        </a>
                                    </button>
                                </div>

                            </td>

                        </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>
              
            </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../js/script.js">
    </script>
</body>

</html>