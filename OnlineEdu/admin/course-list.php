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
                    <!-- <div class="right-plus"> -->
                    <!-- <a href="" id="create_new" class="plus">
                        <div class="right-plus" data-toggle="modal" data-target="#form"><i class=" fa fa-plus"></i> Create
                            New
                        </div>
                    </a> -->
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
                                <form method="POST">
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
                                            <input type="text" class="form-control" id="courseName">
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Description</label>
                                            <input type="text" class="form-control" id="desc">
                                        </div>
                                        <div class="form-group">
                                            <label for="exp">Experience</label>
                                            <!-- <input type="text" class="form-control" id="exp" placeholder="1 Years"> -->
                                            <select class="form-control" name="experience">
                                                <option value="" selected> Select option </option>
                                                <option value="1"> 1 Year </option>
                                                <option value="2"> 2 Years </option>
                                                <option value="3"> 3 Years </option>
                                                <option value="4"> 4 Years </option>
                                                <option value="5"> 5 Years </option>
                                                <option value="6"> More than 5 Years </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="courseImg">Logo</label>
                                            <input type="file" class="form-control" id="CourseImg">
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="table-title">
                    <div class="show-entries">
                        <span>Show</span>
                        <select>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                        </select>
                        <span>entries</span>
                    </div>

                    <div class="search-box">
                        <span class="input-group-addon"><i class="fa fa-search">
                                <input type="text" placeholder="Search&hellip;"></i></span>
                    </div>
                </div>



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
                        $i = 1;
                        $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0  order by c.`name` asc ");
                        while ($row = $qry->fetch_assoc()):
                            ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?>
                            </td>
                            <td>
                                <img src="../images/girl.jpeg" alt="Course Logo" class="course-image">
                            </td>
                            <td>
                                <?php echo $row['tutor'] ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>

                            <td class="text-center">
                                <?php if ($row['status'] == 0): ?>
                                <span>
                                    <button
                                        style=" cursor:pointer; background-color:red; color: white; font-size: 17px;  padding:0.400rem 0.60rem;  text-align: center; border:none; border-radius: 4px;"
                                        onclick="ChangeOrderStatus('<?php $row['id'] ?>')">Inactive
                                    </button>
                                </span>

                                <?php else: ?>
                                <span>
                                    <button
                                        style=" cursor:pointer; background-color:green; color: white; font-size: 17px;  padding:0.400rem 0.60rem;  text-align: center; border:none; border-radius: 4px;"
                                        onclick="ChangeOrderStatus('<?php $row['id'] ?>')">Active
                                    </button>
                                </span>

                                <!-- <span
                                            style=" background-color: green;color: white;  padding:0.200rem 0.40rem;  text-align: center; border-radius: 4px;">Active</span> -->
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="icons">
                                    <button class="view" title="View" id="view" data-toggle="tooltip"
                                        style="border:none; background-color:inherit">
                                        <i style=" padding: 0.100rem 0.10rem;" class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <div class="icons">
                                    <button class="edit" title="Edit" id="edit" data-toggle="tooltip"
                                        style="border:none;background-color:inherit"><i style=" padding: 0.100rem
                                        0.10rem;" class="fa fa-edit "></i>
                                    </button>
                                </div>
                                <div class="icons">
                                    <button class="delete" title="Delete" id="delete" data-toggle="tooltip"
                                        style="border:none ;background-color:inherit"><i style=" padding: 0.100rem
                                        0.10rem;" class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>

                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item active"><a href="#" class="page-link">2</a></li>
                        <li class="page-item "><a href=" #" class="page-link">3</a></li>
                        <!-- <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li> -->
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../js/script.js"></script>
</body>

</html>